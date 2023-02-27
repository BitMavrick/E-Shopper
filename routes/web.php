<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Admin routes
Route::get('/super', [AdminController::class, 'index'])->name('admin.home');
Route::get('/super/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/super/sellers', [AdminController::class, 'sellers'])->name('admin.sellers');
Route::get('/super/admins', [AdminController::class, 'admins'])->name('admin.admins');

/*
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
*/

require __DIR__ . '/auth.php';
