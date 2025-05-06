@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Rekap Pesanan JogFood</h2>

    <!-- Statistik Ringkas -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <p class="card-text">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pesanan</h5>
                    <p class="card-text">{{ $jumlahPesanan }} pesanan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Tanggal -->
    <form method="GET" action="{{ route('rekap.index') }}" class="form-inline mb-3">
        <label for="tanggal" class="mr-2">Filter Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal') }}" class="form-control mr-2">
        <button type="submit" class="btn btn-primary">Tampilkan</button>
        <a href="{{ route('rekap.index') }}" class="btn btn-secondary ml-2">Reset</a>
    </form>

    <!-- Tombol Ekspor -->
    <div class="mb-3">
        <a href="{{ route('rekap.export', ['tanggal' => request('tanggal')]) }}" class="btn btn-danger">
            Export ke PDF
        </a>
    </div>

    <!-- Tabel Rekap -->
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nama Pelanggan</th>
                <th>Makanan</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pesanan as $index => $p)
                <tr>
                    <td>{{ $index + $pesanan->firstItem() }}</td>
                    <td>{{ $p->pelanggan->nama }}</td>
                    <td>{{ $p->makanan->nama }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                    <td>{{ $p->created_at->format('d M Y, H:i') }}</td>
                    <td>
                        <span class="badge badge-{{ $p->status == 'Selesai' ? 'success' : ($p->status == 'Dibatalkan' ? 'danger' : 'warning') }}">
                            {{ $p->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $pesanan->links() }}
    </div>
</div>
@endsection
