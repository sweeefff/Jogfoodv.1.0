@extends('layouts.appadm')

@section('title', 'Dashboard')
@section('content')
    <!-- Content -->
    <div class="p-4 sm:ml-64 pt-20 bg-amber-50 min-h-screen">
        <h3 class="text-xl font-semibold mb-4 flex items-center">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
        </h3>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-white mb-8">
            <div class="bg-blue-600 rounded-lg p-4">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-mortar-pestle mr-2"></i> Kuliner
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalKuliner ?? 1000 }}</strong></p>
            </div>
            <div class="bg-red-600 rounded-lg p-4">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-wine-glass mr-2"></i> Minuman
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalMinuman ?? 1000 }}</strong></p>
            </div>
            <div class="bg-green-700 rounded-lg p-4">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-utensils mr-2"></i> Restoran
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalRestoran ?? 1000 }}</strong></p>
            </div>
            <div class="bg-yellow-500 rounded-lg p-4 text-black">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-users mr-2"></i> User
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalUser ?? 10000 }}</strong></p>
            </div>
        </div>

        <!-- Riwayat Aktivitas Admin -->
        <div class="bg-white rounded-lg shadow p-6 mt-8">
            <h4 class="text-lg font-bold text-amber-600 mb-4 flex items-center">
                <i class="fas fa-history mr-2"></i> Riwayat Kegiatan Admin
            </h4>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Admin</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kegiatan</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">IP Address</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($activities as $activity)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $activity->created_at->format('d-m-Y H:i:s') }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $admin->nama ?? '-' }}</td>
                                <td class="px-4 py-2 text-sm">
                                    @if($activity->activity == 'login')
                                        <span class="text-green-600 font-semibold">Login</span>
                                    @elseif($activity->activity == 'logout')
                                        <span class="text-red-600 font-semibold">Logout</span>
                                    @else
                                        {{ ucfirst($activity->activity) }}
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-500">{{ $activity->ip_address }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-center text-gray-400">Belum ada aktivitas admin.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
