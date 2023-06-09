<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $types = Type::all();
        $attributes = Attribute::all();
        $data = ['types' => $types,
            'attributes' => $attributes];
        return view('products.add_product_form',['data' => $data]);
    }

    public function createProduct(Request $request){
        dd($request);
    }
}
