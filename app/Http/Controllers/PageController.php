<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        $products = Product::with('category')
            ->where('status', 'active')
            ->latest()
            ->get();

        return view('frontend.home', compact(
            'categories',
            'products'
        ));
    }

    public function show(Product $product)
    {
        $product->load([
            'category',
            'variations',
        ]);

        return view('frontend.product.show', compact('product'));
    }
    
}
