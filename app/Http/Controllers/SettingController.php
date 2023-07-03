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
            'research_funding_year' => 'required|date_format:Y',
            'faculty_code' => 'required|string',
        ]);

        $settings = Setting::getSettings();
        $settings->budget = $request->budget;
        $settings->start_date = $request->start_date;
        $settings->end_date = $request->end_date;
        $settings->research_funding_year = $request->research_funding_year;
        $settings->faculty_code = $request->faculty_code;
        $settings->save();

        return back();
    }
}
