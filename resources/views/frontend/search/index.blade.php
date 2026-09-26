@extends('layouts.app')

@section('title', 'Search Results | Haatify')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-6 flex items-center gap-2 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-orange-500">Home</a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <span class="text-gray-800">Search Results</span>
        </div>

        <div class="mb-8 rounded-xl bg-white p-6 shadow-sm">
            <p class="mb-1 text-sm font-medium uppercase tracking-wide text-orange-500">Search</p>
            <h1 class="text-3xl font-bold text-gray-900">Results for "{{ $query ?: 'all products' }}"</h1>
            <p class="mt-2 text-sm text-gray-500">
                {{ $products->count() }} {{ $products->count() === 1 ? 'product' : 'products' }} found
            </p>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        @else
            <div class="rounded-xl bg-white py-20 text-center shadow-sm">
                <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-full bg-gray-100">
                    <i class="fa-solid fa-magnifying-glass text-3xl text-gray-400"></i>
                </div>
                <h2 class="text-xl font-semibold text-gray-900">No products found</h2>
                <p class="mt-2 text-sm text-gray-500">Try a different keyword or browse our categories.</p>
                <a href="{{ route('home') }}" class="mt-6 inline-flex items-center gap-2 rounded-lg bg-orange-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-orange-600">
                    <i class="fa-solid fa-arrow-left"></i>
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
