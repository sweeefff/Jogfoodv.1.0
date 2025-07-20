@extends('layouts.appadm')

@section('title', 'Dashboard Kurir')
@section('content')
    <!-- Content -->
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-amber-50 to-white sm:ml-64 pt-20">        
    <h3 class="text-xl font-semibold mb-4 flex items-center">
            <i class="fas fa-truck mr-2"></i> Dashboard Kurir
        </h3>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-white mb-8">
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
            <div class="bg-orange-600 rounded-lg p-4">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-money-bill-wave mr-2"></i> COD
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalCOD ?? 0 }}</strong></p>
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
                            <th class="px-2 sm:px-4 py-2 text-left font-medium text-gray-500 uppercase">Pembayaran</th>
                            <th class="px-2 sm:px-4 py-2 text-left font-medium text-gray-500 uppercase">COD Status</th>
                            <th class="px-2 sm:px-4 py-2 text-left font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($riwayat as $item)
@php
    $isCOD = $item->transaksi && $item->transaksi->pembayaran && $item->transaksi->pembayaran->metode_pembayaran === 'cod';
    $statusTransaksi = $item->transaksi ? $item->transaksi->status_transaksi : 'N/A';
    $statusPengiriman = $item->transaksi && $item->transaksi->status_pengiriman ? $item->transaksi->status_pengiriman->status_pembayaran : 'N/A';
    $metodePembayaran = $item->transaksi && $item->transaksi->pembayaran ? $item->transaksi->pembayaran->metode_pembayaran : 'N/A';
    $totalHarga = $item->transaksi ? $item->transaksi->total_harga : 0;
@endphp

                            <tr class="{{ $isCOD ? 'bg-orange-50' : '' }}">
                                <td class="px-2 sm:px-4 py-2 text-gray-700 whitespace-nowrap">
                                    {{ $item->tanggal_update ? \Carbon\Carbon::parse($item->tanggal_update)->format('d-m-Y H:i:s') : '-' }}
                                </td>
                                <td class="px-2 sm:px-4 py-2 text-gray-700 break-all">{{ $item->id_transaksi }}</td>
                                <td class="px-2 sm:px-4 py-2">
                                    @if(in_array($item->status_pengiriman, ['selesai']))
                                        <span class="text-green-600 font-semibold">Sukses</span>
                                    @elseif(in_array($item->status_pengiriman, ['gagal']))
                                        <span class="text-red-600 font-semibold">{{ ucfirst(str_replace('-', ' ', $item->status_pengiriman)) }}</span>
                                    @else
                                        <span class="text-yellow-600 font-semibold">{{ ucfirst(str_replace('-', ' ', $item->status_pengiriman)) }}</span>
                                    @endif
                                </td>
                                <td class="px-2 sm:px-4 py-2">
                                    <div class="flex flex-col">
                                        <span class="text-xs font-medium {{ $metodePembayaran === 'cod' ? 'text-orange-600' : 'text-blue-600' }}">
                                            {{ strtoupper($metodePembayaran) }}
                                        </span>
                                        @if($isCOD)
                                            <span class="text-xs text-gray-600">Rp{{ number_format($totalHarga, 0, ',', '.') }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-2 sm:px-4 py-2">
@if ($isCOD)
    @if ($statusTransaksi === 'lunas' && $statusPengiriman === 'dibayar')
        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
            <i class="fas fa-check-circle mr-1"></i>Lunas
        </span>
    @elseif ($statusTransaksi === 'pending' && $statusPengiriman === 'belum dibayar')
        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
            <i class="fas fa-clock mr-1"></i>Pending
        </span>
    @else
        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
            <i class="fas fa-times-circle mr-1"></i>Belum Bayar
        </span>
    @endif
@else
    <span class="text-gray-400 text-xs">-</span>
@endif

                                </td>
                                <td class="px-2 sm:px-4 py-2">
                                    <a href="{{ route('kurir.showUpdate', $item->id_transaksi) }}" class="text-green-700 underline hover:text-green-900">Lihat Status</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-4">Belum ada riwayat pengiriman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Legend for COD -->
            <div class="mt-4 p-3 bg-gray-50 rounded-lg border">
                <h5 class="text-sm font-semibold text-gray-700 mb-2">Keterangan:</h5>
                <div class="flex flex-wrap gap-4 text-xs">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-orange-50 border border-orange-200 rounded mr-2"></div>
                        <span class="text-gray-600">Pesanan COD (Cash on Delivery)</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mr-2">
                            <i class="fas fa-check-circle mr-1"></i>Lunas
                        </span>
                        <span class="text-gray-600">Pembayaran COD sudah diterima</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mr-2">
                            <i class="fas fa-clock mr-1"></i>Pending
                        </span>
                        <span class="text-gray-600">Menunggu pembayaran COD</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection