<nav class="fixed top-0 z-50 w-full bg-amber-600 border-b border-amber-200 dark:bg-amber-800 dark:border-amber-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3 bg-amber-600">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="flex ms-2 md:me-24">
                    <img src="assets/icon/jogfood.png" class="h-8 me-3" alt="Jogfood" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Selamat
                        Datang, Admin</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <button type="button"
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-amber-100 hover:bg-amber-200 focus:outline-none me-3">
                        <i class="fas fa-bell text-amber-600"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white shadow-lg">
    <div class="h-full px-3 py-4 overflow-y-auto bg-amber-600">
        <div class="flex items-center ps-2.5 mb-8 mt-2">
            <img src="" alt="Logo" class="mr-4">
        </div>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 text-white rounded-lg bg-amber-700 group">
                    <i class="fas fa-table w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.data') }}"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                    <i class="fas fa-user-gear w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Profile Restoran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pages.admin.tblmenu', ['kategori' => 'Makanan']) }}"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                    <i class="fas fa-utensils w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Makanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pages.admin.tblmenu', ['kategori' => 'Minuman']) }}"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                    <i class="fas fa-wine-glass w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Minuman</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pages.admin.tblmenu', ['kategori' => 'Side Dish']) }}"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                    <i class="fas fa-cookie-bite w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Camilan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.order') }}"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                    <i
                        class="fas fa-boxes-stacked w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Pesanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.rekap') }}"
                    class="flex items-center p-2 text-white rounded-lg hover:bg-amber-700 group">
                    <i class="fas fa-chart-line w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                    <span class="ms-3">Rekap Penjualan</span>
                </a>
            </li>
            <li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full p-2 text-white rounded-lg hover:bg-amber-700 group">
                        <i
                            class="fas fa-right-from-bracket w-5 h-5 text-white transition duration-75 group-hover:text-white"></i>
                        <span class="ms-3">Sign Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>