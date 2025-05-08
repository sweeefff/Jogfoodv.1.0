@extends('layouts.appadm')
@section('title', 'Rekap - Jogfood')    
@section('content')
    <style>
        .main-content {
            margin-left: 80px;
        }
        .main-content {
            transition: all 0.3s ease;
            margin-left: 250px;
        }
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Main Content -->
    <div class="main-content min-h-screen">
        <!-- Content -->
        <main class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6 mt-14">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Pendapatan Total</p>
                            <h3 class="text-2xl font-bold mt-2">Rp25.000.000</h3>
                            <p class="text-green-500 text-sm mt-1"><i class="fas fa-arrow-up mr-1"></i> 12% dari bulan lalu </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-500">
                            <i class="fas fa-dollar-sign text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Total Pemesanan</p>
                            <h3 class="text-2xl font-bold mt-2">958</h3>
                            <p class="text-green-500 text-sm mt-1"><i class="fas fa-arrow-up mr-1"></i> 8% dari bulan lalu</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-500">
                            <i class="fas fa-shopping-cart text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Pengguna Aktif</p>
                            <h3 class="text-2xl font-bold mt-2">573</h3>
                            <p class="text-red-500 text-sm mt-1"><i class="fas fa-arrow-down mr-1"></i> 3% dari bulan lalu </p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-500">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold">Revenue Overview</h2>
                        <div class="flex space-x-2">
                            <button id="monthBtn" class="px-3 py-1 text-sm bg-blue-500 text-white rounded-md">Bulan</button>
                            <button id="weekBtn" class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md">Minggu</button>
                            <button id="dayBtn" class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md">Hari</button>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold mb-6">Top Produk</h2>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 mr-3">
                                <i class="fa-solid fa-utensils"></i>                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Gudeg</p>
                                <p class="text-gray-500 text-sm">makanan</p>
                            </div>
                            <span class="font-semibold">Rp30.000</span>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-500 mr-3">
                                <i class="fa-solid fa-utensils"></i>                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Sate klatak</p>
                                <p class="text-gray-500 text-sm">makanan</p>
                            </div>
                            <span class="font-semibold">Rp40.000</span>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center text-purple-500 mr-3">
                                <i class="fa-solid fa-utensils"></i>                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Nasi goreng</p>
                                <p class="text-gray-500 text-sm">makanan</p>
                            </div>
                            <span class="font-semibold">Rp35.000</span>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-500 mr-3">
                                <i class="fa-solid fa-wine-glass-empty"></i>                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Kopi joss</p>
                                <p class="text-gray-500 text-sm">minuman</p>
                            </div>
                            <span class="font-semibold">Rp50.000</span>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center text-red-500 mr-3">
                                <i class="fa-solid fa-wine-glass-empty"></i>                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Teh tarik</p>
                                <p class="text-gray-500 text-sm">minuman</p>
                            </div>
                            <span class="font-semibold">Rp25.000</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Orders Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold">Recent Orders</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-0001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">John Smith</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 May, 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp650.000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <button class="text-blue-500 hover:text-blue-700 mr-3"><i class="fas fa-eye"></i></button>
                                    <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-0002</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sarah Johnson</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 May, 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp250.000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Diproses</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <button class="text-blue-500 hover:text-blue-700 mr-3"><i class="fas fa-eye"></i></button>
                                    <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-0003</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Michael Brown</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 May, 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp450.000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Dikirim</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <button class="text-blue-500 hover:text-blue-700 mr-3"><i class="fas fa-eye"></i></button>
                                    <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-0004</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Emily Davis</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">9 May, 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp55.000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Dibatalkan</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <button class="text-blue-500 hover:text-blue-700 mr-3"><i class="fas fa-eye"></i></button>
                                    <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-0005</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">David Wilson</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8 May, 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp200.000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <button class="text-blue-500 hover:text-blue-700 mr-3"><i class="fas fa-eye"></i></button>
                                    <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Ditunjukan <span class="font-medium">1</span> sampai <span class="font-medium">5</span> dari <span class="font-medium">24</span> hasil
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm">Sebelumnya</button>
                        <button class="px-3 py-1 bg-blue-500 text-white rounded-md text-sm">1</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm">2</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm">3</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialize the chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            
            // Sample data for the chart
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
            const revenueData = [12000000, 15000000, 18000000, 21000000, 25000000, 23000000];
            
            // Create the chart
            const revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: revenueData,
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
                                label: function(context) {
                                    return 'Rp' + context.raw.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp' + (value / 1000000).toLocaleString('id-ID') + ' jt';
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

            // Button functionality for switching between time periods
            const monthBtn = document.getElementById('monthBtn');
            const weekBtn = document.getElementById('weekBtn');
            const dayBtn = document.getElementById('dayBtn');

            monthBtn.addEventListener('click', function() {
                monthBtn.classList.remove('bg-white', 'border', 'border-gray-300');
                monthBtn.classList.add('bg-blue-500', 'text-white');
                weekBtn.classList.remove('bg-blue-500', 'text-white');
                weekBtn.classList.add('bg-white', 'border', 'border-gray-300');
                dayBtn.classList.remove('bg-blue-500', 'text-white');
                dayBtn.classList.add('bg-white', 'border', 'border-gray-300');
                
                // Update chart data for months
                revenueChart.data.labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
                revenueChart.data.datasets[0].data = [12000000, 15000000, 18000000, 21000000, 25000000, 23000000];
                revenueChart.update();
            });

            weekBtn.addEventListener('click', function() {
                weekBtn.classList.remove('bg-white', 'border', 'border-gray-300');
                weekBtn.classList.add('bg-blue-500', 'text-white');
                monthBtn.classList.remove('bg-blue-500', 'text-white');
                monthBtn.classList.add('bg-white', 'border', 'border-gray-300');
                dayBtn.classList.remove('bg-blue-500', 'text-white');
                dayBtn.classList.add('bg-white', 'border', 'border-gray-300');
                
                // Update chart data for weeks
                revenueChart.data.labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
                revenueChart.data.datasets[0].data = [5000000, 7000000, 6000000, 7000000];
                revenueChart.update();
            });

            dayBtn.addEventListener('click', function() {
                dayBtn.classList.remove('bg-white', 'border', 'border-gray-300');
                dayBtn.classList.add('bg-blue-500', 'text-white');
                monthBtn.classList.remove('bg-blue-500', 'text-white');
                monthBtn.classList.add('bg-white', 'border', 'border-gray-300');
                weekBtn.classList.remove('bg-blue-500', 'text-white');
                weekBtn.classList.add('bg-white', 'border', 'border-gray-300');
                
                // Update chart data for days
                revenueChart.data.labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                revenueChart.data.datasets[0].data = [800000, 1200000, 900000, 1100000, 1500000, 2000000, 1800000];
                revenueChart.update();
            });
        });
    </script>
</body>
</html>
@endsection