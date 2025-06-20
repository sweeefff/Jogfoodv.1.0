@extends('layouts.appadm')
@section('title', 'Pengiriman - Jogfood')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-amber-50 py-10">
    <div class="w-full max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-semibold mb-6 text-amber-700 text-center">DAFTAR PENGIRIMAN</h2>
        <div class="overflow-x-auto flex justify-center">
            <table class="min-w-[900px] max-w-4xl mx-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
                        <th class="px-4 py-3">Order ID</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Subtotal</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @forelse($pengiriman as $order)
                    <tr class="border-b hover:bg-amber-50 transition">
                        <td class="px-4 py-3 font-semibold">{{ $order->id_transaksi }}</td>
                        <td class="px-4 py-3">{{ $order->user->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-3">{{ $order->total_harga_formatted }}</td>
                        <td>
                            @if($order->status_pengiriman == 'dikirim')
                                <span class="badge bg-warning">Sedang Diperjalanan</span>
                            @elseif($order->status_pengiriman == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-secondary">Belum Dikirim</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <button 
                                onclick="showKurirModal(
                                    '{{ $order->id_transaksi }}',
                                    '{{ $order->alamat ?? '-' }}',
                                    '{{ $order->total_harga_formatted }}',
                                    '{{ $order->status_pengiriman }}',
                                    `@foreach($order->detail_transaksi as $dt){{ $dt->menu->nama_menu }}@if(!$loop->last), @endif @endforeach`
                                )" 
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                                Pilih Kurir
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-8 text-gray-400">Belum ada data pengiriman.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Pilih Kurir -->
<div id="kurirModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
        <button onclick="closeKurirModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-xl">&times;</button>
        <h3 class="text-lg font-semibold mb-4 text-amber-700">Pilih Kurir</h3>
        <form id="formPilihKurir" method="POST" action="">
            @csrf
            <input type="hidden" name="id_transaksi" id="modal_id_transaksi">
            <div class="mb-2">
                <label class="block text-sm text-gray-700">Order ID:</label>
                <span id="modal_order_id" class="font-semibold"></span>
            </div>
                <div class="mb-2">
                <label class="block text-sm text-gray-700">Menu:</label>
                <span id="modal_menu"></span>
            </div>
            <div class="mb-2">
                <label class="block text-sm text-gray-700">Alamat:</label>
                <span id="modal_alamat"></span>
            </div>
            <div class="mb-2">
                <label class="block text-sm text-gray-700">Subtotal:</label>
                <span id="modal_subtotal"></span>
            </div>
            <div class="mb-4">
                <label for="kurir" class="block mb-2 text-sm font-medium text-gray-700">Nama Kurir</label>
                <select name="kurir" id="kurir" class="w-full border rounded px-3 py-2">
                    @foreach($kurirList as $kurir)
                        <option value="{{ $kurir->id }}">{{ $kurir->nama_kurir }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Tugaskan</button>
        </form>
    </div>
</div>

<script>
    function showKurirModal(idTransaksi, alamat, subtotal, statusPengiriman, menu) {
        document.getElementById('kurirModal').classList.remove('hidden');
        document.getElementById('modal_id_transaksi').value = idTransaksi;
        document.getElementById('modal_order_id').textContent = idTransaksi;
        document.getElementById('modal_menu').textContent = menu;
        document.getElementById('modal_alamat').textContent = alamat;
        document.getElementById('modal_subtotal').textContent = subtotal;
        document.getElementById('modal_status_pengiriman').textContent = statusPengiriman;
        document.getElementById('formPilihKurir').action = '/admin/pengiriman/tugaskan/' + idTransaksi;
    }
    function closeKurirModal() {
        document.getElementById('kurirModal').classList.add('hidden');
    }
</script>
@endsection
