<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Product;

class SellerController extends Controller
{
    public function index()
    {
        return view('seller.index');
    }

    public function product()
    {
        $user_id = auth()->user()->id;
        $shops = Shop::where('user_id', $user_id)->get();

        $products = Product::whereHas('shop', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        view()->share('products', $products);
        return view('seller.products');
    }

    public function shop()
    {
        $shops = Shop::where('user_id', auth()->user()->id)->get();

        view()->share('shops', $shops);
        return view('seller.shops');
    }

    public function shop_create()
    {
        return view('seller.shop-create');
    }
}