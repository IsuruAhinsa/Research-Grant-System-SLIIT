<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use App\Models\Designation;
use App\Models\Faculty;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $faculties = Faculty::all();
        $designations = Designation::all();
        return view('users.create',[
            'roles' => $roles,
            'designations' => $designations,
            'faculties' => $faculties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->title = $request->input('title');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = e($request->input('email'));
        $user->index = $request->input('index');
        $user->faculty_id = $request->input('faculty');
        $user->designation_id = $request->input('designation');

        if ($request->filled('password')) {
            $password = $request->input('password');
        } else {
            $password = Str::random(10);
        }

        $user->password = Hash::make($password);

        if ($user->save()) {
            if ($request->input('roles')) {
                $user->assignRole($request->input('roles'));
            }

            // send notification to relevant user's email
            if ($request->input('roles') != "Principal Investigator") {
                Mail::to($request->input('email'))
                    ->send(new UserCreated($user, $password));
            }
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
        $faculties = Faculty::all();
        $designations = Designation::all();
        return view('users.edit',[
            'user' => $user,
            'roles' => $roles,
            'designations' => $designations,
            'faculties' => $faculties
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->title = $request->input('title');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = e($request->input('email'));
        $user->index = $request->input('index');
        $user->faculty_id = $request->input('faculty');
        $user->designation_id = $request->input('designation');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($user->save()) {
            $user->roles()->detach();
            if ($request->input('roles')) {
                $user->assignRole($request->input('roles'));
            }
        }

        return redirect()->route('users.index')->with([
            Notification::make()
                ->title('Updated')
                ->body('User was successfully updated!')
                ->success()
                ->send()
        ]);
    }
}
