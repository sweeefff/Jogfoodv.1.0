@extends('layouts.appadm')

@section('title', 'Data Kurir')

@section('content')
    <div class="min-h-screen bg-gray-50 pt-28 pl-56 pr-4 pb-5">
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Data Kurir</h2>
                <button type="button"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                    onclick="openAddModal()">
                    <i class="fas fa-plus mr-2"></i>Tambah Kurir
                </button>
            </div>

            <div class="overflow-x-auto bg-white rounded-xl shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">ID</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Username</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Nama</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Email</th>
                            <th class="px-4 py-2 text-center text-xs font-semibold text-gray-600">Role</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Alamat</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">No. HP</th>
                            <th class="px-4 py-2 text-center text-xs font-semibold text-gray-600">Foto</th>
                            <th class="px-4 py-2 text-center text-xs font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($kurirs as $k)
                            <tr>
                                <td class="px-4 py-2">{{ $k->id }}</td>
                                <td class="px-4 py-2">{{ $k->username }}</td>
                                <td class="px-4 py-2">{{ $k->name }}</td>
                                <td class="px-4 py-2">{{ $k->email }}</td>
                                <td class="px-4 py-2 text-center">
                                    <span class="inline-block px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">
                                        {{ ucfirst($k->role) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">{{ $k->alamat ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $k->no_hp ?? '-' }}</td>
                                <td class="px-4 py-2 text-center">
                                    @if($k->foto && file_exists(public_path('storage/' . $k->foto)))
                                        <img src="{{ asset('storage/' . $k->foto) }}" alt="Foto {{ $k->name }}"
                                            class="w-10 h-10 rounded-full object-cover mx-auto border border-gray-200 shadow">
                                    @else
                                        <span class="text-gray-400 text-xs">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <form id="delete-form-{{ $k->id }}" action="{{ route('kurir.destroy', $k->id) }}"
                                        method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" class="p-2 rounded bg-red-100 hover:bg-red-200 text-red-700"
                                        onclick="confirmDeleteKurir({{ $k->id }}, '{{ $k->name }}')" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-8 text-center text-gray-400">
                                    <i class="fas fa-inbox fa-2x mb-2"></i><br>
                                    Tidak ada data kurir
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('components.kurir.add-kurir-modal')
@endsection

@section('scripts')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function openAddModal() {
            const modal = document.getElementById('addKurirModal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        }

        function closeAddModal() {
            const modal = document.getElementById('addKurirModal');
            if (modal) {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        }

        function confirmDeleteKurir(id, name) {
            Swal.fire({
                title: 'Yakin ingin menghapus kurir ini?',
                text: 'Kurir bernama "' + name + '" akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection