<style>
	.hamburger.active svg {
		transform: rotate(90deg);
		transition: transform 0.3s ease;
	}

	.hamburger svg {
		transition: transform 0.3s ease;
	}
</style>
<div class="bg-amber-600 sticky top-0 z-50">
	<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 h-24">
		<!-- Logo -->
		<a href="{{ route('home') }}" class="flex items-center">
			<img src="{{ asset('assets/icon/jogfood.png') }}" class="h-8 mr-3" alt="Jogfood Logo">
		</a>

		<!-- Mobile menu button -->
		<div class="flex items-center space-x-3 md:hidden">
			<!-- Cart icon -->
			<a href="{{ route('keranjang.index') }}" class="flex items-center relative">
				<button type="button" class="flex text-white">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 98.89" fill="currentColor" class="w-9 h-9">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.72,92h119.43c0.94,0,1.72,0.79,1.72,1.72v3.44
        c0,0.93-0.78,1.72-1.72,1.72H1.72C0.78,98.89,0,98.12,0,97.17v-3.44C0,92.78,0.78,92,1.72,92L1.72,92z M66.4,19.73
        c31.57,2.52,56.4,25.25,56.4,57.47c0,2.62-0.17,5.19-0.48,7.72H0.57c-0.32-2.56-0.48-5.14-0.48-7.73
        c0-32.37,25.06-55.19,56.83-57.5V9.92h-9.68c-0.98,0-1.78-0.8-1.78-1.78V1.78c0-0.98,0.8-1.78,1.78-1.78h28.7
        c0.98,0,1.78,0.8,1.78,1.78v6.37c0,0.98-0.8,1.78-1.78,1.78H66.4V19.73L66.4,19.73z"/>
</svg>




					
					@if(isset($cartCount) && $cartCount > 0)
						<span
							class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5">
							{{ $cartCount }}
						</span>
					@endif
				</button>
			</a>

			<!-- Hamburger button -->
			<button id="mobile-menu-button" class="hamburger text-white" aria-label="Open main menu">
				<span class="sr-only">Open main menu</span>
				<svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
					viewBox="0 0 17 14">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M1 1h15M1 7h15M1 13h15" />
				</svg>
			</button>
		</div>

		<!-- Desktop Navigation menu -->
		<div class="hidden w-full md:block md:w-auto" id="navbar-default">
			<ul
				class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-amber-500 rounded-lg bg-amber-700 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
				<li>
					<a href="{{ route('home') }}"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Home</a>
				</li>
				<li>
					<a href="{{ route('menu.index', ['kategori' => 'Makanan']) }}"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Menu</a>
				</li>
				<li>
					<a href="{{ route('menu.index', ['kategori' => 'Minuman']) }}"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Minuman</a>
				</li>
				<li>
					<a href="{{ route('menu.index', ['kategori' => 'Side Dish']) }}"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Camilan</a>
				</li>
				<li>
					<a href="{{ route('about') }}"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Tentang
						Kita</a>
				</li>
			</ul>
		</div>

		<!-- Desktop User Actions Container -->
		<div class="hidden md:flex items-center space-x-3">
			<!-- Search input -->
			<div class="relative">
				<form action="{{ route('menu.index') }}" method="GET" class="flex">
					<input type="text" name="search" id="search-navbar"
						class="block w-full p-2 pl-10 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-amber-500 focus:border-amber-500"
						placeholder="Cari Kulinermu">
					<button type="submit"
						class="absolute right-0 top-0 mt-2 mr-3 text-gray-500 hover:text-gray-700 focus:outline-none">
						<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
							viewBox="0 0 20 20">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
						</svg>
					</button>
				</form>
			</div>
			<!-- Keranjang -->
			<a href="{{ route('keranjang.index') }}" class="flex items-center relative">
				<button type="button" class="flex text-white">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 98.89" fill="currentColor" class="w-9 h-9">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.72,92h119.43c0.94,0,1.72,0.79,1.72,1.72v3.44
        c0,0.93-0.78,1.72-1.72,1.72H1.72C0.78,98.89,0,98.12,0,97.17v-3.44C0,92.78,0.78,92,1.72,92L1.72,92z M66.4,19.73
        c31.57,2.52,56.4,25.25,56.4,57.47c0,2.62-0.17,5.19-0.48,7.72H0.57c-0.32-2.56-0.48-5.14-0.48-7.73
        c0-32.37,25.06-55.19,56.83-57.5V9.92h-9.68c-0.98,0-1.78-0.8-1.78-1.78V1.78c0-0.98,0.8-1.78,1.78-1.78h28.7
        c0.98,0,1.78,0.8,1.78,1.78v6.37c0,0.98-0.8,1.78-1.78,1.78H66.4V19.73L66.4,19.73z"/>
