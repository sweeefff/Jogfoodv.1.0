<!DOCTYPE html>
<html lang="en">

<head>
	<title>Jogfood</title>
	<!-- favicon-->
	<link href="images/favicon.jpg" rel="icon">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Bootstrap4 link -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
		rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<!-- css file and icons stylesheet-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">

</head>

<body>

	<!--========= Start Header=========-->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img style="width: 70%; margin-left: 0%; margin-right: 20%;" src="assets(images/jogfoods.png)" alt="" />
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
									<a class="dropdown-item"
										href="logout.php"><strong>ID : 12</strong></a>
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
	</header><!--End Header-->

	<!--=========Slider section =========-->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="assets(images/slider-01.jpg)" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Kuliner Khas Daerah<br>Istimewa Yogyakarta</strong></h1>
							<p class="m-b-40">Ayo jelajahi kuliner Yogyakarta kesukaan kamu!<br>
								Jogfood hadir memberikan rekomendasi terbaik.</p>
							<form id="searchForm">
								<div class="search">
									<i class="fa-solid fa-magnifying-glass"></i>
									<input class="search-input" name="query" id="liveSearchInput" type="search"
										placeholder="Cari Kuliner Kesukaanmu disini" aria-label="Search"
										autocomplete="off">
								</div>
							</form>
							<div id="liveSearchResults"
								style="position: absolute; background: white; border: 1px solid #ccc; width: 200px; z-index: 1000;">
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="assets(images/slider-02.jpg)" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Kuliner Khas Daerah<br>Istimewa Yogyakarta</strong></h1>
							<p class="m-b-40">Ayo jelajahi kuliner Yogyakarta kesukaan kamu!<br>
								Jogfood hadir memberikan rekomendasi terbaik.</p>
							<form id="searchForm">
								<div class="search">
									<i class="fa-solid fa-magnifying-glass"></i>
									<input class="search-input" name="query" id="liveSearchInput" type="search"
										placeholder="Cari Kuliner Kesukaanmu disini" aria-label="Search"
										autocomplete="off">
								</div>
							</form>
							<div id="liveSearchResults"
								style="position: absolute; background: white; border: 1px solid #ccc; width: 200px; z-index: 1000;">
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="assets(images/slider-03.jpg)" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Kuliner Khas Daerah<br>Istimewa Yogyakarta</strong></h1>
							<p class="m-b-40">Ayo jelajahi kuliner Yogyakarta kesukaan kamu!<br>
								Jogfood hadir memberikan rekomendasi terbaik.</p>
							<form id="searchForm">
								<div class="search">
									<i class="fa-solid fa-magnifying-glass"></i>
									<input class="search-input" name="query" id="liveSearchInput" type="search"
										placeholder="Cari Kuliner Kesukaanmu disini" aria-label="Search"
										autocomplete="off">
								</div>
							</form>
							<div id="liveSearchResults"
								style="position: absolute; background: white; border: 1px solid #ccc; width: 200px; z-index: 1000;">
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation" style="display:none;">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div><!-- End slider Section-->

	<!--Category-->
	<div class="category-section">
		<div class="container">
			<div class="row mb-4">
				<div class="col-12">
					<h2 style="margin-top: 4%;">Viral Food <a href="viral.php" class="view-more" class="font-poppins"
							style="margin-left: 75%;">Lihat lainnya</a></h2>
				</div>
			</div>
				<div class="row">
					<div class="col-md-4 mb-4">
						<div class="card">
							<img src="" class="card-img-top"
								alt="Something">
							<h1>nama</h1>
							<p class="description">Deskripsi</p>
							<p> Rata-rata Rating: 3/5</p>
							<a href=''><button
									class="btn btn-success btn-sm">Tampilkan</button></a>
							</button>
						</div>
					</div>
				</div>
		</div>


		<div class="category-section">
			<div class="container">
				<div class="row mb-4">
					<div class="col-12 mt-5">
						<h2 style="margin-top: 4%;">Restoran<a href="restoran.php" class="view-more"
								class="font-poppins" style="margin-left: 75%;">Lihat lainnya</a></h2>
					</div>
				</div>

					<div class="row">
						<div class="col-md-4 mb-4">
							<div class="card">
								<img src="assets(../pbl/dashboard/gambar/)" class="card-img-top"
									alt="">
								<h1>Nama</h1>
								<p>Lokasi</p>
								<p>Batam</p>
								<p> Rata-rata Rating: 3/5</p>
								<a href=''><button
										class="btn btn-success btn-sm">Tampilkan</button></a>

							</div>
						</div>
					</div>

			</div>
			<!---Category End--->

			<!--===========About Section===========-->
			<div class="about-section-box">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 text-center">
							<div class="inner-column">
								<h1>Makanan <span>Terpopuler!</span></h1>
								<h4>Gudeg</h4>
								<p>Gudeg adalah hidangan khas Provinsi Daerah Istimewa Yogyakarta yang terbuat dari
									nangka muda
									yang dimasak dengan santan. Perlu waktu berjam-jam untuk membuat hidangan ini. Warna
									coklat
									biasanya dihasilkan oleh daun jati yang dimasak bersamaan. </p>
								<p>Gudeg biasanya dimakan dengan nasi dan disajikan dengan kuah santan kental (areh),
									ayam
									kampung, telur, tempe, tahu dan sambal goreng krecek.</p>
								<a class="btn btn-lg-btn-circle btn-outline-new-white"
									href="">Rincian</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12"><img src="assets(images/about-img.jpg)" alt=""
								class="img-fluid"></div>
					</div>
				</div>
			</div>
			<div class="about-section-box2">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12"><img style="box-shadow: 20px 20px 0px #d65106;"
								src="assets(images/about-img2.jpg)" alt="" class="img-fluid"></div>
						<div class="col-lg-6 col-md-6 col-sm-12 text-center">

							<div class="inner-column">
								<h1>Minuman <span>Terpopuler!</span></h1>
								<h4>Wedang Uwuh</h4>
								<p>Wedang Uwuh adalah minuman dengan bahan-bahan yang berupa dedaunan mirip dengan
									rempah. Dalam
									bahasa Jawa, Wedang berarti minuman yang diseduh, sedangkan uwuh berarti sampah.</p>
								<p> Di Yogyakarta sendiri Wedang Uwuh sangat mudah sekali untuk dijumpai. Mulai dari
									pasar-pasar
									Tradisional, Rumah Makan, Kafe, Tempat oleh-oleh. Selain itu Wedang Uwuh juga
									menjadi salah
									satu andalan oleh-oleh khas dari Yogyakarta yang selalu dicari oleh para wisatawan
									saat
									mereka berkunjung ke Yogyakarta. </p>
								<a class="btn btn-lg-btn-circle btn-outline-new-white"
									href="">Rincian</a>
							</div>
						</div>

					</div>
				</div>
			</div>

			<!-- End Section -->
			<!--============Start QT Section===========-->
			<div class="qt-box qt-background">
				<div class="container">
					<div class="row">
						<div class="col-md-8 ml-auto mr-auto text-center">
							<p class="lead">"Di setiap sudut Jogja membawa cerita masing-masing bagi pengunjungnya. Sama
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

			<!-- ALL JS FILES -->
			<script>
				document.getElementById('liveSearchInput').addEventListener('keyup', function () {
					const query = this.value.trim();
					const resultsContainer = document.getElementById('liveSearchResults');

					if (query.length > 0) {
						const xhr = new XMLHttpRequest();
						xhr.open('POST', 'php/pencarian_ajax.php', true);
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

						xhr.onload = function () {
							if (this.status === 200) {
								resultsContainer.innerHTML = this.responseText;
							}
						};

						xhr.send('query=' + encodeURIComponent(query));
					} else {
						resultsContainer.innerHTML = ''; // Kosongkan hasil jika input kosong
					}
				});
			</script>
			<script src="js/jquery-3.2.1.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<!-- ALL PLUGINS -->
			<script src="js/jquery.superslides.min.js"></script>
			<script src="js/images-loded.min.js"></script>
			<script src="js/isotope.min.js"></script>
			<script src="js/baguetteBox.min.js"></script>
			<script src="js/form-validator.min.js"></script>
			<script src="js/contact-form-script.js"></script>
			<script src="js/custom.js"></script>
</body>

</html>