<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function accounts(){
        $users = User::with('roles')->get();
        return view('admin.accounts',['users' => $users]);
    }

    public function updateRole(Request $request){

        $userId = $request->json('user_id');
        $roleId = $request->json('role_id');

        if($roleId != 1){
            $roleId = 0;
        }
        $user = User::where('id',$userId)->first();
        $user->role_id = $roleId;
        $user->save();

    }
}
