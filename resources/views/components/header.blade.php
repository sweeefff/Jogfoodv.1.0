<!-- Navbar menggunakan komponen Flowbite -->
<nav class="bg-amber-600">
	<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 h-24">
		<!-- Logo -->
		<a href="index.html" class="flex items-center">
			<img src="assets/icon/jogfood.png" class="h-8 mr-3" alt="Jogfood Logo">
		</a>

		<!-- Hamburger button for mobile -->
		<button data-collapse-toggle="navbar-default" type="button"
			class="inline-flex items-center p-2 w-10 h-10 justify-center text-base text-white rounded-lg md:hidden hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-400"
			aria-controls="navbar-default" aria-expanded="false">
			<span class="sr-only">Open main menu</span>
			<svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M1 1h15M1 7h15M1 13h15" />
			</svg>
		</button>

		<!-- Navigation menu -->
		<div class="hidden w-full md:block md:w-auto" id="navbar-default">
			<ul
				class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-amber-500 rounded-lg bg-amber-700 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
				<li>
					<a href="#"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Home</a>
				</li>
				<li>
					<a href="#"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Menu</a>
				</li>
				<li>
					<a href="#"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Minuman</a>
				</li>
				<li>
					<a href="#"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Side
						Dish</a>
				</li>
				<li>
					<a href="#"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">About</a>
				</li>
			</ul>
		</div>

		<!-- Search, Cart and Profile Section -->
		<div class="flex items-center md:order-2">
			<!-- Search input -->
			<div class="relative hidden md:block mr-3">
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
			<button type="button" class="mr-3 flex text-white">
				<svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
					viewBox="0 0 24 24">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
				</svg>
			</button>

			<!-- Profile dropdown -->
			<button type="button" class="flex text-sm rounded-full" id="user-menu-button" aria-expanded="false"
				data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
				<span class="sr-only">Open user menu</span>
				<img class="w-9 h-9 rounded-full border-2 border-white"
					src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
			</button>

			<!-- Dropdown menu -->
			<div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
				id="user-dropdown">
				<div class="px-4 py-3">
					<span class="block text-base text-gray-900">Bonnie Green</span>
					<span class="block text-base text-gray-500 truncate">ID : 12</span>
				</div>
				<ul class="py-2" aria-labelledby="user-menu-button">
					<li>
						<a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Profile</a>
					</li>
					<li>
						<a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Riwayat</a>
					</li>
					<li>
						<a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Pesanan</a>
					</li>
					<li>
						<a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Sign out</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>

