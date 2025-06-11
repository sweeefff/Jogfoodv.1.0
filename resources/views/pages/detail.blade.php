@extends(session()->has('user_id') ? 'layouts.user' : 'layouts.guest')

@section('title', 'Detail')

@section('content')
<style>
  /* (CSS tetap sama seperti sebelumnya, saya potong di sini untuk ringkas) */
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="grid md:grid-cols-2 gap-8 p-6">
      <!-- Product Image -->
      <div class="flex justify-center">
        <div class="product-image border-2 border-amber-100 rounded-xl w-full max-w-md h-96 flex items-center justify-center bg-white overflow-hidden">
          <img src="{{ asset('assets/img/menu/' . $menu->gambar_menu) }}" alt="{{ $menu->nama }}" class="w-full h-full object-cover">
        </div>
      </div>

      <!-- Product Info -->
      <div class="flex flex-col">
        <div class="flex justify-between items-start mb-2">
          <h1 class="text-3xl font-bold text-gray-800">{{ $menu->nama }}</h1>
          <button class="text-gray-400 hover:text-amber-500 transition-colors">
            <i class="far fa-heart text-2xl"></i>
          </button>
        </div>

        <div class="flex items-center mb-4">
          <div class="flex rating-star">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
          </div>
          <span class="ml-2 text-sm text-gray-600">(25 ulasan)</span>
        </div>

        <p class="text-2xl font-semibold text-amber-600 mb-4">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>

        <div class="mb-6">
          <p class="text-gray-700 leading-relaxed">{{ $menu->deskripsi_menu }}</p>
        </div>

        <!-- Quantity Selector -->
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
          <div class="flex items-center">
            <button class="quantity-btn w-10 h-10 rounded-l-lg border border-amber-300 flex items-center justify-center text-amber-600 hover:bg-amber-100">
              <i class="fas fa-minus"></i>
            </button>
            <div class="w-16 h-10 border-t border-b border-amber-300 flex items-center justify-center">
              <span>1</span>
            </div>
            <button class="quantity-btn w-10 h-10 rounded-r-lg border border-amber-300 flex items-center justify-center text-amber-600 hover:bg-amber-100">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4 mt-auto">
          <button class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-300 flex items-center justify-center gap-2">
            <i class="fas fa-shopping-cart"></i>
            <span>Tambah ke Keranjang</span>
          </button>
          <button class="flex-1 bg-white border-2 border-amber-500 text-amber-600 hover:bg-amber-50 font-medium py-3 px-6 rounded-lg shadow-sm transition duration-300 flex items-center justify-center gap-2">
            <i class="fas fa-bolt"></i>
            <span>Beli Sekarang</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Tabs (Deskripsi, Komposisi, Ulasan) -->
    <div class="border-t border-gray-200">
      <div class="flex overflow-x-auto">
        <button class="px-6 py-4 font-medium text-amber-600 tab-active whitespace-nowrap">Deskripsi Produk</button>
        <button class="px-6 py-4 font-medium text-gray-500 hover:text-amber-500 whitespace-nowrap">Komposisi</button>
        <button class="px-6 py-4 font-medium text-gray-500 hover:text-amber-500 whitespace-nowrap">Ulasan (25)</button>
      </div>

      <div class="p-6">
        <h3 class="text-lg font-semibold mb-3">Deskripsi Lengkap</h3>
        <div class="prose max-w-none text-gray-700">
          <p>{{ $menu->deskripsi_menu }}</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('[class*="px-6 py-4"]');
    tabs.forEach(tab => {
      tab.addEventListener('click', function () {
        tabs.forEach(t => t.classList.remove('tab-active', 'text-amber-600'));
        tabs.forEach(t => t.classList.add('text-gray-500'));
        this.classList.add('tab-active', 'text-amber-600');
        this.classList.remove('text-gray-500');
      });
    });
  });
</script>
