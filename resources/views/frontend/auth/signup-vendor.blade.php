@extends('layouts.guest')
@section('title', 'vendor-registration|Haatify')
@section('content')

<body class="min-h-screen bg-gray-100">

<div class="min-h-screen flex items-center justify-center px-6 py-12">

    <div class="w-full max-w-6xl bg-white rounded-2xl
                shadow-xl overflow-hidden">

        <!-- HEADER -->
        <div class="bg-gray-950 text-white px-8 md:px-12 py-8">

            <div class="flex items-center justify-between flex-wrap gap-5">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-orange-400
                                flex items-center justify-center">

                        <i class="fa-solid fa-store
                                  text-gray-950"></i>

                    </div>

                    <div>

                        <div class="text-xl font-bold">
                            Haatify<span class="text-orange-400">Bazar</span>
                        </div>

                        <p class="text-xs text-gray-400">
                            Seller Center
                        </p>

                    </div>

                </div>


                <div class="text-sm text-gray-400">

                    Already a vendor?

                    <a href="{{ route('login') }}"
                       class="text-orange-400 font-semibold
                              hover:underline">

                        Sign in

                    </a>

                </div>

            </div>

        </div>


        <!-- CONTENT -->
        <div class="grid lg:grid-cols-5">

            <!-- SIDEBAR -->
            <div class="lg:col-span-2 bg-gray-50 p-8 md:p-10">

                <span
                    class="inline-flex items-center gap-2
                           px-3 py-1 rounded-full
                           bg-orange-100 text-orange-700
                           text-xs font-semibold">

                    <i class="fa-solid fa-store"></i>

                    SELL ON Haatify

                </span>


                <h1 class="text-3xl font-bold text-gray-900 mt-6">
                    Turn your products into a business.
                </h1>


                <p class="text-gray-500 mt-4 leading-relaxed">
                    Create your vendor account and reach customers
                    through the Haatify marketplace.
                </p>


                <div class="mt-8 space-y-5">

                    <div class="flex gap-4">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg bg-gray-950
                                    text-white
                                    flex items-center justify-center">

                            <i class="fa-solid fa-users"></i>

                        </div>

                        <div>

                            <h3 class="font-semibold text-gray-900">
                                Reach more customers
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Showcase your products to shoppers.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg bg-gray-950
                                    text-white
                                    flex items-center justify-center">

                            <i class="fa-solid fa-chart-line"></i>

                        </div>

                        <div>

                            <h3 class="font-semibold text-gray-900">
                                Grow your business
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Manage products and monitor your sales.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg bg-gray-950
                                    text-white
                                    flex items-center justify-center">

                            <i class="fa-solid fa-shield-halved"></i>

                        </div>

                        <div>

                            <h3 class="font-semibold text-gray-900">
                                Trusted marketplace
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Build your store on a secure platform.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <!-- FORM -->
            <div class="lg:col-span-3 p-8 md:p-10">

                <div class="max-w-xl">

                    <h2 class="text-2xl font-bold text-gray-900">
                        Create your vendor account
                    </h2>

                    <p class="text-gray-500 mt-2 mb-8">
                        Submit your business information to get started.
                    </p>


                    <form method="POST"
                          action="{{ route('vendor.register') }}"
                          class="space-y-6">

                        @csrf


                        <!-- Business Information -->
                        <div>

                            <h3 class="text-sm font-bold text-gray-900
                                       uppercase tracking-wide mb-4">

                                Business Information

                            </h3>


                            <div class="grid md:grid-cols-2 gap-5">

                                <!-- Full Name -->
                                <div>

                                    <label class="block text-sm font-semibold
                                                  text-gray-700 mb-2">

                                        Full name

                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="John Doe"
                                        required
                                        class="w-full h-12 px-4
                                               border border-gray-300
                                               rounded-lg
                                               focus:ring-2
                                               focus:ring-orange-400
                                               focus:outline-none">

                                </div>

                                <!-- Shop Name -->
                                <div>

                                    <label class="block text-sm font-semibold
                                                  text-gray-700 mb-2">

                                        Shop name

                                    </label>

                                    <input
                                        type="text"
                                        name="shop_name"
                                        placeholder="Your shop name"
                                        class="w-full h-12 px-4
                                               border border-gray-300
                                               rounded-lg
                                               focus:ring-2
                                               focus:ring-orange-400
                                               focus:outline-none">

                                </div>

                                <!-- Business Email -->
                                <div>

                                    <label class="block text-sm font-semibold
                                                  text-gray-700 mb-2">

                                        Email address

                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="business@example.com"
                                        required
                                        class="w-full h-12 px-4
                                               border border-gray-300
                                               rounded-lg
                                               focus:ring-2
                                               focus:ring-orange-400
                                               focus:outline-none">

                                </div>


                                <!-- Phone -->
                                <div>

                                    <label class="block text-sm font-semibold
                                                  text-gray-700 mb-2">

                                        Phone number

                                    </label>

                                    <input
                                        type="tel"
                                        name="phone"
                                        placeholder="98XXXXXXXX"
                                        required
                                        class="w-full h-12 px-4
                                               border border-gray-300
                                               rounded-lg
                                               focus:ring-2
                                               focus:ring-orange-400
                                               focus:outline-none">

                                </div>

                                <!-- PAN Number -->
                                <div>

                                    <label class="block text-sm font-semibold
                                                  text-gray-700 mb-2">

                                        PAN number

                                    </label>

                                    <input
                                        type="text"
                                        name="pan_no"
                                        placeholder="ABCDE1234F"
                                        required
                                        class="w-full h-12 px-4
                                               border border-gray-300
                                               rounded-lg
                                               focus:ring-2
                                               focus:ring-orange-400
                                               focus:outline-none">

                                </div>


                                <!-- Address -->
                                <div>

                                    <label class="block text-sm font-semibold
                                                  text-gray-700 mb-2">

                                        Business address

                                    </label>

                                    <input
                                        type="text"
                                        name="address"
                                        placeholder="Kathmandu, Nepal"
                                        class="w-full h-12 px-4
                                               border border-gray-300
                                               rounded-lg
                                               focus:ring-2
                                               focus:ring-orange-400
                                               focus:outline-none">

                                </div>

                            </div>

                        </div>


                        <!-- Account Information -->
                        <div class="border-t border-gray-200 pt-6">

                            <h3 class="text-sm font-bold text-gray-900
                                       uppercase tracking-wide mb-4">

                                Account Security

                            </h3>


                            <div class="grid md:grid-cols-2 gap-5">

                                <div>

                                    <label class="block text-sm font-semibold
                                                  text-gray-700 mb-2">

                                        Password

                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="Create password"
                                        required
                                        class="w-full h-12 px-4
                                               border border-gray-300
                                               rounded-lg
                                               focus:ring-2
                                               focus:ring-orange-400
                                               focus:outline-none">

                                </div>


                                <div>

                                    <label class="block text-sm font-semibold
                                                  text-gray-700 mb-2">

                                        Confirm password

                                    </label>

                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="Confirm password"
                                        required
                                        class="w-full h-12 px-4
                                               border border-gray-300
                                               rounded-lg
                                               focus:ring-2
                                               focus:ring-orange-400
                                               focus:outline-none">

                                </div>

                            </div>

                        </div>


                        <!-- Terms -->
                        <div class="flex gap-3 items-start">

                            <input
                                type="checkbox"
                                name="terms"
                                required
                                class="mt-1 accent-orange-500">

                            <p class="text-xs text-gray-500 leading-relaxed">

                                I confirm that the information provided is
                                accurate and I agree to the

                                <a href="#"
                                   class="text-orange-500 hover:underline">
                                    Vendor Terms
                                </a>

                                and

                                <a href="#"
                                   class="text-orange-500 hover:underline">
                                    Privacy Policy
                                </a>.

                            </p>

                        </div>


                        <!-- Submit -->
                        <button
                            type="submit"
                            class="w-full h-12
                                   bg-orange-400
                                   hover:bg-orange-500
                                   text-gray-950
                                   font-bold
                                   rounded-lg
                                   transition
                                   flex items-center justify-center gap-2">

                            <i class="fa-solid fa-store"></i>

                            Create Vendor Account

                        </button>


                        <p class="text-xs text-gray-400 text-center">
                            Your vendor account will be reviewed and may require approval
                            before you can start selling.
                        </p>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
@endsection
