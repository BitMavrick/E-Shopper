<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('user.index');
    }

    public function shop($id)
    {
        $shop = Shop::find($id);
        $products = Product::where('shop_id', $id)->orderBy('created_at', 'desc')->paginate(9);
        return view('user.shop', compact([
            'shop',
            'products'
        ]));
    }

    public function product($id)
    {
        $product = Product::find($id);
        return view('user.product', compact('product'));
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function manage_account()
    {
        return view('user.manage-account');
    }
}
