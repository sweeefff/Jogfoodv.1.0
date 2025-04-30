<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - JogFood</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'orange': {
              '50': '#fff7ed',
              '100': '#ffedd5',
              '200': '#fed7aa',
              '300': '#fdba74',
              '400': '#fb923c',
              '500': '#f97316',
              '600': '#ea580c',
              '700': '#c2410c',
              '800': '#9a3412',
              '900': '#7c2d12',
            }
          }
        }
      }
    }
  </script>
  <style>
    .hero-pattern {
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23fb923c' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    .mission-icon {
      width: 60px;
      height: 60px;
      background-color: rgba(249, 115, 22, 0.1);
    }
  </style>
</head>
<body class="bg-orange-50 text-gray-800 font-sans antialiased">

@extends('layouts.app')

@section('content')

  <!-- Hero Section -->
  <section class="hero-pattern bg-gradient-to-b from-orange-500 to-orange-600 text-white py-24 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="container mx-auto px-6 relative z-10">
      <h1 class="text-5xl font-bold mb-6 animate-fade-in-down">Tentang JogFood</h1>
      <div class="w-24 h-1.5 bg-white rounded-full mx-auto mb-8"></div>
      <p class="text-xl max-w-2xl mx-auto leading-relaxed">Panduan kuliner Jogja yang siap menemani petualangan rasa kamu.</p>
      <div class="mt-12">
        <a href="#profile" class="inline-block px-6 py-3 bg-white text-orange-600 rounded-full font-medium hover:bg-orange-50 transition duration-300">
          <i class="fas fa-chevron-down mr-2"></i> Jelajahi
        </a>
      </div>
    </div>
  </section>

  <!-- Profil Section -->
  <section id="profile" class="py-20 px-6 max-w-6xl mx-auto">
    <div class="flex flex-col md:flex-row items-center gap-12">
      <div class="md:w-1/2">
        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" 
             alt="Jogja Culinary" 
             class="rounded-2xl shadow-xl w-full h-auto object-cover">
      </div>
      <div class="md:w-1/2">
        <span class="text-orange-500 font-semibold mb-2 inline-block">Tentang Kami</span>
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Profil JogFood</h2>
        <p class="text-lg leading-relaxed text-gray-600 mb-6">
          JogFood adalah platform kuliner yang membantu wisatawan dan warga lokal menemukan hidden gem kuliner terbaik di Yogyakarta. Kami hadir untuk mempermudah kamu menjelajahi cita rasa khas Jogja.
        </p>
        <p class="text-lg leading-relaxed text-gray-600">
          Dari angkringan legendaris hingga resto modern dengan nuansa khas, kami menyajikan rekomendasi terbaik berdasarkan pengalaman nyata para food hunter.
        </p>
      </div>
    </div>
  </section>

  <!-- Misi Tim -->
  <section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
      <div class="text-center mb-16">
        <span class="text-orange-500 font-semibold mb-2 inline-block">Visi & Misi</span>
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Misi Kami</h2>
        <div class="w-24 h-1.5 bg-orange-500 rounded-full mx-auto"></div>
      </div>
      
      <div class="grid md:grid-cols-2 gap-12">
        <div class="flex gap-6">
          <div class="mission-icon rounded-full flex items-center justify-center text-orange-500">
            <i class="fas fa-utensils text-2xl"></i>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-3 text-gray-800">Menghubungkan Penikmat Kuliner</h3>
            <p class="text-gray-600">Menjembatani antara pecinta kuliner dengan tempat makan autentik di Jogja yang mungkin belum banyak diketahui.</p>
          </div>
        </div>
        
        <div class="flex gap-6">
          <div class="mission-icon rounded-full flex items-center justify-center text-orange-500">
            <i class="fas fa-store text-2xl"></i>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-3 text-gray-800">Mendukung UMKM Lokal</h3>
            <p class="text-gray-600">Membantu usaha kecil dan menengah di bidang kuliner untuk dikenal lebih luas oleh masyarakat.</p>
          </div>
        </div>
        
        <div class="flex gap-6">
          <div class="mission-icon rounded-full flex items-center justify-center text-orange-500">
            <i class="fas fa-star text-2xl"></i>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-3 text-gray-800">Rekomendasi Berkualitas</h3>
            <p class="text-gray-600">Menyajikan ulasan jujur dan rekomendasi terbaik berdasarkan pengalaman nyata para reviewer.</p>
          </div>
        </div>
        
        <div class="flex gap-6">
          <div class="mission-icon rounded-full flex items-center justify-center text-orange-500">
            <i class="fas fa-compass text-2xl"></i>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-3 text-gray-800">Teman Petualangan Kuliner</h3>
            <p class="text-gray-600">Menjadi panduan setia dalam setiap eksplorasi kuliner kamu di Yogyakarta.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimoni -->
  <section class="py-20 bg-orange-50">
    <div class="max-w-6xl mx-auto px-6">
      <div class="text-center mb-16">
        <span class="text-orange-500 font-semibold mb-2 inline-block">Testimonial</span>
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Apa Kata Mereka?</h2>
        <div class="w-24 h-1.5 bg-orange-500 rounded-full mx-auto"></div>
      </div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-md testimonial-card transition duration-300">
          <div class="text-orange-400 mb-4">
            <i class="fas fa-quote-left text-3xl opacity-20"></i>
          </div>
          <p class="italic mb-6 text-gray-600">"JogFood bantu banget waktu pertama kali ke Jogja. Nemu makanan enak dan murah yang gak ada di Google Maps!"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 mr-4">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <h4 class="font-semibold text-orange-500">Rina</h4>
              <p class="text-sm text-gray-500">Jakarta</p>
            </div>
          </div>
        </div>
        
        <div class="bg-white p-8 rounded-2xl shadow-md testimonial-card transition duration-300">
          <div class="text-orange-400 mb-4">
            <i class="fas fa-quote-left text-3xl opacity-20"></i>
          </div>
          <p class="italic mb-6 text-gray-600">"Fitur pencariannya keren. Aku bisa filter makanan tradisional & tempat yang estetik buat foto-foto!"</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 mr-4">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <h4 class="font-semibold text-orange-500">Yoga</h4>
              <p class="text-sm text-gray-500">Surabaya</p>
            </div>
          </div>
        </div>
        
        <div class="bg-white p-8 rounded-2xl shadow-md testimonial-card transition duration-300">
          <div class="text-orange-400 mb-4">
            <i class="fas fa-quote-left text-3xl opacity-20"></i>
          </div>
          <p class="italic mb-6 text-gray-600">"JogFood itu hidden gem buat nemuin... hidden gem. Suka banget sama rekomendasi kopinya."</p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 mr-4">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <h4 class="font-semibold text-orange-500">Dwi</h4>
              <p class="text-sm text-gray-500">Bandung</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection

<script>
  // Simple animation for elements
  document.addEventListener('DOMContentLoaded', function() {
    const animateElements = document.querySelectorAll('.animate-fade-in-down');
    
    animateElements.forEach((el, index) => {
      setTimeout(() => {
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
      }, index * 200);
    });
  });
</script>

</body>
</html>