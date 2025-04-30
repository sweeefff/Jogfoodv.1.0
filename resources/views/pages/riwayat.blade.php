@extends('layouts.app')

@section('title', 'Riwayat Pemesanan')

@section('content')

    <!-- Order History Header -->
    <div class="bg-amber-500 p-6 border-b border-amber-400">
        <h1 class="text-3xl font-bold text-white text-center">RIWAYAT PEMESANAN</h1>
    </div>

    <!-- Order Items -->
    <div class="container mx-auto">
        @foreach(range(1, 4) as $index)
            <div class="bg-white p-4 border-b border-amber-200 flex justify-between items-center">
                <div class="flex items-center">
                    <div class="bg-amber-300 w-24 h-24 flex items-center justify-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-amber-700">Gudeg</h2>
                        <p class="text-amber-600">Rp.30.000</p>
                    </div>
                </div>
                <div>
                    @if($index <= 2)
                    <a href="rating">
                        <button class="bg-amber-500 text-white px-4 py-2 rounded">Beri Nilai</a></button>
                    @else
                        <button class="bg-amber-500 text-white px-4 py-2 rounded">Pesanan Selesai</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Order Button -->
    <div class="container mx-auto p-4">
        <button class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-4 rounded-md border-2 border-amber-400">
            PESAN SEKARANG
        </button>
    </div>
@endsection

