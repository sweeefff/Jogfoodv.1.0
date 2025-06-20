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
                            <span class="text-gray-800">Syazela</span>
                        </div>
                        <div class="flex">
                            <span class="font-semibold text-amber-700 mr-2">Address:</span>
                            <span class="text-gray-800">Rumah Cik Ayu Jalan Kampung Tengah RT 9 RW 3 Pulau Kasu Kampung
                                Tengah Belakang Padang</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <span class="font-semibold text-amber-700 mr-2">No Resi:</span>
                            <span class="font-bold text-gray-800">SHPE2505255F12D18079</span>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 mt-3">
                    <a href="tel:08123456789"
                        class="text-white bg-amber-500 hover:bg-amber-600 p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-phone"></i>
                    </a>
                    <a href="https://wa.me/08123456789"
                        class="text-white bg-green-500 hover:bg-green-600 p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://maps.google.com/?q=Rumah Cik Ayu Jalan Kampung Tengah RT 9 RW 3 Pulau Kasu Kampung Tengah Belakang Padang"
                        class="text-white bg-blue-500 hover:bg-blue-600 p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-map-marker-alt"></i>
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
            <form id="deliveryForm">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Metode Pembayaran</label>
                        <select id="metodePembayaran"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="cod">COD (Cash on Delivery)</option>
                            <option value="transfer-bank">Transfer Bank</option>
                            <option value="e-wallet">E-Wallet</option>
                        </select>
                    </div>
                    <div>
                        <div class="text-gray-600">Status Pengiriman</div>
                        <select id="statusPengiriman" class="w-full border rounded px-2 py-1">
                            <option value="">Pilih Status</option>
                            <option value="success">Success</option>
                            <option value="gagal">Gagal</option>
                            <option value="antar-ulang">Antar Ulang</option>
                        </select>
                    </div>
                    <div>
                        <div class="text-gray-600">Alasan (jika gagal/antar-ulang)</div>
                        <input type="text" id="alasan" class="w-full border rounded px-2 py-1"
                            placeholder="Contoh: Penerima tidak di rumah">
                    </div>
                    <div>
                        <div class="text-gray-600">Name of Receiver</div>
                        <input type="text" id="namePenerima" class="w-full border rounded px-2 py-1"
                            placeholder="Nama penerima">
                    </div>
                    <div id="codSection" class="hidden">
                        <div class="text-gray-600">Total COD</div>
                        <input type="number" id="totalCod" class="w-full border rounded px-2 py-1" placeholder="0"
                            min="0">
                    </div>
                    <div id="cashSection" class="hidden">
                        <div class="text-gray-600">Cash</div>
                        <input type="number" id="cash" class="w-full border rounded px-2 py-1" placeholder="0" min="0">
                    </div>
                </div>
                <button type="submit"
                    class="mt-6 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg shadow-md hover:from-amber-600 hover:to-amber-700 transition-all duration-300 flex items-center justify-center w-full sm:w-auto">
                    <i class="fas fa-save mr-3"></i>Update Status
                </button>
            </form>

            <hr class="my-4">

            <!-- Proof of Delivery Section -->
            <h4 class="font-semibold text-gray-700 mb-4 text-lg border-b border-amber-100 pb-2">Proof of Delivery</h4>

            <!-- Input Mode (shown when not updated) -->
            <div id="inputMode">
                <div class="mb-4">
                    <div class="text-gray-600 mb-2">Upload Signature</div>
                    <input type="file" id="signatureInput" accept="image/*" class="w-full border rounded px-2 py-1">
                    <canvas id="signatureCanvas" class="border mt-2 cursor-crosshair hidden" width="300"
                        height="120"></canvas>
                    <div class="mt-2">
                        <button type="button" id="drawSignature"
                            class="px-3 py-1 bg-blue-500 text-white rounded text-sm hover:bg-blue-600">
                            <i class="fas fa-pen mr-1"></i>Draw Signature
                        </button>
                        <button type="button" id="clearSignature"
                            class="px-3 py-1 bg-gray-500 text-white rounded text-sm hover:bg-gray-600 ml-2 hidden">
                            <i class="fas fa-eraser mr-1"></i>Clear
                        </button>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-gray-600 mb-2">Upload Photo 1</div>
                    <input type="file" id="photo1Input" accept="image/*" class="w-full border rounded px-2 py-1">
                </div>

                <div class="mb-4">
                    <div class="text-gray-600 mb-2">Upload Photo 2</div>
                    <input type="file" id="photo2Input" accept="image/*" class="w-full border rounded px-2 py-1">
                </div>
            </div>

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

                <div class="mb-4">
                    <div class="text-gray-600 mb-2">Photo 2</div>
                    <img id="photo2Display" class="h-24 border rounded" alt="Photo 2">
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