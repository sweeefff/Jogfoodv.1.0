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
    </style>

    <div class="main-content min-h-screen lg:px-16 md:px-6 px-4 py-6 mt-10">
        <div class="bg-gray-50 min-h-screen">
            <!-- On Going Tab Content -->
            @foreach($transaksi = Transaksi::with(['user', 'detail_transaksi.menu', 'pembayaran'])->where('status_pengiriman', 'dikirim') as $transaksi)
                <div class="order-card">
                    <div class="order-date">
                        DELIVERY | {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('M d, H:i') }}
                    </div>

                    <div class="order-header">
                        <div class="order-id">{{ $transaksi->id_transaksi }}</div>
                    </div>

                    <div class="customer-name">{{ $transaksi->user->name ?? '-' }}</div>
                    <div class="customer-address">{{ $transaksi->user->alamat ?? '-' }}</div>

                    <div class="flex justify-between items-center mt-3">
                        <div>
                            @if($transaksi->pembayaran->metode_pembayaran == 'cod')
                                <button class="cod-button" onclick="toggleUpdate('{{ $transaksi->id_transaksi }}')">COD</button>
                            @endif
                            <button class="process-button ml-2" onclick="toggleDetail('{{ $transaksi->id_transaksi }}')">ON
                                PROCESS</button>
                        </div>
                        <div>
                            <span class="font-semibold">{{ $transaksi->total_harga_formatted }}</span>
                        </div>
                    </div>

                    <!-- Detail Section (Hidden by default) -->
                    <div id="detail-{{ $transaksi->id_transaksi }}" class="hidden mt-4 pt-4 border-t border-gray-200">
                        <div class="space-y-2">
                            <div><strong>Order ID:</strong> #{{ $transaksi->id_transaksi }}</div>
                            <div><strong>Tanggal:</strong>
                                {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y, H:i') }}</div>
                            <div><strong>Metode Pembayaran:</strong> {{ $transaksi->pembayaran->metode_pembayaran ?? '-' }}
                            </div>

                            <div><strong>Item yang Dipesan:</strong></div>
                            <ul class="ml-4 space-y-1">
                                @foreach($transaksi->detail_transaksi as $detail)
                                    <li class="flex justify-between">
                                        <span>{{ $detail->menu->nama ?? '-' }} x{{ $detail->jumlah }}</span>
                                        <span>{{ $detail->subtotal_formatted }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="pt-2 border-t">
                                <div class="flex justify-between font-semibold">
                                    <span>Total:</span>
                                    <span>{{ $transaksi->total_harga_formatted }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Status Section (Hidden by default) -->
                    <div id="update-{{ $transaksi->id_transaksi }}" class="hidden mt-4 pt-4 border-t border-gray-200">
                        <form action="{{ route('kurir.updateStatus', $transaksi->id_transaksi) }}" method="POST"
                            class="space-y-3">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-sm font-semibold mb-1">Status Pengiriman</label>
                                <select name="status_pengiriman" class="w-full border rounded px-3 py-2" required>
                                    <option value="">Pilih Status</option>
                                    <option value="success" {{ $transaksi->status_pengiriman == 'success' ? 'selected' : '' }}>
                                        Sukses</option>
                                    <option value="gagal" {{ $transaksi->status_pengiriman == 'gagal' ? 'selected' : '' }}>Gagal
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-1">Alasan (jika gagal)</label>
                                <input type="text" name="reason" class="w-full border rounded px-3 py-2"
                                    value="{{ $transaksi->reason ?? '' }}" placeholder="Contoh: Penerima tidak di rumah">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-1">Nama Penerima</label>
                                <input type="text" name="receiver_real_name" class="w-full border rounded px-3 py-2"
                                    value="{{ $transaksi->receiver_real_name ?? '' }}" placeholder="Nama penerima">
                            </div>

                            <button type="submit" class="w-full bg-amber-600 text-white py-2 rounded hover:bg-amber-700">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            @if($transaksi->where('status_pengiriman', '!=', 'success')->count() == 0)
                <div class="text-center py-8 text-gray-400">
                    Tidak ada order yang sedang berlangsung.
                </div>
            @endif
        </div>

        <!-- Done Tab Content -->
        <div id="done" class="tab-content">
            @foreach($transaksi->where('status_pengiriman', 'success') as $transaksi)
                <div class="order-card">
                    <div class="order-date">
                        DELIVERY | {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('M d, H:i') }}
                    </div>

                    <div class="order-header">
                        <div class="order-id">{{ $transaksi->id_transaksi }}</div>
                        <div class="text-green-500 text-xl">✓</div>
                    </div>

                    <div class="customer-name">{{ $transaksi->user->name ?? '-' }}</div>
                    <div class="customer-address">{{ $transaksi->user->alamat ?? '-' }}</div>

                    <div class="flex justify-between items-center mt-3">
                        <div>
                            <span class="status-badge status-success">Pengiriman Berhasil</span>
                        </div>
                        <div>
                            <span class="font-semibold">{{ $transaksi->total_harga_formatted }}</span>
                        </div>
                    </div>

                    @if($transaksi->receiver_real_name)
                        <div class="mt-2 text-sm text-gray-600">
                            <strong>Diterima oleh:</strong> {{ $transaksi->receiver_real_name }}
                        </div>
                    @endif
                </div>
            @endforeach

            @if($transaksi->where('status_pengiriman', 'success')->count() == 0)
                <div class="text-center py-8 text-gray-400">
                    Belum ada order yang selesai.
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="px-4 py-4 bg-white rounded-lg mt-4">
            <div class="text-sm text-gray-500 text-center mb-2">
                Menampilkan {{ $transaksi->firstItem() }} sampai {{ $transaksi->lastItem() }}
                dari {{ $transaksi->total() }} order
            </div>
            <div class="flex justify-center">
                {{ $transaksi->links() }}
            </div>
        </div>
    </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });

            // Show selected tab content
            document.getElementById(tabName).classList.add('active');

            // Add active class to clicked tab
            event.target.classList.add('active');
        }

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