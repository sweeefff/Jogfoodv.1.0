@extends('layouts.app')

@section('title', 'Bukti Pembayaran')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 mx-auto sm:px-6 lg:px-8">
        <div class="receipt-container bg-white rounded-xl overflow-hidden sm:w-1/2 lg:w-1/3 xl:w-1/4">
            <!-- Header -->
            <div class="bg-amber-50 p-6 text-center">
                <h1 class="text-amber-600 mt-1">Bukti Pembayaran</h1>
                <img src="assets/icon/jogfood-shadow.png" alt="Jogfood Logo" class="h-16 mx-auto mb-2">
            </div>

            <!-- Order Summary -->
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Ringkasan Order</h2>
                        <p class="text-sm text-gray-500">#31B4234</p>
                    </div>
                    <div class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">
                        Selesai
                    </div>
                </div>

                <!-- Order Details -->
                <div class="space-y-3 mb-6">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="text-gray-500">Tanggal Order</div>
                        <div class="text-right font-medium">20 Maret 2025</div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="text-gray-500">Restoran</div>
                        <div class="text-right font-medium">Gudeg Yu Djum</div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="text-gray-500">Alamat</div>
                        <div class="text-right font-medium">Jl. Hang Kesturi I No.8, Batam</div>
                    </div>
                </div>

                <!-- Items -->
                <h3 class="font-medium text-gray-700 mb-3">Item yang Dipesan</h3>
                <div class="space-y-4">
                    <!-- Item 1 -->
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
                                <p class="font-medium">Gudeg</p>
                                <p class="text-sm text-gray-500">1 x Rp30.000</p>
                            </div>
                        </div>
                        <div class="font-medium">Rp30.000</div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium">Wedang Jahe</p>
                                <p class="text-sm text-gray-500">1 x Rp10.000</p>
                            </div>
                        </div>
                        <div class="font-medium">Rp10.000</div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="divider my-5"></div>

                <!-- Cost Breakdown -->
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <div class="text-gray-500">Subtotal</div>
                        <div>Rp40.000</div>
                    </div>
                    <div class="flex justify-between">
                        <div class="text-gray-500">Diskon</div>
                        <div>-Rp4.000</div>
                    </div>
                    <div class="flex justify-between">
                        <div class="text-gray-500">Biaya Pengiriman</div>
                        <div>Rp0</div>
                    </div>
                    <div class="flex justify-between">
                        <div class="text-gray-500">Pajak (10%)</div>
                        <div>Rp4.000</div>
                    </div>
                </div>

                <!-- Total -->
                <div class="total-box rounded-lg p-4 mt-5">
                    <div class="flex justify-between items-center">
                        <div class="font-bold text-lg">Total</div>
                        <div class="font-bold text-xl">Rp44.000</div>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="mt-6">
                    <h3 class="font-medium text-gray-700 mb-3">Informasi Pembayaran</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex justify-between mb-2">
                            <div class="text-gray-500">Metode</div>
                            <div class="font-medium">Transfer Bank</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="text-gray-500">Tanggal Pembayaran</div>
                            <div class="font-medium">20 Maret 2025 - 23:50</div>
                        </div>
                    </div>
                </div>

                <!-- Thank You -->
                <div class="text-center mt-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-green-500 mb-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-800 mb-1">Terima Kasih!</h2>
                    <p class="text-gray-500">Order Anda telah diterima</p>

                    <button
                        class="print-btn mt-6 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v3h6v-3z"
                                clip-rule="evenodd" />
                        </svg>
                        Cetak Resi
                    </button>

                    <p class="text-sm text-gray-400 mt-4">Butuh bantuan? Hubungi support@jogfood.com</p>
                </div>
            </div>
        </div>
    </div>
@endsection