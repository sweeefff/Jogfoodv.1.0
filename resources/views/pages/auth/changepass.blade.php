@extends('layouts.app')

@section('title', 'Changepass')

@section('content')

    <style>
        .bg-amber-gradient {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        }
    </style>
    <div class="min-h-screen bg-amber-50 flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header with gradient background -->
                <div class="bg-amber-gradient py-6 px-8 text-center">
                    <div class="flex justify-center mb-2">
                        <img class="h-16" src="{{ asset('assets/icon/jogfood.png') }}" alt="Logo Jogfood">
                    </div>
                </div>

                <!-- Form -->
                <form onsubmit="handleChangePassword(event)" class="p-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Password Lama</label>
                        <input type="password" id="oldPassword" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Password Baru</label>
                        <input type="password" id="newPassword" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400" />
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" id="confirmPassword" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400" />
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
                            Simpan
                        </button>
                        <button type="button" onclick="resetForm()"
                            class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function handleChangePassword(event) {
            event.preventDefault();
            const oldPass = document.getElementById('oldPassword').value;
            const newPass = document.getElementById('newPassword').value;
            const confirmPass = document.getElementById('confirmPassword').value;

            if (newPass !== confirmPass) {
                alert('Password baru dan konfirmasi tidak cocok!');
                return;
            }

            alert('Password berhasil diubah!');
            resetForm();
        }

        function resetForm() {
            document.getElementById('oldPassword').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';
        }
    </script>

@endsection