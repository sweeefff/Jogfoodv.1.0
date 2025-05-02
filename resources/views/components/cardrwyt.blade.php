<div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4">
    <!-- Store Header -->
    <div class="p-4 flex items-center border-b flex-wrap">

        <!-- Status info - will wrap to next line on mobile -->
        <div class="ml-0 lg:ml-auto flex items-center text-green-500 mt-2 lg:mt-0 w-full lg:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="mr-1">Pesanan tiba di alamat tujuan, diterima oleh Yang bersangkutan.</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="ml-2 text-orange-500 font-semibold">SELESAI</div>
        </div>
    </div>

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
                <div class="text-gray-500 text-sm">Nilai produk sebelum 12-03-2025</div>
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
                <a href="rating"><button class="bg-orange-500 text-white px-6 py-2 rounded">Nilai</button></a>
                <button class="border border-gray-300 text-gray-600 px-6 py-2 rounded">Hubungi Penjual</button>
                <button class="border border-gray-300 text-gray-600 px-6 py-2 rounded">Beli Lagi</button>
            </div>
        </div>
    </div>
</div>