@extends('layouts.app')

@section('title', 'Jogfood')

@section('content')
    <div class="category-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 mt-5">
                    <h2 class="section-title text-center" style="margin-top: 80px; font-size: 30px;">MENU</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $item->gambar ? asset('pbl/dashboard/gambar/' . $item->gambar) : asset('assets/default.jpg') }}" class="card-img-top" alt="{{ $item->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p>⭐ Rata-rata Rating: {{ number_format($item->avg_rating ?? 0, 1) }}/5</p>
                                <a href="{{ route('detail', ['id' => $item->id]) }}" class="btn btn-success btn-sm">Tampilkan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $data->links() }}
            </ul>
        </nav>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('liveSearchInput').addEventListener('keyup', function () {
            const query = this.value.trim();
            const resultsContainer = document.getElementById('liveSearchResults');

            if (query.length > 0) {
                fetch("{{ route('search') }}?query=" + encodeURIComponent(query))
                .then(response => response.text())
                .then(data => {
                    resultsContainer.innerHTML = data;
                });
            } else {
                resultsContainer.innerHTML = '';
            }
        });
    </script>
@endsection
