@extends('layouts.appadm')
@section('title', 'Order - Jogfood')
@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
        }

        .order-card {
            background: white;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #f59e0b;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .order-id {
            font-weight: bold;
            font-size: 16px;
            color: #374151;
        }

        .order-date {
            font-size: 12px;
            color: #9ca3af;
            text-transform: uppercase;
        }

        .customer-name {
            font-weight: 600;
            color: #374151;
            margin-bottom: 4px;
        }

        .customer-address {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.4;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-process {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-failed {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .cod-button {
            background-color: #10b981;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
        }

        .process-button {
            background-color: #f59e0b;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
        }

        .detail-button {
            background-color: #3b82f6;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
        }

        .tabs {
            display: flex;
            background: white;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tab {
            flex: 1;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            font-weight: 600;
            border-bottom: 3px solid transparent;
        }

        .tab.active {
            border-bottom-color: #f59e0b;
            color: #f59e0b;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .item-list {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>

    <div class="main-content min-h-screen lg:px-16 md:px-6 px-4 py-6 mt-10">
        <div class="bg-gray-50 min-h-screen">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Antaran</h1>
                <p class="text-gray-600">Kelola pesanan yang sedang dikirim</p>
            </div>

            <!-- On Going Tab Content -->
            <div id="ongoing" class="tab-content active">
                @forelse($transaksi->where('status_pengiriman.status_pengiriman', 'dikirim') as $item)
                    <div class="order-card">
                        <div class="order-date">
                            DELIVERY | {{ \Carbon\Carbon::parse($item->created_at)->format('M d, H:i') }}
                        </div>

                        <div class="order-header">
                            <div class="order-id">#{{ substr($item->id_transaksi, -8) }}</div>
                            <div class="status-badge status-process">Sedang Dikirim</div>
                        </div>

                        <div class="customer-name">{{ $item->user->name ?? '-' }}</div>
                        <div class="customer-address">{{ $item->user->alamat ?? 'Alamat tidak tersedia' }}</div>

                        <div class="flex justify-between items-center mt-3">
                            <div class="flex gap-2">
                                @if($item->pembayaran && $item->pembayaran->metode_pembayaran == 'cod')
                                    <button class="cod-button">COD</button>
                                @endif
                                <button class="detail-button" onclick="toggleDetail('{{ $item->id_transaksi }}')">
                                    LIHAT DETAIL
                                </button>
                                <a href="{{ route('kurir.showUpdate', $item->id_transaksi) }}">
                                    <button class="process-button">
                                        UPDATE STATUS
                                    </button>
                                </a>
                            </div>
                            <div>
                                <span class="font-semibold">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Detail Section (Hidden by default) -->
                        <div id="detail-{{ $item->id_transaksi }}" class="hidden mt-4 pt-4 border-t border-gray-200">
                            <div class="space-y-3">
                                <div class="grid grid-cols-2 gap-4">
                                    <div><strong>Order ID:</strong> {{ $item->id_transaksi }}</div>
                                    <div><strong>Tanggal:</strong>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</div>
                                </div>

                                <div><strong>Metode Pembayaran:</strong>
                                    {{ $item->pembayaran->metode_pembayaran ?? 'Tidak tersedia' }}
                                </div>

                                <div><strong>Alamat Pengiriman:</strong> {{ $item->user->alamat ?? 'Tidak tersedia' }}</div>

                                <div><strong>Item yang Dipesan:</strong></div>
                                <div class="item-list bg-gray-50 p-3 rounded">
                                    @forelse($item->detail_transaksi as $detail)
                                        <div
                                            class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                                            <div class="flex-1">
                                                <div class="font-medium">{{ $detail->menu->nama ?? 'Menu tidak tersedia' }}</div>
                                                <div class="text-sm text-gray-500">
                                                    Qty: {{ $detail->jumlah }} × Rp
                                                    {{ number_format($detail->harga_satuan, 0, ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="font-semibold">
                                                Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-gray-500 text-center py-2">Tidak ada item</div>
                                    @endforelse
                                </div>

                                <div class="pt-2 border-t border-gray-300">
                                    <div class="flex justify-between font-semibold text-lg">
                                        <span>Total:</span>
                                        <span>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Update Status Section (Hidden by default) -->
                        <div id="update-{{ $item->id_transaksi }}" class="hidden mt-4 pt-4 border-t border-gray-200">
                            <form action="{{ route('kurir.updateStatus', $item->id_transaksi) }}" method="POST"
                                class="space-y-3">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label class="block text-sm font-semibold mb-1">Status Pengiriman</label>
                                    <select name="status_pengiriman" class="w-full border rounded px-3 py-2" required>
                                        <option value="">Pilih Status</option>
                                        <option value="selesai">Berhasil Dikirim</option>
                                        <option value="antar-ulang">Perlu Antar Ulang</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold mb-1">Nama Penerima</label>
                                    <input type="text" name="nama_penerima" class="w-full border rounded px-3 py-2"
                                        placeholder="Nama yang menerima pesanan" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold mb-1">Alasan (jika perlu antar ulang)</label>
                                    <textarea name="alasan" class="w-full border rounded px-3 py-2 h-20"
                                        placeholder="Contoh: Penerima tidak di rumah, alamat tidak ditemukan, dll."></textarea>
                                </div>

                                <button type="submit"
                                    class="w-full bg-amber-600 text-white py-2 rounded hover:bg-amber-700 transition-colors">
                                    Update Status
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 text-gray-400">
                        <div class="text-6xl mb-4">📦</div>
                        <div class="text-xl font-semibold mb-2">Tidak ada pesanan</div>
                        <div>Belum ada pesanan yang perlu dikirim saat ini.</div>
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
            }
        }

        function toggleUpdate(id) {
            const row = document.getElementById('update-' + id);
            if (row) {
                row.classList.toggle('hidden');
            }
        }
    </script>
@endsection