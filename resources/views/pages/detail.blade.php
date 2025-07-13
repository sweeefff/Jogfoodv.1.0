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
      <div
        class="product-image border-2 border-amber-100 rounded-xl w-full max-w-md h-96 flex items-center justify-center bg-white overflow-hidden">
        <img src="{{ asset('assets/img/menu/' . $menu->gambar_menu) }}" alt="{{ $menu->nama }}"
        class="w-full h-full object-cover">
      </div>
      </div>

      <!-- Product Info -->
      <div class="flex flex-col">
      <div class="flex justify-between items-start mb-2">
        {{-- ... Bagian Nama Produk dan Bintang ... --}}
        <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $menu->nama }}</h1>
        <div class="flex items-center mb-1">
          @for ($i = 1; $i <= 5; $i++)
        <svg class="w-6 h-6 {{ $i <= round($avgRating) ? 'text-amber-400' : 'text-gray-300' }}"
        fill="currentColor" viewBox="0 0 20 20">
        <path
        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.176 0l-3.385 2.46c-.784.57-1.838-.197-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.967z" />
        </svg>
      @endfor
          <span class="ml-2 text-sm text-gray-600">({{ $ratings->count() }} ulasan)</span>
        </div>
        </div>

      </div>



      <p class="text-2xl font-semibold text-amber-600 mb-4">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>

      <div class="mb-6">
        <p class="text-gray-700 leading-relaxed">{{ $menu->deskripsi_menu }}</p>
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
      <form id="cart-form" action="{{ route('keranjang.store', $menu->id_menu) }}" method="POST"
        class="flex gap-4 mt-auto w-full">
        @csrf
        <input type="hidden" name="jumlah" id="input-jumlah" value="1">
        <button type="submit"
        class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-300 flex items-center justify-center gap-2">
        <i class="fas fa-shopping-cart"></i>
        <span>Tambah ke Keranjang</span>
        </button>
      </form>

      <form id="beli-sekarang-form" action="{{ route('menu.beli_sekarang', $menu->id_menu) }}" method="POST"
        style="display: none;">
        @csrf
        <input type="hidden" name="jumlah" id="beli-sekarang-jumlah" value="1">
      </form>
      <button type="button" id="beli-sekarang"
        class="flex-1 bg-white border-2 border-amber-500 text-amber-600 hover:bg-amber-50 font-medium py-3 px-6 rounded-lg shadow-sm transition duration-300 flex items-center justify-center gap-2">
        <i class="fas fa-shopping-bag"></i>
        <span>Beli Sekarang</span>
      </button>
      </div>
    </div>

    <!-- Tabs (Deskripsi, Komposisi, Ulasan) -->
    <div class="border-t border-gray-200">


      <div class="p-6">
      <div class="prose max-w-none text-gray-700">
        {{-- ... Bagian Ulasan ... --}}
        <div class="mt-8">
        <h2 class="text-xl font-semibold text-amber-600 mb-4">Ulasan Pengguna</h2>
        @forelse($ratings as $rating)
        <div class="flex items-start mb-6 bg-amber-50 rounded-lg p-4 shadow-sm">
        <img
        src="{{ $rating->user->foto ? Storage::url('user/' . $rating->user->foto) : asset('assets/img/profile/default.avif') }}"
        class="w-12 h-12 rounded-full object-cover border-2 border-amber-300 mr-4" alt="profile">
        <div>
        <div class="flex items-center mb-1">
          <span class="font-semibold text-gray-800 mr-2">{{ $rating->user->username }}</span>
          @for ($i = 1; $i <= 5; $i++)
        <svg class="w-5 h-5 {{ $i <= $rating->rating ? 'text-amber-400' : 'text-gray-300' }}"
        fill="currentColor" viewBox="0 0 20 20">
        <path
        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.176 0l-3.385 2.46c-.784.57-1.838-.197-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.967z" />
        </svg>
        @endfor
        </div>
        <div class="text-gray-700">{{ $rating->komentar }}</div>
        <div class="text-xs text-gray-400 mt-1">{{ $rating->created_at->format('d M Y H:i') }}</div>
        </div>
        </div>
      @empty
      <div class="text-gray-500 italic">Belum ada ulasan untuk produk ini.</div>
      @endforelse
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    let jumlah = 1;
    const jumlahSpan = document.querySelector('.w-16 span');
    const inputJumlah = document.getElementById('input-jumlah');
    const btnMinus = document.querySelectorAll('.quantity-btn')[0];
    const btnPlus = document.querySelectorAll('.quantity-btn')[1];

    btnMinus.addEventListener('click', function (e) {
      e.preventDefault();
      if (jumlah > 1) jumlah--;
      jumlahSpan.textContent = jumlah;
      inputJumlah.value = jumlah;
    });

    btnPlus.addEventListener('click', function (e) {
      e.preventDefault();
      jumlah++;
      jumlahSpan.textContent = jumlah;
      inputJumlah.value = jumlah;
    });

    // Beli Sekarang
    document.getElementById('beli-sekarang').addEventListener('click', function () {
      document.getElementById('beli-sekarang-jumlah').value = document.getElementById('input-jumlah').value;
      document.getElementById('beli-sekarang-form').submit();
    });
    });
  </script>
  @if (session('success'))
    <script>
    Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: '{{ session('success') }}',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
    });
    </script>
    @endif
    @if (session('error'))
    <script>
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'error',
      title: '{{ session('error') }}',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true
    });
    </script>
    @endif
  @endsection