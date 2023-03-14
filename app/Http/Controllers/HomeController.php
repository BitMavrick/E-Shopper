<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Success message
        //session()->flash('message', 'Success! This is the home page');
        //session()->flash('alert-type', 'alert-success');
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

        // Success message
        //session()->flash('message', 'Success! This is the contact page');
        //session()->flash('alert-type', 'alert-success');

        return view('user.contact');
    }

    public function manage_account()
    {
        return view('user.manage-account');
    }

    public function unauthorized()
    {
        return view('user.unauthorized');
    }

    public function fallback()
    {
        return view('user.404');
    }
}
