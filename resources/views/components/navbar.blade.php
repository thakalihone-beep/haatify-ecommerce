<header class="bg-[#131921] text-white shadow-md py-3">
    <!-- ==================== MAIN NAVBAR ==================== -->
    <nav class=" ">

        <div class="lg:flex items-center w-full h-14 px-8 lg:px-12 gap-1">
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
                    class="flex flex-col justify-center h-12 px-3
               border border-transparent hover:border-white
               rounded-sm cursor-pointer whitespace-nowrap">

                    <button type="button" class="flex flex-col justify-center items-start h-full">

                        @auth
                            <span class="text-xs text-gray-300 leading-none">
                                Hello, {{ Str::words(Auth::user()->name, 1, '') }}
                            </span>
                            <span class="flex items-center text-sm font-bold leading-tight mt-1">
                                Account
                                <i class="fa-solid fa-caret-down text-[11px] ml-1"></i>
                            </span>
                        @else
                            <span class="text-xs text-gray-300 leading-none">
                                Hello, sign in
                            </span>
                            <span class="flex items-center text-sm font-bold leading-tight mt-1">
                                Account
                                <i class="fa-solid fa-caret-down text-[11px] ml-1"></i>
                            </span>
                        @endauth

                    </button>


                    <!-- ================= DROPDOWN ================= -->
                    <div
                        class="absolute right-0 top-full mt-1 hidden group-hover:block
                   w-[320px] bg-white text-gray-900
                   rounded-md shadow-2xl border border-gray-200 z-50">

                        <!-- Arrow -->
                        <div
                            class="absolute -top-2 right-8
                       w-4 h-4 bg-white
                       border-l border-t border-gray-200
                       rotate-45">
                        </div>


                        @auth
                            {{-- ===== LOGGED IN DROPDOWN ===== --}}

                            <!-- User Info Header -->
                            <div class="relative px-6 py-5 border-b border-gray-100 flex items-center gap-4">

                                {{-- Avatar --}}
                                @if (Auth::user()->avatar)
                                    <img src="{{ Auth::user()->avatar }}"
                                         alt="{{ Auth::user()->name }}"
                                         class="w-12 h-12 rounded-full object-cover border-2 border-orange-300">
                                @else
                                    <div class="w-12 h-12 rounded-full bg-orange-400 text-gray-900
                                                flex items-center justify-center text-lg font-bold">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                @endif

                                <div class="min-w-0">
                                    <p class="text-sm font-bold text-gray-900 truncate">
                                        {{ Auth::user()->name }}
                                    </p>
                                    <p class="text-xs text-gray-500 truncate">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>

                            </div>

                            <!-- Menu Items -->
                            <div class="px-4 py-3 space-y-1">

                                <!-- My Orders -->
                                <a href="#"
                                    class="flex items-center gap-3 w-full px-4 py-2.5 rounded-lg hover:bg-gray-100 transition">
                                    <i class="fa-solid fa-box-open w-5 text-center text-gray-500"></i>
                                    <span class="text-sm font-medium">My Orders</span>
                                </a>

                                <!-- Account Settings -->
                                <a href="#"
                                    class="flex items-center gap-3 w-full px-4 py-2.5 rounded-lg hover:bg-gray-100 transition">
                                    <i class="fa-solid fa-gear w-5 text-center text-gray-500"></i>
                                    <span class="text-sm font-medium">Account Settings</span>
                                </a>

                                <!-- Wishlist -->
                                <a href="#"
                                    class="flex items-center gap-3 w-full px-4 py-2.5 rounded-lg hover:bg-gray-100 transition">
                                    <i class="fa-solid fa-heart w-5 text-center text-gray-500"></i>
                                    <span class="text-sm font-medium">Wishlist</span>
                                </a>

                            </div>

                            <!-- Logout -->
                            <div class="px-4 pb-4 border-t border-gray-100 pt-3">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center gap-3 w-full px-4 py-2.5 rounded-lg
                                               text-red-600 hover:bg-red-50 transition">
                                        <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                                        <span class="text-sm font-medium">Sign Out</span>
                                    </button>
                                </form>
                            </div>

                        @else
                            {{-- ===== GUEST DROPDOWN ===== --}}

                            <!-- Authentication Section -->
                            <div class="relative px-6 py-6">

                                <!-- Login -->
                                <a href="{{ route('login') }}"
                                    class="flex items-center gap-4
                               w-full px-4 py-3
                               rounded-lg
                               hover:bg-gray-100
                               transition">

                                    <div
                                        class="w-10 h-10 flex items-center justify-center
                                   rounded-full bg-gray-900 text-white">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold">Login</p>
                                        <p class="text-xs text-gray-500">Sign in to your account</p>
                                    </div>

                                </a>


                                <!-- Sign Up -->
                                <a href="{{ route('register') }}"
                                    class="flex items-center gap-4
                               w-full px-4 py-3 mt-2
                               rounded-lg
                               hover:bg-gray-100
                               transition">

                                    <div
                                        class="w-10 h-10 flex items-center justify-center
                                   rounded-full bg-gray-100 text-gray-900">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold">Sign Up</p>
                                        <p class="text-xs text-gray-500">Create a new customer account</p>
                                    </div>

                                </a>


                                <!-- Divider -->
                                <div class="border-t border-gray-200 my-4"></div>


                                <!-- Vendor Signup -->
                                <a href="{{ route('vendor.register') }}"
                                    class="flex items-center gap-4
                               w-full px-4 py-3
                               rounded-lg
                               bg-orange-50
                               hover:bg-orange-100
                               transition">

                                    <div
                                        class="w-10 h-10 flex items-center justify-center
                                   rounded-full bg-orange-400 text-gray-900">
                                        <i class="fa-solid fa-store"></i>
                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Sign Up as Vendor</p>
                                        <p class="text-xs text-gray-600">Start selling on Haatify</p>
                                    </div>

                                </a>

                            </div>

                            <!-- Bottom Info -->
                            <div class="px-6 py-3 bg-gray-50 border-t border-gray-200 rounded-b-md">
                                <p class="text-xs text-center text-gray-500">
                                    Shop with us or start your own store.
                                </p>
                            </div>

                        @endauth

                    </div>

                </div>

            </div>



            <!-- Orders -->
            <div
                class="flex flex-col justify-center h-12 px-3 border border-transparent hover:border-white rounded-sm cursor-pointer whitespace-nowrap">

                <span class="text-xs text-gray-200 leading-none">Returns</span>
                <span class="text-sm font-bold leading-tight mt-1">& Orders</span>

            </div>


            <!-- Cart -->
            <div
                class="flex items-center h-12 px-3 py-1 border border-transparent hover:border-white rounded-sm cursor-pointer whitespace-nowrap">

                <i class="fa-solid fa-cart-shopping text-3xl mr-1"></i>
                <span class="text-sm font-bold mb-1">Cart</span>

            </div>
        </div>

    </nav>

</header>
