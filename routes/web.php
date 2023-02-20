<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/shop', function () {
    return view('user.shop');
});

Route::get('/product', function () {
    return view('user.product');
});

Route::get('/cart', function () {
    return view('user.cart');
});

Route::get('/checkout', function () {
    return view('user.checkout');
});

Route::get('/contact', function () {
    return view('user.contact');
});

require __DIR__ . '/auth.php';
