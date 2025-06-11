<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Bukti Pembayaran - {{ $transaksi->id_transaksi }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/pdf.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            color: #374151;
        }

        .container {
            max-width: 480px;
            margin: 32px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .header {
            background: #ffedd5;
            text-align: center;
            padding: 32px 24px 16px;
        }

        .header h1 {
            color: #ea580c;
            font-size: 22px;
            margin: 0 0 8px;
        }

        .header img {
            height: 48px;
            margin: 8px auto 0;
            display: block;
        }

        .order-summary {
            padding: 32px 24px;
        }

        .order-summary h2 {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }

        .order-summary .order-id {
            font-size: 14px;
            color: #6b7280;
            margin: 4px 0 0;
        }

        .order-summary .status {
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 18px;
            border-radius: 999px;
            display: inline-block;
        }

        .order-details {
            margin: 18px 0;
            font-size: 14px;
            color: #6b7280;
        }

        .order-details .label {
            width: 50%;
        }

        .order-details .value {
            width: 50%;
            text-align: right;
            font-weight: 500;
            color: #374151;
        }

        .items-section h3 {
            font-size: 15px;
            font-weight: 600;
            color: #374151;
            margin: 18px 0 10px;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .item-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .item-icon {
            width: 36px;
            height: 36px;
            background: #ffedd5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item-name {
            font-weight: 600;
            color: #1f2937;
        }

        .item-meta {
            font-size: 13px;
            color: #6b7280;
        }

        .item-subtotal {
            font-weight: 600;
            color: #ea580c;
        }

        .divider {
            height: 1px;
            background: #f3f4f6;
            margin: 18px 0;
        }

        .cost-table {
            width: 100%;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 0;
        }

        .cost-table td {
            padding: 2px 0;
        }

        .total-box {
            background: #ffedd5;
            border-radius: 10px;
            padding: 16px 18px;
            margin: 18px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-label {
            font-weight: 700;
            font-size: 16px;
            color: #1f2937;
        }

        .total-amount {
            font-weight: 700;
            font-size: 18px;
            color: #ea580c;
        }

        .payment-section {
            margin-top: 24px;
        }

        .payment-section h3 {
            font-size: 15px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
        }

        .payment-table {
            width: 100%;
            font-size: 14px;
            color: #6b7280;
            background: #f9fafb;
            border-radius: 8px;
        }

        .payment-table td {
            padding: 2px 0;
        }

        .thank-you {
            text-align: center;
            margin: 32px 0 0;
        }

        .thank-you .icon {
            font-size: 32px;
        }

        .thank-you h2 {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin: 8px 0 4px;
        }

        .thank-you p {
            color: #6b7280;
            font-size: 14px;
        }

        .footer {
            background: #ea580c;
            padding: 18px 0;
            text-align: center;
        }

        .footer p {
            color: #ffedd5;
            font-size: 14px;
            margin: 0;
        }

        .footer .contact {
            color: #fdba74;
            font-size: 13px;
            margin: 4px 0 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Bukti Pembayaran</h1>
            <img src="{{ asset('assets/icon/jogfood-shadow.png') }}" alt="Jogfood Logo">
        </div>
        <div class="order-summary">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                <div>
                    <h2>Ringkasan Order</h2>
                    <p class="order-id">#{{ $transaksi->id_transaksi }}</p>
                </div>
                <div class="status">Selesai</div>
            </div>
            <div class="order-details" style="display:flex;">
                <div class="label">Tanggal Order</div>
                <div class="value">{{ $transaksi->created_at->format('d M Y') }}</div>
            </div>
            <div class="order-details" style="display:flex;">
                <div class="label">Alamat</div>
                <div class="value">{{ $transaksi->alamat ?? '-' }}</div>
            </div>
            <div class="items-section">
                <h3>Item yang Dipesan</h3>
                @foreach($transaksi->detail_transaksi as $detail)
                    <div class="item-row">
                        <div class="item-info">
                            <div class="item-icon">🍽️</div>
                            <div>
                                <div class="item-name">{{ $detail->menu->nama }}</div>
                                <div class="item-meta">{{ $detail->jumlah }} x
                                    Rp{{ number_format($detail->menu->harga, 0, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="item-subtotal">Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>
            <div class="divider"></div>
            @php
                $subtotal = $transaksi->detail_transaksi->sum('subtotal');
                $diskon = $transaksi->diskon ?? 0;
                $biayaPengiriman = $transaksi->biaya_pengiriman ?? 0;
                $pajak = 0.1 * ($subtotal - $diskon);
                $total = ($subtotal - $diskon) + $pajak + $biayaPengiriman;
            @endphp
            <table class="cost-table">
                <tr>
                    <td>Subtotal</td>
                    <td align="right">Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td align="right">-Rp{{ number_format($diskon, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Biaya Pengiriman</td>
                    <td align="right">Rp{{ number_format($biayaPengiriman, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Pajak (10%)</td>
                    <td align="right">Rp{{ number_format($pajak, 0, ',', '.') }}</td>
                </tr>
            </table>
            <div class="total-box">
                <span class="total-label">Total</span>
                <span class="total-amount">Rp{{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <div class="payment-section">
                <h3>Informasi Pembayaran</h3>
                <table class="payment-table">
                    <tr>
                        <td>Metode</td>
                        <td align="right">Transfer Bank</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pembayaran</td>
                        <td align="right">{{ $transaksi->updated_at->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
            <div class="thank-you">
                <div class="icon">✅</div>
                <h2>Terima Kasih!</h2>
                <p>Order Anda telah diterima</p>
            </div>
        </div>
        <div class="footer">
            <p>Butuh bantuan? Hubungi <a href="mailto:jogfood25@gmail.com"
                    style="color:#fff;text-decoration:underline;">jogfood25@gmail.com</a> | <a
                    href="https://wa.me/6282172394367" style="color:#fff;text-decoration:underline;">0821-7239-4367</a>
            </p>
            <p class="contact">© 2025 JogFood. Jl. Malioboro No. 123, Yogyakarta</p>
        </div>
    </div>
</body>

</html>