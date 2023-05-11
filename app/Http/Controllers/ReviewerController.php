<?php

namespace App\Http\Controllers;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reviewers.index');
    }
}
