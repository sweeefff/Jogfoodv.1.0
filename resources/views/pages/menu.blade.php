@extends('layouts.app')

@section('title', 'Menu Makanan')

@section('content')
    <link rel=stylesheet href="assets/css/menu.css">
    <div class="bg-white flex justify-center py-12">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Menu {{ $kategori }}
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Temukan berbagai {{ $kategori }} khas Jogja yang lezat
                </p>
            </div>
        </div>
    </div>

    <!-- Sort by dropdown -->
    <div class="max-w-7xl mx-auto px-4 flex justify-end mb-4">
        <div class="sort-dropdown">
            <button
                class="flex items-center text-gray-700 bg-white border border-gray-300 rounded-lg px-4 py-2 hover:bg-gray-50">
                <i class="fas fa-sort mr-2"></i>
                Sort by: <span class="ml-1 font-medium">Populer</span>
                <i class="fas fa-chevron-down ml-2 text-xs"></i>
            </button>
            <div class="sort-dropdown-content">
                <a href="#" class="sort-option font-semibold text-amber-600" data-sort="popularity"
                    onclick="sortFoodCards('popularity')">
                    <i class="fas fa-star mr-2"></i>Populer
                </a>
                <a href="#" class="sort-option" data-sort="price-low" onclick="sortFoodCards('price-low')">
                    <i class="fas fa-arrow-down mr-2"></i>Termurah
                </a>
                <a href="#" class="sort-option" data-sort="price-high" onclick="sortFoodCards('price-high')">
                    <i class="fas fa-arrow-up mr-2"></i>Termahal
                </a>
                <a href="#" class="sort-option" data-sort="name" onclick="sortFoodCards('name')">
                    <i class="fas fa-sort-alpha-down mr-2"></i>Secara Alfabet
                </a>
            </div>
        </div>
    </div>
    @foreach ($menu as $item => $menu)

        @include('components.card.card', [
            'nama' => $menu->nama,
            'gambar_menu' => $menu->gambar_menu,
            'desc' => $menu->deskripsi_menu,
            'rating' => 4.5,
            'harga' => 'Rp. ' . number_format($menu->harga, 0, ',', '.'),
        ])
        @endforeach

        <!-- Pagination -->
        <div class="flex justify-center mt-8 mb-12">
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    Previous
                </a>
                <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    1
                </a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    3
                </a>
                <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    Next
                </a>
            </nav>
        </div>
    </div>
@endsection