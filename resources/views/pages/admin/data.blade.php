@extends('layouts.appadm')
@section('title', 'Data Restoran - Jogfood')
@section('content')
        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Navigation -->
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200 bg-white">
                <div class="flex items-center md:hidden">
                    <button class="text-gray-500 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 focus:outline-none">
                        <i class="fas fa-bell"></i>
                    </button>
                    <button class="text-gray-500 focus:outline-none">
                        <i class="fas fa-question-circle"></i>
                    </button>
                    <div class="relative">
                        <button class="flex items-center focus:outline-none">
                            <img class="w-8 h-8 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin">
                            <i class="fas fa-chevron-down ml-1 text-gray-500 text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 overflow-auto p-6 bg-gray-50">
                <div class="max-w-6xl mx-auto">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Profile Restoran</h1>
                        <button class="px-4 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-colors">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Left Column -->
                        <div class="lg:col-span-1">
                            <!-- Profile Card -->
                            <div class="bg-white rounded-lg shadow custom-shadow p-6 mb-6">
                                <div class="flex flex-col items-center">
                                    <div class="relative mb-4">
                                        <img id="avatar-preview" class="w-32 h-32 rounded-full object-cover border-4 border-amber-100" src="https://images.unsplash.com/photo-1517248135467-4dbc1a6e0e5b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Restaurant">
                                        <label for="avatar-upload" class="absolute bottom-0 right-0 bg-amber-500 text-white p-2 rounded-full cursor-pointer avatar-upload hover:bg-amber-600">
                                            <i class="fas fa-camera"></i>
                                            <input type="file" id="avatar-upload" accept="image/*" class="hidden">
                                        </label>
                                    </div>
                                    <h2 class="text-xl font-semibold text-gray-800">Jogfood</h2>                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="bg-white rounded-lg shadow custom-shadow p-6">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-phone-alt text-amber-500 mr-2"></i> Informasi Kontak
                                </h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500" value="+62-1235678">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500" value="jogfood@gmail.com">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="lg:col-span-2">
                            <!-- Restaurant Details -->
                            <div class="bg-white rounded-lg shadow custom-shadow p-6 mb-6">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-info-circle text-amber-500 mr-2"></i> Detail Restoran
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Restoran</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500" value="Jogfood">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500" value="Pbl-IF 240">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                    <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 h-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</textarea>
                                </div>
                            </div>

                            <!-- Location & Hours -->
                            <div class="bg-white rounded-lg shadow custom-shadow p-6 mb-6">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-map-marker-alt text-amber-500 mr-2"></i> Lokasi & Jam
                                </h3>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500" value="123 Gourmet Street, Foodville, CA 90210">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                </div>
                                <h4 class="text-md font-medium text-gray-800 mb-3">Buka Jam</h4>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="w-24 text-sm font-medium text-gray-700">Senin</span>
                                        <div class="flex-1 flex items-center space-x-2">
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="11:00">
                                            <span>-</span>
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="22:00">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="w-24 text-sm font-medium text-gray-700">Selasa</span>
                                        <div class="flex-1 flex items-center space-x-2">
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="11:00">
                                            <span>-</span>
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="22:00">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="w-24 text-sm font-medium text-gray-700">Rabu</span>
                                        <div class="flex-1 flex items-center space-x-2">
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="11:00">
                                            <span>-</span>
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="22:00">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="w-24 text-sm font-medium text-gray-700">Kamis</span>
                                        <div class="flex-1 flex items-center space-x-2">
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="11:00">
                                            <span>-</span>
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="23:00">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="w-24 text-sm font-medium text-gray-700">Jumat</span>
                                        <div class="flex-1 flex items-center space-x-2">
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="11:00">
                                            <span>-</span>
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="23:00">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="w-24 text-sm font-medium text-gray-700">Sabtu</span>
                                        <div class="flex-1 flex items-center space-x-2">
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="10:00">
                                            <span>-</span>
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="23:00">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="w-24 text-sm font-medium text-gray-700">Minggu</span>
                                        <div class="flex-1 flex items-center space-x-2">
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="10:00">
                                            <span>-</span>
                                            <input type="time" class="px-2 py-1 border border-gray-300 rounded-md" value="21:00">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media & Settings -->
                            <div class="bg-white rounded-lg shadow custom-shadow p-6">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-share-alt text-amber-500 mr-2"></i> Social Media & Setting
                                </h3>
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                facebook.com/
                                            </span>
                                            <input type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500" value="Jogfood">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
