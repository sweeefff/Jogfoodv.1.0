<div class="cart-item flex items-center border border-amber-100 rounded-lg p-4 gap-4 bg-white">
    <input type="checkbox" class="item-checkbox w-5 h-5 text-amber-500 rounded focus:ring-amber-500"
        onchange="toggleButton()">
    <div class="flex items-center gap-4 flex-1">
        <div class="w-16 h-16 bg-amber-100 rounded-lg flex items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1160&q=80"
                alt="Sate" class="w-full h-full object-cover">
        </div>
        <div class="flex-1">
            <p class="font-semibold text-gray-800">Sate Ayam</p>
            <p class="text-sm text-amber-600 font-medium">Rp25.000</p>
            <p class="text-xs text-gray-500 mt-1">Pedas, Kecap, Lontong</p>
        </div>
    </div>
    <div class="flex items-center gap-2">
        <button
            class="remove-btn bg-amber-500 hover:bg-amber-600 text-white text-sm px-3 py-1 rounded-lg transition">{{ $desc }}</button>
    </div>
</div>

