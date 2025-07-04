<style>
    .bg-amber-gradient {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
    }
</style>
@extends(session()->has('user_id') ? 'layouts.user' : 'layouts.guest')

@section('title', 'Forgot Password - Jogfood')

@section('content')

    <div class="min-h-screen bg-amber-50 flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header with gradient background -->
                <div class="bg-amber-gradient py-6 px-8 text-center">
                    <div class="flex justify-center mb-2">
                        <img class="h-16" src="{{ asset('assets/icon/jogfood.png') }}" alt="Logo Jogfood">
                    </div>
                    <h1 class="text-2xl font-bold text-white">Selamat Datang</h1>
                    <p class="text-amber-100 mt-1">Silakan masuk ke akun Anda</p>
                </div>
                @if (session('status'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p class="font-bold">{{ session('status') }}</p>
                    </div>
                @endif

                <!-- Form section -->
                <div class="px-8 py-6">
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <!-- Username field -->
                        <div class="mb-5">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-amber-400"></i>
                                </div>
                                <input type="text" id="email" name="email"
                                    class="input-focus pl-10 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none"
                                    placeholder="Masukkan Email">
                            </div>
                        </div>
                        <!-- Login button -->
                        <button type="submit"
                            class="w-full bg-amber-500 text-white font-bold py-3 px-4 rounded-md hover:bg-amber-600 transition-all hover:shadow-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                            Kirim Link Reset
                        </button>

                        <!-- Register link -->
                        <div class="mt-4 text-center text-sm">
                            <span class="text-gray-600">Belum punya akun?</span>
                            <a href="{{ route('register') }}"
                                class="ml-1 font-medium text-amber-600 hover:text-amber-500">Daftar sekarang</a>
                        </div>
                        <div class="mt-4 text-center text-sm">
                            <span class="text-gray-600">Sudah ingat?</span>
                            <a href="{{ route('login') }}"
                                class="ml-1 font-medium text-amber-600 hover:text-amber-500">Login Sekarang</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer note -->
            <div class="mt-6 text-center text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Jogfood. All rights reserved.</p>
            </div>
        </div>
    </div>
@endsection