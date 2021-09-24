<?php

namespace App\Http\Controllers\cms\spatie;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    //
    public function index($id)
    {
        $roles = Role::paginate(10);
        $user = User::find($id);
        if ($user->roles->count() > 0) {
            foreach ($roles as $role) {
                $role->setAttribute('active', false);
                if ($user->hasRole($role)) {
                    $role->setAttribute('active', true);
                }
            }
        }
        return response()->view('cms.user.role', [
            'user' => $user,
            'roles' => $roles
        ]);
    }
    public function store(Request $request, $id){
        $validator = Validator($request->all(), [
            'role_id' => 'required|numeric|exists:roles,id'
        ]);
        if(!$validator->fails()){
            $user = User::findOrFail($id);
            $role = Role::findOrFail($request->get('role_id'));
            if($user->hasRole($role)){
                $isRevoked = $user->removeRole($role);
                return response()->json(['message'=> $isRevoked ? "Role Revoke Successfully" : "Failed to Revoke Role"], $isRevoked ? 200 : 400);
            }else{
                $isGiven = $user->assignRole($role);
                return response()->json(['message'=> $isGiven ? "Role Assign Successfully" : "Failed to assign Role"], $isGiven ? 200 : 400);
            }
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
        }
    }
}
