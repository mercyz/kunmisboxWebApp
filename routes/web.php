<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\HomeController@index')->name('front');
Route::get('/product/{product}', 'Frontend\HomeController@productDetail')->name('product.detail');
Route::get('/about', 'Frontend\HomeController@about')->name('about');
Route::get('/shop', 'Frontend\HomeController@shop')->name('shop');
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'adminaccess'], function () {
    Route::resource('products', 'Adminaccess\ProductsController');
    Route::resource('categories', 'Adminaccess\CategoriesController');
});
