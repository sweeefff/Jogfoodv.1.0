<div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4">
    <!-- Product Details -->
    <div class="p-4 flex">
        <div class="w-16 h-16 border rounded overflow-hidden flex-shrink-0">
            <img src="{{ asset('assets/img/menu/' . $gambar_menu) }}" alt="{{ $nama }}"
                class="w-full h-full object-cover">
        </div>
        <div class="flex-1 ml-4">
            <div class="font-medium">{{ $nama }}</div>
            <div class="text-gray-500 mt-1">{{ $variasi }}</div>
            <div class="text-gray-500">{{ $jumlah }}</div>
        </div>
        <div class="text-right flex-shrink-0">

            <div class="text-orange-500 font-semibold">{{ $total }}</div>
        </div>
    </div>

    <!-- Order Summary -->
    <div class="p-3 border-t">
        <div class="flex flex-wrap justify-between items-center mb-4">
            <div class="text-gray-500 text-sm">
                Nilai produk sebelum {{ \Carbon\Carbon::parse($transaksi->updated_at)->addMonths(1)->format('d-m-Y') }}
            </div>
            <div class="flex flex-wrap gap-2">
                @if ($transaksi->status_pengiriman && $transaksi->status_pengiriman->status_pengiriman == 'selesai')
                    <a href="{{ route('rating.form', [$detail->menu->id_menu, $detail->id_detail]) }}"
                        class="inline-flex items-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold rounded-lg shadow transition duration-200 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z" />
                        </svg>
                        Nilai
                    </a>
                @endif
                <a href="{{ route('detail', $id_menu) }}">
                    <button class="bg-orange-500 text-white px-6 py-2 rounded">Lihat Detail Menu</button>
                </a>
                <form action="{{ route('keranjang.store', $id_menu) }}" method="POST" style="display:inline;"
                    class="form-beli-lagi">
                    @csrf
                    <button type="submit" class="border border-gray-300 text-gray-600 px-6 py-2 rounded">
                        Beli Lagi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Pastikan hanya satu event listener dan satu submit per form
    document.querySelectorAll('.form-beli-lagi').forEach(function (form) {
        // Hapus event listener sebelumnya jika ada
        form.replaceWith(form.cloneNode(true));
    });

    document.querySelectorAll('.form-beli-lagi').forEach(function (form) {
        let isSubmitting = false;
        form.addEventListener('submit', function (e) {
            if (isSubmitting) return;
            e.preventDefault();
            isSubmitting = true;
            const btn = form.querySelector('button[type="submit"]');
            if (btn) btn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': form.querySelector('[name=_token]').value
                }
            })
                .then(response => {
                    if (btn) btn.disabled = false;
                    if (response.ok) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Menu berhasil dimasukkan ke Order List!',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        });
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Gagal menambah ke Order List!',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        });
                    }
                    isSubmitting = false;
                })
                .catch(() => {
                    if (btn) btn.disabled = false;
                    isSubmitting = false;
                });
        }, { once: true }); // hanya satu kali submit per render
    });
</script>