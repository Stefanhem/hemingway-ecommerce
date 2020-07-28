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

Route::get('/', 'HomeController@show');

Auth::routes();

/* Static pages */
Route::get('/about-us', 'StaticPagesController@about');
Route::get('/contact', 'StaticPagesController@contact');
Route::get('/legal', 'StaticPagesController@legal');


Route::resource('products', 'ProductsController');
Route::post('/add-cart/{id}', 'ProductsController@addCart');
Route::get('/checkout', 'OrderController@checkout');
Route::post('/order', 'OrderController@store');
Route::post('/remove-cart-item/{id}', 'ProductsController@removeFromCart');
Route::post('/contact-form', 'StaticPagesController@contactFormEmail');
