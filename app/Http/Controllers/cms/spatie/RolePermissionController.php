<?php

namespace App\Http\Controllers\cms\spatie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    //
    public function index($id){
        $permissions =Permission::paginate(10);
        $role = Role::findById($id);
        if($role->permissions->count() >0){
            foreach($permissions as $permission){
                $permission->setAttribute('active', false);
                if($role->hasPermissionTo($permission)){
                    $permission->setAttribute('active', true);
                }
            }
        }
        return response()->view('cms.spatie.role.permission', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request, $id){
        $validator = Validator($request->all(), [
            'permission_id' => 'required|numeric|exists:permissions,id'
        ]);
        if(!$validator->fails()){
            $role = Role::findOrFail($id);
            $permission = Permission::findOrFail($request->get('permission_id'));
            if($role->hasPermissionTo($permission)){
                $isRevoked = $role->revokePermissionTo($permission);
                return response()->json(['message'=> $isRevoked ? "Permission Revoke Successfully" : "Failed to Revoke Permission"], $isRevoked ? 200 : 400);
            }else{
                $isGiven = $role->givePermissionTo($permission);
                return response()->json(['message'=> $isGiven ? "permission Assign Successfully" : "Failed to assign Permission"], $isGiven ? 200 : 400);
            }
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
        }
    }
}
