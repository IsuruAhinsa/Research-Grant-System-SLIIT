<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Models\PrincipalInvestigator;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Livewire\Component;

class Agreement extends Component
{
    public PrincipalInvestigator $principalInvestigator;

    public $confirmingAgreement = false;

    public function confirmAgreement()
    {
        $this->confirmingAgreement = true;
    }

    public function agree()
    {
        $this->principalInvestigator->is_agreed = TRUE;
        $this->principalInvestigator->agreed_date = Carbon::today()->toDate();
        $this->principalInvestigator->save();

        $this->confirmingAgreement = false;

        return redirect()->route('principal-investigators.dashboard')->with([
            Notification::make()
                ->title('Agreed!')
                ->success()
                ->send()
        ]);
    }

    public function render()
    {
        return view('principal-investigators.agreement');
    }
}
