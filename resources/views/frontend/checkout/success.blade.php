@extends('layouts.app')

@section('title', 'Order Successful - Haatify')

@section('content')

<div class="min-h-screen bg-gray-100 py-12">

    <div class="max-w-3xl mx-auto px-4">

        <div class="bg-white rounded-xl shadow-sm
                    border border-gray-200 p-8 text-center">

            {{-- Success Icon --}}

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


            {{-- Order Number --}}

            <div class="mt-6 bg-gray-50 rounded-lg p-5">

                <p class="text-sm text-gray-500">
                    Order Number
                </p>

                <p class="text-xl font-bold text-gray-900 mt-1">

                    {{ $order->order_number }}

                </p>

            </div>


            {{-- Order Information --}}

            <div class="mt-6 text-left space-y-3">

                <div class="flex justify-between">

                    <span class="text-gray-600">
                        Order Status
                    </span>

                    <span class="font-semibold capitalize">
                        {{ $order->status }}
                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-gray-600">
                        Payment
                    </span>

                    <span class="font-semibold capitalize">

                        {{ str_replace(
                            '_',
                            ' ',
                            $order->payment->payment_method
                        ) }}

                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-gray-600">
                        Total
                    </span>

                    <span class="text-lg font-bold text-orange-600">

                        Rs.
                        {{ number_format(
                            $order->total_amount,
                            2
                        ) }}

                    </span>

                </div>

            </div>


            {{-- Shipping Address --}}

            <div class="mt-6 text-left border-t pt-6">

                <h2 class="font-bold text-gray-900 mb-3">

                    Shipping Address

                </h2>


                <p class="font-semibold">

                    {{ $order->shippingAddress->full_name }}

                </p>

                <p class="text-gray-600">

                    {{ $order->shippingAddress->phone }}

                </p>

                <p class="text-gray-600">

                    {{ $order->shippingAddress->address_line_1 }}

                </p>

                @if($order->shippingAddress->address_line_2)

                    <p class="text-gray-600">

                        {{ $order->shippingAddress->address_line_2 }}

                    </p>

                @endif

                <p class="text-gray-600">

                    {{ $order->shippingAddress->city }},
                    {{ $order->shippingAddress->state }}

                </p>

                <p class="text-gray-600">

                    {{ $order->shippingAddress->country }}

                </p>

            </div>


            {{-- Buttons --}}

            <div class="mt-8 flex flex-col sm:flex-row
                        justify-center gap-3">

                <a
                    href="{{ route('home') }}"
                    class="px-6 py-3 rounded-lg
                           bg-orange-500 text-white
                           font-semibold hover:bg-orange-600"
                >

                    Continue Shopping

                </a>

            </div>

        </div>

    </div>

</div>

@endsection

