@extends('layouts.guest')

@section('content')

<div class="min-h-screen bg-gray-50 py-10 px-4 sm:px-6 lg:px-8">

    <div class="max-w-6xl mx-auto">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="text-center mb-10 animate-slideUp">

            <div class="inline-flex items-center justify-center
                        w-14 h-14 rounded-2xl
                        bg-orange-400 text-gray-950
                        shadow-lg shadow-orange-200 mb-4">

                <i class="fa-solid fa-store text-xl"></i>

            </div>

            <h1 class="text-3xl sm:text-4xl font-black text-gray-900">
                Become a Haatify Seller
            </h1>

            <p class="mt-3 text-gray-500 max-w-2xl mx-auto">
                Start selling your products on Haatify.
                Submit your application and our team will review your business.
            </p>

        </div>


        {{-- ========================================================= --}}
        {{-- MAIN CARD --}}
        {{-- ========================================================= --}}

        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/60
                    border border-gray-100 overflow-hidden">

            <div class="grid lg:grid-cols-[320px_1fr]">


                {{-- ================================================= --}}
                {{-- LEFT SIDEBAR --}}
                {{-- ================================================= --}}

                <aside class="bg-gray-950 text-white p-7 sm:p-9">

                    <div class="sticky top-8">

                        <div class="mb-8">

                            <span class="inline-flex items-center
                                         px-3 py-1.5 rounded-full
                                         bg-orange-400/10
                                         border border-orange-400/20
                                         text-orange-300
                                         text-xs font-bold uppercase
                                         tracking-wider">

                                Seller Center

                            </span>

                            <h2 class="text-2xl font-bold mt-4">
                                Grow your business
                            </h2>

                            <p class="text-gray-400 text-sm mt-2 leading-relaxed">
                                Join Haatify and reach more customers with
                                your own online shop.
                            </p>

                        </div>


                        {{-- BENEFITS --}}

                        <div class="space-y-5">

                            <div class="flex gap-4 sidebar-item">

                                <div class="w-10 h-10 shrink-0
                                            rounded-xl bg-white/10
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-users text-orange-300"></i>

                                </div>

                                <div>
                                    <h3 class="font-semibold">
                                        Reach more customers
                                    </h3>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Showcase your products to Haatify shoppers.
                                    </p>
                                </div>

                            </div>


                            <div class="flex gap-4 sidebar-item">

                                <div class="w-10 h-10 shrink-0
                                            rounded-xl bg-white/10
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-chart-line text-orange-300"></i>

                                </div>

                                <div>
                                    <h3 class="font-semibold">
                                        Grow your sales
                                    </h3>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Manage products and orders from your seller account.
                                    </p>
                                </div>

                            </div>


                            <div class="flex gap-4 sidebar-item">

                                <div class="w-10 h-10 shrink-0
                                            rounded-xl bg-white/10
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-shield-halved text-orange-300"></i>

                                </div>

                                <div>
                                    <h3 class="font-semibold">
                                        Secure seller account
                                    </h3>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Your account is activated only after admin approval.
                                    </p>
                                </div>

                            </div>

                        </div>


                        {{-- PROCESS --}}

                        <div class="mt-10 pt-7 border-t border-white/10">

                            <p class="text-xs font-bold uppercase
                                      tracking-wider text-gray-500 mb-5">

                                Approval Process

                            </p>


                            <div class="space-y-5">

                                <div class="flex items-start gap-3">

                                    <div class="w-7 h-7 rounded-full
                                                bg-orange-400 text-gray-950
                                                flex items-center justify-center
                                                text-xs font-black shrink-0">

                                        1

                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold">
                                            Submit application
                                        </p>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Provide your business information.
                                        </p>
                                    </div>

                                </div>


                                <div class="flex items-start gap-3">

                                    <div class="w-7 h-7 rounded-full
                                                bg-white/10 text-white
                                                flex items-center justify-center
                                                text-xs font-black shrink-0">

                                        2

                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold">
                                            Admin review
                                        </p>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Our team verifies your application.
                                        </p>
                                    </div>

                                </div>


                                <div class="flex items-start gap-3">

                                    <div class="w-7 h-7 rounded-full
                                                bg-white/10 text-white
                                                flex items-center justify-center
                                                text-xs font-black shrink-0">

                                        3

                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold">
                                            Account activation
                                        </p>

                                        <p class="text-xs text-gray-500 mt-1">
                                            Login credentials are sent after approval.
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </aside>


                {{-- ================================================= --}}
                {{-- FORM --}}
                {{-- ================================================= --}}

                <main class="p-6 sm:p-8 lg:p-10">

                    {{-- SUCCESS --}}

                    @if(session('success'))

                        <div class="mb-7 flex items-start gap-3
                                    rounded-2xl border border-green-200
                                    bg-green-50 p-4 text-green-800
                                    animate-fadeIn">

                            <i class="fa-solid fa-circle-check mt-0.5"></i>

                            <div>
                                <p class="font-semibold">
                                    Application submitted successfully!
                                </p>

                                <p class="text-sm mt-1">
                                    {{ session('success') }}
                                </p>
                            </div>

                        </div>

                    @endif


                    {{-- ERROR --}}

                    @if(session('error'))

                        <div class="mb-7 flex items-start gap-3
                                    rounded-2xl border border-red-200
                                    bg-red-50 p-4 text-red-800
                                    animate-fadeIn">

                            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>

                            <div>
                                <p class="font-semibold">
                                    Something went wrong
                                </p>

                                <p class="text-sm mt-1">
                                    {{ session('error') }}
                                </p>
                            </div>

                        </div>

                    @endif


                    {{-- VALIDATION SUMMARY --}}

                    @if($errors->any())

                        <div class="mb-7 rounded-2xl border border-red-200
                                    bg-red-50 p-4 animate-fadeIn">

                            <div class="flex gap-3">

                                <i class="fa-solid fa-circle-exclamation
                                          text-red-500 mt-0.5"></i>

                                <div>

                                    <p class="font-semibold text-red-800">
                                        Please correct the following errors:
                                    </p>

                                    <ul class="mt-2 space-y-1 text-sm text-red-700">

                                        @foreach($errors->all() as $error)

                                            <li class="flex gap-2">
                                                <span>•</span>
                                                <span>{{ $error }}</span>
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- FORM HEADER --}}

                    <div class="mb-8">

                        <p class="text-xs font-bold uppercase
                                  tracking-wider text-orange-500">

                            Seller Registration

                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mt-1">
                            Tell us about your business
                        </h2>

                        <p class="text-sm text-gray-500 mt-2">
                            All required information must be provided accurately.
                        </p>

                    </div>


                    <form method="POST"
                          action="{{ route('vendor.register.submit') }}"
                          enctype="multipart/form-data"
                          class="space-y-9"
                          id="vendor-registration-form">

                        @csrf


                        {{-- ================================================= --}}
                        {{-- BUSINESS INFORMATION --}}
                        {{-- ================================================= --}}

                        <section>

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-9 h-9 rounded-xl
                                            bg-orange-50 text-orange-600
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-building"></i>

                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-900">
                                        Business Information
                                    </h3>

                                    <p class="text-xs text-gray-400">
                                        Basic information about your business.
                                    </p>

                                </div>

                            </div>


                            <div class="grid sm:grid-cols-2 gap-5">

                                {{-- NAME --}}

                                <div>

                                    <label for="name"
                                           class="block text-sm font-semibold text-gray-700 mb-2">

                                        Full name
                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="John Doe"
                                        required
                                        autocomplete="name"
                                        class="w-full h-12 px-4 rounded-xl
                                               border border-gray-200
                                               bg-gray-50
                                               text-gray-900
                                               placeholder-gray-400
                                               transition
                                               focus:bg-white
                                               focus:border-orange-400
                                               focus:ring-4
                                               focus:ring-orange-100
                                               focus:outline-none
                                               @error('name') border-red-400 bg-red-50 @enderror">

                                    @error('name')
                                        <p class="mt-1.5 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- SHOP NAME --}}

                                <div>

                                    <label for="shop_name"
                                           class="block text-sm font-semibold text-gray-700 mb-2">

                                        Shop name
                                        <span class="text-gray-400 font-normal">
                                            (Optional)
                                        </span>

                                    </label>

                                    <input
                                        id="shop_name"
                                        type="text"
                                        name="shop_name"
                                        value="{{ old('shop_name') }}"
                                        placeholder="Your shop name"
                                        autocomplete="organization"
                                        class="w-full h-12 px-4 rounded-xl
                                               border border-gray-200
                                               bg-gray-50
                                               text-gray-900
                                               placeholder-gray-400
                                               transition
                                               focus:bg-white
                                               focus:border-orange-400
                                               focus:ring-4
                                               focus:ring-orange-100
                                               focus:outline-none
                                               @error('shop_name') border-red-400 bg-red-50 @enderror">

                                    @error('shop_name')
                                        <p class="mt-1.5 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- PAN --}}

                                <div>

                                    <label for="pan_no"
                                           class="block text-sm font-semibold text-gray-700 mb-2">

                                        PAN number
                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input
                                        id="pan_no"
                                        type="text"
                                        name="pan_no"
                                        value="{{ old('pan_no') }}"
                                        placeholder="Enter PAN number"
                                        required
                                        class="w-full h-12 px-4 rounded-xl
                                               border border-gray-200
                                               bg-gray-50
                                               text-gray-900
                                               placeholder-gray-400
                                               transition
                                               focus:bg-white
                                               focus:border-orange-400
                                               focus:ring-4
                                               focus:ring-orange-100
                                               focus:outline-none
                                               @error('pan_no') border-red-400 bg-red-50 @enderror">

                                    @error('pan_no')
                                        <p class="mt-1.5 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- ADDRESS --}}

                                <div>

                                    <label for="address"
                                           class="block text-sm font-semibold text-gray-700 mb-2">

                                        Business address
                                        <span class="text-gray-400 font-normal">
                                            (Optional)
                                        </span>

                                    </label>

                                    <input
                                        id="address"
                                        type="text"
                                        name="address"
                                        value="{{ old('address') }}"
                                        placeholder="Kathmandu, Nepal"
                                        autocomplete="street-address"
                                        class="w-full h-12 px-4 rounded-xl
                                               border border-gray-200
                                               bg-gray-50
                                               text-gray-900
                                               placeholder-gray-400
                                               transition
                                               focus:bg-white
                                               focus:border-orange-400
                                               focus:ring-4
                                               focus:ring-orange-100
                                               focus:outline-none
                                               @error('address') border-red-400 bg-red-50 @enderror">

                                    @error('address')
                                        <p class="mt-1.5 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </section>


                        {{-- ================================================= --}}
                        {{-- CONTACT --}}
                        {{-- ================================================= --}}

                        <section class="border-t border-gray-100 pt-8">

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-9 h-9 rounded-xl
                                            bg-orange-50 text-orange-600
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-address-book"></i>

                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-900">
                                        Contact Information
                                    </h3>

                                    <p class="text-xs text-gray-400">
                                        We'll use this information to contact you.
                                    </p>

                                </div>

                            </div>


                            <div class="grid sm:grid-cols-2 gap-5">

                                {{-- EMAIL --}}

                                <div>

                                    <label for="email"
                                           class="block text-sm font-semibold text-gray-700 mb-2">

                                        Business email
                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="business@example.com"
                                        required
                                        autocomplete="email"
                                        class="w-full h-12 px-4 rounded-xl
                                               border border-gray-200
                                               bg-gray-50
                                               text-gray-900
                                               placeholder-gray-400
                                               transition
                                               focus:bg-white
                                               focus:border-orange-400
                                               focus:ring-4
                                               focus:ring-orange-100
                                               focus:outline-none
                                               @error('email') border-red-400 bg-red-50 @enderror">

                                    <p class="mt-1.5 text-xs text-gray-400">
                                        Your vendor login credentials will be sent here after approval.
                                    </p>

                                    @error('email')
                                        <p class="mt-1.5 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- PHONE --}}

                                <div>

                                    <label for="phone"
                                           class="block text-sm font-semibold text-gray-700 mb-2">

                                        Phone number
                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input
                                        id="phone"
                                        type="tel"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="98XXXXXXXX"
                                        required
                                        autocomplete="tel"
                                        maxlength="10"
                                        class="w-full h-12 px-4 rounded-xl
                                               border border-gray-200
                                               bg-gray-50
                                               text-gray-900
                                               placeholder-gray-400
                                               transition
                                               focus:bg-white
                                               focus:border-orange-400
                                               focus:ring-4
                                               focus:ring-orange-100
                                               focus:outline-none
                                               @error('phone') border-red-400 bg-red-50 @enderror">

                                    @error('phone')
                                        <p class="mt-1.5 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </section>


                        {{-- ================================================= --}}
                        {{-- BRANDING --}}
                        {{-- ================================================= --}}

                        <section class="border-t border-gray-100 pt-8">

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-9 h-9 rounded-xl
                                            bg-orange-50 text-orange-600
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-image"></i>

                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-900">
                                        Shop Branding
                                    </h3>

                                    <p class="text-xs text-gray-400">
                                        Add your logo and shop banner.
                                    </p>

                                </div>

                            </div>


                            <div class="grid sm:grid-cols-2 gap-5">


                                {{-- LOGO --}}

                                <div>

                                    <label for="logo"
                                           class="block text-sm font-semibold text-gray-700 mb-2">

                                        Shop logo

                                        <span class="text-xs text-gray-400 font-normal">
                                            Optional
                                        </span>

                                    </label>

                                    <div class="relative">

                                        <label for="logo"
                                               class="group flex flex-col items-center
                                                      justify-center min-h-40
                                                      rounded-2xl border-2 border-dashed
                                                      border-gray-200 bg-gray-50
                                                      cursor-pointer
                                                      transition
                                                      hover:border-orange-300
                                                      hover:bg-orange-50/40
                                                      @error('logo') border-red-400 @enderror">

                                            <div id="logo-placeholder"
                                                 class="text-center">

                                                <div class="w-11 h-11 mx-auto
                                                            rounded-xl bg-white
                                                            shadow-sm
                                                            flex items-center justify-center
                                                            text-gray-400
                                                            group-hover:text-orange-500">

                                                    <i class="fa-solid fa-cloud-arrow-up"></i>

                                                </div>

                                                <p class="text-sm font-semibold text-gray-700 mt-3">
                                                    Upload logo
                                                </p>

                                                <p class="text-xs text-gray-400 mt-1">
                                                    JPG, PNG, GIF or WebP · Max 2MB
                                                </p>

                                            </div>


                                            <div id="logo-preview"
                                                 class="hidden text-center relative w-full px-4">

                                                <img id="logo-preview-img"
                                                     src="#"
                                                     alt="Logo preview"
                                                     class="h-24 w-24 object-cover
                                                            rounded-xl mx-auto
                                                            border border-gray-200">

                                                <button type="button"
                                                        onclick="removeImage('logo')"
                                                        class="absolute -top-2 -right-2
                                                               w-7 h-7 rounded-full
                                                               bg-red-500 text-white
                                                               hover:bg-red-600
                                                               flex items-center justify-center
                                                               text-xs shadow-md
                                                               transition
                                                               hover:scale-110">

                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>

                                                <p class="text-xs text-orange-500 mt-2">
                                                    Click to replace
                                                </p>

                                            </div>


                                            <input
                                                id="logo"
                                                type="file"
                                                name="logo"
                                                accept=".jpg,.jpeg,.png,.gif,.webp"
                                                class="hidden">

                                        </label>

                                    </div>

                                    @error('logo')
                                        <p class="mt-1.5 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- BANNER --}}

                                <div>

                                    <label for="banner"
                                           class="block text-sm font-semibold text-gray-700 mb-2">

                                        Shop banner

                                        <span class="text-xs text-gray-400 font-normal">
                                            Optional
                                        </span>

                                    </label>

                                    <div class="relative">

                                        <label for="banner"
                                               class="group flex flex-col items-center
                                                      justify-center min-h-40
                                                      rounded-2xl border-2 border-dashed
                                                      border-gray-200 bg-gray-50
                                                      cursor-pointer
                                                      transition
                                                      hover:border-orange-300
                                                      hover:bg-orange-50/40
                                                      @error('banner') border-red-400 @enderror">

                                            <div id="banner-placeholder"
                                                 class="text-center">

                                                <div class="w-11 h-11 mx-auto
                                                            rounded-xl bg-white
                                                            shadow-sm
                                                            flex items-center justify-center
                                                            text-gray-400
                                                            group-hover:text-orange-500">

                                                    <i class="fa-solid fa-panorama"></i>

                                                </div>

                                                <p class="text-sm font-semibold text-gray-700 mt-3">
                                                    Upload banner
                                                </p>

                                                <p class="text-xs text-gray-400 mt-1">
                                                    JPG, PNG, GIF or WebP · Max 5MB
                                                </p>

                                            </div>


                                            <div id="banner-preview"
                                                 class="hidden w-full px-4 relative">

                                                <img id="banner-preview-img"
                                                     src="#"
                                                     alt="Banner preview"
                                                     class="w-full h-24 object-cover
                                                            rounded-xl border border-gray-200">

                                                <button type="button"
                                                        onclick="removeImage('banner')"
                                                        class="absolute -top-2 -right-2
                                                               w-7 h-7 rounded-full
                                                               bg-red-500 text-white
                                                               hover:bg-red-600
                                                               flex items-center justify-center
                                                               text-xs shadow-md
                                                               transition
                                                               hover:scale-110">

                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>

                                                <p class="text-xs text-orange-500 mt-2 text-center">
                                                    Click to replace
                                                </p>

                                            </div>


                                            <input
                                                id="banner"
                                                type="file"
                                                name="banner"
                                                accept=".jpg,.jpeg,.png,.gif,.webp"
                                                class="hidden">

                                        </label>

                                    </div>

                                    @error('banner')
                                        <p class="mt-1.5 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </section>


                        {{-- ================================================= --}}
                        {{-- APPROVAL NOTICE --}}
                        {{-- ================================================= --}}

                        <section>

                            <div class="rounded-2xl
                                        bg-orange-50
                                        border border-orange-200
                                        p-5">

                                <div class="flex items-start gap-4">

                                    <div class="w-10 h-10 shrink-0
                                                rounded-xl bg-orange-400
                                                text-gray-950
                                                flex items-center justify-center">

                                        <i class="fa-solid fa-user-shield"></i>

                                    </div>

                                    <div>

                                        <h3 class="font-bold text-gray-900">
                                            Admin approval required
                                        </h3>

                                        <p class="text-sm text-gray-600 mt-1 leading-relaxed">
                                            Your application will be reviewed by our admin team
                                            before your seller account is activated.
                                        </p>

                                        <div class="mt-3 flex items-start gap-2
                                                    text-sm text-gray-700">

                                            <i class="fa-solid fa-circle-check
                                                      text-orange-500 mt-0.5"></i>

                                            <span>
                                                After approval, your unique vendor username
                                                and temporary password will be generated
                                                automatically and sent to your email.
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        {{-- ================================================= --}}
                        {{-- TERMS --}}
                        {{-- ================================================= --}}

                        <div>

                            <div class="flex items-start gap-3">

                                <input
                                    id="terms"
                                    type="checkbox"
                                    name="terms"
                                    value="1"
                                    {{ old('terms') ? 'checked' : '' }}
                                    required
                                    class="mt-1 w-4 h-4
                                           rounded border-gray-300
                                           text-orange-500
                                           focus:ring-orange-400
                                           @error('terms') border-red-400 @enderror">

                                <label for="terms"
                                       class="text-sm text-gray-500 leading-relaxed">

                                    I confirm that the information provided is accurate
                                    and I agree to the

                                    <a href=""
                                       class="font-semibold text-orange-500 hover:text-orange-600 hover:underline"
                                       target="_blank">

                                        Vendor Terms

                                    </a>

                                    and

                                    <a href=""
                                       class="font-semibold text-orange-500 hover:text-orange-600 hover:underline"
                                       target="_blank">

                                        Privacy Policy

                                    </a>.

                                </label>

                            </div>

                            @error('terms')
                                <p class="mt-2 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- ================================================= --}}
                        {{-- SUBMIT --}}
                        {{-- ================================================= --}}

                        <div class="pt-2">

                            <button
                                type="submit"
                                id="submit-button"
                                class="w-full h-13 px-6
                                       rounded-xl
                                       bg-gray-950
                                       hover:bg-gray-800
                                       text-white
                                       font-bold
                                       transition-all
                                       duration-200
                                       flex items-center justify-center gap-3
                                       shadow-lg shadow-gray-200
                                       hover:-translate-y-0.5
                                       hover:shadow-xl
                                       focus:outline-none
                                       focus:ring-4
                                       focus:ring-gray-200
                                       disabled:opacity-60
                                       disabled:cursor-not-allowed">

                                <i class="fa-solid fa-paper-plane"></i>

                                <span id="submit-text">
                                    Submit Vendor Application
                                </span>

                            </button>

                            <p class="text-center text-xs text-gray-400 mt-3">
                                By submitting this application, you agree to our seller policies.
                            </p>

                        </div>

                    </form>

                </main>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- FOOTER --}}
        {{-- ========================================================= --}}

        <div class="text-center mt-6">

            <p class="text-sm text-gray-400">

                Already a vendor?

                <a href=""
                   class="font-semibold text-orange-500 hover:text-orange-600">

                    Sign in to your seller account

                </a>

            </p>

        </div>

    </div>

