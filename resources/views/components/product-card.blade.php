@props(['product'])

@php
    $imageUrl = $product->first_image_url ?? asset('frontend/image/amazon1.jpg');

    $hasDiscount = $product->discount_price &&
                   $product->discount_price < $product->price;

    $discountPercent = $hasDiscount
        ? round((($product->price - $product->discount_price) / $product->price) * 100)
        : 0;
@endphp

<div
    class="group relative flex h-full flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-gray-700 dark:bg-gray-900"
>

    {{-- Discount Badge --}}
    @if($hasDiscount)
        <div class="absolute left-3 top-3 z-10">
            <span class="rounded-md bg-orange-500 px-2 py-1 text-xs font-bold text-white">
                -{{ $discountPercent }}%
            </span>
        </div>
    @endif

    {{-- Wishlist --}}
    <button
        type="button"
        class="absolute right-3 top-3 z-10 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-gray-500 shadow-sm transition hover:bg-orange-500 hover:text-white dark:bg-gray-800/90"
        title="Add to wishlist"
    >j
        <i class="fa-regular fa-heart"></i>
    </button>

    {{-- Product Image --}}
    <a
        {{-- href="{{ route('products.show', $product->slug) }}" --}}
        class="relative block overflow-hidden bg-gray-50 dark:bg-gray-800"
    >
        <div class="aspect-square overflow-hidden">

            <img
                src="{{ $imageUrl }}"
                alt="{{ $product->name }}"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                loading="lazy"
            >

        </div>

        {{-- Quick View --}}
        <div
            class="absolute inset-x-0 bottom-0 translate-y-full bg-black/70 px-4 py-2 text-center text-sm font-medium text-white transition duration-300 group-hover:translate-y-0"
        >
            Quick View
        </div>
    </a>

    {{-- Product Information --}}
    <div class="flex flex-1 flex-col p-4">

        {{-- Category --}}
        @if($product->category)
            <a
                {{-- href="{{ route('categories.show', $product->category->slug) }}" --}}
                class="mb-1 text-xs font-medium uppercase tracking-wide text-gray-500 hover:text-orange-500 dark:text-gray-400"
            >
                {{ $product->category->name }}
            </a>
        @endif

        {{-- Product Name --}}
        <a
            {{-- href="{{ route('products.show', $product->slug) }}" --}}
            class="line-clamp-2 min-h-[3rem] text-sm font-semibold leading-6 text-gray-900 transition hover:text-orange-500 dark:text-white"
        >
            {{ $product->name }}
        </a>

        {{-- Rating --}}
        <div class="mt-2 flex items-center gap-2">

            <div class="flex items-center text-sm text-yellow-400">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor($product->avg_rating))
                        <i class="fa-solid fa-star"></i>
                    @elseif($i - $product->avg_rating < 1)
                        <i class="fa-solid fa-star-half-stroke"></i>
                    @else
                        <i class="fa-regular fa-star text-gray-300"></i>
                    @endif
                @endfor
            </div>

            <span class="text-xs text-gray-500 dark:text-gray-400">
                {{ number_format($product->avg_rating ?? 0, 1) }}
            </span>
        </div>

        {{-- Price --}}
        <div class="mt-3 flex items-center gap-2">

            @if($hasDiscount)
                <span class="text-lg font-bold text-orange-600">
                    NPR {{ number_format($product->discount_price, 2) }}
                </span>

                <span class="text-sm text-gray-400 line-through">
                    NPR {{ number_format($product->price, 2) }}
                </span>
            @else
                <span class="text-lg font-bold text-gray-900 dark:text-white">
                    NPR {{ number_format($product->price, 2) }}
                </span>
            @endif

        </div>

        {{-- Stock --}}
        <div class="mt-2">

            @if($product->stock_qty > 0)

                @if($product->stock_qty <= 5)
                    <span class="text-xs font-medium text-orange-600">
                        Only {{ $product->stock_qty }} left
                    </span>
                @else
                    <span class="text-xs font-medium text-green-600">
                        In stock
                    </span>
                @endif

            @else
                <span class="text-xs font-medium text-red-500">
                    Out of stock
                </span>
            @endif

        </div>

        {{-- Add to Cart --}}
        <div class="mt-auto pt-4">

            @if($product->stock_qty > 0)

                <button
                    type="button"
                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-orange-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-orange-600 active:scale-[0.98]"
                >
                    <i class="fa-solid fa-cart-plus"></i>
                    Add to Cart
                </button>

            @else

                <button
                    type="button"
                    disabled
                    class="flex w-full cursor-not-allowed items-center justify-center gap-2 rounded-lg bg-gray-200 px-4 py-2.5 text-sm font-semibold text-gray-500 dark:bg-gray-700 dark:text-gray-400"
                >
                    <i class="fa-solid fa-ban"></i>
                    Out of Stock
                </button>

            @endif

        </div>

    </div>

</div>
