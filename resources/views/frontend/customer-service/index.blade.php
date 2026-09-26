@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- Header --}}
    <div class="text-center mb-10">

        <h1 class="text-3xl font-bold">
            How can we help?
        </h1>

        <p class="text-gray-500 mt-2">
            Find answers to your questions or contact Haatify support.
        </p>

        {{-- Search --}}
        <div class="max-w-xl mx-auto mt-6">

            <input
                type="text"
                placeholder="Search for help..."
                class="w-full border rounded-lg px-4 py-3
                       focus:outline-none focus:ring-2
                       focus:ring-orange-500"
            >

        </div>

    </div>


    {{-- Help Categories --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

        <a href="#orders"
           class="border rounded-xl p-6 hover:shadow-md transition">

            <div class="text-3xl mb-3">
                📦
            </div>

            <h2 class="text-lg font-semibold">
                Orders
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Track, cancel, or get help with your order.
            </p>

        </a>


        <a href="#delivery"
           class="border rounded-xl p-6 hover:shadow-md transition">

            <div class="text-3xl mb-3">
                🚚
            </div>

            <h2 class="text-lg font-semibold">
                Delivery
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Learn about shipping and delivery.
            </p>

        </a>


        <a href="#payments"
           class="border rounded-xl p-6 hover:shadow-md transition">

            <div class="text-3xl mb-3">
                💳
            </div>

            <h2 class="text-lg font-semibold">
                Payments
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Get help with payments and payment methods.
            </p>

        </a>


        <a href="#returns"
           class="border rounded-xl p-6 hover:shadow-md transition">

            <div class="text-3xl mb-3">
                🔄
            </div>

            <h2 class="text-lg font-semibold">
                Returns & Refunds
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Learn about returns, refunds, and exchanges.
            </p>

        </a>


        <a href="#account"
           class="border rounded-xl p-6 hover:shadow-md transition">

            <div class="text-3xl mb-3">
                👤
            </div>

            <h2 class="text-lg font-semibold">
                Account
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Get help with your Haatify account.
            </p>

        </a>


        <a href="#products"
           class="border rounded-xl p-6 hover:shadow-md transition">

            <div class="text-3xl mb-3">
                🛍️
            </div>

            <h2 class="text-lg font-semibold">
                Products
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Questions about products and availability.
            </p>

        </a>

    </div>


    {{-- FAQ --}}
    <div class="mt-16">

        <h2 class="text-2xl font-bold mb-6">
            Frequently Asked Questions
        </h2>


        <div class="space-y-4">

            <details class="border rounded-lg p-4">

                <summary class="font-semibold cursor-pointer">
                    How can I track my order?
                </summary>

                <p class="text-gray-500 mt-3">
                    You can track your order from your Haatify
                    account under the Orders section.
                </p>

            </details>


            <details class="border rounded-lg p-4">

                <summary class="font-semibold cursor-pointer">
                    How can I cancel my order?
                </summary>

                <p class="text-gray-500 mt-3">
                    Open your order details and check whether
                    cancellation is available.
                </p>

            </details>


            <details class="border rounded-lg p-4">

                <summary class="font-semibold cursor-pointer">
                    How do I request a refund?
                </summary>

                <p class="text-gray-500 mt-3">
                    Contact Haatify support with your order
                    information to request assistance.
                </p>

            </details>


            <details class="border rounded-lg p-4">

                <summary class="font-semibold cursor-pointer">
                    What payment methods are supported?
                </summary>

                <p class="text-gray-500 mt-3">
                    Haatify supports the payment methods
                    available during checkout.
                </p>

            </details>

        </div>

    </div>


    {{-- Contact Support --}}
    <div class="mt-16 bg-gray-100 rounded-xl p-8 text-center">

        <h2 class="text-2xl font-bold">
            Still need help?
        </h2>

        <p class="text-gray-500 mt-2">
            Our support team is here to help.
        </p>

        <a href="{{ route('contact-support') }}"
           class="inline-block mt-5 bg-orange-500
                  text-white px-6 py-3 rounded-lg
                  hover:bg-orange-600">
            Contact Haatify Support
        </a>

    </div>

</div>

@endsection
