<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Approval extends Component
{
    public $principalInvestigator;
    public $confirmingApproval = false;
    public $confirmingDecline = false;

    public $remarks;

    public $grant_number;

    public function confirmApprove()
    {
        $this->confirmingApproval = true;
    }

    public function approve()
    {
        $this->validate(
            ['grant_number' => Rule::requiredIf(Auth::user()->hasRole(['Super Administrator', 'Administrator']))]
        );

        $role = auth()->user()->getRoleNames()->first();

        $this->principalInvestigator->setStatus("{$role}-Approved");

        if (Auth::user()->hasRole(['Super Administrator', 'Administrator'])) {
            $this->principalInvestigator->grant_number = $this->grant_number;
            $this->principalInvestigator->save();
        }

        $this->confirmingApproval = false;

        return redirect()->route('principal-investigators.show', $this->principalInvestigator->id)->with([
            Notification::make()
                ->title('Approved')
                ->success()
                ->send()
        ]);
    }

    public function confirmDecline()
    {
        $this->confirmingDecline = true;
    }

    public function decline()
    {
        $this->validate(['remarks' => 'required'],[
            'remarks.required' => 'Please enter the reason to reject this application.'
        ]);

        $role = auth()->user()->getRoleNames()->first();

        $this->principalInvestigator->setStatus("{$role}-Rejected", $this->remarks);

        $this->confirmingDecline = false;

        return redirect()->route('principal-investigators.show', $this->principalInvestigator->id)->with([
            Notification::make()
                ->title('Rejected')
                ->success()
                ->send()
        ]);
    }

    public function render()
    {
        return view('principal-investigators.approval');
    }
}
