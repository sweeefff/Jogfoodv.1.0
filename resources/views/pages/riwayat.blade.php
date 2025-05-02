@extends('layouts.app')

@section('title', 'Riwayat Pemesanan')

@section('content')
    <!-- Main Content with min-height to push footer down -->
    <div class="flex-1 flex flex-col min-h-screen bg-amber-50">
        <!-- Title -->
        <div class="bg-amber-50 p-6 border-b border-amber-200">
            <h1 class="text-2xl font-bold text-center text-amber-700">RIWAYAT PEMESANAN</h1>
        </div>

        <!-- Order Items in a flex-grow container -->
        <div class="container mx-auto flex-grow px-4">
            <!-- Order Item 1 -->
            @include('components.cardrwyt', [
                'nama' => 'Sate Klatak',
                'variasi' => 'Pangsit',
                'jumlah' => 'x1',
                'harga' => 'Rp. 50.000',
                'diskon' => 'Rp. 40.000',
                'total' => 'Rp. 10.000',
            ])  
            @include('components.cardrwyt', [
                'nama' => 'Sate Klatak',
                'variasi' => 'Pangsit',
                'jumlah' => 'x2',
                'harga' => 'Rp. 50.000',
                'diskon' => 'Rp. 40.000',
                'total' => 'Rp. 10.000',
            ])
                </div>

                <!-- Order Now Button - Always at the bottom -->
                <div class="p-6 bg-amber-50 flex justify-center mt-auto">
                    <button class="w-full max-w-lg py-3 border-2 border-amber-700 text-amber-700 rounded-full text-lg font-bold hover:bg-amber-200 transition duration-150">
                        PESAN SEKARANG
                    </button>
                </div>
            </div>
@endsection

