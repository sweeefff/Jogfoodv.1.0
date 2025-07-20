@extends('layouts.user')

@section('title', 'Konfirmasi Pesanan')

@section('content')
    <main class="flex-1 md:flex md:flex-row md:justify-center md:mx-4 md:my-8">
        <div class="container mx-auto border p-4 rounded-lg shadow md:w-1/2 lg:w-1/3 bg-white">
            <h1 class="text-2xl font-semibold text-center">Pemesanan</h1>

            <div class="mt-4 p-4">
                <h2 class="text-lg font-medium">Alamat</h2>
                <p class="text-gray-700 mt-2">
                    {{ $items->first()->user->alamat ?? 'Alamat tidak tersedia' }}
                </p>
                <a href="{{ route('profile.edit') }}" class="text-amber-600 hover:text-amber-800 mt-2">
                    Ubah Alamat
                </a>
            </div>

            <!-- Tampilkan item yang dipilih -->
            @if(isset($items) && $items->count() > 0)
                @foreach ($items as $item)
                    @include('components.card.item', [
                        'nama' => $item->menu->nama,
                        'gambar_menu' => $item->menu->gambar_menu,
                        'harga' => $item->menu->harga,
                        'jumlah' => $item->jumlah,
                        'opsi' => $item->opsi ?? null
                    ])
                @endforeach
            @endif

            <div class="mt-4">
                <h2 class="text-lg font-medium">Ringkasan Pesanan</h2>
                <div class="space-y-2 mt-2">
                    @if(isset($items))
                        @foreach($items as $item)
                            <input type="hidden" name="selected_items[]" value="{{ $item->id }}">
                            <div class="flex justify-between">
                                <span>{{ $item->menu->nama }} ({{ $item->jumlah }}x)</span>
                                <span>Rp.{{ number_format($item->menu->harga * $item->jumlah, 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                        <input type="hidden" name="total_harga" value="{{ $total }}">
                    @endif

                    <div class="flex justify-between">
                        <span>Biaya Pengiriman</span>
                        <span>Rp.{{ number_format($deliveryFee ?? 0, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Pajak ({{ isset($tax) ? ($tax * 100) : 0 }}%)</span>
                        <span>Rp.{{ number_format(($total ?? 0) * ($tax ?? 0), 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between font-bold pt-2 border-t border-gray-200">
                        <span>Total</span>
                        <span>
                            Rp.{{ number_format(($total ?? 0) * (1 + ($tax ?? 0)) + ($deliveryFee ?? 0), 0, ',', '.') }}
                        </span>
                    </div>
                    <input type="hidden" id="subtotal" value="{{ $total }}">
                    <input type="hidden" id="tax" value="{{ $tax }}">
                    <input type="hidden" id="deliveryFee" value="{{ $deliveryFee }}">
                </div>
            </div>

            <div class="mt-4">
                <h2 class="text-lg font-medium">Metode Pembayaran</h2>

                <form id="payment-form" action="{{ route('metode.process') }}" method="POST">
                    @csrf
                    <input type="hidden" id="subtotal" value="{{ $total }}">

                    <div class="space-y-4 mt-2">
                        <div class="flex items-start">
                            <input id="bank-transfer" type="radio" name="payment-method" value="bank-transfer"
                                class="w-4 h-4 mt-1 text-amber-600 border-amber-300 bg-amber-100 focus:ring-amber-500">
                            <label for="bank-transfer" class="ml-2 w-full">
                                <span class="font-medium">Bank Transfer</span>
                                <div class="flex items-center mt-2 space-x-4">
                                    <div class="bg-white p-1 border border-gray-200 rounded-lg">
                                        <div class="h-6 w-16 bg-yellow-400 rounded-lg flex items-center justify-center text-xs font-bold">
                                            mandiri</div>
                                    </div>
                                    <div class="bg-white p-1 border border-gray-200 rounded-lg">
                                        <div class="h-6 w-12 bg-blue-600 rounded-lg flex items-center justify-center text-xs font-bold text-white">
                                            BCA</div>
                                    </div>
                                    <div class="bg-white p-1 border border-gray-200 rounded-lg">
                                        <div class="h-6 w-12 bg-green-600 rounded-lg flex items-center justify-center text-xs font-bold text-white">
                                            BNI</div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="e-wallet" type="radio" name="payment-method" value="e-wallet"
                                class="w-4 h-4 text-amber-600 border-amber-400 bg-amber-100 focus:ring-amber-500">
                            <label for="e-wallet" class="ml-2 font-medium">
                                E-Wallet
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="cod" type="radio" name="payment-method" value="cod"
                                class="w-4 h-4 text-amber-600 border-amber-800 bg-amber-100 focus:ring-amber-500">
                            <label for="cod" class="ml-2 font-medium">
                                COD
                            </label>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-4">
                        <button type="button" onclick="history.back()"
                            class="flex-1 py-2 px-4 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition duration-150">
                            Kembali
                        </button>
                        <button id="btn-confirm" type="button" onclick="payNow()"
                            class="flex-1 py-2 px-4 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition duration-150">
                            Bayar Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    <script>
    function payNow() {
        // Ambil nilai dari input hidden
        const subtotal = parseInt(document.getElementById("subtotal").value) || 0;
        const tax = parseFloat(document.getElementById("tax").value) || 0;
        const deliveryFee = parseInt(document.getElementById("deliveryFee").value) || 0;
        const pajakNominal = Math.round(subtotal * tax);
        const totalHarga = subtotal + pajakNominal + deliveryFee;

        const paymentMethod = document.querySelector('input[name="payment-method"]:checked');
        if (!paymentMethod) {
            Swal.fire({
                icon: 'warning',
                title: 'Pilih Metode Pembayaran',
                text: 'Silakan pilih metode pembayaran terlebih dahulu.',
                confirmButtonColor: '#f59e0b'
            });
            return;
        }

        fetch("{{ route('metode.process') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            amount: totalHarga,
            payment_method: paymentMethod.value,
            pajak: pajakNominal,
            subtotal: subtotal,
            biaya_pengiriman: deliveryFee
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.redirect) {
    if (document.querySelector('input[name="payment-method"]:checked').value === 'cod') {
        Swal.fire({
            icon: 'success',
            title: 'Transaksi Berhasil',
            text: 'Pengiriman sedang diproses.',
            confirmButtonColor: '#f59e0b'
        }).then(() => {
            window.location.href = data.redirect;
        });
    } else {
        window.location.href = data.redirect;
    }
        return;
    }

            if (data.error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: "Gagal mendapatkan Snap Token: " + data.error,
                    confirmButtonColor: '#f59e0b'
                });
                return;
            }
            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pembayaran Berhasil',
                            text: 'Transaksi berhasil!',
                            confirmButtonColor: '#f59e0b'
                        }).then(() => {
                            window.location.href = "{{ route('metode.success') }}?order_id=" + result.order_id;});
                    },
                    onPending: function(result) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Menunggu Pembayaran',
                            text: 'Silakan selesaikan pembayaran Anda.',
                            confirmButtonColor: '#f59e0b'
                        });
                    },
                    onError: function(result) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Pembayaran Gagal',
                            text: 'Pembayaran gagal.',
                            confirmButtonColor: '#f59e0b'
                        });
                    },
                    onClose: function() {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Belum Dibayar',
                            text: 'Anda belum membayar pesanan ini',
                            confirmButtonColor: '#f59e0b'
                        });
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Snap token tidak ditemukan.',
                    confirmButtonColor: '#f59e0b'
                });
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Terjadi kesalahan saat memproses pembayaran.',
                confirmButtonColor: '#f59e0b'
            });
        });
    }
    </script>
@endsection


