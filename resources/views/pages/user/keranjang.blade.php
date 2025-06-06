@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
    <style>
        .cart-item {
            transition: all 0.2s ease;
        }

        .cart-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .quantity-btn {
            transition: all 0.2s ease;
        }

        .quantity-btn:hover {
            background-color: #ea580c;
            color: white;
        }

        .remove-btn {
            transition: all 0.2s ease;
        }

        .remove-btn:hover {
            background-color: #ef4444;
        }
    </style>

    <div class="bg-amber-50 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header with back button -->
            <div class="bg-amber-500 p-4 flex items-center">
                <a href="#" class="text-white mr-4">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="text-2xl font-bold text-white">Keranjang Belanja</h2>
            </div>

            <div class="p-6">
                <div class="bg-amber-100 px-4 py-2 rounded-lg overflow-hidden">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Alamat</span>
                        <span class="text-right font-medium">Jl. Hang Kesturi I No.8, Batam</span>
                    </div>
                    <a href="#" class="text-amber-500 hover:text-amber-700 transition-colors duration-200 block w-full text-right font-medium mt-2">Ubah Alamat</a>
                </div>

                <div id="cart-items" class="space-y-4 mt-4">
                    @forelse ($items as $item)
                        @include('components.card.card-cart', [
                            'nama' => $item->menu->nama,
                            'gambar_menu' => $item->menu->gambar_menu,
                            'harga' => $item->menu->harga,
                            'opsi' => 'Pedas, Kecap, Lontong',
                            'jumlah' => $item->jumlah,
                            'item' => $item
                        ])
                    @empty
                        <div class="flex flex-col items-center text-gray-600 mt-4">
                            <i class="fas fa-box-open text-6xl mb-4"></i>
                            <p class="text-center">Keranjang belanja kamu masih kosong:( <br> Yuk, belanja sekarang!!.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Order Summary -->
                <div class="mt-8 border-t border-amber-100 pt-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Subtotal</span>
                        <span id="subtotal" class="font-medium">Rp0</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Biaya Pengiriman</span>
                        <span id="delivery-fee" class="font-medium">Rp0</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold mt-4 pt-2 border-t border-amber-100">
                        <span>Total</span>
                        <span id="total" class="text-amber-600">Rp0</span>
                    </div>
                </div>

                <!-- Checkout Button -->
                <div id="checkout-btn-container" class="mt-6 hidden">
                    <button onclick="checkout()"
                        class="w-full bg-amber-600 hover:bg-amber-700 text-white py-3 rounded-lg font-bold transition flex items-center justify-center gap-2">
                        <i class="fas fa-shopping-bag"></i>
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/styles/js/keranjang.js') }}"></script>
@endsection
