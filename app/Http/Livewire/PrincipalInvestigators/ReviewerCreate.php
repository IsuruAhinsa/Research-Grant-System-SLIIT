<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Mail\ReviewApplicationApprovalRequest;
use App\Mail\UserCreated;
use App\Models\Faculty;
use App\Models\PrincipalInvestigator;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class ReviewerCreate extends Component implements HasForms
{
    use InteractsWithForms;

    protected $listeners = ['refreshReviewerCreate' => '$refresh'];

    public $faculty_id;
    public $user_id;

    public PrincipalInvestigator $principalInvestigator;

    protected function getFormSchema(): array
    {
        return [
            Select::make('faculty_id')
                ->label('Faculty')
                ->options(Faculty::all()->pluck('name', 'id')->toArray())
                ->string()
                ->required()
                ->reactive()
                ->searchable(),

            Select::make('user_id')
                ->label('Reviewer')
                ->options(function (callable $get) {
                    $users = User::role('Principal Investigator')
                        ->where('faculty_id', $get('faculty_id'))
                        ->whereNot('id', $this->principalInvestigator->user_id)
                        ->whereNotIn('id', $this->principalInvestigator->reviewers()->pluck('user_id'))
                        ->get();
                    return $users->pluck('fullname', 'id');
                })
                ->required()
                ->multiple()
                ->searchable(),
        ];
    }

    protected function getFormModel(): string
    {
        return PrincipalInvestigator::class;
    }

    public function saveReviewer()
    {
        $userIds = $this->form->getState()['user_id'];

        if (count($userIds) > 4) {
            return back()->with([
                Notification::make()
                    ->title('Error')
                    ->body('You can only assign four(4) reviewers to each research.')
                    ->danger()
                    ->send()
            ]);
        } else {
            $users = User::whereIn('id', $userIds)->get();

            $this->principalInvestigator->users()->detach($users);

            if ($this->principalInvestigator->users()->count() >= 4) {
                return back()->with([
                    Notification::make()
                        ->title('Error')
                        ->body('You can only assign four(4) reviewers to each research.')
                        ->danger()
                        ->send()
                ]);
            } else {
                $this->principalInvestigator->users()->attach($users);

                // TODO: sending dashboard notifications
                foreach ($users as $user) {
                    if ($user->last_login == null) {
                        $password = Str::random(10);
                        $user->password = Hash::make($password);
                        $user->save();
                        Mail::to($user->email)
                            ->send(new UserCreated($user, $password));
                    }
                    Mail::to($user->email)
                        ->send(new ReviewApplicationApprovalRequest($user, $this->principalInvestigator));
                }

                $this->reset(['user_id', 'faculty_id']);

                $this->emit('refreshReviewerCreate');

                return back()->with([
                    Notification::make()
                        ->title('Reviewers Assigned')
                        ->success()
                        ->send()
                ]);
            }
        }
    }

    public function deleteReviewer($id)
    {
        if ($id) {
            $this->principalInvestigator->users()->detach($id);

            $this->emit('refreshReviewerCreate');

            return back()->with([
                Notification::make()
                    ->title('Reviewer Unassigned!')
                    ->success()
                    ->send()
            ]);
        }
    }

    public function render()
    {
        return view('principal-investigators.reviewer-create');
    }
}
