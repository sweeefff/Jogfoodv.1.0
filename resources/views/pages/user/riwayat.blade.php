@extends('layouts.user')

@section('title', 'Riwayat Pemesanan')

@section('content')
    <div class="flex-1 flex flex-col min-h-screen bg-amber-50">
        <div class="bg-amber-50 p-6 border-b border-amber-200">
            <h1 class="text-2xl font-bold text-center text-amber-700">RIWAYAT PEMESANAN</h1>
        </div>

        <div class="container mx-auto flex-grow px-4">
            @forelse ($riwayat as $transaksi)
                <div class="mb-6 bg-white rounded-xl shadow p-4">
                    <div class="font-semibold text-amber-700 mb-2">
                        ID Transaksi: {{ $transaksi->id_transaksi }} <span class="text-xs text-gray-500">({{ $transaksi->created_at ? $transaksi->created_at->format('d M Y H:i') : '' }})</span>
                    </div>
                    @foreach ($transaksi->detail_transaksi as $detail)
                        @include('components.card.cardrwyt', [
                            'id_transaksi' => $transaksi->id_transaksi,
                            'id_detail' => $detail->id_detail,
                            'id_menu' => $detail->menu->id_menu,
                            'nama' => $detail->menu->nama,
                            'gambar_menu' => $detail->menu->gambar_menu,
                            'variasi' => $detail->opsi,
                            'jumlah' => 'x' . $detail->jumlah,
                            'harga' => 'Rp. ' . number_format($detail->menu->harga, 0, ',', '.'),
                            'diskon' => 'Rp. 0',
                            'total' => 'Rp. ' . number_format($detail->subtotal, 0, ',', '.'),
                        ])
                    @endforeach
                </div>
            @empty
                <div class="flex flex-col items-center text-gray-600 mt-8">
                    <i class="fas fa-box-open text-6xl mb-4"></i>
                    <p class="text-center">Belum ada riwayat pemesanan.</p>
                </div>
            @endforelse
        </div>

        <div class="p-6 bg-amber-50 flex justify-center mt-auto">
            <a href="{{ route('home') }}">
                <button class="w-full max-w-lg py-3 border-2 border-amber-700 text-amber-700 rounded-full text-lg font-bold hover:bg-amber-200 transition duration-150">
                    PESAN SEKARANG
                </button>
            </a>
        </div>
    </div>
@endsection

