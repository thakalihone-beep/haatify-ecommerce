@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    <div class="mb-8">
        <h1 class="text-3xl font-bold">
            Today's Deals
        </h1>

        <p class="text-gray-500 mt-2">
            Great deals available for a limited time.
        </p>
    </div>

    @if($products->count())

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

            @foreach($products as $product)

                @include('components.product-card', [
                    'product' => $product
                ])

            @endforeach

        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>

    @else

        <div class="text-center py-20">
            <h2 class="text-xl font-semibold">
                No deals available today
            </h2>

            <p class="text-gray-500 mt-2">
                Check back later for new deals.
            </p>
        </div>

    @endif

</div>

@endsection
