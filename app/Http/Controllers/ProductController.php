<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

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
            'short_description' => 'required',
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
        $product->short_description = $request->short_description;
        $product->variant = $request->variant;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->shop_id = $request->shop_id;
        $product->category_id = $request->category_id;
        $product->save();

        if (Auth::user()->type == 'admin') {
            return redirect()->route('products.index');
        } else if (Auth::user()->type == 'seller') {
            return redirect()->route('seller.product');
        }
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
        $request->validate([
            'name' => 'required',
            'image' => 'image | mimes:jpeg,png,jpg | max:5120',
            'price' => 'required',
            'short_description' => 'required',
            'variant' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'specification' => 'required',
            'short_description' => 'required',

            'shop_id' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            // Unlink old image
            $old_image = public_path('storage/img/' . $product->image);
            if (file_exists($old_image)) {
                unlink($old_image);
            }

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
        $product->short_description = $request->short_description;
        $product->variant = $request->variant;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->shop_id = $request->shop_id;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        // Unlink old image
        $old_image = public_path('storage/img/' . $product->image);
        if (file_exists($old_image)) {
            unlink($old_image);
        }

        $product->delete();

        if (Auth::user()->type == 'admin') {
            return redirect()->route('products.index');
        } else if (Auth::user()->type == 'seller') {
            return redirect()->route('seller.product');
        }
    }
}