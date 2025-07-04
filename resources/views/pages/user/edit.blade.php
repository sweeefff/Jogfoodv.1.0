@extends('layouts.user')

@section('title', 'Edit Profil - Jogfood')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen -mt-20">
        <h1 class="text-2xl font-bold mb-6 text-amber-600">Edit Profil</h1>

        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center border border-amber-300">
            @if ($errors->any())
                <div class="mb-4 text-red-500 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="flex flex-col items-center mb-4">
                    @if($user->foto)
                        <img src="{{ asset('assets/img/profile/' . $user->foto) }}" alt="{{ $user->foto }}"
                            class="w-24 h-24 rounded-full object-cover mb-2">
                    @else
                        <div class="w-24 h-24 rounded-full bg-amber-300 flex items-center justify-center mb-2">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                            </svg>
                        </div>
                    @endif
                    <input type="file" name="foto" accept="image/*" class="mt-2">
                    <small class="text-gray-500">Format: jpg, jpeg, png. Maks 2MB.</small>
                </div>

                <div>
                    <label class="block text-left text-amber-600">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-3 py-2 bg-amber-100 rounded">
                </div>

                <div>
                    <label class="block text-left text-amber-600">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full px-3 py-2 bg-amber-100 rounded">
                </div>

                <div>
                    <label class="block text-left text-amber-600">No hp</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                        class="w-full px-3 py-2 bg-amber-100 rounded">
                </div>

                <div>
                    <label class="block text-left text-amber-600">Alamat</label>
                    <textarea name="alamat" class="w-full px-3 py-2 bg-amber-100 rounded" id="alamat"
                        rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                </div>
                <!-- Hidden latitude dan longitude -->
                <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $user->latitude) }}">
                <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $user->longitude) }}">

                <div id="map" style="height: 400px; margin-top: 20px;"></div>


                <div class="flex justify-between mt-6">
                    <a href="{{ route('profile') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Lengkapi Data!',
                    text: @json(session('error')),
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true
                });
            });
        </script>
    @endif

    <script>
        const latInput = document.getElementById('latitude');
        const lngInput = document.getElementById('longitude');
        const alamatTextarea = document.getElementById('alamat');

        const defaultLat = parseFloat(latInput.value) || -6.2;
        const defaultLng = parseFloat(lngInput.value) || 106.8;

        const map = L.map('map').setView([defaultLat, defaultLng], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

        function updateInputsAndAddress(lat, lng) {
            latInput.value = lat.toFixed(6);
            lngInput.value = lng.toFixed(6);

            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                .then(res => res.json())
                .then(data => {
                    if (data.display_name) {
                        alamatTextarea.value = data.display_name;
                    }
                });
        }

        // Geolocation default
        if (navigator.geolocation && !latInput.value && !lngInput.value) {
            navigator.geolocation.getCurrentPosition(position => {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                map.setView([userLat, userLng], 15);
                marker.setLatLng([userLat, userLng]);

                updateInputsAndAddress(userLat, userLng);
            }, error => {
                console.warn('Gagal mendapatkan lokasi:', error.message);
            });
        }

        // Marker drag
        marker.on('dragend', function (e) {
            const { lat, lng } = e.target.getLatLng();
            updateInputsAndAddress(lat, lng);
        });

        // Map click
        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            updateInputsAndAddress(e.latlng.lat, e.latlng.lng);
        });
    </script>


@endsection