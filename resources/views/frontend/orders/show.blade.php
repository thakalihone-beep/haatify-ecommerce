@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-6xl mx-auto px-4">


        <!-- Back -->
        <a
            href="{{ route('orders.index') }}"
            class="inline-flex items-center gap-2
                   text-sm text-gray-600
                   hover:text-orange-500
                   mb-6">

            <i class="fa-solid fa-arrow-left"></i>

            Back to My Orders

        </a>


        <!-- Header -->
        <div
            class="bg-white rounded-xl
                   border border-gray-200
                   shadow-sm
                   p-6 mb-6">

            <div
                class="flex flex-col md:flex-row
                       md:items-center
                       md:justify-between
                       gap-4">

                <div>

                    <p class="text-sm text-gray-500">
                        Order Number
                    </p>

                    <h1 class="text-2xl font-bold text-gray-900">
                        {{ $order->order_number }}
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Placed on {{ $order->created_at->format('M d, Y h:i A') }}
                    </p>

                </div>


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
                    class="inline-flex px-4 py-2
                           rounded-full
                           text-sm font-semibold
                           {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700' }}">

                    {{ ucfirst($order->status) }}

                </span>

            </div>

        </div>


        <div class="grid lg:grid-cols-3 gap-6">


            <!-- ==================== ORDER ITEMS ==================== -->
            <div class="lg:col-span-2">

                <div
                    class="bg-white rounded-xl
                           border border-gray-200
                           shadow-sm">

                    <div
                        class="px-6 py-4
                               border-b border-gray-200">

                        <h2 class="font-bold text-lg">
                            Order Items
                        </h2>

                    </div>


                    <div class="divide-y divide-gray-100">

                        @foreach ($order->items as $item)

                            <div class="p-6 flex gap-4">

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
                                            class="w-24 h-24
                                                   rounded-lg
                                                   object-cover
                                                   border">

                                    @else

                                        <div
                                            class="w-24 h-24
                                                   rounded-lg
                                                   bg-gray-100
                                                   flex items-center justify-center">

                                            <i class="fa-solid fa-image text-gray-400"></i>

                                        </div>

                                    @endif


                                    <div class="flex-1">

                                        <h3 class="font-semibold text-gray-900">
                                            {{ $item->product->name }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1">
                                            Quantity: {{ $item->quantity }}
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            Price:
                                            NPR {{ number_format($item->price, 2) }}
                                        </p>

                                    </div>


                                    <div class="font-bold text-gray-900">

                                        NPR
                                        {{ number_format($item->price * $item->quantity, 2) }}

                                    </div>

                                @endif

                            </div>

                        @endforeach

                    </div>

                </div>


                <!-- Shipping Address -->
                @if ($order->shippingAddress)

                    <div
                        class="bg-white rounded-xl
                               border border-gray-200
                               shadow-sm
                               p-6 mt-6">

                        <h2 class="font-bold text-lg mb-4">
                            Shipping Address
                        </h2>

                        <div class="text-sm text-gray-600 space-y-1">

                            <p class="font-semibold text-gray-900">
                                {{ $order->shippingAddress->name ?? '' }}
                            </p>

                            <p>
                                {{ $order->shippingAddress->address ?? '' }}
                            </p>

                            <p>
                                {{ $order->shippingAddress->city ?? '' }}
                            </p>

                            <p>
                                Phone:
                                {{ $order->shippingAddress->phone ?? '' }}
                            </p>

                        </div>

                    </div>

                @endif

            </div>


            <!-- ==================== ORDER SUMMARY ==================== -->
            <div>

                <div
                    class="bg-white rounded-xl
                           border border-gray-200
                           shadow-sm
                           p-6
                           sticky top-6">

                    <h2 class="font-bold text-lg mb-5">
                        Order Summary
                    </h2>


                    <div class="space-y-3 text-sm">

                        <div class="flex justify-between">

                            <span class="text-gray-500">
                                Subtotal
                            </span>

                            <span>
                                NPR {{ number_format($order->subtotal, 2) }}
                            </span>

                        </div>


                        <div class="flex justify-between">

                            <span class="text-gray-500">
                                Shipping
                            </span>

                            <span>
                                NPR {{ number_format($order->shipping_fee, 2) }}
                            </span>

                        </div>


                        <div class="flex justify-between">

                            <span class="text-gray-500">
                                Discount
                            </span>

                            <span class="text-green-600">
                                - NPR {{ number_format($order->discount_amount, 2) }}
                            </span>

                        </div>


                        <div class="flex justify-between">

                            <span class="text-gray-500">
                                Tax
                            </span>

                            <span>
                                NPR {{ number_format($order->tax_amount, 2) }}
                            </span>

                        </div>


                        <div
                            class="border-t border-gray-200
                                   pt-4 mt-4
                                   flex justify-between">

                            <span class="font-bold text-gray-900">
                                Total
                            </span>

                            <span class="font-bold text-lg text-orange-600">
                                NPR {{ number_format($order->total_amount, 2) }}
                            </span>

                        </div>

                    </div>


                    <!-- Payment -->
                    <div
                        class="mt-6 pt-5
                               border-t border-gray-200">

                        <p class="text-xs text-gray-500 uppercase">
                            Payment Status
                        </p>

                        <p class="font-semibold mt-1">
                            {{ ucfirst($order->payment_status) }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection