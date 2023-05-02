<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',[
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = e($request->input('email'));
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($user->save()) {
            if ($request->input('roles')) {
                $user->assignRole($request->input('roles'));
            }

            // TODO: send notification to relevant user's email
        }

        return redirect()->route('users.index')->with([
            Notification::make()
                ->title('Saved')
                ->body('User was successfully created!')
                ->success()
                ->send()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',[
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = e($request->input('email'));
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($user->save()) {
            $user->roles()->detach();
            if ($request->input('roles')) {
                $user->assignRole($request->input('roles'));
            }
        }

        // TODO: send notification to relevant user's email

        return redirect()->route('users.index')->with([
            Notification::make()
                ->title('Updated')
                ->body('User was successfully updated!')
                ->success()
                ->send()
        ]);
    }
}
