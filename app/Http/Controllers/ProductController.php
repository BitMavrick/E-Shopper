<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required | image | mimes:jpeg,png,jpg | max:5120',
            'price' => 'required',
            'Short_description' => 'required',
            'variant' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'specification' => 'required',

            'shop_id' => 'required',
            'category_id' => 'required',
        ]);

        $product = new Product();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;

            $image = $request->file('image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(480, 480, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path('storage/img/' . $filename));
            $product->image = $filename;
        }

        $product->name = $request->name;
        $product->prev_price = $request->prev_price;
        $product->price = $request->price;
        $product->Short_description = $request->Short_description;
        $product->variant = $request->variant;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->shop_id = $request->shop_id;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $shops = Shop::all();
        $categories = Category::all();

        view()->share('product', $product);
        view()->share('shops', $shops);
        view()->share('categories', $categories);
        return view('admin.products-edit');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}