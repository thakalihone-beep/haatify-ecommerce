@extends('layouts.guest')
@section('title', 'Login - Haatify')
@section('content')
<body class="min-h-screen bg-gray-100">

<div class="min-h-screen flex">

    <!-- LEFT SIDE -->
    <div class="hidden lg:flex lg:w-1/2 bg-gray-950 text-white
                relative overflow-hidden items-center justify-center">

        <div class="absolute inset-0 bg-gradient-to-br
                    from-gray-950 via-gray-900 to-orange-950/40"></div>

        <div class="relative z-10 max-w-lg px-12">

            <div class="flex items-center gap-3 mb-10">
                <div class="w-11 h-11 rounded-xl bg-orange-400
                            flex items-center justify-center">
                    <i class="fa-solid fa-bag-shopping text-gray-950"></i>
                </div>

                <span class="text-2xl font-bold">
                    Haatify<span class="text-orange-400">Bazar</span>
                </span>
            </div>

            <h1 class="text-5xl font-bold leading-tight">
                Everything you need,
                <span class="text-orange-400">
                    all in one place.
                </span>
            </h1>

            <p class="mt-6 text-gray-400 text-lg leading-relaxed">
                Discover products from trusted sellers and enjoy a
                simple, secure shopping experience.
            </p>

            <div class="mt-10 flex gap-8 text-sm text-gray-400">

                <div>
                    <i class="fa-solid fa-shield-halved text-orange-400 mr-2"></i>
                    Secure
                </div>

                <div>
                    <i class="fa-solid fa-truck-fast text-orange-400 mr-2"></i>
                    Fast Delivery
                </div>

                <div>
                    <i class="fa-solid fa-store text-orange-400 mr-2"></i>
                    Trusted Sellers
                </div>

            </div>

        </div>
    </div>


    <!-- RIGHT SIDE -->
    <div class="w-full lg:w-1/2 flex items-center justify-center
                px-6 py-12">

        <div class="w-full max-w-md">

            <!-- Mobile Logo -->
            <div class="lg:hidden flex justify-center mb-8">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-gray-950
                                flex items-center justify-center">
                        <i class="fa-solid fa-bag-shopping text-orange-400"></i>
                    </div>

                    <span class="text-2xl font-bold text-gray-950">
                        Haatify<span class="text-orange-500">Bazar</span>
                    </span>

                </div>
            </div>


            <!-- Heading -->
            <div class="mb-8">

                <h2 class="text-3xl font-bold text-gray-900">
                    Welcome back
                </h2>

                <p class="text-gray-500 mt-2">
                    Sign in to continue shopping with Haatify.
                </p>

            </div>


            <!-- Form -->
            <form method="POST" action="#" class="space-y-5">

                @csrf

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
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-orange-400
                                   focus:border-transparent
                                   transition">
                    </div>

                </div>


                <!-- Password -->
                <div>

                    <div class="flex justify-between mb-2">

                        <label class="text-sm font-semibold text-gray-700">
                            Password
                        </label>

                        <a href="#"
                           class="text-sm text-orange-500
                                  hover:text-orange-600">
                            Forgot password?
                        </a>

                    </div>

                    <div class="relative">

                        <i class="fa-solid fa-lock
                                  absolute left-4 top-1/2
                                  -translate-y-1/2 text-gray-400">
                        </i>

                        <input
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                            class="w-full h-12 pl-11 pr-4
                                   border border-gray-300
                                   rounded-lg
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-orange-400
                                   focus:border-transparent
                                   transition">
                    </div>

                </div>


                <!-- Remember -->
                <div class="flex items-center gap-2">

                    <input
                        type="checkbox"
                        name="remember"
                        class="w-4 h-4 accent-orange-500">

                    <label class="text-sm text-gray-600">
                        Remember me
                    </label>

                </div>


                <!-- Login Button -->
                <button
                    type="submit"
                    class="w-full h-12
                           bg-gray-950 hover:bg-gray-800
                           text-white font-semibold
                           rounded-lg
                           transition duration-200
                           flex items-center justify-center gap-2">

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Sign In

                </button>

            </form>


            <!-- Divider -->
            <div class="flex items-center gap-4 my-7">

                <div class="flex-1 border-t border-gray-200"></div>

                <span class="text-xs text-gray-400 uppercase">
                    New to Haatify?
                </span>

                <div class="flex-1 border-t border-gray-200"></div>

            </div>


            <!-- Signup -->
            <a
                href="{{ route('register') }}"
                class="w-full h-12
                       border border-gray-300
                       hover:border-gray-950
                       rounded-lg
                       flex items-center justify-center
                       font-semibold text-gray-800
                       transition">

                Create your account

            </a>


            <!-- Vendor -->
            <p class="text-center text-sm text-gray-500 mt-6">

                Want to sell on Haatify?

                <a href="{{ route('vendor.register') }}"
                   class="text-orange-500 font-semibold
                          hover:underline">
                    Become a seller
                </a>

            </p>

        </div>

    </div>

</div>

</body>
@endsection

