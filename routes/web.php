<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('mainPage');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/registration', 'index')->name('registration.view');
    Route::post('/registration', 'registerUser')->name('registration.register');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->middleware('auth')->name('profile.index');
    Route::get('/profile/tag', 'showByTag')->name('profile.showByTag');
    Route::get('/profile/{model}', 'show')->name('profile.show');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.view');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('product.index');
    Route::get('/products/create',  'create')->name('product.create');
    Route::get('/products/edit/{product}', 'edit')->name('product.edit');
    Route::post('/products/create', 'store')->name('product.store');
    Route::put('/products/edit/{product}', 'update')->name('product.update');
    Route::delete('/products/delete/{product}', 'delete')->name('product.delete');
});

Route::controller(ShopController::class)->group(function () {
    Route::get('/shops', 'index')->name('shop.index');
    Route::get('shops/create', 'create')->name('shop.create');
    Route::get('shops/edit/{shop}', 'edit')->name('shop.edit');
    Route::post('shops/create', 'store')->name('shop.store');
    Route::put('shops/edit/{shop}', 'update')->name('shop.update');
    Route::delete('shops/delete/{shop}', 'delete')->name('shop.delete');
});

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index')->name('tag.index');
    Route::get('/tags/create', 'create')->name('tag.create');
    Route::get('/tags/edit/{tag}', 'edit')->name('tag.edit');
    Route::post('/tags/create', 'store')->name('tag.store');
    Route::put('/tags/edit/{tag}', 'update')->name('tag.update');
    Route::delete('/tags/delete/{tag}', 'delete')->name('tag.delete');
});