</div>


{{-- ============================================================= --}}
{{-- ADDITIONAL CSS FOR ANIMATIONS --}}
{{-- ============================================================= --}}

<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.5s ease-out;
}

.animate-slideUp {
    animation: slideUp 0.6s ease-out;
}

.sidebar-item {
    opacity: 0;
    animation: slideUp 0.5s ease-out forwards;
}

.sidebar-item:nth-child(1) { animation-delay: 0.1s; }
.sidebar-item:nth-child(2) { animation-delay: 0.2s; }
.sidebar-item:nth-child(3) { animation-delay: 0.3s; }

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: #d1d5db;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: #9ca3af;
}

/* Loading spinner animation */
.fa-spin {
    animation: fa-spin 2s infinite linear;
}

@keyframes fa-spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>


{{-- ============================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Setup image previews
    setupImagePreview('logo');
    setupImagePreview('banner');

    // Setup phone number mask
    setupPhoneMask();

    // Setup PAN number uppercase
    setupPanUppercase();

    // Setup form submission
    setupFormSubmission();

    // Setup auto-save
    setupAutoSave();
});

/**
 * Setup image preview with validation
 */
function setupImagePreview(type) {
    const input = document.getElementById(type);
    const placeholder = document.getElementById(type + '-placeholder');
    const preview = document.getElementById(type + '-preview');
    const previewImage = document.getElementById(type + '-preview-img');

    if (!input) return;

    input.addEventListener('change', function (event) {
        const file = event.target.files[0];

        // If no file selected, reset to placeholder
        if (!file) {
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
            previewImage.src = '#';
            return;
        }

        // Validate file type
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!allowedTypes.includes(file.type)) {
            alert('Please select a valid image file (JPG, PNG, GIF, or WebP).');
            input.value = '';
            return;
        }

        // Validate file size
        const maxSize = type === 'logo' ? 2 * 1024 * 1024 : 5 * 1024 * 1024;
        if (file.size > maxSize) {
            const maxMB = type === 'logo' ? '2MB' : '5MB';
            alert(`The ${type} must be smaller than ${maxMB}.`);
            input.value = '';
            return;
        }

        // Preview the image
        const reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;
            placeholder.classList.add('hidden');
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    });
}

