<div class="cart-item flex items-center border border-amber-100 rounded-lg p-4 gap-4 bg-white">
    <input type="checkbox" class="item-checkbox w-5 h-5 text-amber-500 rounded border-amber-400 bg-amber-100 focus:ring-amber-500" onchange="toggleButton()">
    
    <div class="flex items-center gap-4 flex-1">
        <div class="w-16 h-16 bg-amber-100 rounded-lg flex items-center justify-center overflow-hidden">
            <img src="{{ asset('assets/img/menu/' . $gambar_menu) }}" alt="{{ $nama }}"
                class="w-full h-full object-cover">
        </div>

        <div class="flex-1">
            <p class="font-semibold text-gray-800">{{ $nama }}</p>

            {{-- Simpan harga asli dalam data attribute --}}
            <span class="text-sm text-gray-500" data-harga-satuan="{{ $harga }}">
                Harga Satuan: Rp{{ number_format($harga, 0, ',', '.') }}
            </span>

            {{-- Total Harga per item (dihitung di JS) --}}
            <p class="total-harga-item text-amber-600 font-bold">
                Rp{{ number_format($harga * $jumlah, 0, ',', '.') }}
            </p>

            <p class="text-xs text-gray-500 mt-1">{{ $opsi }}</p>
        </div>
    </div>

    <div class="flex items-center gap-2">
        <button onclick="decreaseQuantity(this)"
            class="quantity-btn bg-amber-100 text-amber-800 rounded-full w-6 h-6 text-center flex items-center justify-center">−</button>
        <span class="quantity text-sm w-6 text-center">{{ $jumlah }}</span>
        <button onclick="increaseQuantity(this)"
            class="quantity-btn bg-amber-100 text-amber-800 rounded-full w-6 h-6 text-center flex items-center justify-center">+</button>
    </div>

    <form action="{{ route('keranjang.destroy', ['id' => $item->id_keranjang]) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="remove-btn bg-amber-500 hover:bg-amber-600 text-white text-sm px-3 py-1 rounded-lg transition"
            onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
    </form>
</div>
