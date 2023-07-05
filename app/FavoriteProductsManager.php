<?php

namespace App;

use App\Constant\CookieConstant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class FavoriteProductsManager extends Model
{
    public static function addProduct($productId)
    {
//        $idsArr=self::getIds();
        $idsArr = [];
        if (!in_array($productId, $idsArr)) {

            if(count($idsArr)>=40) { //protect DB column or cookie from overloading with ids
                array_shift($idsArr);
            }
            array_push($idsArr, $productId);
            $idsAsStr = implode(',',$idsArr);
            self::saveIdsInCookie($idsAsStr);
//            $user = auth()->user();
//            if(!empty($user)) {
//                self::saveIdsInDb($user->id, $idsAsStr);
//            }
//            else {
//                self::saveIdsInCookie($idsAsStr);
//            }
        }
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
        Cookie::queue(CookieConstant::FAVORITE_PRODUCTS_IDS, $idsAsStr, 500000, '/', $noWwwDomainName);

    }



    public static function getIds()
    {
        $idsArr=[];

        $user = auth()->user();

        //ako ima zapisani product ids v cookie i e lognat, trqbva da se prehvarlqt v bazata danni
        if(!empty(request()->cookie(CookieConstant::FAVORITE_PRODUCTS_IDS)) && !empty($user)) {
            self::mergeCookieWithDb();
        }

        $idsAsStr="";

        if(!empty($user)) {

            //get from cache
            if (Cache::tags(CacheTagConstant::FAVORITE_PRODUCTS_IDS)->has(self::getCacheId())) {
                $idsAsStr = Cache::tags(CacheTagConstant::FAVORITE_PRODUCTS_IDS)->get(self::getCacheId());
            }
            else {
                $idsFromDb = FavoriteProduct::where('user_id',$user->id)->first();
                if(!empty($idsFromDb)) {
                    $idsAsStr = $idsFromDb->product_ids;
                }

                Cache::tags(CacheTagConstant::FAVORITE_PRODUCTS_IDS)->put(self::getCacheId(), $idsAsStr, 60*60*24);
            }
        }
        else if(!empty(request()->cookie(CookieConstant::FAVORITE_PRODUCTS_IDS))) {
            $idsAsStr = request()->cookie(CookieConstant::FAVORITE_PRODUCTS_IDS);
        }

        $idsArr = self::explodeIds($idsAsStr);

        return $idsArr;
    }
}
