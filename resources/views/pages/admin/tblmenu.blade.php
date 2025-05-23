@extends('layouts.appadm')
@section('title', 'Menu Makanan - Jogfood')
@section('content')
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Animation for table rows */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
    <!-- Sidebar -->

    <!-- Content -->
    <div class="p-6 mt-16 ml-64">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Header with search and add button -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $kategori }} Item</h2>
                    <p class="text-amber-600">Mengelola semua item {{ $kategori }} restoran</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-amber-500"></i>
                        </div>
                        <input type="text" id="search"
                            class="bg-amber-50 border border-amber-300 text-amber-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 p-2.5"
                            placeholder="Search menus...">
                    </div>
                    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="flex items-center justify-center text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        <i class="fas fa-plus mr-2"></i> Tambah {{ $kategori }}
                    </button>
                </div>
            </div>
            @include('components.add-modal', ['kategori' => $kategori])
            @include('components.edit-modal', ['kategori' => $kategori])
            <!-- Table Container -->
            <div class="table-container custom-scrollbar shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-amber-500">
                    <thead class="text-xs text-amber-700 uppercase bg-amber-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-16">
                                <div class="flex items-center">
                                    ID
                                    <button onclick="sortTable(0)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-48">
                                <div class="flex items-center">
                                    Nama
                                    <button onclick="sortTable(1)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 min-w-[200px]">
                                <div class="flex items-center">
                                    Deskripsi
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-24">
                                <div class="flex items-center">
                                    Harga
                                    <button onclick="sortTable(3)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-32">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3 w-32">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody id="menuTableBody">
                        @forelse ($menu as $item)
                            <tr class="bg-white border-b hover:bg-amber-50 animate-fade-in">
                                <td class="px-6 py-4">{{ $item->id_menu }}</td>
                                <td class="px-6 py-4 font-medium text-amber-900 whitespace-nowrap">{{ $item->nama }}</td>
                                <td class="px-6 py-4 font-small text-amber-900 whitespace-nowrap">{{ $item->deskripsi_menu }}
                                </td>
                                <td class="px-6 py-4">{{ $item->harga }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('assets/img/menu/' . $item->gambar_menu) }}"
                                        alt="{{ $item->gambar_menu }}" class="w-10 h-10 object-cover">
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-amber-600 hover:text-amber-900 mr-2 edit-button" type="button"
                                        data-id="{{ $item->id_menu }}" data-nama="{{ $item->nama }}"
                                        data-harga="{{ $item->harga }}" data-deskripsi="{{ $item->deskripsi_menu }}"
                                        data-image="{{ $item->gambar_menu }}" data-kategori="{{ $kategori }}"
                                        data-action="{{ route('tblmenu.update', $item->id_menu) }}"
                                        data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('tblmenu.destroy', $item->id_menu) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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

            <!-- Pagination -->
            <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-amber-500">Showing <span
                        class="font-semibold text-amber-900">1-10</span> of <span
                        class="font-semibold text-amber-900">100</span></span>
                <ul class="inline-flex -space-x-px text-sm h-8">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-amber-500 bg-white border border-amber-300 rounded-s-lg hover:bg-amber-100 hover:text-amber-700">Previous</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 hover:bg-amber-100 hover:text-amber-700">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 hover:bg-amber-100 hover:text-amber-700">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="flex items-center justify-center px-3 h-8 text-amber-600 border border-amber-300 bg-amber-50 hover:bg-amber-100 hover:text-amber-700">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 hover:bg-amber-100 hover:text-amber-700">4</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 hover:bg-amber-100 hover:text-amber-700">5</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-amber-500 bg-white border border-amber-300 rounded-e-lg hover:bg-amber-100 hover:text-amber-700">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <script>
        let currentSort = { column: null, asc: true };

        function sortTable(columnIndex) {
            const table = document.querySelector("table");
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));

            const sortedRows = rows.sort((a, b) => {
                let aText = a.children[columnIndex].textContent.trim().toLowerCase();
                let bText = b.children[columnIndex].textContent.trim().toLowerCase();

                // Convert to number if sorting ID or Harga
                if (columnIndex === 0 || columnIndex === 3) {
                    aText = parseFloat(aText);
                    bText = parseFloat(bText);
                }

                if (aText < bText) return currentSort.asc ? -1 : 1;
                if (aText > bText) return currentSort.asc ? 1 : -1;
                return 0;
            });

            // Toggle ascending/descending
            if (currentSort.column === columnIndex) {
                currentSort.asc = !currentSort.asc;
            } else {
                currentSort.column = columnIndex;
                currentSort.asc = true;
            }

            // Append sorted rows
            sortedRows.forEach(row => tbody.appendChild(row));
        }
    </script>

@endsection