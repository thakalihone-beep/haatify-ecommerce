<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Show cart page
     */
    public function index()
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user) {
            abort(401);
        }

        $cart = $user->cart;

        if (! $cart) {
            $cart = $user->cart()->create();
        }

        $cart->load([
            'items.product',
            'items.variation',
        ]);

        $subtotal = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('frontend.cart.index', compact(
            'cart',
            'subtotal'
        ));
    }

    /**
     * Add product to cart
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'product_variation_id' => [
                'nullable',
                'integer',
                'exists:product_vaiations,id',
            ],
        ]);

        $quantity = $request->quantity;

        /*
        |--------------------------------------------------------------------------
        | Get selected variation
        |--------------------------------------------------------------------------
        */

        $variation = null;

        if ($request->product_variation_id) {

            $variation = $product->variations()
                ->where('id', $request->product_variation_id)
                ->where('status', 'active')
                ->firstOrFail();
        }

        /*
        |--------------------------------------------------------------------------
        | Determine price and stock
        |--------------------------------------------------------------------------
        */

        if ($variation) {

            $stock = $variation->stock_qty;

            $price = $variation->discount_price !== null
                && $variation->discount_price < $variation->price
                ? $variation->discount_price
                : $variation->price;

        } else {

            $stock = $product->stock_qty;

            $price = $product->discount_price !== null
                && $product->discount_price < $product->price
                ? $product->discount_price
                : $product->price;
        }

        /*
        |--------------------------------------------------------------------------
        | Check stock
        |--------------------------------------------------------------------------
        */

        if ($stock <= 0) {
            return back()->with(
                'error',
                'This product is out of stock.'
            );
        }

        if ($quantity > $stock) {
            return back()->with(
                'error',
                "Only {$stock} items are available."
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Get or create user's cart
        |--------------------------------------------------------------------------
        */

        /** @var User|null $user */
        $user = Auth::user();

        if (! $user) {
            abort(401);
        }

        $cart = $user->cart;

        if (! $cart) {
            $cart = $user->cart()->create();
        }

        /*
        |--------------------------------------------------------------------------
        | Find existing cart item
        |--------------------------------------------------------------------------
        */

        $cartItem = $cart->items()
            ->where('product_id', $product->id)
            ->where('product_variation_id', $variation?->id)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Update existing item
        |--------------------------------------------------------------------------
        */

        if ($cartItem) {

            $newQuantity = $cartItem->quantity + $quantity;

            if ($newQuantity > $stock) {
                return back()->with(
                    'error',
                    "You cannot add more than {$stock} items."
                );
            }

            $cartItem->update([
                'quantity' => $newQuantity,
                'price' => $price,
            ]);

        } else {

            /*
            |--------------------------------------------------------------------------
            | Create new cart item
            |--------------------------------------------------------------------------
            */

            $cart->items()->create([
                'product_id' => $product->id,
                'product_variation_id' => $variation?->id,
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Product added to cart.');
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Security check
        |--------------------------------------------------------------------------
        */

        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        /*
        |--------------------------------------------------------------------------
        | Determine available stock
        |--------------------------------------------------------------------------
        */

        if ($cartItem->variation) {

            $stock = $cartItem->variation->stock_qty;

        } else {

            $stock = $cartItem->product->stock_qty;
        }

        if ($request->quantity > $stock) {
            return back()->with(
                'error',
                "Only {$stock} items are available."
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Update quantity
        |--------------------------------------------------------------------------
        */

        $cartItem->update([
            'quantity' => $request->quantity,
        ]);

        return back()->with(
            'success',
            'Cart updated successfully.'
        );
    }

    /**
     * Remove cart item
     */
    public function remove(CartItem $cartItem)
    {
        /*
        |--------------------------------------------------------------------------
        | Security check
        |--------------------------------------------------------------------------
        */

        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();

        return back()->with(
            'success',
            'Item removed from cart.'
        );
    }
}
