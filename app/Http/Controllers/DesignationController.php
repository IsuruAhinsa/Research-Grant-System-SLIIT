<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use Filament\Notifications\Notification;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('designations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDesignationRequest $request)
    {
        Designation::create($request->all());
        return redirect()->route('designations.index')
            ->with([
                Notification::make()
                    ->title('Saved')
                    ->body('Designation was successfully created!')
                    ->success()
                    ->send()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('designations.edit')->with('designation', $designation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        $designation->update($request->all());
        return redirect()->route('designations.index')
            ->with([
                Notification::make()
                    ->title('Updated')
                    ->body('Designation was successfully updated!')
                    ->success()
                    ->send()
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        if ($designation) {
            $designation->delete();
        }

        return back()->with([
            Notification::make()
                ->title('Deleted')
                ->body('Designation was successfully deleted!')
                ->success()
                ->send()
        ]);
    }
}
