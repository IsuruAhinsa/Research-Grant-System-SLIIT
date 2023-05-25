<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
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
            ['grant_number' => Rule::requiredIf(Auth::user()->hasRole(['Super Administrator', 'Administrator']))]
        );

        $role = auth()->user()->getRoleNames()->first();

        if (Auth::user()->hasRole('Principal Investigator')){
            // check already approved by two reviewers.
            $filtered = $this->principalInvestigator->statuses->filter(function (string $value, int $key) {
                return $value == 'REVIEWER-APPROVED';
            });

            if ($filtered->count() == 2) {
                return false;
                // TODO: un assign other reviewers.
            } else {
                $this->principalInvestigator->statuses()->create([
                    'user_id' => Auth::id(),
                    'name' => 'REVIEWER-APPROVED',
                ]);
            }

        } else {
            $this->principalInvestigator->statuses()->create([
                'user_id' => Auth::id(),
                'name' => Str::upper($role)."-APPROVED",
            ]);
        }

        // TODO: clean code & optimize.

        // assign grant number
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

        if ($role === 'Principal Investigator'){
            $role = 'REVIEWER';
        }

        $this->principalInvestigator->statuses()->create([
            'user_id' => Auth::id(),
            'name' => Str::upper($role)."-REJECTED",
            'reason' => $this->remarks,
        ]);

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
