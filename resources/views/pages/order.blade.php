@extends('layouts.appadm')
@section('title', 'Order - Jogfood')    
@section('content')
<style>
    .main-content {
        margin-left: 250px;
        transition: all 0.3s ease;
    }
</style>

<div class="main-content p-8 flex justify-center items-center min-h-screen bg-[#fff7f0]">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-6xl">
        <h2 class="text-2xl font-semibold mb-4">Recent Orders</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
                        <th class="px-4 py-3">Order ID</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <!-- Loop di sini -->
                    <tr class="border-b">
                        <td class="px-4 py-3 font-semibold">#ORD-0001</td>
                        <td class="px-4 py-3">John Smith</td>
                        <td class="px-4 py-3">12 May, 2023</td>
                        <td class="px-4 py-3">Rp650.000</td>
                        <td class="px-4 py-3">
                            <span class="bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Selesai</span>
                        </td>
                        <td class="px-4 py-3 flex space-x-2">
                            <!-- Tombol centang -->
                            <button @click="deleted = true" class="text-green-600 hover:text-green-800 text-xl" title="Selesaikan">✔</button>
                            <!-- Tombol silang -->
                            <button @click="deleted = true" class="text-red-600 hover:text-red-800 text-xl" title="Batalkan">❌</button>
                        </td>
                    </tr>
                    <!-- Ulangi untuk baris lainnya -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-between items-center text-sm text-gray-600">
            <span>Ditunjukan 1 sampai 5 dari 24 hasil</span>
            <div class="flex space-x-1">
                <button class="px-3 py-1 border rounded hover:bg-gray-100">Sebelumnya</button>
                <button class="px-3 py-1 border rounded bg-blue-500 text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">2</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">3</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">Selanjutnya</button>
            </div>
        </div>
    </div>
</div>
@endsection
