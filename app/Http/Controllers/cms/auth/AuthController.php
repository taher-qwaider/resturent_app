<?php

namespace App\Http\Controllers\cms\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getView(){
        return response()->view('cms.auth.login');
    }
    public function login(Request $request){
        $validator=Validator($request->all(), [
            'email'=>'required|email|exists:users,email',
            'password'=>'required|string|min:3',
            'remember_me'=>'boolean'
        ]);
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        if(!$validator->fails()){
            if(Auth::guard('user')->attempt($credentials, $request->get('remember_me'))){
//                User::where('email', $request->get('email'))->update(['isActive'=>true]);
                return response()->json(['massage'=>'Login Successfully'], 200);
            }else{
                return response()->json(['massage'=>'Failed to Login check Credentials'], 400);
            }
        }else{
            return response()->json(['massage'=>$validator->getMessageBag()->first()], 400);
        }
    }

    public function logout(){
        Auth('user')->logout();
        return redirect()->route('login.view');
    }
}
