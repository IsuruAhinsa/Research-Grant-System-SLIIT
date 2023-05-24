<?php

namespace App\Http\Controllers;

class ReviewController extends Controller
{
    public function index()
    {
        return view('principal-investigators.reviews.index');
    }
}
