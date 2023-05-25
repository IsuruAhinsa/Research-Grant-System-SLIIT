<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return view('principal-investigators.reviews.index', [
            'items' => request()->status == 'requested' ? $this->getRequestedItems() : $this->getAcceptedItems(),
            'accepted_count' => $this->getAcceptedCount(),
            'requested_count' => $this->getRequestedCount(),
        ]);
    }

    public function getAcceptedCount()
    {
        return Auth::user()
            ->principal_investigators()
            ->wherePivot('is_accepted', true)
            ->count();
    }

    public function getRequestedCount()
    {
        return Auth::user()
            ->principal_investigators()
            ->wherePivotNull('is_accepted')
            ->count();
    }

    public function getAcceptedItems()
    {
        return Auth::user()
            ->principal_investigators()
            ->wherePivot('is_accepted', true)
            ->get();
    }

    public function getRequestedItems()
    {
        return Auth::user()
            ->principal_investigators()
            ->wherePivotNull('is_accepted')
            ->get();
    }
}
