<!-- Navigation -->
<nav
    class="fixed top-0 z-50 w-full bg-gradient-to-r from-blue-600 via-amber-500 to-orange-400 shadow-lg border-b border-amber-200 dark:bg-gradient-to-r dark:from-blue-900 dark:via-amber-700 dark:to-orange-600 dark:border-amber-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <!-- Mobile menu button -->
                <button id="sidebar-toggle" type="button"
                    class="inline-flex items-center p-2 text-white rounded-lg sm:hidden hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>

                <!-- Logo and title -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center ms-2 md:me-24">
                    <img src="{{ asset('assets/icon/jogfood.png') }}" class="h-8 me-3 drop-shadow" alt="Jogfood" />
                    <span
                        class="self-center text-lg font-semibold sm:text-xl lg:text-2xl whitespace-nowrap text-white hidden xs:block drop-shadow">
                        Selamat Datang, Admin
                    </span>
                </a>
            </div>

            <!-- Right side - Notification -->
            <div class="flex items-center">
                <button type="button"
                    class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-white/80 hover:bg-blue-100 focus:outline-none shadow">
                    <i class="fas fa-bell text-blue-600 text-sm sm:text-base"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gradient-to-b from-blue-600 via-amber-500 to-orange-400 border-r border-amber-200 sm:translate-x-0 dark:bg-gradient-to-b dark:from-blue-900 dark:via-amber-700 dark:to-orange-600 dark:border-amber-700 shadow-lg">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-transparent">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-white rounded-lg group transition
                   {{ request()->routeIs('admin.dashboard') ? 'bg-orange-600/80 shadow' : 'hover:bg-orange-600/80' }}">
                    <i class="fas fa-table w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.data') }}" class="flex items-center p-2 text-white rounded-lg group transition
                   {{ request()->routeIs('admin.data') ? 'bg-orange-600/80 shadow' : 'hover:bg-orange-600/80' }}">
                    <i class="fas fa-user-gear w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Profile Admin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pages.admin.tblmenu', ['kategori' => 'Daftar Kuliner']) }}" class="flex items-center p-2 text-white rounded-lg group transition
                   {{ request()->is('tblmenu*') ? 'bg-orange-600/80 shadow' : 'hover:bg-orange-600/80' }}">
                    <i class="fas fa-utensils w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Daftar Kuliner</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order') }}" class="flex items-center p-2 text-white rounded-lg group transition
                   {{ request()->routeIs('admin.order') ? 'bg-orange-600/80 shadow' : 'hover:bg-orange-600/80' }}">
                    <i
                        class="fas fa-boxes-stacked w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Pesanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengiriman') }}"
                    class="flex items-center p-2 text-white rounded-lg group transition
                   {{ request()->routeIs('admin.pengiriman') ? 'bg-orange-600/80 shadow' : 'hover:bg-orange-600/80' }}">
                    <i class="fas fa-truck w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Pengiriman</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="flex items-center p-2 text-white rounded-lg group transition
                   {{ request()->routeIs('users.index') ? 'bg-orange-600/80 shadow' : 'hover:bg-orange-600/80' }}">
                    <i class="fas fa-users w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Data User</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kurir') }}" class="flex items-center p-2 text-white rounded-lg group transition
                   {{ request()->routeIs('admin.kurir') ? 'bg-orange-600/80 shadow' : 'hover:bg-orange-600/80' }}">
                    <i class="fas fa-users w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Data Kurir</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-600/80 group">
                        <i
                            class="fas fa-right-from-bracket w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                        <span class="ms-3">Sign Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>

<!-- Backdrop for mobile -->
<div id="sidebar-backdrop" class="fixed inset-0 z-30 bg-gray-900 bg-opacity-50 hidden sm:hidden"></div>

<script>
    // Mobile sidebar toggle functionality
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebar = document.getElementById('logo-sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        backdrop.classList.toggle('hidden');
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        backdrop.classList.add('hidden');
    }

    sidebarToggle.addEventListener('click', toggleSidebar);
    backdrop.addEventListener('click', closeSidebar);

    // Close sidebar when clicking on a link (mobile only)
    const sidebarLinks = sidebar.querySelectorAll('a, button');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 640) { // sm breakpoint
                closeSidebar();
            }
        });
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 640) { // sm breakpoint
            closeSidebar();
        }
    });
</script>