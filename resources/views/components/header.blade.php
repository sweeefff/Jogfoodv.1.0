<style>
	.hamburger.active svg {
		transform: rotate(90deg);
		transition: transform 0.3s ease;
	}

	.hamburger svg {
		transition: transform 0.3s ease;
	}
</style>
<nav class="bg-amber-600 sticky top-0 z-50">
	<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 h-24">
		<!-- Logo -->
		<a href="index.html" class="flex items-center">
			<img src="assets/icon/jogfood.png" class="h-8 mr-3" alt="Jogfood Logo">
		</a>

		<!-- Mobile menu button -->
		<div class="flex items-center space-x-3 md:hidden">
			<!-- Cart icon -->
			<a href="keranjang" class="flex items-center">
				<button type="button" class="flex text-white">
					<svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
						viewBox="0 0 24 24">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
					</svg>
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
					<a href="#"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Home</a>
				</li>
				<li>
					<a href="menu"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Menu</a>
				</li>
				<li>
					<a href="menu"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Minuman</a>
				</li>
				<li>
					<a href="menu"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Camilan</a>
				</li>
				<li>
					<a href="about"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Tentang
						Kita</a>
				</li>
			</ul>
		</div>

		<!-- Desktop User Actions Container -->
		<div class="hidden md:flex items-center space-x-3">
			<!-- Search input -->
			<div class="relative">
				<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
					<svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
						viewBox="0 0 20 20">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
					</svg>
				</div>
				<input type="text" id="search-navbar"
					class="block w-full p-2 pl-10 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-amber-500 focus:border-amber-500"
					placeholder="Cari Kulinermu">
			</div>

			<!-- Cart icon -->
			<a href="keranjang" class="flex items-center">
				<button type="button" class="flex text-white">
					<svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
						viewBox="0 0 24 24">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
					</svg>
				</button>
			</a>

			<!-- Profile dropdown -->
			<div class="relative">
				<button type="button" class="flex text-sm rounded-full" id="user-menu-button" aria-expanded="false">
					<span class="sr-only">Open user menu</span>
					<img class="w-9 h-9 rounded-full border-2 border-white"
						src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
				</button>

				<!-- Dropdown menu -->
				<div class="hidden absolute top-10 right-0 my-4 text-base list-none bg-amber-50 divide-y divide-gray-100 rounded-lg shadow w-56"
					id="user-dropdown">
					<div class="px-4 py-3">
						<span class="block text-base text-gray-900">Bonnie Green</span>
						<span class="block text-base text-gray-500 truncate">ID : 12</span>
					</div>
					<ul class="py-2" aria-labelledby="user-menu-button">
						<li>
							<a href="profile"
								class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Profile</a>
						</li>
						<li>
							<a href="riwayat"
								class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Riwayat</a>
						</li>
						<li>
							<a href="detailpsn"
								class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Pesanan</a>
						</li>
						<li>
							<a href="logout" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Sign
								out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Mobile menu - HIDDEN BY DEFAULT -->
	<div id="mobile-menu" class="mobile-menu hidden w-full md:hidden bg-amber-700">
		<div class="px-2 pt-2 pb-3 space-y-1">
			<!-- Search input for mobile -->
			<div class="relative px-3 py-2">
				<div class="absolute inset-y-0 left-6 flex items-center pl-3 pointer-events-none">
					<svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
						viewBox="0 0 20 20">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
					</svg>
				</div>
				<input type="text"
					class="block w-full p-2 pl-10 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-amber-500 focus:border-amber-500"
					placeholder="Cari Kulinermu">
			</div>

			<a href="#" class="block px-3 py-2 text-white rounded hover:bg-amber-500">Home</a>
			<a href="menu" class="block px-3 py-2 text-white rounded hover:bg-amber-500">Menu</a>
			<a href="menu" class="block px-3 py-2 text-white rounded hover:bg-amber-500">Minuman</a>
			<a href="menu" class="block px-3 py-2 text-white rounded hover:bg-amber-500">Camilan</a>
			<a href="about" class="block px-3 py-2 text-white rounded hover:bg-amber-500">Tentang Kita</a>

			<!-- Mobile user dropdown -->
			<div class="pt-4 pb-3 border-t border-amber-600">
				<div class="flex items-center px-5">
					<div class="flex-shrink-0">
						<img class="h-10 w-10 rounded-full"
							src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User profile">
					</div>
					<div class="ml-3">
						<div class="text-base font-medium text-white">Bonnie Green</div>
						<div class="text-sm font-medium text-amber-200">ID: 12</div>
					</div>
				</div>
				<div class="mt-3 space-y-1 px-2">
					<a href="profile"
						class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500 rounded">Profile</a>
					<a href="riwayat"
						class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500 rounded">Riwayat</a>
					<a href="detailpsn"
						class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500 rounded">Pesanan</a>
					<a href="logout"
						class="block px-3 py-2 text-base font-medium text-white hover:bg-amber-500 rounded">Sign out</a>
				</div>
			</div>
		</div>
	</div>
</nav>

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

	// Back to top button

</script>