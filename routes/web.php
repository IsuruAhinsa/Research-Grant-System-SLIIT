<?php

use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DisbursementPlanController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\PrincipalInvestigatorController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\RoleController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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

    Route::get('principal-investigators/{user}/dashboard', [PrincipalInvestigatorController::class, 'dashboard'])
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
     * Reviewer Routes
     */
    Route::resource('reviewers', ReviewerController::class)->only('index');

    /**
     * Disbursement Plan Routes
     */

    Route::get('disbursement_plans/create/{principal_investigator_id}', [DisbursementPlanController::class, 'create'])
        ->name('disbursement_plans.create');

    Route::post('disbursement_plans/store', [DisbursementPlanController::class, 'store'])
        ->name('disbursement_plans.store');

    Route::view('disbursement_plans/success', 'disbursement-plans.success')
        ->name('disbursement_plans.success');
});
