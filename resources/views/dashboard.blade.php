<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Dashboard</title>
    <style>
        .nav-link:hover {
            background-color: gold;
            color: white !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">SELAMAT DATANG, ADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="ms-auto d-flex align-items-center">
                    <div class="icon">
                        <i class="fas fa-envelope-square me-3"></i>
                        <i class="fas fa-bell-slash me-3"></i>
                        <i class="fas fa-user-circle me-3"></i> <!-- Profil User Icon -->
                        <a href=""><i class="fas fa-sign-out-alt float-end mt-2"
                                style="color: white;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="row g-0 mt-5">
        <div class="col-md-2 bg-info mt-2 pt-4">
            <ul class="nav flex-column ms-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href=""><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=""><i class="fas fa-mortar-pestle me-2"></i>Daftar
                        Kuliner</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=""><i class="fa fa-wine-glass me-2"></i>Daftar
                        minuman</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=""><i class="fas fa-utensils me-2"></i>Daftar
                        Restoran</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-tachometer-alt me-2"></i> Dashboard</h3>
            <hr>

            <!-- Dashboard Cards -->
            <div class="row text-white">
                <div class="col-md-4">
                    <div class="card bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-mortar-pestle me-2"></i>Kuliner </h5>
                            <p class="card-text">Total: 1000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-wine-glass me-2"></i>Minuman</h5>
                            <p class="card-text">Total: 1000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-utensils me-2"></i>Restoran</h5>
                            <p class="card-text">Total: 1000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users me-2"></i>User</h5>
                            <p class="card-text">10000</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>