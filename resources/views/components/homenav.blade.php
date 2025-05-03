<!-- Navbar menggunakan komponen Flowbite -->
<nav class="bg-amber-600 top-0 left-0 w-full">
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
					<a href="menu"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Menu</a>
				</li>
				<li>
					<a href="menu"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Minuman</a>
				</li>
				<li>
					<a href="menu"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Camilan
					</a>
				</li>
				<li>
					<a href="about"
						class="block py-2 pl-3 pr-4 text-white rounded hover:bg-amber-500 md:hover:bg-transparent md:border-0 md:hover:text-amber-300 md:p-0 text-lg">Tentang
						Kita</a>
				</li>
			</ul>
		</div>

		<!-- Cart, Button -->
		<div class="flex items-center md:order-2">
			<!-- Cart icon -->
			<a href="keranjang">
				<button type="button" class="mr-3 flex text-white">
					<svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
						viewBox="0 0 24 24">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
					</svg>
				</button>
			</a>
			<button type="button"
				class="focus:outline-none text-white bg-amber-400 hover:bg-amber-300 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-amber-900"><a
					href="login">Masuk</a></button>
			<button type="button"
				class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-amber-900 focus:outline-none bg-white rounded-lg border border-amber-200 hover:bg-amber-300 hover:text-blue-700 focus:z-10 focus:ring-4 
    focus:ring-amber-100 dark:focus:ring-amber-700 dark:bg-amber-800 dark:text-amber-400 dark:border-amber-600 dark:hover:text-white dark:hover:bg-amber-300"><a
					href="register">Daftar</a></button>
			<button data-collapse-toggle="navbar-user" type="button"
				class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
				aria-controls="navbar-user" aria-expanded="false">
				<span class="sr-only">Open main menu</span>
				<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
					viewBox="0 0 17 14">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M1 1h15M1 7h15M1 13h15" />
				</svg>
			</button>
		</div>