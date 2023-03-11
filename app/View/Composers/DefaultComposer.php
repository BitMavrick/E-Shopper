<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Category;


class DefaultComposer
{
    public function compose(View $view)
    {
        $categories = Category::withCount('product')
            ->orderByDesc('product_count')
            ->take(10)
            ->get();

        $view->with('categories', $categories);
    }
}