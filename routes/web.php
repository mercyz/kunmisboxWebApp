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

Route::get('/', 'Frontend\HomeController@index')->name('front');
Route::get('/about', 'Frontend\HomeController@index')->name('about');
Route::get('/shop', 'Frontend\HomeController@index')->name('shop');
Route::get('/contact', 'Frontend\HomeController@index')->name('contact');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'adminaccess'], function () {
    Route::resource('products', 'Adminaccess\ProductsController');
    Route::resource('categories', 'Adminaccess\CategoriesController');
});
