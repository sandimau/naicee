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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/most-popular', 'HomeController@popular')->name('mostpopular');
Route::get('/product/{slug}', 'HomeController@detail')->name('detail');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/add-cart/{id}', 'HomeController@addCart')->name('product.addCart');

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('gallery', 'Admin\GalleryController');
    Route::resource('productDetail', 'Admin\ProductDetailController');
});
