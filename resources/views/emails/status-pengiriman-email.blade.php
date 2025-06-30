<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengiriman - JogFood</title>
    <style>
        body {
            background: #fffbeb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 32px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .header {
            background: #f59e0b;
            color: #fff;
            text-align: center;
            padding: 32px 24px 16px 24px;
        }

        .header img {
            height: 48px;
            margin-bottom: 8px;
        }

        .content {
            padding: 32px 24px;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 18px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .status-dikirim {
            background: #fef08a;
            color: #a16207;
        }

        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .status-gagal,
        .status-dibatalkan {
            background: #fee2e2;
            color: #b91c1c;
        }

        .footer {
            background: #ea580c;
            color: #ffedd5;
            text-align: center;
            padding: 18px 0;
            font-size: 14px;
        }

        .footer a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/icon/jogfood-shadow.png') }}" alt="Jogfood Logo">
            <h1>Status Pengiriman Pesanan Anda</h1>
        </div>
        <div class="content">
            <div class="status-badge status-{{ $status_pengiriman }}">
                {{ ucfirst($status_pengiriman) }}
            </div>
            <p style="font-size:16px;color:#374151;margin-bottom:18px;">
                Halo <b>{{ $user->name }}</b>,<br>
                Status pengiriman pesanan <b>#{{ $transaksi->id_transaksi }}</b> telah diperbarui menjadi:
                <b>{{ ucfirst($status_pengiriman) }}</b>.
            </p>
            <table width="100%" style="font-size:14px;color:#6b7280;margin-bottom:18px;">
                <tr>
                    <td>Tanggal Update</td>
                    <td align="right" style="color:#374151;font-weight:500;">
                        {{ \Carbon\Carbon::parse($transaksi->updated_at)->format('d M Y, H:i') }}
                    </td>
                </tr>
                <tr>
                    <td>Alamat Pengiriman</td>
                    <td align="right" style="color:#374151;">{{ $transaksi->user->alamat ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kurir</td>
                    <td align="right" style="color:#374151;">
                        {{ $transaksi->status_pengiriman->kurir->name ?? '-' }}
                    </td>
                </tr>
            </table>
            @if(!empty($alasan))
                <div style="background:#fee2e2;color:#b91c1c;padding:12px 16px;border-radius:8px;margin-bottom:18px;">
                    <b>Catatan Kurir:</b> {{ $alasan }}
                </div>
            @endif
            <div style="margin:24px 0 0 0;">
                <a href="{{ url('/user/riwayat') }}"
                    style="display:inline-block;padding:12px 28px;background:#f59e0b;color:#fff;border-radius:8px;text-decoration:none;font-weight:600;">Lihat
                    Riwayat Pesanan</a>
            </div>
        </div>
        <div class="footer">
            <p>Butuh bantuan? Hubungi <a href="mailto:jogfood25@gmail.com">jogfood25@gmail.com</a> | <a
                    href="https://wa.me/6282172394367">0821-7239-4367</a></p>
            <p style="color:#fdba74;font-size:13px;margin:4px 0 0;">© 2025 JogFood. Jl. Malioboro No. 123, Yogyakarta
            </p>
        </div>
    </div>
</body>

</html>