<?php

namespace App\Http\Controllers;

use App\CartManager;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function addProduct(Request $request)
    {
        $qtty = $request->quantity;
        $productId = $request->productId;
        $product = CartManager::getProductPackSize($productId);
        if ($product != null and $product->quantity < $qtty) {
            session()->flash('msg', 'Съжаляваме, няма достатъчно количество.!');
            return redirect()->back();
        }

        $cart = CartManager::getCartWithProducts();
        if (empty($cart)) {
            $cart = CartManager::createCart();
        }

        $cartProductsByKeyArr = !empty($cart->cartProducts) ? $cart->cartProducts->keyBy('product_id') : null;
        $existingCartProduct = !empty($cartProductsByKeyArr[$productId]) ? $cartProductsByKeyArr[$productId] : null;

        if (empty($existingCartProduct)) {

            $newCartProduct = new CartProduct();
            $newCartProduct->cart_id = $cart->id;
            $newCartProduct->product_id = $productId;
            $newCartProduct->quantity = $qtty;

            $newCartProduct->save();
        }

        $existingCartProduct != null ? $existingCartProduct->quantity = $existingCartProduct->quantity + $qtty : null;

        $existingCartProduct != null ? $existingCartProduct->save() : null;

        $resultArr=[];
        try {
            $resultArr=['status' => 'success', 'cartId' => $cart->id];
        } catch (\Exception $ex) {
            $resultArr=['status' => 'error', 'error_message' => $ex->getMessage()];
        }

        return response()->json($resultArr);
    }

    public function index()
    {
        //list all products in the cart
        $cartData = CartManager::getCartData();

        return view('front.cart.cart', ['cartData' => $cartData, 'showShareProductList' => 'cart_products']);
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

    public function checkoutView(Request $request){
        $cartData = CartManager::getCartData();
//        dd($cartData);
        return view('front.cart.checkout',['cart' => $cartData, 'products' => $cartData['products']]);
    }

    public function saveOrder(Request $request){

        $rules = [
            'names' => 'required|string|max:30',
            'email' => 'required|string|max:30',
            'address' => 'string|max:30',
            'phone' => 'numeric|required',

        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cart = CartManager::getCartData();
        $order = new Order();
        $order->payment_amount = $cart['products_total_amount'];
        $order->city = $request->address;
        $order->user_id = !empty(auth()->user()->id)?auth()->user()->id:null;
        $order->status = 'pending';
        $order->save();
        $order->order_number = 10000 + $order->id;
        $order->save();

        CartManager::emptyCart();
        return view('front.cart.thank_you_page',['orderNumber' => $order->order_number]);
    }

}
