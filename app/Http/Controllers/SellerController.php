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

    public function shop()
    {
        $shops = Shop::where('user_id', auth()->user()->id)->get();

        view()->share('shops', $shops);
        return view('seller.shops');
    }
}