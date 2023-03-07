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

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'verified' => 'required',
            'email' => 'required',
        ]);

        $shop = new Shop();
        $shop->user_id = $request->user_id;
        $shop->name = $request->name;
        $shop->slug = $request->slug;
        $shop->address = $request->address;
        $shop->phone = $request->phone;
        $shop->verified = $request->verified;
        $shop->email = $request->email;
        $shop->save();

        return redirect()->route('shops.index');
    }

    public function edit($id)
    {
        $shop = Shop::find($id);
        $users = User::all();
        view()->share('users', $users);
        view()->share('shop', $shop);
        return view('admin.shop-edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'verified' => 'required',
            'email' => 'required',
        ]);

        $shop = Shop::find($id);
        $shop->user_id = $request->user_id;
        $shop->name = $request->name;
        $shop->slug = $request->slug;
        $shop->address = $request->address;
        $shop->phone = $request->phone;
        $shop->verified = $request->verified;
        $shop->email = $request->email;
        $shop->save();

        return redirect()->route('shops.index');
    }
}