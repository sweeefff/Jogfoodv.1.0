@extends('layouts.app')

@section('title', 'Register - Jogfood')

@section('content')
    <!-- Content -->
    <div class="flex flex-col items-center justify-center min-h-screen -mt-20">
        <h1 class="text-2xl font-bold mb-6 text-amber-600">USER</h1>

        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center border border-amber-300">
            <!-- Profile Picture -->
            <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-amber-300 flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                </svg>
            </div>

            <!-- Form Info -->
            @php
            // Data dummy dari backend / database
            $user = [
                'nama' => 'Ruth Yohana',
                'email' => 'ruth@example.com',
                'phone' => '08123456789',
                'alamat' => 'Jl. Contoh No. 123, Jakarta'
            ];
            @endphp

            <div class="text-left space-y-3">
                <div>
                    <label class="block text-amber-600 text-center w-full">Nama</label>
                    <input type="text" class="w-full px-3 py-2 bg-amber-100 rounded text-center" value="{{ $user['nama'] }}" disabled>
                </div>
                 <div>
                    <label class="block text-amber-600 text-center w-full">Email</label>
                    <input type="email" class="w-full px-3 py-2 bg-amber-100 rounded text-center" value="{{ $user['email'] }}" disabled>
                </div>
                <div>
                    <label class="block text-amber-600 text-center w-full">Nomor Telpon</label>
                    <input type="text" class="w-full px-3 py-2 bg-amber-100 rounded text-center" value="{{ $user['phone'] }}" disabled>
                </div>
                <div>
                    <label class="block text-amber-600 text-center w-full">Alamat</label>
                    <input type="text" class="w-full px-3 py-2 bg-amber-100 rounded text-center" value="{{ $user['alamat'] }}" disabled>
                </div>
                <div class="text-sm text-center text-amber-500 mt-1">
                    <a href="#">Change Password</a>
                </div>
            </div>

            <!-- Edit Button -->
            <div class="mt-6">
                <a href="#" class="px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-800">Edit</a>
            </div>
        </div>
    </div>

@endsection