/**
 * Remove uploaded image
 */
function removeImage(type) {
    const input = document.getElementById(type);
    const placeholder = document.getElementById(type + '-placeholder');
    const preview = document.getElementById(type + '-preview');
    const previewImage = document.getElementById(type + '-preview-img');

    input.value = '';
    preview.classList.add('hidden');
    placeholder.classList.remove('hidden');
    previewImage.src = '#';
}

/**
 * Setup phone number mask (only digits, max 10)
 */
function setupPhoneMask() {
    const phoneInput = document.getElementById('phone');
    if (!phoneInput) return;

    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 10) value = value.slice(0, 10);
        e.target.value = value;
    });
}

/**
 * Setup PAN number to uppercase
 */
function setupPanUppercase() {
    const panInput = document.getElementById('pan_no');
    if (!panInput) return;

    panInput.addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
}

/**
 * Setup form submission with loading state
 */
function setupFormSubmission() {
    const form = document.getElementById('vendor-registration-form');
    const button = document.getElementById('submit-button');
    const submitText = document.getElementById('submit-text');

    if (!form || !button) return;

    form.addEventListener('submit', function(e) {
        // Don't disable if there are validation errors
        if (!form.checkValidity()) {
            return;
        }

        // Disable button and show loading
        button.disabled = true;
        button.innerHTML = `
            <i class="fa-solid fa-spinner fa-spin"></i>
            <span>Submitting...</span>
        `;

        // Re-enable if submission fails (will be handled by server redirect)
        setTimeout(function() {
            if (!document.querySelector('.animate-fadeIn')) {
                button.disabled = false;
                button.innerHTML = `
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Submit Vendor Application</span>
                `;
            }
        }, 10000); // Re-enable after 10 seconds if no response
    });
}

