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
    <header>
        @include('components.homenav')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('components.footer')
    </footer>
</body>