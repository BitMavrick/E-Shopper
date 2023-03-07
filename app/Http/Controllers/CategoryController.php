<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
        return view('admin.categories');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('categories.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
