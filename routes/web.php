<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;


// Home routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop/{id}', [HomeController::class, 'shop'])->name('shop');
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// User routes
Route::get('/manage-account', [HomeController::class, 'manage_account'])->name('manage-account');

// User Authenticated routed only
Route::post('/seller-request', [UserController::class, 'seller_request'])->name('seller-request');

// Admin routes only
Route::middleware('admin')->group(function () {
    Route::get('/super', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/super/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/super/sellers', [AdminController::class, 'sellers'])->name('admin.sellers');
    Route::get('/super/admins', [AdminController::class, 'admins'])->name('admin.admins');
    Route::get('/super/requests', [AdminController::class, 'requests'])->name('admin.requests');
    Route::get('/super/user/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::patch('/super/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/super/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // category resource route
    Route::resource('/super/categories', CategoryController::class);
});

// Seller routes only
Route::get('/seller', [SellerController::class, 'index'])->name('seller.home');
Route::get('/seller/shop', [SellerController::class, 'shop'])->name('seller.shop');
Route::get('/seller/shop-create', [SellerController::class, 'shop_create'])->name('seller.shop-create');
Route::get('/seller/shop-edit/{id}', [SellerController::class, 'shop_edit'])->name('seller.shop-edit');
Route::get('/seller/product', [SellerController::class, 'product'])->name('seller.product');



// shop resource route
Route::resource('/super/shops', ShopController::class);

// product resource route
Route::resource('/super/products', ProductController::class);


// Fallback routes
Route::get('/unauthorized', [HomeController::class, 'unauthorized'])->name('unauthorized');
Route::fallback([HomeController::class, 'fallback'])->name('fallback');

require __DIR__ . '/auth.php';
