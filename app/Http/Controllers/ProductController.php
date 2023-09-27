<?php

namespace App\Http\Controllers;

use App\FavoriteProductsManager;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProducts(Request $request){
        $categoryId = $request->category_id?$request->category_id:null;
        $where = '';
        if($categoryId != null) {
            $where ='WHERE products.type_id = '.$categoryId;
        }

       $products = DB::select("SELECT products.*,types.type_name,
          json_agg(product_files.name) product_card_img FROM products
          LEFT JOIN types on types.id = products.type_id
          inner JOIN product_files on product_files.product_id = products.id {$where}
          group by products.id,products.type_id,products.name,products.description,
          products.is_enabled,products.out_of_stock_days,products.attribute_id,products.warranty,
          products.regular_price,products.promotional_price,products.discount,products.quantity,products.created_at,
          products.updated_at,types.type_name
          order by products.id desc
         ");


        return view('front.all_products',['products' => $products]);
    }

    public function addFavorite(Request $request)
    {
//        dd($request->json('product_id'));
        FavoriteProductsManager::addProduct($request->json('product_id'));
        $responseContent = [
            'product_id' => $request->product_id,
            'message' => 'Продукта беше запазен в любими.'
        ];
        return json_encode(['content'=>$responseContent]);
    }

    public static function removeFavorite(Request $request)
    {
        FavoriteProductsManager::removeProduct($request->json('product_id'));
        $responseContent = [
            'product_id' => $request->product_id,
            'message' => trans('Продукта беше премахнат от любими.'),
        ];
        return json_encode(['content'=>$responseContent]);
    }

    public function show($productId){

        $product = Product::with('attributes')
            ->with('types')
            ->with('productFiles')
            ->find($productId);

        return view('products.product',[
            'product'=> $product,
            'type' => $product->types,
            'attribute' => $product->attributes,
            'files' => $product->productFiles
        ]);

    }

    function product_gallery_image($fileName, $styleType, $compressed = false, $width = null, $height = null, $protocol = null)
    {
        $path = \App\Constant\Catalog\ProductFileConstant::PRODUCT_GALLERY_STYLES[$styleType] . $fileName;

        if ($protocol) {
            $urlRoot = $protocol .domain().'/';
        } else {
            $urlRoot = '//' . domain() . '/';
        }


        if (!\File::exists(public_path($path))) {
            $originalFile = public_path(\App\Constant\Catalog\ProductFileConstant::PRODUCT_FILE_DIRECTORIES[\App\Constant\Catalog\ProductFileConstant::TYPE_GALLERY_IMAGE]) . $fileName;
            if (file_exists($originalFile)) {
                $pathToSave = public_path(\App\Constant\Catalog\ProductFileConstant::PRODUCT_GALLERY_STYLES[$styleType]);
                if (!file_exists($pathToSave)) {
                    mkdir($pathToSave, 0777, true);
                }
                $saveWorker = \Spatie\Image\Image::load($originalFile)
                    ->background('ffffff')
                    ->optimize();

                if ($compressed) {
                    $saveWorker->quality(75);
                }

                if (!empty($width) && !empty($height)) {
                    $saveWorker->fit(\Spatie\Image\Manipulations::FIT_FILL, $width, $height);
                }

                $saveWorker->save($pathToSave . $fileName);

                //$urlRoot = env('APP_URL') . '/';
            } else {
                // do nothing
            }
        } else {
            //$urlRoot = env('APP_URL') . '/';
        }

        return $urlRoot.$path;
    }

    public function showFavorites(){
        $favotiteIds = FavoriteProductsManager::getIds();

//        $products = Product::with('attributes')
//            ->with('types')
//            ->with(['productFiles' => function ($query) {
//                $query->select(DB::raw('json_agg(name) as product_card_img'));
//            }])
//            ->whereIn('id',$favotiteIds)
//        ->get();


        $products = DB::table('products')
            ->select(
                'products.*',
                'types.type_name',
                DB::raw('json_agg(product_files.name) as product_card_img')
            )
            ->leftJoin('types', 'types.id', '=', 'products.type_id')
            ->join('product_files', 'product_files.product_id', '=', 'products.id')
            ->whereIn('products.id',$favotiteIds)
            ->groupBy(
                'products.id',
                'products.type_id',
                'products.name',
                'products.description',
                'products.is_enabled',
                'products.out_of_stock_days',
                'products.attribute_id',
                'products.warranty',
                'products.regular_price',
                'products.promotional_price',
                'products.discount',
                'products.quantity',
                'products.created_at',
                'products.updated_at',
                'types.type_name'
            )
            ->orderBy('products.id', 'desc')
            ->get();
//dd($products);
         return view('products.favorites',[
            'products'=> $products
        ]);
    }

    public function searchFilter(Request $request){
        $category_id = $request->category_id;

//        $products = Product::with('attributes')
//            ->with('types')
//            ->with('productFiles')
//            ->where('type_id',$category_id)
//            ->get();

        $products = DB::select("SELECT products.*,types.type_name,
          json_agg(product_files.name) product_card_img FROM products
          LEFT JOIN types on types.id = products.type_id
          inner JOIN product_files on product_files.product_id = products.id
          where products.type_id = {$category_id}
          group by products.id,products.type_id,products.name,products.description,
          products.is_enabled,products.out_of_stock_days,products.attribute_id,products.warranty,
          products.regular_price,products.promotional_price,products.discount,products.quantity,products.created_at,
          products.updated_at,types.type_name
          order by products.id desc
         ");

        return view('products.searchByCategory',['products' => $products]);
//        dd($products);
    }
}
