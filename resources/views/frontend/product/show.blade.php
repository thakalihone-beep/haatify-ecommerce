{{-- resources/views/frontend/product/show.blade.php --}}

@extends('layouts.app')

@section('title', $product->name . ' | Haatify')

@section('content')

<div class="min-h-screen bg-gray-50 py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <div class="mb-6 text-sm text-gray-500">
            <a href="{{route('home')}}" class="hover:text-orange-500">
                Home
            </a>

            <span class="mx-2">/</span>

            @if($product->category)
                <a href="{{ route('categories.show', $product->category->slug) }}"
                   class="hover:text-orange-500">
                    {{ $product->category->name }}
                </a>

                <span class="mx-2">/</span>
            @endif

            <span class="text-gray-700">
                {{ $product->name }}
            </span>
        </div>


        {{-- Product --}}
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-10">

                {{-- =========================
                     LEFT: PRODUCT IMAGES
                ========================== --}}
                <div>

                    {{-- Main Image --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden
                                bg-white aspect-square flex items-center justify-center">

                        @if($product->first_image_url)

                            <img
                                id="mainProductImage"
                                src="{{ $product->first_image_url }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-contain p-6"
                            >

                        @else

                            <div class="flex flex-col items-center justify-center
                                        text-gray-400">

                                <i class="fa-solid fa-image text-6xl mb-3"></i>

                                <span>
                                    No image available
                                </span>

                            </div>

                        @endif

                    </div>


                    {{-- Thumbnail Images --}}
                    @php
                        $images = $product->images ?? [];

                        if (is_string($images)) {
                            $decoded = json_decode($images, true);
                            $images = is_array($decoded) ? $decoded : [$images];
                        }
                    @endphp

                    @if(is_array($images) && count($images) > 0)

                        <div class="flex gap-3 mt-4 overflow-x-auto pb-2">

                            @foreach($images as $image)

                                @php
                                    $imagePath = (string) $image;

                                    if (
                                        !str_starts_with($imagePath, 'http://') &&
                                        !str_starts_with($imagePath, 'https://')
                                    ) {
                                        $imagePath = ltrim($imagePath, '/');

                                        if (str_starts_with($imagePath, 'storage/')) {
                                            $imagePath = substr(
                                                $imagePath,
                                                strlen('storage/')
                                            );
                                        }

                                        $imagePath = asset('storage/' . $imagePath);
                                    }
                                @endphp

                                <button
                                    type="button"
                                    onclick="changeMainImage('{{ $imagePath }}')"
                                    class="flex-shrink-0 w-20 h-20 border-2
                                           border-gray-200 rounded-lg overflow-hidden
                                           hover:border-orange-500
                                           focus:border-orange-500">

                                    <img
                                        src="{{ $imagePath }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-contain p-1"
                                    >

                                </button>

                            @endforeach

                        </div>

                    @endif

                </div>


                {{-- =========================
                     RIGHT: PRODUCT INFORMATION
                ========================== --}}
                <div>

                    {{-- Category --}}
                    @if($product->category)

                        <a
                            href="{{ route('categories.show', $product->category->slug) }}"
                            class="text-sm text-orange-600 font-medium hover:underline"
                        >
                            {{ $product->category->name }}
                        </a>

                    @endif


                    {{-- Product Name --}}
                    <h1 class="text-2xl md:text-3xl font-semibold
                               text-gray-900 mt-2 leading-tight">

                        {{ $product->name }}

                    </h1>


                    {{-- Rating --}}
                    <div class="flex items-center gap-3 mt-4">

                        <div class="flex items-center">

                            @php
                                $rating = (float) $product->avg_rating;
                                $fullStars = floor($rating);
                                $hasHalfStar = ($rating - $fullStars) >= 0.5;
                            @endphp

                            @for($i = 1; $i <= 5; $i++)

                                @if($i <= $fullStars)

                                    <i class="fa-solid fa-star text-yellow-400"></i>

                                @elseif($hasHalfStar && $i == $fullStars + 1)

                                    <i class="fa-solid fa-star-half-stroke text-yellow-400"></i>

                                @else

                                    <i class="fa-regular fa-star text-gray-300"></i>

                                @endif

                            @endfor

                        </div>

                        <span class="text-sm text-gray-600">
                            {{ number_format($rating, 1) }}
                        </span>

                    </div>


                    {{-- Divider --}}
                    <div class="border-t border-gray-200 my-6"></div>


                    {{-- Price --}}
                    <div>

                        @if($product->discount_price)

                            <div class="flex items-center gap-3">

                                <span class="text-3xl font-bold text-gray-900">
                                    Rs. {{ number_format($product->discount_price, 2) }}
                                </span>

                                <span class="text-lg text-gray-400 line-through">
                                    Rs. {{ number_format($product->price, 2) }}
                                </span>

                            </div>

                            @if($product->price > 0)

                                @php
                                    $discount = (
                                        ($product->price - $product->discount_price)
                                        / $product->price
                                    ) * 100;
                                @endphp

                                <span class="inline-block mt-2 px-2 py-1
                                             text-sm font-semibold
                                             text-green-700 bg-green-100
                                             rounded">

                                    {{ round($discount) }}% off

                                </span>

                            @endif

                        @else

                            <span class="text-3xl font-bold text-gray-900">
                                Rs. {{ number_format($product->price, 2) }}
                            </span>

                        @endif

                    </div>


                    {{-- Stock --}}
                    <div class="mt-5">

                        @if($product->stock_qty > 0)

                            <div class="flex items-center gap-2 text-green-600">

                                <i class="fa-solid fa-circle-check"></i>

                                <span class="font-medium">
                                    In Stock
                                </span>

                            </div>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $product->stock_qty }} items available
                            </p>

                        @else

                            <div class="flex items-center gap-2 text-red-600">

                                <i class="fa-solid fa-circle-xmark"></i>

                                <span class="font-medium">
                                    Out of Stock
                                </span>

                            </div>

                        @endif

                    </div>


                    {{-- Description --}}
                    @if($product->description)

                        <div class="mt-6">

                            <h2 class="text-lg font-semibold text-gray-900 mb-2">
                                About this product
                            </h2>

                            <div class="text-gray-600 leading-relaxed">
                                {!! nl2br(e($product->description)) !!}
                            </div>

                        </div>

                    @endif


                    {{-- Tags --}}
                    @php
                        $tags = $product->tags ?? [];

                        if (is_string($tags)) {
                            $decodedTags = json_decode($tags, true);
                            $tags = is_array($decodedTags) ? $decodedTags : [];
                        }
                    @endphp

                    @if(is_array($tags) && count($tags) > 0)

                        <div class="mt-5">

                            <div class="flex flex-wrap gap-2">

                                @foreach($tags as $tag)

                                    <span class="px-3 py-1 bg-gray-100
                                                 text-gray-600 text-sm
                                                 rounded-full">

                                        #{{ $tag }}

                                    </span>

                                @endforeach

                            </div>

                        </div>

                    @endif


                    {{-- Divider --}}
                    <div class="border-t border-gray-200 my-6"></div>


                    {{-- Quantity --}}
                    @if($product->stock_qty > 0)

                        <div class="flex items-center gap-4 mb-5">

                            <span class="font-medium text-gray-800">
                                Quantity:
                            </span>

                            <div class="flex items-center border border-gray-300
                                        rounded-lg overflow-hidden">

                                <button
                                    type="button"
                                    onclick="decreaseQuantity()"
                                    class="w-10 h-10 hover:bg-gray-100"
                                >
                                    −
                                </button>

                                <input
                                    id="quantity"
                                    type="number"
                                    value="1"
                                    min="1"
                                    max="{{ $product->stock_qty }}"
                                    class="w-14 h-10 text-center border-x
                                           border-gray-300 focus:outline-none"
                                >

                                <button
                                    type="button"
                                    onclick="increaseQuantity()"
                                    class="w-10 h-10 hover:bg-gray-100"
                                >
                                    +
                                </button>

                            </div>

                        </div>


                        {{-- Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3">

                            <button
                                type="button"
                                class="flex-1 bg-yellow-400
                                       hover:bg-yellow-500
                                       text-gray-900 font-semibold
                                       py-3 px-6 rounded-lg
                                       transition"
                            >

                                <i class="fa-solid fa-cart-plus mr-2"></i>

                                Add to Cart

                            </button>


                            <button
                                type="button"
                                class="flex-1 bg-orange-500
                                       hover:bg-orange-600
                                       text-white font-semibold
                                       py-3 px-6 rounded-lg
                                       transition"
                            >

                                Buy Now

                            </button>

                        </div>


                        {{-- Wishlist --}}
                        <button
                            type="button"
                            class="w-full mt-3 border border-gray-300
                                   hover:border-red-400
                                   hover:text-red-500
                                   text-gray-700 font-medium
                                   py-3 rounded-lg transition"
                        >

                            <i class="fa-regular fa-heart mr-2"></i>

                            Add to Wishlist

                        </button>

                    @else

                        <button
                            type="button"
                            disabled
                            class="w-full bg-gray-300 text-gray-500
                                   font-semibold py-3 rounded-lg
                                   cursor-not-allowed"
                        >

                            Out of Stock

                        </button>

                    @endif


                    {{-- Delivery Information --}}
                    <div class="mt-6 bg-gray-50 rounded-lg p-4">

                        <div class="flex items-start gap-3 mb-4">

                            <i class="fa-solid fa-truck text-orange-500 mt-1"></i>

                            <div>

                                <p class="font-medium text-gray-800">
                                    Delivery
                                </p>

                                <p class="text-sm text-gray-500">
                                    Delivery available across Nepal
                                </p>

                            </div>

                        </div>


                        <div class="flex items-start gap-3">

                            <i class="fa-solid fa-shield-halved text-green-600 mt-1"></i>

                            <div>

                                <p class="font-medium text-gray-800">
                                    Secure Shopping
                                </p>

                                <p class="text-sm text-gray-500">
                                    Safe and secure checkout
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================
             PRODUCT DETAILS
        ========================== --}}
        <div class="bg-white rounded-xl shadow-sm mt-8 p-6 lg:p-10">

            <h2 class="text-2xl font-semibold text-gray-900 mb-6">
                Product Details
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

                <div class="flex justify-between border-b py-3">

                    <span class="text-gray-500">
                        Product
                    </span>

                    <span class="font-medium text-gray-800">
                        {{ $product->name }}
                    </span>

                </div>


                @if($product->category)

                    <div class="flex justify-between border-b py-3">

                        <span class="text-gray-500">
                            Category
                        </span>

                        <span class="font-medium text-gray-800">
                            {{ $product->category->name }}
                        </span>

                    </div>

                @endif


                <div class="flex justify-between border-b py-3">

                    <span class="text-gray-500">
                        Availability
                    </span>

                    <span class="font-medium
                        {{ $product->stock_qty > 0
                            ? 'text-green-600'
                            : 'text-red-600' }}">

                        {{ $product->stock_qty > 0
                            ? 'In Stock'
                            : 'Out of Stock' }}

                    </span>

                </div>


                <div class="flex justify-between border-b py-3">

                    <span class="text-gray-500">
                        Rating
                    </span>

                    <span class="font-medium text-gray-800">
                        {{ number_format((float) $product->avg_rating, 1) }} / 5
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================
     JAVASCRIPT
========================== --}}
<script>

    function changeMainImage(imageUrl) {

        const mainImage = document.getElementById('mainProductImage');

        if (mainImage) {
            mainImage.src = imageUrl;
        }

    }


    function increaseQuantity() {

        const quantity = document.getElementById('quantity');

        if (!quantity) return;

        const max = parseInt(quantity.max);
        const current = parseInt(quantity.value);

        if (current < max) {
            quantity.value = current + 1;
        }

    }


    function decreaseQuantity() {

        const quantity = document.getElementById('quantity');

        if (!quantity) return;

        const current = parseInt(quantity.value);

        if (current > 1) {
            quantity.value = current - 1;
        }

    }

</script>

@endsection

