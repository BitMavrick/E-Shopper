<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;

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
        $users = User::all();
        view()->share('users', $users);
        return view('admin.shop-create');
    }
}
