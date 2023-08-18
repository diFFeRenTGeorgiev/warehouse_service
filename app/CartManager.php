<?php
/**
 * Created by PhpStorm.
 * User: georgiev
 * Date: 11.07.23
 * Time: 00:04
 */

namespace App;


use App\Constant\CacheTagConstant;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartManager
{
    private static $cartData=[];

    public static function getCartData()
    {

        //to avoid attaching to login event do check if carts merge is needed every time when get the cart data
        if(!empty(request()->cookie('cart_id')) && Auth::check()) {
            self::mergeCarts();
        }

//        if(empty(self::getCartCacheId())) { //on the very first request when user still does not have a session cookie
//            return [];
//        }


//        // get from cache only if no discount code is applied
//        if(empty(request()->discount_code)) {
//            if (Cache::tags(CacheTagConstant::USERS_CARTS)->has(self::getCartCacheId())) {
//                return Cache::tags(CacheTagConstant::USERS_CARTS)->get(self::getCartCacheId());
//            }
//        }

//        dd(!empty(request()->cookie('cart_id')) && Auth::check());
        $cartWithProducts = self::getCartWithProducts();
        if(empty($cartWithProducts)) {
            return [];
        }

        self::$cartData=[];
        self::$cartData['id']=$cartWithProducts->id;
        self::$cartData['products']=[];
        //load product details
        $cartProductsTmp = $cartWithProducts->cartProducts;
        $cartProducts = [];
        foreach ($cartProductsTmp as $cp) {
            if (key_exists($cp->product_id, $cartProducts)) {
                $cartProducts[$cp->product_id]->quantity += $cp->quantity;
                continue;
            }
            $cartProducts[$cp->product_id] = $cp;
        }

        foreach($cartProducts as $cartProduct) {
            try {
                self::$cartData['products'][$cartProduct->product_id]=self::getProductDetails($cartProduct->product_id);
                self::$cartData['products'][$cartProduct->product_id]['quantity']=$cartProduct->quantity;
            } catch (\Throwable $th) {
                self::removeProduct($cartProduct->product_id);
            }
        }

        //calculate cart products count and total amount
        $cartProductsCount=0;
        $totalAmount=0;
        foreach (self::$cartData['products'] as $cartProduct) {
            $cartProductsCount = $cartProductsCount + $cartProduct['quantity'];
            $totalAmount = $totalAmount + $cartProduct['price'] * $cartProduct['quantity'];
        }
        self::$cartData['count']=$cartProductsCount;
        self::$cartData['products_total_amount']=$totalAmount;

        $productsCollection = Product::find(array_keys(self::$cartData['products']));
//        self::$cartData['delivery_time']=DeliveryPeriod::determineProductsCollectionDeliveryPeriod($productsCollection);

//        Cache::tags(CacheTagConstant::USERS_CARTS)->put(self::getCartCacheId(), self::$cartData, 60*60);

        return self::$cartData;
    }

    public static function clearCache()
    {
//        Cache::tags(CacheTagConstant::USERS_CARTS)->forget(self::getCartCacheId());
    }

    private static function getCartCacheId()
    {
        return "cart_".session()->getId();
    }

    /**
     * getCartWithProducts
     * get the cart with added products from DB or null
     * @return null|Illuminate\Database\Eloquent\Collection
     */
    public static function getCartWithProducts()
    {
        $cart = null;
        if (Auth::check()) { // The user is logged in get cart by user_id
            $cart = Cart::where('user_id', Auth::id())
                ->with('cartProducts')->first();
        }
        else if(!empty(request()->cookie('cart_id'))) {
            $cart = Cart::where('id', request()->cookie('cart_id'))
                ->with('cartProducts')->first();
        }
        return $cart;
    }

    /**
     * createCart new cart and return the model instance as result
     *
     * @return instance of Cart model with CartProducts relation
     */
    public static function createCart()
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

    private static function getProductDetails($productId)
    {
        $product = Product::with('attributes')->with('types')->find($productId);
//        $isGift = ProductGift::where('gift_product_id', $productId)-> count() > 0;
//
//        $currentProductPrice=ProductPrice::getCurrentPrice($product, ProductPrice::applyLoyalPrice()); //return regular promo or loyal price

        //apply discount code
//        if(!empty(request()->discount_code)) {
////            $discountCodeCheck=DiscountCodeManager::checkCodeOnCheckout(request()->discount_code);
//
//            if($discountCodeCheck['status']=='valid') {
//                $discountCodeObj = $discountCodeCheck['discount_code_obj'];
//                $discountCodeId=$discountCodeObj->id;
//                $discountPercent=$discountCodeObj->percent;
//                $discountCode=$discountCodeObj->code;
//                $discountCodeForProductIds=unserialize($discountCodeObj->products);
//                $canApplyOnPromoPrice = false;
//
//                if ($discountCodeObj->on_promo_price == 1) {
//                    $canApplyOnPromoPrice = true;
//
//                    $discountedPrice = $currentProductPrice*((100-$discountPercent)/100);
//                    $discountCodeValue = $currentProductPrice - $discountedPrice;
//                } else {
//                    $discountedPrice = $productTranslation->regular_price*((100-$discountPercent)/100);
//                }
//
//                if (empty($discountCodeForProductIds)) {
//                    //discount code se prilaga samo na produkti, koito ne sa v promotsia (promotional_price=0)
//                    if($productTranslation->promotional_price==0 && $discountedPrice<$currentProductPrice) {
//                        $currentProductPrice=$discountedPrice;
//
//                        self::applyDiscountDataToCart($discountCode, $discountCodeId, $discountPercent);
//                        $isUsedDiscountCode=true;
//                    }
//                    if($canApplyOnPromoPrice == true && $discountedPrice<$currentProductPrice) {
//                        $currentProductPrice=$discountedPrice;
//
//                        self::applyDiscountDataToCart($discountCode, $discountCodeId, $discountPercent);
//                        $isUsedDiscountCode=true;
//                    }
//                } else {
//                    //apply discount only on specific products
//                    if ($productTranslation->promotional_price==0 && in_array($productId, $discountCodeForProductIds) && $discountedPrice < $currentProductPrice) {
//                        $currentProductPrice=$discountedPrice;
//
//                        self::applyDiscountDataToCart($discountCode, $discountCodeId, $discountPercent);
//                        $isUsedDiscountCode=true;
//                    }
//                }
//            }
//        }
//
//        $discountValue = $productTranslation->regular_price-$currentProductPrice;
//dd($product);
//        //get first gallery image if exist
//        $firstGalleryImageName=null;
//        $firstGalleryImage=$product->getGalleryFiles()->first();
//        if(!empty($firstGalleryImage)) {
//            $firstGalleryImageName=$firstGalleryImage->name;
//        }
//        dd($product->types->type_name);
        $productDetails = [
//            'sku'=>$product->sku,
            'type'=>$product->types->type_name,
//            'weight'=>$product->weight,
//            'weight_units'=>$product->weight_units,
            'price'=>$product->regular_price,
            'promoPrice'=>$product->promotional_price,
//            'discount_code_value' => $discountCodeValue,
            'item_delivery_time'=>$product->out_of_stock_days,
//            'image'=>$firstGalleryImageName,
            'pack_size'=>$product->quantity,
//            'carrying_elevator_price'=>$productTranslation->carrying_elevator_price,
//            'is_gift' => $isGift,
//            'stamp' => $product->stamp
        ];
        return $productDetails;
    }

    public static function canGetLoyalPriceForProduct($cartProductArr)
    {
        if($cartProductArr['loyal_client_price']>0 && $cartProductArr['regular_price']!=$cartProductArr['loyal_client_price']) {
            return true;
        }
        return false;
    }

    public static function isProductAddedOnLoyalPrice($cartProductArr)
    {
        if($cartProductArr['loyal_client_price']>0 && $cartProductArr['price']==$cartProductArr['loyal_client_price']) {
            return true;
        }
        return false;
    }

    public static function getProductPackSize($productId)
    {
        $product = Product::where('id',$productId )->first();
        return $product;
    }

    private static function mergeCarts()
    {
        /*Shema za merge
        Ako v bazata ima kolichka za cookie.cart_id i za user->id,
        produktite za kolichkata svarzana s cookie.cart_id se prehvarlqt kym kolichkata za user->id
        i nakraq kolichkata s cookie.cart_id se iztriva
        */
        if(empty(request()->cookie('cart_id')) || Auth::check()==false) {
            return;
        }

        $cartByCookieId = Cart::where('id', request()->cookie('cart_id'))->with('cartProducts')->first();

        $cartByUserId = Cart::where('user_id', Auth::id())->with('cartProducts')->first();

        if($cartByCookieId!=null && $cartByUserId!=null) {
            CartProduct::where('cart_id', $cartByCookieId->id)
                ->update(['cart_id' => $cartByUserId->id]);
            $cartByCookieId->delete();
        }
        else if($cartByCookieId!=null && $cartByUserId==null) {
            $cartByCookieId->user_id = Auth::id();
            $cartByCookieId->save();
        }

        Cookie::queue(Cookie::forget('cart_id'));
        self::clearCache();
    }

    /**
     * addProduct add product to cart
     *
     * @param int $productId
     * @param int $quantity
     * @return integer|exception  //true on success and exception if fail
     * @throws \Exception
     */
    public static function addProduct($productId, $quantity,$request)
    {
        $qtty = Product::where('id',$productId)->get('quantity')->first();
        if($qtty != null and $qtty->quantity < $quantity) {
           session()->flash('msg', 'Съжаляваме, няма достатъчно количество.!');
    return redirect()->back();
//            throw new \Exception('Съжаляваме, няма достатъчно количество.');
        }

        $productPackSize=self::getProductPackSize($productId);

        if($quantity<$productPackSize || ($quantity%$productPackSize)!==0) {
            throw new \Exception(trans('Грешно въведено количесто. Броя на поръчаните продукти трябва да е кратен на :productPackSize', ['productPackSize'=>$productPackSize]));
        }

        $cart = self::getCartWithProducts();
        if(empty($cart)) {
            $cart = self::createCart();
        }

        $cartProductsByKeyArr = $cart->cartProducts->keyBy('product_id');
        $existingCartProduct = !empty($cartProductsByKeyArr[$productId]) ? $cartProductsByKeyArr[$productId] : null;

        if(empty($existingCartProduct)) {
            $newCartProduct = new CartProducts();
            $newCartProduct->cart_id = $cart->id;
            $newCartProduct->product_id = $productId;
            $newCartProduct->quantity = $quantity;

            $newCartProduct->save();

            try {
                $product = Product::where('id', $productId)->first();
                if ($product->gifts()->exists()) {
                    foreach ($product->gifts as $gift) {
                        $newCartGiftProduct = new CartProducts();
                        $newCartGiftProduct->cart_id = $cart->id;
                        $newCartGiftProduct->product_id = $gift->gift_product_id;
                        $newCartGiftProduct->quantity = $gift->quantity;

                        $newCartGiftProduct->save();
                    }
                }
            } catch (\Throwable $th) {

            }
        }
        else {
            // update product quantity
            $existingCartProduct->quantity = $existingCartProduct->quantity + $quantity;
            $existingCartProduct->save();
            self::changeGiftProductQuantity($existingCartProduct->product_id, $existingCartProduct);
        }
        self::clearCache();

        return $cart->id;
    }

    /**
     * changeProductQuantity - change product quantity in the cart
     * if $quantityChange>0 product quantity will be updated
     * if $quantityChange<=0 product will be removed from the shopping cart
     * @param  int $productId
     * @param  int $quantityChange
     * @return true|exception  //true on success and exception if fail
     */
    public static function changeProductQuantity($productId, $quantityChange)
    {
        if(ProductStockManager::canOrderProductsNumber($productId) < $quantityChange) {
            throw new \Exception(trans('Съжаляваме, няма достатъчно количество.'));
        }

        $productPackSize=self::getProductPackSize($productId);

        if($quantityChange>0 && ($quantityChange<$productPackSize || ($quantityChange%$productPackSize)!==0)) {
            throw new \Exception(trans('Грешно въведено количесто. Броя на поръчаните продукти трябва да е кратен на :productPackSize.', ['productPackSize'=>$productPackSize]));
        }

        $existingCartProduct = self::getCartProduct($productId);
        if(!empty($existingCartProduct)) {
            if($quantityChange<=0) {
                self::deleteGiftProduct($productId,$existingCartProduct->created_at);
                self::deleteCartProducts($productId);
            } else {
                $existingCartProduct->quantity = $quantityChange;
                $existingCartProduct->save();

                self::changeGiftProductQuantity($productId, $existingCartProduct);
            }
        }

        self::clearCache();
        return true;
    }

    public static function deleteCartProducts($productId){
        $cart = self::getCartWithProducts();
        $cartProductsByKeyArr = $cart->cartProducts;
        foreach ($cartProductsByKeyArr as $cartProduct) {
            if ($cartProduct->product_id == $productId) {
                $cartProduct->delete();
            }
        }
    }

    /**
     * @param $productId
     * @param $existingCartProduct
     * Change gift product quantity in cart
     */
    public static function changeGiftProductQuantity($productId, $existingCartProduct) {
        $product = Product::where('id', $productId)->first();
        if ($product->gifts()->exists()) {
            foreach ($product->gifts as $gift) {
                $giftProduct = self::getGiftCartProduct($gift->gift_product_id,$existingCartProduct->created_at);
                if (!empty($giftProduct)) {
                    $giftProduct->quantity = $existingCartProduct->quantity * $gift->quantity;
                    $giftProduct->save();
                }
            }
        }

        self::clearCache();
    }

    /**
     * @param $productId
     * Delete gift product from cart when deleting main product
     */
    public static function deleteGiftProduct($productId,$created_at) {
        $product = Product::where('id', $productId)->first();
        if ($product->gifts()->exists()) {
            foreach ($product->gifts as $gift) {
                $giftProduct = self::getGiftCartProduct($gift->gift_product_id, $created_at);
                if (!empty($giftProduct)) {
                    $giftProduct->delete();
                }
            }
        }

    }

    public static function removeProduct($productId)
    {
        $existingCartProduct = self::getCartProduct($productId);
        if(!empty($existingCartProduct)) {
            $existingCartProduct->delete();
        }
        self::clearCache();
        return true;
    }

    public static function getCartProduct($productId)
    {
        $cart = self::getCartWithProducts();
        $cartProductsByKeyArr = $cart->cartProducts->keyBy('product_id');
        return !empty($cartProductsByKeyArr[$productId]) ? $cartProductsByKeyArr[$productId] : null;
    }

    public static function getGiftCartProduct($productId,$created_at)
    {
        $cart = self::getCartWithProducts();
        $cartProductsByKeyArr = $cart->cartProducts->where('created_at','=',$created_at)->keyBy('product_id');
        return !empty($cartProductsByKeyArr[$productId]) ? $cartProductsByKeyArr[$productId] : null;
    }

    public static function emptyCart()
    {
        $cart = self::getCartWithProducts();
        if(!empty($cart)) {
            CartProducts::where('cart_id', $cart->id)->delete();
        }
        self::clearCache();
    }

    public static function isCartProductsStockChanged()
    {
        $isCartProductsStockChanged=false;

        $cartData = self::getCartData();

        if(array_key_exists("products",$cartData)) {
            //sync cart product quantities with available products stock
            foreach ($cartData['products'] as $productId => $cartProduct) {
                $productStock = ProductStockManager::canOrderProductsNumber($productId);
                if($cartProduct['quantity']>$productStock) {
                    CartManager::changeProductQuantity($productId, $productStock);
                    $isCartProductsStockChanged=true;
                }
            }
        }

        return $isCartProductsStockChanged;
    }

    public static function isCartProductsQuarantined()
    {
        $isCartProductsQuarantined=false;

        $cartData = self::getCartData();

        if(array_key_exists("products",$cartData)) {
            //sync cart product quantities with available products stock
            foreach ($cartData['products'] as $productId => $cartProduct) {
                $quarantined = QuarantinedProduct::where('product_id', $productId)
                    ->where('has_expired', 0)
                    ->first();
                if($quarantined){
                    self::removeProduct($productId);
                    $isCartProductsQuarantined=true;
                }
            }
        }

        return $isCartProductsQuarantined;
    }

    public static function isCartEmpty()
    {
        $cartData = self::getCartData();
        if(empty($cartData)) {
            return true;
        }
        else if(empty($cartData['products'])) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function applyDiscountDataToCart($discountCode, $discountCodeId, $discountPercent) {
        self::$cartData['discount_code']=$discountCode;
        self::$cartData['discount_code_id']=$discountCodeId;
        self::$cartData['discount_code_percent']=$discountPercent;
    }

}