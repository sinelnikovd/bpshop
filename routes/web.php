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

Route::get('/', "MainController@index");

Route::get('/auto/{id}', ["as" => "auto.page", "uses" => "AutoController@page"]);
Route::get('/autos/{id}', ["as" => "auto.index", "uses" => "AutoController@index"]);

Route::get('/product/{id}', ["as" => "product.page", "uses" => "ProductController@page"]);
Route::get('/shop/', ["as" => "product.shop", "uses" => "ProductController@shop"]);

Route::post('/addcart/', ["as" => "product.addcart", 'middleware' => 'auth', "uses" => "ProductController@addcart"]);
Route::get('/addcart/', function (){
    return redirect('/');
});

Route::get('/basket/', ["as" => "product.basket", 'middleware' => 'auth', "uses" => "ProductController@basket"]);

Route::post('/removecart/', ["as" => "product.removecart", 'middleware' => 'auth', "uses" => "ProductController@removecart"]);

Route::get('/addorder/', ["as" => "product.addorder", 'middleware' => 'auth', "uses" => "ProductController@addorder"]);

Route::get('/order/', ["as" => "product.order", 'middleware' => 'auth', "uses" => "ProductController@order"]);
Route::get('/page/{slug}', ["as" => "page", "uses" => "MainController@page"]);

Auth::routes();

