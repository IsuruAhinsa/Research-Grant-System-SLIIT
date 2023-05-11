<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Models\PrincipalInvestigator;
use Filament\Notifications\Notification;
use Livewire\Component;

class Approval extends Component
{
    public $principalInvestigator;
    public $confirmingApproval = false;

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

    public function render()
    {
        return view('principal-investigators.approval');
    }
}
