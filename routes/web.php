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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login','CustomAuthController@login')->middleware('alreadyLoggedIn');
Route::get('orders/orderDetails/{id}', 'OrderController@show')->middleware('isLoggedIn');
Route::resource('orders', 'OrderController')->middleware('isLoggedIn');
Route::resource('products', 'ProductController')->middleware('isLoggedIn');
Route::post('/getNumbers', 'OrderController@getMinimum')->middleware('isLoggedIn');
Route::post('login-user', 'CustomAuthController@loginUser');
Route::get('logout', 'CustomAuthController@logout');