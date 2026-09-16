<footer class="bg-gray-900 text-white mt-10">

    {{-- Back to Top --}}
    <div class="bg-gray-800 hover:bg-gray-700 text-center py-4 cursor-pointer">
        <a href="#" class="text-sm font-medium">
            Back to top
        </a>
    </div>


    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- Haatify --}}
            <div>
                <h3 class="text-xl font-bold text-orange-500 mb-4">
                    Haatify
                </h3>

                <p class="text-gray-400 text-sm leading-6">
                    Haatify is a Nepal-focused online marketplace where
                    customers can discover and shop products from different
                    sellers in one place.
                </p>

                <div class="flex gap-4 mt-5">

                    <a href="#"
                       class="text-gray-400 hover:text-white text-xl">
                        <i class="fa-brands fa-facebook"></i>
                    </a>

                    <a href="#"
                       class="text-gray-400 hover:text-white text-xl">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#"
                       class="text-gray-400 hover:text-white text-xl">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <a href="#"
                       class="text-gray-400 hover:text-white text-xl">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                </div>
            </div>


            {{-- Customer Service --}}
            <div>
                <h3 class="text-lg font-bold mb-4">
                    Customer Service
                </h3>

                <ul class="space-y-3 text-sm text-gray-400">

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Help Center
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Contact Us
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Track Your Order
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Returns & Refunds
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Shipping Information
                        </a>
                    </li>

                </ul>
            </div>


            {{-- About Haatify --}}
            <div>
                <h3 class="text-lg font-bold mb-4">
                    About Haatify
                </h3>

                <ul class="space-y-3 text-sm text-gray-400">

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Become a Seller
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Careers
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Privacy Policy
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Terms & Conditions
                        </a>
                    </li>

                </ul>
            </div>


            {{-- Payment & Delivery --}}
            <div>
                <h3 class="text-lg font-bold mb-4">
                    Shop With Us
                </h3>

                <ul class="space-y-3 text-sm text-gray-400">

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Your Account
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Your Orders
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-white hover:underline">
                            Wishlist
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('cart.index') }}"
                           class="hover:text-white hover:underline">
                            Cart
                        </a>
                    </li>

                </ul>

                <div class="mt-6">

                    <p class="text-sm font-semibold mb-2">
                        We Deliver Across Nepal 🇳🇵
                    </p>

                    <p class="text-xs text-gray-400">
                        Secure shopping, reliable delivery and
                        convenient payment options.
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Footer Divider --}}
    <div class="border-t border-gray-700"></div>


    {{-- Bottom Footer --}}
    <div class="max-w-7xl mx-auto px-6 py-6">

        <div class="flex flex-col md:flex-row
                    items-center justify-between gap-4">

            <p class="text-sm text-gray-400">
                © {{ date('Y') }} Haatify. All rights reserved.
            </p>

            <div class="flex items-center gap-5 text-sm text-gray-400">

                <a href="#" class="hover:text-white">
                    Privacy
                </a>

                <a href="#" class="hover:text-white">
                    Terms
                </a>

                <a href="#" class="hover:text-white">
                    Cookies
                </a>

            </div>

        </div>

    </div>

</footer>

