@extends('layouts.appadm')

@section('title', 'Antaran - Jogfood')
@section('content')
<div class="main-content min-h-screen bg-amber-50">
    <!-- Container with proper responsive padding -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-8 xl:py-12 mt-16 lg:mt-20">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Antaran</h1>
            <p class="text-gray-600 text-sm sm:text-base">Kelola pesanan yang sedang dikirim</p>
        </div>

        <!-- On Going Tab Content -->
        <div id="ongoing" class="tab-content active">
            @forelse($transaksi->where('status_pengiriman.status_pengiriman', 'dikirim') as $item)
                <div
                    class="order-card bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 p-4 sm:p-6 mb-4 sm:mb-6 mt-4">
                    <!-- Order Date -->
                    <div class="order-date text-xs sm:text-sm text-gray-600 mb-3">
                        DELIVERY | {{ \Carbon\Carbon::parse($item->created_at)->format('M d, H:i') }}
                    </div>

                    <!-- Order Header -->
                    <div
                        class="order-header flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-0 mb-4">
                        <div class="order-id text-lg sm:text-xl font-bold text-gray-800">
                            #{{ substr($item->id_transaksi, -8) }}
                        </div>
                        <div
                            class="status-badge bg-blue-100 text-blue-800 rounded-full px-3 py-1 text-xs font-semibold w-fit">
                            Sedang Dikirim
                        </div>
                    </div>

                    <!-- Customer Info -->
                    <div class="customer-info mb-4">
                        <div class="customer-name font-semibold text-gray-800 text-base sm:text-lg mb-1">
                            {{ $item->user->name ?? '-' }}
                        </div>
                        <div class="customer-address text-sm text-gray-600 leading-relaxed">
                            {{ $item->user->alamat ?? 'Alamat tidak tersedia' }}
                        </div>
                    </div>

                    <!-- Actions and Price -->
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                        <!-- Action Buttons -->
                        <div class="flex flex-wrap gap-2">
                            @if($item->pembayaran && $item->pembayaran->metode_pembayaran == 'cod')
                                <span class="cod-badge bg-yellow-500 text-white rounded-full px-3 py-1 text-xs font-semibold">
                                    COD
                                </span>
                            @endif
                            <button
                                class="detail-button bg-blue-500 hover:bg-blue-600 text-white rounded-full px-3 py-1 text-xs font-semibold transition-colors duration-200"
                                onclick="toggleDetail('{{ $item->id_transaksi }}')">
                                LIHAT DETAIL
                            </button>
                            <a href="{{ route('kurir.showUpdate', $item->id_transaksi) }}">
                                <button
                                    class="process-button bg-orange-500 hover:bg-orange-600 text-white rounded-full px-3 py-1 text-xs font-semibold transition-colors duration-200">
                                    UPDATE STATUS
                                </button>
                            </a>
                        </div>

                        <!-- Price -->
                        <div class="font-bold text-lg sm:text-xl text-gray-800">
                            Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                        </div>
                    </div>

                    <!-- Detail Section (Hidden by default) -->
                    <div id="detail-{{ $item->id_transaksi }}" class="hidden mt-6 pt-4 border-t border-gray-200">
                        <div class="space-y-4">
                            <!-- Order Info Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                                <div class="space-y-2">
                                    <div><span class="font-semibold">Order ID:</span> {{ $item->id_transaksi }}</div>
                                    <div><span class="font-semibold">Tanggal:</span>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</div>
                                </div>
                                <div class="space-y-2">
                                    <div><span class="font-semibold">Metode Pembayaran:</span>
                                        {{ $item->pembayaran->metode_pembayaran ?? 'Tidak tersedia' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Delivery Address -->
                            <div class="text-sm">
                                <span class="font-semibold">Alamat Pengiriman:</span>
                                <div class="mt-1 text-gray-600">{{ $item->user->alamat ?? 'Tidak tersedia' }}</div>
                            </div>

                            <!-- Items Ordered -->
                            <div>
                                <div class="font-semibold text-sm mb-3">Item yang Dipesan:</div>
                                <div class="item-list bg-gray-50 rounded-lg p-3 sm:p-4">
                                    @forelse($item->detail_transaksi as $detail)
                                        <div
                                            class="flex flex-col sm:flex-row sm:justify-between sm:items-center py-3 border-b border-gray-200 last:border-b-0 gap-2">
                                            <div class="flex-1">
                                                <div class="font-medium text-gray-800">
                                                    {{ $detail->menu->nama ?? 'Menu tidak tersedia' }}
                                                </div>
                                                <div class="text-sm text-gray-500 mt-1">
                                                    Qty: {{ $detail->jumlah }} × Rp
                                                    {{ number_format($detail->harga_satuan, 0, ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="font-semibold text-gray-800 text-right">
                                                Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-gray-500 text-center py-4">Tidak ada item</div>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="pt-4 border-t border-gray-200">
                                <div class="flex justify-between items-center font-bold text-lg">
                                    <span>Total:</span>
                                    <span>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Status Section (Hidden by default) -->
                    <div id="update-{{ $item->id_transaksi }}" class="hidden mt-6 pt-4 border-t border-gray-200">
                        <form action="{{ route('kurir.updateStatus', $item->id_transaksi) }}" method="POST"
                            class="space-y-4">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-gray-700">Status Pengiriman</label>
                                <select name="status_pengiriman"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                                    required>
                                    <option value="">Pilih Status</option>
                                    <option value="selesai">Berhasil Dikirim</option>
                                    <option value="antar-ulang">Perlu Antar Ulang</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-gray-700">Nama Penerima</label>
                                <input type="text" name="nama_penerima"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                                    placeholder="Nama yang menerima pesanan" required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-2 text-gray-700">Alasan (jika perlu antar
                                    ulang)</label>
                                <textarea name="alasan"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 h-24 resize-none focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                                    placeholder="Contoh: Penerima tidak di rumah, alamat tidak ditemukan, dll."></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-amber-600 hover:bg-amber-700 text-white py-3 rounded-lg font-semibold transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                                Update Status
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 sm:py-16">
                    <div class="text-4xl sm:text-6xl mb-4">📦</div>
                    <div class="text-xl sm:text-2xl font-semibold mb-2 text-gray-400">Tidak ada pesanan</div>
                    <div class="text-gray-500 text-sm sm:text-base">Belum ada pesanan yang perlu dikirim saat ini.</div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    function toggleDetail(id) {
        const row = document.getElementById('detail-' + id);
        if (row) {
            row.classList.toggle('hidden');

            // Smooth scroll to detail section when opened
            if (!row.classList.contains('hidden')) {
                setTimeout(() => {
                    row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            }
        }
    }

    function toggleUpdate(id) {
        const row = document.getElementById('update-' + id);
        if (row) {
            row.classList.toggle('hidden');

            // Smooth scroll to update section when opened
            if (!row.classList.contains('hidden')) {
                setTimeout(() => {
                    row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            }
        }
    }
</script>