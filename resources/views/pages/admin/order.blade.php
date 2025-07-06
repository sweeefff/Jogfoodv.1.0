@extends('layouts.appadm')
@section('title', 'Order - Jogfood')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="min-h-screen bg-amber-50 flex flex-col pt-4 md:pl-64 pl-4 pr-4 md:pr-8 mt-20">
        <div class="w-full max-w-screen-xl bg-white p-8 rounded-xl shadow-lg mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-amber-700">DAFTAR ORDER TERBARU</h2>
            <!-- Filter Form -->
            <form method="GET" action="{{ route('admin.order') }}" class="mb-8">
                <div
                    class="flex flex-col md:flex-row md:items-end gap-4 bg-amber-100 p-4 rounded-lg shadow-sm border border-amber-200">
                    <div>
                        <label class="block text-xs font-semibold text-amber-700 mb-1">Tanggal Order</label>
                        <div class="flex gap-2 items-center">
                            <select id="preset-date" class="border rounded px-2 py-1 text-sm bg-white min-w-[140px] w-40">
                                <option value="">Custom</option>
                                <option value="today">Hari Ini</option>
                                <option value="yesterday">Kemarin</option>
                                <option value="last7">Seminggu Lalu</option>
                                <option value="last30">Sebulan Lalu</option>
                                <option value="last90">3 Bulan Lalu</option>
                                <option value="last180">6 Bulan Lalu</option>
                                <option value="last365">Setahun Lalu</option>
                            </select>
                            <input type="text" id="date-range"
                                class="border rounded px-2 py-1 text-sm bg-white min-w-[220px]" readonly
                                value="{{ (request('tanggal_mulai') && request('tanggal_selesai')) ? (request('tanggal_mulai') . ' s/d ' . request('tanggal_selesai')) : '' }}">
                            <input type="hidden" name="tanggal_mulai" id="tanggal_mulai"
                                value="{{ request('tanggal_mulai') }}">
                            <input type="hidden" name="tanggal_selesai" id="tanggal_selesai"
                                value="{{ request('tanggal_selesai') }}">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-amber-700 mb-1">Status</label>
                        <select name="status" class="border rounded px-2 py-1 text-sm bg-white min-w-[140px] w-40">
                            <option value="">Semua Status</option>
                            <option value="Lunas" {{ request('status') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>dibatalkan
                            </option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-amber-700 mb-1">Metode Pembayaran</label>
                        <select name="metode_pembayaran"
                            class="border rounded px-2 py-1 text-sm bg-white min-w-[140px] w-40">
                            <option value="">Semua Metode</option>
                            <option value="bank-transfer" {{ request('metode_pembayaran') == 'bank-transfer' ? 'selected' : '' }}>Transfer Bank</option>
                            <option value="cod" {{ request('metode_pembayaran') == 'cod' ? 'selected' : '' }}>COD</option>
                            <option value="e-wallet" {{ request('metode_pembayaran') == 'e-wallet' ? 'selected' : '' }}>
                                E-Wallet
                            </option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit"
                            class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded font-semibold text-sm shadow">Filter</button>
                        @if(request('tanggal_mulai') || request('tanggal_selesai') || request('status') || request('metode_pembayaran'))
                            <a href="{{ route('admin.order') }}" class="text-blue-500 underline text-sm px-2 py-2">Reset</a>
                        @endif
                    </div>
                </div>
            </form>
            <div class="mb-4">
                <div
                    class="bg-green-50 border border-green-200 rounded px-4 py-3 text-green-700 font-semibold text-lg flex items-center gap-2">
                    <span>Total Pendapatan:</span>
                    <span class="font-bold">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</span>
                </div>
            </div>
            <div class="mb-4 flex gap-2">
                <a href="{{ route('admin.order.export', array_merge(request()->all(), ['type' => 'pdf'])) }}"
                    target="_blank" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 text-sm">Export PDF</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 text-left text-sm uppercase">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Order ID</th>
                            <th class="px-4 py-3">Customer</th>
                            <th class="px-4 py-3">Alamat</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @forelse($transaksi as $order)
                            <tr class="border-b hover:bg-amber-50 transition">
                                <td class="px-4 py-3">
                                    {{ $loop->iteration + ($transaksi->currentPage() - 1) * $transaksi->perPage() }}</td>
                                <td class="px-4 py-3 font-semibold">{{ $order->id_transaksi }}</td>
                                <td class="px-4 py-3">{{ $order->user->name ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $order->user->alamat ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}
                                </td>
                                <td class="px-4 py-3">{{ $order->total_harga_formatted }}</td>
                                <td class="px-4 py-3">
                                    @if($order->status_transaksi == 'Selesai')
                                        <span class="badge bg-green-200 text-green-800">Selesai</span>
                                    @elseif($order->status_transaksi == 'dibatalkan')
                                        <span class="badge bg-red-200 text-red-800">dibatalkan</span>
                                    @else
                                        <span class="badge bg-yellow-200 text-yellow-800">{{ $order->status_transaksi }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <button onclick="toggleDetail('{{ $order->id_transaksi }}')"
                                        class="text-blue-600 hover:underline">Lihat Detail</button>
                                </td>
                            </tr>
                            <!-- Detail row (hidden by default) -->
                            <tr id="detail-{{ $order->id_transaksi }}" class="hidden bg-amber-50">
                                <td colspan="9" class="px-4 py-3">
                                    <div class="p-4 rounded-lg bg-white shadow w-full max-w-3xl mx-auto">
                                        <div class="mb-2 font-semibold text-gray-700">Item yang Dipesan:</div>
                                        <ul class="list-disc ml-6 mt-2">
                                            @foreach($order->detail_transaksi as $detail)
                                                <li class="flex justify-between items-center">
                                                    <div>
                                                        <span class="font-medium">{{ $detail->menu->nama ?? '-' }}</span>
                                                        <span class="text-gray-500">x{{ $detail->jumlah }}</span>
                                                    </div>
                                                    <div class="text-gray-700">{{ $detail->subtotal_formatted }}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="border-t my-3"></div>
                                        @php
                                            $tax = 0.1;
                                            $deliveryFee = 10000;
                                            $subtotal = $order->detail_transaksi->sum('subtotal');
                                            $taxAmount = $subtotal * $tax;
                                            $totalAkhir = $subtotal + $taxAmount + $deliveryFee;
                                        @endphp
                                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-2">
                                            <div>
                                                <span class="text-gray-500">Subtotal:</span>
                                                <span class="font-medium">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-500">Pajak (10%):</span>
                                                <span class="font-medium">Rp{{ number_format($taxAmount, 0, ',', '.') }}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-500">Biaya Pengiriman:</span>
                                                <span
                                                    class="font-medium">Rp{{ number_format($deliveryFee, 0, ',', '.') }}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-500">Total Akhir:</span>
                                                <span
                                                    class="font-bold text-amber-600">Rp{{ number_format($totalAkhir, 0, ',', '.') }}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-500">Metode Pembayaran:</span>
                                                <span
                                                    class="font-medium">{{ $order->pembayaran->metode_pembayaran ?? '-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-8 text-gray-400">Belum ada order.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    @if($transaksi->total() > 0)
                        Menampilkan <span class="font-medium">{{ $transaksi->firstItem() }}</span> sampai <span
                            class="font-medium">{{ $transaksi->lastItem() }}</span> dari <span
                            class="font-medium">{{ $transaksi->total() }}</span> order
                    @else
                        Tidak ada data untuk ditampilkan
                    @endif
                </div>
                <div>
                    {{ $transaksi->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- daterangepicker CSS & JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        function toggleDetail(id) {
            const row = document.getElementById('detail-' + id);
            if (row) row.classList.toggle('hidden');
        }

        // Function to detect preset based on current filter values
        function detectPreset() {
            const start = document.getElementById('tanggal_mulai').value;
            const end = document.getElementById('tanggal_selesai').value;
            const today = new Date();

            if (!start || !end) return '';

            const startDate = new Date(start);
            const endDate = new Date(end);
            const todayStr = today.toISOString().slice(0, 10);

            // Check if it's today
            if (start === todayStr && end === todayStr) {
                return 'today';
            }

            // Check if it's yesterday
            const yesterday = new Date(today);
            yesterday.setDate(today.getDate() - 1);
            const yesterdayStr = yesterday.toISOString().slice(0, 10);
            if (start === yesterdayStr && end === yesterdayStr) {
                return 'yesterday';
            }

            // Check if it's last 7 days
            const last7 = new Date(today);
            last7.setDate(today.getDate() - 6);
            const last7Str = last7.toISOString().slice(0, 10);
            if (start === last7Str && end === todayStr) {
                return 'last7';
            }

            // Check if it's last 30 days
            const last30 = new Date(today);
            last30.setDate(today.getDate() - 29);
            const last30Str = last30.toISOString().slice(0, 10);
            if (start === last30Str && end === todayStr) {
                return 'last30';
            }

            // Check if it's last 90 days
            const last90 = new Date(today);
            last90.setDate(today.getDate() - 89);
            const last90Str = last90.toISOString().slice(0, 10);
            if (start === last90Str && end === todayStr) {
                return 'last90';
            }

            // Check if it's last 180 days
            const last180 = new Date(today);
            last180.setDate(today.getDate() - 179);
            const last180Str = last180.toISOString().slice(0, 10);
            if (start === last180Str && end === todayStr) {
                return 'last180';
            }

            // Check if it's last 365 days
            const last365 = new Date(today);
            last365.setDate(today.getDate() - 364);
            const last365Str = last365.toISOString().slice(0, 10);
            if (start === last365Str && end === todayStr) {
                return 'last365';
            }

            return '';
        }

        // Set initial preset value based on current filter
        document.addEventListener('DOMContentLoaded', function () {
            const preset = detectPreset();
            document.getElementById('preset-date').value = preset;
        });

        // Preset handler
        document.getElementById('preset-date').addEventListener('change', function () {
            const today = new Date();
            let start = '', end = '';

            if (this.value === 'today') {
                start = end = today.toISOString().slice(0, 10);
            } else if (this.value === 'yesterday') {
                const yest = new Date(today);
                yest.setDate(today.getDate() - 1);
                start = end = yest.toISOString().slice(0, 10);
            } else if (this.value === 'last7') {
                const last7 = new Date(today);
                last7.setDate(today.getDate() - 6);
                start = last7.toISOString().slice(0, 10);
                end = today.toISOString().slice(0, 10);
            } else if (this.value === 'last30') {
                const last30 = new Date(today);
                last30.setDate(today.getDate() - 29);
                start = last30.toISOString().slice(0, 10);
                end = today.toISOString().slice(0, 10);
            } else if (this.value === 'last90') {
                const last90 = new Date(today);
                last90.setDate(today.getDate() - 89);
                start = last90.toISOString().slice(0, 10);
                end = today.toISOString().slice(0, 10);
            } else if (this.value === 'last180') {
                const last180 = new Date(today);
                last180.setDate(today.getDate() - 179);
                start = last180.toISOString().slice(0, 10);
                end = today.toISOString().slice(0, 10);
            } else if (this.value === 'last365') {
                const last365 = new Date(today);
                last365.setDate(today.getDate() - 364);
                start = last365.toISOString().slice(0, 10);
                end = today.toISOString().slice(0, 10);
            } else {
                // Custom - don't change the current values
                return;
            }

            document.getElementById('tanggal_mulai').value = start;
            document.getElementById('tanggal_selesai').value = end;

            if (start && end) {
                $('#date-range').val(start + ' s/d ' + end);
            }
        });

        // Date range picker handler
        $(function () {
            let start = "{{ request('tanggal_mulai') }}";
            let end = "{{ request('tanggal_selesai') }}";
            let display = '';

            if (start && end) {
                display = start + ' s/d ' + end;
            } else {
                // Default kosong jika belum ada filter
                start = end = '';
                display = '';
            }

            $('#date-range').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    format: 'YYYY-MM-DD',
                    cancelLabel: 'Reset',
                    applyLabel: 'Pilih'
                },
                startDate: start || moment(),
                endDate: end || moment()
            });

            $('#date-range').on('apply.daterangepicker', function (ev, picker) {
                $('#tanggal_mulai').val(picker.startDate.format('YYYY-MM-DD'));
                $('#tanggal_selesai').val(picker.endDate.format('YYYY-MM-DD'));
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' s/d ' + picker.endDate.format('YYYY-MM-DD'));
                document.getElementById('preset-date').value = '';
            });

            $('#date-range').on('cancel.daterangepicker', function (ev, picker) {
                // Reset tanggal
                $('#tanggal_mulai').val('');
                $('#tanggal_selesai').val('');
                $(this).val('');
                document.getElementById('preset-date').value = '';
            });

            // Set initial display value
            if (display) {
                $('#date-range').val(display);
            }
        });
    </script>
@endsection