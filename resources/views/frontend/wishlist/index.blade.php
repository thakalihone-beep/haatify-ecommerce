@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-8">

    <h1 class="text-2xl font-bold mb-6">
        My Wishlist
    </h1>

    @if($wishlists->count())

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            @foreach($wishlists as $wishlist)

                <div class="border rounded-lg p-4">

                    <h2 class="font-bold">
                        {{ $wishlist->product->name }}
                    </h2>

                    <p class="text-gray-600">
                        Rs. {{ $wishlist->product->price }}
                    </p>

                    <form
                        action="{{ route('wishlist.destroy', $wishlist->product_id) }}"
                        method="POST"
                        class="mt-3"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded"
                        >
                            Remove
                        </button>
                    </form>

                </div>

            @endforeach

        </div>

    @else

        <p>Your wishlist is empty.</p>

    @endif

</div>

@endsection
