<!-- Navigation -->
<nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-orange-300 via-orange-400 to-orange-600 shadow-lg border-b border-orange-200 transition-all duration-300">
    <div class="px-4 py-3 flex items-center justify-between">
        <div class="flex items-center">
            <!-- Mobile menu button -->
            <button id="sidebar-toggle" type="button"
                class="inline-flex items-center p-2 text-orange-600 bg-white rounded-lg sm:hidden hover:bg-orange-100 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all duration-200 shadow">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            <!-- Logo and title -->
            <a href="{{ route('kurir.dashboard') }}" class="flex items-center ms-3">
                <img src="{{ asset('assets/icon/jogfood.png') }}" class="h-10 w-10 me-3 rounded-full shadow border-2 border-white" alt="Jogfood" />
                <span class="self-center text-xl font-bold whitespace-nowrap text-orange-700 hidden xs:block drop-shadow tracking-wide">
                    Selamat Datang, Kurir
                </span>
            </a>
        </div>
        <!-- Right side - Notification & Avatar -->
        <div class="flex items-center gap-3">
            <button type="button"
                class="flex items-center justify-center w-10 h-10 rounded-full bg-white hover:bg-orange-100 focus:outline-none shadow border border-orange-200">
                <i class="fas fa-bell text-orange-600 text-lg"></i>
            </button>
            <!-- Avatar Kurir -->
            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center shadow border-2 border-white">
                <i class="fas fa-user text-orange-700 text-xl"></i>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-56 h-screen pt-20 bg-gradient-to-b from-orange-400 via-orange-500 to-orange-200 shadow-lg flex flex-col items-center transition-all">
    <div class="w-full flex flex-col gap-4 px-3">
        <a href="{{ route('kurir.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl shadow transition-all font-semibold
                {{ request()->routeIs('kurir.dashboard') ? 'bg-white text-orange-600' : 'bg-transparent text-white hover:bg-orange-300/40' }}">
            <i class="fas fa-th-large text-lg {{ request()->routeIs('kurir.dashboard') ? 'text-orange-600' : 'text-white' }}"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('kurir.order') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl shadow transition-all font-semibold
                {{ request()->routeIs('kurir.order') ? 'bg-white text-orange-600' : 'bg-transparent text-white hover:bg-orange-300/40' }}">
            <i class="fas fa-shipping-fast text-lg {{ request()->routeIs('kurir.order') ? 'text-orange-600' : 'text-white' }}"></i>
            <span>Daftar Pengiriman</span>
        </a>
        <a href="{{ route('kurir.data') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl shadow transition-all font-semibold
                {{ request()->routeIs('kurir.data') ? 'bg-white text-orange-600' : 'bg-transparent text-white hover:bg-orange-300/40' }}">
            <i class="fas fa-user text-lg {{ request()->routeIs('kurir.data') ? 'text-orange-600' : 'text-white' }}"></i>
            <span>Profil Kurir</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center gap-3 w-full px-4 py-3 rounded-xl shadow transition-all font-semibold
                    {{ request()->routeIs('logout') ? 'bg-white text-orange-600' : 'bg-transparent text-white hover:bg-orange-300/40' }}">
                <i class="fas fa-right-from-bracket text-lg {{ request()->routeIs('logout') ? 'text-orange-600' : 'text-white' }}"></i>
                <span>Sign Out</span>
            </button>
        </form>
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