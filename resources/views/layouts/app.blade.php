<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Jogfood')</title>
    <!-- favicon-->
    <link rel="icon" href="{{ asset('assets/icon/favicon.png') }}" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSS & JS Resources -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('assets/css/flowbite.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/css/flowbite.min.js') }}" defer></script>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
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
    <header>
        @include('components.header')
    </header>

    <main class="flex-grow bg-amber-50">
        @yield('content')
    </main>

    <footer>
        @include('components.footer')
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
</script>

</html>