@extends('layouts.appadm')
@section('title', 'Data Menu')
@section('content')
    <style>
        /* Custom scrollbar */
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
                    <h2 class="text-2xl font-bold text-gray-800">Data Menu</h2>
                    <p class="text-amber-600">Manage all data restaurant menu items</p>
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
                        <i class="fas fa-plus mr-2"></i> Add Data Menu
                    </button>
                </div>
            </div>
            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full bg-amber-50">
                    <!-- Modal content -->
                    <div class="relative bg-amber-50 rounded-lg shadow-sm">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                            <h3 class="text-lg font-semibold text-amber-600">
                                Tambahkan Data Menu 
                            </h3>
                            <button type="button"
                                class="text-amber-600 bg-transparent hover:bg-gray-200 hover:text-amber-800 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Tutup modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-amber-600">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-amber-50 border border-amber-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-amber-600"
                                        placeholder="Type nama menu" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price" class="block mb-2 text-sm font-medium text-amber-600">Harga</label>
                                    <input type="number" name="price" id="price"
                                        class="bg-amber-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-amber-600"
                                        placeholder="Rp.40.000" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-amber-600">Deskripsi</label>
                                    <textarea id="description" rows="4"
                                        class="bg-amber-50 block p-2.5 w-full text-sm text-amber-600 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Tulis deskripsi menu disini"></textarea>
                                </div>
                                <div class="col-span-2">
                                    <label for="media" class="block mb-2 text-sm font-medium text-amber-600">Gambar</label>
                                    <input
                                        class="flex h-10 w-full rounded-md border border-input bg-amber-50 px-3 py-2 text-sm text-amber-600 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium"
                                        type="file" id="media" name="media" accept="image/*">
                                </div>
                            </div>
                            <button type="submit"
                                class="flex items-center justify-center text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tambahkan Data menu
                            </button>
                        </form>
                    </div>
                </div>
            </div>


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
                                    <button onclick="sortTable(3)">
                                        <i class="fas fa-sort ml-1"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 w-24">
                                <div class="flex items-center">
                                    Harga
                                    <button onclick="sortTable(4)">
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
                        <!-- Sample data rows will be inserted here by JavaScript -->
                        <tr class="bg-white border-b hover:bg-amber-50 animate-fade-in">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Gudeg</td>
                            <td class="px-6 py-4 truncate">Gudeg adalah makanan khas Yogyakarta yang dimasak dengan santan dan rempah-rempah.</td>
                            </td>
                            <td class="px-6 py-4">Rp30.000</td>
                            <td class="px-6 py-4">
                                <img src="https://via.placeholder.com/50" alt="Menu item"
                                    class="w-10 h-10 rounded-full object-cover">
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-amber-600 hover:text-amber-900 mr-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
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
    </div>
@endsection