<?php
/**
 * @var \App\Models\Transaksi $transaksi
 * @var \App\Models\Pembayaran $pembayaran
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran - JogFood</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <table cellspacing="0" cellpadding="0" border="0" width="600"
        style="margin:0 auto;background:#fff;border-radius:16px;box-shadow:0 10px 15px -3px rgba(0,0,0,0.08);overflow:hidden;">
        <!-- Header -->
        <tr>
            <td style="background:#ffedd5;padding:32px 24px;text-align:center;">
                <h1 style="color:#ea580c;font-size:22px;margin:0 0 8px;">Bukti Pembayaran</h1>
                <img src="{{ asset('assets/icon/jogfood-shadow.png') }}" alt="Jogfood Logo"
                style="height:48px;margin:8px auto 0;display:block;">
            </td>
        </tr>
        <!-- Ringkasan Order -->
        <tr>
            <td style="padding:32px 24px;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                    <div>
                        <h2 style="font-size:18px;font-weight:600;color:#1f2937;margin:0;">Ringkasan Order</h2>
                        <p style="font-size:14px;color:#6b7280;margin:4px 0 0;">
                            #{{ $transaksi->id_transaksi }}</p>
                    </div>
                    @if (isset($pembayaran) && $pembayaran->metode_pembayaran == 'cod')
                        <div
                            style="background:#fef08a;color:#a16207;font-size:12px;font-weight:600;padding:6px 18px;border-radius:999px;">
                            Pending
                        </div>
                    @else
                        <div
                            style="background:#dcfce7;color:#166534;font-size:12px;font-weight:600;padding:6px 18px;border-radius:999px;">
                            Selesai
                        </div>
                    @endif
                </div>
                <!-- Detail Order -->
                <table width="100%" style="font-size:14px;color:#6b7280;margin-bottom:18px;">
                    <thead>
                        <tr>
                            <th align="left">Info</th>
                            <th align="right">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding:4px 0;">Tanggal Order</td>
                            <td style="text-align:right;padding:4px 0;font-weight:500;color:#374151;">
                                {{ $transaksi->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:4px 0;">Alamat</td>
                            <td style="text-align:right;padding:4px 0;font-weight:500;color:#374151;">
                                {{ $transaksi->alamat ?? '-' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Item Dipesan -->
                <h3 style="font-size:15px;font-weight:600;color:#374151;margin:18px 0 10px;">Item yang Dipesan
                </h3>
                <table width="100%" style="font-size:14px;color:#6b7280;margin-bottom:18px;">
                    <thead>
                        <tr>
                            <th align="left">Menu</th>
                            <th align="center">Qty</th>
                            <th align="right">Harga</th>
                            <th align="right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi->detail_transaksi as $detail)
                            <tr>
                                <td style="font-weight:600;color:#1f2937;">{{ $detail->menu->nama }}</td>
                                <td align="center">{{ $detail->jumlah }}</td>
                                <td align="right">Rp{{ number_format($detail->menu->harga, 0, ',', '.') }}</td>
                                <td align="right" style="font-weight:600;color:#ea580c;">
                                    Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="height:1px;background:#f3f4f6;margin:18px 0;"></div>
                <!-- Perhitungan Total -->
                @php
                    $subtotal = $transaksi->detail_transaksi->sum('subtotal');
                    $pajak = isset($pajak) ? $pajak : round($subtotal * 0.1);
                    $biaya_pengiriman = isset($biaya_pengiriman) ? $biaya_pengiriman : 10000;
                @endphp

                <table width="100%" style="font-size:14px;color:#6b7280;">
                    <thead>
                        <tr>
                            <th align="left">Rincian</th>
                            <th align="right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td align="right">Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Biaya Pengiriman</td>
                            <td align="right">Rp{{ number_format($biaya_pengiriman, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Pajak</td>
                            <td align="right">Rp{{ number_format($pajak, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div
                    style="background:#ffedd5;border-radius:10px;padding:16px 18px;margin:18px 0 0;display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-weight:700;font-size:16px;color:#1f2937;">Total</span>
                    <span style="font-weight:700;font-size:18px;color:#ea580c;">
                        Rp{{ number_format($transaksi->total_harga ?? 0, 0, ',', '.') }}
                    </span>
                </div>
                <!-- Informasi Pembayaran -->
                <div style="margin-top:24px;">
                    <h3 style="font-size:15px;font-weight:600;color:#374151;margin-bottom:10px;">Informasi Pembayaran
                    </h3>
                    <table width="100%"
                        style="font-size:14px;color:#6b7280;background:#f9fafb;border-radius:8px;padding:12px 0;">
                        <thead>
                            <tr>
                                <th align="left">Info</th>
                                <th align="right">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Metode</td>
                                <td align="right" style="font-weight:500;color:#374151;">
                                    {{ $pembayaran->metode_pembayaran ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Pembayaran</td>
                                <td align="right" style="font-weight:500;color:#374151;">
                                    {{ isset($pembayaran) && $pembayaran && $pembayaran->updated_at ? $pembayaran->updated_at->format('d M Y, H:i') : 'Belum dibayar' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Terima Kasih -->
                <div style="text-align:center;margin:32px 0 0;">
                    <div style="font-size:32px;">✅</div>
                    <h2 style="font-size:18px;font-weight:700;color:#1f2937;margin:8px 0 4px;">Terima Kasih!
                    </h2>
                    <p style="color:#6b7280;font-size:14px;">Order Anda telah diterima</p>
                </div>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td style="background:#ea580c;padding:18px 0;text-align:center;">
                <p style="color:#ffedd5;font-size:14px;margin:0;">Butuh bantuan? Hubungi <a
                        href="mailto:jogfood25@gmail.com"
                        style="color:#fff;text-decoration:underline;">jogfood25@gmail.com</a> | <a
                        href="https://wa.me/6282172394367"
                        style="color:#fff;text-decoration:underline;">0821-7239-4367</a></p>
                <p style="color:#fdba74;font-size:13px;margin:4px 0 0;">© 2025 JogFood. Jl. Malioboro No. 123,
                    Yogyakarta</p>
            </td>
        </tr>
    </table>
</body>

</html>