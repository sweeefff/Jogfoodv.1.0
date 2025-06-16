@extends('layouts.appadm')
@section('title', 'Profil Admin Restoran - Jogfood')
@section('content')
<div class="flex flex-col flex-1 overflow-hidden pt-20 ml-64 min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="flex items-center justify-between h-24 px-10 border-b border-gray-200 bg-white shadow-sm rounded-b-xl">
        <div class="flex items-center space-x-5">
            <img class="w-20 h-20 rounded-full border-4 border-amber-300 object-cover shadow"
                src="{{ asset('assets/img/profile/' . ($admin->foto ?? 'default.jpg')) }}"
                alt="Admin">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-1">{{ $admin->nama ?? 'Admin Jogfood' }}</h2>
                <span class="text-base text-gray-500">Username: {{ $admin->username ?? 'adminruth' }}</span>
            </div>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.edit') }}"

                class="inline-flex items-center px-5 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition shadow">
                <i class="fas fa-edit mr-2"></i>Edit Profil
            </a>
            <a href="{{ route('password.request') }}"
                class="inline-flex items-center px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition shadow">
                <i class="fas fa-key mr-2"></i>Ganti Password
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col md:flex-row gap-8 p-10">
        <!-- Profile Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center w-full md:w-1/3">
            <img class="w-32 h-32 rounded-full object-cover border-4 border-amber-200 mb-4 shadow"
                src="{{ asset('assets/img/profile/' . ($admin->foto ?? 'default.jpg')) }}"
                alt="Admin">
            <h3 class="text-2xl font-semibold text-gray-800 mb-1">{{ $admin->nama ?? 'Admin Ruth' }}</h3>
            <span class="text-sm text-gray-500 mb-4">{{ $admin->email ?? 'admin@jogfood.com' }}</span>
            <div class="w-full space-y-3 mt-2">
                <div class="flex items-center text-gray-700">
                    <i class="fas fa-user text-amber-500 mr-3"></i>
                    <span>Username: {{ $admin->username ?? 'admin ruth' }}</span>
                </div>
                <div class="flex items-center text-gray-700">
                    <i class="fas fa-phone-alt text-amber-500 mr-3"></i>
                    <span>{{ $admin->telepon ?? '0812-3456-7890' }}</span>
                </div>
                <div class="flex items-center text-gray-700">
                    <i class="fas fa-map-marker-alt text-amber-500 mr-3"></i>
                    <span>{{ $admin->alamat ?? 'Jl. Malioboro No.1, Yogyakarta' }}</span>
                </div>
            </div>
        </div>

        <!-- Detail Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 flex-1">
            <h4 class="text-xl font-bold text-amber-600 mb-6 flex items-center">
                <i class="fas fa-info-circle mr-2"></i> Data Admin
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Admin</label>
                    <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->nama ?? 'Admin Ruth' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->email ?? 'admin@jogfood.com' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->alamat ?? 'Jl. Malioboro No.1, Yogyakarta' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                    <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->telepon ?? '0812-3456-7890' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ID Admin</label>
                    <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->id ?? 'ADM001' }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->user_role ?? 'admin' }}</div>
                </div>
            </div>
            <div class="mt-8">
                <h5 class="text-lg font-semibold text-gray-700 mb-2">Tentang Admin</h5>
                <p class="text-gray-600">
                    {{ $admin->tentang ?? 'Admin Jogfood bertugas mengelola data menu, pesanan, dan rekap penjualan di sistem Jogfood. Silakan hubungi admin jika ada kendala pada aplikasi.' }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
