<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('frontend.home', compact('categories'));
    }

    public function productCard()
    {
        $products = Product::with('category')
            ->where('status', 'active')
            ->latest()
            ->get();

        $categories = Category::latest()->get();

        return view('frontend.home', compact('products', 'categories'));
    }
}
