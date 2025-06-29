@extends('layouts.user')

@section('title', 'Profil - Jogfood')

@section('content')
    <!-- Content -->
    <div class="flex flex-col items-center justify-center min-h-screen -mt-20">
        <h1 class="text-2xl font-bold mb-6 text-amber-600">USER</h1>

        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center border border-amber-300">
            <!-- Profile Picture -->
            <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-amber-300 flex items-center justify-center overflow-hidden">
                @if($user->foto)
                    <img src="{{ asset('assets/img/profile/' . $user->foto) }}" alt="Foto Profil"
                        class="w-24 h-24 rounded-full object-cover mb-2">
                @else
                    <img src="{{ asset('assets/img/profile/default.avif') }}" alt="Default Foto"
                        class="w-24 h-24 rounded-full object-cover mb-2">
                @endif
            </div>

            <div class="text-left space-y-3">
                <div>
                    <label class="block text-amber-600 text-center w-full">Nama</label>
                    <input type="text" class="w-full px-3 py-2 bg-amber-100 rounded text-center" value="{{ $user->name }}"
                        disabled>
                </div>
                <div>
                    <label class="block text-amber-600 text-center w-full">Username</label>
                    <input type="text" class="w-full px-3 py-2 bg-amber-100 rounded text-center"
                        value="{{ $user->username }}" disabled>
                </div>
                <div>
                    <label class="block text-amber-600 text-center w-full">Email</label>
                    <input type="email" class="w-full px-3 py-2 bg-amber-100 rounded text-center" value="{{ $user->email }}"
                        disabled>
                </div>
                <div>
                    <label class="block text-amber-600 text-center w-full">No HP</label>
                    <input type="text" class="w-full px-3 py-2 bg-amber-100 rounded text-center" value="{{ $user->no_hp }}"
                        disabled>
                </div>
                <div>
                    <label class="block text-amber-600 text-center w-full">Alamat</label>
                    <textarea class="w-full px-3 py-2 bg-amber-100 rounded text-center"
                        disabled>{{ $user->alamat }}</textarea>
                </div>

                @if($user->latitude && $user->longitude)
                    <div class="mt-4">
                        <label class="block text-amber-600 text-center w-full">Lokasi di Peta</label>
                        <div id="map" style="height: 300px;" class="rounded mt-2 border border-gray-300 shadow-sm"></div>
                    </div>
                @endif

                <div class="text-sm text-center text-blue-500 mt-1">
                    <a href="{{ route('password.email') }}">Change Password</a>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('profile.edit') }}"
                    class="px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-800">Edit</a>
            </div>
        </div>
    </div>
    @if($user->latitude && $user->longitude)
        <script>
            const map = L.map('map').setView([{{ $user->latitude }}, {{ $user->longitude }}], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            L.marker([{{ $user->latitude }}, {{ $user->longitude }}]).addTo(map)
                .bindPopup("Lokasi Anda").openPopup();
        </script>
    @endif
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Lengkapi Data!',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            });
        </script>
    @endif
@endsection