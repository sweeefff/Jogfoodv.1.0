@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        amber: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        }
                    }
                }
            }
        }
    </script>
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
</head>
<body>


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
        <div id="cart-items" class="space-y-4">
            <!-- Item 1 -->
            <div class="cart-item flex items-center border border-amber-100 rounded-lg p-4 gap-4 bg-white">
                <input type="checkbox" class="item-checkbox w-5 h-5 text-amber-500 rounded focus:ring-amber-500 border-gray-400" onchange="toggleButton()">
                <div class="flex items-center gap-4 flex-1">
                    <div class="w-16 h-16 bg-amber-100 rounded-lg flex items-center justify-center overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Gudeg" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Gudeg Jogja</p>
                        <p class="text-sm text-amber-600 font-medium">Rp30.000</p>
                        <p class="text-xs text-gray-500 mt-1">Pedas, Nasi, Ayam</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="decreaseQuantity(this)" class="quantity-btn bg-amber-100 text-amber-800 rounded-full w-6 h-6 text-center flex items-center justify-center">−</button>
                    <span class="quantity text-sm w-6 text-center">1</span>
                    <button onclick="increaseQuantity(this)" class="quantity-btn bg-amber-100 text-amber-800 rounded-full w-6 h-6 text-center flex items-center justify-center">+</button>
                </div>
                <button onclick="removeItem(this)" class="remove-btn bg-amber-500 hover:bg-amber-600 text-white text-sm px-3 py-1 rounded-lg transition">Hapus</button>
            </div>

            <!-- Item 2 -->
            <div class="cart-item flex items-center border border-amber-100 rounded-lg p-4 gap-4 bg-white">
                <input type="checkbox" class="item-checkbox w-5 h-5 text-amber-500 rounded focus:ring-amber-500" onchange="toggleButton()">
                <div class="flex items-center gap-4 flex-1">
                    <div class="w-16 h-16 bg-amber-100 rounded-lg flex items-center justify-center overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1160&q=80" alt="Sate" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Sate Ayam</p>
                        <p class="text-sm text-amber-600 font-medium">Rp25.000</p>
                        <p class="text-xs text-gray-500 mt-1">Pedas, Kecap, Lontong</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="decreaseQuantity(this)" class="quantity-btn bg-amber-100 text-amber-800 rounded-full w-6 h-6 text-center flex items-center justify-center">−</button>
                    <span class="quantity text-sm w-6 text-center">2</span>
                    <button onclick="increaseQuantity(this)" class="quantity-btn bg-amber-100 text-amber-800 rounded-full w-6 h-6 text-center flex items-center justify-center">+</button>
                </div>
                <button onclick="removeItem(this)" class="remove-btn bg-amber-500 hover:bg-amber-600 text-white text-sm px-3 py-1 rounded-lg transition">Hapus</button>
            </div>

            <!-- Item 3 -->
            <div class="cart-item flex items-center border border-amber-100 rounded-lg p-4 gap-4 bg-white">
                <input type="checkbox" class="item-checkbox w-5 h-5 text-amber-500 rounded focus:ring-amber-500" onchange="toggleButton()">
                <div class="flex items-center gap-4 flex-1">
                    <div class="w-16 h-16 bg-amber-100 rounded-lg flex items-center justify-center overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551504734-5ee1c4a1479b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Bakso" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Bakso Malang</p>
                        <p class="text-sm text-amber-600 font-medium">Rp20.000</p>
                        <p class="text-xs text-gray-500 mt-1">Kuah, Mie, Pentol</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="decreaseQuantity(this)" class="quantity-btn bg-amber-100 text-amber-800 rounded-full w-6 h-6 text-center flex items-center justify-center">−</button>
                    <span class="quantity text-sm w-6 text-center">1</span>
                    <button onclick="increaseQuantity(this)" class="quantity-btn bg-amber-100 text-amber-800 rounded-full w-6 h-6 text-center flex items-center justify-center">+</button>
                </div>
                <button onclick="removeItem(this)" class="remove-btn bg-amber-500 hover:bg-amber-600 text-white text-sm px-3 py-1 rounded-lg transition">Hapus</button>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="mt-8 border-t border-amber-100 pt-4">
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Subtotal</span>
                <span id="subtotal" class="font-medium">Rp95.000</span>
            </div>
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Biaya Pengiriman</span>
                <span id="delivery-fee" class="font-medium">Rp10.000</span>
            </div>
            <div class="flex justify-between text-lg font-bold mt-4 pt-2 border-t border-amber-100">
                <span>Total</span>
                <span id="total" class="text-amber-600">Rp105.000</span>
            </div>
        </div>

        <!-- Checkout Button -->
        <div id="checkout-btn-container" class="mt-6">
            <button onclick="checkout()" class="w-full bg-amber-600 hover:bg-amber-700 text-white py-3 rounded-lg font-bold transition flex items-center justify-center gap-2">
                <i class="fas fa-shopping-bag"></i>
                Pesan Sekarang
            </button>
        </div>
    </div>
  </div>

  <script>
    // Toggle checkout button based on selected items
    function toggleButton() {
        const checkboxes = document.querySelectorAll('.item-checkbox');
        const checkoutBtn = document.getElementById('checkout-btn-container');
        let isAnyChecked = false;

        checkboxes.forEach((cb) => {
            if (cb.checked) isAnyChecked = true;
        });

        checkoutBtn.style.display = isAnyChecked ? 'block' : 'none';
        calculateTotal();
    }

    // Quantity adjustment functions
    function increaseQuantity(button) {
        const quantityElement = button.parentElement.querySelector('.quantity');
        let quantity = parseInt(quantityElement.textContent);
        quantityElement.textContent = quantity + 1;
        calculateTotal();
    }

    function decreaseQuantity(button) {
        const quantityElement = button.parentElement.querySelector('.quantity');
        let quantity = parseInt(quantityElement.textContent);
        if (quantity > 1) {
            quantityElement.textContent = quantity - 1;
            calculateTotal();
        }
    }

    // Remove item from cart
    function removeItem(button) {
        const item = button.closest('.cart-item');
        item.remove();
        calculateTotal();
        
        // Hide checkout button if no items left
        if (document.querySelectorAll('.cart-item').length === 0) {
            document.getElementById('checkout-btn-container').style.display = 'none';
        }
    }

    // Calculate total price
    function calculateTotal() {
        let subtotal = 0;
        const items = document.querySelectorAll('.cart-item');
        
        items.forEach(item => {
            const checkbox = item.querySelector('.item-checkbox');
            if (checkbox.checked) {
                const priceText = item.querySelector('p.text-amber-600').textContent;
                const price = parseInt(priceText.replace(/\D/g, ''));
                const quantity = parseInt(item.querySelector('.quantity').textContent);
                subtotal += price * quantity;
            }
        });
        
        const deliveryFee = 10000;
        const total = subtotal + deliveryFee;
        
        document.getElementById('subtotal').textContent = `Rp${subtotal.toLocaleString('id-ID')}`;
        document.getElementById('delivery-fee').textContent = `Rp${deliveryFee.toLocaleString('id-ID')}`;
        document.getElementById('total').textContent = `Rp${total.toLocaleString('id-ID')}`;
    }

    // Checkout function
    function checkout() {
        const selectedItems = [];
        document.querySelectorAll('.cart-item').forEach(item => {
            const checkbox = item.querySelector('.item-checkbox');
            if (checkbox.checked) {
                const name = item.querySelector('p.font-semibold').textContent;
                const quantity = item.querySelector('.quantity').textContent;
                selectedItems.push({name, quantity});
            }
        });
        
        alert(`Pesanan Anda (${selectedItems.length} item) sedang diproses!\nTotal: ${document.getElementById('total').textContent}`);
        
        // In a real app, you would submit this to your backend
        // window.location.href = '/checkout';
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        calculateTotal();
    });
  </script>
</div>
@endsection
