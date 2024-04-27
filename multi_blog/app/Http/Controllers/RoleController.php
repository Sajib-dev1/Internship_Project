<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function role_manag(){
        $permitions = Permission::all();
        $roles = Role::all();
        $users = User::all();
        return view('admin.role.role_manag',[
            'permitions'=>$permitions,
            'roles'=>$roles,
            'users'=>$users,
        ]);
    }

    function permition_store(Request $request){
        Permission::create(['name' => $request->permition]);

        return back();
    }

    function role_store(Request $request){
        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permission);

        return back();
    }

    function role_delete($id){
        Role::find($id);
        DB::table('role_has_permissions')->where('role_id',$id)->delete();
        Role::find($id)->delete();

        return back();
    }

    function role_edit($id){
        $role = Role::find($id);
        $permitions = Permission::all();
        return view('admin.role.role_edit',[
            'permitions'=>$permitions,
            'role'=>$role,
        ]);
    }

    function role_update(Request $request,$id){
        $role = Role::find($id);
        $role->syncPermissions($request->permission);

        return back();
    }

    function assin_role(Request $request){
        $users = User::find($request->user_id);
        $users->assignRole($request->role);

        return back();
    }

    function role_remove($id){
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        return back();
    }
}
