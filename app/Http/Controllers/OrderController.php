<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | My Orders
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items')
            ->latest()
            ->paginate(10);

        return view('frontend.orders.index', compact('orders'));
    }


    /*
    |--------------------------------------------------------------------------
    | Order Details
    |--------------------------------------------------------------------------
    */

    public function show(Order $order)
    {
        // Make sure customer can only see their own order
        abort_if($order->user_id !== Auth::id(), 403);

        $order->load([
            'items.product',
            'shippingAddress',
            'payment',
        ]);

        return view('frontend.orders.show', compact('order'));
    }
}