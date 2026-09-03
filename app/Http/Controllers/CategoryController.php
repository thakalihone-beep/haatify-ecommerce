<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'active')
            ->get();

        return view('category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }
}
