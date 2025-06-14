@php
    $tax = 0.1;
    $deliveryFee = 10000;
    $subtotal = collect($menus)->sum('subtotal');
    $taxAmount = $subtotal * $tax;
    $totalAkhir = $subtotal + $taxAmount + $deliveryFee;
@endphp

<div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4">
    <!-- Header: ID & Status -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between px-4 pt-4">
        <div class="font-semibold text-amber-700 mb-2 md:mb-0">
            ID Transaksi: {{ $id_transaksi }}
        </div>
        <div class="flex items-center justify-end">
            @if ($status == 'pending')
                <div class="flex items-center text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold">Belum Dibayar</span>
                </div>
            @elseif ($status == 'lunas')
                <div class="flex items-center text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="font-semibold">Sudah Dibayar</span>
                </div>
            @elseif ($status == 'dibatalkan')
                <div class="flex items-center text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span class="font-semibold">Dibatalkan</span>
                </div>
            @endif
        </div>
    </div>

    <!-- Product Details -->
    @foreach ($menus as $detail)
        <div class="p-4 flex items-center border-b last:border-b-0">
            <div class="w-16 h-16 border rounded overflow-hidden flex-shrink-0">
                <img src="{{ asset('assets/img/menu/' . $detail->menu->gambar_menu) }}" alt="{{ $detail->menu->nama }}"
                    class="w-full h-full object-cover">
            </div>
            <div class="flex-1 ml-4">
                <div class="font-medium">{{ $detail->menu->nama }}</div>
                <div class="text-gray-500 mt-1">x{{ $detail->jumlah }}</div>
            </div>
            <div class="text-right flex-shrink-0">
                <div class="text-orange-500 font-semibold">
                    Rp{{ number_format($detail->subtotal, 0, ',', '.') }}
                </div>
            </div>
        </div>
    @endforeach

    <!-- Order Summary -->
    <div class="p-4 border-t">
        <div class="flex flex-wrap justify-between items-center mb-4">
            <div class="text-gray-500 text-sm">
                Bayar sebelum {{ \Carbon\Carbon::parse($transaksi->updated_at)->addMonths(1)->format('d-m-Y') }}
            </div>
            <div class="flex flex-wrap gap-2">
                @if ($status == 'pending')
                    <form action="{{ route('metode.bayar') }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="id_transaksi" value="{{ $id_transaksi }}">
                        <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded">Bayar</button>
                    </form>
                    <form action="{{ route('transaksi.batal', $id_transaksi) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="border border-gray-300 text-gray-600 px-6 py-2 rounded"
                            onclick="return confirm('Batalkan pesanan ini?')">Batal</button>
                    </form>
                @elseif ($status == 'lunas')
                    @if (!empty($id_struk))
                        <a href="{{ route('struk.show', $id_struk) }}">
                            <button class="bg-green-500 text-white px-6 py-2 rounded">Lihat Struk</button>
                        </a>
                    @else
                        <button class="bg-gray-300 text-gray-600 px-6 py-2 rounded cursor-not-allowed" disabled>Struk
                            Belum Tersedia</button>
                    @endif
                @elseif ($status == 'dibatalkan')
                    <span class="text-red-400 italic">Pesanan dibatalkan</span>
                @endif
            </div>
        </div>
        <div class="space-y-1 mb-2">
            <div class="flex justify-end items-center">
                <span class="text-gray-700 font-semibold mr-2">Total Pesanan:</span>
                <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-end items-center">
                <span class="text-gray-700 mr-2">Biaya Pengiriman:</span>
                <span>Rp{{ number_format($deliveryFee, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-end items-center">
                <span class="text-gray-700 mr-2">Pajak ({{ $tax * 100 }}%):</span>
                <span>Rp{{ number_format($taxAmount, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-end items-center font-bold pt-2 border-t border-gray-200">
                <span class="mr-2">Total Akhir:</span>
                <span class="text-amber-500 font-bold text-lg">
                    Rp{{ number_format($totalAkhir, 0, ',', '.') }}
                </span>
            </div>
        </div>
    </div>
</div>