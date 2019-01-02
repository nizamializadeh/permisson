<?php

namespace App\Http\Controllers\admin;

use App\Permission;
use App\Role;
use App\Role_Permission;
use App\User;
use App\User_Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $tables = DB::select('SHOW TABLES');
        $permissions = Permission::all();
        return view('admin.permission.index',compact('roles','tables','permissions'));
    }
    public function saveRolePermission(Request $request)
    {
        foreach ($request->permissions as $tableName => $permission)
        {
            foreach ($permission as $selectedPermission)
            {
                Role_Permission::create([
                    "table_name" => $tableName,
                    "role_id" => $request->role,
                    "permission_id" => $selectedPermission
                ]);
            }
        }
        return back();
    }
    public function roleadd()
    {
        $users=User::all();        $role=Role::all();

        return view('admin.role.index',compact('users','role'));
    }
    public function saveroleadd(Request $request)
    {
        User_Role::create([
            "role_id" => $request->role_id,
            "user_id" => $request->user_id
        ]);
        return back();

    }

}
