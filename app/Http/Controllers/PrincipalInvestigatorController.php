<?php

namespace App\Http\Controllers;

use App\Models\PrincipalInvestigator;
use App\Http\Requests\StorePrincipalInvestigatorRequest;
use App\Http\Requests\UpdatePrincipalInvestigatorRequest;

class PrincipalInvestigatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principal_investigators = PrincipalInvestigator::where('status', request()->status)->first();

        return view('principal-investigators.index')
            ->with('principal_investigators', $principal_investigators);
    }

    /**
     * Display the specified resource.
     */
    public function show(PrincipalInvestigator $principalInvestigator)
    {
        return view('principal-investigators.show')->with('principalInvestigator', $principalInvestigator);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrincipalInvestigator $principalInvestigator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrincipalInvestigatorRequest $request, PrincipalInvestigator $principalInvestigator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrincipalInvestigator $principalInvestigator)
    {
        //
    }
}