/**
 * Auto-save form data to localStorage
 */
function setupAutoSave() {
    const form = document.getElementById('vendor-registration-form');
    if (!form) return;

    const inputs = form.querySelectorAll('input:not([type="file"]):not([type="checkbox"]), select, textarea');

    inputs.forEach(input => {
        const key = 'vendor_register_' + input.id;

        // Load saved data
        try {
            const saved = localStorage.getItem(key);
            if (saved !== null) {
                if (input.type === 'checkbox' || input.type === 'radio') {
                    input.checked = saved === 'true';
                } else {
                    input.value = saved;
                }
            }
        } catch (e) {
            // Ignore localStorage errors
        }

        // Save on change
        input.addEventListener('change', function() {
            try {
                if (input.type === 'checkbox' || input.type === 'radio') {
                    localStorage.setItem(key, input.checked);
                } else {
                    localStorage.setItem(key, input.value);
                }
            } catch (e) {
                // Ignore localStorage errors
            }
        });
    });

    // Clear saved data on successful submission
    form.addEventListener('submit', function() {
        // Only clear if no validation errors
        if (form.checkValidity()) {
            setTimeout(() => {
                inputs.forEach(input => {
                    const key = 'vendor_register_' + input.id;
                    try {
                        localStorage.removeItem(key);
                    } catch (e) {
                        // Ignore localStorage errors
                    }
                });
            }, 500);
        }
    });
}
</script>

@endsection
