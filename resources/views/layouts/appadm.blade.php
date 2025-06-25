<!DOCTYPE html>
<html lang="en">
<title>@yield ('title', 'Jogfood')</title>
<!-- favicon-->
<link rel="icon" href="assets/icon/favicon.png" type="image/x-icon">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap4 link -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="assets/styles/css/admin.css" rel="stylesheet" />
    <link href="assets/styles/flowbite.min.css" rel="stylesheet" />
    <script src="assets/styles/flowbite.min.js"></script>
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
                            500: '#f97316',  // This standard amber-500 matches your desired navbar color
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

<body class="bg-amber-50 min-h-screen">
    <!-- Include the header based on user role -->
    @if (session('user_role') == 'admin')
        <header>
            @include('components.navbar.adm-nav')
        </header>
    @else (session('user_role') == 'kurir')
        <header>
            @include('components.navbar.kurir-nav')
        </header>
    @endif
    <main>
        @yield('content')
    </main>
</body>