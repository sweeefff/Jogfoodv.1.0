<style>
    .bg-amber-gradient {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
    }
</style>
@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="min-h-screen bg-amber-50 flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header with gradient background -->
                <div class="bg-amber-gradient py-6 px-8 text-center">
                    <div class="flex justify-center mb-2">
                        <img class="h-16" src="{{ asset('assets/img/logo_jogfood.png') }}" alt="Logo Jogfood">
                    </div>
                    <h1 class="text-2xl font-bold text-white">Selamat Datang</h1>
                    <p class="text-amber-100 mt-1">Silakan masuk ke akun Anda</p>
                </div>

                <!-- Form section -->
                <div class="px-8 py-6">
                    <form>
                        <!-- Username field -->
                        <div class="mb-5">
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-amber-400"></i>
                                </div>
                                <input type="text" id="username"
                                    class="input-focus pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none"
                                    placeholder="Masukkan username">
                            </div>
                        </div>

                        <!-- Password field -->
                        <div class="mb-5">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-amber-400"></i>
                                </div>
                                <input type="password" id="password"
                                    class="input-focus pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none"
                                    placeholder="Masukkan password">
                            </div>
                        </div>

                        <!-- Remember me & Forgot password -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-amber-600 hover:text-amber-500">Lupa password?</a>
                            </div>
                        </div>

                        <!-- Login button -->
                        <button type="submit"
                            class="w-full bg-amber-500 text-white font-bold py-3 px-4 rounded-md hover:bg-amber-600 transition-all hover:shadow-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                            Masuk
                        </button>

                        <!-- Register link -->
                        <div class="mt-4 text-center text-sm">
                            <span class="text-gray-600">Belum punya akun?</span>
                            <a href="#" class="ml-1 font-medium text-amber-600 hover:text-amber-500">Daftar sekarang</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer note -->
            <div class="mt-6 text-center text-xs text-gray-500">
                © 2023 Jogfood. All rights reserved.
            </div>
        </div>
    </div>
@endsection