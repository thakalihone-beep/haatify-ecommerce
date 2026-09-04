<header class="bg-[#131921] text-white shadow-md py-4">

    <!-- ==================== MAIN NAVBAR ==================== -->
    <nav class=" ">

        <div class="lg:flex items-center w-full h-16 px-8 lg:px-12 gap-1">
            <!-- Logo -->
            <div class="flex items-center h-12 px-3 border border-transparent hover:border-white rounded-sm">
                <a href="/" class="text-2xl font-bold tracking-tight whitespace-nowrap">
                    Haatify
                </a>
            </div>


            <!-- Location -->
            <div
                class="flex items-center h-12 px-3 border border-transparent hover:border-white rounded-sm cursor-pointer whitespace-nowrap">

                <i class="fa-solid fa-location-dot text-lg mr-1"></i>

                <div class="flex flex-col justify-center leading-tight">
                    <span class="text-xs text-gray-300">
                        Deliver to
                    </span>

                    <span class="text-sm font-bold">
                        Nepal
                    </span>
                </div>

            </div>


            <!-- ==================== SEARCH ==================== -->
            <div class="flex flex-1 h-10 mx-2 min-w-0">

                <!-- Category Button -->
                <div class="relative group shrink-0">

                    <button type="button"
                        class="flex items-center gap-1 h-10 px-4 bg-gray-100 text-gray-700 text-sm rounded-l-md hover:bg-gray-200 border-r border-gray-300">

                        <span>All</span>

                        <i class="fa-solid fa-caret-down text-xs"></i>

                    </button>

                    <!--DROPDOWN HERE-->
                    <div
                        class="absolute top-full left-0 w-52 bg-white text-gray-900 rounded-b-md shadow-lg mt-1 hidden group-hover:block z-50">

                        <ul class="py-2">

                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('categories.show', $category->slug) }}"
                                        class="block px-4 py-2 hover:bg-gray-100">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>


                <!-- Search Form -->
                <form action="" class="flex flex-1 min-w-0">

                    <input type="text" placeholder="Search for products, brands and more"
                        class="flex-1 min-w-0 px-4 text-gray-900 bg-white outline-none focus:ring-2 focus:ring-orange-400 placeholder-gray-500">

                    <button type="submit"
                        class="flex items-center justify-center w-14 bg-[#febd69] text-gray-900 rounded-r-md hover:bg-[#f3a847] transition">

                        <i class="fa-solid fa-search text-lg"></i>

                    </button>

                </form>

            </div>


            <!-- Language -->
            <div class="relative group">

                <!-- Language Button -->
                <div
                    class="flex items-center h-12 px-3
               border border-transparent
               hover:border-white
               rounded-sm
               cursor-pointer
               whitespace-nowrap
               transition">

                    <button type="button" class="flex items-center text-white">

                        <i class="fa-solid fa-globe text-sm mr-2"></i>

                        <span class="text-sm font-bold">
                            EN
                        </span>

                        <i class="fa-solid fa-caret-down text-[10px] ml-2"></i>
                    </button>


                    <!-- Dropdown -->
                    <div
                        class="absolute hidden group-hover:block
                   top-full left-0 mt-1
                   w-48
                   bg-white
                   text-gray-800
                   rounded-md
                   shadow-2xl
                   border border-gray-200
                   z-50">

                        <!-- Arrow -->
                        <div
                            class="absolute -top-2 left-5
                       w-4 h-4
                       bg-white
                       border-l border-t border-gray-200
                       rotate-45">
                        </div>


                        <!-- Header -->
                        <div class="relative px-4 py-3 border-b border-gray-200">
                            <p class="text-xs text-gray-500">
                                Language
                            </p>

                            <p class="text-sm font-bold mt-1">
                                Select your language
                            </p>
                        </div>


                        <!-- Languages -->
                        <div class="py-2">

                            <!-- Selected -->
                            <button
                                class="flex items-center justify-between
                           w-full px-4 py-2.5
                           text-sm
                           bg-gray-50
                           hover:bg-gray-100
                           transition">

                                <span class="flex items-center gap-3">
                                    <span class="text-lg">🇬🇧</span>
                                    English
                                </span>

                                <i class="fa-solid fa-check text-green-600 text-xs"></i>
                            </button>


                            <button
                                class="flex items-center gap-3
                           w-full px-4 py-2.5
                           text-sm
                           hover:bg-gray-100
                           transition">

                                <span class="text-lg">🇳🇵</span>
                                Nepali
                            </button>


                            <button
                                class="flex items-center gap-3
                           w-full px-4 py-2.5
                           text-sm
                           hover:bg-gray-100
                           transition">

                                <span class="text-lg">🇪🇸</span>
                                Spanish
                            </button>


                            <button
                                class="flex items-center gap-3
                           w-full px-4 py-2.5
                           text-sm
                           hover:bg-gray-100
                           transition">

                                <span class="text-lg">🇫🇷</span>
                                French
                            </button>

                        </div>


                        <!-- Footer -->
                        <div class="border-t border-gray-200 px-4 py-3">

                            <button
                                class="text-xs text-blue-600
                           hover:text-orange-500
                           hover:underline">
                                Language settings
                            </button>

                        </div>

                    </div>

                </div>
            </div>


            <!-- Account -->
            <div class="relative group">
                <!-- Account Button -->
                <div
                    class="flex flex-col justify-center h-12 px-3 border border-transparent hover:border-white rounded-sm cursor-pointer whitespace-nowrap">

                    <button type="button" class="flex flex-col justify-center items-start h-full">

                        <span class="text-xs text-gray-300 leading-none">
                            Hello, sign in
                        </span>

                        <span class="flex items-center text-sm font-bold leading-tight mt-1">
                            Account & Lists
                            <i class="fa-solid fa-caret-down text-[11px] ml-1"></i>
                        </span>

                    </button>

                    <!-- Dropdown -->
                    <div
                        class="absolute right-0 top-full mt-1 hidden group-hover:block w-[420px] bg-white text-gray-900 rounded-md shadow-2xl border border-gray-200 z-50">

                        <!-- Arrow -->
                        <div
                            class="absolute -top-2 right-8
                       w-4 h-4 bg-white
                       border-l border-t border-gray-200
                       rotate-45">
                        </div>

                        <!-- Sign In Section -->
                        <div class="relative bg-gray-50 border-b border-gray-200 px-6 py-4 text-center">

                            <button type="button"
                                class="w-48 bg-orange-400 hover:bg-orange-500
                           text-gray-900 font-semibold
                           py-2 rounded-md
                           shadow-sm transition">
                                Sign in
                            </button>

                            <p class="text-xs text-gray-500 mt-2">
                                New customer?
                                <a href="#" class="text-blue-600 hover:underline">
                                    Start here.
                                </a>
                            </p>
                        </div>

                        <!-- Dropdown Content -->
                        <div class="grid grid-cols-2 gap-6 p-6">

                            <!-- Your Lists -->
                            <div>
                                <h3 class="text-sm font-bold mb-3">
                                    Your Lists
                                </h3>

                                <ul class="space-y-2 text-sm text-gray-600">
                                    <li>
                                        <a href="#" class="hover:text-orange-500 hover:underline">
                                            Create a List
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="hover:text-orange-500 hover:underline">
                                            Your Wishlist
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="hover:text-orange-500 hover:underline">
                                            Your Saved Items
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Your Account -->
                            <div class="border-l border-gray-200 pl-6">
                                <h3 class="text-sm font-bold mb-3">
                                    Your Account
                                </h3>

                                <ul class="space-y-2 text-sm text-gray-600">
                                    <li>
                                        <a href="#" class="hover:text-orange-500 hover:underline">
                                            Your Account
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="hover:text-orange-500 hover:underline">
                                            Your Orders
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="hover:text-orange-500 hover:underline">
                                            Your Addresses
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="hover:text-orange-500 hover:underline">
                                            Payment Methods
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
            </div>



            <!-- Orders -->
            <div
                class="flex flex-col justify-center h-12 px-3 border border-transparent hover:border-white rounded-sm cursor-pointer whitespace-nowrap">

                <span class="text-xs text-gray-200 leading-none">
                    Returns
                </span>

                <span class="text-sm font-bold leading-tight mt-1">
                    & Orders
                </span>

            </div>


            <!-- Cart -->
            <div
                class="flex items-center h-12 px-3 py-1 border border-transparent hover:border-white rounded-sm cursor-pointer whitespace-nowrap">

                <i class="fa-solid fa-cart-shopping text-3xl mr-1"></i>

                <span class="text-sm font-bold mb-1">
                    Cart
                </span>

            </div>
        </div>

    </nav>


    <!-- ==================== SECONDARY NAVBAR ==================== -->
    <div class="flex items-center h-10 px-5 lg:px-8 gap-7 bg-[#232f3e] text-sm font-medium">

        <!-- All -->
        <div class="text-white">
            <div class="flex items-center h-full px-6">

                <!-- Menu Button -->
                <button id="menuButton"
                    class="flex items-center gap-2 px-3 py-2
                   border border-transparent hover:border-white rounded h-9">
                    <i class="fa-solid fa-bars"></i>
                    <span>All</span>
                </button>

                <x-sidebar :categories="$categories" />

            </div>
        </div>


        <!-- Today's Deals -->
        <a href="#" class="flex items-center h-9 px-2 border border-transparent hover:border-white rounded-sm">

            Today's Deals

        </a>


        <!-- Best Sellers -->
        <a href="#" class="flex items-center h-9 px-2 border border-transparent hover:border-white rounded-sm">

            Best Sellers

        </a>


        <!-- New Arrivals -->
        <a href="#" class="flex items-center h-9 px-2 border border-transparent hover:border-white rounded-sm">

            New Arrivals

        </a>


        <!-- Today's Offers -->
        <a href="#"
            class="hidden md:flex items-center h-9 px-2 border border-transparent hover:border-white rounded-sm">

            Today's Offers

        </a>


        <!-- Customer Service -->
        <a href="#"
            class="hidden lg:flex items-center h-9 px-2 border border-transparent hover:border-white rounded-sm">

            Customer Service

        </a>

    </div>

</header>

<script>
    const [open, setOpen] = useState(true);
</script>
