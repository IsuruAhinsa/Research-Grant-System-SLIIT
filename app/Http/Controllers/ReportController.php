<?php

namespace App\Http\Controllers;

use App\Exports\FinancialExport;
use App\Exports\PrincipalInvestigatorsExport;
use App\Models\DisbursementPlan;
use App\Models\PrincipalInvestigator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function showPrincipalInvestigatorReportsForm()
    {
        return view('reports.principal-investigator.index');
    }

    public function exportPrincipalInvestigator(Request $request)
    {
        $query = PrincipalInvestigator::query();

        // Apply filters
        if ($request->has('faculty')) {
            if ($request->input('faculty') != 'all') {
                $query->where('faculty_id', $request->input('faculty'));
            }
        }

        if ($request->date('from') && $request->date('to')) {
            $query->whereBetween('created_at', [$request->input('from'), $request->input('to')]);
        }

        if ($request->has('is_ban')) {
            $query->where('is_ban', $request->boolean('is_ban'));
        }

        if ($request->has('status')) {
            if ($request->input('status') == 'Pending') {
                $query->currentStatus('PENDING');
            }

            if ($request->input('status') == 'Approved') {
                $query->whereHas('statuses', function ($query) {
                    $query->where('name', 'REVIEWER-APPROVED');
                }, '=', 2);
            }

            if ($request->input('status') == 'Rejected') {
                $query->whereHas('statuses', function ($query) {
                    $query->where('name', 'like', '%REJECTED%');
                });
            }
        }

        if ($query->count() == 0) {
            return back()->withErrors('No Records to Export.');
        }

        return Excel::download(new PrincipalInvestigatorsExport($query), 'principal-investigators.xlsx');
    }

    public function showFinancialReportsForm()
    {
        return view('reports.financial.index');
    }

    public function exportFinancial(Request $request)
    {
        $query = DisbursementPlan::query();

        // Apply filters
        if ($request->has('principal_investigator')) {
            if ($request->input('principal_investigator') != 'all') {
                $query->where('principal_investigator_id', $request->input('principal_investigator'));
            }
        }

        if ($request->date('from') && $request->date('to')) {
            $query->whereBetween('created_at', [$request->input('from'), $request->input('to')]);
        }

        if ($query->count() == 0) {
            return back()->withErrors('No Records to Export.');
        }

        return Excel::download(new FinancialExport($query), 'financials.xlsx');
    }

    public function exportPrincipalInvestigatorHistory(Request $request)
    {
        $query = PrincipalInvestigator::query();

        // Apply filters
        if ($request->has('principal_investigator')) {
            if ($request->input('principal_investigator') != 'all') {
                $query->where('email', $request->input('principal_investigator'));
            }
        }

        if ($request->date('from') && $request->date('to')) {
            $query->whereBetween('created_at', [$request->input('from'), $request->input('to')]);
        }

        if ($query->count() == 0) {
            return back()->withErrors('No Records to Export.');
        }

        $data = $query->get()->toArray();

        $pdf = Pdf::loadView('reports.principal-investigator.pdf.history', ['data' => $data]);

        return $pdf->download('principal-investigator-history.pdf');
    }
}
