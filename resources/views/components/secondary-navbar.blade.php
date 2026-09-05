 <!-- ==================== SECONDARY NAVBAR ==================== -->
<div class="flex items-center h-10 px-5 lg:px-8 gap-7 bg-[#232f3e] text-sm font-medium">

    <!-- All -->
    <div class="text-white">
        <div class="flex items-center h-full px-6">

            <!-- Menu Button -->
            <button id="menuButton" type="button" aria-expanded="false" aria-controls="sidebar"
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
