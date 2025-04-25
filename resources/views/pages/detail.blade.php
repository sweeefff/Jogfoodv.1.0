<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk - JogFood</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
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
    .product-image {
      background-image: linear-gradient(to bottom, rgba(251, 146, 60, 0.1), rgba(251, 146, 60, 0.3));
    }
    .rating-star {
      color: #f59e0b;
    }
    .quantity-btn {
      transition: all 0.2s ease;
    }
    .quantity-btn:hover {
      background-color: #fb923c;
      color: white;
    }
    .nav-btn {
      transition: all 0.2s ease;
    }
    .nav-btn:hover {
      background-color: #fb923c;
      color: white;
    }
  </style>
</head>
<body class="bg-primary-50">

  <!-- Header -->
  <header class="flex items-center justify-between p-4 bg-white shadow-md sticky top-0 z-10">
    <div class="flex items-center gap-2">
      <button class="text-2xl text-primary-600 hover:text-primary-800 transition-colors">
        <i class="fas fa-arrow-left"></i>
      </button>
      <div class="flex items-center">
        <span class="text-primary-600 font-bold text-xl">Jog</span>
        <span class="text-orange-800 font-bold text-xl">Food</span>
      </div>
    </div>
    <div class="flex items-center gap-4">
      <a href="#" class="text-primary-600 hover:text-primary-800 transition-colors">Login</a>
      <a href="#" class="bg-primary-500 text-white px-4 py-1 rounded-full hover:bg-primary-600 transition-colors">Daftar</a>
      <button class="text-2xl text-primary-600 hover:text-primary-800 transition-colors relative">
        <i class="fas fa-shopping-cart"></i>
        <span class="absolute -top-2 -right-2 bg-primary-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
      </button>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-6 rounded-xl shadow-lg">

      <!-- Product Image Carousel -->
      <div class="flex flex-col items-center">
        <div class="w-full aspect-square rounded-xl overflow-hidden product-image flex items-center justify-center relative">
          <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
               alt="Gudeg" class="w-full h-full object-cover">
          <div class="absolute top-2 right-2 bg-white/80 rounded-full p-2 shadow">
            <i class="fas fa-heart text-primary-500"></i>
          </div>
        </div>
        <div class="flex justify-between w-full mt-4">
          <button class="nav-btn text-2xl bg-white p-2 rounded-full shadow hover:shadow-md">
            <i class="fas fa-chevron-left"></i>
          </button>
          <div class="flex gap-2">
            <div class="w-3 h-3 rounded-full bg-primary-300"></div>
            <div class="w-3 h-3 rounded-full bg-primary-500"></div>
            <div class="w-3 h-3 rounded-full bg-primary-300"></div>
          </div>
          <button class="nav-btn text-2xl bg-white p-2 rounded-full shadow hover:shadow-md">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>

      <!-- Product Info -->
      <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between">
          <h1 class="text-3xl font-bold text-gray-800">Gudeg Yu Djum</h1>
          <div class="flex items-center gap-1 bg-primary-100 px-3 py-1 rounded-full">
            <span class="rating-star"><i class="fas fa-star"></i></span>
            <span class="font-bold text-primary-800">5.0</span>
          </div>
        </div>
        <p class="text-2xl text-primary-600 font-bold">Rp30.000</p>
        <p class="text-sm text-gray-500">Stok: 50 porsi</p>

        <!-- Quantity -->
        <div class="flex items-center gap-4 mt-2">
          <button class="quantity-btn px-3 py-1 border border-primary-300 rounded-full hover:border-primary-500">
            <i class="fas fa-minus"></i>
          </button>
          <span class="font-medium w-8 text-center">1</span>
          <button class="quantity-btn px-3 py-1 border border-primary-300 rounded-full hover:border-primary-500">
            <i class="fas fa-plus"></i>
          </button>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4 mt-6">
          <button class="flex-1 bg-primary-100 text-primary-700 py-3 rounded-xl font-medium hover:bg-primary-200 transition-colors flex items-center justify-center gap-2">
            <i class="fas fa-cart-plus"></i> Tambah
          </button>
          <button class="flex-1 bg-primary-600 text-white py-3 rounded-xl font-medium hover:bg-primary-700 transition-colors flex items-center justify-center gap-2">
            <i class="fas fa-bolt"></i> Beli
          </button>
        </div>

        <!-- Deskripsi -->
        <div class="mt-6">
          <h2 class="font-bold text-lg mb-2 text-gray-800 flex items-center gap-2">
            <i class="fas fa-info-circle text-primary-500"></i> Deskripsi
          </h2>
          <p class="text-gray-600">
            Gudeg Yu Djum adalah gudeg legendaris dari Yogyakarta yang telah berdiri sejak 1940. Terbuat dari nangka muda yang dimasak dengan santan dan rempah-rempah khas selama berjam-jam, menghasilkan cita rasa manis gurih yang khas. Disajikan dengan nasi hangat, ayam kampung, telur, sambal goreng krecek, dan sambal khas.
          </p>
        </div>

        <!-- Komposisi -->
        <div class="mt-6">
          <h2 class="font-bold text-lg mb-2 text-gray-800 flex items-center gap-2">
            <i class="fas fa-utensils text-primary-500"></i> Komposisi
          </h2>
          <ul class="list-disc list-inside text-gray-600 space-y-1">
            <li>Nangka muda pilihan</li>
            <li>Santan kelapa asli</li>
            <li>Gula merah</li>
            <li>Daun salam dan daun jati</li>
            <li>Bumbu rempah khas</li>
            <li>Ayam kampung</li>
            <li>Telur rebus</li>
          </ul>
        </div>

        <!-- Penilaian -->
        <div class="mt-6 p-4 border border-primary-100 rounded-xl bg-white hover:shadow-md transition-shadow cursor-pointer">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <div class="flex">
                <span class="rating-star"><i class="fas fa-star"></i></span>
                <span class="rating-star"><i class="fas fa-star"></i></span>
                <span class="rating-star"><i class="fas fa-star"></i></span>
                <span class="rating-star"><i class="fas fa-star"></i></span>
                <span class="rating-star"><i class="fas fa-star-half-alt"></i></span>
              </div>
              <span class="font-bold text-primary-800">4.5</span>
              <span class="text-gray-500">(25 ulasan)</span>
            </div>
            <button class="text-primary-600 hover:text-primary-800">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Produk Lainnya -->
    <section class="mt-10">
      <h2 class="text-2xl font-bold mb-4 text-gray-800 flex items-center gap-2">
        <i class="fas fa-utensils text-primary-500"></i> Produk Lainnya
      </h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-md transition-shadow cursor-pointer">
          <div class="h-40 bg-primary-100 flex items-center justify-center">
            <img src="https://images.unsplash.com/photo-1551504734-5ee1c4a1479b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                 alt="Bakpia" class="w-full h-full object-cover">
          </div>
          <div class="p-3">
            <h3 class="font-semibold text-gray-800">Bakpia Pathuk</h3>
            <p class="text-primary-600 font-bold">Rp25.000</p>
            <div class="flex items-center mt-1">
              <span class="rating-star text-sm"><i class="fas fa-star"></i></span>
              <span class="text-xs text-gray-500 ml-1">4.8 (120)</span>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-md transition-shadow cursor-pointer">
          <div class="h-40 bg-primary-100 flex items-center justify-center">
            <img src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1371&q=80" 
                 alt="Sate" class="w-full h-full object-cover">
          </div>
          <div class="p-3">
            <h3 class="font-semibold text-gray-800">Sate Klathak</h3>
            <p class="text-primary-600 font-bold">Rp35.000</p>
            <div class="flex items-center mt-1">
              <span class="rating-star text-sm"><i class="fas fa-star"></i></span>
              <span class="text-xs text-gray-500 ml-1">4.9 (85)</span>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-md transition-shadow cursor-pointer">
          <div class="h-40 bg-primary-100 flex items-center justify-center">
            <img src="https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1468&q=80" 
                 alt="Nasi" class="w-full h-full object-cover">
          </div>
          <div class="p-3">
            <h3 class="font-semibold text-gray-800">Nasi Liwet</h3>
            <p class="text-primary-600 font-bold">Rp28.000</p>
            <div class="flex items-center mt-1">
              <span class="rating-star text-sm"><i class="fas fa-star"></i></span>
              <span class="text-xs text-gray-500 ml-1">4.7 (65)</span>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-md transition-shadow cursor-pointer">
          <div class="h-40 bg-primary-100 flex items-center justify-center">
            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                 alt="Salad" class="w-full h-full object-cover">
          </div>
          <div class="p-3">
            <h3 class="font-semibold text-gray-800">Gado-Gado</h3>
            <p class="text-primary-600 font-bold">Rp22.000</p>
            <div class="flex items-center mt-1">
              <span class="rating-star text-sm"><i class="fas fa-star"></i></span>
              <span class="text-xs text-gray-500 ml-1">4.6 (42)</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="mt-16 bg-primary-900 text-white">
    <div class="max-w-6xl mx-auto p-8 grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <div class="flex items-center mb-4">
          <span class="text-white font-bold text-xl">Jog</span>
          <span class="text-orange-300 font-bold text-xl">Food</span>
        </div>
        <p class="text-primary-200">Temukan kuliner terbaik Yogyakarta dalam genggaman Anda.</p>
        <div class="flex gap-4 mt-4">
          <a href="#" class="text-primary-200 hover:text-white"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-primary-200 hover:text-white"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-primary-200 hover:text-white"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-4">Tautan Cepat</h3>
        <ul class="space-y-2">
          <li><a href="#" class="text-primary-200 hover:text-white">Beranda</a></li>
          <li><a href="#" class="text-primary-200 hover:text-white">Produk</a></li>
          <li><a href="#" class="text-primary-200 hover:text-white">Promo</a></li>
          <li><a href="#" class="text-primary-200 hover:text-white">Tentang Kami</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-4">Bantuan</h3>
        <ul class="space-y-2">
          <li><a href="#" class="text-primary-200 hover:text-white">Pusat Bantuan</a></li>
          <li><a href="#" class="text-primary-200 hover:text-white">Kontak Kami</a></li>
          <li><a href="#" class="text-primary-200 hover:text-white">Kebijakan Privasi</a></li>
          <li><a href="#" class="text-primary-200 hover:text-white">Syarat & Ketentuan</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-4">Kontak</h3>
        <ul class="space-y-2">
          <li class="flex items-center gap-2">
            <i class="fas fa-map-marker-alt text-primary-300"></i>
            <span class="text-primary-200">Jl. Malioboro No.1, Yogyakarta</span>
          </li>
          <li class="flex items-center gap-2">
            <i class="fas fa-phone-alt text-primary-300"></i>
            <span class="text-primary-200">(0274) 123456</span>
          </li>
          <li class="flex items-center gap-2">
            <i class="fas fa-envelope text-primary-300"></i>
            <span class="text-primary-200">hello@jogfood.com</span>
          </li>
        </ul>
      </div>
    </div>
    <div class="border-t border-primary-700 py-4 text-center text-primary-300 text-sm">
      <p>© 2023 JogFood. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Simple quantity control
    document.addEventListener('DOMContentLoaded', function() {
      const minusBtn = document.querySelector('.quantity-btn:first-child');
      const plusBtn = document.querySelector('.quantity-btn:last-child');
      const quantityDisplay = document.querySelector('.quantity-btn + span');
      
      let quantity = 1;
      
      minusBtn.addEventListener('click', function() {
        if (quantity > 1) {
          quantity--;
          quantityDisplay.textContent = quantity;
        }
      });
      
      plusBtn.addEventListener('click', function() {
        quantity++;
        quantityDisplay.textContent = quantity;
      });
    });
  </script>
</body>
</html>