@extends('layouts.app')
@section('title', 'Detail Pesanan - Jogfood')

@section('content')
<div class="bg-amber-100 min-h-screen">
    <!-- Tab navigation -->
    <div class="bg-amber-200">
        <div class="max-w-6xl mx-auto">
            <div class="flex overflow-x-auto">
                    <button
                        class="px-4 py-4 whitespace-nowrap font-medium text-amber-500 border-b-2 border-amber-500 text-amber-600"  
                    >Belum Dibayar
                    </button>
                    <button
                    class="px-4 py-4 whitespace-nowrap font-medium text-amber-500 border-b-2 text-gray-600"  
                >Sudah Dibayar
                </button>
                <button
                class="px-4 py-4 whitespace-nowrap font-medium text-amber-500 border-b-2 text-gray-600"  
            >Dibatalkan 
            </button>
            </div>
        </div>
    </div>

    <!-- Search bar -->
    <div class="max-w-6xl mx-auto px-4 py-4">
        <div class="relative">
            <input
                type="text"
                placeholder="Kamu bisa cari berdasarkan Nama Produk, dan Nomor Pesanan."
                class="w-full p-3 pl-10 rounded-md border border-amber-300 text-sm"
            />
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 text-amber-400 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>

    <!-- Orders list -->
    <div class="max-w-6xl mx-auto px-4 pb-12">
        @include('components.cardpsn', [
            'nama' => 'Sate Klatak',
            'variasi' => 'Pangsit',
            'jumlah' => 'x1',
            'harga' => 'Rp. 50.000',
            'diskon' => 'Rp. 40.000',
            'total' => 'Rp. 10.000',
            'nilai' => 'Bayar Sekarang',
            'ubah' => 'Ubah Pesanan',
            'batal' => 'Batalkan Pesanan',
        ])

    <!-- WhatsApp floating button -->
    <div class="fixed bottom-4 right-4">
        <button class="bg-amber-500 text-white rounded-full p-3 shadow-lg flex items-center">
            <span class="mr-2">W</span>
        </button>
    </div>
</div>
@endsection
