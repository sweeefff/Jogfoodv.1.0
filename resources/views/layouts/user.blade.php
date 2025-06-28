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
</script>
<!-- 🧠 Script Live Search -->
<!-- <script>
        $('#search-input').on('keyup', function () {
            let query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url:"",
                    type: "GET",
                    data: { query: query },
                    success: function (data) {
                        $('#menu-list').empty();
                        $('#pagination').hide();

                        if (data.length === 0) {
                            $('#menu-list').append('<p class="col-span-3 text-center text-gray-500">Tidak ada menu ditemukan</p>');
                        } else {
                            $.each(data, function (i, item) {
                                $('#menu-list').append(`
                                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                        <img src="/gambar/${item.gambar_menu}" alt="${item.nama}" class="w-full h-48 object-cover">
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-900">${item.nama}</h3>
                                            <p class="text-sm text-gray-600">${item.deskripsi_menu}</p>
                                            <p class="text-amber-600 font-semibold mt-2">Rp. ${parseInt(item.harga).toLocaleString('id-ID')}</p>
                                        </div>
                                    </div>
                                `);
                            });
                        }
                    }
                });
            } else {
                location.reload(); // reset ke awal kalau input dikosongkan
            }
        });
    </script> -->

</html>