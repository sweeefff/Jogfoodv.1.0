@extends('layouts.appadm')
@section('title', 'Profil Admin Restoran - Jogfood')
@section('content')
<div class="flex flex-col flex-1 overflow-hidden">
    <!-- Header -->
    <div class="flex items-center justify-between h-20 px-8 border-b border-gray-200 bg-white shadow-sm">
        <div class="flex items-center space-x-4">
            <img class="w-16 h-16 rounded-full border-4 border-amber-200 object-cover"
                src="{{ asset('assets/img/profile/' . ($admin->foto ?? 'default.jpg')) }}"
                alt="Admin">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $admin->nama ?? 'Admin Jogfood' }}</h2>
                <span class="text-sm text-gray-500">Profile Admin</span>
            </div>
        </div>
        <a href="{{ route('admin.edit') }}"
            class="inline-flex items-center px-5 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition">
            <i class="fas fa-edit mr-2"></i>Edit Profil
        </a>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto p-8 bg-gray-50">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Profile & Kontak -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <img class="w-32 h-32 rounded-full object-cover border-4 border-amber-100 mb-4"
                    src="{{ asset('assets/img/profile/' . ($admin->foto ?? 'default.jpg')) }}"
                    alt="Admin">
                <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $admin->nama ?? 'Admin Jogfood' }}</h3>
                <span class="text-sm text-gray-500 mb-4">{{ $admin->email ?? 'jogfood@gmail.com' }}</span>
                <div class="w-full space-y-3">
                    <div class="flex items-center text-gray-700">
                        <i class="fas fa-phone-alt text-amber-500 mr-3"></i>
                        <span>{{ $admin->telepon ?? '+62-1235678' }}</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-amber-500 mr-3"></i>
                        <span>{{ $admin->alamat ?? '123 Gourmet Street, Foodville' }}</span>
                    </div>
                </div>
            </div>

            <!-- Detail Restoran -->
            <div class="md:col-span-2 bg-white rounded-xl shadow p-6">
                <h4 class="text-lg font-bold text-amber-600 mb-4 flex items-center">
                    <i class="fas fa-store mr-2"></i> Data Admin
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Admin </label>
                        <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->resto_nama ?? 'Jogfood' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email </label>
                        <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->resto_pemilik ?? 'Pbl-IF 240' }}</div>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Restoran</label>
                    <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->resto_deskripsi ?? 'Restoran kuliner terbaik di kota Anda.' }}</div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Restoran</label>
                    <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->resto_alamat ?? '123 Gourmet Street, Foodville, CA 90210' }}</div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jam Operasional</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @php
                            $jam = [
                                'Senin' => '11:00 - 22:00',
                                'Selasa' => '11:00 - 22:00',
                                'Rabu' => '11:00 - 22:00',
                                'Kamis' => '11:00 - 23:00',
                                'Jumat' => '11:00 - 23:00',
                                'Sabtu' => '10:00 - 23:00',
                                'Minggu' => '10:00 - 21:00',
                            ];
                        @endphp
                        @foreach($jam as $hari => $waktu)
                        <div class="flex items-center justify-between px-3 py-2 border border-gray-200 rounded bg-gray-50">
                            <span class="font-medium">{{ $hari }}</span>
                            <span class="text-sm text-gray-600">{{ $waktu }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Social Media</label>
                    <div class="flex space-x-4 mt-2">
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-pink-500 hover:text-pink-700"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-sky-500 hover:text-sky-700"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
