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
				<div class="relative w-full max-w-xs">
					<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
						<i class="fas fa-search text-gray-400"></i>
					</div>
					<input type="text"
						class="block w-full pl-10 pr-3 py-4 border border-gray-300 rounded-lg bg-gray-50 focus:ring-amber-500 focus:border-amber-500"
						placeholder="Cari Kulinermu">
					<button
						class="absolute right-2.5 bottom-2.5 bg-amber-600 
						hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-white bg-amber-600">
						Cari
					</button>
				</div>
				<svg class="w-12 h-12 text-gray-800 dark:text-white me-6 p-2" aria-hidden="true"
					xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
				</svg>
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

