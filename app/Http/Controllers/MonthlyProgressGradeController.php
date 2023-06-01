<?php

namespace App\Http\Controllers;

use App\Models\MonthlyProgressGrade;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

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

        return back()->with([
            Notification::make()
                ->title('Graded!')
                ->success()
                ->send()
        ]);
    }
}
