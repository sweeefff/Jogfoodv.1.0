@extends('layouts.appadm')
@section('title', 'Order - Jogfood')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="min-h-screen flex items-center justify-center bg-amber-50 py-10">
    <div class="w-full max-w-6xl bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-semibold mb-6 text-amber-700">DAFTAR ORDER TERBARU</h2>
        <form method="GET" action="{{ route('admin.order') }}" class="mb-6 flex flex-col md:flex-row md:items-center gap-3">
            <label class="text-sm text-gray-700">Filter Tanggal:</label>
            <input type="date" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}" class="border rounded px-2 py-1">
            <span class="mx-2 text-gray-500">s/d</span>
            <input type="date" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}" class="border rounded px-2 py-1">
            <button type="submit" class="bg-amber-500 text-white px-4 py-1 rounded hover:bg-amber-600">Filter</button>
            @if(request('tanggal_mulai') || request('tanggal_selesai'))
                <a href="{{ route('admin.order') }}" class="text-blue-500 underline ml-2">Reset</a>
            @endif
        </form>
        <div class="mb-4 flex gap-2">
            <a href="{{ route('admin.order.export', array_merge(request()->all(), ['type' => 'pdf'])) }}" target="_blank"
               class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 text-sm">Export PDF</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Order ID</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Alamat</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Detail</th>
                        <th class="px-4 py-3">Pengiriman</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @forelse($transaksi as $order)
                    <tr class="border-b hover:bg-amber-50 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 font-semibold">{{ $order->id_transaksi }}</td>
                        <td class="px-4 py-3">{{ $order->user->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $order->user->alamat ?? '-' }}</td>
                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}
                        </td>
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
                            <button onclick="toggleDetail('{{ $order->id_transaksi }}')" class="text-blue-600 hover:underline">Lihat Detail</button>
                        </td>
                        <td class="px-4 py-3">
                            <button onclick="togglePengiriman('{{ $order->id_transaksi }}')" class="text-amber-600 hover:underline">Lihat Pengiriman</button>
                        </td>
                    </tr>
                    <!-- Detail row (hidden by default) -->
                    <tr id="detail-{{ $order->id_transaksi }}" class="hidden bg-amber-50">
                        <td colspan="9" class="px-4 py-3">
                            <div class="p-4 rounded-lg bg-white shadow w-full max-w-3xl mx-auto">
                                <div class="mb-2 font-semibold text-gray-700">Item yang Dipesan:</div>
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
                                <div class="border-t my-3"></div>
                                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                    <div>
                                        <span class="text-gray-500">Subtotal:</span>
                                        <span class="font-medium">{{ $order->total_harga_formatted }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">Metode Pembayaran:</span>
                                        <span class="font-medium">{{ $order->pembayaran->metode ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- Pengiriman row (hidden by default) -->
                    <tr id="pengiriman-{{ $order->id_transaksi }}" class="hidden bg-blue-50">
                        <td colspan="9" class="px-4 py-3">
                            <div class="p-4 rounded-lg bg-white shadow w-full max-w-3xl mx-auto">
                                <div class="mb-2 font-semibold text-blue-700">Info Pengiriman</div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                                    <div><span class="font-semibold">Order ID:</span> {{ $order->id_transaksi }}</div>
                                    <div><span class="font-semibold">Tanggal:</span> {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</div>
                                    <div><span class="font-semibold">Customer:</span> {{ $order->user->name ?? '-' }}</div>
                                    <div><span class="font-semibold">Alamat:</span> {{ $order->user->alamat ?? '-' }}</div>
                                    <div><span class="font-semibold">Kurir:</span> {{ $order->status_pengiriman->nama_kurir ?? 'Belum Ditugaskan' }}</div>
                                    <div><span class="font-semibold">Status:</span> {{ $order->status_pengiriman->status ?? 'Belum Ditugaskan' }}</div>
                                </div>
                                @if(empty($order->status_pengiriman) || $order->status_pengiriman->status == 'Belum Ditugaskan')
                                    <form action="{{ route('admin.pengiriman.tugaskan', $order->id_transaksi) }}" method="POST" class="mt-4">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Ditugaskan</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-8 text-gray-400">Belum ada order.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
    function togglePengiriman(id) {
        const row = document.getElementById('pengiriman-' + id);
        if (row) row.classList.toggle('hidden');
    }
</script>
@endsection