<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use Filament\Notifications\Notification;
use Livewire\Component;

class Approval extends Component
{
    public $principalInvestigator;
    public $confirmingApproval = false;
    public $confirmingDecline = false;

    public $remarks;

    public function confirmApprove()
    {
        $this->confirmingApproval = true;
    }

    public function approve()
    {
        $role = auth()->user()->getRoleNames()->first();

        $this->principalInvestigator->setStatus("{$role}-Approved");

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

    protected $rules = [
        'remarks' => 'required'
    ];

    protected $messages = [
        'remarks.required' => 'Please enter the reason to reject this application.'
    ];

    public function decline()
    {
        $this->validate();

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
