<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Reviewer;
use App\Http\Requests\StoreReviewerRequest;
use App\Http\Requests\UpdateReviewerRequest;
use Filament\Notifications\Notification;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reviewers.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviewer $reviewer)
    {
        return view('reviewers.edit', ['reviewer' => $reviewer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewerRequest $request, Reviewer $reviewer)
    {
        dd($request->all());
    }
}
