@extends('layouts.appadm')
@section('title', 'Menu Makanan - Jogfood')
@section('content')
    <div class="p-6 2mt-16 ml-auto lg:ml-64">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Kategori Button Tabs -->
            <div class="flex gap-3 mb-6">
                @foreach(['Makanan', 'Minuman', 'Side Dish'] as $kat)
                    <button 
                        onclick="loadKategori('{{ $kat }}')" 
                        class="kategori-btn px-4 py-2 rounded-lg font-semibold 
                            hover:bg-amber-600 hover:text-white transition
                            {{ $kategori == $kat ? 'bg-amber-700 text-white' : 'bg-amber-100 text-amber-700' }}">
                        {{ $kat }}
                    </button>
                @endforeach
            </div>

            <!-- Search & Add Button -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $kategori }} </h2>
                    <p class="text-amber-600">Mengelola semua {{ $kategori }}</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-amber-500"></i>
                        </div>
                        <input type="text" id="tblmenu.search"
                            class="bg-amber-50 border border-amber-300 text-amber-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 p-2.5"
                            placeholder="Search menus...">
                    </div>
                    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="flex items-center justify-center text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        <i class="fas fa-plus mr-2"></i> Tambah {{ $kategori }}
                    </button>
                </div>
            </div>

            <div id="menuContent">
                @include('components.card.add-modal', ['kategori' => $kategori])
                @include('components.card.edit-modal', ['kategori' => $kategori])

                <!-- Table -->
                <div class="table-container custom-scrollbar shadow-md sm:rounded-lg overflow-x-auto">
                    <table class="menu-table text-sm text-left text-amber-500 w-full">
                        <thead class="text-xs text-amber-700 uppercase bg-amber-50">
                            <tr>
                                <th class="px-3 py-3">ID</th>
                                <th class="px-3 py-3">Nama</th>
                                <th class="px-3 py-3">Deskripsi</th>
                                <th class="px-3 py-3 text-right">Harga</th>
                                <th class="px-3 py-3 text-center">Gambar</th>
                                <th class="px-3 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="menuTableBody">
                            @forelse ($menu as $item)
                                <tr class="bg-white border-b hover:bg-amber-50 animate-fade-in">
                                    <td class="px-3 py-4">{{ $item->id_menu }}</td>
                                    <td class="px-3 py-4 font-medium text-amber-900">{{ $item->nama }}</td>
                                    <td class="text-amber-900">{{ $item->deskripsi_menu }}</td>
                                    <td class="px-3 py-4 font-medium text-amber-900 text-right">Rp {{ number_format((float)$item->harga, 0, ',', '.') }}</td>
                                    <td class="px-3 py-4 text-center">
                                        @if($item->gambar_menu && file_exists(public_path('assets/img/menu/' . $item->gambar_menu)))
                                            <img src="{{ asset('assets/img/menu/' . $item->gambar_menu) }}" class="w-12 h-12 object-cover mx-auto rounded-lg shadow-sm">
                                        @else
                                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center mx-auto">
                                                <i class="fas fa-image text-gray-400"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-3 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <button class="text-amber-600 hover:text-amber-900 p-1 rounded hover:bg-amber-100 edit-button"
                                                data-id="{{ $item->id_menu }}" 
                                                data-nama="{{ $item->nama }}"
                                                data-harga="{{ (float)$item->harga }}" 
                                                data-deskripsi="{{ $item->deskripsi_menu }}"
                                                data-image="{{ $item->gambar_menu }}" 
                                                data-kategori="{{ $kategori }}"
                                                data-action="{{ route('tblmenu.update', $item->id_menu) }}"
                                                data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('tblmenu.destroy', $item->id_menu) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-100"
                                                    onclick="return confirm('Yakin ingin menghapus item ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b hover:bg-amber-50 animate-fade-in">
                                    <td colspan="6" class="px-6 py-4 text-center text-amber-900">Tidak ada data tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JS: Search & Kategori -->
    <script>
        function loadKategori(kategori) {
            fetch(`/tblmenu?kategori=${kategori}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#menuContent').innerHTML;
                document.querySelector('#menuContent').innerHTML = newContent;

                // Highlight active tab
                document.querySelectorAll('.kategori-btn').forEach(btn => {
                    if (btn.innerText === kategori) {
                        btn.classList.add('bg-amber-700', 'text-white');
                        btn.classList.remove('bg-amber-100', 'text-amber-700');
                    } else {
                        btn.classList.remove('bg-amber-700', 'text-white');
                        btn.classList.add('bg-amber-100', 'text-amber-700');
                    }
                });
            });
        }

        // Filter search
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("search");
            const tableBody = document.getElementById("menuTableBody");

            if (searchInput && tableBody) {
                searchInput.addEventListener("keyup", function () {
                    const filter = searchInput.value.toLowerCase();
                    const rows = tableBody.getElementsByTagName("tr");

                    Array.from(rows).forEach(row => {
                        const nama = row.cells[1]?.textContent.toLowerCase() || '';
                        const deskripsi = row.cells[2]?.textContent.toLowerCase() || '';
                        row.style.display = (nama.includes(filter) || deskripsi.includes(filter)) ? "" : "none";
                    });
                });
            }
        });
    </script>
@endsection
