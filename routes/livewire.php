<?php

use App\Http\Livewire\DisbursementPlans\Payments;
use App\Http\Livewire\MonthlyProgress\MonthlyProgressCreate;
use App\Http\Livewire\MonthlyProgress\MonthlyProgressDetails;
use App\Http\Livewire\MonthlyProgress\MonthlyProgressTable;
use App\Http\Livewire\PrincipalInvestigators\PrincipalInvestigatorCreate;
use App\Http\Livewire\PrincipalInvestigators\Reviews\CreateReviewerFeedback;
use App\Http\Livewire\Users\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('users', UserIndex::class)->name('users.index');
Route::get('users/trash', UserIndex::class)->name('users.trash');

Route::get('principal-investigators/create', PrincipalInvestigatorCreate::class)
    ->name('principal-investigators.create');

Route::get('principal-investigators/{principalInvestigator}/reviewer-feedback/create', CreateReviewerFeedback::class)
    ->name('reviewer-feedback.create');

Route::get('principal-investigators/{principalInvestigator}/monthly-progress', MonthlyProgressTable::class)
    ->name('monthly-progress.index');

Route::get('principal-investigators/{principalInvestigator}/monthly-progress/create', MonthlyProgressCreate::class)
    ->name('monthly-progress.create');

Route::get('principal-investigators/{principalInvestigator}/monthly-progress/{monthlyProgress}/show', MonthlyProgressDetails::class)
    ->name('monthly-progress.show');

Route::get('disbursement_plans/{principalInvestigator}/payments', Payments::class)
    ->name('disbursement_plans.payments');
