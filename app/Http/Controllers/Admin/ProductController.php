<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Product_file;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $product = new Product();
        $product->name = $request->product_name;
        $product->type_id = $request->product_type;
        $product->is_enabled = $request->status_active;
        $product->attribute_id = $request->attributtes;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->save();


        foreach ($request->file('product_files') as $file ){
            $prod_files = new Product_file();
            Storage::disk('media_files')->put('product_files/'.$product->id, $file);
            $prod_files->product_id = $product->id;
            $prod_files->name = $file->hashName();
            $prod_files->save();
        }
        return view('front.all_products');
    }
}
