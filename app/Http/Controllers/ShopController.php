<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        view()->share('shops', $shops);
        return view('admin.shops');
    }

    public function create()
    {
        return view('admin.shop-create');
    }
}
