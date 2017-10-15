<?php

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
    return view('welcome');
});

/*
    Add to cart Functionnality
    Todo: Working on it.
*/
Route::get('/shop/add-to-cart/{productId}', 'ShopController@getAddToCart')->name('product-add');

Route::get('/shop/shopping-cart', 'ShopController@getCart')->name('shopping-cart');


Route::get('/shop/checkout', 'ShopController@getCheckout')->middleware('auth')->name('checkout');
Route::post('/shop/checkout', 'ShopController@proceedCheckout')->name('proceed-checkout');

Route::get('/shop', 'ShopController@index')->name('shop-all');

// Stripe
/*Route::post('/shop/proceed-checkout', 'ShopController@proceedCheckout')->name('proceed-checkout');*/

Route::get('/shop/{products_type}', 'ShopController@showProductType')->name('product-type');



/*
    Todo : Single product page with the option and the add cart functionnality.
*/
Route::get('/shop/{products_type}/{product_name}', 'ShopController@showProduct')->name('single-product');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
