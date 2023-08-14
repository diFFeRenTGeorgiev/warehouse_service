<?php

namespace App\Providers;

use App\Constant\CookieConstant;
use App\FavoriteProductsManager;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('front.components.header', function ($view) {
            $view->with('favoriteIds', [FavoriteProductsManager::getIds()]);
        });

    }
}
