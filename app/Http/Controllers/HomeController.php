<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('user.index');
    }

    public function shop()
    {
       
        return view('user.shop');
    }

    public function product()
    {
        return view('user.product');
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
}
