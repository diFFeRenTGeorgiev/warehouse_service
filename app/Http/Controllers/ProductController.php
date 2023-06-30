<?php

namespace App\Http\Controllers;

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

    public function addFavourite($productId){
        dd(12);
    }
}
