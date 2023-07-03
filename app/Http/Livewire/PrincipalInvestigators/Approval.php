<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Mail\ResearchProposalRejected;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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
            ['grant_number' => Rule::requiredIf(Auth::user()->hasRole(['Super Administrator', 'Administrator']) && $this->principalInvestigator->grant_number === null)]
        );

        $role = auth()->user()->getRoleNames()->first();

        if (Auth::user()->hasRole('Principal Investigator')){

            $this->principalInvestigator->statuses()->create([
                'user_id' => Auth::id(),
                'name' => 'REVIEWER-APPROVED',
            ]);

        } else {

            $this->principalInvestigator->statuses()->create([
                'user_id' => Auth::id(),
                'name' => Str::upper($role)."-APPROVED",
            ]);

        }

        // TODO: clean code & optimize.

        // assign grant number
        if (Auth::user()->hasRole(['Super Administrator', 'Administrator']) && $this->principalInvestigator->grant_number === null) {
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

        if ($role === 'Principal Investigator'){
            $role = 'REVIEWER';
        }

        $this->principalInvestigator->statuses()->create([
            'user_id' => Auth::id(),
            'name' => Str::upper($role)."-REJECTED",
            'reason' => $this->remarks,
        ]);

        // sending rejected mail
        Mail::to($this->principalInvestigator->dean_email)->send(new ResearchProposalRejected($this->principalInvestigator));

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
