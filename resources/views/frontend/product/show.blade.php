@extends('layouts.app')

@section('title', $product->name . ' | Haatify')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Prepare Product Images
    |--------------------------------------------------------------------------
    */

    $images = $product->images ?? [];

    if (is_string($images)) {
        $decoded = json_decode($images, true);
        $images = is_array($decoded) ? $decoded : [$images];
    }

    /*
    |--------------------------------------------------------------------------
    | Prepare Variation Attributes
    |--------------------------------------------------------------------------
    */

    $variationAttributes = [];

    foreach ($product->variations as $variation) {
        $attributes = $variation->attributes ?? [];

        if (is_string($attributes)) {
            $decoded = json_decode($attributes, true);
            $attributes = is_array($decoded) ? $decoded : [];
        }

        foreach ($attributes as $attributeName => $attributeValue) {
            if (!isset($variationAttributes[$attributeName])) {
                $variationAttributes[$attributeName] = [];
            }

            if (!in_array($attributeValue, $variationAttributes[$attributeName])) {
                $variationAttributes[$attributeName][] = $attributeValue;
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Product Tags
    |--------------------------------------------------------------------------
    */

    $tags = $product->tags ?? [];

    if (is_string($tags)) {
        $decodedTags = json_decode($tags, true);
        $tags = is_array($decodedTags) ? $decodedTags : [];
    }

    $rating = (float) $product->avg_rating;
    $discount = 0;

    if (
        $product->discount_price &&
        $product->price > 0 &&
        $product->discount_price < $product->price
    ) {
        $discount = round(
            (($product->price - $product->discount_price) / $product->price) * 100
        );
    }
@endphp

<div class="min-h-screen bg-gray-50 py-6 md:py-10">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-orange-500 transition">
                Home
            </a>

            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>

            @if ($product->category)
                <a
                    href="{{ route('categories.show', $product->category->slug) }}"
                    class="hover:text-orange-500 transition"
                >
                    {{ $product->category->name }}
                </a>

                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
            @endif

            <span class="text-gray-800 truncate">
                {{ $product->name }}
            </span>
        </div>

        {{-- Main Product Card --}}
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 p-5 md:p-8 lg:p-10">

                {{-- =====================================================
                     LEFT SIDE - IMAGES
                ====================================================== --}}
                <div>

                    {{-- Main Image --}}
                    <div class="relative bg-gray-50 rounded-2xl border border-gray-200 overflow-hidden aspect-square flex items-center justify-center">

                        @if ($product->first_image_url)

                            @if ($discount > 0)
                                <div class="absolute top-4 left-4 z-10 bg-orange-500 text-white text-sm font-bold px-3 py-1.5 rounded-full">
                                    -{{ $discount }}%
                                </div>
                            @endif

                            <button
                                type="button"
                                class="absolute top-4 right-4 z-10 w-10 h-10 bg-white border border-gray-200 rounded-full shadow-sm flex items-center justify-center text-gray-500 hover:text-orange-500 hover:border-orange-400 transition"
                            >
                                <i class="fa-regular fa-heart"></i>
                            </button>

                            <img
                                id="mainProductImage"
                                src="{{ $product->first_image_url }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-contain p-8 md:p-12 transition duration-300"
                            >

                        @else

                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <i class="fa-solid fa-image text-6xl mb-4"></i>
                                <span>No image available</span>
                            </div>

                        @endif

                    </div>

                    {{-- Thumbnail Images --}}
                    @if (is_array($images) && count($images) > 0)

                        <div class="flex gap-3 mt-4 overflow-x-auto pb-2">

                            @foreach ($images as $index => $image)

                                @php
                                    $imagePath = (string) $image;

                                    if (
                                        !str_starts_with($imagePath, 'http://') &&
                                        !str_starts_with($imagePath, 'https://')
                                    ) {
                                        $imagePath = ltrim($imagePath, '/');

                                        if (str_starts_with($imagePath, 'storage/')) {
                                            $imagePath = substr($imagePath, strlen('storage/'));
                                        }

                                        $imagePath = asset('storage/' . $imagePath);
                                    }
                                @endphp

                                <button
                                    type="button"
                                    onclick="changeMainImage(@js($imagePath))"
                                    class="flex-shrink-0 w-20 h-20 md:w-24 md:h-24 bg-white border-2 border-gray-200 rounded-xl overflow-hidden hover:border-orange-500 transition focus:border-orange-500"
                                >
                                    <img
                                        src="{{ $imagePath }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-contain p-2"
                                    >
                                </button>

                            @endforeach

                        </div>

                    @endif

                </div>


                {{-- =====================================================
                     RIGHT SIDE - PRODUCT INFORMATION
                ====================================================== --}}
                <div>

                    {{-- Category --}}
                    @if ($product->category)
                        <a
                            href="{{ route('categories.show', $product->category->slug) }}"
                            class="inline-flex items-center text-sm font-semibold text-orange-600 hover:text-orange-700 transition"
                        >
                            {{ $product->category->name }}
                        </a>
                    @endif

                    {{-- Product Name --}}
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mt-2">
                        {{ $product->name }}
                    </h1>

                    {{-- Rating --}}
                    <div class="flex items-center gap-3 mt-4">

                        <div class="flex items-center gap-1">

                            @php
                                $fullStars = floor($rating);
                                $hasHalfStar = $rating - $fullStars >= 0.5;
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)

                                @if ($i <= $fullStars)
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                @elseif ($hasHalfStar && $i == $fullStars + 1)
                                    <i class="fa-solid fa-star-half-stroke text-yellow-400"></i>
                                @else
                                    <i class="fa-regular fa-star text-gray-300"></i>
                                @endif

                            @endfor

                        </div>

                        <span class="font-semibold text-gray-700">
                            {{ number_format($rating, 1) }}
                        </span>

                        <span class="text-gray-300">|</span>

                        <span class="text-sm text-gray-500">
                            {{ $product->reviews()->where('is_approved', true)->count() }} reviews
                        </span>

                    </div>

                    <div class="border-t border-gray-200 my-6"></div>


                    {{-- Price --}}
                    <div>

                        <div class="flex items-center flex-wrap gap-3">

                            <span
                                id="productPrice"
                                class="text-3xl md:text-4xl font-bold text-gray-900"
                            >
                                @if ($product->discount_price)
                                    Rs. {{ number_format($product->discount_price, 2) }}
                                @else
                                    Rs. {{ number_format($product->price, 2) }}
                                @endif
                            </span>

                            <span
                                id="originalProductPrice"
                                class="text-lg text-gray-400 line-through {{ $product->discount_price ? '' : 'hidden' }}"
                            >
                                @if ($product->discount_price)
                                    Rs. {{ number_format($product->price, 2) }}
                                @endif
                            </span>

                        </div>

                        <div id="discountBadge">

                            @if ($discount > 0)
                                <span class="inline-flex items-center mt-2 px-3 py-1 text-sm font-bold text-green-700 bg-green-100 rounded-full">
                                    Save {{ $discount }}%
                                </span>
                            @endif

                        </div>

                    </div>


                    {{-- Stock --}}
                    <div class="mt-6">

                        <div id="stockInformation">

                            @if ($product->stock_qty > 0)

                                <div class="flex items-center gap-2 text-green-600">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span class="font-semibold">
                                        In Stock
                                    </span>
                                </div>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $product->stock_qty }} items available
                                </p>

                            @else

                                <div class="flex items-center gap-2 text-red-600">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    <span class="font-semibold">
                                        Out of Stock
                                    </span>
                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- Variations --}}
                    @if ($product->variations->count() > 0)

                        <div class="space-y-5 mt-7 mb-6">

                            @foreach ($variationAttributes as $attributeName => $attributeValues)

                                <div>

                                    <div class="flex items-center justify-between mb-3">

                                        <label class="font-semibold text-gray-900 capitalize">
                                            {{ str_replace('_', ' ', $attributeName) }}:

                                            <span
                                                id="selected-{{ $attributeName }}"
                                                class="font-normal text-orange-600"
                                            ></span>
                                        </label>

                                    </div>

                                    <div class="flex flex-wrap gap-2">

                                        @foreach ($attributeValues as $attributeValue)

                                            <button
                                                type="button"
                                                class="variation-option border border-gray-300 bg-white rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-600 hover:bg-orange-50 transition"
                                                data-attribute="{{ $attributeName }}"
                                                data-value="{{ $attributeValue }}"
                                                onclick="selectVariationOption('{{ $attributeName }}', @js($attributeValue), this)"
                                            >
                                                {{ $attributeValue }}
                                            </button>

                                        @endforeach

                                    </div>

                                </div>

                            @endforeach

                        </div>

                        <input
                            type="hidden"
                            id="selectedVariationId"
                            value=""
                        >

                    @endif


                    {{-- Description --}}
                    @if ($product->description)

                        <div class="mt-6">

                            <h2 class="text-lg font-bold text-gray-900 mb-2">
                                About this product
                            </h2>

                            <div class="text-gray-600 leading-relaxed text-sm md:text-base">
                                {!! $product->description !!}
                            </div>

                        </div>

                    @endif


                    {{-- Tags --}}
                    @if (is_array($tags) && count($tags) > 0)

                        <div class="flex flex-wrap gap-2 mt-5">

                            @foreach ($tags as $tag)

                                <span class="px-3 py-1.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">
                                    #{{ $tag }}
                                </span>

                            @endforeach

                        </div>

                    @endif


                    <div class="border-t border-gray-200 my-7"></div>


                    {{-- Purchase Section --}}
                    <div id="purchaseSection">

                        {{-- Quantity --}}
                        <div class="flex items-center justify-between mb-5">

                            <span class="font-semibold text-gray-800">
                                Quantity
                            </span>

                            <div class="flex items-center border border-gray-300 rounded-xl overflow-hidden">

                                <button
                                    type="button"
                                    onclick="decreaseQuantity()"
                                    class="w-11 h-11 bg-gray-50 hover:bg-gray-100 text-lg transition"
                                >
                                    −
                                </button>

                                <input
                                    id="quantity"
                                    type="number"
                                    value="1"
                                    min="1"
                                    max="{{ $product->stock_qty }}"
                                    class="w-14 h-11 text-center font-semibold border-x border-gray-300 focus:outline-none"
                                >

                                <button
                                    type="button"
                                    onclick="increaseQuantity()"
                                    class="w-11 h-11 bg-gray-50 hover:bg-gray-100 text-lg transition"
                                >
                                    +
                                </button>

                            </div>

                        </div>


                        {{-- Buttons --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                            <button
                                id="addToCartButton"
                                type="button"
                                class="flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3.5 px-6 rounded-xl transition shadow-sm"
                            >
                                <i class="fa-solid fa-cart-plus"></i>
                                Add to Cart
                            </button>

                            <button
                                id="buyNowButton"
                                type="button"
                                class="flex items-center justify-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-bold py-3.5 px-6 rounded-xl transition shadow-sm"
                            >
                                <i class="fa-solid fa-bolt"></i>
                                Buy Now
                            </button>

                        </div>


                        {{-- Wishlist --}}
                        <form
                            action="{{ route('wishlist.store', $product->id) }}"
                            method="POST"
                            class="mt-3"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="w-full flex items-center justify-center gap-2 border-2 border-gray-200 hover:border-red-400 hover:text-red-500 text-gray-700 font-semibold py-3 rounded-xl transition"
                            >
                                <i class="fa-regular fa-heart"></i>
                                Add to Wishlist
                            </button>

                        </form>

                    </div>


                    {{-- Delivery Information --}}
                    <div class="mt-7 rounded-2xl border border-gray-200 bg-gray-50 overflow-hidden">

                        <div class="flex items-start gap-4 p-4 border-b border-gray-200">

                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-truck text-orange-500"></i>
                            </div>

                            <div>
                                <p class="font-semibold text-gray-900">
                                    Delivery
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    Delivery available across Nepal
                                </p>
                            </div>

                        </div>

                        <div class="flex items-start gap-4 p-4">

                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-shield-halved text-green-600"></i>
                            </div>

                            <div>
                                <p class="font-semibold text-gray-900">
                                    Secure Shopping
                                </p>

                                <p class="text-sm text-gray-500 mt-1">
                                    Safe and secure checkout
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =============================================================
             PRODUCT DETAILS
        ============================================================= --}}
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm mt-8 p-6 md:p-8 lg:p-10">

            <h2 class="text-2xl font-bold text-gray-900 mb-6">
                Product Details
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10">

                <div class="flex justify-between gap-4 border-b border-gray-100 py-4">
                    <span class="text-gray-500">
                        Product
                    </span>

                    <span class="font-semibold text-gray-800 text-right">
                        {{ $product->name }}
                    </span>
                </div>

                @if ($product->category)

                    <div class="flex justify-between gap-4 border-b border-gray-100 py-4">
                        <span class="text-gray-500">
                            Category
                        </span>

                        <span class="font-semibold text-gray-800 text-right">
                            {{ $product->category->name }}
                        </span>
                    </div>

                @endif

                <div class="flex justify-between gap-4 border-b border-gray-100 py-4">

                    <span class="text-gray-500">
                        Availability
                    </span>

                    <span
                        id="detailAvailability"
                        class="font-semibold {{ $product->stock_qty > 0 ? 'text-green-600' : 'text-red-600' }}"
                    >
                        {{ $product->stock_qty > 0 ? 'In Stock' : 'Out of Stock' }}
                    </span>

                </div>

                <div class="flex justify-between gap-4 border-b border-gray-100 py-4">

                    <span class="text-gray-500">
                        Rating
                    </span>

                    <span class="font-semibold text-gray-800">
                        {{ number_format($rating, 1) }} / 5
                    </span>

                </div>

            </div>

        </div>


        {{-- =============================================================
             REVIEWS
        ============================================================= --}}
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm mt-8 p-6 md:p-8 lg:p-10">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>

                    <h2 class="text-2xl font-bold text-gray-900">
                        Customer Reviews
                    </h2>

                    <div class="flex items-center gap-2 mt-2">

                        <div class="flex">

                            @for ($i = 1; $i <= 5; $i++)

                                <i
                                    class="fa-solid fa-star {{ $i <= round($product->avg_rating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                ></i>

                            @endfor

                        </div>

                        <span class="font-semibold text-gray-700">
                            {{ number_format($product->avg_rating, 1) }}
                        </span>

                        <span class="text-sm text-gray-400">
                            ({{ $product->reviews()->where('is_approved', true)->count() }} reviews)
                        </span>

                    </div>

                </div>

            </div>


            {{-- Review Form --}}
            <form
                action="{{ route('reviews.store', $product) }}"
                method="POST"
                class="mt-8 border-t border-gray-200 pt-8"
            >
                @csrf

                <h3 class="text-lg font-bold text-gray-900 mb-4">
                    Rate this product
                </h3>

                <div class="flex gap-2">

                    @for ($i = 1; $i <= 5; $i++)

                        <label class="cursor-pointer">

                            <input
                                type="radio"
                                name="rating"
                                value="{{ $i }}"
                                class="hidden peer"
                                required
                            >

                            <i class="fa-solid fa-star text-2xl text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-400 transition"></i>

                        </label>

                    @endfor

                </div>

                <textarea
                    name="comment"
                    rows="4"
                    placeholder="Write your review..."
                    class="w-full mt-5 border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 focus:outline-none resize-none"
                ></textarea>

                <button
                    type="submit"
                    class="mt-4 bg-orange-500 hover:bg-orange-600 text-white font-bold px-7 py-3 rounded-xl transition"
                >
                    Submit Review
                </button>

            </form>

        </div>

    </div>

