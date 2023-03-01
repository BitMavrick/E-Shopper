<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

// category resource route
Route::resource('categories', CategoryController::class);

require __DIR__ . '/auth.php';
