@extends(session()->has('user_id') ? 'layouts.user' : 'layouts.guest')

@section('title', 'Selamat Datang')

@section('content')
    <style>
        .hero {
            background-image: url("assets/icon/jogja1.jpg");
            background-size: cover;
            background-position: center;
        }

        .qt {
            background-image: url("assets/icon/qt-bg.jpg");
            background-size: cover;
            background-position: center;
        }
    </style>
    <!---========== Start Banner ========-->
    <div class="hero bg-gray-800 bg-opacity-50 pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                    <span class="block">Temukan yang Terbaik</span>
                    <span class="block text-amber-400">Kuliner di Jogja</span>
                </h1>
                <p
                    class="mt-3 max-w-md mx-auto text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl text-shadow-lg">
                    Jelajahi hidangan tradisional di Yogyakarta dan nikmati pengalaman kuliner yang tak
                    terlupakan
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    <div class="rounded-md shadow">
                        <a href="menu" class="w-full flex items-center justify-center px-8 py-3 border border-transparent
                                                text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-300 md:py-4 md:text-lg md:px-10">
                            Jelajahi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Pencarian -->
    <div class="bg-amber-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 -mt-8 rounded-lg relative z-10">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text"
                    class="block w-full pl-10 pr-3 py-4 border border-gray-300 rounded-lg bg-gray-50 focus:ring-amber-500 focus:border-amber-500"
                    placeholder="Cari makanan, restoran, atau masakan...">
                <button
                    class="absolute right-2.5 bottom-2.5 bg-amber-600 
                                        hover:bg-amber-300 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 text-white bg-amber-600">
                    Cari
                </button>
            </div>
        </div>
    </div>
    <!--=========== Akhir Banner ==========-->
    <!--=========== Mulai Bagian Menu ==========-->
    <div class="bg-amber-50 flex justify-center py-12">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Hidangan Wajib Dicoba
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Favorit lokal yang tak boleh dilewatkan
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($topMenus as $menu)
                    @include('components.card.card', [
                        'id' => $menu->id_menu,
                        'nama' => $menu->nama,
                        'gambar_menu' => $menu->gambar_menu,
                        'desc' => $menu->deskripsi_menu,
                        'rating' => round($menu->avg_rating, 1),
                        'total_ulasan' => $menu->total_ulasan,
                        'harga' => 'Rp. ' . number_format($menu->harga, 0, ',', '.'),
                    ])
                @endforeach
            </div>
            <div class="flex justify-center mt-6">
                <a href="{{ route('menu.index') }}"
                class="inline-block px-8 py-3 bg-amber-600 text-white rounded-full font-semibold shadow transition-all duration-300 hover:bg-amber-700">
                Lihat Lainnya
                </a>
            </div>
        </div>
    </div>
    <!--====== End Menu Section =======-->

    <!--===========About Section===========-->
    <div class="bg-amber-100">
        <!-- Food Section -->
        <section class="py-16 px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2 text-center lg:text-left">
                        <div class="space-y-6">
                            <h1 class="text-4xl md:text-5xl font-bold text-gray-800">
                                Makanan <span class="text-amber-600">Terpopuler!</span>
                            </h1>
                            <h4 class="text-2xl font-semibold text-gray-700">Gudeg</h4>
                            <p class="text-gray-600 leading-relaxed">
                                Gudeg adalah hidangan khas Provinsi Daerah Istimewa Yogyakarta yang terbuat dari
                                nangka muda yang dimasak dengan santan. Perlu waktu berjam-jam untuk membuat
                                hidangan ini.
                                Warna coklat biasanya dihasilkan oleh daun jati yang dimasak bersamaan.
                            </p>
                            <p class="text-gray-600 leading-relaxed">
                                Gudeg biasanya dimakan dengan nasi dan disajikan dengan kuah santan kental
                                (areh), ayam kampung, telur, tempe, tahu dan sambal goreng krecek.
                            </p>
                            <a href="#"
                                class="inline-block px-8 py-3 bg-amber-600 text-white rounded-full font-medium transition-all duration-300 hover:bg-amber-700 btn-hover">
                                Rincian
                            </a>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="rounded-xl overflow-hidden shadow-xl">
                            <img src="{{ asset('assets/img/menu/gudeg.jpg') }}" alt="Gudeg Yogyakarta"
                                class="w-full h-auto object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Drink Section -->
        <section class="py-16 px-4 bg-amber-50">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <div class="rounded-xl overflow-hidden custom-shadow">
                            <img src="{{ asset('assets/img/menu/gudeg-transformed.png') }}" alt="Wedang Uwuh"
                                class="w-full h-auto object-cover">
                        </div>
                    </div>
                    <div class="lg:w-1/2 text-center lg:text-left">
                        <div class="space-y-6">
                            <h1 class="text-4xl md:text-5xl font-bold text-gray-800">
                                Minuman <span class="text-amber-600">Terpopuler!</span>
                            </h1>
                            <h4 class="text-2xl font-semibold text-gray-700">Wedang Uwuh</h4>
                            <p class="text-gray-600 leading-relaxed">
                                Wedang Uwuh adalah minuman dengan bahan-bahan yang berupa dedaunan mirip dengan
                                rempah. Dalam bahasa Jawa, Wedang berarti minuman yang diseduh, sedangkan uwuh
                                berarti sampah.
                            </p>
                            <p class="text-gray-600 leading-relaxed">
                                Di Yogyakarta sendiri Wedang Uwuh sangat mudah sekali untuk dijumpai. Mulai dari
                                pasar-pasar Tradisional, Rumah Makan, Kafe, Tempat oleh-oleh. Selain itu Wedang Uwuh
                                juga
                                menjadi salah satu andalan oleh-oleh khas dari Yogyakarta yang selalu dicari oleh
                                para
                                wisatawan saat mereka berkunjung ke Yogyakarta.
                            </p>
                            <a href="#" class="inline-block px-8 py-3 bg-amber-600 text-white rounded-full font-medium 
                                                    transition-all duration-300 hover:bg-amber-700 btn-hover">
                                Rincian
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- End Section -->
    <!--============Start QT Section===========-->
    <div class="qt relative h-72 bg-cover bg-center">
        <div class="absolute inset-0 bg-black/40"></div> <!-- Overlay hitam transparan -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <p class="text-xl md:text-3xl font-light mb-2 leading-relaxed">
                "Di setiap sudut Jogja membawa cerita masing-masing bagi pengunjungnya. Sama sepertiku yang punya
                cerita denganmu disana."
            </p>
            <p class="text-xl md:text-3xl font-bold">
                Someone
            </p>
        </div>
    </div>

    <!--============ Back to Top ============-->
    <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fas fa-angle-up"
            aria-hidden="true"></i></a>
@endsection