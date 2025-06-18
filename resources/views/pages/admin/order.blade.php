@extends('layouts.appadm')
@section('title', 'Order - Jogfood')
@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .main-content { margin-left: 0; }
        }
        .badge {
            @apply px-2.5 py-0.5 rounded text-xs font-semibold;
        }
    </style>

    <div class="main-content min-h-screen lg:px-16 md:px-6 px-4 py-6 mt-10">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-6xl">
            <h2 class="text-2xl font-semibold mb-4">Daftar Order Terbaru</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
                            <th class="px-4 py-3">Order ID</th>
                            <th class="px-4 py-3">Customer</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @forelse($transaksi as $order)
                        <tr class="border-b hover:bg-amber-50 transition">
                            <td class="px-4 py-3 font-semibold">{{ $order->id_transaksi }}</td>
                            <td class="px-4 py-3">{{ $order->user->name ?? '-' }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($order->tanggal_transaksi)->format('d M Y, H:i') }}</td>
                            <td class="px-4 py-3">{{ $order->total_harga_formatted }}</td>
                            <td class="px-4 py-3">
                                @if($order->status_transaksi == 'Selesai')
                                    <span class="badge bg-green-200 text-green-800">Selesai</span>
                                @elseif($order->status_transaksi == 'Batal')
                                    <span class="badge bg-red-200 text-red-800">Batal</span>
                                @else
                                    <span class="badge bg-yellow-200 text-yellow-800">{{ $order->status_transaksi }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <button onclick="toggleDetail('{{ $order->id_transaksi }}')" class="text-blue-600 hover:underline">Lihat</button>
                            </td>
                        </tr>
                        <!-- Detail row (hidden by default) -->
                        <tr id="detail-{{ $order->id_transaksi }}" class="hidden bg-amber-50">
                            <td colspan="6" class="px-4 py-3">
                                <div class="p-4 rounded-lg bg-white shadow">
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-2">
                                        <div>
                                            <span class="font-semibold text-gray-700">Order ID:</span>
                                            <span class="text-gray-600">#{{ $order->id_transaksi }}</span>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-gray-700">Tanggal:</span>
                                            <span class="text-gray-600">{{ \Carbon\Carbon::parse($order->tanggal_transaksi)->format('d M Y, H:i') }}</span>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-gray-700">Customer:</span>
                                            <span class="text-gray-600">{{ $order->user->name ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <span class="font-semibold text-gray-700">Status:</span>
                                        @if($order->status_transaksi == 'Selesai')
                                            <span class="badge bg-green-200 text-green-800">Selesai</span>
                                        @elseif($order->status_transaksi == 'Batal')
                                            <span class="badge bg-red-200 text-red-800">Batal</span>
                                        @else
                                            <span class="badge bg-yellow-200 text-yellow-800">{{ $order->status_transaksi }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-2">
                                        <span class="font-semibold text-gray-700">Alamat:</span>
                                        <span class="text-gray-600">{{ $order->user->alamat ?? '-' }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="font-semibold text-gray-700">Item yang Dipesan:</span>
                                        <ul class="list-disc ml-6 mt-2">
                                            @foreach($order->detail_transaksi as $detail)
                                                <li class="flex justify-between items-center">
                                                    <div>
                                                        <span class="font-medium">{{ $detail->menu->nama ?? '-' }}</span>
                                                        <span class="text-gray-500">x{{ $detail->jumlah }}</span>
                                                    </div>
                                                    <div class="text-gray-700">{{ $detail->subtotal_formatted }}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="border-t my-3"></div>
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                        <div>
                                            <span class="text-gray-500">Subtotal:</span>
                                            <span class="font-medium">{{ $order->total_harga_formatted }}</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Metode:</span>
                                            <span class="font-medium">Transfer Bank</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-400">Belum ada order.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Menampilkan <span class="font-medium">{{ $transaksi->firstItem() }}</span> sampai <span class="font-medium">{{ $transaksi->lastItem() }}</span> dari <span class="font-medium">{{ $transaksi->total() }}</span> order
                </div>
                <div>
                    {{ $transaksi->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleDetail(id) {
            const row = document.getElementById('detail-' + id);
            if (row) row.classList.toggle('hidden');
        }
    </script>
@endsection