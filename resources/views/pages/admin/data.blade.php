@extends('layouts.appadm')
@section('title', 'Profil Admin Restoran - Jogfood')
@section('content')
    <div class="flex flex-col flex-1 overflow-hidden pt-20 ml-64 min-h-screen bg-gray-50">
        <!-- Header -->
        <div
            class="flex flex-col md:flex-row items-center justify-between h-auto md:h-24 px-4 md:px-10 py-6 border-b border-gray-200 bg-white shadow-sm rounded-b-xl gap-4">
            <div class="flex items-center space-x-4 md:space-x-5 w-full md:w-auto">
                <img class="w-20 h-20 rounded-full border-4 border-amber-300 object-cover shadow"
                    src="{{ $admin->foto ? Storage::url('admin/' . $admin->foto) : asset('storage/admin/default.avif') }}"
                    alt="Admin">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">{{ $admin->name ?? 'Admin Jogfood' }}</h2>
                    <span class="text-base text-gray-500">Username: {{ $admin->username ?? 'admin' }}</span>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto">
                <a href="{{ route('admin.edit') }}"
                    class="inline-flex items-center justify-center px-5 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition shadow text-sm md:text-base">
                    <i class="fas fa-edit mr-2"></i>Edit Profil
                </a>
                <a href="{{ route('password.email') }}"
                    class="inline-flex items-center justify-center px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition shadow text-sm md:text-base">
                    <i class="fas fa-key mr-2"></i>Ganti Password
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:flex-row gap-8 p-4 md:p-10">
            <!-- Profile Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 flex flex-col items-center w-full lg:w-1/3 mb-6 lg:mb-0">
                <img class="w-28 h-28 md:w-32 md:h-32 rounded-full object-cover border-4 border-amber-200 mb-4 shadow"
                    src="{{ $admin->foto ? Storage::url('admin/' . $admin->foto) : asset('assets/img/profile/default.avif') }}"
                    alt="Admin">
                <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-1">{{ $admin->name ?? 'Admin Jogfood' }}</h3>
                <span class="text-sm text-gray-500 mb-4">{{ $admin->email ?? 'admin@jogfood.com' }}</span>
                <div class="w-full space-y-3 mt-2">
                    <div class="flex items-center text-gray-700">
                        <i class="fas fa-user text-amber-500 mr-3"></i>
                        <span>Username: {{ $admin->username ?? 'admin' }}</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <i class="fas fa-phone-alt text-amber-500 mr-3"></i>
                        <span>{{ $admin->no_hp ?? '-' }}</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-amber-500 mr-3"></i>
                        <span>{{ $admin->alamat ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Detail Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 flex-1">
                <h4 class="text-lg md:text-xl font-bold text-amber-600 mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i> Data Admin
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Admin</label>
                        <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->name ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->email ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->alamat ?? '-' }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                        <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->no_hp ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ID Admin</label>
                        <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->id ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <div class="px-3 py-2 border border-gray-200 rounded-md bg-gray-50">{{ $admin->role ?? 'admin' }}
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <h5 class="text-base md:text-lg font-semibold text-gray-700 mb-2">Tentang Admin</h5>
                    <p class="text-gray-600 text-sm md:text-base">
                        Admin Jogfood bertugas mengelola data menu, pesanan, dan rekap penjualan di sistem Jogfood. Silakan
                        hubungi admin jika ada kendala pada aplikasi.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @elseif (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif
    </script>
@endsection