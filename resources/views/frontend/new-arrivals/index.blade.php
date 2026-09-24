@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold">
            New Arrivals
        </h1>

        <p class="text-gray-500 mt-2">
            Discover the latest products added to Haatify.
        </p>
    </div>


    {{-- Products --}}
    @if($products->count())

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

            @foreach($products as $product)

                <div class="relative">

                    {{-- NEW Badge --}}
                    <div class="absolute top-3 left-3 z-10
                                bg-orange-500 text-white
                                px-3 py-1 rounded-full
                                text-xs font-semibold">

                        NEW

                    </div>

                    {{-- Product Card --}}
                    @include('components.product-card', [
                        'product' => $product
                    ])

                </div>

            @endforeach

        </div>


        {{-- Pagination --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>

    @else

        {{-- Empty State --}}
        <div class="text-center py-20">

            <h2 class="text-xl font-semibold">
                No new products yet
            </h2>

            <p class="text-gray-500 mt-2">
                Check back later for new arrivals.
            </p>

        </div>

    @endif

</div>

@endsection
