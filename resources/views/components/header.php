<?php
if (isset($_POST['search'])) {
	$keyword = $_POST['query'];
	$results = search_data($keyword);
}
?>
<!--========= Start Header=========-->
<header class="top-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.php">
				<img style="width: 70%; margin-left: 0%; margin-right: 20%;" src="images/jogfoods.png" alt="" />
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
				aris-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbars-rs-food">
				<!-- Navigation Menu bar -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<!--Drop Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Makanan</a>
						<!--Drop-->
						<div class="dropdown-menu" aria-labelledby="dropdown-a">
							<a class="dropdown-item" href="tradisional.php">Tradisional</a>
							<a class="dropdown-item" href="nontradisional.php">Non Tradisional</a>
						</div>
					</li>
					<!--Drop Menu -->
					<li class="nav-item">
						<a class="nav-link" href="minuman.php">Minuman</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="restoran.php">Restoran</a>
					</li>
					<li class="nav-item">
						<form class="form-inline my-2 my-lg-0" id="searchForm">
							<input class="form-control mr-sm-2" type="search" name="query" id="liveSearchInput"
								placeholder="Cari..." aria-label="Search" autocomplete="off">
						</form>
						<!-- Container untuk hasil pencarian -->
						<div id="liveSearchResults"
							style="position: absolute; background: white; border: 1px solid #ccc; width: 200px; z-index: 1000;">
						</div>
					</li>
					<?php if (isset($_SESSION['username'])): ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"
								role="button" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user me-2"></i>
								<?php echo $_SESSION["username"]; ?></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item"
									href="logout.php"><strong><?php echo "ID: " . $_SESSION["id"]; ?></strong></a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="profile.php">Profile</a>
								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
					<?php else: ?>
						<div class="nav-item">
							<a class="nav-link" href="loginform.php">Login</a>
						</div>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
</header>