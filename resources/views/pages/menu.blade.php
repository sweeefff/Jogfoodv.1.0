@extends(session()->has('user_id') ? 'layouts.user' : 'layouts.guest')

@section('title', 'Menu Makanan')

@section('content')
    <link rel=stylesheet href="assets/style/css/menu.css">
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

    <!-- 🔍 Input Live Search -->
    <div class="max-w-7xl mx-auto px-4 mb-6">
        <input type="text" id="search-input" placeholder="Cari makanan atau minuman..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
    </div>

    <!-- Sort by dropdown -->
    <div class="max-w-7xl mx-auto px-4 flex justify-end mb-4">
        <!-- (sort menu tetap seperti sebelumnya) -->
    </div>
<<<<<<< HEAD
<div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($menu as $item => $menu)
    @include('components.card.card', [
        'id' => $menu->id_menu,
        'nama' => $menu->nama,
        'gambar_menu' => $menu->gambar_menu,
        'desc' => $menu->deskripsi_menu,
        'rating' => 4.5,
        'harga' => 'Rp. ' . number_format($menu->harga, 0, ',', '.'),
    ])
    @endforeach
</div>
=======
>>>>>>> 31bfcd5c2650abb1f1fc63a096bf5bc816225b83

    <!-- 🔽 Tempat hasil menu -->
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6" id="menu-list">
        @foreach ($menu as $item => $menu)
            @include('components.card.card', [
                'nama' => $menu->nama,
                'gambar_menu' => $menu->gambar_menu,
                'desc' => $menu->deskripsi_menu,
                'rating' => 4.5,
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

    <!-- 🧠 Script Live Search -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#search-input').on('keyup', function () {
            let query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('produk.search') }}",
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
    </script>
@endsection
