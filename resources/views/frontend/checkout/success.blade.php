@extends('layouts.app')

@section('title', 'Order Successful - Haatify')

@section('content')

    <div class="min-h-screen bg-gray-100 py-12">

        <div class="max-w-3xl mx-auto px-4">

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">

                {{-- Success Icon --}}
                <div class="text-center">

                    <div class="text-6xl text-green-500 mb-5">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                    {{-- Title --}}
                    <h1 class="text-3xl font-bold text-gray-900">
                        Order Placed Successfully!
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Thank you for shopping with Haatify.
                    </p>

                </div>


                {{-- Order Number --}}
                <div class="mt-6 bg-gray-50 rounded-lg p-5 text-center">

                    <p class="text-sm text-gray-500">
                        Order Number
                    </p>

                    <p class="text-xl font-bold text-gray-900 mt-1">
                        {{ $order->order_number }}
                    </p>

                </div>


                {{-- Order Information --}}
                <div class="mt-6 border rounded-lg p-5">

                    <h2 class="font-bold text-gray-900 mb-4">
                        Order Information
                    </h2>

                    <div class="space-y-4">

                        {{-- Order Status --}}
                        <div class="flex justify-between items-center">

                            <span class="text-gray-600">
                                Order Status
                            </span>

                            <span class="font-semibold capitalize text-orange-600">
                                {{ $order->status }}
                            </span>

                        </div>


                        {{-- Payment Method --}}
                        <div class="flex justify-between items-center">

                            <span class="text-gray-600">
                                Payment
                            </span>

                            <span class="font-semibold capitalize">

                                @if ($order->payment)
                                    {{ str_replace('_', ' ', $order->payment->payment_method) }}
                                @else
                                    Not Available
                                @endif

                            </span>

                        </div>


                        {{-- Payment Status --}}
                        <div class="flex justify-between items-center">

                            <span class="text-gray-600">
                                Payment Status
                            </span>

                            <span class="font-semibold capitalize">

                                {{ $order->payment_status }}

                            </span>

                        </div>


                        {{-- Total --}}
                        <div class="flex justify-between items-center border-t pt-4">

                            <span class="text-gray-600">
                                Total
                            </span>

                            <span class="text-xl font-bold text-orange-600">

                                Rs.
                                {{ number_format($order->total_amount, 2) }}

                            </span>

                        </div>

                    </div>

                </div>


                {{-- Shipping Address --}}
                <div class="mt-6 border rounded-lg p-5">

                    <h2 class="font-bold text-gray-900 mb-4">

                        <i class="fa-solid fa-location-dot text-orange-500 mr-2"></i>

                        Shipping Address

                    </h2>


                    @if ($order->shippingAddress)

                        <div class="space-y-1">

                            {{-- Name --}}
                            <p class="font-semibold text-gray-900">

                                {{ $order->shippingAddress->full_name }}

                            </p>


                            {{-- Phone --}}
                            <p class="text-gray-600">

                                <i class="fa-solid fa-phone mr-2"></i>

                                {{ $order->shippingAddress->phone }}

                            </p>


                            {{-- Address Line 1 --}}
                            <p class="text-gray-600">

                                {{ $order->shippingAddress->address_line_1 }}

                            </p>


                            {{-- Address Line 2 --}}
                            @if ($order->shippingAddress->address_line_2)
                                <p class="text-gray-600">

                                    {{ $order->shippingAddress->address_line_2 }}

                                </p>
                            @endif


                            {{-- City and State --}}
                            <p class="text-gray-600">

                                {{ $order->shippingAddress->city }}

                                @if ($order->shippingAddress->state)
                                    , {{ $order->shippingAddress->state }}
                                @endif

                            </p>


                            {{-- Postal Code --}}
                            @if ($order->shippingAddress->postal_code)
                                <p class="text-gray-600">

                                    {{ $order->shippingAddress->postal_code }}

                                </p>
                            @endif


                            {{-- Country --}}
                            <p class="text-gray-600">

                                {{ $order->shippingAddress->country }}

                            </p>

                        </div>
                    @else
                        <p class="text-gray-500">
                            Shipping address is not available.
                        </p>

                    @endif

                </div>


                {{-- Order Items --}}
                <div class="mt-6 border rounded-lg p-5">

                    <h2 class="font-bold text-gray-900 mb-4">

                        <i class="fa-solid fa-box text-orange-500 mr-2"></i>

                        Order Items

                    </h2>


                    <div class="space-y-4">

                        @foreach ($order->items as $item)
                            <div class="flex justify-between items-start border-b pb-4 last:border-b-0 last:pb-0">

                                <div>

                                    <p class="font-semibold text-gray-900">

                                        {{ $item->product_name }}

                                    </p>


                                    @if ($item->variation_name)
                                        <p class="text-sm text-gray-500">

                                            {{ is_array($item->variation_name) ? implode(', ', $item->variation_name) : $item->variation_name }}

                                        </p>
                                    @endif


                                    <p class="text-sm text-gray-500">

                                        Quantity:
                                        {{ $item->quantity }}

                                    </p>

                                </div>


                                <div class="text-right">

                                    <p class="font-semibold text-gray-900">

                                        Rs.
                                        {{ number_format($item->total_price, 2) }}

                                    </p>

                                    <p class="text-sm text-gray-500">

                                        Rs.
                                        {{ number_format($item->unit_price, 2) }}
                                        each

                                    </p>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>


                {{-- Buttons --}}
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-3">

                    {{-- Continue Shopping --}}
                    <a href="{{ route('home') }}"
                        class="px-6 py-3 rounded-lg
                           bg-orange-500 text-white
                           font-semibold text-center
                           hover:bg-orange-600 transition">

                        <i class="fa-solid fa-cart-shopping mr-2"></i>

                        Continue Shopping

                    </a>


                    {{-- View Orders --}}
                    @if (Route::has('orders.index'))
                        <a href="{{ route('orders.index') }}"
                            class="px-6 py-3 rounded-lg
                               border border-gray-300
                               text-gray-700
                               font-semibold text-center
                               hover:bg-gray-100 transition">

                            <i class="fa-solid fa-box mr-2"></i>

                            My Orders

                        </a>
                    @endif

                </div>


                {{-- Thank You Message --}}
                <div class="mt-8 text-center text-sm text-gray-500">

                    <p>
                        Your order has been received and is currently
                        <span class="font-semibold text-gray-700">
                            {{ $order->status }}
                        </span>.
                    </p>

                    <p class="mt-1">
                        We will process your order and deliver it to the
                        shipping address above.
                    </p>

                </div>

            </div>

        </div>

    </div>

@endsection
