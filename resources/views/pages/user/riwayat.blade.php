
@extends('layouts.user')

@section('title', 'Riwayat Pemesanan')

@section('content')
<div class="flex-1 flex flex-col min-h-screen bg-amber-50">
    <div class="bg-amber-50 p-6 border-b border-amber-200">
        <h1 class="text-2xl font-bold text-center text-amber-700">RIWAYAT PEMESANAN</h1>
    </div>

    <!-- Tab navigation -->
    <div class="max-w-6xl mx-auto">
        <div class="flex overflow-x-auto" id="tab-status">
            <button data-status="menunggu"
                class="tab-btn px-4 py-4 whitespace-nowrap font-medium border-b-2 text-amber-600 border-amber-500">Menunggu</button>
            <button data-status="dikirim"
                class="tab-btn px-4 py-4 whitespace-nowrap font-medium border-b-2 text-gray-600 border-transparent">Dikirim</button>
            <button data-status="selesai"
                class="tab-btn px-4 py-4 whitespace-nowrap font-medium border-b-2 text-gray-600 border-transparent">Selesai</button>
            <button data-status="dibatalkan"
                class="tab-btn px-4 py-4 whitespace-nowrap font-medium border-b-2 text-gray-600 border-transparent">Dibatalkan</button>
        </div>
    </div>

    <div class="container mx-auto flex-grow px-4 pb-12" id="orders-list">
        @forelse ($riwayat as $transaksi)
            <div class="order-item mb-6 bg-white rounded-xl shadow p-4"
                data-status="{{ $transaksi->status_pengiriman->status_pengiriman ?? 'menunggu' }}">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-2">
                    <div class="font-semibold text-amber-700">
                        ID Transaksi: {{ $transaksi->id_transaksi }}
                        <span class="text-xs text-gray-500">
                            ({{ $transaksi->created_at ? $transaksi->created_at->format('d M Y H:i') : '' }})
                        </span>
                    </div>
                    <!--Status pengiriman-->
                    <div class="mt-2 lg:mt-0 flex items-center justify-end w-full lg:w-auto">
                        @if ($transaksi->status_pengiriman && $transaksi->status_pengiriman->status_pengiriman == 'menunggu')
                            <div class="flex items-center text-yellow-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="mr-1">Pesanan sedang dibuat</span>
                                <strong class="ml-2 text-gray-600 font-bold">|</strong>
                                <div class="ml-2 text-yellow-500 font-semibold">MENUNGGU</div>
                            </div>
                        @elseif ($transaksi->status_pengiriman && $transaksi->status_pengiriman->status_pengiriman == 'dikirim')
                            <div class="flex items-center text-blue-500">
                                <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                </svg>
                                <span class="mr-1">Pesanan sedang menuju alamat tujuan</span>
                                <strong class="ml-2 text-gray-600 font-bold">|</strong>
                                <div class="ml-2 text-blue-500 font-semibold">DIKIRIM</div>
                            </div>
                        @elseif ($transaksi->status_pengiriman && $transaksi->status_pengiriman->status_pengiriman == 'selesai')
                            <div class="flex items-center text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="mr-1">Pesanan tiba di alamat tujuan, diterima oleh Yang bersangkutan.</span>
                                <strong class="ml-2 text-gray-600 font-bold">|</strong>
                                <div class="ml-2 text-green-500 font-semibold">SELESAI</div>
                            </div>
                        @elseif ($transaksi->status_pengiriman && $transaksi->status_pengiriman->status_pengiriman == 'dibatalkan')
                            <div class="flex items-center text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="mr-1">Pesanan dibatalkan</span>
                                <strong class="ml-2 text-gray-600 font-bold">|</strong>
                                <div class="ml-2 text-red-500 font-semibold">DIBATALKAN</div>
                            </div>
                        @endif
                    </div>
                </div>
                @foreach ($transaksi->detail_transaksi as $detail)
                    @include('components.card.cardrwyt', [
                        'id_transaksi' => $transaksi->id_transaksi,
                        'id_detail' => $detail->id_detail,
                        'id_menu' => $detail->menu->id_menu,
                        'nama' => $detail->menu->nama,
                        'gambar_menu' => $detail->menu->gambar_menu,
                        'variasi' => $detail->opsi,
                        'jumlah' => 'x' . $detail->jumlah,
                        'harga' => 'Rp. ' . number_format($detail->menu->harga * $detail->jumlah, 0, ',', '.'),
                        'diskon' => 'Rp. ' . number_format($detail->subtotal, 0, ',', '.'),
                    ])
                @endforeach
                <div class="flex justify-start items-center px-6 pb-4">
                    <span class="text-gray-700 font-semibold mr-2">Total Pesanan:</span>
                    <span class="text-orange-500 font-bold text-lg">Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center text-gray-600 mt-8">
                <i class="fas fa-box-open text-6xl mb-4"></i>
                <p class="text-center">Belum ada riwayat pemesanan.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    // Tab filter
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', () => {
            const status = button.getAttribute('data-status');

            // Remove active class from all buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('text-amber-600', 'border-amber-500');
                btn.classList.add('text-gray-600', 'border-transparent');
            });

            // Add active class to the clicked button
            button.classList.add('text-amber-600', 'border-amber-500');
            button.classList.remove('text-gray-600', 'border-transparent');

            // Filter orders based on status
            document.querySelectorAll('.order-item').forEach(order => {
                if (order.getAttribute('data-status') === status || status === 'all') {
                    order.classList.remove('hidden');
                } else {
                    order.classList.add('hidden');
                }
            });
        });
    });

    // Default: tampilkan tab "Menunggu" saat halaman dibuka
    document.querySelector('.tab-btn[data-status="menunggu"]').click();
</script>
@endsection

