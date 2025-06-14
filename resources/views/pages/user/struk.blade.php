@extends('layouts.user')

@section('title', 'Bukti Pembayaran')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl overflow-hidden w-full max-w-md shadow-lg">

            {{-- Header --}}
            <div class="bg-amber-100 border-b border-amber-200 p-6 text-center">
                <h1 class="text-amber-600 font-semibold text-lg">Bukti Pembayaran</h1>
                <img src="{{ asset('assets/icon/jogfood-shadow.png') }}" alt="Jogfood Logo" class="h-16 mx-auto mt-2">
            </div>

            {{-- Ringkasan Order --}}
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Ringkasan Order</h2>
                        <p class="text-sm text-gray-500">#{{ $transaksi->id_transaksi }}</p>
                    </div>
                    @if ($pembayaran->metode_pembayaran == 'cod')
                        <div class="bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full">
                            Pending
                        </div>
                    @elseif ($pembayaran->metode_pembayaran == 'bank-transfer' || $pembayaran->metode_pembayaran == 'e-wallet')
                        <div class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">
                            Selesai
                        </div>
                    @endif
                </div>

                {{-- Detail Order --}}
                <div class="space-y-3 mb-6">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="text-gray-500">Tanggal Order</div>
                        <div class="text-right font-medium">{{ $transaksi->created_at->format('d M Y') }}</div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="text-gray-500">Alamat</div>
                        <div class="text-right font-medium">Jl. Hang Kesturi</div>
                    </div>
                </div>

                {{-- Item Dipesan --}}
                <h3 class="font-medium text-gray-700 mb-3">Item yang Dipesan</h3>
                <div class="space-y-4">
                    @foreach($transaksi->detail_transaksi as $detail)
                        <div class="flex justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">{{ $detail->menu->nama }}</p>
                                    <p class="text-sm text-gray-500">{{ $detail->jumlah }} x
                                        Rp{{ number_format($detail->menu->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="font-medium">Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="my-5 border-t"></div>

                {{-- Perhitungan Total --}}
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Subtotal</span>
                        <span>Rp{{ number_format($transaksi->subtotal ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Diskon</span>
                        <span>-Rp{{ number_format($transaksi->diskon ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Biaya Pengiriman</span>
                        <span>Rp{{ number_format($transaksi->biaya_pengiriman ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Pajak</span>
                        <span>Rp{{ number_format($transaksi->pajak ?? 0, 0, ',', '.') }}</span>
                    </div>
                </div>
                <div class="bg-amber-50 rounded-lg p-4 mt-5">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg">Total</span>
                        <span class="font-bold text-xl text-amber-600">
                            Rp{{ number_format($transaksi->total_harga ?? 0, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                {{-- Informasi Pembayaran --}}
                <div class="mt-6">
                    <h3 class="font-medium text-gray-700 mb-3">Informasi Pembayaran</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-500">Metode</span>
                            <span class="font-medium">{{ $pembayaran->metode_pembayaran }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Tanggal Pembayaran</span>
                            <span class="font-medium">{{ $pembayaran->updated_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Terima Kasih --}}
                <div class="text-center mt-8">
                    @if ($pembayaran->metode_pembayaran == 'bank-transfer' || $pembayaran->metode_pembayaran == 'e-wallet')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-green-500 mb-3" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @elseif ($pembayaran->metode_pembayaran == 'cod')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-yellow-500 mb-3" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                    <h2 class="text-xl font-bold text-gray-800 mb-1">Terima Kasih!</h2>
                    <p class="text-gray-500">Order Anda telah diterima</p>

                    <button onclick="window.print()"
                        class="print-btn mt-6 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v3h6v-3z"
                                clip-rule="evenodd" />
                        </svg>
                        Cetak Resi
                    </button>
                    <a href="{{ route('struk.download', $struk->id_struk) }}"
                        class="mt-6 bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded-lg inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 1v10.55a1.5 1.5 0 001.5 1.5h7.795a2.5 2.5 0 002.5-2.5V3a2.5 2.5 0 00-2.5-2.5H7.5A2.5 2.5 0 005 3.55V2a2 2 0 00-2 2z"
                                clip-rule="evenodd" />
                        </svg>
                        Unduh Resi
                    </a>



                    <p class="text-sm text-gray-400 mt-4">Butuh bantuan? Hubungi
                        <a href="mailto:zjogfood25@gmailcom" class="text-blue-500 font-medium">jogfood25@gmail.com</a>
                        <a href="wa.me/6282172394367" class="text-blue-500 font-medium"> | 082172394367</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.print-btn').addEventListener('click', function () {
            window.print();
        });
    </script>

@endsection