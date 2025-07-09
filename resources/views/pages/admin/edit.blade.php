@extends('layouts.appadm')
@section('title', 'Edit Profil Admin')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-xl bg-white rounded-xl shadow p-8">
            <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data" class="w-full">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $admin->id ?? '' }}">
                <div class="mb-4">
                    <label class="block mb-1">Name</label>
                    <input type="text" name="name" class="w-full border rounded p-2"
                        value="{{ old('name', $admin->name ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Username</label>
                    <input type="text" name="username" class="w-full border rounded p-2"
                        value="{{ old('username', $admin->username ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded p-2"
                        value="{{ old('email', $admin->email ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Foto Profil</label>
                    <input type="file" name="foto" class="w-full border rounded p-2">
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="px-4 py-2 bg-amber-500 text-white rounded hover:bg-amber-600">Simpan</button>
                    <a href="{{ route('admin.data') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif
@endsection