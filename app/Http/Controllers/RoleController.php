<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role_manager()
    {
        // $role = Role::create(['name' => 'subscriber']);
        // $permission = Permission::create(['name' => 'image view']);

        $roles = Role::all();
        $permissions = Permission::all();
        $users = User::all();

        return view('backend.role.index', compact('permissions', 'roles', 'users'));
    }

    public function role_add_permission(Request $request)
    {
        $role_name = $request->role_name;
        $permission_name = $request->permission_name;
        $role = Role::where('name', $role_name)->first();
        // Assign Permission
        $role->syncPermissions($permission_name);

        return back();
    }

    public function role_add_user(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->syncRoles($request->role_name);
        return back();
    }

    public function edit_user_permission($id)
    {
        $user = User::findOrFail($id);
        $permissions = Permission::all();
        return view('backend.role.edit', compact('user', 'permissions'));
    }

    public function permission_change_user(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->syncPermissions($request->permissions);

        return back();
    }
}
