<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use Filament\Notifications\Notification;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('faculties.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        Faculty::create($request->all());
        return redirect()->route('faculties.index')->with([
            Notification::make()
                ->title('Saved')
                ->body('Faculty was successfully created!')
                ->success()
                ->send()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return view('faculties.edit')->with('faculty', $faculty);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->all());
        return redirect()->route('faculties.index')->with([
            Notification::make()
                ->title('Updated')
                ->body('Faculty was successfully updated!')
                ->success()
                ->send()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        if ($faculty) {
            $faculty->delete();
        }

        return back()->with([
            Notification::make()
                ->title('Deleted')
                ->body('Faculty was successfully deleted!')
                ->success()
                ->send()
        ]);
    }
}