</svg>



					@if(isset($cartCount) && $cartCount > 0)
						<span
							class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5">
							{{ $cartCount }}
						</span>
					@endif
				</button>
			</a>
			<!-- Profile Dropdown -->
			<div class="relative">
				<button type="button" class="flex text-sm rounded-full" id="user-menu-button" aria-expanded="false">
					<span class="sr-only">Open user menu</span>

					<img class="w-9 h-9 rounded-full border-2 border-white"
						src="{{ asset('assets/img/profile/' . (session('foto') ? session('foto') : 'default.avif')) }}"
						alt="User Profile">
				</button>
				<div class="hidden absolute top-10 right-0 my-4 text-base list-none bg-amber-50 divide-y divide-gray-100 rounded-lg shadow w-56"
					id="user-dropdown">
					<div class="px-4 py-3">
						<span class="block text-base text-gray-900">{{ session('username', '-') }}</span>
						<span class="block text-base text-gray-500 truncate">ID : {{ session('user_id', '-') }}</span>
					</div>
					<ul class="py-2" aria-labelledby="user-menu-button">
						<li><a href="{{ route('profile') }}"
								class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Profile</a></li>
						<li><a href="{{ route('riwayat') }}"
								class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Riwayat</a></li>
						<li><a href="{{ route('detailpsn') }}"
								class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Pesanan</a></li>
						<li>
							<form method="POST" action="{{ route('logout') }}">
								@csrf
								<button type="submit"
									class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Sign out</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Mobile menu - HIDDEN BY DEFAULT -->
		<div id="mobile-menu" class="mobile-menu hidden w-full md:hidden bg-amber-700">
			<div class="px-2 pt-2 pb-3 space-y-1">
				<!-- Search input for mobile -->
				<div class="relative px-3 py-2">
					<div class="absolute inset-y-0 left-6 flex items-center pl-3 pointer-events-none">
						<svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
							fill="none" viewBox="0 0 20 20">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
						</svg>
					</div>
					<input type="text"
						class="block w-full p-2 pl-10 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-amber-500 focus:border-amber-500"
						placeholder="Cari Kulinermu">
				</div>

				<a href="{{ route('home') }}" class="block px-3 py-2 text-white rounded hover:bg-amber-500">Home</a>
				<a href="{{ route('menu.index', ['kategori' => 'Makanan']) }}"
					class="block px-3 py-2 text-white rounded hover:bg-amber-500">Menu</a>
				<a href="{{ route('menu.index', ['kategori' => 'Minuman']) }}"
					class="block px-3 py-2 text-white rounded hover:bg-amber-500">Minuman</a>
				<a href="{{ route('menu.index', ['kategori' => 'Side Dish']) }}"
					class="block px-3 py-2 text-white rounded hover:bg-amber-500">Camilan</a>
				<a href="{{ route('about') }}" class="block px-3 py-2 text-white rounded hover:bg-amber-500">Tentang
					Kita</a>

				<!-- Mobile user dropdown -->
				<div class="pt-4 pb-3 border-t border-amber-600 relative z-50">
					<div class="flex items-center px-5">
						<div class="flex-shrink-0">
							<img class="h-10 w-10 rounded-full"
								src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User profile">
						</div>
						<div class="ml-3">
							<div class="text-base font-medium text-white">{{ session('username', '-') }}</div>
							<div class="text-sm font-medium text-amber-200">ID : {{ session('user_id', '-') }}</div>
						</div>
					</div>
					<div class="mt-3 space-y-1 px-2 pb-4">
						<a href="{{ route('profile') }}"
							class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500 rounded">Profile</a>
						<a href="{{ route('riwayat') }}"
							class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500 rounded">Riwayat</a>
						<a href="{{ route('detailpsn') }}"
							class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500 rounded">Pesanan</a>
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button type="submit"
								class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500 rounded">
								Sign out
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script>
			// Mobile menu toggle
			const mobileMenuButton = document.getElementById('mobile-menu-button');
			const mobileMenu = document.getElementById('mobile-menu');

			mobileMenuButton.addEventListener('click', function () {
				this.classList.toggle('active');
				mobileMenu.classList.toggle('hidden');
				mobileMenu.classList.toggle('open');
			});

			// User dropdown toggle for desktop
			const userMenuButton = document.getElementById('user-menu-button');
			const userDropdown = document.getElementById('user-dropdown');

			userMenuButton.addEventListener('click', function () {
				userDropdown.classList.toggle('hidden');
			});

			// Close dropdown when clicking outside
			document.addEventListener('click', function (event) {
				if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
					userDropdown.classList.add('hidden');
				}
			});

			// Mobile user menu toggle
			const userMenuButtonMobile = document.getElementById('user-menu-button-mobile');
			if (userMenuButtonMobile) {
				userMenuButtonMobile.addEventListener('click', function () {
					// Find the mobile dropdown section and toggle it
					const mobileUserSection = document.querySelector('.mobile-menu .pt-4.pb-3');
					if (mobileUserSection) {
						if (getComputedStyle(mobileMenu).display === 'none') {
							mobileMenu.classList.remove('hidden');
							mobileMenu.classList.add('open');
							mobileMenuButton.classList.add('active');
						}
					}
				});
			}
		</script>