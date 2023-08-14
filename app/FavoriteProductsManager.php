<?php

namespace App;

use App\Constant\CookieConstant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
//use Symfony\Component\HttpFoundation\Cookie;

class FavoriteProductsManager extends Model
{
    public static function addProduct($productId)
    {

        $idsArr=self::getIds();
        if (!in_array($productId, $idsArr)) {
//dd(12);
            if(count($idsArr)>=40) { //protect DB column or cookie from overloading with ids
                array_shift($idsArr);
            }
            array_push($idsArr, $productId);
            $idsAsStr = implode(',',$idsArr);
            self::saveIdsInCookie($idsAsStr);
//            return redirect()->intended('/')->withCookie(cookie()->forever(CookieConstant::FAVORITE_PRODUCTS_IDS, $idsAsStr, 500000));
        }
    }

    public static function removeProduct($productId){

        $idsArr=self::getIds();
        if (in_array($productId, $idsArr)) {
            $newIdsArr = array_values(array_diff($idsArr, array($productId)));
            $idsAsStr = implode(',', $newIdsArr);
        }
        self::saveIdsInCookie($idsAsStr);
    }

    public static function saveIdsInDb($userId,$idsAsStr)
    {
        $idsInDb = FavoriteProduct::firstOrNew(['user_id' => $userId]);
        $idsInDb->product_ids = $idsAsStr;
        $idsInDb->save();
        //recache
        Cache::tags(CacheTagConstant::FAVORITE_PRODUCTS_IDS)->put(self::getCacheId(), $idsAsStr, 60*60*24);
    }

    public static function saveIdsInCookie($idsAsStr)
    {
        $noWwwDomainName=str_replace("www.",".",request()->getHost());
        Cookie::queue(CookieConstant::FAVORITE_PRODUCTS_IDS, $idsAsStr, 500000, '/',$noWwwDomainName);
    }

//    private  static function explodeIds($idsAsStr){
//
//        $arrIds = explode(',', $idsAsStr);
//
//        return $arrIds;
//    }

    private static function explodeIds($idsAsStr)
    {
        return array_filter(explode(',',$idsAsStr),'strlen'); //array_filter($arr,'strlen') removes empty elements
    }
    public static function getIds()
    {
        $idsArr=[];
        if(!empty(request()->cookie(CookieConstant::FAVORITE_PRODUCTS_IDS))) {
            $idsAsStr = request()->cookie(CookieConstant::FAVORITE_PRODUCTS_IDS);
            $idsArr = self::explodeIds($idsAsStr);
        }
        return $idsArr;
    }
}