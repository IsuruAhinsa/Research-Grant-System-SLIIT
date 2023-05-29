<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Models\PrincipalInvestigator;
use Filament\Notifications\Notification;
use Livewire\Component;

class Agreement extends Component
{
    public PrincipalInvestigator $principalInvestigator;

    public $confirmingAgreement = false;

    public $is_agreed;

    public function confirmAgreement()
    {
        $this->confirmingAgreement = true;
    }

    public function agree()
    {
        $this->principalInvestigator->is_agreed = TRUE;
        $this->principalInvestigator->save();

        $this->confirmingAgreement = false;

        Notification::make()
            ->title('Agreed!')
            ->success()
            ->send();
    }

    public function disagree()
    {
        $this->principalInvestigator->is_agreed = FALSE;
        $this->principalInvestigator->save();

        $this->confirmingAgreement = false;

        Notification::make()
            ->title('Disagreed!')
            ->success()
            ->send();
    }

    public function render()
    {
        return view('principal-investigators.agreement');
    }
}
