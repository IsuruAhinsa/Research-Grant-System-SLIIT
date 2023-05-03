<?php

namespace App\Http\Controllers;

use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allPermissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();
        return view('roles.create', [
            'allPermissions' => $allPermissions,
            'permissionGroups' => $permissionGroups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:roles',
        ], [
            'name.required' => 'Please give a role name for creating new role.',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->guard_name = 'web';
        $role->save();

        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions([$permissions]);
        }

        return redirect()
            ->route('roles.index')
            ->with([
                Notification::make()
                    ->title('Role Created!')
                    ->body($request->input('name') . ' added as a new role.')
                    ->success()
                    ->send()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        if ($role->name == 'Super Administrator') {
            return back()
                ->with([
                    Notification::make()
                        ->title('Unauthorized!')
                        ->body('Sorry! Can\'t modify super administrator permissions.')
                        ->warning()
                        ->send()
                ]);
        }

        $allPermissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();

        return view('roles.edit', [
            'allPermissions' => $allPermissions,
            'permissionGroups' => $permissionGroups,
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'max:50',
                Rule::unique('roles', 'name')->ignore($role->id),
            ],
        ],[
            'name.required' => 'Please give a Role name',
        ]);

        $permissions = $request->input('permissions');

        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.index')
            ->with([
                Notification::make()
                    ->title('Role Updated!')
                    ->body($role->name . ' role updated successfully!')
                    ->success()
                    ->send()
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->name == 'Super Administrator') {
            return back()
                ->with([
                    Notification::make()
                        ->title('Unauthorized!!')
                        ->body('Sorry! Can\'t delete super administrator permissions.')
                        ->warning()
                        ->send()
                ]);
        }

        $role->delete();
        return back()->with([
            Notification::make()
                ->title('Deleted')
                ->body('Role has been deleted.')
                ->success()
                ->send()
        ]);
    }
}
