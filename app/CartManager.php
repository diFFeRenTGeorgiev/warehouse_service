<?php
/**
 * Created by PhpStorm.
 * User: georgiev
 * Date: 11.07.23
 * Time: 00:04
 */

namespace App;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartManager
{
    private static function createCart()
    {
        $cart = new Cart();
        if (Auth::check()) {
            $cart->user_id = Auth::id();
        }
        $cart->save();
        if (Auth::check()==false) {
            Cookie::queue('cart_id', $cart->id, 60*24*30); //1 month
        }
        $cart = Cart::where('id', $cart->id)->with('cartProducts')->first();
        return $cart;
    }

}