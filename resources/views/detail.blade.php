@extends('layouts.app')

@section('title', 'Detail Kuliner')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-lg-6">
                <div id="carouselExampleControls" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/gambar/' . $kuliner->gambar) }}" class="d-block w-100" alt="Gambar Kuliner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>{{ $kuliner->nama }}</h2>
                <p>{{ $kuliner->deskripsi }}</p>
                <h4>Bahan Masakan</h4>
                <ul>
                    @foreach(explode(',', $kuliner->bahan) as $bahan)
                        <li>{{ trim($bahan) }}</li>
                    @endforeach
                </ul>
                <p><strong>Rata-rata Rating: {{ $avgRating }}/5</strong></p>
            </div>
            <h4>Cara Membuat</h4>
            <ul>
                @foreach(explode(',', $kuliner->cara_membuat) as $cara)
                    <li>{{ trim($cara) }}</li>
                @endforeach
            </ul>
        </div>

        <hr>
        <div class="row mt-4">
            <div class="col-12">
                @auth
                    <button class="btn btn-primary" onclick="toggleReviewForm()">Berikan Review</button>
                    <div id="reviewForm" style="display:none;" class="mt-4">
                        <form action="{{ route('kuliner.addReview', $kuliner->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Rating:</label>
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating" value="{{ $i }}"> {{ $i }}
                                @endfor
                            </div>
                            <div class="mb-3">
                                <label>Review:</label>
                                <textarea name="review" rows="4" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Review</button>
                        </form>
                    </div>
                @else
                    <p>Silakan <a href="{{ route('login') }}">login</a> untuk memberikan review.</p>
                @endauth
            </div>
        </div>

        <div class="review-list mt-4">
            <h3>Review Pengguna</h3>
            @forelse($reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $review->user->username }}</h5>
                        <p>{{ $review->review }}</p>
                        <small class="text-muted">{{ $review->created_at }}</small>
                    </div>
                </div>
            @empty
                <p>Belum ada review.</p>
            @endforelse
        </div>
    </div>

    <script>
        function toggleReviewForm() {
            const form = document.getElementById('reviewForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
</div>