</div>


{{-- =============================================================
     JAVASCRIPT
============================================================= --}}
<script>

    const productVariations = @json($product->variations);

    let selectedAttributes = {};


    function changeMainImage(imageUrl) {

        const mainImage = document.getElementById('mainProductImage');

        if (mainImage && imageUrl) {
            mainImage.src = imageUrl;
        }

    }


    function selectVariationOption(attributeName, attributeValue, button) {

        selectedAttributes[attributeName] = attributeValue;


        document
            .querySelectorAll(
                `.variation-option[data-attribute="${attributeName}"]`
            )
            .forEach(option => {

                option.classList.remove(
                    'border-orange-500',
                    'bg-orange-50',
                    'text-orange-600'
                );

                option.classList.add('border-gray-300');

            });


        button.classList.remove('border-gray-300');

        button.classList.add(
            'border-orange-500',
            'bg-orange-50',
            'text-orange-600'
        );


        const selectedText = document.getElementById(
            `selected-${attributeName}`
        );

        if (selectedText) {
            selectedText.textContent = attributeValue;
        }


        findMatchingVariation();

    }


    function findMatchingVariation() {

        const variation = productVariations.find(variation => {

            if (!variation.is_active) {
                return false;
            }


            let attributes = variation.attributes;


            if (typeof attributes === 'string') {

                try {
                    attributes = JSON.parse(attributes);
                } catch (error) {
                    attributes = {};
                }

            }


            return Object.entries(selectedAttributes).every(
                ([attributeName, attributeValue]) => {
                    return attributes[attributeName] == attributeValue;
                }
            );

        });


        if (!variation) {
            return;
        }


        document.getElementById('selectedVariationId').value =
            variation.id;


        updatePrice(variation);

        updateStock(variation);


        if (variation.image) {

            let imageUrl = variation.image;


            if (
                !imageUrl.startsWith('http://') &&
                !imageUrl.startsWith('https://')
            ) {

                imageUrl = imageUrl.replace(/^\/+/, '');


                if (imageUrl.startsWith('storage/')) {
                    imageUrl = imageUrl.substring(8);
                }


                imageUrl = "{{ asset('storage') }}/" + imageUrl;

            }


            changeMainImage(imageUrl);

        }

    }


    function updatePrice(variation) {

        const priceElement =
            document.getElementById('productPrice');

        const originalPriceElement =
            document.getElementById('originalProductPrice');

        const discountBadge =
            document.getElementById('discountBadge');


        const hasDiscount =
            variation.discount_price !== null &&
            Number(variation.discount_price) < Number(variation.price);


        const finalPrice =
            hasDiscount
                ? variation.discount_price
                : variation.price;


        priceElement.textContent =
            'Rs. ' + Number(finalPrice).toFixed(2);


        if (hasDiscount) {

            originalPriceElement.textContent =
                'Rs. ' + Number(variation.price).toFixed(2);

            originalPriceElement.classList.remove('hidden');


            const discount =
                (
                    (Number(variation.price) -
                        Number(variation.discount_price)) /
                    Number(variation.price)
                ) * 100;


            discountBadge.innerHTML = `
                <span class="inline-flex items-center mt-2 px-3 py-1 text-sm font-bold text-green-700 bg-green-100 rounded-full">
                    Save ${Math.round(discount)}%
                </span>
            `;

        } else {

            originalPriceElement.classList.add('hidden');

            discountBadge.innerHTML = '';

        }

    }


    function updateStock(variation) {

        const stockInformation =
            document.getElementById('stockInformation');

        const quantity =
            document.getElementById('quantity');

        const purchaseSection =
            document.getElementById('purchaseSection');

        const detailAvailability =
            document.getElementById('detailAvailability');


        if (variation.stock_qty > 0) {

            stockInformation.innerHTML = `
                <div class="flex items-center gap-2 text-green-600">
                    <i class="fa-solid fa-circle-check"></i>

                    <span class="font-semibold">
                        In Stock
                    </span>
                </div>

                <p class="text-sm text-gray-500 mt-1">
                    ${variation.stock_qty} items available
                </p>
            `;


            quantity.max = variation.stock_qty;

            purchaseSection.classList.remove('hidden');


            detailAvailability.textContent = 'In Stock';

            detailAvailability.classList.remove(
                'text-red-600'
            );

            detailAvailability.classList.add(
                'text-green-600'
            );

        } else {

            stockInformation.innerHTML = `
                <div class="flex items-center gap-2 text-red-600">
                    <i class="fa-solid fa-circle-xmark"></i>

                    <span class="font-semibold">
                        Out of Stock
                    </span>
                </div>
            `;


            purchaseSection.classList.add('hidden');


            detailAvailability.textContent = 'Out of Stock';

            detailAvailability.classList.remove(
                'text-green-600'
            );

            detailAvailability.classList.add(
                'text-red-600'
            );

        }

    }


    function increaseQuantity() {

        const quantity =
            document.getElementById('quantity');


        if (!quantity) {
            return;
        }


        const max =
            parseInt(quantity.max);

        const current =
            parseInt(quantity.value) || 1;


        if (current < max) {
            quantity.value = current + 1;
        }

    }


    function decreaseQuantity() {

        const quantity =
            document.getElementById('quantity');


        if (!quantity) {
            return;
        }


        const current =
            parseInt(quantity.value) || 1;


        if (current > 1) {
            quantity.value = current - 1;
        }

    }

</script>

@endsection

