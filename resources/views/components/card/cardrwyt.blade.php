<div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4">
    <!-- Product Details -->
    <div class="p-4 flex">
        <div class="w-16 h-16 border rounded overflow-hidden flex-shrink-0">
            <img src="{{ asset('assets/img/menu/' . $gambar_menu) }}" alt="{{ $nama }}"
                class="w-full h-full object-cover">
        </div>
        <div class="flex-1 ml-4">
            <div class="font-medium">{{ $nama }}</div>
            <div class="text-gray-500 mt-1">{{ $variasi }}</div>
            <div class="text-gray-500">{{ $jumlah }}</div>
        </div>
        <div class="text-right flex-shrink-0">
            <div class="text-gray-400 line-through">{{ $harga }}</div>
            <div class="text-orange-500 font-semibold">{{ $diskon }}</div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="p-3 border-t">
        <div class="flex flex-wrap justify-between items-center mb-4">
            <div class="text-gray-500 text-sm">
                Nilai produk sebelum {{ \Carbon\Carbon::parse($transaksi->updated_at)->addMonths(1)->format('d-m-Y') }}
            </div>
            <div class="flex flex-wrap gap-2">
                @if ($transaksi->status_pengiriman && $transaksi->status_pengiriman->status_pengiriman == 'selesai')
                    <a href="rating"><button class="bg-orange-500 text-white px-6 py-2 rounded">Nilai</button></a>
                @endif
                <a href="{{ route('detail', $id_menu) }}"><button
                        class="bg-orange-500 text-white px-6 py-2 rounded">Lihat Detail Menu</button></a>
                <a href="http://wa.me/+6285763526436?text=Halo,%20saya%20ingin%20bertanya%20mengenai%20JogFood!">
                    <button class="border border-gray-300 text-gray-600 px-6 py-2 rounded">Hubungi Penjual</button></a>
                <a href="{{ route('keranjang.store', $id_menu) }}"><button
                        class="border border-gray-300 text-gray-600 px-6 py-2 rounded">Beli Lagi</button></a>
            </div>
        </div>
    </div>
</div>