<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;

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

    public function product_create()
    {
        $user_id = auth()->user()->id;
        $shops = Shop::where('user_id', $user_id)->get();
        $categories = Category::all();

        view()->share('shops', $shops);
        view()->share('categories', $categories);
        return view('seller.product-create');
    }

    public function product_edit($id)
    {
        $product = Product::find($id);
        $user_id = auth()->user()->id;
        $shops = Shop::where('user_id', $user_id)->get();
        $categories = Category::all();

        view()->share('product', $product);
        view()->share('shops', $shops);
        view()->share('categories', $categories);

        return view('seller.product-edit');
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

    public function shop_edit($id)
    {
        $shop = Shop::find($id);

        if ($shop->user_id == auth()->user()->id) {
            view()->share('shop', $shop);
            return view('seller.shop-edit');
        }

        return redirect()->route('unauthorized');
    }
}