<div id="overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-40 transition-opacity duration-300">
</div>


<!-- Sidebar -->
<aside id="sidebar"
    class="fixed left-0 top-0 w-80 max-w-[85vw] h-screen
           bg-white shadow-2xl
           -translate-x-full transition-transform duration-300
           z-50 flex flex-col">

    <!-- Sidebar Header -->
    <div class="h-20 shrink-0 bg-[#00013a] text-white
                flex items-center justify-between px-5">

        <div class="flex items-center min-w-0">

            @auth
                @if (Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                        class="w-10 h-10 rounded-full object-cover border-2 border-white/20">
                @else
                    <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-sm font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
            @else
                <div class="w-10 h-10 rounded-full bg-white/10
                            flex items-center justify-center">
                    <i class="fa-regular fa-circle-user text-2xl"></i>
                </div>
            @endauth

            <div class="ml-3 min-w-0">
                <p class="text-xs text-gray-300">
                    @auth
                        Welcome
                    @else
                        Welcome
                    @endauth
                </p>

                <span class="text-lg font-bold truncate block">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Hello, sign in
                    @endauth
                </span>
            </div>

        </div>


        <!-- Close Button -->
        <button id="closeSidebar" type="button"
            class="w-9 h-9 rounded-full
                   hover:bg-white/10
                   flex items-center justify-center
                   transition">

            <i class="fa-solid fa-xmark text-xl"></i>

        </button>

    </div>


    <!-- Scrollable Content -->
    <div class="flex-1 overflow-y-auto sidebar-scroll">

        <!-- Categories Header -->
        <div
            class="sticky top-0 z-10
                    bg-white border-b border-gray-200
                    px-5 py-4">

            <div class="flex items-center gap-3">

                <div
                    class="w-9 h-9 rounded-lg
                            bg-orange-100 text-orange-600
                            flex items-center justify-center">

                    <i class="fa-solid fa-list"></i>

                </div>

                <div>
                    <h2 class="font-bold text-gray-900">
                        All Categories
                    </h2>

                    <p class="text-xs text-gray-500">
                        Browse products
                    </p>
                </div>

            </div>

        </div>


        <!-- Category List -->
        <div class="py-2">

            @foreach ($categories as $category)
                <a href="{{ route('categories.show', $category->slug) }}"
                    class="group flex items-center justify-between
                           px-5 py-3.5
                           text-gray-700
                           hover:bg-orange-50
                           hover:text-orange-600
                           transition-all duration-200">

                    <div class="flex items-center gap-3">

                        <!-- Category Icon -->
                        <div
                            class="w-9 h-9 rounded-lg
                                    bg-gray-100
                                    group-hover:bg-orange-100
                                    flex items-center justify-center
                                    transition">

                            <i
                                class="fa-solid fa-tag
                                      text-sm
                                      text-gray-500
                                      group-hover:text-orange-600">
                            </i>

                        </div>


                        <!-- Category Name -->
                        <span class="font-medium">
                            {{ $category->name }}
                        </span>

                    </div>


                    <!-- Arrow -->
                    <i
                        class="fa-solid fa-chevron-right
                              text-xs text-gray-400
                              group-hover:text-orange-600
                              group-hover:translate-x-1
                              transition-all">
                    </i>

                </a>
            @endforeach

        </div>

    </div>


    <!-- Sidebar Footer -->
    <div class="shrink-0 border-t border-gray-200 bg-gray-50 p-4">

        <a href="{{ route('customer-service') }}"
            class="flex items-center gap-3
                   text-sm font-medium text-gray-700
                   hover:text-orange-600 transition">

            <div
                class="w-9 h-9 rounded-lg bg-white
                        border border-gray-200
                        flex items-center justify-center">

                <i class="fa-solid fa-circle-question"></i>

            </div>

            <span>
                Help & Customer Service
            </span>

        </a>

    </div>

</aside>


<!-- Custom Scrollbar -->
<style>
    .sidebar-scroll {
        scrollbar-width: thin;
        scrollbar-color: #d1d5db transparent;
    }

    .sidebar-scroll::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-scroll::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar-scroll::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 999px;
    }

    .sidebar-scroll::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }
</style>
