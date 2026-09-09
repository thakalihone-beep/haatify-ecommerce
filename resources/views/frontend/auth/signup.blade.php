@extends('layouts.guest')

@section('title', 'Signup - Haatify')

@section('content')

<body class="min-h-screen bg-gray-100">

<div class="min-h-screen flex items-center justify-center px-6 py-12">

    <div class="w-full max-w-5xl bg-white rounded-2xl
                shadow-xl overflow-hidden flex">


        <!-- ===================================================== -->
        <!-- LEFT SIDE -->
        <!-- ===================================================== -->

        <div class="hidden md:flex md:w-5/12
                    bg-gray-950 text-white
                    p-10 flex-col justify-between">

            <div>

                <!-- Logo -->
                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-orange-400
                                flex items-center justify-center">

                        <i class="fa-solid fa-bag-shopping
                                  text-gray-950"></i>

                    </div>

                    <span class="text-2xl font-bold">

                        Haatify<span class="text-orange-400">
                            Bazar
                        </span>

                    </span>

                </div>


                <!-- Heading -->
                <h1 class="text-4xl font-bold mt-16 leading-tight">

                    Join the

                    <span class="text-orange-400">
                        Haatify
                    </span>

                    community.

                </h1>


                <!-- Description -->
                <p class="text-gray-400 mt-5 leading-relaxed">

                    Create your account and start discovering
                    products from trusted sellers.

                </p>

            </div>


            <!-- Features -->
            <div class="space-y-4 text-sm text-gray-400">

                <p>

                    <i class="fa-solid fa-circle-check
                              text-orange-400 mr-2">
                    </i>

                    Personalized shopping experience

                </p>


                <p>

                    <i class="fa-solid fa-circle-check
                              text-orange-400 mr-2">
                    </i>

                    Track your orders easily

                </p>


                <p>

                    <i class="fa-solid fa-circle-check
                              text-orange-400 mr-2">
                    </i>

                    Save your favorite products

                </p>

            </div>

        </div>



        <!-- ===================================================== -->
        <!-- RIGHT SIDE -->
        <!-- ===================================================== -->

        <div class="w-full md:w-7/12 p-8 md:p-12">

            <div class="max-w-md mx-auto">


                <!-- ================================================= -->
                <!-- HEADING -->
                <!-- ================================================= -->

                <h2 class="text-3xl font-bold text-gray-900">

                    Create your account

                </h2>


                <p class="text-gray-500 mt-2 mb-8">

                    It only takes a minute to get started.

                </p>



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
                <!-- REGISTRATION FORM -->
                <!-- ================================================= -->

                <form
                    method="POST"
                    action="{{ route('register.submit') }}"
                    class="space-y-5">

                    @csrf


                    <!-- ================================================= -->
                    <!-- NAME -->
                    <!-- ================================================= -->

                    <div>

                        <label
                            for="name"
                            class="block text-sm font-semibold
                                   text-gray-700 mb-2">

                            Full name

                        </label>


                        <div class="relative">

                            <i class="fa-regular fa-user
                                      absolute left-4 top-1/2
                                      -translate-y-1/2
                                      text-gray-400">
                            </i>


                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Your full name"
                                autocomplete="name"
                                required

                                class="w-full h-12 pl-11 pr-4
                                       border border-gray-300
                                       rounded-lg
                                       bg-white
                                       text-gray-900

                                       focus:ring-2
                                       focus:ring-orange-400
                                       focus:outline-none

                                       transition">

                        </div>

                    </div>



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

                            <i class="fa-regular fa-envelope
                                      absolute left-4 top-1/2
                                      -translate-y-1/2
                                      text-gray-400">
                            </i>


                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                autocomplete="email"
                                required

                                class="w-full h-12 pl-11 pr-4
                                       border border-gray-300
                                       rounded-lg
                                       bg-white
                                       text-gray-900

                                       focus:ring-2
                                       focus:ring-orange-400
                                       focus:outline-none

                                       transition">

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- PASSWORD -->
                    <!-- ================================================= -->

                    <div>

                        <label
                            for="password"
                            class="block text-sm font-semibold
                                   text-gray-700 mb-2">

                            Password

                        </label>


                        <div class="relative">

                            <i class="fa-solid fa-lock
                                      absolute left-4 top-1/2
                                      -translate-y-1/2
                                      text-gray-400">
                            </i>


                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Create a password"
                                autocomplete="new-password"
                                required

                                class="w-full h-12 pl-11 pr-4
                                       border border-gray-300
                                       rounded-lg
                                       bg-white
                                       text-gray-900

                                       focus:ring-2
                                       focus:ring-orange-400
                                       focus:outline-none

                                       transition">

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- CONFIRM PASSWORD -->
                    <!-- ================================================= -->

                    <div>

                        <label
                            for="password_confirmation"
                            class="block text-sm font-semibold
                                   text-gray-700 mb-2">

                            Confirm password

                        </label>


                        <div class="relative">

                            <i class="fa-solid fa-lock
                                      absolute left-4 top-1/2
                                      -translate-y-1/2
                                      text-gray-400">
                            </i>


                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="Confirm your password"
                                autocomplete="new-password"
                                required

                                class="w-full h-12 pl-11 pr-4
                                       border border-gray-300
                                       rounded-lg
                                       bg-white
                                       text-gray-900

                                       focus:ring-2
                                       focus:ring-orange-400
                                       focus:outline-none

                                       transition">

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- TERMS -->
                    <!-- ================================================= -->

                    <div class="flex gap-2 items-start">

                        <input
                            id="terms"
                            type="checkbox"
                            name="terms"
                            value="1"
                            required

                            class="mt-1
                                   w-4 h-4
                                   accent-orange-500
                                   cursor-pointer">


                        <p class="text-xs text-gray-500 leading-relaxed">

                            I agree to Haatify's

                            <a
                                href="#"
                                class="text-orange-500
                                       hover:underline">

                                Terms of Service

                            </a>

                            and

                            <a
                                href="#"
                                class="text-orange-500
                                       hover:underline">

                                Privacy Policy

                            </a>.

                        </p>

                    </div>



                    <!-- ================================================= -->
                    <!-- CREATE ACCOUNT BUTTON -->
                    <!-- ================================================= -->

                    <button
                        type="submit"

                        class="w-full h-12

                               bg-orange-400
                               hover:bg-orange-500

                               text-gray-950
                               font-bold

                               rounded-lg

                               transition duration-200

                               flex items-center
                               justify-center
                               gap-2

                               shadow-sm
                               hover:shadow-md">

                        <i class="fa-solid fa-user-plus"></i>

                        Create Account

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
                <!-- GOOGLE SIGNUP -->
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
                <!-- LOGIN -->
                <!-- ================================================= -->

                <p class="text-center text-sm text-gray-500 mt-7">

                    Already have an account?

                    <a
                        href="{{ route('login') }}"

                        class="text-orange-500
                               font-semibold
                               hover:text-orange-600
                               hover:underline
                               transition">

                        Sign in

                    </a>

                </p>



                <!-- ================================================= -->
                <!-- VENDOR -->
                <!-- ================================================= -->

                <div
                    class="border-t border-gray-200
                           mt-7 pt-6">

                    <p class="text-center text-sm text-gray-500">

                        Want to sell products?

                        <a
                            href="{{ route('vendor.register') }}"

                            class="font-semibold
                                   text-gray-900
                                   hover:text-orange-500
                                   transition">

                            Register as a vendor

                        </a>

                    </p>

                </div>



                <!-- ================================================= -->
                <!-- SECURITY NOTE -->
                <!-- ================================================= -->

                <div
                    class="flex items-center justify-center
                           gap-2 mt-6
                           text-xs text-gray-400">

                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Your information is securely protected.
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

@endsection
