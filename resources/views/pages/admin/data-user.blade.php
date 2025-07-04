@extends('layouts.appadm')

@section('title', 'Data User')

@section('content')
    <div class="min-h-screen bg-gray-50 ml-48 p-8">
        <div class="max-w-6xl mx-auto mt-20">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-6">
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
                                            <img src="{{ asset('storage/user/' . $user->foto) }}" alt="Foto {{ $user->name }}"
                                                class="w-8 h-8 rounded-full object-cover mx-auto">
                                        @else
                                            <span class="text-xs text-gray-400 italic">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">
                                        <button onclick="confirmDelete('{{ route('users.destroy', $user->id) }}')"
                                            class="text-red-600 hover:text-red-800">
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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Yakin ingin menghapus user ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = url;

                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';
                    form.appendChild(csrf);

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';
                    form.appendChild(method);

                    document.body.appendChild(form);
                    form.submit();
                }
            })
        }
    </script>
@endsection