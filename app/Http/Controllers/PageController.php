<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
    public function todaysDeals()
    {
        $products = Product::with('category')
            ->where('status', 'active')
            ->where('discount_price', '>', 0)
            ->whereColumn('discount_price', '<', 'price')
            ->where(function ($query) {
                $query->whereNull('deal_start_at')
                    ->orWhere('deal_start_at', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('deal_end_at')
                    ->orWhere('deal_end_at', '>=', now());
            })
            ->latest()
            ->paginate(24);

        return view('frontend.deals.index', compact('products'));
    }

    public function bestSellers()
    {
        $products = Product::query()
            ->select('products.*')
            ->selectSub(function ($query) {
                $query->from('order_items')
                    ->join(
                        'orders',
                        'orders.id',
                        '=',
                        'order_items.order_id'
                    )
                    ->selectRaw('COALESCE(SUM(order_items.quantity), 0)')
                    ->whereColumn(
                        'order_items.product_id',
                        'products.id'
                    )
                    ->where('orders.status', 'delivered');
            }, 'total_sold')
            ->where('products.status', 'active')
            ->orderByDesc('total_sold')
            ->paginate(24);

        return view(
            'frontend.best-sellers.index',
            compact('products')
        );
    }
    public function newArrivals()
    {
        $products = Product::query()
            ->with('category')
            ->where('status', 'active')
            ->latest('created_at')
            ->paginate(24);

        return view(
            'frontend.new-arrivals.index',
            compact('products')
        );
    }
    public function todaysOffers()
    {
        $products = Product::query()
            ->with('category')
            ->where('status', 'active')
            ->whereNotNull('discount_price')
            ->whereColumn('discount_price', '<', 'price')
            ->orderByDesc('created_at')
            ->paginate(24);

        return view(
            'frontend.todays-offers.index',
            compact('products')
        );
    }
    public function search(Request $request)
    {
        $query = trim((string) $request->query('q', ''));

        $products = Product::query()
            ->with('category')
            ->where('status', 'active')
            ->when($query !== '', function ($q) use ($query) {
                $searchTerm = '%' . str_replace(['%', '_'], ['\\%', '\\_'], $query) . '%';

                $q->where(function ($subQuery) use ($searchTerm, $query) {
                    $subQuery->where('name', 'like', $searchTerm)
                        ->orWhere('description', 'like', $searchTerm)
                        ->orWhere('tags', 'like', '%' . str_replace(['%', '_'], ['\\%', '\\_'], json_encode($query)) . '%')
                        ->orWhereHas('category', function ($categoryQuery) use ($query) {
                            $categoryQuery->where('name', 'like', '%' . $query . '%');
                        });
                });
            })
            ->latest()
            ->get();

        return view('frontend.search.index', [
            'products' => $products,
            'query' => $query,
        ]);
    }

    public function customerService()
    {
        return view('frontend.customer-service.index');
    }
    public function contactSupport()
    {
        return view('frontend.contact-support.index');
    }
    public function termsAndConditions()
    {
        return view('frontend.terms.index');
    }
}
