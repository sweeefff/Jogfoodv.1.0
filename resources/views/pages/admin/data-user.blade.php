@extends('layouts.appadm')

@section('title', 'Data User')

@section('content')
    <div class="min-h-screen bg-gray-50 ml-48 p-8">
        <div class="max-w-6xl mx-auto mt-20">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-6 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-800">Data User</h1>
                </div>

                <div class="overflow-x-auto rounded-md shadow-sm">
                    <table class="min-w-full bg-white border border-gray-200 text-sm text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold text-center">
                            <tr>
                                <th class="px-3 py-2">ID</th>
                                <th class="px-3 py-2">Username</th>
                                <th class="px-3 py-2">Nama</th>
                                <th class="px-3 py-2">Email</th>
                                <th class="px-3 py-2">Role</th>
                                <th class="px-3 py-2">Alamat</th>
                                <th class="px-3 py-2">No. HP</th>
                                <th class="px-3 py-2">Foto</th>
                                <th class="px-3 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="border-b hover:bg-gray-50 text-center">
                                    <td class="px-3 py-2">{{ $user->id }}</td>
                                    <td class="px-3 py-2">{{ $user->username }}</td>
                                    <td class="px-3 py-2">{{ $user->name }}</td>
                                    <td class="px-3 py-2">{{ $user->email }}</td>
                                    <td class="px-3 py-2">
                                        <span
                                            class="inline-block px-2 py-0.5 text-xs font-medium bg-green-100 text-green-700 rounded">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2">{{ $user->alamat ?? '-' }}</td>
                                    <td class="px-3 py-2">{{ $user->no_hp ?? '-' }}</td>
                                    <td class="px-3 py-2">
                                        @if($user->foto)
                                            @php
                                                $fotoPath = null;
                                                // Check storage/user/ first
                                                if (Storage::disk('public')->exists('user/' . $user->foto)) {
                                                    $fotoPath = asset('storage/user/' . $user->foto);
                                                }
                                                // Check assets/img/profile/ 
                                                elseif (file_exists(public_path('assets/img/profile/' . $user->foto))) {
                                                    $fotoPath = asset('assets/img/profile/' . $user->foto);
                                                }
                                            @endphp
                                            
                                            @if($fotoPath)
                                                <div class="flex justify-center">
                                                    <img src="{{ $fotoPath }}" 
                                                         alt="Foto {{ $user->name }}"
                                                         class="w-10 h-10 rounded-full object-cover border-2 border-gray-200 shadow-sm cursor-pointer"
                                                         onclick="showImagePreview('{{ $fotoPath }}', '{{ $user->name }}')">
                                                </div>
                                            @else
                                                <div class="flex justify-center">
                                                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                        <i class="fas fa-user text-gray-400 text-sm"></i>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="flex justify-center">
                                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                    <i class="fas fa-user text-gray-400 text-sm"></i>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">
                                        <form id="delete-user-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}"
                                            method="POST" class="sr-only">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" onclick="confirmDeleteUser({{ $user->id }}, '{{ $user->name }}')"
                                            class="p-2 rounded bg-red-100 hover:bg-red-200 text-red-700 transition-colors duration-200" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-12 text-center text-gray-500">
                                        Tidak ada data user.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Image Preview -->
    <div id="imagePreviewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-4 max-w-lg w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 id="imagePreviewTitle" class="text-lg font-semibold">Foto User</h3>
                <button onclick="closeImagePreview()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="text-center">
                <img id="imagePreviewImg" src="" alt="Preview" class="max-w-full max-h-96 rounded-lg mx-auto">
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @elseif (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        function confirmDeleteUser(id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus user ini?',
                text: 'User bernama "' + name + '" akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-user-' + id).submit();
                }
            });
        }

        function showImagePreview(imageSrc, userName) {
            document.getElementById('imagePreviewImg').src = imageSrc;
            document.getElementById('imagePreviewTitle').textContent = 'Foto ' + userName;
            document.getElementById('imagePreviewModal').classList.remove('hidden');
            document.getElementById('imagePreviewModal').classList.add('flex');
        }

        function closeImagePreview() {
            document.getElementById('imagePreviewModal').classList.add('hidden');
            document.getElementById('imagePreviewModal').classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('imagePreviewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImagePreview();
            }
        });
    </script>
@endsection