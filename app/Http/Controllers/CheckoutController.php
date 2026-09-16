<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Show checkout page
     */
    public function index()
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user) {
            abort(401);
        }

        $cart = $user->cart;

        if (! $cart || $cart->items->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $cart->load([
            'items.product',
            'items.variation',
        ]);

        // Calculate subtotal
        $subtotal = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Get user's saved addresses
        $addresses = $user->shippingAddresses()
            ->latest()
            ->get();

        return view('frontend.checkout.index', compact(
            'cart',
            'subtotal',
            'addresses'
        ));
    }

    /**
     * Place order
     */
    public function placeOrder(Request $request)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user) {
            abort(401);
        }

        $request->validate([
            'shipping_address_id' => [
                'required',
                'integer',
                'exists:shipping_addresses,id',
            ],

            'payment_method' => [
                'required',
                'in:cod,esewa,khalti,bank_transfer',
            ],
        ]);

        // Security: make sure address belongs to logged-in user
        $address = $user->shippingAddresses()
            ->where('id', $request->shipping_address_id)
            ->firstOrFail();

        $cart = $user->cart;

        if (! $cart || $cart->items->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $cart->load([
            'items.product',
            'items.variation',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Calculate subtotal
        |--------------------------------------------------------------------------
        */

        $subtotal = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        /*
        |--------------------------------------------------------------------------
        | Shipping
        |--------------------------------------------------------------------------
        |
        | For now we use a fixed shipping fee.
        | You can make this dynamic later.
        |
        */

        $shippingFee = 100;

        /*
        |--------------------------------------------------------------------------
        | Discount
        |--------------------------------------------------------------------------
        */

        $discountAmount = 0;

        /*
        |--------------------------------------------------------------------------
        | Tax
        |--------------------------------------------------------------------------
        */

        $taxAmount = 0;

        /*
        |--------------------------------------------------------------------------
        | Final total
        |--------------------------------------------------------------------------
        */

        $totalAmount =
            $subtotal
            + $shippingFee
            + $taxAmount
            - $discountAmount;

        /*
        |--------------------------------------------------------------------------
        | Create order
        |--------------------------------------------------------------------------
        */

        $order = DB::transaction(function () use (
            $user,
            $address,
            $cart,
            $subtotal,
            $shippingFee,
            $discountAmount,
            $taxAmount,
            $totalAmount,
            $request
        ) {

            $order = Order::create([
                'user_id' => $user->id,

                'shipping_address_id' => $address->id,

                'order_number' => 'HAT-' . strtoupper(
                    uniqid()
                ),

                'subtotal' => $subtotal,

                'shipping_fee' => $shippingFee,

                'discount_amount' => $discountAmount,

                'tax_amount' => $taxAmount,

                'total_amount' => $totalAmount,

                'status' => 'pending',

                'payment_status' => 'pending',
            ]);

            /*
            |--------------------------------------------------------------------------
            | Create order items
            |--------------------------------------------------------------------------
            */

            foreach ($cart->items as $cartItem) {

                $product = $cartItem->product;
                $variation = $cartItem->variation;

                $order->items()->create([
                    'product_id' => $product->id,

                    'product_variation_id' => $variation?->id,

                    'product_name' => $product->name,

                    'variation_name' => $variation
                        ? json_encode($variation->attributes)
                        : null,

                    'quantity' => $cartItem->quantity,

                    'unit_price' => $cartItem->price,

                    'total_price' =>
                        $cartItem->price * $cartItem->quantity,
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Create payment
            |--------------------------------------------------------------------------
            */

            $order->payment()->create([
                'payment_method' => $request->payment_method,

                'amount' => $totalAmount,

                'status' => 'pending',
            ]);

            /*
            |--------------------------------------------------------------------------
            | Clear cart
            |--------------------------------------------------------------------------
            */

            $cart->items()->delete();

            return $order;
        });

        /*
        |--------------------------------------------------------------------------
        | Redirect to success page
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('checkout.success', $order)
            ->with('success', 'Your order has been placed successfully.');
    }

    /**
     * Order success page
     */
    public function success(Order $order)
    {
        // Security: only order owner can see this page
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load([
            'items.product',
            'items.productVariation',
            'shippingAddress',
            'payment',
        ]);

        return view(
            'frontend.checkout.success',
            compact('order')
        );
    }
}

