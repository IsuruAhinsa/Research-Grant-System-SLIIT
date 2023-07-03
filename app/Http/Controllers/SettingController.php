<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function general(Request $request)
    {
        $request->validate([
            'budget' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $settings = Setting::getSettings();
        $settings->budget = $request->budget;
        $settings->start_date = $request->start_date;
        $settings->end_date = $request->end_date;
        $settings->save();

        return back();
    }
}
