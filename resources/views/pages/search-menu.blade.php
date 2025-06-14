@extends(session()->has('user_id') ? 'layouts.user' : 'layouts.guest')

@section('title', 'Menu Makanan')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/style/css/menu.css') }}">

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

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg mx-auto" role="alert" style="max-width: 650px;">
            <p class="font-bold">Berhasil</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Menu Cards -->
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @forelse ($menu as $item => $menu)
    @include('components.card.card', [
        'id' => $menu->id_menu,
        'nama' => $menu->nama,
        'gambar_menu' => $menu->gambar_menu,
        'desc' => $menu->deskripsi_menu,
        'rating' => 4.5,
        'harga' => 'Rp. ' . number_format($menu->harga, 0, ',', '.'),
    ])
    
        @empty
            <div class="col-span-full text-center text-gray-500">Menu tidak ditemukan.</div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if ($menu instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="flex justify-center mt-8 mb-12" id="pagination">
            {{ $menu->appends(request()->input())->links() }}
        </div>
    @endif

    <h2>{{ $menu->id_menu }}</h2>
@endsection
