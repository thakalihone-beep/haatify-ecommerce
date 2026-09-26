@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- Header --}}
    <div class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

            <div class="max-w-3xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 rounded-xl bg-orange-500
                                flex items-center justify-center">
                        <i class="fa-solid fa-file-contract text-lg"></i>
                    </div>

                    <span class="text-orange-400 font-semibold">
                        Haatify
                    </span>
                </div>

                <h1 class="text-3xl md:text-4xl font-bold">
                    Terms & Conditions
                </h1>

                <p class="mt-4 text-gray-300 leading-relaxed">
                    Please read these Terms & Conditions carefully before
                    using Haatify or purchasing any product through our
                    platform.
                </p>

                <p class="mt-4 text-sm text-gray-400">
                    Last updated: September 26, 2026
                </p>
            </div>

        </div>
    </div>


    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            {{-- Table of Contents --}}
            <aside class="lg:col-span-1">

                <div class="bg-white border border-gray-200
                            rounded-2xl p-5 lg:sticky lg:top-24">

                    <h2 class="font-bold text-gray-900 mb-4">
                        On this page
                    </h2>

                    <nav class="space-y-1 text-sm">

                        <a href="#introduction"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            1. Introduction
                        </a>

                        <a href="#acceptance"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            2. Acceptance of Terms
                        </a>

                        <a href="#account"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            3. User Accounts
                        </a>

                        <a href="#products"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            4. Products & Information
                        </a>

                        <a href="#orders"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            5. Orders
                        </a>

                        <a href="#pricing"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            6. Pricing & Payments
                        </a>

                        <a href="#delivery"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            7. Delivery
                        </a>

                        <a href="#cancellation"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            8. Cancellation
                        </a>

                        <a href="#returns"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            9. Returns & Refunds
                        </a>

                        <a href="#reviews"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            10. Reviews
                        </a>

                        <a href="#vendors"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            11. Vendors
                        </a>

                        <a href="#prohibited"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            12. Prohibited Activities
                        </a>

                        <a href="#intellectual"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            13. Intellectual Property
                        </a>

                        <a href="#privacy"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            14. Privacy
                        </a>

                        <a href="#liability"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            15. Limitation of Liability
                        </a>

                        <a href="#changes"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            16. Changes to Terms
                        </a>

                        <a href="#contact"
                           class="block px-3 py-2 rounded-lg
                                  text-gray-600 hover:bg-orange-50
                                  hover:text-orange-600">
                            17. Contact
                        </a>

                    </nav>
                </div>

            </aside>


            {{-- Terms Content --}}
            <main class="lg:col-span-3">

                <div class="bg-white border border-gray-200
                            rounded-2xl p-6 md:p-10 space-y-12">


                    {{-- 1 --}}
                    <section id="introduction">

                        <h2 class="text-2xl font-bold text-gray-900">
                            1. Introduction
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Welcome to Haatify. These Terms & Conditions
                            govern your access to and use of the Haatify
                            website, services, products, and related
                            features.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            By accessing Haatify, creating an account,
                            browsing products, or placing an order, you
                            acknowledge that you have read, understood,
                            and agreed to these Terms & Conditions.
                        </p>

                    </section>


                    {{-- 2 --}}
                    <section id="acceptance">

                        <h2 class="text-2xl font-bold text-gray-900">
                            2. Acceptance of Terms
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            By using Haatify, you agree to comply with
                            these Terms & Conditions and all applicable
                            laws and regulations.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            If you do not agree with any part of these
                            terms, you should not use the Haatify
                            platform or services.
                        </p>

                    </section>


                    {{-- 3 --}}
                    <section id="account">

                        <h2 class="text-2xl font-bold text-gray-900">
                            3. User Accounts
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Some Haatify features require you to create
                            an account.
                        </p>

                        <h3 class="mt-6 font-semibold text-gray-900">
                            You agree to:
                        </h3>

                        <ul class="mt-3 space-y-2 text-gray-600 list-disc pl-6">
                            <li>Provide accurate and complete information.</li>
                            <li>Keep your account information updated.</li>
                            <li>Protect your password and login credentials.</li>
                            <li>Notify Haatify of unauthorized account access.</li>
                            <li>Use your account only for lawful purposes.</li>
                        </ul>

                        <p class="mt-4 text-gray-600 leading-7">
                            You are responsible for activities performed
                            through your account.
                        </p>

                    </section>


                    {{-- 4 --}}
                    <section id="products">

                        <h2 class="text-2xl font-bold text-gray-900">
                            4. Products & Product Information
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify attempts to provide accurate product
                            names, descriptions, images, prices,
                            availability, and other product information.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            However, product images may appear slightly
                            different from the actual product because of
                            photography, lighting, screen settings, or
                            manufacturer changes.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Product availability may change without
                            prior notice.
                        </p>

                    </section>


                    {{-- 5 --}}
                    <section id="orders">

                        <h2 class="text-2xl font-bold text-gray-900">
                            5. Orders
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            When you place an order through Haatify, you
                            are submitting a request to purchase the
                            selected products.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify may accept, reject, or cancel an
                            order for reasons including product
                            unavailability, incorrect pricing,
                            suspected fraudulent activity, or other
                            operational issues.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            An order confirmation does not necessarily
                            guarantee that every product will remain
                            available until shipment.
                        </p>

                    </section>


                    {{-- 6 --}}
                    <section id="pricing">

                        <h2 class="text-2xl font-bold text-gray-900">
                            6. Pricing & Payments
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Product prices are displayed on Haatify at
                            the time of purchase.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Prices may change from time to time. Changes
                            in price will generally not affect an order
                            that has already been successfully confirmed,
                            except where correction of an obvious
                            pricing error is required.
                        </p>

                        <h3 class="mt-6 font-semibold text-gray-900">
                            Payment methods
                        </h3>

                        <ul class="mt-3 space-y-2 text-gray-600 list-disc pl-6">
                            <li>Cash on Delivery</li>
                            <li>eSewa</li>
                            <li>Khalti</li>
                            <li>Bank Transfer</li>
                            <li>Other payment methods provided by Haatify</li>
                        </ul>

                        <p class="mt-4 text-gray-600 leading-7">
                            You agree to provide valid payment
                            information when required.
                        </p>

                    </section>


                    {{-- 7 --}}
                    <section id="delivery">

                        <h2 class="text-2xl font-bold text-gray-900">
                            7. Delivery
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify will attempt to deliver orders to the
                            shipping address provided during checkout.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Delivery times may vary depending on
                            location, product availability, weather,
                            transportation, holidays, and other
                            circumstances.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Customers are responsible for providing a
                            correct and complete delivery address and
                            contact information.
                        </p>

                    </section>


                    {{-- 8 --}}
                    <section id="cancellation">

                        <h2 class="text-2xl font-bold text-gray-900">
                            8. Order Cancellation
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Customers may request cancellation of an
                            order before it has been shipped, subject to
                            Haatify's cancellation procedures.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Orders that have already been shipped may not
                            be eligible for cancellation and may instead
                            be subject to the applicable return policy.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify may cancel an order when a product is
                            unavailable, payment cannot be completed,
                            incorrect information is provided, or
                            fraudulent or abusive activity is suspected.
                        </p>

                    </section>


                    {{-- 9 --}}
                    <section id="returns">

                        <h2 class="text-2xl font-bold text-gray-900">
                            9. Returns & Refunds
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Returns and refunds are subject to Haatify's
                            applicable return and refund policy and the
                            conditions associated with the specific
                            product.
                        </p>

                        <h3 class="mt-6 font-semibold text-gray-900">
                            A return may require:
                        </h3>

                        <ul class="mt-3 space-y-2 text-gray-600 list-disc pl-6">
                            <li>Proof of purchase or order information.</li>
                            <li>The product to be returned within the applicable period.</li>
                            <li>The product to meet applicable return conditions.</li>
                            <li>Original accessories, packaging, or documentation where required.</li>
                        </ul>

                        <p class="mt-4 text-gray-600 leading-7">
                            Refund timing may depend on the payment
                            method and the processing time of the
                            relevant payment provider.
                        </p>

                    </section>


                    {{-- 10 --}}
                    <section id="reviews">

                        <h2 class="text-2xl font-bold text-gray-900">
                            10. Product Reviews & User Content
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Users may be allowed to submit reviews,
                            ratings, comments, images, or other content.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            You must not submit content that is
                            fraudulent, abusive, misleading, unlawful,
                            offensive, defamatory, or unrelated to the
                            product.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify may remove content that violates
                            these Terms & Conditions or applicable
                            policies.
                        </p>

                    </section>


                    {{-- 11 --}}
                    <section id="vendors">

                        <h2 class="text-2xl font-bold text-gray-900">
                            11. Vendors & Marketplace Products
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify may allow independent vendors to list
                            and sell products through the platform.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Vendors are responsible for providing accurate
                            product information and complying with
                            applicable laws, marketplace requirements,
                            and Haatify policies.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify may review, suspend, remove, or
                            restrict vendor listings or accounts when
                            necessary.
                        </p>

                    </section>


                    {{-- 12 --}}
                    <section id="prohibited">

                        <h2 class="text-2xl font-bold text-gray-900">
                            12. Prohibited Activities
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            You must not use Haatify to:
                        </p>

                        <ul class="mt-4 space-y-3 text-gray-600 list-disc pl-6">
                            <li>Commit or facilitate unlawful activities.</li>
                            <li>Provide false or misleading information.</li>
                            <li>Attempt to access another user's account.</li>
                            <li>Interfere with the operation or security of the platform.</li>
                            <li>Use automated systems to abuse the service.</li>
                            <li>Submit fraudulent orders.</li>
                            <li>Attempt payment fraud or unauthorized transactions.</li>
                            <li>Upload malicious software or harmful code.</li>
                            <li>Abuse promotions, coupons, or referral programs.</li>
                            <li>Infringe another person's intellectual property rights.</li>
                        </ul>

                    </section>


                    {{-- 13 --}}
                    <section id="intellectual">

                        <h2 class="text-2xl font-bold text-gray-900">
                            13. Intellectual Property
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify's website design, branding, logos,
                            text, graphics, software, and other original
                            materials may be protected by applicable
                            intellectual property laws.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            You may not copy, reproduce, modify,
                            distribute, sell, or commercially exploit
                            Haatify's proprietary content without
                            appropriate permission.
                        </p>

                    </section>


                    {{-- 14 --}}
                    <section id="privacy">

                        <h2 class="text-2xl font-bold text-gray-900">
                            14. Privacy
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify may collect and process information
                            necessary to provide accounts, orders,
                            payments, delivery, customer support, and
                            other platform services.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Personal information should be handled in
                            accordance with Haatify's Privacy Policy and
                            applicable laws.
                        </p>

                    </section>


                    {{-- 15 --}}
                    <section id="liability">

                        <h2 class="text-2xl font-bold text-gray-900">
                            15. Limitation of Liability
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify will make reasonable efforts to keep
                            the platform available and information
                            accurate. However, uninterrupted availability
                            cannot be guaranteed.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify may not be responsible for delays or
                            failures caused by circumstances outside its
                            reasonable control, including network
                            failures, transportation disruptions,
                            natural events, technical problems, or
                            third-party service interruptions.
                        </p>

                    </section>


                    {{-- 16 --}}
                    <section id="changes">

                        <h2 class="text-2xl font-bold text-gray-900">
                            16. Changes to These Terms
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            Haatify may update these Terms & Conditions
                            from time to time to reflect changes in our
                            services, policies, technology, or legal
                            requirements.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Updated terms will be published on this page
                            with a revised "Last updated" date.
                        </p>

                        <p class="mt-4 text-gray-600 leading-7">
                            Continued use of Haatify after an update may
                            constitute acceptance of the revised terms,
                            to the extent permitted by applicable law.
                        </p>

                    </section>


                    {{-- 17 --}}
                    <section id="contact">

                        <h2 class="text-2xl font-bold text-gray-900">
                            17. Contact Haatify
                        </h2>

                        <p class="mt-4 text-gray-600 leading-7">
                            If you have questions about these Terms &
                            Conditions, you can contact Haatify Support.
                        </p>

                        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">

                            <div class="border border-gray-200 rounded-xl p-5">
                                <div class="w-10 h-10 rounded-lg bg-orange-100
                                            text-orange-600 flex items-center
                                            justify-center mb-4">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>

                                <p class="text-sm text-gray-500">
                                    Email
                                </p>

                                <p class="font-semibold text-gray-900 mt-1">
                                    support@haatify.com
                                </p>
                            </div>


                            <div class="border border-gray-200 rounded-xl p-5">
                                <div class="w-10 h-10 rounded-lg bg-orange-100
                                            text-orange-600 flex items-center
                                            justify-center mb-4">
                                    <i class="fa-solid fa-phone"></i>
                                </div>

                                <p class="text-sm text-gray-500">
                                    Phone
                                </p>

                                <p class="font-semibold text-gray-900 mt-1">
                                    +977-9800000000
                                </p>
                            </div>


                            <div class="border border-gray-200 rounded-xl p-5">
                                <div class="w-10 h-10 rounded-lg bg-orange-100
                                            text-orange-600 flex items-center
                                            justify-center mb-4">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>

                                <p class="text-sm text-gray-500">
                                    Location
                                </p>

                                <p class="font-semibold text-gray-900 mt-1">
                                    Kathmandu, Nepal
                                </p>
                            </div>

                        </div>

                    </section>


                    {{-- Agreement Notice --}}
                    <div class="border border-orange-200
                                bg-orange-50 rounded-2xl p-6">

                        <div class="flex items-start gap-4">

                            <div class="w-10 h-10 rounded-full
                                        bg-orange-500 text-white
                                        flex items-center justify-center
                                        shrink-0">
                                <i class="fa-solid fa-circle-info"></i>
                            </div>

                            <div>
                                <h3 class="font-bold text-gray-900">
                                    Important Notice
                                </h3>

                                <p class="mt-2 text-sm text-gray-700 leading-6">
                                    These Terms & Conditions are provided
                                    as a general website template for
                                    Haatify. Before launching a real
                                    ecommerce business, have the terms,
                                    refund policy, privacy policy, vendor
                                    agreement, and other legal documents
                                    reviewed and adapted to the laws and
                                    regulations applicable to your
                                    business.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </main>

        </div>

    </div>

</div>

@endsection