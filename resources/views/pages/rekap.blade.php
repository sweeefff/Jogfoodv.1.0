@extends('layouts.appadm')
@section('title', 'Menu')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TailAdmin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar.collapsed {
            width: 80px;
        }
        .sidebar.collapsed .nav-text {
            display: none;
        }
        .sidebar.collapsed .logo-text {
            display: none;
        }
        .sidebar.collapsed ~ .main-content {
            margin-left: 80px;
        }
        .main-content {
            transition: all 0.3s ease;
            margin-left: 250px;
        }
        .active-nav {
            background-color: rgba(59, 130, 246, 0.1);
            border-left: 4px solid rgb(59, 130, 246);
            color: rgb(59, 130, 246);
        }
        .dropdown-content {
            display: none;
            transition: all 0.3s ease;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 50;
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <div class="sidebar fixed h-screen bg-white shadow-md w-64 z-40">
        <div class="flex items-center justify-between p-4 border-b">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                    <i class="fas fa-cube"></i>
                </div>
                <span class="logo-text ml-3 text-xl font-semibold">TailAdmin</span>
            </div>
            <button id="toggleSidebar" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <div class="p-4">
            <div class="relative">
                <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>
        
        <nav class="mt-4">
            <div class="px-4 py-2">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Main</p>
            </div>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 active-nav">
                <i class="fas fa-home text-blue-500"></i>
                <span class="nav-text ml-3">Dashboard</span>
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50">
                <i class="fas fa-chart-line text-blue-500"></i>
                <span class="nav-text ml-3">Analytics</span>
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50">
                <i class="fas fa-shopping-cart text-blue-500"></i>
                <span class="nav-text ml-3">E-Commerce</span>
            </a>
            
            <div class="px-4 py-2 mt-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Applications</p>
            </div>
            
            <div class="dropdown">
                <a href="#" class="flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-blue-50">
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-blue-500"></i>
                        <span class="nav-text ml-3">Email</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                </a>
                <div class="dropdown-content pl-12">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50">Inbox</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50">Compose</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50">Templates</a>
                </div>
            </div>
            
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50">
                <i class="fas fa-calendar-alt text-blue-500"></i>
                <span class="nav-text ml-3">Calendar</span>
            </a>
            
            <div class="px-4 py-2 mt-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Settings</p>
            </div>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50">
                <i class="fas fa-cog text-blue-500"></i>
                <span class="nav-text ml-3">Settings</span>
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50">
                <i class="fas fa-user text-blue-500"></i>
                <span class="nav-text ml-3">Profile</span>
            </a>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content min-h-screen">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center">
                    <button id="mobileToggle" class="mr-4 text-gray-500 lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-white text-xs flex items-center justify-center">3</span>
                        </button>
                    </div>
                    <div class="relative">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-envelope text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-4 h-4 bg-blue-500 rounded-full text-white text-xs flex items-center justify-center">5</span>
                        </button>
                    </div>
                    <div class="relative dropdown">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-8 h-8 rounded-full">
                            <span class="hidden md:inline">John Doe</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="dropdown-content absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Content -->
        <main class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
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