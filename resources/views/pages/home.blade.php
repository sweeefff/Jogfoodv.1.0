@extends('layouts.apphome')

@section('title', 'Selamat Datang')

@section('content')
    <style>
        .hero {
            background-image: url("assets/img/jogja1.jpg");
            background-size: cover;
            background-position: center;
        }

        .qt {
            background-image: url("assets/img/qt-bg.jpg");
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

            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Hidangan 1 -->
                <div
                    class="food-card group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                        <img src="{{ asset('assets/img/gudeg.jpg') }}" alt="Gudeg"
                            class="h-60 w-full object-cover object-center food-image transition duration-300">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Gudeg</h3>
                                <p class="mt-1 text-sm text-gray-500">Rebung nangka manis</p>
                            </div>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-fire mr-1"></i> Populer
                            </span>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex items-center">
                                <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                                <span class="text-gray-500 text-sm">Gudeg Yu Djum</span>
                            </div>
                            <span class="text-gray-900 font-medium">Rp 25.000</span>
                        </div>
                    </div>
                </div>

                <!-- Hidangan 2 -->
                <div
                    class="food-card group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                        <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246?q=80&w=2070&auto=format&fit=crop"
                            alt="Sate Klathak"
                            class="h-60 w-full object-cover object-center food-image transition duration-300">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Sate Klathak</h3>
                                <p class="mt-1 text-sm text-gray-500">Sate kambing bakar</p>
                            </div>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-fire mr-1"></i> Populer
                            </span>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex items-center">
                                <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                                <span class="text-gray-500 text-sm">Sate Klathak Pak Bari</span>
                            </div>
                            <span class="text-gray-900 font-medium">Rp 35.000</span>
                        </div>
                    </div>
                </div>

                <!-- Hidangan 3 -->
                <div
                    class="food-card group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                        <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?q=80&w=2127&auto=format&fit=crop"
                            alt="Bakpia" class="h-60 w-full object-cover object-center food-image transition duration-300">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Bakpia Pathok</h3>
                                <p class="mt-1 text-sm text-gray-500">Pastry kacang manis</p>
                            </div>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-fire mr-1"></i> Populer
                            </span>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex items-center">
                                <i class="fas fa-utensils text-gray-400 text-sm mr-1"></i>
                                <span class="text-gray-500 text-sm">Bakpia Pathok 25</span>
                            </div>
                            <span class="text-gray-900 font-medium">Rp 40.000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 flex items-center justify-center">
                <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white 
                                        bg-amber-600 hover:bg-amber-700">
                    Lihat Semua Menu
                    <svg class="ml-3 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
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
                            <img src="{{ asset('assets/img/gudeg.jpg') }}" alt="Gudeg Yogyakarta"
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
                            <img src="{{ asset('assets/img/gudeg-transformed.png') }}" alt="Wedang Uwuh"
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