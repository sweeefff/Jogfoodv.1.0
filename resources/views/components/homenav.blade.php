<!--========= Start Header=========-->
<nav class="bg-amber-600 w-full">
	<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
		<a href="index" class="flex items-center space-x-3 rtl:space-x-reverse">
			<img src="assets/icon/jogfood.png" class="h-8" alt="Jogfood Logo">
		</a>

		<div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
			<svg class="w-6 h-6 text-gray-800 dark:text-white me-6" aria-hidden="true"
				xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
			</svg>

			<button type="button"
				class="focus:outline-none text-white bg-amber-400 hover:bg-amber-300 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-amber-900"><a
					href="login">Login</a></button>
			<button type="button"
				class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-amber-900 focus:outline-none bg-white rounded-lg border border-amber-200 hover:bg-amber-300 hover:text-blue-700 focus:z-10 focus:ring-4 
					focus:ring-amber-100 dark:focus:ring-amber-700 dark:bg-amber-800 dark:text-amber-400 dark:border-amber-600 dark:hover:text-white dark:hover:bg-amber-300"><a
					href="register">Register</a></button>
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
		<div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
			<ul
				class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-amber-600 rounded-lg bg-amber-600 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-amber-600 dark:border-amber-600 md:dark:bg-transparent md:dark:border-transparent">
				<li>
					<a href="" class="block py-2 px-3 text-white rounded-sm md:p-0" aria-current="page">Home</a>
				</li>
				<li>
					<a href="menu"
						class="block py-2 px-3 text-white rounded-sm hover:bg-amber-300 md:hover:bg-transparent md:hover:text-amber-900 md:p-0">Menu</a>
				</li>
				<li>
					<a href="#"
						class="block py-2 px-3 text-white rounded-sm hover:bg-amber-300 md:hover:bg-transparent md:hover:text-amber-900 md:p-0">Minuman</a>
				</li>
				<li>
					<a href="#"
						class="block py-2 px-3 text-white rounded-sm hover:bg-amber-300 md:hover:bg-transparent md:hover:text-amber-900 md:p-0">Side
						Dish</a>
				</li>
				<li>
					<a href="about"
						class="block py-2 px-3 text-white rounded-sm hover:bg-amber-300 md:hover:bg-transparent md:hover:text-amber-900 md:p-0">About</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!--=========== End Header ==========-->
<!---========== Start Banner ========-->
<div class="hero bg-gray-800 bg-opacity-50 pt-24 pb-16">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="text-center">
			<h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
				<span class="block">Temukan yang Terbaik</span>
				<span class="block text-amber-400">Kuliner di Jogja</span>
			</h1>
			<p
				class="mt-3 max-w-md mx-auto text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl text-shadow-lg">
				Jelajahi hidangan tradisional di Yogyakarta dan nikmati pengalaman kuliner yang tak terlupakan
			</p>
			<div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
				<div class="rounded-md shadow">
					<a href="menu" class="w-full flex items-center justify-center px-8 py-3 border border-transparent
											text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-300 md:py-4 md:text-lg md:px-10">
						Jelajahi Sekarang
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Bagian Pencarian -->
<div class="bg-amber-100 shadow-sm">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 -mt-8 rounded-lg relative z-10">
		<div class="relative">
			<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
				<i class="fas fa-search text-gray-400"></i>
			</div>
			<input type="text"
				class="block w-full pl-10 pr-3 py-4 border border-gray-300 rounded-lg bg-gray-50 focus:ring-amber-500 focus:border-amber-500"
				placeholder="Cari makanan, restoran, atau masakan...">
			<button
				class="absolute right-2.5 bottom-2.5 bg-amber-600 
									hover:bg-amber-300 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-white bg-amber-600">
				Cari
			</button>
		</div>
	</div>
</div>
<!--=========== Akhir Banner ==========-->
