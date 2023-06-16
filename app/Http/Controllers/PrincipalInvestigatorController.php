<?php

namespace App\Http\Controllers;

use App\Models\CoPrincipalInvestigator;
use App\Models\PrincipalInvestigator;
use App\Http\Requests\StorePrincipalInvestigatorRequest;
use App\Http\Requests\UpdatePrincipalInvestigatorRequest;
use App\Models\ResearchAssistant;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PrincipalInvestigator $principalInvestigator)
    {
        return view('principal-investigators.show')->with('principalInvestigator', $principalInvestigator);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrincipalInvestigator $principalInvestigator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrincipalInvestigatorRequest $request, PrincipalInvestigator $principalInvestigator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrincipalInvestigator $principalInvestigator)
    {
        //
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
}
