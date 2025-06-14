<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukti Pembayaran - {{ $transaksi->id_transaksi ?? 'N/A' }}</title>
    <style>
        /* PDF Optimized Styles - Compatible with DomPDF */
        @page {
            margin: 15mm;
            size: A4;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333333;
            background: #ffffff;
        }

        /* Container */
        .receipt-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
        }

        /* Header */
        .header {
            background: #f97316;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .company-info {
            font-size: 12px;
            line-height: 1.3;
        }

        /* Invoice Header - Using Flexbox Alternative */
        .invoice-header {
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 15px;
            overflow: hidden;
        }

        .invoice-left {
            float: left;
            width: 60%;
        }

        .invoice-right {
            float: right;
            width: 35%;
            text-align: right;
        }

        .invoice-number {
            font-size: 18px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 5px;
        }

        .invoice-id {
            background: #f7fafc;
            padding: 5px 10px;
            border: 1px solid #e2e8f0;
            display: inline-block;
            font-size: 12px;
            font-family: monospace;
        }

        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            display: inline-block;
        }

        .status-completed {
            background: #c6f6d5;
            color: #22543d;
            border: 1px solid #68d391;
        }

        .status-pending {
            background: #fefcbf;
            color: #744210;
            border: 1px solid #f6e05e;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Info Grid - Using Float Instead of Table */
        .info-grid {
            width: 100%;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .info-section {
            float: left;
            width: 48%;
            margin-right: 2%;
            padding: 15px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            margin-bottom: 10px;
        }

        .info-section:last-child {
            margin-right: 0;
        }

        .info-section h3 {
            font-size: 13px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid #cbd5e0;
            padding-bottom: 5px;
        }

        .info-row {
            margin-bottom: 8px;
            overflow: hidden;
        }

        .info-label {
            float: left;
            width: 45%;
            font-weight: 600;
            color: #4a5568;
        }

        .info-value {
            float: right;
            width: 50%;
            text-align: right;
            color: #333333;
        }

        /* Items Section */
        .items-section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 15px;
            padding: 10px 0;
            border-bottom: 2px solid #f97316;
        }

        /* Simple Table for PDF Compatibility */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .items-table th {
            background: #2d3748;
            color: #ffffff;
            padding: 12px 8px;
            text-align: left;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid #2d3748;
        }

        .items-table td {
            padding: 10px 8px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
        }

        .items-table tr:nth-child(even) {
            background: #f8fafc;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .item-name {
            font-weight: 600;
            color: #333333;
        }

        .item-price {
            font-weight: 600;
            color: #f97316;
        }

        /* Summary Section */
        .summary-section {
            margin-top: 20px;
            border-top: 2px solid #e2e8f0;
            padding-top: 20px;
        }

        .summary-row {
            width: 100%;
            margin-bottom: 8px;
            overflow: hidden;
        }

        .summary-label {
            float: left;
            width: 70%;
            color: #4a5568;
            font-size: 12px;
        }

        .summary-value {
            float: right;
            width: 25%;
            text-align: right;
            color: #333333;
            font-size: 12px;
        }

        /* Total Row */
        .total-row {
            background: #fed7aa;
            border: 2px solid #f97316;
            padding: 15px;
            margin: 15px 0;
            overflow: hidden;
        }

        .total-label {
            float: left;
            font-size: 16px;
            font-weight: bold;
            color: #333333;
        }

        .total-amount {
            float: right;
            font-size: 18px;
            font-weight: bold;
            color: #f97316;
        }

        /* Thank You Section */
        .thank-you {
            text-align: center;
            margin: 25px 0;
            padding: 20px;
            background: #f0fff4;
            border: 2px solid #68d391;
        }

        .thank-you h2 {
            font-size: 18px;
            color: #22543d;
            margin-bottom: 10px;
        }

        .thank-you p {
            color: #2f855a;
            font-size: 12px;
            margin-bottom: 5px;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            padding: 20px;
            background: #2d3748;
            color: #ffffff;
            text-align: center;
        }

        .footer h3 {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .footer p {
            font-size: 11px;
            margin: 5px 0;
        }

        .footer-divider {
            height: 1px;
            background: #4a5568;
            margin: 10px 0;
        }

        /* PDF Specific */
        .page-break {
            page-break-after: always;
        }

        .no-break {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <!-- Header -->
        <div class="header">
            <h1>Bukti Pembayaran</h1>
            <div class="company-info">
                <strong>JogFood</strong><br>
                Jl. Malioboro No. 123, Yogyakarta<br>
                Email: jogfood25@gmail.com | Tel: 0821-7239-4367
            </div>
        </div>

        <!-- Invoice Header -->
        <div class="invoice-header clearfix">
            <div class="invoice-left">
                <div class="invoice-number">Ringkasan Order</div>
                <div class="invoice-id">#{{ $transaksi->id_transaksi ?? 'N/A' }}</div>
            </div>
            <div class="invoice-right">
                @if (isset($pembayaran) && $pembayaran->metode_pembayaran == 'cod')
                    <div class="status-badge status-pending">Pending</div>
                @else
                    <div class="status-badge status-completed">Selesai</div>
                @endif
            </div>
        </div>

        <!-- Information Grid -->
        <div class="info-grid clearfix">
            <div class="info-section">
                <h3>Informasi Order</h3>
                <div class="info-row clearfix">
                    <span class="info-label">Tanggal Order:</span>
                    <span class="info-value">{{ isset($transaksi->created_at) ? $transaksi->created_at->format('d M Y, H:i') : 'N/A' }}</span>
                </div>
                <div class="info-row clearfix">
                    <span class="info-label">Alamat Pengiriman:</span>
                    <span class="info-value">{{ $transaksi->alamat ?? 'Tidak ada alamat' }}</span>
                </div>
            </div>
            <div class="info-section">
                <h3>Informasi Pembayaran</h3>
                <div class="info-row clearfix">
                    <span class="info-label">Metode:</span>
                    <span class="info-value">{{ isset($pembayaran->metode_pembayaran) ? ucfirst($pembayaran->metode_pembayaran) : 'Belum ditentukan' }}</span>
                </div>
                <div class="info-row clearfix">
                    <span class="info-label">Tanggal Bayar:</span>
                    <span class="info-value">
                        {{ isset($pembayaran) && $pembayaran && $pembayaran->updated_at ? $pembayaran->updated_at->format('d M Y, H:i') : 'Belum dibayar' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Items Section -->
        <div class="items-section no-break">
            <div class="section-title">Item yang Dipesan</div>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th class="text-center">Qty</th>
                        <th class="text-right">Harga Satuan</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($transaksi->detail_transaksi))
                        @foreach($transaksi->detail_transaksi as $detail)
                            <tr>
                                <td class="item-name">{{ $detail->menu->nama ?? 'N/A' }}</td>
                                <td class="text-center">{{ $detail->jumlah ?? 0 }}</td>
                                <td class="text-right">Rp{{ number_format($detail->menu->harga ?? 0, 0, ',', '.') }}</td>
                                <td class="text-right item-price">Rp{{ number_format($detail->subtotal ?? 0, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Summary Section -->
        <div class="summary-section">
            @php
                $subtotal = isset($transaksi->detail_transaksi) ? $transaksi->detail_transaksi->sum('subtotal') : 0;
                $pajak = isset($pajak) ? $pajak : round($subtotal * 0.1);
                $biaya_pengiriman = isset($biaya_pengiriman) ? $biaya_pengiriman : 10000;
            @endphp

            <div class="summary-row clearfix">
                <span class="summary-label">Subtotal:</span>
                <span class="summary-value">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row clearfix">
                <span class="summary-label">Biaya Pengiriman:</span>
                <span class="summary-value">Rp{{ number_format($biaya_pengiriman, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row clearfix">
                <span class="summary-label">Pajak:</span>
                <span class="summary-value">Rp{{ number_format($pajak, 0, ',', '.') }}</span>
            </div>

            <div class="total-row clearfix">
                <span class="total-label">TOTAL PEMBAYARAN:</span>
                <span class="total-amount">Rp{{ number_format($transaksi->total_harga ?? 0, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Thank You Section -->
        <div class="thank-you">
            <h2>Terima Kasih!</h2>
            <p>Order Anda telah berhasil diproses dan akan segera kami kirimkan.</p>
            <p>Simpan bukti pembayaran ini sebagai referensi transaksi Anda.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <h3>Butuh Bantuan?</h3>
            <p><strong>Email:</strong> jogfood25@gmail.com</p>
            <p><strong>WhatsApp:</strong> 0821-7239-4367</p>
            <div class="footer-divider"></div>
            <p>&copy; 2025 JogFood - Jl. Malioboro No. 123, Yogyakarta</p>
            <p>Dokumen ini dibuat secara otomatis pada {{ now()->format('d M Y, H:i:s') }} WIB</p>
        </div>
    </div>
</body>
</html>