@extends('layouts.appadm')

@section('title', 'Update Status - Jogfood')

@section('content')
        <div class="p-4 pt-20 bg-gradient-to-b from-amber-50 to-white min-h-screen mt-20">
            <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-6 mt-8 border border-amber-100">
                <h3 class="text-2xl font-bold mb-6 flex items-center text-amber-700">
                    <i class="fas fa-shipping-fast mr-3 text-amber-500"></i> Delivery Process
                </h3>

                <!-- Delivery Info -->
                <div class="mb-6 p-4 bg-amber-50 rounded-lg border border-amber-100">
                    <div class="flex flex-col sm:flex-row sm:justify-between mb-3">
                        <div class="mb-3 sm:mb-0">
                            <div class="flex items-center mb-1">
                                <span class="font-semibold text-amber-700 mr-2">Receiver Name:</span>
                                <span class="text-gray-800">{{ $status->user->name }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-semibold text-amber-700 mr-2">Address:</span>
                                <span class="text-gray-800">{{ $status->user->alamat }}</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <span class="font-semibold text-amber-700 mr-2">ID Transaksi:</span>
                                <span class="font-bold text-gray-800">{{ $status->id_transaksi }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 mt-3">
                        <a href="tel:{{ $status->user->no_telp }}"
                            class="text-white bg-amber-500 hover:bg-amber-600 p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-phone"></i>
                        </a>
                        <a href="https://wa.me/{{ $status->user->no_telp }}"
                            class="text-white bg-green-500 hover:bg-green-600 p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://maps.google.com/?q={{ urlencode($status->user->latitude . ',' . $status->user->longitude) }}"
                            class="text-white bg-blue-500 hover:bg-blue-600 p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-map-marker-alt"></i>
                        </a>
                    </div>
                </div>
                <hr class="my-4">

                <!-- Status Badge -->
                <div class="mb-4">
                    @if($status->status_pengiriman === 'selesai')
                        <span id="statusBadge"
                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800 shadow-sm">
                            <i class="fas fa-check-circle mr-2"></i> Sudah Diupdate
                        </span>
                    @elseif($status->status_pengiriman === 'gagal')
                        <span id="statusBadge"
                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-800 shadow-sm">
                            <i class="fas fa-times-circle mr-2"></i> Gagal Update
                        </span>
                    @else
                        <span id="statusBadge"
                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-amber-100 text-amber-800 shadow-sm">
                            <i class="fas fa-clock mr-2"></i> Belum Diupdate
                        </span>
                    @endif
                </div>

                <!-- COD Payment Status Alert (if applicable) -->
                @php
                    $isCOD = $status->transaksi && $status->transaksi->pembayaran && $status->transaksi->pembayaran->metode_pembayaran === 'cod';
                    $isLunas = $status->transaksi && $status->transaksi->pembayaran && $status->transaksi->pembayaran->status_pembayaran === 'lunas';
                @endphp

                @if($isCOD && !$isLunas && !in_array($status->status_pengiriman, ['selesai', 'gagal']))
                    <div class="mb-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-yellow-500 mr-2"></i>
                            <span class="text-yellow-800 font-medium">Perhatian: Pembayaran COD belum lunas. Harap konfirmasi pembayaran sebelum menyelesaikan pengiriman.</span>
                        </div>
                    </div>
                @endif

                <!-- Delivery Information Form -->
                <h4 class="font-semibold text-gray-700 mb-2">Detail Pengiriman</h4>
                <h4 class="font-semibold text-gray-700 mb-2">Detail Pesanan</h4>
                <ul class="list-disc pl-6 mb-4">
                    @if($status->transaksi && $status->transaksi->detail_transaksi)
                        @foreach ($status->transaksi->detail_transaksi as $detail)
                            <li>{{ $detail->menu->nama }} ({{ $detail->jumlah }} x
                                Rp{{ number_format($detail->menu->harga, 0, ',', '.') }})</li>
                        @endforeach
                    @else
                        <li>Tidak ada detail pesanan.</li>
                    @endif
                </ul>
                <form id="deliveryForm" method="POST" action="{{ route('kurir.updateStatus', $status->id_transaksi) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <div class="text-gray-600">Status Pengiriman</div>
                            <select name="status_pengiriman" id="statusPengiriman" class="w-full border rounded px-2 py-1"
                                onchange="handleStatusChange()" required
                                {{ in_array($status->status_pengiriman, ['selesai', 'gagal']) ? 'disabled' : '' }}>
                                <option value="">Pilih Status</option>
                                <option value="selesai" {{ $status->status_pengiriman === 'selesai' ? 'selected' : '' }}>Selesai
                                </option>
                                <option value="gagal" {{ $status->status_pengiriman === 'gagal' ? 'selected' : '' }}>Gagal
                                </option>
                            </select>
                        </div>
                        <div id="reasonSection" class="{{ $status->status_pengiriman === 'gagal' ? '' : 'hidden' }}">
                            <div class="text-gray-600">Alasan (jika gagal)</div>
                            <input type="text" name="alasan" id="alasan" class="w-full border rounded px-2 py-1"
                                value="{{ $status->alasan ?? '' }}" placeholder="Contoh: Penerima tidak di rumah"
                                {{ in_array($status->status_pengiriman, ['selesai', 'gagal']) ? 'readonly' : '' }}>
                        </div>
                        <div id="nameSection" class="{{ $status->status_pengiriman === 'selesai' ? '' : 'hidden' }}">
                            <div class="text-gray-600">Nama Penerima</div>
                            <input type="text" name="nama_penerima" id="namePenerima" class="w-full border rounded px-2 py-1"
                                value="{{ $status->nama_penerima ?? '' }}" placeholder="{{ $status->user->name }}"
                                {{ in_array($status->status_pengiriman, ['selesai', 'gagal']) ? 'readonly' : '' }}>
                        </div>
                        <div id="photoSection" class="{{ in_array($status->status_pengiriman, ['selesai', 'gagal']) || !$status->status_pengiriman ? '' : 'hidden' }}">
                            <div class="text-gray-600">Foto Penerima/Penyerahan</div>

                            @if($status->foto_penerima)
                                <div class="mt-2 mb-2">
                                    <img src="{{ asset('storage/' . $status->foto_penerima) }}" 
                                        alt="Foto Penerima" 
                                        class="h-24 w-24 object-cover rounded border shadow-sm"
                                        onerror="this.src='{{ asset('images/no-image.png') }}'; this.alt='Foto tidak ditemukan';">
                                    <p class="text-xs text-gray-500 mt-1">Foto sudah diupload</p>
                                </div>
                            @endif

                            {{-- Input untuk upload foto baru --}}
                            @if(!in_array($status->status_pengiriman, ['selesai', 'gagal']))
                                <input type="file" name="foto_penerima" id="fotoInput" accept="image/*" class="w-full border rounded px-2 py-1 mt-2">
                                <small class="text-gray-500 text-xs">Format: JPG, PNG, max 5MB</small>
                            @endif
                        </div>

                        @if($isCOD && !in_array($status->status_pengiriman, ['selesai', 'gagal']))
                            <div id="paymentStatusSection">
                                <div class="text-gray-600">Status Pembayaran COD</div>
                                <select name="status_pembayaran" id="statusPembayaran" class="w-full border rounded px-2 py-1" onchange="handlePaymentStatusChange()">
                                    <option value="pending" {{ $status->transaksi->pembayaran->status_pembayaran == 'pending' ? 'selected' : '' }}>
                                        Belum Lunas</option>
                                    <option value="lunas" {{ $status->transaksi->pembayaran->status_pembayaran == 'lunas' ? 'selected' : '' }}>
                                        Lunas</option>
                                </select>
                                <input type="hidden" name="status_bayar" id="statusBayar" value="{{ $isLunas ? 'dibayar' : 'belum_dibayar' }}">
                            </div>
                        @endif
                    </div>
                    @if(!in_array($status->status_pengiriman, ['selesai', 'gagal']))
                        <div class="mt-12 px-8 py-6 w-full sm:w-auto">
                            <button type="submit" id="submitBtn"
                                class="bg-amber-500 text-white rounded-md shadow-lg hover:bg-amber-600 transition-all duration-300 flex items-center justify-center w-full text-lg px-8 py-3">
                                <i class="fas fa-save mr-3"></i>Update Status
                            </button>
                        </div>
                    @endif
                </form>

                <!-- Display Mode (shown when updated) -->
                <div id="displayMode" class="hidden">
                    <div class="mb-4">
                        <div class="text-gray-600 mb-2">Signature</div>
                        <img id="signatureDisplay" class="h-16 border rounded" alt="Signature">
                    </div>

                    <div class="mb-4">
                        <div class="text-gray-600 mb-2">Photo 1</div>
                        <img id="photo1Display" class="h-24 border rounded" alt="Photo 1">
                    </div>

                    <!-- Display Updated Information -->
                    <div class="bg-green-50 border border-green-200 rounded p-4 mt-4">
                        <h5 class="font-semibold text-green-800 mb-2">
                            <i class="fas fa-check-circle mr-2"></i>Delivery Information Updated
                        </h5>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                            <div><span class="font-medium">Status:</span> <span id="displayStatus"></span></div>
                            <div><span class="font-medium">Alasan:</span> <span id="displayAlasan"></span></div>
                            <div><span class="font-medium">Penerima:</span> <span id="displayPenerima"></span></div>
                            <div><span class="font-medium">COD:</span> Rp.<span id="displayCod"></span></div>
                            <div><span class="font-medium">Cash:</span> Rp.<span id="displayCash"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true
                }).then(() => {
                    window.location.href = "{{ route('kurir.order') }}";
                });
            </script>
        @endif

        @if(session('error'))
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

        <script>
            // Function to display a SweetAlert
            function showAlert(type, title, text) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    icon: type,
                    title: title,
                    text: text,
                    timer: 3000,
                    timerProgressBar: true,
                });
            }

            function handlePaymentStatusChange() {
                const statusBayarInput = document.getElementById('statusBayar');
                const statusPembayaran = document.getElementById('statusPembayaran');
                
                if (statusBayarInput && statusPembayaran) {
                    if (statusPembayaran.value === 'lunas') {
                        statusBayarInput.value = 'dibayar';
                        showAlert('success', 'Status Pembayaran', 'COD sudah ditandai sebagai lunas.');
                    } else {
                        statusBayarInput.value = 'belum_dibayar';
                        showAlert('warning', 'Status Pembayaran', 'COD belum lunas. Pastikan pelanggan sudah membayar sebelum menyelesaikan pengiriman.');
                    }
                }
            }

            function handleStatusChange() {
                const status = document.getElementById('statusPengiriman').value;
                const reasonSection = document.getElementById('reasonSection');
                const nameSection = document.getElementById('nameSection');
                const photoSection = document.getElementById('photoSection');
                const fotoInput = document.getElementById('fotoInput');

                if (status === 'selesai') {
                    reasonSection.classList.add('hidden');
                    nameSection.classList.remove('hidden');
                    photoSection.classList.remove('hidden');

                    // Enable photo input for "selesai" status
                    if (fotoInput) {
                        fotoInput.style.display = 'block';
                        fotoInput.required = true; // Make photo required for completed deliveries
                    }

                    showAlert('info', 'Status Selesai', 'Silakan upload foto penyerahan dan masukkan nama penerima.');

                } else if (status === 'gagal') {
                    reasonSection.classList.remove('hidden');
                    nameSection.classList.add('hidden');
                    photoSection.classList.remove('hidden');

                    // Enable photo input for "gagal" status
                    if (fotoInput) {
                        fotoInput.style.display = 'block';
                        fotoInput.required = false; // Photo optional for failed deliveries
                    }

                    showAlert('warning', 'Status Gagal', 'Silakan masukkan alasan kegagalan pengiriman.');

                } else {
                    reasonSection.classList.add('hidden');
                    nameSection.classList.add('hidden');
                    photoSection.classList.add('hidden');

                    if (fotoInput) {
                        fotoInput.required = false;
                    }
                }
            }

            // Validate file upload
            document.addEventListener('DOMContentLoaded', function () {
                handleStatusChange();

                const deliveryForm = document.getElementById('deliveryForm');
                const fotoInput = document.getElementById('fotoInput');
                const statusSelect = document.getElementById('statusPengiriman');
                const namePenerima = document.getElementById('namePenerima');
                const alasanInput = document.getElementById('alasan');
                const submitBtn = document.getElementById('submitBtn');

                if (fotoInput) {
                    fotoInput.addEventListener('change', function (e) {
                        const file = e.target.files[0];
                        if (file) {
                            if (file.size > 5 * 1024 * 1024) {
                                showAlert('error', 'File Terlalu Besar', 'Ukuran file maksimal 5MB');
                                e.target.value = '';
                                return;
                            }

                            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                            if (!allowedTypes.includes(file.type)) {
                                showAlert('error', 'Format File Salah', 'Hanya file JPG, JPEG, dan PNG yang diizinkan');
                                e.target.value = '';
                                return;
                            }

                            showAlert('success', 'File Valid', 'Foto berhasil dipilih: ' + file.name);
                        }
                    });
                }

                if (deliveryForm) {
                    deliveryForm.addEventListener('submit', function (e) {
                        const status = statusSelect.value.trim();
                        let hasError = false;

                        // PERBAIKAN: Validasi COD untuk status selesai
                        const isCOD = {{ $isCOD ? 'true' : 'false' }};
                        if (isCOD && status === 'selesai') {
                            const statusPembayaran = document.getElementById('statusPembayaran');
                            if (statusPembayaran && statusPembayaran.value === 'pending') {
                                e.preventDefault();
                                showAlert('error', 'COD Belum Lunas', 'Pembayaran COD harus dalam status "Lunas" sebelum pengiriman dapat diselesaikan. Silakan konfirmasi pembayaran dari pelanggan terlebih dahulu.');
                                hasError = true;
                                return;
                            }
                        }

                        // Validasi status "selesai"
                        if (status === 'selesai') {
                            if (!namePenerima || !namePenerima.value.trim()) {
                                showAlert('error', 'Data Tidak Lengkap', 'Nama penerima harus diisi untuk status selesai');
                                hasError = true;
                            }

                            const hasExistingImage = !!document.querySelector('img[alt="Foto Penerima"]');
                            const hasNewUpload = fotoInput && fotoInput.files.length > 0;
                            if (!hasExistingImage && !hasNewUpload) {
                                showAlert('error', 'Foto Diperlukan', 'Foto penyerahan harus diupload untuk status selesai');
                                hasError = true;
                            }
                        }

                        // Validasi status "gagal"
                        if (status === 'gagal') {
                            if (!alasanInput || !alasanInput.value.trim()) {
                                showAlert('error', 'Alasan Diperlukan', 'Alasan kegagalan harus diisi untuk status gagal');
                                hasError = true;
                            }
                        }

                        if (hasError) {
                            e.preventDefault(); // Hentikan submit jika ada error
                            return;
                        }

                        // Nonaktifkan tombol submit agar tidak dobel klik
                        if (submitBtn) {
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = `<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...`;
                        }
                    });
                }
            });
        </script>
@endsection