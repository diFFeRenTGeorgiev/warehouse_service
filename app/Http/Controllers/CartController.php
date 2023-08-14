<?php

namespace App\Http\Controllers;

use App\CartManager;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
{
    //list all products in the cart
    $cartData=CartManager::getCartData();
    return view('front.cart.cart', ['cartData' => $cartData, 'showShareProductList' => 'cart_products']);
}

    public function addProduct(Request $request)
    {
        $resultArr=[];
        try {
            $cartId = CartManager::addProduct($request->productId, $request->quantity);
            $resultArr=['status' => 'success', 'cartId' => $cartId];
        } catch (\Exception $ex) {
            $resultArr=['status' => 'error', 'error_message' => $ex->getMessage()];
        }

        return response()->json($resultArr);
    }

    public function changeProductQuantity(Request $request)
    {
        $resultArr=[];
        try {
            if(!ctype_digit($request->quantity)) {
                throw new \Exception(trans('Моля въведете цяло число.'));
            }
            CartManager::changeProductQuantity($request->productId, $request->quantity);
            $resultArr=['status' => 'success'];
        } catch (\Exception $ex) {
            $resultArr=['status' => 'error', 'error_message' => $ex->getMessage()];
        }

        return response()->json($resultArr);
    }

    public function emptyCart()
    {
        CartManager::emptyCart();
        return response()->json(['status' => 'success']);
    }

}
