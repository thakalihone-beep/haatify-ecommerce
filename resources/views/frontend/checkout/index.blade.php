@extends('layouts.app')

@section('title', 'Checkout - Haatify')

@section('content')

<div class="min-h-screen bg-gray-100 py-8">


<div class="max-w-7xl mx-auto px-4">

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-gray-900">
            Checkout
        </h1>

        <p class="text-gray-500 mt-1">
            Complete your order by providing your delivery
            and payment information.
        </p>

    </div>


    {{-- ========================================================= --}}
    {{-- VALIDATION ERRORS --}}
    {{-- ========================================================= --}}

    @if($errors->any())

        <div class="mb-6 bg-red-50 border border-red-200
                    text-red-700 rounded-lg p-4">

            <p class="font-semibold mb-2">
                Please fix the following errors:
            </p>

            <ul class="list-disc list-inside text-sm">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- CHECKOUT FORM --}}
    {{-- ========================================================= --}}

    <form
        action="{{ route('checkout.place') }}"
        method="POST"
        id="checkout-form"
    >

        @csrf


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


            {{-- ================================================= --}}
            {{-- LEFT SIDE --}}
            {{-- ================================================= --}}

            <div class="lg:col-span-2 space-y-6">


                {{-- ================================================= --}}
                {{-- 1. SHIPPING ADDRESS --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-xl shadow-sm
                            border border-gray-200 p-6">

                    <div class="flex items-center justify-between mb-5">

                        <h2 class="text-xl font-bold text-gray-900">
                            1. Shipping Address
                        </h2>

                    </div>


                    {{-- ================================================= --}}
                    {{-- SAVED ADDRESS OPTION --}}
                    {{-- ================================================= --}}

                    @if($addresses->count())

                        <div>

                            <h3 class="font-semibold text-gray-900 mb-3">

                                Use a saved address

                            </h3>


                            <div class="space-y-3">

                                @foreach($addresses as $address)

                                    <label
                                        class="block border border-gray-300
                                               rounded-lg p-4 cursor-pointer
                                               hover:border-orange-500
                                               transition"
                                    >

                                        <div class="flex gap-3">

                                            <input
                                                type="radio"
                                                name="shipping_address_id"
                                                value="{{ $address->id }}"
                                                class="address-option mt-1
                                                       accent-orange-500"
                                                {{ old('shipping_address_id') == $address->id || (!old('shipping_address_id') && $loop->first) ? 'checked' : '' }}
                                            >


                                            <div class="flex-1">

                                                <div class="flex items-center
                                                            justify-between">

                                                    <p class="font-semibold
                                                              text-gray-900">

                                                        {{ $address->full_name }}

                                                    </p>


                                                    @if($address->is_default)

                                                        <span
                                                            class="text-xs
                                                                   bg-orange-100
                                                                   text-orange-700
                                                                   px-2 py-1
                                                                   rounded"
                                                        >

                                                            Default

                                                        </span>

                                                    @endif

                                                </div>


                                                <p class="text-sm text-gray-600 mt-1">

                                                    {{ $address->phone }}

                                                </p>


                                                <p class="text-sm text-gray-600 mt-2">

                                                    {{ $address->address_line_1 }}

                                                </p>


                                                @if($address->address_line_2)

                                                    <p class="text-sm text-gray-600">

                                                        {{ $address->address_line_2 }}

                                                    </p>

                                                @endif


                                                <p class="text-sm text-gray-600">

                                                    {{ $address->city }}

                                                    @if($address->state)

                                                        , {{ $address->state }}

                                                    @endif

                                                    @if($address->postal_code)

                                                        - {{ $address->postal_code }}

                                                    @endif

                                                </p>


                                                <p class="text-sm text-gray-600">

                                                    {{ $address->country }}

                                                </p>

                                            </div>

                                        </div>

                                    </label>

                                @endforeach

                            </div>

                        </div>

                    @else

                        {{-- ================================================= --}}
                        {{-- NO SAVED ADDRESS --}}
                        {{-- ================================================= --}}

                        <div class="bg-yellow-50 border border-yellow-200
                                    rounded-lg p-4 mb-6">

                            <div class="flex gap-3">

                                <i class="fa-solid fa-triangle-exclamation
                                          text-yellow-600 mt-1"></i>

                                <div>

                                    <p class="font-semibold text-yellow-800">

                                        No saved shipping address found.

                                    </p>

                                    <p class="text-sm text-yellow-700 mt-1">

                                        Please enter a new shipping address
                                        below.

                                    </p>

                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- ================================================= --}}
                    {{-- NEW ADDRESS OPTION --}}
                    {{-- ================================================= --}}

                    <div class="mt-6 border-t pt-6">


                        <div class="flex items-center gap-3 mb-5">

                            <input
                                type="radio"
                                name="shipping_address_id"
                                value=""
                                id="new_address_radio"
                                class="accent-orange-500"
                                {{ !$addresses->count() || old('new_full_name') ? 'checked' : '' }}
                            >

                            <label
                                for="new_address_radio"
                                class="font-semibold text-gray-900
                                       cursor-pointer"
                            >

                                Use a new address

                            </label>

                        </div>


                        {{-- ================================================= --}}
                        {{-- NEW ADDRESS FORM --}}
                        {{-- ================================================= --}}

                        <div
                            id="new-address-fields"
                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                        >


                            {{-- Full Name --}}

                            <div>

                                <label
                                    for="new_full_name"
                                    class="block text-sm font-medium
                                           text-gray-700 mb-1"
                                >

                                    Full Name

                                </label>

                                <input
                                    type="text"
                                    id="new_full_name"
                                    name="new_full_name"
                                    value="{{ old('new_full_name') }}"
                                    placeholder="Enter full name"
                                    class="new-address-field w-full
                                           border border-gray-300
                                           rounded-lg px-3 py-2
                                           focus:ring-2
                                           focus:ring-orange-500
                                           focus:outline-none"
                                >

                            </div>


                            {{-- Phone --}}

                            <div>

                                <label
                                    for="new_phone"
                                    class="block text-sm font-medium
                                           text-gray-700 mb-1"
                                >

                                    Phone

                                </label>

                                <input
                                    type="text"
                                    id="new_phone"
                                    name="new_phone"
                                    value="{{ old('new_phone') }}"
                                    placeholder="98XXXXXXXX"
                                    class="new-address-field w-full
                                           border border-gray-300
                                           rounded-lg px-3 py-2
                                           focus:ring-2
                                           focus:ring-orange-500
                                           focus:outline-none"
                                >

                            </div>


                            {{-- Address Line 1 --}}

                            <div class="md:col-span-2">

                                <label
                                    for="new_address_line_1"
                                    class="block text-sm font-medium
                                           text-gray-700 mb-1"
                                >

                                    Address

                                </label>

                                <input
                                    type="text"
                                    id="new_address_line_1"
                                    name="new_address_line_1"
                                    value="{{ old('new_address_line_1') }}"
                                    placeholder="Street, Tole, House number"
                                    class="new-address-field w-full
                                           border border-gray-300
                                           rounded-lg px-3 py-2
                                           focus:ring-2
                                           focus:ring-orange-500
                                           focus:outline-none"
                                >

                            </div>


                            {{-- Address Line 2 --}}

                            <div class="md:col-span-2">

                                <label
                                    for="new_address_line_2"
                                    class="block text-sm font-medium
                                           text-gray-700 mb-1"
                                >

                                    Address Line 2

                                    <span class="text-gray-400">
                                        (Optional)
                                    </span>

                                </label>

                                <input
                                    type="text"
                                    id="new_address_line_2"
                                    name="new_address_line_2"
                                    value="{{ old('new_address_line_2') }}"
                                    placeholder="Apartment, landmark, etc."
                                    class="new-address-field w-full
                                           border border-gray-300
                                           rounded-lg px-3 py-2
                                           focus:ring-2
                                           focus:ring-orange-500
                                           focus:outline-none"
                                >

                            </div>


                            {{-- City --}}

                            <div>

                                <label
                                    for="new_city"
                                    class="block text-sm font-medium
                                           text-gray-700 mb-1"
                                >

                                    City

                                </label>

                                <input
                                    type="text"
                                    id="new_city"
                                    name="new_city"
                                    value="{{ old('new_city') }}"
                                    placeholder="Kathmandu"
                                    class="new-address-field w-full
                                           border border-gray-300
                                           rounded-lg px-3 py-2
                                           focus:ring-2
                                           focus:ring-orange-500
                                           focus:outline-none"
                                >

                            </div>


                            {{-- State --}}

                            <div>

                                <label
                                    for="new_state"
                                    class="block text-sm font-medium
                                           text-gray-700 mb-1"
                                >

                                    State / Province

                                </label>

                                <input
                                    type="text"
                                    id="new_state"
                                    name="new_state"
                                    value="{{ old('new_state') }}"
                                    placeholder="Bagmati"
                                    class="new-address-field w-full
                                           border border-gray-300
                                           rounded-lg px-3 py-2
                                           focus:ring-2
                                           focus:ring-orange-500
                                           focus:outline-none"
                                >

                            </div>


                            {{-- Postal Code --}}

                            <div>

                                <label
                                    for="new_postal_code"
                                    class="block text-sm font-medium
                                           text-gray-700 mb-1"
                                >

                                    Postal Code

                                </label>

                                <input
                                    type="text"
                                    id="new_postal_code"
                                    name="new_postal_code"
                                    value="{{ old('new_postal_code') }}"
                                    placeholder="44600"
                                    class="new-address-field w-full
                                           border border-gray-300
                                           rounded-lg px-3 py-2
                                           focus:ring-2
                                           focus:ring-orange-500
                                           focus:outline-none"
                                >

                            </div>


                            {{-- Country --}}

                            <div>

                                <label
                                    for="new_country"
                                    class="block text-sm font-medium
                                           text-gray-700 mb-1"
                                >

                                    Country

                                </label>

                                <input
                                    type="text"
                                    id="new_country"
                                    name="new_country"
                                    value="{{ old('new_country', 'Nepal') }}"
                                    class="new-address-field w-full
                                           border border-gray-300
                                           rounded-lg px-3 py-2
                                           focus:ring-2
                                           focus:ring-orange-500
                                           focus:outline-none"
                                >

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- 2. ORDER ITEMS --}}
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

                                {{-- Product Image --}}

                                <img
                                    src="{{ $image }}"
                                    alt="{{ $product->name }}"
                                    class="w-24 h-24 object-cover
                                           rounded-lg border"
                                >


                                {{-- Product Information --}}

                                <div class="flex-1">

                                    <h3 class="font-semibold text-gray-900">

                                        {{ $product->name }}

                                    </h3>


                                    @if($variation)

                                        <div class="mt-2 flex flex-wrap gap-2">

                                            @foreach($variation->attributes as $attribute => $value)

                                                <span
                                                    class="text-xs
                                                           bg-gray-100
                                                           text-gray-700
                                                           px-2 py-1
                                                           rounded"
                                                >

                                                    {{ ucfirst($attribute) }}:
                                                    {{ $value }}

                                                </span>

                                            @endforeach

                                        </div>

                                    @endif


                                    <div class="flex justify-between
                                                items-center mt-3">

                                        <div class="text-sm text-gray-500">

                                            Quantity:

                                            <span class="font-medium text-gray-700">

                                                {{ $item->quantity }}

                                            </span>

                                        </div>


                                        <div class="font-bold text-gray-900">

                                            Rs.

                                            {{ number_format(
                                                $item->price * $item->quantity,
                                                2
                                            ) }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- 3. PAYMENT METHOD --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-xl shadow-sm
                            border border-gray-200 p-6">

                    <h2 class="text-xl font-bold text-gray-900 mb-5">

                        3. Payment Method

                    </h2>


                    <div class="space-y-3">


                        {{-- Cash on Delivery --}}

                        <label
                            class="block border border-gray-300
                                   rounded-lg p-4 cursor-pointer
                                   hover:border-orange-500
                                   transition"
                        >

                            <div class="flex items-center gap-3">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="cod"
                                    {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }}
                                    class="accent-orange-500"
                                >

                                <div>

                                    <p class="font-semibold text-gray-900">

                                        Cash on Delivery

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        Pay when your order arrives.

                                    </p>

                                </div>

                            </div>

                        </label>


                        {{-- eSewa --}}

                        <label
                            class="block border border-gray-300
                                   rounded-lg p-4 cursor-pointer
                                   hover:border-orange-500
                                   transition"
                        >

                            <div class="flex items-center gap-3">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="esewa"
                                    {{ old('payment_method') === 'esewa' ? 'checked' : '' }}
                                    class="accent-orange-500"
                                >

                                <div>

                                    <p class="font-semibold text-gray-900">

                                        eSewa

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        Pay securely using eSewa.

                                    </p>

                                </div>

                            </div>

                        </label>


                        {{-- Khalti --}}

                        <label
                            class="block border border-gray-300
                                   rounded-lg p-4 cursor-pointer
                                   hover:border-orange-500
                                   transition"
                        >

                            <div class="flex items-center gap-3">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="khalti"
                                    {{ old('payment_method') === 'khalti' ? 'checked' : '' }}
                                    class="accent-orange-500"
                                >

                                <div>

                                    <p class="font-semibold text-gray-900">

                                        Khalti

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        Pay securely using Khalti.

                                    </p>

                                </div>

                            </div>

                        </label>


                        {{-- Bank Transfer --}}

                        <label
                            class="block border border-gray-300
                                   rounded-lg p-4 cursor-pointer
                                   hover:border-orange-500
                                   transition"
                        >

                            <div class="flex items-center gap-3">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="bank_transfer"
                                    {{ old('payment_method') === 'bank_transfer' ? 'checked' : '' }}
                                    class="accent-orange-500"
                                >

                                <div>

                                    <p class="font-semibold text-gray-900">

                                        Bank Transfer

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        Pay directly through bank transfer.

                                    </p>

                                </div>

                            </div>

                        </label>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- RIGHT SIDE - ORDER SUMMARY --}}
            {{-- ================================================= --}}

            <div>

                <div class="bg-white rounded-xl shadow-sm
                            border border-gray-200 p-6
                            sticky top-6">

                    <h2 class="text-xl font-bold text-gray-900 mb-5">

                        4. Order Summary

                    </h2>


                    {{-- Number of Items --}}

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

                            <span class="text-lg font-bold text-gray-900">
                                Total
                            </span>

                            <span class="text-xl font-bold
                                         text-orange-600">

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
                               rounded-lg
                               bg-orange-500
                               text-white
                               font-semibold
                               hover:bg-orange-600
                               transition"
                    >

                        <i class="fa-solid fa-lock mr-2"></i>

                        Place Order

                    </button>


                    {{-- Back to Cart --}}

                    <a
                        href="{{ route('cart.index') }}"
                        class="block text-center mt-4
                               text-sm text-gray-600
                               hover:text-orange-600"
                    >

                        ← Back to Cart

                    </a>


                    <p class="text-xs text-gray-400
                              text-center mt-4">

                        By placing your order, you agree to
                        Haatify's terms and conditions.

                    </p>

                </div>

            </div>

        </div>

    </form>

