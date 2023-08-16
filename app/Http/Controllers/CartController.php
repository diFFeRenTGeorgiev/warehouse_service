<?php

namespace App\Http\Controllers;

use App\CartManager;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        //list all products in the cart
        $cartData = CartManager::getCartData();
        return view('front.cart.cart', ['cartData' => $cartData, 'showShareProductList' => 'cart_products']);
    }

    public function addProduct(Request $request)
    {
        $product = CartManager::getProductPackSize($request->productId);
        if ($product != null and $product->quantity < $request->size_packing) {
            session()->flash('msg', 'Съжаляваме, няма достатъчно количество.!');
            return redirect()->back();
        }

        $cart = CartManager::getCartWithProducts();
        if (empty($cart)) {
            $cart = CartManager::createCart();
        }
        $cartProductsByKeyArr = !empty($cart->cartProducts) ? $cart->cartProducts->keyBy('product_id') : null;
        $existingCartProduct = !empty($cartProductsByKeyArr[$request->productId]) ? $cartProductsByKeyArr[$request->productId] : null;

        if (empty($existingCartProduct)) {
            $newCartProduct = new CartProduct();
            $newCartProduct->cart_id = $cart->id;
            $newCartProduct->product_id = $product->id;
            $newCartProduct->quantity = $request->size_packing;

            $newCartProduct->save();
        }

        $existingCartProduct != null ? $existingCartProduct->quantity = $existingCartProduct->quantity + $request->size_packing : null;

        $existingCartProduct != null ? $existingCartProduct->save() : null;
        $resultArr=[];
        try {
            $resultArr=['status' => 'success', 'cartId' => $cart->id];
        } catch (\Exception $ex) {
            $resultArr=['status' => 'error', 'error_message' => $ex->getMessage()];
        }

        return response()->json($resultArr);
    }

    public function changeProductQuantity(Request $request)
    {
        $resultArr = [];
        try {
            if (!ctype_digit($request->quantity)) {
                throw new \Exception(trans('Моля въведете цяло число.'));
            }
            CartManager::changeProductQuantity($request->productId, $request->quantity);
            $resultArr = ['status' => 'success'];
        } catch (\Exception $ex) {
            $resultArr = ['status' => 'error', 'error_message' => $ex->getMessage()];
        }

        return response()->json($resultArr);
    }

    public function emptyCart()
    {
        CartManager::emptyCart();
        return response()->json(['status' => 'success']);
    }

}
