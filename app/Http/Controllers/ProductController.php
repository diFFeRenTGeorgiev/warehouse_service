<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProducts(){
//        $product = Product::where('id','>', 67)->get();
//        dd($product);
        return view('front.all_products');
    }
}
