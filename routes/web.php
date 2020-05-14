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

Route::get('/logout', function () {
    Auth::logout();
    return view('home');
});
// Route::get('/home', 'HomeController@index')->name('home');
//Auth
Auth::routes();
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::post('/adduserinfo', 'ServiceController@addUserInfo');

//Fixing ROutes
Route::get('/fixing', 'ServiceController@show','fixing');
Route::post('/fixing/save-fix-request', 'ServiceController@saveFixRequest','save_fix_request');
Route::post('/fixing/edit-fix-request', 'ServiceController@editFixRequest','edit_fix_request');
Route::get('/fixing/{rowId}', 'ServiceController@getEditFixRequest','edit_fix_request');
Route::put('/fixing/{rowId}', 'ServiceController@updateFixRequest', 'update_fix_request');
Route::delete('/fixing/{rowId}', 'ServiceController@deleteFixRequest', 'delete_fix_request');

//Checkout Route
Route::get('/checkout', 'ServiceController@showCompletionForm','create_services');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

//About us
Route::get('/about-us', function () {
    return view('aboutus');
});

//Terms and Conditions, Privacy Policy
Route::get('/terms-n-conditions', function () {
    return view('termsnconditions');
});

//Shop
Route::get('/shop', function () {
    return view('shop');
});

//Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Not Found Routes
Route::view('/{path?}','home');


