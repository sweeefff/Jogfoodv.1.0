@extends('layouts.appadm')

@section('title', 'Dashboard')
@section('content')
    <!-- Content -->
    <div class="p-4 sm:ml-64 pt-20 bg-amber-50 min-h-screen mt-16">
        <h3 class="text-xl font-semibold mb-4 flex items-center">
            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard Admin
        </h3>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-white mb-8">
            <!-- Card Makanan (link ke tblmenu) -->
            <a href="{{ route('pages.admin.tblmenu', ['kategori' => 'Makanan']) }}"
                class="bg-blue-600 rounded-lg p-4 block hover:bg-blue-700 transition">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-mortar-pestle mr-2"></i> Makanan
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalMakanan ?? 0 }}</strong></p>
            </a>
            <!-- Card Minuman -->
            <a href="{{ route('pages.admin.tblmenu', ['kategori' => 'Minuman']) }}"
                class="bg-red-600 rounded-lg p-4 block hover:bg-red-700 transition">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-wine-glass mr-2"></i> Minuman
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalMinuman ?? 0 }}</strong></p>
            </a>
            <!-- Card Camilan -->
            <a href="{{ route('pages.admin.tblmenu', ['kategori' => 'Side dish']) }}"
                class="bg-green-600 rounded-lg p-4 block hover:bg-green-700 transition">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-utensils mr-2"></i> Camilan
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalRestoran ?? 0 }}</strong></p>
            </a>
            <!-- Card Data User -->
            <a href="{{ route('users.index') }}" class="bg-yellow-600 rounded-lg p-4  block hover:bg-yellow-700 transition">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-users mr-2"></i> Data User
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalUser ?? 0 }}</strong></p>
            </a>
            <!-- Card Data Kurir -->
            <a href="{{ route('admin.kurir') }}" class="bg-blue-600 rounded-lg p-4 block hover:bg-blue-700 transition">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-motorcycle mr-2"></i> Data Kurir
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalKurir ?? 0 }}</strong></p>
            </a>
            <!-- Card Data Pesanan -->
            <a href="{{ route('admin.order') }}" class="bg-red-600 rounded-lg p-4 block hover:bg-red-700 transition">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-shopping-cart mr-2"></i> Data Pesanan
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalPesanan ?? 0 }}</strong></p>
            </a>
            <!-- Card Pendapatan Total -->
            <a href="{{ route('admin.order') }}" class="bg-green-600 rounded-lg p-4 block hover:bg-green-700 transition">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-money-bill-wave mr-2"></i> Pendapatan Total
                </h5>
                <p class="mt-2">Total: <strong>Rp{{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</strong></p>
            </a>
            <!-- Card Total Pemesanan -->
            <a href="{{ route('admin.order') }}" class="bg-yellow-600 rounded-lg p-4  block hover:bg-yellow-700 transition">
                <h5 class="text-lg font-bold flex items-center">
                    <i class="fas fa-chart-line mr-2"></i> Total Pemesanan
                </h5>
                <p class="mt-2">Total: <strong>{{ $totalPesanan ?? 0 }}</strong></p>
            </a>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-8 lg:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-blue-900">Ringkasan Pendapatan</h2>
                    <div class="flex space-x-2">
                        <button id="yearBtn"
                            class="px-4 py-1 text-sm bg-blue-500 text-white rounded-md shadow">Tahun</button>
                        <button id="monthBtn"
                            class="px-4 py-1 text-sm bg-white border border-gray-300 rounded-md shadow">Bulan</button>
                        <button id="dayBtn"
                            class="px-4 py-1 text-sm bg-white border border-gray-300 rounded-md shadow">Hari</button>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-lg font-semibold mb-6 text-blue-900">Top Produk</h2>
                <div class="space-y-4">
                    @forelse ($topMenus as $menu)
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 mr-3">
                                <i class="fa-solid fa-utensils"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">{{ $menu->nama }}</p>
                                <p class="text-gray-500 text-sm">
                                    Rating: {{ $menu->avg_rating ? number_format($menu->avg_rating, 1) : 'N/A' }}
                                    ({{ $menu->total_ulasan }} ulasan)
                                </p>
                            </div>
                            <span class="font-semibold">Rp{{ number_format($menu->harga, 0, ',', '.') }}</span>
                        </div>
                    @empty
                        <div class="text-center text-gray-500">
                            <i class="fas fa-exclamation-circle text-2xl mb-2"></i>
                            <p>Belum ada produk dengan ulasan</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Chart.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Initialize the chart
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('revenueChart').getContext('2d');

                // Data dari controller
                const chartData = @json($chartData);

                // Create the chart
                const revenueChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartData.yearly.labels,
                        datasets: [{
                            label: 'Pendapatan (Rp)',
                            data: chartData.yearly.data,
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            borderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (context) {
                                        const value = context.raw ?? 0;
                                        return 'Rp' + value.toLocaleString('id-ID', {
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2
                                        });
                                    }
                                }
                            }

                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function (value) {
                                        return 'Rp' + value.toLocaleString('id-ID', {
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2
                                        });
                                    }
                                },
                                grid: {
                                    drawBorder: false,
                                    color: 'rgba(229, 231, 235, 1)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });

                // Button functionality for Tahun, Bulan, Hari
                const yearBtn = document.getElementById('yearBtn');
                const monthBtn = document.getElementById('monthBtn');
                const dayBtn = document.getElementById('dayBtn');

                function updateButtonStyles(activeBtn) {
                    [yearBtn, monthBtn, dayBtn].forEach(btn => {
                        btn.classList.remove('bg-blue-500', 'text-white');
                        btn.classList.add('bg-white', 'border', 'border-gray-300');
                    });
                    activeBtn.classList.remove('bg-white', 'border', 'border-gray-300');
                    activeBtn.classList.add('bg-blue-500', 'text-white');
                }

                yearBtn.addEventListener('click', function () {
                    updateButtonStyles(yearBtn);
                    revenueChart.data.labels = chartData.yearly.labels;
                    revenueChart.data.datasets[0].data = chartData.yearly.data;
                    revenueChart.update();
                });

                monthBtn.addEventListener('click', function () {
                    updateButtonStyles(monthBtn);
                    revenueChart.data.labels = chartData.monthly.labels;
                    revenueChart.data.datasets[0].data = chartData.monthly.data;
                    revenueChart.update();
                });

                dayBtn.addEventListener('click', function () {
                    updateButtonStyles(dayBtn);
                    revenueChart.data.labels = chartData.daily.labels;
                    revenueChart.data.datasets[0].data = chartData.daily.data;
                    revenueChart.update();
                });
            });
        </script>
@endsection