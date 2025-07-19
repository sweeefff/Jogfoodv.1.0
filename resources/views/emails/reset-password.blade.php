<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - {{ config('app.name') }}</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
</head>

<body
    style="margin: 0; padding: 0; background-color: #fff7ed; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #374151;">

    <!-- Email Wrapper -->
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
        style="background-color: #fff7ed;">
        <tr>
            <td style="padding: 40px 20px;">

                <!-- Main Container -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600"
                    style="margin: 0 auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); overflow: hidden;">

                    <!-- Header Section -->
                    <tr>
                        <td
                            style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); padding: 40px 30px; text-align: center;">
                            <!-- Logo/Avatar -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                style="margin: 0 auto 20px;">
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/icon/jogfood-shadow.png') }}"
                                        alt="Jogfood Logo">
                                        style="width: 300px; height: auto;">
                                    </td>
                                </tr>
                            </table>
                            <p style="margin: 0; color: #ffedd5; font-size: 14px;">
                                Reset Password Request
                            </p>
                        </td>
                    </tr>

                    <!-- Main Content -->
                    <tr>
                        <td style="padding: 40px 30px;">

                            <!-- Greeting -->
                            <h2 style="margin: 0 0 10px; font-size: 24px; font-weight: bold; color: #1f2937;">
                                Halo, {{ $user->username ?? 'Pengguna' }}!
                            </h2>
                            <p style="margin: 0 0 25px; color: #6b7280; font-size: 16px;">
                                Kami menerima permintaan untuk mengatur ulang password akun Anda.
                            </p>

                            <!-- Alert Info -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="margin-bottom: 30px; background-color: #fff7ed; border: 2px solid #fed7aa; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                            width="100%">
                                            <tr>
                                                <td style="width: 30px; vertical-align: top; padding-right: 15px;">
                                                    <div
                                                        style="width: 24px; height: 24px; background-color: #f97316; border-radius: 50%; position: relative;">
                                                        <span
                                                            style="color: white; font-size: 14px; font-weight: bold; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">!</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h3
                                                        style="margin: 0 0 8px; font-size: 16px; font-weight: 600; color: #9a3412;">
                                                        Penting!
                                                    </h3>
                                                    <p style="margin: 0; font-size: 14px; color: #9a3412;">
                                                        Jika Anda tidak meminta reset password, abaikan email ini.
                                                        Password Anda akan tetap aman.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Instructions -->
                            <p style="margin: 0 0 30px; color: #374151; font-size: 16px;">
                                Untuk melanjutkan proses reset password, silakan klik tombol di bawah ini:
                            </p>

                            <!-- Reset Button -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="margin-bottom: 30px;">
                                <tr>
                                    <td style="text-align: center;">
                                        <a href="{{ $resetLink ?? '#' }}"
                                            style="display: inline-block; background-color: #f97316; color: #ffffff; text-decoration: none; padding: 16px 40px; border-radius: 8px; font-weight: 600; font-size: 18px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); transition: all 0.2s;">
                                            Reset Password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Alternative Link -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="margin-bottom: 30px; background-color: #f9fafb; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <p style="margin: 0 0 10px; font-size: 14px; color: #6b7280;">
                                            Jika tombol di atas tidak berfungsi, salin dan tempel link berikut di
                                            browser Anda:
                                        </p>
                                        <div
                                            style="background-color: #ffffff; padding: 15px; border: 1px solid #e5e7eb; border-radius: 6px; word-break: break-all; font-family: 'Courier New', monospace; font-size: 14px; color: #c2410c;">
                                            {{ $resetLink ?? 'https://example.com/reset-password?token=xxx' }}
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Security Info -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="background-color: #fff7ed; border: 2px solid #fed7aa; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 25px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                            width="100%">
                                            <tr>
                                                <td style="width: 30px; vertical-align: top; padding-right: 15px;">
                                                    <div
                                                        style="width: 24px; height: 24px; background-color: #f97316; border-radius: 4px; position: relative;">
                                                        <span
                                                            style="color: white; font-size: 12px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">🔒</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h3
                                                        style="margin: 0 0 15px; font-size: 18px; font-weight: 600; color: #9a3412;">
                                                        Informasi Keamanan
                                                    </h3>
                                                    <ul
                                                        style="margin: 0; padding-left: 0; list-style: none; color: #c2410c;">
                                                        <li style="margin-bottom: 8px; font-size: 14px;">• Link reset
                                                            password ini berlaku selama
                                                            <strong>{{ $expiration ?? '60' }} menit</strong>
                                                        </li>
                                                        <li style="margin-bottom: 8px; font-size: 14px;">• Link hanya
                                                            dapat digunakan satu kali</li>
                                                        <li style="margin-bottom: 8px; font-size: 14px;">• Jangan
                                                            bagikan link ini kepada siapa pun</li>
                                                        <li style="margin-bottom: 0; font-size: 14px;">• Gunakan
                                                            password yang kuat dan unik</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color: #f9fafb; padding: 30px; border-top: 1px solid #e5e7eb; text-align: center;">
                            <p style="margin: 0 0 10px; font-size: 14px; color: #6b7280;">
                                Email ini dikirim secara otomatis, mohon jangan membalas email ini.
                            </p>
                            <p style="margin: 0 0 20px; font-size: 14px; color: #9ca3af;">
                                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                            </p>
                            <p style="margin: 0; font-size: 12px; color: #d1d5db;">
                                Butuh bantuan? Hubungi kami di
                                <a href="mailto:{{ config('mail.from.address', 'jogfood25@gmail.com') }}"
                                    style="color: #f97316; text-decoration: none;">
                                    {{ config('mail.from.address', 'support@example.com') }}
                                </a>
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>