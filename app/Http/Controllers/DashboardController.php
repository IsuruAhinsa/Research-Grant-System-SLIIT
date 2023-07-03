<?php

namespace App\Http\Controllers;

use App\Models\DisbursementPlan;
use App\Models\Payment;
use App\Models\PrincipalInvestigator;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'payments' => $this->getNextPayments(),
            'totalPrincipalInvestigators' => $this->totalPrincipalInvestigators(),
            'totalCompletedResearch' => $this->totalCompletedResearch(),
            'totalResearch' => $this->totalResearch(),
            'totalExpenses' => $this->totalExpenses(),
            'totalRequestedClaim' => $this->totalRequestedClaim(),
        ]);
    }

    protected function getNextPayments()
    {
        return DisbursementPlan::with('payments')
            ->get()
            ->map(function ($dplan) {
                $pi = PrincipalInvestigator::find($dplan->principal_investigator_id);

                if ($pi->isApproved()) {
                    $settledAmount = $dplan->payments->sum('amount');
                    $remainingAmount = $dplan->amount - $settledAmount;
                    $dplan->remainingAmount = $remainingAmount;
                    return $dplan;
                }
            })
            ->filter(function ($dplan) {
                return $dplan && $dplan->remainingAmount > 0;
            })
            ->take(10);
    }

    protected function totalPrincipalInvestigators(): int
    {
        return User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'Principal Investigator')->toArray()
        )->count();
    }

    protected function totalCompletedResearch(): int
    {
        return PrincipalInvestigator::where('is_completed', TRUE)->count();
    }

    protected function totalResearch(): int
    {
        return PrincipalInvestigator::count();
    }

    protected function totalExpenses(): int
    {
        return Payment::sum('amount');
    }

    protected function totalRequestedClaim(): int
    {
        return DisbursementPlan::sum('amount');
    }
}
