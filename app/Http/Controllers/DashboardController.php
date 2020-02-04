<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function dashboard()  
    {
        $role = Role::create(['name' => 'writer 4']);
        $permission = Permission::create(['name' => 'edit articles 4']);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
        $role->syncPermissions($permission);
        $permission->syncRoles($role);

        $user = User::find(3);
        $permissionNames = $user->getPermissionNames();
        dd($permissionNames);
        return view('/dashboard')
        ->with('seccion', 'dashboard')
        ->with('subseccion', '')
        ->with('permissionNames', $permissionNames)
        ->with('subseccion', '')
        ;
    }
}
