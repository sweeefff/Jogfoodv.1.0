@extends('layouts.user')
@section('title', 'Detail Pesanan - Jogfood')

@section('content')
<div class="bg-amber-100 min-h-screen">
    <!-- Tab navigation -->
    <div class="bg-amber-200">
        <div class="max-w-6xl mx-auto">
            <div class="flex overflow-x-auto" id="tab-status">
                <button data-status="pending"
                    class="tab-btn px-4 py-4 whitespace-nowrap font-medium border-b-2 text-amber-600 border-amber-500">Belum Dibayar</button>
                <button data-status="lunas"
                    class="tab-btn px-4 py-4 whitespace-nowrap font-medium border-b-2 text-gray-600 border-transparent">Sudah Dibayar</button>
                <button data-status="dibatalkan"
                    class="tab-btn px-4 py-4 whitespace-nowrap font-medium border-b-2 text-gray-600 border-transparent">Dibatalkan</button>
            </div>
        </div>
    </div>

    <!-- Search bar -->
    <div class="max-w-6xl mx-auto px-4 py-4">
        <div class="relative">
            <input type="text" placeholder="Kamu bisa cari berdasarkan Nama Produk, dan Nomor Pesanan."
                class="w-full p-3 pl-10 rounded-md border border-amber-300 text-sm" id="searchInput" />
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 text-amber-400 h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>

    <!-- Orders list -->
    <div class="max-w-6xl mx-auto px-4 pb-12" id="orders-list">
        @forelse ($riwayat as $transaksi)
            <div class="order-item"
                data-status="{{ $transaksi->status_transaksi }}"
                data-search="{{ strtolower(collect($transaksi->detail_transaksi)->pluck('menu.nama')->implode(' ') . ' ' . $transaksi->id_transaksi) }}">
                @include('components.card.cardpsn', [
                    'id_transaksi' => $transaksi->id_transaksi,
                    'status' => $transaksi->status_transaksi,
                    'menus' => $transaksi->detail_transaksi,
                    'total' => $transaksi->total_harga,
                    'transaksi' => $transaksi,
                    'id_status' => $transaksi->status_transaksi,
                    'id_struk' => optional($transaksi->struk)->id_struk,
                ])
            </div>
        @empty
            <div class="flex flex-col items-center text-gray-600 mt-8 empty-message" data-status="pending">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span class="text-2xl font-semibold mt-2">Belum Ada Pesanan</span>
            </div>
        @endforelse

        <!-- Pesan kosong untuk tiap tab -->
        <div class="flex flex-col items-center text-gray-600 mt-8 empty-message" data-status="pending" style="display:none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span class="text-2xl font-semibold mt-2">Belum ada pesanan menunggu.</span>
        </div>
        <div class="flex flex-col items-center text-gray-600 mt-8 empty-message" data-status="lunas" style="display:none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 17v-2a4 4 0 118 0v2m-4 4h.01M4 6h16M4 10h16M4 14h16" />
            </svg>
            <span class="text-2xl font-semibold mt-2">Belum ada pesanan lunas.</span>
        </div>
        <div class="flex flex-col items-center text-gray-600 mt-8 empty-message" data-status="dibatalkan" style="display:none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span class="text-2xl font-semibold mt-2">Tidak ada pesanan dibatalkan.</span>
        </div>
    </div>
</div>

<script>
    // Tab filter
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            // Tab style
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('text-amber-600', 'border-amber-500');
                b.classList.add('text-gray-600', 'border-transparent');
            });
            this.classList.add('text-amber-600', 'border-amber-500');
            this.classList.remove('text-gray-600', 'border-transparent');

            // Filter order items
            const status = this.getAttribute('data-status');
            let hasOrder = false;
            document.querySelectorAll('.order-item').forEach(item => {
                if (status === 'dibatalkan') {
                    if (item.getAttribute('data-status') === 'dibatalkan' || item.getAttribute('data-status') === 'kadaluwarsa') {
                        item.style.display = '';
                        hasOrder = true;
                    } else {
                        item.style.display = 'none';
                    }
                } else {
                    if (item.getAttribute('data-status') === status) {
                        item.style.display = '';
                        hasOrder = true;
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
            // Tampilkan/hide pesan kosong
            document.querySelectorAll('.empty-message').forEach(msg => {
                msg.style.display = (msg.getAttribute('data-status') === status && !hasOrder) ? '' : 'none';
            });
        });
    });

    // Default: tampilkan "Belum Dibayar"
    document.querySelector('.tab-btn[data-status="pending"]').click();

    // Search filter
    document.getElementById('searchInput').addEventListener('input', function () {
        const keyword = this.value.toLowerCase();
        const status = document.querySelector('.tab-btn.text-amber-600').getAttribute('data-status');
        let hasOrder = false;
        document.querySelectorAll('.order-item').forEach(item => {
            const search = item.getAttribute('data-search');
            const matchStatus = (status === 'dibatalkan')
                ? (item.getAttribute('data-status') === 'dibatalkan' || item.getAttribute('data-status') === 'kadaluwarsa')
                : (item.getAttribute('data-status') === status);
            if (search.includes(keyword) && matchStatus) {
                item.style.display = '';
                hasOrder = true;
            } else {
                item.style.display = 'none';
            }
        });
        // Tampilkan/hide pesan kosong
        document.querySelectorAll('.empty-message').forEach(msg => {
            msg.style.display = (msg.getAttribute('data-status') === status && !hasOrder) ? '' : 'none';
        });
    });
</script>
@endsection
