<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.homepage');
})->name('front.index');
Route::get('tables/',function () {
    return view('stores.table');
})->name('web.index.createTable');
Route::get('products/', 'ProductController@showProducts')->name('tab_all_products');
Route::get('add_product/',function(){
    return view('products.add_product_form');
})->name('new_product_form');
Route::prefix('/users')->group(function () {
//    Route::post('register/', 'UserController@register')->name('register_form');
    Route::post('/register', 'Auth\RegisterController@register')->name('register_form');
    Route::post('login/', 'Auth\LoginController@log_in')->name('login_form');
    Route::get('auth/', function () {
        return view('auth.profil');
    })->name('login_tabs');
    Route::post('logout/','Auth\LoginController@logut')->name('logout_tabs');
});

Auth::routes();
Route::prefix('/ajax')->group(function () {
    Route::post('/favorite-products-add', 'ProductController@addFavourite')->name('ajax.ajaxRequest.post');
    Route::post('/favorite-products-remove', 'ProductController@aremoveFavourite')->name('ajax.removeFavorite');
});
Route::get('/home', 'HomeController@index')->name('home');