</div>


</div>

@endsection

{{-- ========================================================= --}}
{{-- ADDRESS JAVASCRIPT --}}
{{-- ========================================================= --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Get Elements
    |--------------------------------------------------------------------------
    */

    const addressOptions =
        document.querySelectorAll(
            '.address-option'
        );

    const newAddressRadio =
        document.getElementById(
            'new_address_radio'
        );

    const newAddressFields =
        document.querySelectorAll(
            '.new-address-field'
        );


    /*
    |--------------------------------------------------------------------------
    | Enable / Disable New Address Fields
    |--------------------------------------------------------------------------
    */

    function updateAddressFields() {

        const usingNewAddress =
            newAddressRadio.checked;


        newAddressFields.forEach(function (field) {

            field.disabled =
                !usingNewAddress;

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Existing Address Selected
    |--------------------------------------------------------------------------
    */

    addressOptions.forEach(function (radio) {

        radio.addEventListener(
            'change',
            function () {

                updateAddressFields();

            }
        );

    });


    /*
    |--------------------------------------------------------------------------
    | New Address Selected
    |--------------------------------------------------------------------------
    */

    newAddressRadio.addEventListener(
        'change',
        function () {

            updateAddressFields();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Initial State
    |--------------------------------------------------------------------------
    */

    updateAddressFields();

});

</script>

@endpush
