@extends('layouts.appadm')

@section('title', 'Dashboard Kurir')
@section('content')
    <!-- Content -->
    <div class="p-4 sm:ml-64 pt-20 bg-amber-50 min-h-screen">
        <h3 class="text-xl font-semibold mb-4 flex items-center">
            <i class="fas fa-truck mr-2"></i> Dashboard Kurir
        </h3>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-white mb-8">
            <div class="bg-blue-600 rounded-lg p-4">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-box mr-2"></i> Total Pengiriman
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalPengiriman ?? 0 }}</strong></p>
            </div>
            <div class="bg-green-600 rounded-lg p-4">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-check-circle mr-2"></i> Sukses
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalSukses ?? 0 }}</strong></p>
            </div>
            <div class="bg-red-600 rounded-lg p-4">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-times-circle mr-2"></i> Gagal/Antar Ulang
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalGagal ?? 0 }}</strong></p>
            </div>
        </div>

        <!-- Riwayat Aktivitas Kurir -->
        <div class="bg-white rounded-lg shadow p-6 mt-8">
            <h4 class="text-lg font-bold text-amber-600 mb-4 flex items-center">
                <i class="fas fa-history mr-2"></i> Riwayat Pengiriman
            </h4>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-xs sm:text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-2 sm:px-4 py-2 text-left font-medium text-gray-500 uppercase">Waktu</th>
                            <th class="px-2 sm:px-4 py-2 text-left font-medium text-gray-500 uppercase">ID Transaksi</th>
                            <th class="px-2 sm:px-4 py-2 text-left font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-2 sm:px-4 py-2 text-left font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($riwayat as $item)
                            <tr>
                                <td class="px-2 sm:px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{ $item->tanggal_update ? \Carbon\Carbon::parse($item->tanggal_update)->format('d-m-Y H:i:s') : '-' }}
                                </td>
                                <td class="px-2 sm:px-4 py-2 text-gray-700 break-all">{{ $item->id_transaksi }}</td>
                                <td class="px-2 sm:px-4 py-2">
                                    @if(in_array($item->status_pengiriman, ['sampai', 'success']))
                                        <span class="text-green-600 font-semibold">Sukses</span>
                                    @elseif(in_array($item->status_pengiriman, ['gagal',  'antar-ulang']))
                                        <span class="text-red-600 font-semibold">{{ ucfirst(str_replace('-', ' ', $item->status_pengiriman)) }}</span>
                                    @else
                                        <span class="text-yellow-600 font-semibold">{{ ucfirst(str_replace('-', ' ', $item->status_pengiriman)) }}</span>
                                    @endif
                                </td>
                                <td class="px-2 sm:px-4 py-2">
                                    <a href="{{ route('kurir.update', $item->id_transaksi) }}" class="text-gray-700 underline">Lihat Status</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 py-4">Belum ada riwayat pengiriman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
