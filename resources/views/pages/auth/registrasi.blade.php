@extends('layouts.guest')

@section('title', 'Register - Jogfood')

@section('content')
    <style>
        .bg-orange-gradient {
            background: linear-gradient(135deg, #f97316 0%, #f59e0b 100%);
        }
    </style>
    <div class="flex items-center justify-center min-h-screen bg-amber-50">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header with orange gradient -->
                <div class="bg-orange-gradient py-6 px-8 text-center">
                    <div class="flex justify-center mb-2">
                        <img class="h-16" src="{{ asset('assets/icon/jogfood.png') }}" alt="Logo Jogfood">
                    </div>
                    <h1 class="text-2xl font-bold text-white">Selamat Datang</h1>
                    <p class="text-orange-100 mt-1">Silakan Daftar Baru akun Anda</p>
                </div>

                <!-- Form section -->
                <div class="px-8 py-6">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Username field -->
                        <div class="mb-5">
                            <input type="hidden" name="role" value="user">
                            <label for="username" name="username"
                                class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-amber-500"></i>
                                </div>
                                <input type="text" id="username" name="username" required
                                    class="pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    placeholder="Masukkan username">
                            </div>
                            @error('username')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email field -->
                        <div class="mb-5">
                            <label for="email" name="email"
                                class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-amber-500"></i>
                                </div>
                                <input type="email" id="email" name="email" required
                                    class="pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    placeholder="Masukkan email">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password field -->
                        <div class="mb-5">
                            <label for="password" name="password"
                                class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-amber-500"></i>
                                </div>
                                <input type="password" id="password" name="password" required minlength="8"
                                    class="pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    placeholder="Masukkan password">
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password field -->
                        <div class="mb-6">
                            <label for="password_confirmation" name="password_confirmation"
                                class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-amber-500"></i>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    minlength="6"
                                    class="pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    placeholder="Konfirmasi password">
                            </div>
                            @error('password_confirmation')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Captcha field -->
                        <div class="mb-6">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            @if ($errors->has('g-recaptcha-response'))
                                <span class="text-red-500 text-sm">
                                    {{ $errors->first('g-recaptcha-response') }}
                                </span>
                            @endif
                        </div>

                        <!-- Register button -->
                        <button type="submit"
                            class="w-full bg-amber-500 text-white font-bold py-3 px-4 rounded-md hover:bg-amber-600 transition-all hover:shadow-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                            Daftar Sekarang
                        </button>

                        @if (session('success'))
                            <p class="text-green-600 text-sm mt-3">{{ session('success') }}</p>
                        @endif

                        @if (session('error'))
                            <p class="text-red-500 text-sm mt-3">{{ session('error') }}</p>
                        @endif

                        <!-- Login link -->
                        <div class="mt-4 text-center text-sm">
                            <span class="text-gray-600">Sudah punya akun?</span>
                            <a href="login" class="ml-1 font-medium text-amber-600 hover:text-amber-700">Masuk disini!</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-6 text-center text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Jogfood. All rights reserved.</p>
            </div>
        </div>
    </div>
@endsection