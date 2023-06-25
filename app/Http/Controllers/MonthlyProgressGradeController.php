<?php

namespace App\Http\Controllers;

use App\Mail\ResearchProposalRejected;
use App\Models\MonthlyProgressGrade;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MonthlyProgressGradeController extends Controller
{
    public function store(Request $request)
    {
        $monthlyProgressGrade = new MonthlyProgressGrade();
        $monthlyProgressGrade->monthly_progress_id = $request->input('monthly_progress_id');
        $monthlyProgressGrade->grade = $request->input('grade');
        $monthlyProgressGrade->graded_by = auth()->user()->getRoleNames()->first();
        $monthlyProgressGrade->comments = $request->input('comments');
        $monthlyProgressGrade->save();

        if ($monthlyProgressGrade->grade == 'Poor' || $monthlyProgressGrade->grade == 'Satisfactory' || $monthlyProgressGrade->grade == 'Average') {
            $principalInvestigator = $monthlyProgressGrade->monthlyProgress->principalInvestigator;
            $principalInvestigator->is_ban = TRUE;
            $principalInvestigator->save();

            // sending rejected mail
            Mail::to($principalInvestigator->dean_email)->send(new ResearchProposalRejected($principalInvestigator));
        }

        return back()->with([
            Notification::make()
                ->title('Graded!')
                ->success()
                ->send()
        ]);
    }
}
