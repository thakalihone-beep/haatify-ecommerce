@extends('layouts.guest')

@section('title', 'Login - Haatify')

@section('content')

<body class="min-h-screen bg-gray-100">

<div class="min-h-screen flex">

    <!-- ===================================================== -->
    <!-- LEFT SIDE -->
    <!-- ===================================================== -->

    <div class="hidden lg:flex lg:w-1/2 bg-gray-950 text-white
                relative overflow-hidden items-center justify-center">

        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-br
                    from-gray-950 via-gray-900 to-orange-950/40">
        </div>


        <!-- Content -->
        <div class="relative z-10 max-w-lg px-12">

            <!-- Logo -->
            <div class="flex items-center gap-3 mb-10">

                <div class="w-11 h-11 rounded-xl bg-orange-400
                            flex items-center justify-center">

                    <i class="fa-solid fa-bag-shopping text-gray-950"></i>

                </div>

                <span class="text-2xl font-bold">
                    Haatify<span class="text-orange-400">Bazar</span>
                </span>

            </div>


            <!-- Heading -->
            <h1 class="text-5xl font-bold leading-tight">

                Everything you need,

                <span class="text-orange-400">
                    all in one place.
                </span>

            </h1>


            <!-- Description -->
            <p class="mt-6 text-gray-400 text-lg leading-relaxed">

                Discover products from trusted sellers and enjoy a
                simple, secure shopping experience.

            </p>


            <!-- Features -->
            <div class="mt-10 flex gap-8 text-sm text-gray-400">

                <!-- Secure -->
                <div>

                    <i class="fa-solid fa-shield-halved
                              text-orange-400 mr-2">
                    </i>

                    Secure

                </div>


                <!-- Delivery -->
                <div>

                    <i class="fa-solid fa-truck-fast
                              text-orange-400 mr-2">
                    </i>

                    Fast Delivery

                </div>


                <!-- Sellers -->
                <div>

                    <i class="fa-solid fa-store
                              text-orange-400 mr-2">
                    </i>

                    Trusted Sellers

                </div>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- RIGHT SIDE -->
    <!-- ===================================================== -->

    <div class="w-full lg:w-1/2 flex items-center justify-center
                px-6 py-12">

        <div class="w-full max-w-md">


            <!-- ================================================= -->
            <!-- MOBILE LOGO -->
            <!-- ================================================= -->

            <div class="lg:hidden flex justify-center mb-8">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-gray-950
                                flex items-center justify-center">

                        <i class="fa-solid fa-bag-shopping
                                  text-orange-400">
                        </i>

                    </div>


                    <span class="text-2xl font-bold text-gray-950">

                        Haatify<span class="text-orange-500">
                            Bazar
                        </span>

                    </span>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- HEADING -->
            <!-- ================================================= -->

            <div class="mb-8">

                <h2 class="text-3xl font-bold text-gray-900">

                    Welcome back

                </h2>


                <p class="text-gray-500 mt-2">

                    Sign in to continue shopping with Haatify.

                </p>

            </div>



            <!-- ================================================= -->
            <!-- SESSION STATUS -->
            <!-- ================================================= -->

            @if (session('status'))

                <div class="mb-5 p-4 rounded-lg
                            bg-green-50 border border-green-200
                            text-green-700 text-sm">

                    {{ session('status') }}

                </div>

            @endif


            @if (session('error'))

                <div class="mb-5 p-4 rounded-lg
                            bg-red-50 border border-red-200
                            text-red-700 text-sm">

                    {{ session('error') }}

                </div>

            @endif



            <!-- ================================================= -->
            <!-- VALIDATION ERRORS -->
            <!-- ================================================= -->

            @if ($errors->any())

                <div class="mb-5 p-4 rounded-lg
                            bg-red-50 border border-red-200
                            text-red-700 text-sm">

                    <ul class="list-disc list-inside space-y-1">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <!-- ================================================= -->
            <!-- LOGIN FORM -->
            <!-- ================================================= -->

            <form
                method="POST"
                action="{{ route('login.submit') }}"
                class="space-y-5">

                @csrf


                <!-- ================================================= -->
                <!-- EMAIL -->
                <!-- ================================================= -->

                <div>

                    <label
                        for="email"
                        class="block text-sm font-semibold
                               text-gray-700 mb-2">

                        Email address

                    </label>


                    <div class="relative">

                        <!-- Email Icon -->
                        <i class="fa-regular fa-envelope
                                  absolute left-4 top-1/2
                                  -translate-y-1/2
                                  text-gray-400">
                        </i>


                        <!-- Email Input -->
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            autocomplete="email"
                            required
                            autofocus

                            class="w-full h-12 pl-11 pr-4
                                   border border-gray-300
                                   rounded-lg
                                   bg-white
                                   text-gray-900

                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-orange-400
                                   focus:border-transparent

                                   transition">

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- PASSWORD -->
                <!-- ================================================= -->

                <div>

                    <div class="flex justify-between mb-2">

                        <label
                            for="password"
                            class="text-sm font-semibold
                                   text-gray-700">

                            Password

                        </label>


                        <!-- Forgot Password -->
                        <a
                            href=""
                            class="text-sm text-orange-500
                                   hover:text-orange-600
                                   transition">

                            Forgot password?

                        </a>

                    </div>


                    <div class="relative">

                        <!-- Lock Icon -->
                        <i class="fa-solid fa-lock
                                  absolute left-4 top-1/2
                                  -translate-y-1/2
                                  text-gray-400">
                        </i>


                        <!-- Password Input -->
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required

                            class="w-full h-12 pl-11 pr-4
                                   border border-gray-300
                                   rounded-lg
                                   bg-white
                                   text-gray-900

                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-orange-400
                                   focus:border-transparent

                                   transition">

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- REMEMBER ME -->
                <!-- ================================================= -->

                <div class="flex items-center gap-2">

                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                        value="1"

                        class="w-4 h-4
                               accent-orange-500
                               rounded
                               cursor-pointer">


                    <label
                        for="remember"
                        class="text-sm text-gray-600
                               cursor-pointer">

                        Remember me

                    </label>

                </div>



                <!-- ================================================= -->
                <!-- LOGIN BUTTON -->
                <!-- ================================================= -->

                <button
                    type="submit"

                    class="w-full h-12
                           bg-gray-950
                           hover:bg-gray-800

                           text-white
                           font-semibold

                           rounded-lg

                           transition duration-200

                           flex items-center
                           justify-center
                           gap-2

                           shadow-sm
                           hover:shadow-md">

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Sign In

                </button>

            </form>



            <!-- ================================================= -->
            <!-- OR DIVIDER -->
            <!-- ================================================= -->

            <div class="flex items-center gap-4 my-6">

                <div class="flex-1 border-t border-gray-200"></div>


                <span class="text-xs text-gray-400 uppercase
                             font-medium">

                    OR

                </span>


                <div class="flex-1 border-t border-gray-200"></div>

            </div>



            <!-- ================================================= -->
            <!-- GOOGLE LOGIN -->
            <!-- ================================================= -->

            <a
                href="{{route('google.redirect')}}"

                class="w-full h-12

                       border border-gray-300

                       hover:border-gray-950
                       hover:bg-gray-50

                       rounded-lg

                       flex items-center
                       justify-center
                       gap-3

                       font-semibold
                       text-gray-800

                       transition duration-200

                       shadow-sm
                       hover:shadow-md">


                <!-- Google Logo -->

                <svg
                    class="w-5 h-5"
                    viewBox="0 0 24 24"
                    aria-hidden="true">

                    <path
                        fill="#4285F4"
                        d="M21.35 12.27c0-.72-.06-1.42-.18-2.09H12v3.96h5.24a4.48 4.48 0 0 1-1.94 2.94v2.45h3.14c1.84-1.69 2.91-4.18 2.91-7.26z"/>

                    <path
                        fill="#34A853"
                        d="M12 21.5c2.63 0 4.84-.87 6.45-2.37l-3.14-2.45c-.87.58-1.98.92-3.31.92-2.54 0-4.69-1.72-5.46-4.03H3.3v2.53A9.75 9.75 0 0 0 12 21.5z"/>

                    <path
                        fill="#FBBC05"
                        d="M6.54 13.57A5.86 5.86 0 0 1 6.23 12c0-.55.11-1.09.31-1.57V7.9H3.3A9.75 9.75 0 0 0 2.25 12c0 1.57.38 3.05 1.05 4.1l3.24-2.53z"/>

                    <path
                        fill="#EA4335"
                        d="M12 6.4c1.43 0 2.71.49 3.72 1.46l2.79-2.79C16.83 3.5 14.63 2.5 12 2.5A9.75 9.75 0 0 0 3.3 7.9l3.24 2.53C7.31 8.12 9.46 6.4 12 6.4z"/>

                </svg>


                Continue with Google

            </a>



            <!-- ================================================= -->
            <!-- NEW USER DIVIDER -->
            <!-- ================================================= -->

            <div class="flex items-center gap-4 my-7">

                <div class="flex-1 border-t border-gray-200"></div>


                <span class="text-xs text-gray-400 uppercase
                             whitespace-nowrap">

                    New to Haatify?

                </span>


                <div class="flex-1 border-t border-gray-200"></div>

            </div>



            <!-- ================================================= -->
            <!-- CREATE ACCOUNT -->
            <!-- ================================================= -->

            <a
                href="{{ route('register') }}"

                class="w-full h-12

                       border border-gray-300

                       hover:border-gray-950
                       hover:bg-gray-50

                       rounded-lg

                       flex items-center
                       justify-center

                       font-semibold
                       text-gray-800

                       transition duration-200">

                Create your account

            </a>



            <!-- ================================================= -->
            <!-- VENDOR REGISTRATION -->
            <!-- ================================================= -->

            <p class="text-center text-sm text-gray-500 mt-6">

                Want to sell on Haatify?

                <a
                    href="{{ route('vendor.register') }}"

                    class="text-orange-500
                           font-semibold
                           hover:text-orange-600
                           hover:underline
                           transition">

                    Become a seller

                </a>

            </p>



            <!-- ================================================= -->
            <!-- SECURITY NOTE -->
            <!-- ================================================= -->

            <div class="flex items-center justify-center
                        gap-2 mt-6 text-xs text-gray-400">

                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Your information is securely protected.
                </span>

            </div>

        </div>

    </div>

</div>

</body>

@endsection

