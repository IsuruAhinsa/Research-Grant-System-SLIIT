<?php

use App\Http\Livewire\PrincipalInvestigators\PrincipalInvestigatorCreate;
use App\Http\Livewire\Users\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('users', UserIndex::class)->name('users.index');
Route::get('users/trash', UserIndex::class)->name('users.trash');

Route::get('principal-investigators/create', PrincipalInvestigatorCreate::class)->name('principal-investigators.create');
