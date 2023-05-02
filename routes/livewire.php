<?php

use App\Http\Livewire\Users\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('users', UserIndex::class)->name('users.index');
Route::get('users/trash', UserIndex::class)->name('users.trash');
