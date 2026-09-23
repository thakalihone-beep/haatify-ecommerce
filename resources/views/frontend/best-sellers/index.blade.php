@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold">
            Best Sellers
        </h1>

        <p class="text-gray-500 mt-2">
            Discover the products customers are buying the most.
        </p>
    </div>


    {{-- Products --}}
    @if($products->count())

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

            @foreach($products as $product)

                <div class="relative">

                    {{-- Ranking --}}
                    <div class="absolute top-3 left-3 z-10
                                bg-black text-white
                                px-3 py-1 rounded-full
                                text-sm font-semibold">

                        #{{ $products->firstItem() + $loop->index }}

                    </div>

                    @include('components.product-card', [
                        'product' => $product
                    ])

                    {{-- Sold Count --}}
                    <div class="mt-2 text-sm text-gray-500">
                        {{ number_format($product->total_sold) }} sold
                    </div>

                </div>

            @endforeach

        </div>


        {{-- Pagination --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>

    @else

        <div class="text-center py-20">

            <h2 class="text-xl font-semibold">
                No best sellers yet
            </h2>

            <p class="text-gray-500 mt-2">
                Best-selling products will appear here once customers
                start placing orders.
            </p>

        </div>

    @endif

</div>

@endsection
