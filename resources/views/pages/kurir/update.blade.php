@extends('layouts.appadm')

@section('title', 'Kurir - Jogfood')

@section('content')
<div class="p-4 pt-20 bg-gradient-to-b from-amber-50 to-white min-h-screen">
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
            </div>
        </div>
        <hr class="my-4">

        <!-- Status Badge -->
        <div class="mb-4">
            <span id="statusBadge"
                class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-amber-100 text-amber-800 shadow-sm">
                <i class="fas fa-clock mr-2"></i> Belum Diupdate
            </span>
        </div>

        <!-- Delivery Information Form -->
        <h4 class="font-semibold text-gray-700 mb-2">Delivery Information</h4>
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
        <form id="deliveryForm">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <div class="text-gray-600">Status Pengiriman</div>
                    <select id="statusPengiriman" class="w-full border rounded px-2 py-1"
                        onchange="handleStatusChange()">
                        <option value="">Pilih Status</option>
                        <option value="success">Success</option>
                        <option value="gagal">Gagal</option>
                        <option value="antar-ulang">Antar Ulang</option>
                    </select>
                </div>
                <div id="reasonSection" class="hidden">
                    <div class="text-gray-600">Alasan (jika gagal/antar-ulang)</div>
                    <input type="text" id="alasan" class="w-full border rounded px-2 py-1"
                        placeholder="Contoh: Penerima tidak di rumah">
                </div>
                <div id="nameSection" class="hidden">
                    <div class="text-gray-600">Name of Receiver</div>
                    <input type="text" id="namePenerima" class="w-full border rounded px-2 py-1"
                        placeholder="{{ $status->user->name }}">
                </div>

                <div id="codSection" class="hidden">
                    <div class="text-gray-600">Total COD</div>
                    <input type="number" id="totalCod" class="w-full border rounded px-2 py-1" placeholder="0" min="0">
                </div>
                <div id="cashSection" class="hidden">
                    <div class="text-gray-600">Cash</div>
                    <input type="number" id="cash" class="w-full border rounded px-2 py-1" placeholder="0" min="0">
                </div>
            </div>


            <hr class="my-4">

            <!-- Proof of Delivery Section -->
            <h4 class="font-semibold text-gray-700 mb-4 text-lg border-b border-amber-100 pb-2">Bukti Pengantaran</h4>

            <!-- Input Mode (shown when not updated) -->
            <div id="inputMode">
                <div class="mb-4">
                    <div class="text-gray-600 mb-2">Upload Photo</div>
                    <input type="file" id="photo1Input" accept="image/*" capture="environment" class="w-full border rounded px-2 py-1">
                </div>
            </div>
            <div class="mt-12 px-8 py-6 w-full sm:w-auto">
                <button type="submit"
                    class="bg-amber-500 text-white rounded-md shadow-lg hover:bg-amber-600 transition-all duration-300 flex items-center justify-center w-full text-lg px-8 py-3">
                    <i class="fas fa-save mr-3"></i>Update Status
                </button>
            </div>
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

<script>
    // Function to display a SweetAlert
    function showAlert(type, title, text) {
        Swal.fire({
            icon: type,
            title: title,
            text: text,
            confirmButtonColor: '#f59e0b'
        });
    }

    function handlePaymentMethodChange() {
        const codSection = document.getElementById('codSection');
        const cashSection = document.getElementById('cashSection');
        const paymentMethod = '{{ $status->transaksi && $status->transaksi->pembayaran ? $status->transaksi->pembayaran->metode_pembayaran : '' }}';

        if (paymentMethod === 'cod') {
            codSection.classList.remove('hidden');
            cashSection.classList.remove('hidden');
            showAlert('info', 'COD Selected', 'Cash on Delivery option is selected.');
        } else {
            codSection.classList.add('hidden');
            cashSection.classList.add('hidden');
            showAlert('info', 'Other Payment', 'Non-COD payment method selected.');
        }
    }

    function handleStatusChange() {
        const status = document.getElementById('statusPengiriman').value;
        const reasonSection = document.getElementById('reasonSection');
        const nameSection = document.getElementById('nameSection');

        if (status === 'success') {
            reasonSection.classList.add('hidden');
            nameSection.classList.remove('hidden');
            showAlert('success', 'Status Updated', 'Delivery marked as successful.');
        } else if (status === 'gagal' || status === 'antar-ulang') {
            reasonSection.classList.remove('hidden');
            nameSection.classList.add('hidden');
            showAlert('warning', 'Status Updated', 'Delivery requires attention: ' + status);
        } else {
            reasonSection.classList.add('hidden');
            nameSection.classList.add('hidden');
        }
    }

    // Initialize the form based on current order data
    document.addEventListener('DOMContentLoaded', () => {
        handlePaymentMethodChange();
        handleStatusChange();
    });
</script>
