@extends('layouts.app')

@section('title', 'Checkout - Haatify')

@section('content')

<div class="min-h-screen bg-gray-100 py-8">

    <div class="max-w-7xl mx-auto px-4">

        {{-- Page title --}}
        <div class="mb-6">

            <h1 class="text-3xl font-bold text-gray-900">
                Checkout
            </h1>

            <p class="text-gray-500 mt-1">
                Complete your order.
            </p>

        </div>


        <form
            action="{{ route('checkout.place') }}"
            method="POST"
        >

            @csrf


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                {{-- ================================================= --}}
                {{-- LEFT SIDE --}}
                {{-- ================================================= --}}

                <div class="lg:col-span-2 space-y-6">


                    {{-- ================================================= --}}
                    {{-- SHIPPING ADDRESS --}}
                    {{-- ================================================= --}}

                    <div class="bg-white rounded-xl shadow-sm
                                border border-gray-200 p-6">

                        <h2 class="text-xl font-bold text-gray-900 mb-5">
                            1. Shipping Address
                        </h2>


                        @if($addresses->count())

                            <div class="space-y-3">

                                @foreach($addresses as $address)

                                    <label
                                        class="block border border-gray-300
                                               rounded-lg p-4 cursor-pointer
                                               hover:border-orange-500"
                                    >

                                        <div class="flex gap-3">

                                            <input
                                                type="radio"
                                                name="shipping_address_id"
                                                value="{{ $address->id }}"
                                                class="mt-1"
                                                {{ $loop->first ? 'checked' : '' }}
                                            >

                                            <div>

                                                <p class="font-semibold text-gray-900">
                                                    {{ $address->full_name }}
                                                </p>

                                                <p class="text-sm text-gray-600">
                                                    {{ $address->phone }}
                                                </p>

                                                <p class="text-sm text-gray-600 mt-1">
                                                    {{ $address->address_line_1 }}
                                                </p>

                                                @if($address->address_line_2)

                                                    <p class="text-sm text-gray-600">
                                                        {{ $address->address_line_2 }}
                                                    </p>

                                                @endif

                                                <p class="text-sm text-gray-600">
                                                    {{ $address->city }},
                                                    {{ $address->state }}
                                                    {{ $address->postal_code }}
                                                </p>

                                                <p class="text-sm text-gray-600">
                                                    {{ $address->country }}
                                                </p>

                                            </div>

                                        </div>

                                    </label>

                                @endforeach

                            </div>

                        @else

                            <div class="bg-yellow-50 border
                                        border-yellow-200 rounded-lg p-4">

                                <p class="text-yellow-800">
                                    You don't have a shipping address yet.
                                </p>

                            </div>

                        @endif

                    </div>


                    {{-- ================================================= --}}
                    {{-- ORDER ITEMS --}}
                    {{-- ================================================= --}}

                    <div class="bg-white rounded-xl shadow-sm
                                border border-gray-200 p-6">

                        <h2 class="text-xl font-bold text-gray-900 mb-5">
                            2. Your Items
                        </h2>


                        <div class="space-y-5">

                            @foreach($cart->items as $item)

                                @php

                                    $product = $item->product;

                                    $variation = $item->variation;

                                    $image =
                                        $variation?->image
                                        ?? $product->first_image_url
                                        ?? asset('frontend/image/amazon1.jpg');

                                    if (
                                        $variation?->image &&
                                        !str_starts_with($image, 'http')
                                    ) {
                                        $image = asset(
                                            'storage/' .
                                            ltrim($image, '/')
                                        );
                                    }

                                @endphp


                                <div class="flex gap-4
                                            border-b border-gray-200
                                            pb-5">

                                    <img
                                        src="{{ $image }}"
                                        alt="{{ $product->name }}"
                                        class="w-24 h-24 object-cover
                                               rounded-lg border"
                                    >


                                    <div class="flex-1">

                                        <h3 class="font-semibold text-gray-900">
                                            {{ $product->name }}
                                        </h3>


                                        @if($variation)

                                            <div class="mt-2 flex flex-wrap gap-2">

                                                @foreach($variation->attributes as $attribute => $value)

                                                    <span class="text-xs
                                                                 bg-gray-100
                                                                 text-gray-700
                                                                 px-2 py-1
                                                                 rounded">

                                                        {{ ucfirst($attribute) }}:
                                                        {{ $value }}

                                                    </span>

                                                @endforeach

                                            </div>

                                        @endif


                                        <div class="flex justify-between mt-3">

                                            <span class="text-sm text-gray-500">
                                                Qty: {{ $item->quantity }}
                                            </span>

                                            <span class="font-bold text-gray-900">
                                                Rs.
                                                {{ number_format(
                                                    $item->price * $item->quantity,
                                                    2
                                                ) }}
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PAYMENT --}}
                    {{-- ================================================= --}}

                    <div class="bg-white rounded-xl shadow-sm
                                border border-gray-200 p-6">

                        <h2 class="text-xl font-bold text-gray-900 mb-5">
                            3. Payment Method
                        </h2>


                        <div class="space-y-3">


                            {{-- COD --}}

                            <label
                                class="flex items-center gap-3
                                       border border-gray-300
                                       rounded-lg p-4 cursor-pointer
                                       hover:border-orange-500"
                            >

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="cod"
                                    checked
                                >

                                <div>

                                    <p class="font-semibold">
                                        Cash on Delivery
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Pay when your order arrives.
                                    </p>

                                </div>

                            </label>


                            {{-- eSewa --}}

                            <label
                                class="flex items-center gap-3
                                       border border-gray-300
                                       rounded-lg p-4 cursor-pointer
                                       hover:border-orange-500"
                            >

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="esewa"
                                >

                                <span class="font-semibold">
                                    eSewa
                                </span>

                            </label>


                            {{-- Khalti --}}

                            <label
                                class="flex items-center gap-3
                                       border border-gray-300
                                       rounded-lg p-4 cursor-pointer
                                       hover:border-orange-500"
                            >

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="khalti"
                                >

                                <span class="font-semibold">
                                    Khalti
                                </span>

                            </label>


                            {{-- Bank Transfer --}}

                            <label
                                class="flex items-center gap-3
                                       border border-gray-300
                                       rounded-lg p-4 cursor-pointer
                                       hover:border-orange-500"
                            >

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="bank_transfer"
                                >

                                <span class="font-semibold">
                                    Bank Transfer
                                </span>

                            </label>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- RIGHT SIDE --}}
                {{-- ================================================= --}}

                <div>

                    <div class="bg-white rounded-xl shadow-sm
                                border border-gray-200 p-6
                                sticky top-6">

                        <h2 class="text-xl font-bold text-gray-900 mb-5">
                            4. Order Summary
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
                                Rs. {{ number_format($subtotal, 2) }}
                            </span>

                        </div>


                        {{-- Shipping --}}

                        <div class="flex justify-between mb-3">

                            <span class="text-gray-600">
                                Shipping
                            </span>

                            <span class="font-medium">
                                Rs. 100.00
                            </span>

                        </div>


                        {{-- Discount --}}

                        <div class="flex justify-between mb-3">

                            <span class="text-gray-600">
                                Discount
                            </span>

                            <span class="text-green-600 font-medium">
                                Rs. 0.00
                            </span>

                        </div>


                        {{-- Total --}}

                        <div class="border-t pt-4">

                            <div class="flex justify-between">

                                <span class="text-lg font-bold">
                                    Total
                                </span>

                                <span class="text-xl font-bold text-orange-600">

                                    Rs.
                                    {{ number_format(
                                        $subtotal + 100,
                                        2
                                    ) }}

                                </span>

                            </div>

                        </div>


                        {{-- Place Order --}}

                        <button
                            type="submit"
                            class="w-full mt-6 py-3
                                   rounded-lg bg-orange-500
                                   text-white font-semibold
                                   hover:bg-orange-600
                                   transition"
                        >

                            Place Order

                        </button>


                        <a
                            href="{{ route('cart.index') }}"
                            class="block text-center mt-4
                                   text-sm text-gray-600
                                   hover:text-orange-600"
                        >

                            ← Back to Cart

                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection

