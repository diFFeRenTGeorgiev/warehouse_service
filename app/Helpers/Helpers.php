<?php
//Helpers
//|
//-- Helpers.php


namespace app\Helpers; // define Helper scope

use Illuminate\Support\Facades\Auth;

class Helpers
{
   public static function is_admin()
{
//    dd(Auth::user());
    if(!empty(Auth::user())){
        if(Auth::user()->role_id != null){
            return true;
        }
    }
    return false;

}

}