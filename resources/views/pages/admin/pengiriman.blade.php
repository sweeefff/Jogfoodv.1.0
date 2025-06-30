@extends('layouts.appadm')
@section('title', 'Pengiriman - Jogfood')
@section('content')
<div class="min-h-screen bg-amber-50 flex flex-col md:pl-64 pl-4 pr-4 md:pr-8 mt-20">

    <div class="flex-1 flex flex-col items-center justify-start pt-8 pb-8 md:pt-16 md:pb-16">
        <div class="w-full max-w-6xl bg-white p-4 md:p-8 rounded-xl shadow-lg">
            <h2 class="text-2xl font-semibold mb-6 text-amber-700 text-center">DAFTAR PENGIRIMAN</h2>

            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('admin.pengiriman') }}" class="mb-6 flex flex-col md:flex-row gap-2 md:items-center justify-center">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama customer..." class="border rounded-lg px-3 py-2 text-sm w-full md:w-64" />
                <select name="status" class="border rounded-lg px-3 py-2 text-sm w-full md:w-48">
                    <option value="">Semua Status</option>
                    <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="dikirim" {{ request('status') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="gagal" {{ request('status') == 'gagal' ? 'selected' : '' }}>Gagal</option>
                    <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Cari</button>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-[900px] w-full border-collapse mx-auto">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
                            <th class="px-4 py-3 text-center">No</th>
                            <th class="px-4 py-3 text-center">Order ID</th>
                            <th class="px-4 py-3 text-center">Customer</th>
                            <th class="px-4 py-3 text-center">Tanggal</th>
                            <th class="px-4 py-3 text-center">Subtotal</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @forelse($pengiriman as $index => $order)
                        <tr class="border-b hover:bg-amber-50 transition">
                            <td class="px-4 py-3 font-semibold text-center">
                                {{ ($pengiriman->currentPage() - 1) * $pengiriman->perPage() + $index + 1 }}
                            </td>
                            <td class="px-4 py-3 font-semibold text-center">{{ $order->id_transaksi }}</td>
                            <td class="px-4 py-3 text-center">{{ $order->user->name ?? '-' }}</td>
                            <td class="px-4 py-3 text-center">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</td>
                            <td class="px-4 py-3 text-center">{{ $order->total_harga_formatted }}</td>
                            <td class="text-center">
                                @php
                                    $statusPengiriman = $order->status_pengiriman->status_pengiriman ?? 'Belum Dikirim';
                                    $namaKurir = ($order->status_pengiriman && $order->status_pengiriman->kurir)
                                        ? $order->status_pengiriman->kurir->name
                                        : 'Belum Ditugaskan';
                                    $isMerah = in_array(strtolower($statusPengiriman), ['gagal', 'batal', 'dibatalkan']);
                                @endphp
                                <span class="badge
                                    @if($isMerah)
                                        bg-red-500 text-white
                                    @elseif($statusPengiriman == 'dikirim') bg-yellow-400 text-yellow-900
                                    @elseif($statusPengiriman == 'selesai') bg-green-500 text-white
                                    @else bg-gray-300 text-gray-700 @endif">
                                    {{ ucfirst($statusPengiriman) }}
                                </span>
                                <br>
                                <span class="text-xs text-gray-600">Kurir: {{ $namaKurir }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if($isMerah)
                                    @if(strtolower($statusPengiriman) == 'gagal')
                                        <button onclick="showDetailPengiriman(
                                            '{{ $order->status_pengiriman->nama_penerima ?? '-' }}',
                                            '{{ $order->status_pengiriman->foto_penerima ?? '' }}',
                                            '{{ $order->status_pengiriman->alasan ?? '-' }}',
                                            '{{ $statusPengiriman }}',
                                            '{{ $order->status_pengiriman->tanggal_diterima ?? ($order->status_pengiriman->tanggal_update ?? $order->updated_at) }}',
                                            '{{ $order->user->alamat ?? '-' }}'
                                        )" class="w-full px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-xs font-semibold transition-all duration-150">
                                            Detail Pengiriman
                                        </button>
                                    @endif
                                @elseif($statusPengiriman == 'dikirim' || $statusPengiriman == 'selesai')
                                    <button onclick="showDetailPengiriman(
                                        '{{ $order->status_pengiriman->nama_penerima ?? '-' }}',
                                        '{{ $order->status_pengiriman->foto_penerima ?? '' }}',
                                        '', // alasan gagal kosong
                                        '{{ $statusPengiriman }}',
                                        '{{ $order->status_pengiriman->tanggal_diterima ?? ($order->status_pengiriman->tanggal_update ?? $order->updated_at) }}',
                                        '{{ $order->user->alamat ?? '-' }}'
                                    )" class="w-full px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-xs font-semibold transition-all duration-150">
                                        Detail Pengiriman
                                    </button>
                                @elseif($statusPengiriman == 'menunggu' || $statusPengiriman == 'Belum Dikirim')
                                    <button 
                                        onclick="showKurirModal(
                                            '{{ $order->id_transaksi }}',
                                            '{{ $order->user->alamat ?? '-' }}',
                                            '{{ $order->total_harga_formatted }}',
                                            '{{ $order->status_pengiriman }}',
                                            `@foreach($order->detail_transaksi as $dt){{ $dt->menu->nama }}@if(!$loop->last), @endif @endforeach`
                                        )" 
                                        class="w-full px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-xs font-semibold transition-all duration-150">
                                        Pilih Kurir
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-8 text-gray-400">Belum ada data pengiriman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center">
                {{ $pengiriman->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Pilih Kurir -->
<div id="kurirModal" tabindex="-1" aria-hidden="true"
    class="fixed inset-0 z-50 flex items-center justify-center bg-[rgba(255,255,255,0.7)] backdrop-blur-sm transition-all duration-300 hidden">
    <div class="relative w-full max-w-md mx-4 my-8 bg-white rounded-2xl shadow-2xl p-6 scale-95 opacity-0 transition-all duration-300"
         id="kurirModalBox">
        <!-- Tombol Close -->
        <button type="button" onclick="closeKurirModal()"
            class="absolute top-3 right-3 text-gray-400 hover:text-amber-700 text-2xl font-bold focus:outline-none transition">
            &times;
        </button>
        <!-- Judul -->
        <h3 class="text-xl font-bold text-amber-700 mb-6 text-center tracking-wide">Pilih Kurir</h3>
        <!-- Form -->
        <form id="formPilihKurir" method="POST" action="">
            @csrf
            <input type="hidden" name="id_transaksi" id="modal_id_transaksi">
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Order ID</label>
                <div id="modal_order_id" class="font-semibold text-gray-800"></div>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Menu</label>
                <div id="modal_menu" class="font-semibold text-gray-800"></div>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <div id="modal_alamat" class="font-semibold text-gray-800"></div>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Subtotal</label>
                <div id="modal_subtotal" class="font-semibold text-gray-800"></div>
            </div>
            <div class="mb-5">
                <label for="id_kurir" class="block text-sm font-medium text-gray-700 mb-1">Nama Kurir</label>
                <select name="kurir" id="id_kurir" class="w-full border border-amber-300 rounded-lg px-3 py-2 text-sm focus:ring-amber-500 focus:border-amber-500 transition">
                    @foreach($kurirList as $kurir)
                        <option value="{{ $kurir->id }}">{{ $kurir->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="w-full bg-amber-700 hover:bg-amber-800 text-white font-semibold rounded-lg px-4 py-2 transition-all duration-200 shadow hover:scale-105 active:scale-95">
                Tugaskan
            </button>
        </form>
    </div>
</div>

<!-- Modal Detail Pengiriman -->
<div id="detailPengirimanModal" class="fixed inset-0 z-50 flex items-center justify-center bg-[rgba(255,255,255,0.7)] backdrop-blur-sm transition-all duration-300 hidden">
    <div class="relative w-full max-w-md mx-4 my-8 bg-white rounded-2xl shadow-2xl p-6" id="detailPengirimanBox">
        <button type="button" onclick="closeDetailPengirimanModal()"
            class="absolute top-3 right-3 text-gray-400 hover:text-amber-700 text-2xl font-bold focus:outline-none transition">
            &times;
        </button>
        <h3 class="text-xl font-bold text-amber-700 mb-6 text-center tracking-wide">Detail Pengiriman</h3>
        <div id="detail_status_section">
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Pengiriman</label>
                <div id="detail_status_pengiriman" class="font-semibold"></div>
            </div>
        </div>
        <div id="detail_nama_section" class="mb-3" style="display:none;">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Penerima</label>
            <div id="detail_nama_penerima" class="font-semibold text-gray-800"></div>
        </div>
        <div id="detail_alamat_section" class="mb-3" style="display:none;">
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <div id="detail_alamat_pengiriman" class="font-semibold text-gray-800"></div>
        </div>
        <div id="detail_tanggal_section" class="mb-3" style="display:none;">
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Diterima</label>
            <div id="detail_tanggal_diterima" class="font-semibold text-gray-800"></div>
        </div>
        <div id="detail_foto_section" class="mb-3" style="display:none;">
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Penerima</label>
            <div id="detail_foto_penerima"></div>
        </div>
        <div id="detail_alasan_section" class="mb-3" style="display:none;">
            <label class="block text-sm font-medium text-red-700 mb-1">Alasan Gagal</label>
            <div id="detail_alasan_gagal" class="font-semibold text-red-700"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script>
function showKurirModal(idTransaksi, alamat, subtotal, statusPengiriman, menu) {
    const modal = document.getElementById('kurirModal');
    const box = document.getElementById('kurirModalBox');
    modal.classList.remove('hidden');
    setTimeout(() => {
        box.classList.remove('scale-95', 'opacity-0');
        box.classList.add('scale-100', 'opacity-100');
    }, 10);
    document.getElementById('modal_id_transaksi').value = idTransaksi;
    document.getElementById('modal_order_id').textContent = idTransaksi;
    document.getElementById('modal_menu').textContent = menu;
    document.getElementById('modal_alamat').textContent = alamat;
    document.getElementById('modal_subtotal').textContent = subtotal;
    document.getElementById('formPilihKurir').action = '/admin/pengiriman/tugaskan/' + idTransaksi;
}
function closeKurirModal() {
    const modal = document.getElementById('kurirModal');
    const box = document.getElementById('kurirModalBox');
    box.classList.remove('scale-100', 'opacity-100');
    box.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}
function showDetailPengiriman(namaPenerima, fotoPenerima, alasanGagal, statusPengiriman, tanggalPengiriman, alamatPengiriman) {
    const modal = document.getElementById('detailPengirimanModal');
    const box = document.getElementById('detailPengirimanBox');
    modal.classList.remove('hidden');
    setTimeout(() => {
        box.classList.remove('scale-95', 'opacity-0');
        box.classList.add('scale-100', 'opacity-100');
    }, 10);

    // Reset all
    document.getElementById('detail_nama_section').style.display = 'none';
    document.getElementById('detail_alamat_section').style.display = 'none';
    document.getElementById('detail_tanggal_section').style.display = 'none';
    document.getElementById('detail_foto_section').style.display = 'none';
    document.getElementById('detail_alasan_section').style.display = 'none';

    // Status
    let statusClass = 'text-gray-500';
    if (statusPengiriman.toLowerCase() === 'selesai') statusClass = 'text-green-600 font-bold';
    else if (statusPengiriman.toLowerCase() === 'dikirim') statusClass = 'text-yellow-600 font-bold';
    else if (['gagal','batal','dibatalkan'].includes(statusPengiriman.toLowerCase())) statusClass = 'text-red-600 font-bold';
    document.getElementById('detail_status_pengiriman').className = 'font-semibold ' + statusClass;
    document.getElementById('detail_status_pengiriman').textContent = statusPengiriman;

    // Show/hide fields based on status
    if (statusPengiriman.toLowerCase() === 'selesai') {
        document.getElementById('detail_nama_section').style.display = '';
        document.getElementById('detail_alamat_section').style.display = '';
        document.getElementById('detail_tanggal_section').style.display = '';
        document.getElementById('detail_foto_section').style.display = '';
        document.getElementById('detail_nama_penerima').textContent = namaPenerima;
        document.getElementById('detail_alamat_pengiriman').textContent = alamatPengiriman || '-';
        document.getElementById('detail_tanggal_diterima').textContent = tanggalPengiriman ? moment(tanggalPengiriman).format('DD MMM YYYY, HH:mm') : '-';
        if (fotoPenerima) {
            document.getElementById('detail_foto_penerima').innerHTML = `<img src="${fotoPenerima}" alt="Foto Penerima" class="w-32 h-32 object-cover rounded-lg border">`;
        } else {
            document.getElementById('detail_foto_penerima').innerHTML = '<span class="text-gray-400">Tidak ada foto</span>';
        }
    } else if (statusPengiriman.toLowerCase() === 'gagal') {
        document.getElementById('detail_nama_section').style.display = '';
        document.getElementById('detail_foto_section').style.display = '';
        document.getElementById('detail_alasan_section').style.display = '';
        document.getElementById('detail_nama_penerima').textContent = namaPenerima;
        if (fotoPenerima) {
            document.getElementById('detail_foto_penerima').innerHTML = `<img src="${fotoPenerima}" alt="Foto Penerima" class="w-32 h-32 object-cover rounded-lg border">`;
        } else {
            document.getElementById('detail_foto_penerima').innerHTML = '<span class="text-gray-400">Tidak ada foto</span>';
        }
        document.getElementById('detail_alasan_gagal').textContent = alasanGagal || '-';
    }
    // Jika status dikirim, hanya tampilkan status (bagian lain tetap hidden)
}
function closeDetailPengirimanModal() {
    const modal = document.getElementById('detailPengirimanModal');
    const box = document.getElementById('detailPengirimanBox');
    box.classList.remove('scale-100', 'opacity-100');
    box.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}
</script>
@endsection
