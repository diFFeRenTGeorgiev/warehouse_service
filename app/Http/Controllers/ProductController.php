<?php

namespace App\Http\Controllers;

use App\FavoriteProductsManager;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProducts(){
       $products = DB::select('SELECT products.*,types.type_name,product_files.name as product_card_img FROM products
          LEFT JOIN types on types.id = products.type_id
          inner JOIN product_files on product_files.product_id = products.id
          order by products.id desc
         ');

//        dd($products);
        return view('front.all_products',['products' => $products]);
    }

    public function addFavourite(Request $request)
    {
//        dd($request->json('product_id'));
        FavoriteProductsManager::addProduct($request->json('product_id'));
        $responseContent = [
            'product_id' => $request->product_id,
            'message' => trans('Продукта беше запазен в любими.'),
        ];
        return json_encode(['content'=>$responseContent]);
    }

    public static function removeProduct($productId)
    {
        $idsArr=self::getIds();
        if (in_array($productId, $idsArr)) {
            $user = auth()->user();
            $newIdsArr=array_values(array_diff($idsArr, array($productId)));
            $idsAsStr = implode(',',$newIdsArr);
            if(!empty($user)) {
                self::saveIdsInDb($user->id, $idsAsStr);
            }
            else {
                self::saveIdsInCookie($idsAsStr);
            }
        }
    }
}
