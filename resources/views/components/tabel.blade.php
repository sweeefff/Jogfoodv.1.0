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
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Margherita Pizza</td>
                <td class="px-6 py-4 truncate">Classic pizza with tomato sauce, mozzarella, and basil
                </td>
                <td class="px-6 py-4">$12.99</td>
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