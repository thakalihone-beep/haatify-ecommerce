@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-10">


{{-- Page Header --}}
<div class="text-center mb-10">

    <h1 class="text-3xl md:text-4xl font-bold">
        Contact Haatify Support
    </h1>

    <p class="text-gray-500 mt-3 max-w-2xl mx-auto">
        Need help with an order, payment, delivery, return, or
        anything else? Our support team is here to help.
    </p>

</div>


{{-- Contact Information --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-12">

    {{-- Phone --}}
    <div class="border rounded-xl p-6 text-center hover:shadow-md transition">

        <div class="text-3xl mb-3">
            📞
        </div>

        <h2 class="font-semibold text-lg">
            Call Us
        </h2>

        <p class="text-gray-500 text-sm mt-2">
            +977-9800000000
        </p>

        <p class="text-gray-400 text-xs mt-1">
            Sun–Fri, 9:00 AM – 6:00 PM
        </p>

    </div>


    {{-- Email --}}
    <div class="border rounded-xl p-6 text-center hover:shadow-md transition">

        <div class="text-3xl mb-3">
            ✉️
        </div>

        <h2 class="font-semibold text-lg">
            Email Us
        </h2>

        <p class="text-gray-500 text-sm mt-2">
            support@haatify.com
        </p>

        <p class="text-gray-400 text-xs mt-1">
            We usually reply within 24 hours.
        </p>

    </div>


    {{-- Location --}}
    <div class="border rounded-xl p-6 text-center hover:shadow-md transition">

        <div class="text-3xl mb-3">
            📍
        </div>

        <h2 class="font-semibold text-lg">
            Our Office
        </h2>

        <p class="text-gray-500 text-sm mt-2">
            Kathmandu, Nepal
        </p>

        <p class="text-gray-400 text-xs mt-1">
            Visit by appointment.
        </p>

    </div>

</div>

@if (session('success'))
    <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-circle-check"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

{{-- Contact Form --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

    {{-- Form --}}
    <div class="border rounded-xl p-6 md:p-8">

        <h2 class="text-2xl font-bold">
            Send Us a Message
        </h2>

        <p class="text-gray-500 text-sm mt-2 mb-6">
            Fill out the form and our support team will get back
            to you.
        </p>


        <form action="{{ route('contact-support.store') }}" method="POST">

            @csrf

            {{-- Name --}}
            <div class="mb-4">

                <label class="block text-sm font-medium mb-2">
                    Your Name
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Enter your name"
                    class="w-full border rounded-lg px-4 py-3
                           focus:outline-none focus:ring-2
                           focus:ring-orange-500"
                >

            </div>


            {{-- Email --}}
            <div class="mb-4">

                <label class="block text-sm font-medium mb-2">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    class="w-full border rounded-lg px-4 py-3
                           focus:outline-none focus:ring-2
                           focus:ring-orange-500"
                >

            </div>


            {{-- Order ID --}}
            <div class="mb-4">

                <label class="block text-sm font-medium mb-2">
                    Order ID
                    <span class="text-gray-400">(Optional)</span>
                </label>

                <input
                    type="text"
                    name="order_id"
                    placeholder="Example: #ORD-1001"
                    class="w-full border rounded-lg px-4 py-3
                           focus:outline-none focus:ring-2
                           focus:ring-orange-500"
                >

            </div>


            {{-- Subject --}}
            <div class="mb-4">

                <label class="block text-sm font-medium mb-2">
                    Subject
                </label>

                <select
                    name="subject"
                    class="w-full border rounded-lg px-4 py-3
                           focus:outline-none focus:ring-2
                           focus:ring-orange-500"
                >

                    <option value="">
                        Select a topic
                    </option>

                    <option value="order">
                        Order
                    </option>

                    <option value="payment">
                        Payment
                    </option>

                    <option value="delivery">
                        Delivery
                    </option>

                    <option value="return">
                        Return / Refund
                    </option>

                    <option value="product">
                        Product
                    </option>

                    <option value="account">
                        Account
                    </option>

                    <option value="other">
                        Other
                    </option>

                </select>

            </div>


            {{-- Message --}}
            <div class="mb-6">

                <label class="block text-sm font-medium mb-2">
                    Message
                </label>

                <textarea
                    name="message"
                    rows="5"
                    placeholder="Describe your problem..."
                    class="w-full border rounded-lg px-4 py-3
                           focus:outline-none focus:ring-2
                           focus:ring-orange-500"
                ></textarea>

            </div>


            {{-- Submit --}}
            <button
                type="submit"
                class="w-full bg-orange-500 text-white
                       py-3 rounded-lg font-semibold
                       hover:bg-orange-600 transition"
            >
                Send Message
            </button>

        </form>

    </div>


    {{-- Help Section --}}
    <div>

        <div class="bg-gray-50 rounded-xl p-6 md:p-8 mb-6">

            <h2 class="text-2xl font-bold mb-5">
                Before contacting us
            </h2>

            <div class="space-y-4">

                <div>
                    <h3 class="font-semibold">
                        📦 Track your order
                    </h3>

                    <p class="text-gray-500 text-sm mt-1">
                        Check your Orders section to see your
                        latest order status.
                    </p>
                </div>


                <div>
                    <h3 class="font-semibold">
                        🔄 Returns & Refunds
                    </h3>

                    <p class="text-gray-500 text-sm mt-1">
                        Check our return and refund information
                        before submitting a request.
                    </p>
                </div>


                <div>
                    <h3 class="font-semibold">
                        💳 Payment problems
                    </h3>

                    <p class="text-gray-500 text-sm mt-1">
                        Include your order ID and payment method
                        when contacting support.
                    </p>
                </div>

            </div>

        </div>


        {{-- Customer Service Link --}}
        <div class="border rounded-xl p-6">

            <h2 class="text-xl font-bold">
                Looking for quick answers?
            </h2>

            <p class="text-gray-500 text-sm mt-2 mb-4">
                Visit our Customer Service page for frequently
                asked questions and common solutions.
            </p>

            <a
                href="{{ route('customer-service') }}"
                class="inline-block bg-black text-white
                       px-5 py-3 rounded-lg
                       hover:bg-gray-800 transition"
            >
                Visit Customer Service
            </a>

        </div>

    </div>

</div>


</div>

@endsection
