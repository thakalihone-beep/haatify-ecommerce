@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50">


<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                My Wishlist
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Save your favorite products for later
            </p>
        </div>

        @if($wishlists->count())
            <span class="hidden sm:inline-flex items-center px-4 py-2
                bg-white border border-gray-200 rounded-full
                text-sm font-medium text-gray-600 shadow-sm">

                {{ $wishlists->count() }}
                {{ $wishlists->count() == 1 ? 'Item' : 'Items' }}
            </span>
        @endif

    </div>


    {{-- Wishlist Products --}}
    @if($wishlists->count())

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach($wishlists as $wishlist)

                @php
                    $product = $wishlist->product;

                    $image = $product?->first_image_url
                        ?? asset('frontend/image/amazon1.jpg');

                    $price = $product?->discount_price ?? $product?->price ?? 0;

                    $oldPrice = $product?->discount_price
                        ? $product?->price
                        : null;

                    $discount = ($oldPrice && $oldPrice > $price)
                        ? round((($oldPrice - $price) / $oldPrice) * 100)
                        : null;
                @endphp


                {{-- Product Card --}}
                <div class="group bg-white rounded-xl overflow-hidden
                    border border-gray-200
                    hover:border-gray-300
                    hover:shadow-xl
                    transition-all duration-300">


                    {{-- Product Image --}}
                    <div class="relative bg-gray-100 h-64 overflow-hidden">

                        @if($product)

                            <a href="">

                                <img
                                    src="{{ $image }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-contain p-5
                                    group-hover:scale-105
                                    transition-transform duration-500"
                                >

                            </a>

                        @else

                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fa-solid fa-image text-5xl text-gray-300"></i>
                            </div>

                        @endif


                        {{-- Discount Badge --}}
                        @if($discount)
                            <span class="absolute top-3 left-3
                                bg-red-500 text-white
                                text-xs font-bold
                                px-3 py-1 rounded-full">

                                -{{ $discount }}%
                            </span>
                        @endif


                        {{-- Remove Wishlist --}}
                        <form
                            action="{{ route('wishlist.destroy', $wishlist->product_id) }}"
                            method="POST"
                            class="absolute top-3 right-3"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                title="Remove from wishlist"
                                class="w-10 h-10 flex items-center justify-center
                                bg-white rounded-full
                                shadow-md
                                text-red-500
                                hover:bg-red-500
                                hover:text-white
                                transition duration-200"
                            >

                                <i class="fa-solid fa-heart"></i>

                            </button>

                        </form>

                    </div>


                    {{-- Product Information --}}
                    <div class="p-5">

                        @if($product)

                            {{-- Product Name --}}
                            <a
                                href=""
                                class="block"
                            >

                                <h2 class="font-semibold text-gray-900
                                    text-base leading-6
                                    line-clamp-2
                                    group-hover:text-orange-600
                                    transition">

                                    {{ $product->name }}

                                </h2>

                            </a>


                            {{-- Rating --}}
                            <div class="flex items-center gap-1 mt-2">

                                <div class="flex text-yellow-400 text-sm">

                                    @for($i = 1; $i <= 5; $i++)

                                        @if($i <= round($product->avg_rating ?? 0))
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-regular fa-star"></i>
                                        @endif

                                    @endfor

                                </div>

                                <span class="text-xs text-gray-500">
                                    ({{ number_format($product->avg_rating ?? 0, 1) }})
                                </span>

                            </div>


                            {{-- Price --}}
                            <div class="flex items-center gap-2 mt-3">

                                <span class="text-xl font-bold text-gray-900">
                                    Rs. {{ number_format($price, 2) }}
                                </span>

                                @if($oldPrice)
                                    <span class="text-sm text-gray-400 line-through">
                                        Rs. {{ number_format($oldPrice, 2) }}
                                    </span>
                                @endif

                            </div>


                            {{-- Stock --}}
                            @if(($product->stock_qty ?? 0) > 0)

                                <p class="text-xs text-green-600 font-medium mt-2">
                                    <i class="fa-solid fa-circle-check mr-1"></i>
                                    In Stock
                                </p>

                            @else

                                <p class="text-xs text-red-500 font-medium mt-2">
                                    <i class="fa-solid fa-circle-xmark mr-1"></i>
                                    Out of Stock
                                </p>

                            @endif


                            {{-- View Product --}}
                            <a
                                href=""
                                class="mt-4 w-full inline-flex items-center
                                justify-center gap-2
                                bg-gray-900 text-white
                                py-2.5 px-4
                                rounded-lg
                                text-sm font-semibold
                                hover:bg-orange-500
                                transition duration-200"
                            >

                                <i class="fa-solid fa-cart-shopping"></i>

                                View Product

                            </a>

                        @else

                            <h2 class="font-semibold text-gray-500">
                                Product unavailable
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                This product is no longer available.
                            </p>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- Empty Wishlist --}}
        <div class="bg-white border border-gray-200
            rounded-2xl py-20 px-6
            flex flex-col items-center justify-center
            text-center shadow-sm">

            <div class="w-24 h-24 rounded-full
                bg-red-50
                flex items-center justify-center mb-6">

                <i class="fa-regular fa-heart text-4xl text-red-500"></i>

            </div>

            <h2 class="text-2xl font-bold text-gray-900">
                Your wishlist is empty
            </h2>

            <p class="text-gray-500 mt-2 max-w-md">
                You haven't added any products to your wishlist yet.
                Explore our products and save the ones you love.
            </p>

            <a
                href="{{ route('products.index') }}"
                class="mt-6 inline-flex items-center gap-2
                bg-orange-500 text-white
                px-6 py-3
                rounded-lg
                font-semibold
                hover:bg-orange-600
                transition"
            >

                <i class="fa-solid fa-bag-shopping"></i>

                Continue Shopping

            </a>

        </div>

    @endif

</div>

</div>

@endsection
