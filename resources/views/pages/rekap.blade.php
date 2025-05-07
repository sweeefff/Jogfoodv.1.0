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
                
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Conversion Rate</p>
                            <h3 class="text-2xl font-bold mt-2">3.2%</h3>
                            <p class="text-green-500 text-sm mt-1"><i class="fas fa-arrow-up mr-1"></i> 0.8% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-500">
                            <i class="fas fa-percentage text-xl"></i>
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
                            <button class="px-3 py-1 text-sm bg-blue-500 text-white rounded-md">Month</button>
                            <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md">Week</button>
                            <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md">Day</button>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold mb-6">Top Products</h2>
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
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
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
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Processing</span>
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
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Shipped</span>
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
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
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
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
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
                        Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">24</span> results
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm">Previous</button>
                        <button class="px-3 py-1 bg-blue-500 text-white rounded-md text-sm">1</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm">2</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm">3</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm">Next</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar
        const toggleSidebar = document.getElementById('toggleSidebar');
        const mobileToggle = document.getElementById('mobileToggle');
        const sidebar = document.querySelector('.sidebar');
        
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
        
        mobileToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });
        
        // Dropdown functionality
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const button = dropdown.querySelector('a');
            const content = dropdown.querySelector('.dropdown-content');
            
            button.addEventListener('click', (e) => {
                e.preventDefault();
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-content').forEach(content => {
                    content.style.display = 'none';
                });
            }
        });
        
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Revenue',
                    data: [12000, 19000, 15000, 20000, 25000, 22000, 30000],
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
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
    </script>
</body>
</html>
@endsection