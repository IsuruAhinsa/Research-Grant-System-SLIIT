<?php

use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\PrincipalInvestigatorController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    require __DIR__.'/livewire.php';

    Route::resource('users', UserController::class)->except(['index', 'show', 'destroy']);
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::resource('faculties', FacultyController::class)->except('show');
    Route::resource('designations', DesignationController::class)->except('show');

    Route::get('downloads', [DownloadController::class, 'index'])->name('downloads.index');
    Route::get('downloads/research_proposal_application_form', [DownloadController::class, 'downloadResearchProposalApplicationFrom'])
        ->name('downloads.research_proposal_application_form');
    Route::get('downloads/other_research_documents', [DownloadController::class, 'downloadOtherResearchDocument'])
        ->name('downloads.other_research_documents');

    Route::resource('principal-investigators', PrincipalInvestigatorController::class)->except(['create', 'store']);
});
