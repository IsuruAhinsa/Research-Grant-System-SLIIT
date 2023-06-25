<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DisbursementPlanController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MonthlyProgressGradeController;
use App\Http\Controllers\PrincipalInvestigatorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::view('about', 'about')->name('about');

Route::view('contact', 'contact')->name('contact');

Route::post('request', [UserController::class, 'requestToLogin'])->name('request');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    require __DIR__.'/livewire.php';

    /**
     * User Routes
     */

    Route::resource('users', UserController::class)->except(['index', 'show', 'destroy']);

    /**
     * Role Routes
     */

    Route::resource('roles', RoleController::class)->except(['show']);

    /**
     * Faculty Routes
     */

    Route::resource('faculties', FacultyController::class)->except(['show', 'destroy']);

    /**
     * Designation Routes
     */

    Route::resource('designations', DesignationController::class)->except(['show', 'destroy']);

    /**
     * Download Routes
     */

    Route::get('downloads', [DownloadController::class, 'index'])->name('downloads.index');

    Route::get('downloads/research_proposal_application_form', [DownloadController::class, 'downloadResearchProposalApplicationFrom'])
        ->name('downloads.research_proposal_application_form');

    Route::get('downloads/other_research_documents', [DownloadController::class, 'downloadOtherResearchDocument'])
        ->name('downloads.other_research_documents');

    /**
     * Principal Investigator Routes
     */

    Route::resource('principal-investigators', PrincipalInvestigatorController::class)
        ->except(['create', 'store']);

    Route::view('principal-investigators/success/message', 'principal-investigators.success')
        ->name('principal-investigators.success');

    Route::get('principal-investigators/dashboard/overview', [PrincipalInvestigatorController::class, 'dashboard'])
        ->name('principal-investigators.dashboard');

    Route::get('principal-investigators/{principalInvestigator}/downloads/resume', [PrincipalInvestigatorController::class, 'downloadResume'])
        ->name('principal-investigators.downloads.resume');

    Route::get('principal-investigators/{principalInvestigator}/downloads/GrantProposal', [PrincipalInvestigatorController::class, 'downloadGrantProposal'])
        ->name('principal-investigators.downloads.GrantProposal');

    Route::get('principal-investigators/{principalInvestigator}/downloads/BudgetActivityPlan', [PrincipalInvestigatorController::class, 'downloadBudgetActivityPlan'])
        ->name('principal-investigators.downloads.BudgetActivityPlan');

    Route::get('principal-investigators/CoPrincipalInvestigator/{coPrincipalInvestigator}/downloads/resume', [PrincipalInvestigatorController::class, 'downloadCoPrincipalInvestigatorResume'])
        ->name('principal-investigators.co-principal-investigators.downloads.resume');

    Route::get('principal-investigators/ResearchAssistant/{researchAssistant}/downloads/resume', [PrincipalInvestigatorController::class, 'downloadResearchAssistantResume'])
        ->name('principal-investigators.research-assistant.downloads.resume');

    /**
     * Disbursement Plan Routes
     */

    Route::get('disbursement_plans/create/{principal_investigator_id}', [DisbursementPlanController::class, 'create'])
        ->name('disbursement_plans.create');

    Route::post('disbursement_plans/store', [DisbursementPlanController::class, 'store'])
        ->name('disbursement_plans.store');

    /**
     * Principal Investigator - Review Routes
     */
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');

    /**
     * Monthly Progress Grading Routes
     */
    Route::post('monthly-progress-grade/store', [MonthlyProgressGradeController::class, 'store'])
        ->name('monthly-progress.grade.store');

    /**
     * Report Routes
     */
    Route::get('reports/principal-investigator', [ReportController::class, 'showPrincipalInvestigatorReportsForm'])
        ->name('reports.principal-investigator');

    Route::get('reports/export/principal-investigators', [ReportController::class, 'exportPrincipalInvestigator'])
        ->name('reports.export.principal-investigators');

    Route::get('reports/export/principal-investigators/history', [ReportController::class, 'exportPrincipalInvestigatorHistory'])
        ->name('reports.export.principal-investigators.history');

    Route::get('reports/financial', [ReportController::class, 'showFinancialReportsForm'])
        ->name('reports.financial');

    Route::get('reports/export/financial', [ReportController::class, 'exportFinancial'])
        ->name('reports.export.financial');

    /**
     * Settings Routes
     */
    Route::get('settings', [SettingController::class, 'index'])
        ->name('settings.index');

    Route::post('settings/disbursement/budget', [SettingController::class, 'budget'])
    ->name('settings.disbursement.budget');
});
