@extends('layouts.app')

@section('title', $category->name . ' | Haatify')

@section('content')

<div class="min-h-screen bg-gray-50 py-8">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- =========================
             BREADCRUMB
        ========================== --}}
        <div class="mb-6 flex items-center gap-2 text-sm text-gray-500">

            <a
                href="{{ route('home') }}"
                class="hover:text-orange-500"
            >
                Home
            </a>

            <i class="fa-solid fa-chevron-right text-xs"></i>

            <a
                href="{{ route('categories.index') }}"
                class="hover:text-orange-500"
            >
                Categories
            </a>

            <i class="fa-solid fa-chevron-right text-xs"></i>

            <span class="text-gray-800 dark:text-gray-300">
                {{ $category->name }}
            </span>

        </div>


        {{-- =========================
             CATEGORY HEADER
        ========================== --}}
        <div class="mb-8 rounded-xl bg-white p-6 shadow-sm
                    dark:bg-gray-900">

            <div class="flex flex-col gap-4 sm:flex-row
                        sm:items-center sm:justify-between">

                <div>

                    <p class="mb-1 text-sm font-medium uppercase
                              tracking-wide text-orange-500">
                        Category
                    </p>

                    <h1 class="text-3xl font-bold text-gray-900
                               dark:text-white">
                        {{ $category->name }}
                    </h1>

                    <p class="mt-2 text-sm text-gray-500
                              dark:text-gray-400">

                        {{ $products->count() }}
                        {{ $products->count() == 1 ? 'product' : 'products' }}

                    </p>

                </div>

            </div>

        </div>


        {{-- =========================
             PRODUCTS
        ========================== --}}
        @if($products->count() > 0)

            <div class="grid grid-cols-2 gap-4
                        sm:grid-cols-3
                        lg:grid-cols-4
                        xl:grid-cols-5">

                @foreach($products as $product)

                    <x-product-card :product="$product" />

                @endforeach

            </div>

        @else

            {{-- =========================
                 NO PRODUCTS
            ========================== --}}
            <div class="rounded-xl bg-white py-20 text-center
                        shadow-sm dark:bg-gray-900">

                <div class="mx-auto mb-5 flex h-20 w-20
                            items-center justify-center rounded-full
                            bg-gray-100 dark:bg-gray-800">

                    <i class="fa-solid fa-box-open text-3xl
                              text-gray-400"></i>

                </div>

                <h2 class="text-xl font-semibold text-gray-900
                           dark:text-white">

                    No products found

                </h2>

                <p class="mt-2 text-sm text-gray-500
                          dark:text-gray-400">

                    There are currently no products in
                    {{ $category->name }}.

                </p>

                <a
                    href="{{ route('home') }}"
                    class="mt-6 inline-flex items-center gap-2
                           rounded-lg bg-orange-500 px-5 py-2.5
                           text-sm font-semibold text-white
                           transition hover:bg-orange-600"
                >

                    <i class="fa-solid fa-arrow-left"></i>

                    Continue Shopping

                </a>

            </div>

        @endif

    </div>

</div>

@endsection
