<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jogfood</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-orange-gradient {
            background: linear-gradient(135deg, #f97316 0%, #f59e0b 100%);
        }
        .btn-orange {
            background-color: #f97316;
            transition: all 0.3s ease;
        }
        .btn-orange:hover {
            background-color: #ea580c;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .input-focus:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.2);
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="min-h-screen bg-orange-50 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header with gradient background -->
            <div class="bg-orange-gradient py-6 px-8 text-center">
                <div class="flex justify-center mb-2">
                    <img class="h-16" src="{{ asset('assets/img/logo_jogfood.png') }}" alt="Logo Jogfood">
                </div>
                <h1 class="text-2xl font-bold text-white">Selamat Datang</h1>
                <p class="text-orange-100 mt-1">Silakan masuk ke akun Anda</p>
            </div>
            
            <!-- Form section -->
            <div class="px-8 py-6">
                <form>
                    <!-- Username field -->
                    <div class="mb-5">
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-orange-400"></i>
                            </div>
                            <input type="text" id="username" class="input-focus pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none" placeholder="Masukkan username">
                        </div>
                    </div>
                    
                    <!-- Password field -->
                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-orange-400"></i>
                            </div>
                            <input type="password" id="password" class="input-focus pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none" placeholder="Masukkan password">
                        </div>
                    </div>
                    
                    <!-- Remember me & Forgot password -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-orange-600 hover:text-orange-500">Lupa password?</a>
                        </div>
                    </div>
                    
                    <!-- Login button -->
                    <button type="submit" class="btn-orange w-full text-white font-bold py-3 px-4 rounded-md hover:shadow-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                        Masuk
                    </button>
                    
                    <!-- Register link -->
                    <div class="mt-4 text-center text-sm">
                        <span class="text-gray-600">Belum punya akun?</span>
                        <a href="#" class="ml-1 font-medium text-orange-600 hover:text-orange-500">Daftar sekarang</a>
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
</body>
</html>