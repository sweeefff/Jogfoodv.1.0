<!DOCTYPE html>
<html lang="en">
<title>Jogfood</title>
<!-- favicon-->
<link rel="icon" href="assets/icon/favicon.png" type="image/x-icon">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--Bootstrap4 link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link href="assets/css/flowbite.min.css" rel="stylesheet" />
<script src="assets/css/flowbite.min.js"></script>
<style>
	.hero {
		background-image: url("assets/img/jogja.jpg");
		background-size: cover;
		background-position: center;
	}

	.qt {
		background-image: url("assets/img/qt-bg.jpg");
		background-size: cover;
		background-position: center;
	}
</style>
<script>
	tailwind.config = {
		theme: {
			extend: {
				colors: {
					amber: {
						100: "#f7dccd",
						200: "#efb99b",
						300: "#e6976a",
						400: "#de7438",
						500: "#d65106",
						600: "#ab4105",
						700: "#803104",
						800: "#562002",
						900: "#2b1001"
					},
				}
			}
		}
	}
</script>
</head>

<body>
	<!--========= Start Header=========-->
	<nav class="bg-amber-600">
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
					class="focus:outline-none text-white bg-amber-400 hover:bg-amber-500 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-amber-900"><a
						href="login">Login</button></a>
				<button type="button"
					class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-amber-900 focus:outline-none bg-white rounded-lg border border-amber-200 hover:bg-amber-100 hover:text-blue-700 focus:z-10 focus:ring-4 
					focus:ring-amber-100 dark:focus:ring-amber-700 dark:bg-amber-800 dark:text-amber-400 dark:border-amber-600 dark:hover:text-white dark:hover:bg-amber-700"><a
						href="register">Register</button></a>
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
					class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-amber-600 rounded-lg bg-amber-600 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-amber-600 dark:bg-amber-600 dark:border-amber-600 md:dark:bg-amber-600 md:dark:border-amber-600">
					<li>
						<a href="index"
							class="block py-2 px-3 text-white rounded-sm md:text-amber-500 md:p-0 md:dark:text-amber-500"
							aria-current="page">Home</a>
					</li>
					<li>
						<a href="menu"
							class="block py-2 px-3 text-amber-100 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-amber-700 md:p-0 dark:text-white md:dark:hover:text-amber-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Menu</a>
					</li>
					<li>
						<a href="#"
							class="block py-2 px-3 text-amber-100 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-amber-700 md:p-0 dark:text-white md:dark:hover:text-amber-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
					</li>
					<li>
						<a href="#"
							class="block py-2 px-3 text-amber-100 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-amber-700 md:p-0 dark:text-white md:dark:hover:text-amber-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
					</li>
					<li>
						<a href="#"
							class="block py-2 px-3 text-amber-100 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-amber-700 md:p-0 dark:text-white md:dark:hover:text-amber-700 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
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
							text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 md:py-4 md:text-lg md:px-10">
							Jelajahi Sekarang
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bagian Pencarian -->
	<div class="bg-gray-50 shadow-sm">
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
					hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-white bg-amber-600">
					Cari
				</button>
			</div>
		</div>
	</div>
	<!--=========== Akhir Banner ==========-->
	<!--=========== Mulai Bagian Menu ==========-->
	<div class="bg-white flex justify-center py-12">
		<div class="max-w-7xl px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-12">
				<h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
					Hidangan Wajib Dicoba
				</h2>
				<p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
					Favorit lokal yang tak boleh dilewatkan
				</p>
			</div>

			<div class="grid grid-cols-1 gap-x-6 sm:grid-cols-3 lg:grid-cols-3">
				<!-- Hidangan 1 -->
				<div
					class="food-card group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
					<div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
						<img src="{{ asset('assets/img/gudeg.jpg') }}" alt="Gudeg"
							class="h-60 w-full object-cover object-center food-image transition duration-300">
					</div>
					<div class="p-4">
						<div class="flex justify-between items-start">
							<div>
								<h3 class="text-lg font-medium text-gray-900">Gudeg</h3>
								<p class="mt-1 text-sm text-gray-500">Rebung nangka manis</p>
							</div>
							<span
								class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
								<i class="fas fa-fire mr-1"></i> Populer
							</span>
						</div>
						<div class="mt-4 flex justify-between items-center">
							<div class="flex items-center">
								<i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
								<span class="text-gray-500 text-sm">Gudeg Yu Djum</span>
							</div>
							<span class="text-gray-900 font-medium">Rp 25.000</span>
						</div>
					</div>
				</div>

				<!-- Hidangan 2 -->
				<div
					class="food-card group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
					<div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
						<img src="https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=2070&auto=format&fit=crop"
							alt="Sate Klathak"
							class="h-60 w-full object-cover object-center food-image transition duration-300">
					</div>
					<div class="p-4">
						<div class="flex justify-between items-start">
							<div>
								<h3 class="text-lg font-medium text-gray-900">Sate Klathak</h3>
								<p class="mt-1 text-sm text-gray-500">Sate kambing bakar</p>
							</div>
							<span
								class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
								<i class="fas fa-fire mr-1"></i> Populer
							</span>
						</div>
						<div class="mt-4 flex justify-between items-center">
							<div class="flex items-center">
								<i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
								<span class="text-gray-500 text-sm">Sate Klathak Pak Bari</span>
							</div>
							<span class="text-gray-900 font-medium">Rp 35.000</span>
						</div>
					</div>
				</div>

				<!-- Hidangan 3 -->
				<div
					class="food-card group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
					<div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
						<img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?q=80&w=2127&auto=format&fit=crop"
							alt="Bakpia"
							class="h-60 w-full object-cover object-center food-image transition duration-300">
					</div>
					<div class="p-4">
						<div class="flex justify-between items-start">
							<div>
								<h3 class="text-lg font-medium text-gray-900">Bakpia Pathok</h3>
								<p class="mt-1 text-sm text-gray-500">Pastry kacang manis</p>
							</div>
							<span
								class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
								<i class="fas fa-fire mr-1"></i> Populer
							</span>
						</div>
						<div class="mt-4 flex justify-between items-center">
							<div class="flex items-center">
								<i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
								<span class="text-gray-500 text-sm">Bakpia Pathok 25</span>
							</div>
							<span class="text-gray-900 font-medium">Rp 40.000</span>
						</div>
					</div>
				</div>
			</div>
			<div class="mt-12 flex items-center justify-center">
				<a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white 
						bg-amber-600 hover:bg-amber-700">
					Lihat Semua Menu
					<svg class="ml-3 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
						fill="currentColor" aria-hidden="true">
						<path fill-rule="evenodd"
							d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
							clip-rule="evenodd" />
					</svg>
				</a>
			</div>
		</div>
	</div>
	<!--====== End Menu Section =======-->

	<!--===========About Section===========-->

	<body class="bg-gray-50">
		<!-- Food Section -->
		<section class="py-16 px-4">
			<div class="max-w-6xl mx-auto">
				<div class="flex flex-col lg:flex-row items-center gap-12">
					<div class="lg:w-1/2 text-center lg:text-left">
						<div class="space-y-6">
							<h1 class="text-4xl md:text-5xl font-bold text-gray-800">
								Makanan <span class="text-amber-600">Terpopuler!</span>
							</h1>
							<h4 class="text-2xl font-semibold text-gray-700">Gudeg</h4>
							<p class="text-gray-600 leading-relaxed">
								Gudeg adalah hidangan khas Provinsi Daerah Istimewa Yogyakarta yang terbuat dari
								nangka muda yang dimasak dengan santan. Perlu waktu berjam-jam untuk membuat
								hidangan ini.
								Warna coklat biasanya dihasilkan oleh daun jati yang dimasak bersamaan.
							</p>
							<p class="text-gray-600 leading-relaxed">
								Gudeg biasanya dimakan dengan nasi dan disajikan dengan kuah santan kental
								(areh), ayam kampung, telur, tempe, tahu dan sambal goreng krecek.
							</p>
							<a href="#"
								class="inline-block px-8 py-3 bg-amber-600 text-white rounded-full font-medium transition-all duration-300 hover:bg-amber-700 btn-hover">
								Rincian
							</a>
						</div>
					</div>
					<div class="lg:w-1/2">
						<div class="rounded-xl overflow-hidden shadow-xl">
							<img src="{{ asset('assets/img/gudeg.jpg') }}" alt="Gudeg Yogyakarta"
								class="w-full h-auto object-cover">
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Drink Section -->
		<section class="py-16 px-4 bg-white">
			<div class="max-w-6xl mx-auto">
				<div class="flex flex-col lg:flex-row items-center gap-12">
					<div class="lg:w-1/2">
						<div class="rounded-xl overflow-hidden custom-shadow">
							<img src="{{ asset('assets/img/gudeg-transformed.png') }}" alt="Wedang Uwuh"
								class="w-full h-auto object-cover">
						</div>
					</div>
					<div class="lg:w-1/2 text-center lg:text-left">
						<div class="space-y-6">
							<h1 class="text-4xl md:text-5xl font-bold text-gray-800">
								Minuman <span class="text-amber-600">Terpopuler!</span>
							</h1>
							<h4 class="text-2xl font-semibold text-gray-700">Wedang Uwuh</h4>
							<p class="text-gray-600 leading-relaxed">
								Wedang Uwuh adalah minuman dengan bahan-bahan yang berupa dedaunan mirip dengan
								rempah. Dalam bahasa Jawa, Wedang berarti minuman yang diseduh, sedangkan uwuh
								berarti sampah.
							</p>
							<p class="text-gray-600 leading-relaxed">
								Di Yogyakarta sendiri Wedang Uwuh sangat mudah sekali untuk dijumpai. Mulai dari
								pasar-pasar Tradisional, Rumah Makan, Kafe, Tempat oleh-oleh. Selain itu Wedang Uwuh
								juga
								menjadi salah satu andalan oleh-oleh khas dari Yogyakarta yang selalu dicari oleh
								para
								wisatawan saat mereka berkunjung ke Yogyakarta.
							</p>
							<a href="#" class="inline-block px-8 py-3 bg-amber-600 text-white rounded-full font-medium 
									transition-all duration-300 hover:bg-amber-700 btn-hover">
								Rincian
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- End Section -->
		<!--============Start QT Section===========-->
		<div class=" qt bg-gray-50 py-14 ">
			<div class="flex flex-col items-center justify-center">
				<div class="text-center">
					<p class="text-2xl font-semibold text-amber-100 mb-4">
						"Di setiap sudut Jogja membawa cerita masing-masing bagi pengunjungnya.
						Sampai jumpa di Jogja!"</p>
				</div>
			</div>
		</div>

		<!--copyright-->
		@include ('components.footer')

		<!--============ Back to Top ============-->
		<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fas fa-angle-up"
				aria-hidden="true"></i></a>
	</body>

</html>