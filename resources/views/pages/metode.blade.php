@extends('layouts.app')

@section('title', 'Konfirmasi Pesanan')

@section('content')
    <main class="flex-1 md:flex md:flex-row md:justify-center md:mx-4 md:my-8">
        <div class="container mx-auto border p-4 rounded-lg shadow md:w-1/2 lg:w-1/3 bg-white">
            <h1 class="text-2xl font-semibold text-center">Pemesanan</h1>

            <div class="mt-4 p-4">
                <h2 class="text-lg font-medium">Alamat</h2>
                <p class="text-gray-700 mt-2">
                    Jl. Hang Kesturi I No.8 Kawasan Industri Terpadu Kabil, Batam 29467, Indonesia
                </p>
                <button class="text-amber-600 hover:text-amber-800 mt-2">
                    Ubah Alamat
                </button>
            </div>

            @include('components.item', ['desc' => 'Ubah Pesanan'])
            @include('components.item', ['desc' => 'Ubah Pesanan'])

            <div class="mt-4">
                <h2 class="text-lg font-medium">Pesanan</h2>
                <div class="space-y-2 mt-2">
                    <div class="flex justify-between">
                        <span>Gudeg</span>
                        <span>Rp.30.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Wedang Jahe</span>
                        <span>Rp.10.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>PPN 11%</span>
                        <span>Rp.0.00</span>
                    </div>
                    <div class="flex justify-between font-bold pt-2 border-t border-gray-200">
                        <span>Total</span>
                        <span>Rp.40.000</span>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h2 class="text-lg font-medium">Metode Pembayaran</h2>

                <div class="space-y-4 mt-2">
                    <div class="flex items-start">
                        <input id="bank-transfer" type="radio" name="payment-method"
                            class="w-4 h-4 mt-1 text-amber-600 border-gray-300 focus:ring-amber-500">
                        <label for="bank-transfer" class="ml-2 w-full">
                            <span class="font-medium">Bank Transfer</span>
                            <div class="flex items-center mt-2 space-x-4">
                                <div class="bg-white p-1 border border-gray-200 rounded-lg">
                                    <div
                                        class="h-6 w-16 bg-yellow-400 rounded-lg flex items-center justify-center text-xs font-bold">
                                        mandiri</div>
                                </div>
                                <div class="bg-white p-1 border border-gray-200 rounded-lg">
                                    <div
                                        class="h-6 w-12 bg-blue-600 rounded-lg flex items-center justify-center text-xs font-bold text-white">
                                        BCA</div>
                                </div>
                                <div class="bg-white p-1 border border-gray-200 rounded-lg">
                                    <div
                                        class="h-6 w-12 bg-green-600 rounded-lg flex items-center justify-center text-xs font-bold text-white">
                                        BNI</div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="e-wallet" type="radio" name="payment-method"
                            class="w-4 h-4 text-amber-600 border-gray-300 focus:ring-amber-500">
                        <label for="e-wallet" class="ml-2 font-medium">
                            E-Wallet
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="cod" type="radio" name="payment-method"
                            class="w-4 h-4 text-amber-600 border-gray-300 focus:ring-amber-500">
                        <label for="cod" class="ml-2 font-medium">
                            COD
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mt-4">
                <button
                    class="flex-1 py-2 px-4 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition duration-150">
                    Batalkan Pesanan
                </button>
                <button
                    class="flex-1 py-2 px-4 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition duration-150">
                    Konfirmasi Pesanan
                </button>
            </div>
        </div>
    </main>
@endsection

