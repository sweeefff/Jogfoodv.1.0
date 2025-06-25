@extends(session()->has('user_id') ? 'layouts.user' : 'layouts.guest')

@section('title', 'Menu Makanan')

@section('content')
    <link rel=stylesheet href="assets/style/css/menu.css">
    <div class="bg-amber-50 flex justify-center py-12">
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

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg mx-auto" role="alert" style="max-width: 650px;">
            <p class="font-bold">Berhasil</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Sort by dropdown -->
    <div class="max-w-7xl mx-auto px-4 flex justify-end mb-4">
        <!-- (sort menu tetap seperti sebelumnya) -->
    </div>

<div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($menu as $item => $menu)
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

    <!-- Pagination (boleh disembunyikan jika sedang search) -->
    <div class="flex justify-center mt-8 mb-12" id="pagination">
        <nav class="inline-flex rounded-md shadow">
            <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Previous</a>
            <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">1</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">2</a>
            <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">3</a>
            <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Next</a>
        </nav>
    </div>
@endsection
