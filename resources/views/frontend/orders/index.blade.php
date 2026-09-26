@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-6xl mx-auto px-4">

        <!-- Page Header -->
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                My Orders
            </h1>

            <p class="text-gray-500 mt-1">
                View and manage your Haatify orders
            </p>

        </div>


        @if ($orders->count())

            <div class="space-y-5">

                @foreach ($orders as $order)

                    <div
                        class="bg-white rounded-xl border border-gray-200
                               shadow-sm overflow-hidden
                               hover:shadow-md transition">


                        <!-- Order Header -->
                        <div
                            class="px-6 py-4
                                   bg-gray-50
                                   border-b border-gray-200">

                            <div
                                class="flex flex-col md:flex-row
                                       md:items-center
                                       md:justify-between
                                       gap-4">


                                <!-- Order Number -->
                                <div>

                                    <p class="text-xs text-gray-500 uppercase">
                                        Order
                                    </p>

                                    <p class="font-bold text-gray-900">
                                        {{ $order->order_number }}
                                    </p>

                                </div>


                                <!-- Date -->
                                <div>

                                    <p class="text-xs text-gray-500 uppercase">
                                        Ordered
                                    </p>

                                    <p class="text-sm text-gray-700">
                                        {{ $order->created_at->format('M d, Y') }}
                                    </p>

                                </div>


                                <!-- Status -->
                                <div>

                                    <p class="text-xs text-gray-500 uppercase mb-1">
                                        Status
                                    </p>

                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-yellow-100 text-yellow-700',
                                            'confirmed' => 'bg-blue-100 text-blue-700',
                                            'processing' => 'bg-indigo-100 text-indigo-700',
                                            'shipped' => 'bg-purple-100 text-purple-700',
                                            'delivered' => 'bg-green-100 text-green-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                            'returned' => 'bg-orange-100 text-orange-700',
                                        ];
                                    @endphp

                                    <span
                                        class="inline-flex px-3 py-1
                                               rounded-full text-xs font-semibold
                                               {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700' }}">

                                        {{ ucfirst($order->status) }}

                                    </span>

                                </div>


                                <!-- Total -->
                                <div>

                                    <p class="text-xs text-gray-500 uppercase">
                                        Total
                                    </p>

                                    <p class="font-bold text-gray-900">
                                        NPR {{ number_format($order->total_amount, 2) }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- Order Body -->
                        <div class="p-6">

                            <div class="flex items-center justify-between mb-5">

                                <div>

                                    <p class="text-sm font-semibold text-gray-900">
                                        {{ $order->items->count() }}
                                        {{ $order->items->count() == 1 ? 'item' : 'items' }}
                                    </p>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Payment:
                                        {{ ucfirst($order->payment_status) }}
                                    </p>

                                </div>


                                <a
                                    href="{{ route('orders.show', $order) }}"
                                    class="inline-flex items-center gap-2
                                           px-4 py-2
                                           bg-[#00013a]
                                           text-white
                                           text-sm font-semibold
                                           rounded-lg
                                           hover:bg-orange-500
                                           transition">

                                    View Order

                                    <i class="fa-solid fa-arrow-right text-xs"></i>

                                </a>

                            </div>


                            <!-- Products -->
                            <div class="space-y-3">

                                @foreach ($order->items->take(3) as $item)

                                    <div
                                        class="flex items-center gap-4
                                               py-3
                                               border-t border-gray-100">

                                        @if ($item->product)

                                            @php
                                                $images = is_array($item->product->images)
                                                    ? $item->product->images
                                                    : json_decode($item->product->images ?? '[]', true);

                                                $image = $images[0] ?? null;
                                            @endphp


                                            @if ($image)

                                                <img
                                                    src="{{ asset('storage/' . $image) }}"
                                                    alt="{{ $item->product->name }}"
                                                    class="w-16 h-16
                                                           rounded-lg
                                                           object-cover
                                                           border">

                                            @else

                                                <div
                                                    class="w-16 h-16
                                                           rounded-lg
                                                           bg-gray-100
                                                           flex items-center justify-center">

                                                    <i class="fa-solid fa-image text-gray-400"></i>

                                                </div>

                                            @endif


                                            <div class="flex-1 min-w-0">

                                                <p class="font-medium text-gray-900 truncate">

                                                    {{ $item->product->name }}

                                                </p>

                                                <p class="text-sm text-gray-500">

                                                    Qty:
                                                    {{ $item->quantity }}

                                                </p>

                                            </div>

                                        @endif

                                    </div>

                                @endforeach


                                @if ($order->items->count() > 3)

                                    <p class="text-sm text-gray-500 pt-2">

                                        + {{ $order->items->count() - 3 }}
                                        more item(s)

                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            <!-- Pagination -->
            <div class="mt-8">

                {{ $orders->links() }}

            </div>


        @else

            <!-- Empty Orders -->
            <div
                class="bg-white rounded-2xl
                       border border-gray-200
                       shadow-sm
                       py-20
                       text-center">

                <div
                    class="w-20 h-20 mx-auto
                           rounded-full
                           bg-orange-100
                           text-orange-500
                           flex items-center justify-center">

                    <i class="fa-solid fa-box-open text-3xl"></i>

                </div>

                <h2 class="text-xl font-bold text-gray-900 mt-5">
                    No orders yet
                </h2>

                <p class="text-gray-500 mt-2">
                    You haven't placed any orders on Haatify.
                </p>

                <a
                    href="/"
                    class="inline-flex items-center gap-2
                           mt-6 px-5 py-3
                           bg-orange-500
                           text-white
                           font-semibold
                           rounded-lg
                           hover:bg-orange-600
                           transition">

                    Start Shopping

                    <i class="fa-solid fa-arrow-right text-sm"></i>

                </a>

            </div>

        @endif

    </div>

</div>

@endsection