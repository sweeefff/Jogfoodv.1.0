@extends('layouts.appadm')
@section('title', 'Profil Admin Restoran - Jogfood')
@section('content')
    <div class="flex flex-col flex-1 overflow-hidden pt-16 sm:pt-20 ml-0 sm:ml-64 min-h-screen bg-gray-50">
        <!-- Header -->
        <div
            class="flex flex-col sm:flex-row items-start sm:items-center justify-between h-auto px-4 sm:px-6 lg:px-10 py-4 sm:py-6 border-b border-gray-200 bg-white shadow-sm rounded-none sm:rounded-b-xl gap-4 sm:gap-6">
            <div
                class="flex flex-col xs:flex-row items-start xs:items-center space-y-3 xs:space-y-0 xs:space-x-4 w-full sm:w-auto">
                <img class="w-16 h-16 sm:w-20 sm:h-20 rounded-full border-4 border-amber-300 object-cover shadow mx-auto xs:mx-0"
                    src="{{ asset('assets/img/profile/' . ($admin->foto ?? 'default.jpg')) }}" alt="Admin">
                <div class="text-center xs:text-left w-full xs:w-auto">
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mb-1">
                        {{ $admin->name ?? 'Admin Jogfood' }}</h2>
                    <span class="text-sm sm:text-base text-gray-500">Username: {{ $admin->username ?? 'admin' }}</span>
                </div>
            </div>
            <div class="flex flex-col xs:flex-row gap-2 w-full xs:w-auto">
                <a href="{{ route('admin.edit') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition shadow text-sm font-medium">
                    <i class="fas fa-edit mr-2"></i>Edit Profil
                </a>
                <a href="{{ route('admin.changepass') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition shadow text-sm font-medium">
                    <i class="fas fa-key mr-2"></i>Ganti Password
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col xl:flex-row gap-4 sm:gap-6 lg:gap-8 p-4 sm:p-6 lg:p-10">
            <!-- Profile Card -->
            <div
                class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 flex flex-col items-center w-full xl:w-1/3 order-1 xl:order-none">
                <img class="w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 rounded-full object-cover border-4 border-amber-200 mb-4 shadow"
                    src="{{ asset('assets/img/profile/' . ($admin->foto ?? 'default.jpg')) }}" alt="Admin">
                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-800 mb-1 text-center">
                    {{ $admin->name ?? 'Admin Jogfood' }}</h3>
                <span class="text-sm text-gray-500 mb-4 text-center">{{ $admin->email ?? 'admin@jogfood.com' }}</span>

                <!-- Contact Info - Mobile Horizontal, Desktop Vertical -->
                <div class="w-full mt-2">
                    <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-1 gap-3 xl:space-y-3 xl:gap-0">
                        <div class="flex items-center text-gray-700 justify-center sm:justify-start xl:justify-start">
                            <i class="fas fa-user text-amber-500 mr-2 sm:mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base truncate">{{ $admin->username ?? 'admin' }}</span>
                        </div>
                        <div class="flex items-center text-gray-700 justify-center sm:justify-start xl:justify-start">
                            <i class="fas fa-phone-alt text-amber-500 mr-2 sm:mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base truncate">{{ $admin->no_hp ?? '-' }}</span>
                        </div>
                        <div class="flex items-center text-gray-700 justify-center sm:justify-start xl:justify-start">
                            <i class="fas fa-map-marker-alt text-amber-500 mr-2 sm:mr-3 text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base truncate">{{ $admin->alamat ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Card -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 flex-1 order-2 xl:order-none">
                <h4 class="text-lg sm:text-xl font-bold text-amber-600 mb-4 sm:mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i> Data Admin
                </h4>

                <!-- Admin Data Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    <div class="space-y-1">
                        <label class="block text-xs sm:text-sm font-medium text-gray-700">Nama Admin</label>
                        <div
                            class="px-3 py-2 sm:py-3 border border-gray-200 rounded-md bg-gray-50 text-sm sm:text-base break-words">
                            {{ $admin->name ?? '-' }}
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs sm:text-sm font-medium text-gray-700">Email</label>
                        <div
                            class="px-3 py-2 sm:py-3 border border-gray-200 rounded-md bg-gray-50 text-sm sm:text-base break-words">
                            {{ $admin->email ?? '-' }}
                        </div>
                    </div>
                    <div class="space-y-1 md:col-span-2">
                        <label class="block text-xs sm:text-sm font-medium text-gray-700">Alamat</label>
                        <div
                            class="px-3 py-2 sm:py-3 border border-gray-200 rounded-md bg-gray-50 text-sm sm:text-base break-words">
                            {{ $admin->alamat ?? '-' }}
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs sm:text-sm font-medium text-gray-700">No. Telepon</label>
                        <div
                            class="px-3 py-2 sm:py-3 border border-gray-200 rounded-md bg-gray-50 text-sm sm:text-base break-words">
                            {{ $admin->no_hp ?? '-' }}
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs sm:text-sm font-medium text-gray-700">ID Admin</label>
                        <div
                            class="px-3 py-2 sm:py-3 border border-gray-200 rounded-md bg-gray-50 text-sm sm:text-base break-words">
                            {{ $admin->id ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom responsive styles for extra small screens -->
    <style>
        @media (max-width: 475px) {
            .xs\:flex-row {
                flex-direction: row;
            }

            .xs\:items-center {
                align-items: center;
            }

            .xs\:space-y-0> :not([hidden])~ :not([hidden]) {
                margin-top: 0;
            }

            .xs\:space-x-4> :not([hidden])~ :not([hidden]) {
                margin-left: 1rem;
            }

            .xs\:text-left {
                text-align: left;
            }

            .xs\:w-auto {
                width: auto;
            }

            .xs\:mx-0 {
                margin-left: 0;
                margin-right: 0;
            }

            .xs\:justify-start {
                justify-content: flex-start;
            }
        }
    </style>
@endsection