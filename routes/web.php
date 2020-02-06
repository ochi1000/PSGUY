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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/admin','Admin\DashboardController@show','dashboard');

Route::get('/admin/products/categories','Admin\CategoryController@show','category');
Route::post('/admin/products/categories/create','Admin\CategoryController@create','create_category');

Route::get('/admin/products','Admin\ProductController@show','product');
Route::post('/admin/products/create','Admin\ProductController@create','create_product');

Route::view('/{path?}','layouts.app');
