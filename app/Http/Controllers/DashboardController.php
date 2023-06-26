<?php

namespace App\Http\Controllers;

use App\Models\DisbursementPlan;
use App\Models\PrincipalInvestigator;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'payments' => $this->getNextPayments(),
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
}
