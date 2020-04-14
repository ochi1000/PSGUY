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
    return view('home');
});
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/admin','Admin\DashboardController@show','dashboard');

Route::get('/admin/products/categories','Admin\CategoryController@show','category');
Route::post('/admin/products/categories/create','Admin\CategoryController@create','create_category');

Route::get('/admin/products','Admin\ProductController@show','product');
Route::post('/admin/products/create','Admin\ProductController@create','create_product');

Route::get('/fixing', 'ServiceController@show','services');
Route::post('/fixing/save-fix-request', 'ServiceController@saveFixRequest','save_fix_request');
Route::get('/service', 'ServiceController@showCompletionForm','create_services');
Route::post('/fixing/edit-fix-request', 'ServiceController@editFixRequest','edit_fix_request');
Route::get('/fixing/{rowId}', 'ServiceController@getEditFixRequest','edit_fix_request');
Route::put('/fixing/{rowId}', 'ServiceController@updateFixRequest', 'update_fix_request');
Route::delete('/fixing/{rowId}', 'ServiceController@deleteFixRequest', 'delete_fix_request');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

Route::view('/{path?}','layouts.app');
