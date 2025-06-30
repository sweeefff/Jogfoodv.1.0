@extends(session()->has('user_id') ? 'layouts.user' : 'layouts.guest')

@section('title', 'Menu Makanan')

@section('content')
    <link rel=stylesheet href="assets/style/css/menu.css">
    <div class="bg-amber-50 flex justify-center py-12">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                @if(request('search'))
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Menu dengan hasil pencarian "{{ request('search') }}"
                    </h2>
                    <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                        Temukan berbagai menu khas Jogja yang sesuai pencarianmu.
                    </p>
                @else
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Menu {{ $kategori }}
                    </h2>
                    <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                        Temukan berbagai {{ $kategori }} khas Jogja yang lezat
                    </p>
                @endif
            </div>
        </div>
    </div>

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
    @if($menu instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="flex justify-center mt-8 mb-12">
        {{ $menu->appends(request()->except('page'))->links('pagination::tailwind') }}
    </div>
    @endif

    {{-- SweetAlert Toast --}}
    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif
@endsection
