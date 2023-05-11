<?php

use App\Http\Livewire\PrincipalInvestigators\PrincipalInvestigatorCreate;
use App\Http\Livewire\Reviewers\ReviewerCreate;
use App\Http\Livewire\Reviewers\ReviewerEdit;
use App\Http\Livewire\Users\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('users', UserIndex::class)->name('users.index');
Route::get('users/trash', UserIndex::class)->name('users.trash');

Route::get('principal-investigators/create', PrincipalInvestigatorCreate::class)->name('principal-investigators.create');

Route::get('reviewers/create', ReviewerCreate::class)
    ->name('reviewers.create');
Route::get('reviewers/{reviewer}/edit', ReviewerEdit::class)
    ->name('reviewers.edit');
