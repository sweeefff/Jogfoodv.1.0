@extends('layouts.appadm')
@section('title', 'Edit Profil Kurir')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 pt-20">
        <div class="max-w-xl w-full bg-white rounded-xl shadow p-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Profil Kurir</h2>
            <form action="{{ route('kurir.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $kurir->id ?? '' }}">
                <div class="mb-4">
                    <label class="block mb-1">Nama</label>
                    <input type="text" name="name" class="w-full border rounded p-2"
                        value="{{ old('name', $kurir->name ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Username</label>
                    <input type="text" name="username" class="w-full border rounded p-2"
                        value="{{ old('username', $kurir->username ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded p-2"
                        value="{{ old('email', $kurir->email ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block mb-1">No HP</label>
                    <input type="text" name="no_hp" class="w-full border rounded p-2"
                        value="{{ old('no_hp', $kurir->no_hp ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Alamat</label>
                    <input type="text" name="alamat" class="w-full border rounded p-2"
                        value="{{ old('alamat', $kurir->alamat ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Foto Profil</label>
                    <input type="file" name="foto" class="w-full border rounded p-2">
                    @if($kurir->foto)
                        <img src="{{ asset('storage/' . $kurir->foto) }}" alt="Foto Kurir"
                            class="mt-2 h-20 rounded border mx-auto">
                    @endif
                </div>
                <div class="flex justify-center items-center gap-4 mt-6">
                    <button type="submit"
                        class="px-4 py-2 bg-amber-500 text-white rounded hover:bg-amber-600">Simpan</button>
                    <a href="{{ route('kurir.data') }}" class="text-gray-600 hover:underline">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection