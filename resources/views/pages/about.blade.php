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
@extends(session()->has('user_id') ? 'layouts.user' : 'layouts.guest')
@section('title', 'Tentang Kita')

@section('content')
<div class="text-gray-800 font-sans antialiased">
  
  <section class="relative bg-gradient-to-b from-orange-500 to-orange-600 py-24 overflow-hidden">
    <div class="absolute inset-0">
      <img src="{{ asset('assets/img/jogja.webp') }}"
           alt="Tugu Jogja"
           class="w-full h-full object-cover opacity-30">
      <div class="absolute inset-0 bg-black opacity-30"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6 flex flex-col items-center justify-center text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-white drop-shadow-lg animate-fade-in-down">
        Tentang <span class="text-orange-200">JogFood</span>
      </h1>
      <div class="w-24 h-1.5 bg-white rounded-full mx-auto mb-8"></div>
      <p class="text-xl md:text-2xl max-w-2xl mx-auto leading-relaxed text-white/90 mb-8">
        Panduan kuliner Jogja yang siap menemani petualangan rasa kamu.  
        Temukan hidden gem, rekomendasi lokal, dan pengalaman kuliner terbaik di Yogyakarta bersama JogFood!
      </p>
      <div class="flex justify-center mt-6">

      </div>
      <a href="#profile" class="inline-block mt-12 px-8 py-3 bg-white text-orange-600 rounded-full font-semibold shadow hover:bg-orange-50 transition duration-300">
        <i class="fas fa-chevron-down mr-2"></i> Jelajahi
      </a>
    </div>
  </section>

  <!-- Profil Section -->
  <section id="profile" class="py-20 px-6 max-w-6xl mx-auto">
    <div class="flex flex-col md:flex-row items-center gap-12">
      <div class="md:w-1/2">
        <img src="{{ asset('assets/img/jogja2.jpeg') }}" 
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



  <!-- Developer Section -->
  <section class="py-20 bg-orange-50">
    <div class="max-w-6xl mx-auto px-6">
      <div class="text-center mb-16">
        <span class="text-orange-500 font-semibold mb-2 inline-block">Tim Developer</span>
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Developer JogFood</h2>
        <div class="w-24 h-1.5 bg-orange-500 rounded-full mx-auto"></div>
        <p class="mt-4 text-lg text-gray-600">JogFood dikembangkan oleh tim fullstack developer yang berdedikasi.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-md flex flex-col items-center">
          <div class="w-20 h-20 rounded-full bg-orange-100 flex items-center justify-center mb-4 overflow-hidden">
            <img src="{{ asset('assets/img/ridho.jpeg') }}" alt="Ridho Putrawan" class="w-full h-full object-cover">
          </div>
          <h4 class="font-semibold text-orange-500 text-xl mb-1 text-center">Ridho Putrawan</h4>
          <p class="text-gray-600 mb-1 text-center">Fullstack Developer</p>
          <span class="text-sm text-gray-400 text-center">Lead Developer</span>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-md flex flex-col items-center">
          <div class="w-20 h-20 rounded-full bg-orange-100 flex items-center justify-center mb-4 overflow-hidden">
            <img src="{{ asset('assets/img/ruth.jpeg') }}" alt="Ruth Yohana Manurung" class="w-full h-full object-cover">
          </div>
          <h4 class="font-semibold text-orange-500 text-xl mb-1 text-center">Ruth Yohana Manurung</h4>
          <p class="text-gray-600 mb-1 text-center">Fullstack Developer</p>
          <span class="text-sm text-gray-400 text-center"></span>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-md flex flex-col items-center">
          <div class="w-20 h-20 rounded-full bg-orange-100 flex items-center justify-center mb-4 overflow-hidden">
            <img src="{{ asset('assets/img/josepine.jpeg') }}" alt="Josepine Stevie Hia" class="w-full h-full object-cover">
          </div>
          <h4 class="font-semibold text-orange-500 text-xl mb-1 text-center">Josepine Stevie Hia</h4>
          <p class="text-gray-600 mb-1 text-center">Fullstack Developer</p>
          <span class="text-sm text-gray-400 text-center"></span>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-md flex flex-col items-center">
          <div class="w-20 h-20 rounded-full bg-orange-100 flex items-center justify-center mb-4 overflow-hidden">
            <img src="{{ asset('assets/img/muhammad.jpeg') }}" alt="Muhammad Rizky Raapi Ramadhan" class="w-full h-full object-cover">
          </div>
          <h4 class="font-semibold text-orange-500 text-xl mb-1 text-center">Muhammad Rizky Raapi Ramadhan</h4>
          <p class="text-gray-600 mb-1 text-center">Fullstack Developer</p>
          <span class="text-sm text-gray-400 text-center"></span>
        </div>
      </div>
    </div>
  </section>
  </div>

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

</div>

@endsection