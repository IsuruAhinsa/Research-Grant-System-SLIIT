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

    public function budget(Request $request)
    {
        $request->validate([
            'budget' => 'required|numeric|min:1'
        ]);

        $settings = Setting::getSettings();
        $settings->budget = $request->budget;
        $settings->save();

        return back();
    }
}
