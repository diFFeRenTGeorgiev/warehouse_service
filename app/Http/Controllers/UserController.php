<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validateUserData($request);

        $user = User::where('email', '=', $request->user_email)->get();
        if ($user and count($user) > 0) {
            return "Вече има потребител с такъв имейл адрес!";
        }
        $user = new User();
        $user->first_name = $request->user_name;
        $user->last_name = $request->user_last_name;
        $user->email = $request->user_email;
        $user->password = Hash::make($request->pass);
        $user->phone = $request->phone;
        $user->save();

        return view('index');
    }

    private function validateUserData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:25',
            'user_last_name' => 'required|string|max:25',
            'user_email' => 'required|string|max:25',
            'phone' => 'required|string|max:10',
            'pass' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            dd($validator->getMessageBag()->getMessages());
            return redirect('auth.register_form')
                ->withErrors($validator->getMessageBag())
                ->withInput();
        }

    }

    public function login(Request $request){
        $user = User::where('email', '=', $request->user_email)->first();

        if (empty($user)) {
            return "Няма потребител с такъв имейл адрес!";
        }
        else {
            if($user->hasAnyRole()){
                return view('front.homepage',['user' => $user,'admin']);
            }
            else{
                return view('front.homepage',$user);
            }
        }
    }
}
