<?php

namespace App\Http\Livewire\DisbursementPlans;

use App\Models\DisbursementPlan;
use App\Models\PrincipalInvestigator;
use Livewire\Component;

class Payments extends Component
{
    public $principalInvestigator;
    public $disbursement_plans;
    public $makingPayment = false;
    public $disbursementPlan;
    public $amount;
    public $comment;

    protected $listeners = ['refreshPayments' => '$refresh'];

    public function mount(PrincipalInvestigator $principalInvestigator)
    {
        $this->principalInvestigator = $principalInvestigator;

        $this->disbursement_plans = DisbursementPlan::where('principal_investigator_id', $principalInvestigator->id)->get();
    }

    public function makePayment($id)
    {
        $this->resetInput();

        $this->resetValidation();

        $this->makingPayment = true;

        $this->disbursementPlan = DisbursementPlan::find($id);
    }

    public function pay()
    {
        $this->validate([
            'amount' => 'required|numeric|min:0',
            'comment' => 'nullable|string',
        ]);

        if ($this->disbursementPlan->payments()->exists()) {
            $remainingAmount = $this->disbursementPlan->amount - $this->disbursementPlan->payments()->sum('amount');
        } else {
            $remainingAmount = $this->disbursementPlan->amount;
        }

        if ($this->amount <= $remainingAmount) {
            $this->disbursementPlan->payments()->create([
                'amount' => $this->amount,
                'comment' => $this->comment,
            ]);

            $this->makingPayment = false;

            $this->emit('refreshPayments');
        } else {
            $this->addError('amount', 'You entered amount is invalid!');
        }
    }

    public function resetInput()
    {
        $this->amount = null;
        $this->comment = null;
    }

    public function allPaymentsSettled()
    {
        return DisbursementPlan::where('principal_investigator_id', $this->principalInvestigator->id)
            ->with('payments')
            ->get()
            ->every(function ($dplan) {
                $totalAmountDue = $dplan->amount;
                $settledAmount = $dplan->payments->sum('amount');
                return $totalAmountDue === $settledAmount;
            });
    }

    public function render()
    {
        return view('disbursement-plans.payments');
    }
}
