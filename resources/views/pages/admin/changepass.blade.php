@extends('layouts.appadm')
@section('title', 'Ganti Password Admin')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-10 mt-12">
    <h2 class="text-2xl font-bold mb-6 text-center text-amber-600 flex items-center justify-center">
        <i class="fas fa-key mr-2"></i> Ganti Password Admin
    </h2>
    <form action="{{ route('admin.changepass.update') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block mb-1 font-semibold text-gray-700">
                <i class="fas fa-lock mr-1 text-amber-500"></i> Password Baru
            </label>
            <input type="password" name="password" class="w-full border border-amber-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-amber-400" required placeholder="Password baru...">
            @error('password')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold text-gray-700">
                <i class="fas fa-lock mr-1 text-amber-500"></i> Konfirmasi Password
            </label>
            <input type="password" name="password_confirmation" class="w-full border border-amber-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-amber-400" required placeholder="Ulangi password baru...">
        </div>
        <div class="flex items-center justify-between mt-8">
            <button type="submit" class="px-6 py-2 bg-amber-500 text-white rounded-lg font-semibold hover:bg-amber-600 transition flex items-center">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
            <a href="{{ route('admin.data') }}" class="text-blue-600 hover:underline flex items-center">
                <i class="fas fa-arrow-left mr-1"></i> Batal
            </a>
        </div>
    </form>
    <div class="mt-8 text-center text-gray-400 text-xs">
        <i class="fas fa-info-circle mr-1"></i>
        Pastikan password baru minimal 6 karakter dan mudah diingat.
    </div>
</div>

@endsection