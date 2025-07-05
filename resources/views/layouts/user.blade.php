<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Jogfood')</title>
    <!-- favicon-->
    <link rel="icon" href="assets/icon/favicon.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSS & JS Resources -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link href="assets/styles/flowbite.min.css" rel="stylesheet" />
    <script src="assets/styles/flowbite.min.js" rel=""></script>
    <link href="assets/styles/css/style.css" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        amber: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        },
                    }
                }
            }
        }
    </script>
</head>

<body class="flex flex-col min-h-screen">
    <div id="global-loader"
        style="display:none; position:fixed; inset:0; background:rgba(255,255,255,0.7); z-index:9999; align-items:center; justify-content:center;">
        <div class="flex flex-row gap-2 justify-center items-center h-screen">
            <div class="w-4 h-4 rounded-full bg-amber-500 animate-bounce"></div>
            <div class="w-4 h-4 rounded-full bg-amber-500 animate-bounce [animation-delay:-.3s]"></div>
            <div class="w-4 h-4 rounded-full bg-amber-500 animate-bounce [animation-delay:-.5s]"></div>
        </div>
    </div>
    <header>
        @include('components.navbar.header')
    </header>

    <main class="flex-grow bg-amber-50">
        @yield('content')
    </main>

    <footer>
        @include('components.navbar.footer')
    </footer>
</body>
<script>
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        const backToTopBtn = document.getElementById("back-to-top");
        if (backToTopBtn) {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                backToTopBtn.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
            }
        }
    }

    const backToTopBtn = document.getElementById('back-to-top');
    if (backToTopBtn) {
        backToTopBtn.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
    let loaderTimeout;
    function showLoader() {
        document.getElementById('global-loader').style.display = 'flex';
    }
    function hideLoader() {
        document.getElementById('global-loader').style.display = 'none';
        clearTimeout(loaderTimeout);
    }
    loaderTimeout = setTimeout(showLoader, 1000);
    window.addEventListener('load', hideLoader);
</script>


</html>