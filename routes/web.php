<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

Route::get('/shop', function () {
    return view('user.shop');
});

Route::get('/product', function () {
    return view('user.product');
});

Route::get('/cart', function () {
    return view('user.cart');
});
