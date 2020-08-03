<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\HomeController@index')->name('front');
Route::get('/product/{product}', 'Frontend\HomeController@productDetail')->name('product.detail');
Route::get('/about', 'Frontend\HomeController@about')->name('about');
Route::get('/shop', 'Frontend\HomeController@shop')->name('shop');
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');
Route::get('/cat-search/{category}', 'Frontend\HomeController@search_by_category')->name('category.search');
Route::get('/search', 'Frontend\HomeController@search')->name('search');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminaccess', 'Adminaccess\DashboardController@showLoginForm')->name('alogin');
Route::group(['prefix' => 'adminaccess', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'Adminaccess\DashboardController@index')->name('dashboard');
    Route::resource('products', 'Adminaccess\ProductsController')->except('show');
    Route::post('products/image/{id}/remover', 'Adminaccess\ProductsController@productImage')->name('delProImage');
    Route::resource('categories', 'Adminaccess\CategoriesController')->except('show');
    Route::resource('adbanner', 'Adminaccess\AdbannerController')->except('show');
});
