@extends('layouts.app')

@section('title', 'Shopping Cart - Haatify')

@section('content')

    <div class="min-h-screen bg-gray-100 py-8">

        <div class="max-w-7xl mx-auto px-4">

            {{-- Page title --}}
            <div class="mb-6">

                <h1 class="text-3xl font-bold text-gray-900">
                    Shopping Cart
                </h1>

                <p class="text-gray-500 mt-1">
                    Review your items before checkout.
                </p>

            </div>


            {{-- Success message --}}
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-100
                        text-green-700 border border-green-200">

                    <div class="flex items-center gap-2">

                        <i class="fa-solid fa-circle-check"></i>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                </div>
            @endif


            {{-- Error message --}}
            @if (session('error'))
                <div class="mb-6 p-4 rounded-lg bg-red-100
                        text-red-700 border border-red-200">

                    <div class="flex items-center gap-2">

                        <i class="fa-solid fa-circle-exclamation"></i>

                        <span>
                            {{ session('error') }}
                        </span>

                    </div>

                </div>
            @endif


            @if ($cart->items->count())

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                    {{-- ================================================= --}}
                    {{-- CART ITEMS --}}
                    {{-- ================================================= --}}

                    <div class="lg:col-span-2 space-y-4">

                        @foreach ($cart->items as $item)
                            @php

                                $product = $item->product;

                                $variation = $item->variation;

                                $image =
                                    $variation?->image ??
                                    ($product->first_image_url ?? asset('frontend/image/amazon1.jpg'));

                                if ($variation?->image && !str_starts_with($image, 'http')) {
                                    $image = asset('storage/' . ltrim($image, '/'));
                                }

                            @endphp


                            <div
                                class="bg-white rounded-xl shadow-sm
                                    border border-gray-200 p-5">


                                <div class="flex gap-5">


                                    {{-- Product Image --}}
                                    <div class="w-28 h-28 shrink-0">

                                        <img src="{{ $image }}" alt="{{ $product->name }}"
                                            class="w-full h-full object-cover
                                               rounded-lg border">

                                    </div>


                                    {{-- Product information --}}
                                    <div class="flex-1">

                                        <div class="flex justify-between gap-4">

                                            <div>

                                                <h2
                                                    class="text-lg font-semibold
                                                       text-gray-900">

                                                    {{ $product->name }}

                                                </h2>


                                                @if ($product->category)
                                                    <p class="text-sm text-gray-500 mt-1">

                                                        {{ $product->category->name }}

                                                    </p>
                                                @endif


                                                {{-- Variation --}}
                                                @if ($variation)
                                                    <div class="mt-2 flex flex-wrap gap-2">

                                                        @foreach ($variation->attributes as $attribute => $value)
                                                            <span
                                                                class="text-sm bg-gray-100
                                                                     text-gray-700
                                                                     px-2 py-1 rounded">

                                                                {{ ucfirst($attribute) }}:
                                                                {{ $value }}

                                                            </span>
                                                        @endforeach

                                                    </div>
                                                @endif

                                            </div>


                                            {{-- Remove button --}}
                                            <form action="{{ route('cart.remove', $item) }}" method="POST">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700
                                                       transition"
                                                    title="Remove item">

                                                    <i class="fa-solid fa-trash"></i>

                                                </button>

                                            </form>

                                        </div>


                                        {{-- Price --}}
                                        <div class="mt-4">

                                            <span class="text-lg font-bold text-orange-600">

                                                Rs. {{ number_format($item->price, 2) }}

                                            </span>

                                            <span class="text-sm text-gray-500">
                                                / item
                                            </span>

                                        </div>


                                        {{-- Quantity + subtotal --}}
                                        <div
                                            class="mt-4 flex flex-wrap
                                                items-center justify-between gap-4">


                                            {{-- Quantity --}}
                                            <form action="{{ route('cart.update', $item) }}" method="POST"
                                                class="flex items-center gap-2">

                                                @csrf

                                                @method('PATCH')


                                                <label for="quantity-{{ $item->id }}"
                                                    class="text-sm font-medium text-gray-600">
                                                    Quantity
                                                </label>


                                                <input id="quantity-{{ $item->id }}" type="number" name="quantity"
                                                    value="{{ $item->quantity }}" min="1"
                                                    class="w-20 border border-gray-300
                                                       rounded-lg px-3 py-2
                                                       focus:ring-2
                                                       focus:ring-orange-500
                                                       focus:outline-none">


                                                <button type="submit"
                                                    class="px-3 py-2 bg-gray-900
                                                       text-white rounded-lg
                                                       hover:bg-gray-700">

                                                    Update

                                                </button>

                                            </form>


                                            {{-- Item subtotal --}}
                                            <div class="text-right">

                                                <p class="text-sm text-gray-500">
                                                    Subtotal
                                                </p>

                                                <p class="text-lg font-bold text-gray-900">

                                                    Rs.
                                                    {{ number_format($item->price * $item->quantity, 2) }}

                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>


                    {{-- ================================================= --}}
                    {{-- ORDER SUMMARY --}}
                    {{-- ================================================= --}}

                    <div>

                        <div
                            class="bg-white rounded-xl shadow-sm
                                border border-gray-200 p-6
                                sticky top-6">

                            <h2 class="text-xl font-bold text-gray-900 mb-5">
                                Order Summary
                            </h2>


                            {{-- Items --}}
                            <div class="flex justify-between mb-3">

                                <span class="text-gray-600">
                                    Items
                                </span>

                                <span class="font-medium">
                                    {{ $cart->items->sum('quantity') }}
                                </span>

                            </div>


                            {{-- Subtotal --}}
                            <div class="flex justify-between mb-3">

                                <span class="text-gray-600">
                                    Subtotal
                                </span>

                                <span class="font-medium">

                                    Rs.
                                    {{ number_format($subtotal, 2) }}

                                </span>

                            </div>


                            {{-- Shipping --}}
                            <div class="flex justify-between mb-4">

                                <span class="text-gray-600">
                                    Shipping
                                </span>

                                <span class="text-green-600 font-medium">
                                    Calculated at checkout
                                </span>

                            </div>


                            <div class="border-t pt-4">

                                <div class="flex justify-between">

                                    <span class="text-lg font-bold">
                                        Total
                                    </span>

                                    <span class="text-xl font-bold text-orange-600">

                                        Rs.
                                        {{ number_format($subtotal, 2) }}

                                    </span>

                                </div>

                            </div>


                            {{-- Checkout --}}
                            <a href="{{ route('checkout.index') }}"
                                class="block w-full mt-6 py-3 rounded-lg
           bg-orange-500 text-white font-semibold
           text-center hover:bg-orange-600
           transition">
                                Proceed to Checkout
                            </a>


                            <a href="{{ route('home') }}"
                                class="block text-center mt-4
                                   text-sm text-orange-600
                                   hover:underline">

                                Continue Shopping

                            </a>

                        </div>

                    </div>

                </div>
            @else
                {{-- ================================================= --}}
                {{-- EMPTY CART --}}
                {{-- ================================================= --}}

                <div
                    class="bg-white rounded-xl shadow-sm
                        border border-gray-200
                        text-center py-20 px-6">

                    <div class="text-6xl text-gray-300 mb-5">

                        <i class="fa-solid fa-cart-shopping"></i>

                    </div>


                    <h2 class="text-2xl font-bold text-gray-900">

                        Your cart is empty

                    </h2>


                    <p class="text-gray-500 mt-2">

                        Looks like you haven't added anything to your cart yet.

                    </p>


                    <a href="{{ route('home') }}"
                        class="inline-block mt-6 px-6 py-3
                           bg-orange-500 text-white
                           rounded-lg font-semibold
                           hover:bg-orange-600">

                        Start Shopping

                    </a>

                </div>

            @endif

        </div>

    </div>

@endsection
