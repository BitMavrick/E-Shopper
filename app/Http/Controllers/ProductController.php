<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        view()->share('products', $products);
        return view('admin.products');
    }

    public function create()
    {
        $shops = Shop::all();
        $categories = Category::all();

        view()->share('shops', $shops);
        view()->share('categories', $categories);
        return view('admin.products-create');
    }
}