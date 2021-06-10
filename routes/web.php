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
    return view('index');
})->name('index')->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

Route::get('/item', [App\Http\Controllers\ItemController::class, 'indexSite'])->name('item');

Route::get('/add-item/{id}', [App\Http\Controllers\HomeController::class, 'addItem'])->name('add-item');

Route::get('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart-add');

Route::get('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart-remove');

Route::get('/cart/removeall/{id}', [App\Http\Controllers\CartController::class, 'removeAll'])->name('cart-remove-all');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

Route::get('/cart/proceed', [App\Http\Controllers\CartController::class, 'proceed'])->name('cart-proceed');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/newaddress', [App\Http\Controllers\ProfileController::class, 'addAddress'])->name('new-address');
Route::post('/profile/newaddress', [App\Http\Controllers\ProfileController::class, 'addAddress']);
Route::get('/profile/changeaddress', [App\Http\Controllers\ProfileController::class, 'changeAddress'])->name('change-address');
Route::post('/profile/changeaddress', [App\Http\Controllers\ProfileController::class, 'changeAddress']);

Route::get('/profile/newcard', [App\Http\Controllers\ProfileController::class, 'addCard'])->name('new-card');
Route::post('/profile/newcard', [App\Http\Controllers\ProfileController::class, 'addCard']);
Route::get('/profile/changecard', [App\Http\Controllers\ProfileController::class, 'changeCard'])->name('change-card');
Route::post('/profile/changecard', [App\Http\Controllers\ProfileController::class, 'changeCard']);

Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/{id}', [App\Http\Controllers\CatalogController::class, 'category'])->name('category');