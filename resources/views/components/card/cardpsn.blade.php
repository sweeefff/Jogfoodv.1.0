<div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4">

    <!-- Product Details -->
    <div class="p-4 flex">
        <div class="w-16 h-16 border rounded overflow-hidden flex-shrink-0">
            <img src="assets/img/gudeg.jpg" alt="{{ $nama }}" class="w-full h-full object-cover">
        </div>
        <div class="flex-1 ml-4">
            <div class="font-medium">{{ $nama }}</div>
            <div class="text-gray-500 mt-1">Variasi: {{ $variasi }}</div>
            <div class="text-gray-500">{{ $jumlah }}</div>
        </div>
        <div class="text-right flex-shrink-0">
            <div class="text-gray-400 line-through">{{ $harga }}</div>
            <div class="text-orange-500 font-semibold">{{ $diskon }}</div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="p-4 border-t">
        <!-- First row - Coin info -->
        <div class="flex flex-wrap justify-between mb-4">
            <div>
                <div class="text-gray-500 text-sm">Bayar sebelum 12-03-2025</div>
            </div>
        </div>

        <!-- Second row - Total and buttons -->
        <div class="flex flex-wrap justify-between items-center">
            <div class="mr-4 mb-3 sm:mb-0">
                <div class="text-gray-600">Total Pesanan:
                    <span class="text-orange-500 font-semibold text-xl">{{ $total }}</span>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="metode"><button class="bg-orange-500 text-white px-6 py-2 rounded">{{ $nilai }}</button></a>
                <a href="metode"><button class="border border-gray-300 text-gray-600 px-6 py-2 rounded">{{ $ubah }}</button></a>
                
                <a href="#"><button class="border border-gray-300 text-gray-600 px-6 py-2 rounded">{{ $batal }}</button></button></a>
            </div>
        </div>
    </div>
</div>