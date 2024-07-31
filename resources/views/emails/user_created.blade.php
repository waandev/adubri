<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di BRITA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0056b3;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
        }

        .important {
            color: #d9534f;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Halo {{ $user->name }},</h1>
        <p>Kami dengan senang hati menginformasikan bahwa akun Anda telah berhasil dibuat. Berikut adalah detail login
            Anda:</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Password:</strong> {{ $password }}</p>

        <p class="important">Untuk alasan keamanan, kami sangat menyarankan Anda untuk segera mengganti kata sandi
            setelah masuk ke akun Anda. Ini akan membantu memastikan keamanan akun dan informasi pribadi Anda.</p>

        <p>Jika Anda memiliki pertanyaan atau memerlukan bantuan, jangan ragu untuk menghubungi admin.</p>

        <p>Salam hormat,<br>Admin BRITA</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Bank Rakyat Indonesia. Semua hak cipta dilindungi.</p>
    </div>
</body>

</html>
