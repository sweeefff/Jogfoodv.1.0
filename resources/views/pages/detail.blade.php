@extends('layouts.app')

@section('title', 'Detail')

@section('content')
  <style>
    .product-image {
    transition: transform 0.3s ease;
    }

    .product-image:hover {
    transform: scale(1.03);
    }

    .rating-star {
    color: #fbbf24;
    }

    .quantity-btn {
    transition: all 0.2s ease;
    }

    .quantity-btn:hover {
    background-color: #fed7aa;
    }

    .tab-active {
    border-bottom: 3px solid #f97316;
    font-weight: 600;
    color: #9a3412;
    }
  </style>
    <!-- Main Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


    <!-- Product Section -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      <div class="grid md:grid-cols-2 gap-8 p-6">

      <!-- Product Image -->
      <div class="flex justify-center">
        <div
        class="product-image border-2 border-amber-100 rounded-xl w-full max-w-md h-96 flex items-center justify-center bg-white overflow-hidden">
        <img
          src="https://images.unsplash.com/photo-1601050690597-df0568f70950?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
          alt="Gudeg" class="w-full h-full object-cover">
        </div>
      </div>

      <!-- Product Info -->
      <div class="flex flex-col">
        <div class="flex justify-between items-start mb-2">
        <h1 class="text-3xl font-bold text-gray-800">Gudeg Jogja Special</h1>
        <button class="text-gray-400 hover:text-amber-500 transition-colors">
          <i class="far fa-heart text-2xl"></i>
        </button>
        </div>

        <div class="flex items-center mb-4">
        <div class="flex rating-star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <span class="ml-2 text-sm text-gray-600">(25 ulasan)</span>
        </div>

        <p class="text-2xl font-semibold text-amber-600 mb-4">Rp 30.000</p>

        <div class="mb-6">
        <p class="text-gray-700 leading-relaxed">Gudeg khas Jogja dengan rasa manis legit, dimasak dengan bumbu
          rempah pilihan dan nangka muda pilihan. Disajikan dengan areh kental dan sambal krecek yang menggugah
          selera.</p>
        </div>

        <!-- Quantity Selector -->
        <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
        <div class="flex items-center">
          <button
          class="quantity-btn w-10 h-10 rounded-l-lg border border-amber-300 flex items-center justify-center text-amber-600 hover:bg-amber-100">
          <i class="fas fa-minus"></i>
          </button>
          <div class="w-16 h-10 border-t border-b border-amber-300 flex items-center justify-center">
          <span>1</span>
          </div>
          <button
          class="quantity-btn w-10 h-10 rounded-r-lg border border-amber-300 flex items-center justify-center text-amber-600 hover:bg-amber-100">
          <i class="fas fa-plus"></i>
          </button>
        </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4 mt-auto">
        <button
          class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-300 flex items-center justify-center gap-2">
          <i class="fas fa-shopping-cart"></i>
          <span>Tambah ke Keranjang</span>
        </button>
        <button
          class="flex-1 bg-white border-2 border-amber-500 text-amber-600 hover:bg-amber-50 font-medium py-3 px-6 rounded-lg shadow-sm transition duration-300 flex items-center justify-center gap-2">
          <i class="fas fa-bolt"></i>
          <span>Beli Sekarang</span>
        </button>
        </div>
      </div>
      </div>

      <!-- Product Details Tabs -->
      <div class="border-t border-gray-200">
      <div class="flex overflow-x-auto">
        <button class="px-6 py-4 font-medium text-amber-600 tab-active whitespace-nowrap">
        Deskripsi Produk
        </button>
        <button class="px-6 py-4 font-medium text-gray-500 hover:text-amber-500 whitespace-nowrap">
        Komposisi
        </button>
        <button class="px-6 py-4 font-medium text-gray-500 hover:text-amber-500 whitespace-nowrap">
        Ulasan (25)
        </button>
      </div>

      <div class="p-6">
        <h3 class="text-lg font-semibold mb-3">Deskripsi Lengkap</h3>
        <div class="prose max-w-none text-gray-700">
        <p>Gudeg Jogja Special adalah hidangan tradisional khas Yogyakarta yang terbuat dari nangka muda yang
          dimasak dengan gula merah dan santan, serta diberi bumbu rempah-rempah seperti bawang putih, bawang merah,
          kemiri, ketumbar, daun salam, dan lengkuas.</p>
        <p class="mt-3">Proses memasak gudeg memakan waktu berjam-jam untuk mendapatkan tekstur yang lembut dan rasa
          yang meresap sempurna. Gudeg ini disajikan dengan nasi hangat, ayam kampung, telur, sambal krecek, dan
          areh (kuah kental dari santan).</p>
        <ul class="mt-4 space-y-2">
          <li class="flex items-start">
          <i class="fas fa-check text-amber-500 mt-1 mr-2"></i>
          <span>Dibuat dengan bahan-bahan pilihan</span>
          </li>
          <li class="flex items-start">
          <i class="fas fa-check text-amber-500 mt-1 mr-2"></i>
          <span>Tanpa pengawet dan MSG</span>
          </li>
          <li class="flex items-start">
          <i class="fas fa-check text-amber-500 mt-1 mr-2"></i>
          <span>Proses memasak tradisional selama 8 jam</span>
          </li>
          <li class="flex items-start">
          <i class="fas fa-check text-amber-500 mt-1 mr-2"></i>
          <span>Kemasan higienis dan aman untuk dikirim</span>
          </li>
        </ul>
        </div>
      </div>
      </div>
    </div>

    <!-- Related Products -->
    <div class="mt-12">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Lainnya</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <!-- Product 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="h-48 bg-gray-100 flex items-center justify-center">
        <img
          src="https://images.unsplash.com/photo-1562259925-58ed0e1dff36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
          alt="Sate" class="w-full h-full object-cover">
        </div>
        <div class="p-4">
        <h3 class="font-medium text-gray-800 mb-1">Sate Ayam</h3>
        <p class="text-amber-600 font-semibold">Rp 25.000</p>
        <div class="flex items-center mt-2">
          <div class="flex rating-star text-sm">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          </div>
          <span class="ml-1 text-xs text-gray-600">(18)</span>
        </div>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="h-48 bg-gray-100 flex items-center justify-center">
        <img
          src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80"
          alt="Bakso" class="w-full h-full object-cover">
        </div>
        <div class="p-4">
        <h3 class="font-medium text-gray-800 mb-1">Bakso Malang</h3>
        <p class="text-amber-600 font-semibold">Rp 20.000</p>
        <div class="flex items-center mt-2">
          <div class="flex rating-star text-sm">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <i class="far fa-star"></i>
          </div>
          <span class="ml-1 text-xs text-gray-600">(32)</span>
        </div>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="h-48 bg-gray-100 flex items-center justify-center">
        <img
          src="https://images.unsplash.com/photo-1585032226651-759b368d7246?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1392&q=80"
          alt="Rawon" class="w-full h-full object-cover">
        </div>
        <div class="p-4">
        <h3 class="font-medium text-gray-800 mb-1">Rawon</h3>
        <p class="text-amber-600 font-semibold">Rp 28.000</p>
        <div class="flex items-center mt-2">
          <div class="flex rating-star text-sm">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          </div>
          <span class="ml-1 text-xs text-gray-600">(45)</span>
        </div>
        </div>
      </div>

      <!-- Product 4 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
        <div class="h-48 bg-gray-100 flex items-center justify-center">
        <img
          src="https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1398&q=80"
          alt="Nasi Goreng" class="w-full h-full object-cover">
        </div>
        <div class="p-4">
        <h3 class="font-medium text-gray-800 mb-1">Nasi Goreng</h3>
        <p class="text-amber-600 font-semibold">Rp 22.000</p>
        <div class="flex items-center mt-2">
          <div class="flex rating-star text-sm">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          </div>
          <span class="ml-1 text-xs text-gray-600">(29)</span>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  @endsection

  <script>
    // Simple tab switching functionality
    document.addEventListener('DOMContentLoaded', function () {
      const tabs = document.querySelectorAll('[class*="px-6 py-4"]');

      tabs.forEach(tab => {
        tab.addEventListener('click', function () {
          // Remove active class from all tabs
          tabs.forEach(t => t.classList.remove('tab-active', 'text-amber-600'));
          tabs.forEach(t => t.classList.add('text-gray-500'));

          // Add active class to clicked tab
          this.classList.add('tab-active', 'text-amber-600');
          this.classList.remove('text-gray-500');
        });
      });
    });
  </script>
</body>

</html>
