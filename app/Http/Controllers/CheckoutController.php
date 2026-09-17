<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

        /*
        |--------------------------------------------------------------------------
        | Get Cart
        |--------------------------------------------------------------------------
        */

        $cart = $user->cart;

        if (! $cart) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $cart->load([
            'items.product',
            'items.variation',
        ]);

        if ($cart->items->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate Subtotal
        |--------------------------------------------------------------------------
        */

        $subtotal = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        /*
        |--------------------------------------------------------------------------
        | Get Saved Shipping Addresses
        |--------------------------------------------------------------------------
        */

        $addresses = $user->shippingAddresses()
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Show Checkout Page
        |--------------------------------------------------------------------------
        */

        return view(
            'frontend.checkout.index',
            compact(
                'cart',
                'subtotal',
                'addresses'
            )
        );
    }


    /**
     * Place Order
     */
    public function placeOrder(Request $request)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user) {
            abort(401);
        }

        /*
        |--------------------------------------------------------------------------
        | Validate Checkout Form
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | Existing Address
            |--------------------------------------------------------------------------
            */

            'shipping_address_id' => [
                'nullable',
                'integer',
                'exists:shipping_addresses,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | New Address
            |--------------------------------------------------------------------------
            */

            'new_full_name' => [
                'nullable',
                'required_without:shipping_address_id',
                'string',
                'max:255',
            ],

            'new_phone' => [
                'nullable',
                'required_without:shipping_address_id',
                'string',
                'max:20',
            ],

            'new_address_line_1' => [
                'nullable',
                'required_without:shipping_address_id',
                'string',
                'max:255',
            ],

            'new_address_line_2' => [
                'nullable',
                'string',
                'max:255',
            ],

            'new_city' => [
                'nullable',
                'required_without:shipping_address_id',
                'string',
                'max:100',
            ],

            'new_state' => [
                'nullable',
                'string',
                'max:100',
            ],

            'new_postal_code' => [
                'nullable',
                'string',
                'max:20',
            ],

            'new_country' => [
                'nullable',
                'required_without:shipping_address_id',
                'string',
                'max:100',
            ],

            /*
            |--------------------------------------------------------------------------
            | Payment
            |--------------------------------------------------------------------------
            */

            'payment_method' => [
                'required',
                'in:cod,esewa,khalti,bank_transfer',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Get Cart
        |--------------------------------------------------------------------------
        */

        $cart = $user->cart;

        if (! $cart) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $cart->load([
            'items.product',
            'items.variation',
        ]);

        if ($cart->items->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }


        /*
        |--------------------------------------------------------------------------
        | Get Existing Address OR Create New Address
        |--------------------------------------------------------------------------
        */

        if ($request->filled('shipping_address_id')) {

            /*
            |--------------------------------------------------------------------------
            | Existing Address
            |--------------------------------------------------------------------------
            */

            $address = $user->shippingAddresses()
                ->where('id', $validated['shipping_address_id'])
                ->firstOrFail();

        } else {

            /*
            |--------------------------------------------------------------------------
            | Create New Address
            |--------------------------------------------------------------------------
            */

            $address = $user->shippingAddresses()->create([

                'full_name' => $validated['new_full_name'],

                'phone' => $validated['new_phone'],

                'address_line_1' =>
                    $validated['new_address_line_1'],

                'address_line_2' =>
                    $validated['new_address_line_2'] ?? null,

                'city' =>
                    $validated['new_city'],

                'state' =>
                    $validated['new_state'] ?? null,

                'postal_code' =>
                    $validated['new_postal_code'] ?? null,

                'country' =>
                    $validated['new_country'] ?? 'Nepal',

                'is_default' => false,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Calculate Subtotal
        |--------------------------------------------------------------------------
        */

        $subtotal = $cart->items->sum(function ($item) {

            return $item->price * $item->quantity;

        });


        /*
        |--------------------------------------------------------------------------
        | Shipping Fee
        |--------------------------------------------------------------------------
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
        | Final Total
        |--------------------------------------------------------------------------
        */

        $totalAmount =
            $subtotal
            + $shippingFee
            + $taxAmount
            - $discountAmount;


        /*
        |--------------------------------------------------------------------------
        | Create Order
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
            $validated
        ) {

            /*
            |--------------------------------------------------------------------------
            | Create Order
            |--------------------------------------------------------------------------
            */

            $order = Order::create([

                'user_id' =>
                    $user->id,

                'shipping_address_id' =>
                    $address->id,

                'order_number' =>
                    'HAT-' . strtoupper(uniqid()),

                'subtotal' =>
                    $subtotal,

                'shipping_fee' =>
                    $shippingFee,

                'discount_amount' =>
                    $discountAmount,

                'tax_amount' =>
                    $taxAmount,

                'total_amount' =>
                    $totalAmount,

                'status' =>
                    'pending',

                'payment_status' =>
                    'pending',
            ]);


            /*
            |--------------------------------------------------------------------------
            | Create Order Items
            |--------------------------------------------------------------------------
            */

            foreach ($cart->items as $cartItem) {

                $product =
                    $cartItem->product;

                $variation =
                    $cartItem->variation;


                $order->items()->create([

                    'product_id' =>
                        $product->id,

                    'product_variation_id' =>
                        $variation?->id,

                    'product_name' =>
                        $product->name,

                    'variation_name' =>
                        $variation
                            ? json_encode($variation->attributes)
                            : null,

                    'quantity' =>
                        $cartItem->quantity,

                    'unit_price' =>
                        $cartItem->price,

                    'total_price' =>
                        $cartItem->price *
                        $cartItem->quantity,
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Create Payment
            |--------------------------------------------------------------------------
            */

            $order->payment()->create([

                'payment_method' =>
                    $validated['payment_method'],

                'amount' =>
                    $totalAmount,

                'status' =>
                    'pending',
            ]);


            /*
            |--------------------------------------------------------------------------
            | Clear Cart
            |--------------------------------------------------------------------------
            */

            $cart->items()->delete();


            return $order;
        });


        /*
        |--------------------------------------------------------------------------
        | Redirect To Success Page
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('checkout.success', [
                'order' => $order->id,
            ])
            ->with(
                'success',
                'Your order has been placed successfully.'
            );
    }


    /**
     * Show Order Success Page
     */
    public function success(Order $order)
    {
        /*
        |--------------------------------------------------------------------------
        | Security
        |--------------------------------------------------------------------------
        */

        if ($order->user_id !== Auth::id()) {
            abort(403);
        }


        /*
        |--------------------------------------------------------------------------
        | Load Relationships
        |--------------------------------------------------------------------------
        */

        $order->load([
            'items.product',
            'items.productVariation',
            'shippingAddress',
            'payment',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Show Page
        |--------------------------------------------------------------------------
        */

        return view(
            'frontend.checkout.success',
            compact('order')
        );
    }
}
