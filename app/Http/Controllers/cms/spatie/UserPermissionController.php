<?php

namespace App\Http\Controllers\cms\spatie;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserPermissionController extends Controller
{
    //
    public function index($id)
    {
        $permissions = Permission::paginate(10);
        $user = User::find($id);
        if ($user->permissions->count() > 0) {
            foreach ($permissions as $permission) {
                $permission->setAttribute('active', false);
                if ($user->hasPermissionTo($permission)) {
                    $permission->setAttribute('active', true);
                }
            }
        }
        return response()->view('cms.user.permission', [
            'user' => $user,
            'permissions' => $permissions
        ]);
    }
    public function store(Request $request, $id){
        $validator = Validator($request->all(), [
            'permission_id' => 'required|numeric|exists:permissions,id'
        ]);
        if(!$validator->fails()){
            $user = User::findOrFail($id);
            $permission = Permission::findOrFail($request->get('permission_id'));
            if($user->hasPermissionTo($permission)){
                $isRevoked = $user->revokePermissionTo($permission);
                return response()->json(['message'=> $isRevoked ? "Permission Revoke Successfully" : "Failed to Revoke Permission"], $isRevoked ? 200 : 400);
            }else{
                $isGiven = $user->givePermissionTo($permission);
                return response()->json(['message'=> $isGiven ? "permission Assign Successfully" : "Failed to assign Permission"], $isGiven ? 200 : 400);
            }
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
        }
    }
}
