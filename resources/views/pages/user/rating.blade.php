@extends('layouts.user')

@section('title', 'Beri Rating')

@section('content')
<div class="min-h-screen bg-amber-100 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
        <div class="p-6">
            <div class="text-center mb-6">
                <i class="fas fa-heart text-orange-500 text-4xl mb-3 animate-pulse"></i>
                <h2 class="text-2xl font-bold text-gray-800">Terima Kasih!</h2>
                <p class="text-gray-600 mt-1">Silakan berikan penilaian untuk produk ini</p>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-orange-50 rounded-xl mb-6">
                <img src="{{ asset('assets/img/menu/' . $menu->gambar_menu) }}" class="w-16 h-16 object-cover rounded-lg border-2 border-orange-200" alt="{{ $menu->nama }}">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $menu->nama }}</h3>
                    <p class="text-sm text-gray-500">{{ $menu->kategori }}</p>
                </div>
            </div>
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if($sudahReview)
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-3 rounded mb-4">
                    Anda sudah memberi rating untuk produk ini pada pesanan ini.
                </div>
            @else
                <form action="{{ route('rating.store', [$menu->id_menu, $id_detail]) }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                        <div class="star-rating flex flex-row-reverse justify-center text-3xl">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden" required />
                                <label for="star{{ $i }}" class="cursor-pointer text-gray-300 hover:text-amber-400">&#9733;</label>
                            @endfor
                        </div>
                        @error('rating')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Komentar</label>
                        <textarea name="review" rows="3" class="w-full border border-amber-300 rounded-lg p-2 focus:ring-amber-400 focus:border-amber-400" placeholder="Tulis komentar..."></textarea>
                        @error('review')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-3 rounded-lg shadow transition duration-200">
                        Kirim Rating
                    </button>
                </form>
            @endif
            <div class="mt-6 text-center">
                <a href="{{ route('detail', $menu->id_menu) }}" class="text-amber-600 hover:underline text-sm">Kembali ke Detail Produk</a>
            </div>
        </div>
    </div>
</div>

{{-- Star rating interaction --}}
<script>
    document.querySelectorAll('.star-rating label').forEach(label => {
        label.addEventListener('mouseenter', function() {
            let val = this.htmlFor.replace('star', '');
            highlightStars(val);
        });
        label.addEventListener('mouseleave', function() {
            let checked = document.querySelector('.star-rating input:checked');
            highlightStars(checked ? checked.value : 0);
        });
        label.addEventListener('click', function() {
            let val = this.htmlFor.replace('star', '');
            highlightStars(val);
        });
    });

    function highlightStars(count) {
        document.querySelectorAll('.star-rating label').forEach(label => {
            let val = label.htmlFor.replace('star', '');
            if(val <= count) {
                label.classList.add('text-amber-400');
                label.classList.remove('text-gray-300');
            } else {
                label.classList.remove('text-amber-400');
                label.classList.add('text-gray-300');
            }
        });
    }
    // Initial highlight
    highlightStars(document.querySelector('.star-rating input:checked') ? document.querySelector('.star-rating input:checked').value : 0);
</script>
@endsection