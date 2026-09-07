@extends('layouts.guest')
@section('title', 'signup|Haatify')
@section('content')
<body class="min-h-screen bg-gray-100">

<div class="min-h-screen flex items-center justify-center px-6 py-12">

    <div class="w-full max-w-5xl bg-white rounded-2xl
                shadow-xl overflow-hidden flex">

        <!-- LEFT -->
        <div class="hidden md:flex md:w-5/12
                    bg-gray-950 text-white
                    p-10 flex-col justify-between">

            <div>

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-orange-400
                                flex items-center justify-center">

                        <i class="fa-solid fa-bag-shopping
                                  text-gray-950"></i>

                    </div>

                    <span class="text-2xl font-bold">
                        Haatify<span class="text-orange-400">Bazar</span>
                    </span>

                </div>


                <h1 class="text-4xl font-bold mt-16 leading-tight">
                    Join the
                    <span class="text-orange-400">
                        Haatify
                    </span>
                    community.
                </h1>

                <p class="text-gray-400 mt-5 leading-relaxed">
                    Create your account and start discovering
                    products from trusted sellers.
                </p>

            </div>


            <div class="space-y-4 text-sm text-gray-400">

                <p>
                    <i class="fa-solid fa-circle-check
                              text-orange-400 mr-2"></i>
                    Personalized shopping experience
                </p>

                <p>
                    <i class="fa-solid fa-circle-check
                              text-orange-400 mr-2"></i>
                    Track your orders easily
                </p>

                <p>
                    <i class="fa-solid fa-circle-check
                              text-orange-400 mr-2"></i>
                    Save your favorite products
                </p>

            </div>

        </div>


        <!-- RIGHT -->
        <div class="w-full md:w-7/12 p-8 md:p-12">

            <div class="max-w-md mx-auto">

                <h2 class="text-3xl font-bold text-gray-900">
                    Create your account
                </h2>

                <p class="text-gray-500 mt-2 mb-8">
                    It only takes a minute to get started.
                </p>


                <form method="POST" action="#" class="space-y-5">

                    @csrf

                    <!-- Name -->
                    <div>

                        <label class="block text-sm font-semibold
                                      text-gray-700 mb-2">
                            Full name
                        </label>

                        <div class="relative">

                            <i class="fa-regular fa-user
                                      absolute left-4 top-1/2
                                      -translate-y-1/2 text-gray-400">
                            </i>

                            <input
                                type="text"
                                name="name"
                                placeholder="Your full name"
                                required
                                class="w-full h-12 pl-11 pr-4
                                       border border-gray-300
                                       rounded-lg
                                       focus:ring-2
                                       focus:ring-orange-400
                                       focus:outline-none
                                       transition">
                        </div>

                    </div>


                    <!-- Email -->
                    <div>

                        <label class="block text-sm font-semibold
                                      text-gray-700 mb-2">
                            Email address
                        </label>

                        <div class="relative">

                            <i class="fa-regular fa-envelope
                                      absolute left-4 top-1/2
                                      -translate-y-1/2 text-gray-400">
                            </i>

                            <input
                                type="email"
                                name="email"
                                placeholder="you@example.com"
                                required
                                class="w-full h-12 pl-11 pr-4
                                       border border-gray-300
                                       rounded-lg
                                       focus:ring-2
                                       focus:ring-orange-400
                                       focus:outline-none
                                       transition">
                        </div>

                    </div>


                    <!-- Password -->
                    <div>

                        <label class="block text-sm font-semibold
                                      text-gray-700 mb-2">
                            Password
                        </label>

                        <div class="relative">

                            <i class="fa-solid fa-lock
                                      absolute left-4 top-1/2
                                      -translate-y-1/2 text-gray-400">
                            </i>

                            <input
                                type="password"
                                name="password"
                                placeholder="Create a password"
                                required
                                class="w-full h-12 pl-11 pr-4
                                       border border-gray-300
                                       rounded-lg
                                       focus:ring-2
                                       focus:ring-orange-400
                                       focus:outline-none
                                       transition">
                        </div>

                    </div>


                    <!-- Confirm -->
                    <div>

                        <label class="block text-sm font-semibold
                                      text-gray-700 mb-2">
                            Confirm password
                        </label>

                        <div class="relative">

                            <i class="fa-solid fa-lock
                                      absolute left-4 top-1/2
                                      -translate-y-1/2 text-gray-400">
                            </i>

                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="Confirm your password"
                                required
                                class="w-full h-12 pl-11 pr-4
                                       border border-gray-300
                                       rounded-lg
                                       focus:ring-2
                                       focus:ring-orange-400
                                       focus:outline-none
                                       transition">
                        </div>

                    </div>


                    <!-- Terms -->
                    <div class="flex gap-2 items-start">

                        <input
                            type="checkbox"
                            required
                            class="mt-1 accent-orange-500">

                        <p class="text-xs text-gray-500 leading-relaxed">
                            I agree to Haatify's
                            <a href="#" class="text-orange-500 hover:underline">
                                Terms of Service
                            </a>
                            and
                            <a href="#" class="text-orange-500 hover:underline">
                                Privacy Policy
                            </a>.
                        </p>

                    </div>


                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full h-12
                               bg-orange-400 hover:bg-orange-500
                               text-gray-950
                               font-bold rounded-lg
                               transition">

                        Create Account

                    </button>

                </form>


                <p class="text-center text-sm text-gray-500 mt-7">

                    Already have an account?

                    <a href="{{ route('login') }}"
                       class="text-orange-500 font-semibold
                              hover:underline">

                        Sign in

                    </a>

                </p>


                <div class="border-t border-gray-200 mt-7 pt-6">

                    <p class="text-center text-sm text-gray-500">

                        Want to sell products?

                        <a href="{{ route('vendor.register') }}"
                           class="font-semibold text-gray-900
                                  hover:text-orange-500">

                            Register as a vendor

                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
@endsection

