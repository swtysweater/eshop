<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('categories', 'CategoryController');Route::resource('items', 'ItemController');Route::resource('cities', 'CityController');Route::resource('paymentmethods', 'PaymentMethodController');Route::resource('countries', 'CountryController');Route::resource('orders', 'OrderController');