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
        $this->principalInvestigator->status = "Approved";
        $this->principalInvestigator->save();

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

        $this->principalInvestigator->status = "Rejected";
        $this->principalInvestigator->remarks = $this->remarks;
        $this->principalInvestigator->save();

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
