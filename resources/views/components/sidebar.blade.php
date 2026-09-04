<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black/50 hidden z-40">
</div>


<!-- Sidebar -->
<aside id="sidebar"
    class="fixed left-0 top-0 w-72 h-screen
           bg-white shadow-xl
           -translate-x-full transition-transform duration-300 z-50">

    <!-- Sidebar Header -->
    <div class="h-16 bg-[#00013a] text-white flex justify-center items-center px-5">

        <i class="fa-regular fa-circle-user text-2xl"></i>

        <span class="ml-4 text-2xl font-bold">
            Hello, sign in
        </span>

    </div>

    <!-- Categories -->
    <div class="text-black">

        <div class="bg-[#fcfbfb] font-bold px-5 py-4 border-b-2">
            All Categories
        </div>

        <div>
            @foreach ($categories as $category)
                <a href="{{ route('categories.show', $category->slug) }}" class="block px-5 py-3 hover:bg-gray-100">
                    {{ $category->name }}
                </a>

            @endforeach

        </div>

    </div>

</aside>


<script>
    const menuButton = document.getElementById('menuButton');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    // Open sidebar
    menuButton.addEventListener('click', function() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    });

    // Close sidebar when clicking outside
    overlay.addEventListener('click', function() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
</script>
