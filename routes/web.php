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
    Todo : In this route / view the user must be able to see products by creation date
    Todo: And choose the category he wants to see.
*/
Route::get('/shop', 'ShopController@index');

/*
    Todo : All products of the type (men and women ?)
*/
Route::get('/shop/{products_type}', 'ShopController@showProductType')->name('product-type');

/*
    Todo : Single product page with the option and the add cart functionnality.
*/
Route::get('/shop/{products_type}/{product_name}', function() {});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
