<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;
use App\User;

class RolesPermissionsUsersController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $users = User::all();
        return view('roles_permissions_users.rolespermissionsusers',compact('roles','permissions','users'));
    }

    public function rolesandpermissionsstore(Request $request){
        foreach($request->roles as $role){
            $role_to_change = Role::find($role);
            $role_to_change->syncPermissions($request->permissions);
        }
        return redirect('/rolespermissionsusers/view');
    }

    public function rolesandusersstore(Request $request){
        foreach($request->users as $user){
            $user_to_change = User::find($user);
            foreach($request->roles as $role){
              $user_to_change->attachRole($role);
            }

        }
        return redirect('/rolespermissionsusers/view');
    }

    public function usersandpermissionstore(Request $request){
        foreach($request->users as $user){
            $user_to_change = User::find($user);
            $user_to_change->syncPermissions($request->permissions);
        }
        return redirect('/rolespermissionsusers/view');
    }
    public function index()
    {
      $roles = Role::all();
      $permissions = Permission::all();
      $users = User::all();
      return view('roles_permissions_users.index',compact('roles','permissions','users'));
    }
}
