<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Models\Faculty;
use App\Models\PrincipalInvestigator;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
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
                    $users = User::role('Principal Investigator')->where('faculty_id', $get('faculty_id'))->get();
                    return $users->pluck('fullname', 'id');
                    // TODO: prevent relevant user
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
        // TODO: prevent adding limit to 4

        $userIds = $this->form->getState()['user_id'];
        $users = User::whereIn('id', $userIds)->get();

        $this->principalInvestigator->users()->detach($users);

        $this->principalInvestigator->users()->attach($users);

        // TODO: sending dashboard notifications and emails

        $this->reset(['user_id', 'faculty_id']);

        $this->emit('refreshReviewerCreate');

        return back()->with([
            Notification::make()
                ->title('Reviewers Assigned')
                ->success()
                ->send()
        ]);

    }

    public function render()
    {
        return view('principal-investigators.reviewer-create');
    }
}
