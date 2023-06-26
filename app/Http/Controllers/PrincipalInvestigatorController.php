<?php

namespace App\Http\Controllers;

use App\Models\CoPrincipalInvestigator;
use App\Models\DisbursementPlan;
use App\Models\PrincipalInvestigator;
use App\Models\ResearchAssistant;
use Illuminate\Support\Facades\Storage;

class PrincipalInvestigatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('principal-investigators.index');
    }

    public function dashboard()
    {
        $exists = PrincipalInvestigator::where('type', 'CORRECTED')
            ->where('user_id', auth()->id())
            ->exists();

        if ($exists) {
            $principal_investigator = PrincipalInvestigator::where('type', 'CORRECTED')
                ->where('user_id', auth()->id())
                ->first();
        } else {
            $principal_investigator = PrincipalInvestigator::where('type', 'NEW')
                ->where('user_id', auth()->id())
                ->first();
        }

        return view('principal-investigators.dashboard', [
            'principal_investigator' => $principal_investigator,
            'all_payments_settled' => $principal_investigator && $this->allPaymentsSettled($principal_investigator->id)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PrincipalInvestigator $principalInvestigator)
    {
        return view('principal-investigators.show')->with('principalInvestigator', $principalInvestigator);
    }

    public function downloadResume(PrincipalInvestigator $principalInvestigator)
    {
        if (Storage::disk('public')->exists($principalInvestigator->resume)) {
            return Storage::disk('public')->download($principalInvestigator->resume);
        }
    }

    public function downloadGrantProposal(PrincipalInvestigator $principalInvestigator)
    {
        if (Storage::disk('public')->exists($principalInvestigator->research_grant_proposal)) {
            return Storage::disk('public')->download($principalInvestigator->research_grant_proposal);
        }
    }

    public function downloadBudgetActivityPlan(PrincipalInvestigator $principalInvestigator)
    {
        if (Storage::disk('public')->exists($principalInvestigator->budget_activity_plan)) {
            return Storage::disk('public')->download($principalInvestigator->budget_activity_plan);
        }
    }

    public function downloadCoPrincipalInvestigatorResume(CoPrincipalInvestigator $coPrincipalInvestigator)
    {
        if (Storage::disk('public')->exists($coPrincipalInvestigator->attachment)) {
            $filename = $coPrincipalInvestigator->created_at . "_" . $coPrincipalInvestigator->id;
            return Storage::disk('public')->download($coPrincipalInvestigator->attachment, $filename);
        }
    }

    public function downloadResearchAssistantResume(ResearchAssistant $researchAssistant)
    {
        if (Storage::disk('public')->exists($researchAssistant->attachment)) {
            $filename = $researchAssistant->created_at . "_" . $researchAssistant->id;
            return Storage::disk('public')->download($researchAssistant->attachment, $filename);
        }
    }

    public function allPaymentsSettled($principal_investigator_id)
    {
        return DisbursementPlan::where('principal_investigator_id', $principal_investigator_id)
            ->with('payments')
            ->get()
            ->every(function ($dplan) {
                $totalAmountDue = $dplan->amount;
                $settledAmount = $dplan->payments->sum('amount');
                return $totalAmountDue === $settledAmount;
            });
    }
}
