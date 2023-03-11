<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


// Home routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// User routes
Route::get('/manage-account', [HomeController::class, 'manage_account'])->name('manage-account');

// Admin routes
Route::get('/super', [AdminController::class, 'index'])->name('admin.home');
Route::get('/super/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/super/sellers', [AdminController::class, 'sellers'])->name('admin.sellers');
Route::get('/super/admins', [AdminController::class, 'admins'])->name('admin.admins');
Route::get('/super/user/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::patch('/super/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
Route::delete('/super/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');


// category resource route
Route::resource('/super/categories', CategoryController::class);

// shop resource route
Route::resource('/super/shops', ShopController::class);

// product resource route
Route::resource('/super/products', ProductController::class);



require __DIR__ . '/auth.php';