<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="icon" href="favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="styles/tailwind.min.css">
	<script src="style/tailwind.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

	<header class="bg-white border-b border-gray-300">
		<nav class="container mx-auto px-4 py-2 flex justify-between">
			<a href="index.php" class="flex items-center">
				<img src="images/jogfoods.png" class="h-6 w-auto mr-2" alt="Jogfood" />
				<span class="font-bold text-xl">Jogfood</span>
			</a>
			<div class="flex items-center">
				<button class="bg-gray-200 px-4 py-2 rounded-md focus:outline-none" id="search-button">
					<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
						stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
					</svg>
				</button>
				<form class="hidden md:flex items-center w-full" id="searchForm">
					<input class="pl-2 py-2 w-full border border-gray-300 rounded-md focus:outline-none" type="search"
						name="query" id="liveSearchInput" placeholder="Cari..." autocomplete="off">
				</form>
				<div class="hidden md:block">
					<!-- Container untuk hasil pencarian -->
					<div id="liveSearchResults" class="absolute bg-white border border-gray-300 w-64 z-10">
					</div>
				</div>
				<?php if (isset($_SESSION['username'])): ?>
					<div class="ml-4">
						<button class="bg-gray-200 px-4 py-2 rounded-md focus:outline-none" id="dropdown-button">
							<i class="fas fa-user mr-2"></i>
							<?php echo $_SESSION["username"]; ?>
						</button>
						<div class="hidden bg-white border border-gray-300 rounded-md absolute right-0 mt-2 py-2 w-48 z-10"
							id="dropdown-menu">
							<a class="block px-4 py-2 hover:bg-gray-300" href="profile.php">Profile</a>
							<a class="block px-4 py-2 hover:bg-gray-300" href="logout.php">Logout</a>
						</div>
					</div>
				<?php else: ?>
					<div class="ml-4">
						<a class="bg-gray-200 px-4 py-2 rounded-md focus:outline-none" href="loginform.php">Login</a>
					</div>
				<?php endif; ?>
			</div>
		</nav>
	</header>