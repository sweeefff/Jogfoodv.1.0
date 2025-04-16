<!DOCTYPE html>
<html lang="en">
	<title>Jogfood</title>
	<!-- favicon-->
	<link href="images/favicon.jpg" rel="icon">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Bootstrap4 link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
	<style>
		.hero {
			background-image: url("{{ asset('assets/img/jogja.jpg') }}");
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
		<header class="top-navbar">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					<a class="navbar-brand" href="index.php">
						<img style="width: 70%; margin-left: 0%; margin-right: 20%;" src="assets(images/jogfoods.png)"
							alt="" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
						aris-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbars-rs-food">
						<!-- Navigation Menu bar -->
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="#">Home</a>
							</li>
							<!--Drop Menu -->
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-a"
									data-toggle="dropdown">Makanan</a>
								<!--Drop-->
								<div class="dropdown-menu" aria-labelledby="dropdown-a">
									<a class="dropdown-item" href="tradisional.php">Tradisional</a>
									<a class="dropdown-item" href="nontradisional.php">Non Tradisional</a>

								</div>
							</li>
							<!--Drop Menu -->
							<li class="nav-item">
								<a class="nav-link" href="Minuman.php">Minuman</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="restoran.php">Restoran</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"
									role="button" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-user me-2"></i>
									Xiv</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="logout.php"><strong>ID : 12</strong></a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="profile.php">Profile</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div>
							</li>
							<div class="nav-item">
								<a class="nav-link" href="loginform.php">Login</a>
							</div>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<!--=========== End Header ==========-->
		<!---========== Start Banner ========-->
		<div class="hero bg-gray-800 bg-opacity-50 pt-24 pb-16">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="text-center">
					<h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
						<span class="block">Discover the Best</span>
						<span class="block text-amber-400">Food in Jogja</span>
					</h1>
					<p class="mt-3 max-w-md mx-auto text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl text-shadow-lg">
						Explore hundreds of local restaurants and traditional dishes in Yogyakarta
					</p>
					<div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
						<div class="rounded-md shadow">
							<a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent 
							text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 md:py-4 md:text-lg md:px-10">
								Explore Now
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Search Section -->
		<div class="bg-white shadow-sm">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 -mt-8 rounded-lg relative z-10">
				<div class="relative">
					<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
						<i class="fas fa-search text-gray-400"></i>
					</div>
					<input type="text"
						class="block w-full pl-10 pr-3 py-4 border border-gray-300 rounded-lg bg-gray-50 focus:ring-amber-500 focus:border-amber-500"
						placeholder="Search for food, restaurants, or cuisines...">
					<button
						class="absolute right-2.5 bottom-2.5 bg-amber-600 
					hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-white bg-amber-600">
						Search
					</button>
				</div>
			</div>
		</div>
		<!--=========== End Banner ==========-->
		<!--=========== Start Menu Section ==========-->
		<div class="flex justify-center py-12">
			<div class="max-w-7xl px-4 sm:px-6 lg:px-8">
				<div class="text-center mb-12">
					<h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
						Must-Try Dishes
					</h2>
					<p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
						Local favorites you shouldn't miss
					</p>
				</div>

				<div class="grid grid-cols-1 gap-x-6 sm:grid-cols-3 lg:grid-cols-3">
					<!-- Dish 1 -->
					<div
						class="food-card group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
						<div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
							<img src="{{ asset('assets/img/gudeg.jpg') }}"
								alt=" Gudeg" class="h-60 w-full object-cover object-center food-image transition duration-300">
						</div>
						<div class="p-4">
							<div class="flex justify-between items-start">
								<div>
									<h3 class="text-lg font-medium text-gray-900">Gudeg</h3>
									<p class="mt-1 text-sm text-gray-500">Sweet jackfruit stew</p>
								</div>
								<span
									class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
									<i class="fas fa-fire mr-1"></i> Popular
								</span>
							</div>
							<div class="mt-4 flex justify-between items-center">
								<div class="flex items-center">
									<i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
									<span class="text-gray-500 text-sm">Gudeg Yu Djum</span>
								</div>
								<span class="text-gray-900 font-medium">Rp 25,000</span>
							</div>
						</div>
					</div>

					<!-- Dish 2 -->
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
									<p class="mt-1 text-sm text-gray-500">Grilled goat skewers</p>
								</div>
								<span
									class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
									<i class="fas fa-fire mr-1"></i> Popular
								</span>
							</div>
							<div class="mt-4 flex justify-between items-center">
								<div class="flex items-center">
									<i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
									<span class="text-gray-500 text-sm">Sate Klathak Pak Bari</span>
								</div>
								<span class="text-gray-900 font-medium">Rp 35,000</span>
							</div>
						</div>
					</div>

					<!-- Dish 3 -->
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
									<p class="mt-1 text-sm text-gray-500">Sweet bean pastry</p>
								</div>
								<span
									class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
									<i class="fas fa-fire mr-1"></i> Popular
								</span>
							</div>
							<div class="mt-4 flex justify-between items-center">
								<div class="flex items-center">
									<i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
									<span class="text-gray-500 text-sm">Bakpia Pathok 25</span>
								</div>
								<span class="text-gray-900 font-medium">Rp 40,000</span>
							</div>
						</div>
					</div>
				</div>
				<div class="mt-12 flex items-center justify-center">
					<a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white 
						bg-amber-600 hover:bg-amber-700">
						View All Menu
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
								<img src="{{ asset('assets/img/gudeg-transformed.png') }}"
									alt="Wedang Uwuh" class="w-full h-auto object-cover">
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
								<a href="#"
									class="inline-block px-8 py-3 bg-amber-600 text-white rounded-full font-medium 
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
			<div class="qt-box qt-background">
				<div class="container">
					<div class="row">
						<div class="col-md-8 ml-auto mr-auto text-center">
							<p class="lead">"Di setiap sudut Jogja membawa cerita masing-masing bagi pengunjungnya.
								Sama
								sepertiku yang punya cerita denganmu disana."</p>
							<span class="lead">Someone</span>
						</div>
					</div>
				</div>
			</div>
			<!-- End section-->
			<!--=========== Footer Section ==========-->

			<!--copyright-->
			@include ('components.footer')


			<!--============ Back to Top ============-->
			<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fas fa-angle-up"
					aria-hidden="true"></i></a>
		</body>

</html>