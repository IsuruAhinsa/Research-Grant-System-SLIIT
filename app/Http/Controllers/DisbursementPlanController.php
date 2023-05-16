<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDisbursementPlanRequest;
use App\Models\DisbursementPlan;
use Filament\Notifications\Notification;

class DisbursementPlanController extends Controller
{
    public function create($principalInvestigatorId)
    {
        $disbursement_plans = DisbursementPlan::where('principal_investigator_id', $principalInvestigatorId)->get();
        return view('disbursement-plans.create', [
            'principalInvestigatorId' => $principalInvestigatorId,
            'disbursement_plans' => $disbursement_plans,
        ]);
    }

    public function store(StoreDisbursementPlanRequest $request)
    {
        $categories = collect(DisbursementPlan::categories());

        $category = $categories->where('name', $request->input('category'))->first();

        $disbursement_plan = new DisbursementPlan();

        $amount = $disbursement_plan->getDisbursementAmount($request->input('principal_investigator_id'));

        if (!isset($amount)) {
            $grant_amount = 0;
        } else {
            $grant_amount = $amount;
        }

        $remaining_amount = 400000 - $grant_amount;

        $max_amount = 400000 * ($category['percentage'] / 100);

        if ($remaining_amount >= $max_amount) {
            if ($request->input('amount') <= $remaining_amount && $request->input('amount') <= $max_amount) {

            } else {
                return back()->withErrors(['amount' => 'Invalid amount']);
            }
        } else {
            if ($request->input('amount') <= $remaining_amount && $request->input('amount') <= $max_amount) {

            } else {
                return back()->withErrors(['amount' => 'Invalid amount']);
            }
        }

        DisbursementPlan::create([
            'principal_investigator_id' => $request->input('principal_investigator_id'),
            'category' => $request->input('category'),
            'month' => $request->input('month'),
            'activity' => $request->input('activity'),
            'amount' => $request->input('amount'),
        ]);

        return redirect()->back()->with([
            Notification::make()
                ->title('Added!')
                ->success()
                ->send()
        ]);
    }
}
