<div class="cart-item flex items-center border border-amber-100 rounded-lg p-4 gap-4 bg-white">
    <div class="w-16 h-16 bg-amber-100 rounded-lg flex items-center justify-center overflow-hidden"> <img
            src="{{ asset('assets/img/menu/' . $gambar_menu) }}" alt="{{ $nama }}" class="w-full h-full object-cover">
    </div>
    <div class="flex-1 ml-4">
        <p class="font-semibold text-gray-800">{{ $nama }}</p>
        <p class="text-sm text-amber-600 font-medium"> Rp{{ number_format($harga * $jumlah, 0, ',', '.') }} <span
                class="text-gray-500 text-xs">(x{{ $jumlah }})</span> </p>
        <p class="text-xs text-gray-500 mt-1">{{ $opsi ?? '-' }}</p>
    </div>
</div>