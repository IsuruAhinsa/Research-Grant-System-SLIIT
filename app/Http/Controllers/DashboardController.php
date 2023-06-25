<?php

namespace App\Http\Controllers;

use App\Models\DisbursementPlan;

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
                $settledAmount = $dplan->payments->sum('amount');
                $remainingAmount = $dplan->amount - $settledAmount;
                $dplan->remainingAmount = $remainingAmount;
                return $dplan;
            })
            ->filter(function ($dplan) {
                return $dplan->remainingAmount > 0;
            })
            ->take(10);
    }
}
