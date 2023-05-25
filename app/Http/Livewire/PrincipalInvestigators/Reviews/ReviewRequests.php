<?php

namespace App\Http\Livewire\PrincipalInvestigators\Reviews;

use App\Models\PrincipalInvestigator;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReviewRequests extends Component
{
    public PrincipalInvestigator $principalInvestigator;

    protected $listeners = ['refreshReviewRequests' => '$refresh'];

    public function accept()
    {
        // getting approved reviewers.
        $users = $this->principalInvestigator->users()->wherePivot('is_accepted', true)->get();

        // check already approved by two reviewers.
        if ($users->count() == 2) {

            Notification::make()
                ->title('Sorry! you are late')
                ->body('Sorry. Two reviewers have already involved with this research for evaluating. You will be removed from this research soon.')
                ->warning()
                ->send();

            // filter other reviewers.
            $result = $this->principalInvestigator
                ->users()
                ->WherePivotNotIn('user_id', $users->pluck('id'))
                ->get();

            // un-assign other reviewers.
            $this->principalInvestigator->users()->detach($result);

            $this->emit('refreshReviewRequests');

        } else {

            $this->principalInvestigator->users()->wherePivot('user_id', Auth::id())->update([
                'is_accepted' => true,
            ]);

            Notification::make()
                ->title('Accepted')
                ->body('Thank You! You have been accepted to review this research.')
                ->success()
                ->send();

            $this->emit('refreshReviewRequests');
        }

    }

    public function decline()
    {
        $this->principalInvestigator->users()->wherePivot('user_id', Auth::id())->update([
            'is_accepted' => false,
        ]);

        Notification::make()
            ->title('Declined')
            ->body('Thank you for your response.')
            ->danger()
            ->send();

        $this->emit('refreshReviewRequests');
    }

    public function render()
    {
        return view('principal-investigators.reviews.review-requests');
    }
}
