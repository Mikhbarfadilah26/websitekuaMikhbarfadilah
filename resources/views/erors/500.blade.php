```blade
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>500 | Kesalahan Server - KUA Karang Baru</title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Google Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at top right,
                    rgba(37, 99, 235, .12),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #ffffff
                );

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-container {
            width: 100%;
            max-width: 700px;
            padding: 30px;
        }

        .error-card {
            background: rgba(255, 255, 255, .95);
            border: 1px solid #e2e8f0;
            border-radius: 30px;
            padding: 55px 40px;

            text-align: center;

            box-shadow:
                0 20px 60px rgba(15, 23, 42, .10);
        }

        .error-icon {
            width: 100px;
            height: 100px;

            margin: 0 auto 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #dbeafe;
            color: #2563eb;

            font-size: 42px;
        }

        .error-code {
            font-size: 90px;
            line-height: 1;

            font-weight: 800;

            color: #2563eb;

            margin-bottom: 15px;
        }

        .error-title {
            font-size: 28px;

            font-weight: 800;

            color: #0f172a;

            margin-bottom: 15px;
        }

        .error-description {
            color: #64748b;

            line-height: 1.8;

            max-width: 500px;

            margin: 0 auto 30px;
        }

        .btn-home {
            background: #2563eb;

            border: none;

            color: white;

            padding: 13px 25px;

            border-radius: 50px;

            font-weight: 600;

            transition: .3s;
        }

        .btn-home:hover {
            background: #1d4ed8;

            color: white;

            transform: translateY(-2px);
        }

        .btn-refresh {
            background: white;

            border: 1px solid #cbd5e1;

            color: #475569;

            padding: 13px 25px;

            border-radius: 50px;

            font-weight: 600;

            transition: .3s;
        }

        .btn-refresh:hover {
            background: #f8fafc;

            color: #2563eb;

            border-color: #2563eb;
        }

        .brand {
            margin-top: 30px;

            font-size: 14px;

            color: #64748b;
        }

        .brand strong {
            color: #2563eb;
        }

        @media (max-width: 576px) {

            .error-container {
                padding: 15px;
            }

            .error-card {
                padding: 40px 25px;
            }

            .error-code {
                font-size: 70px;
            }

            .error-title {
                font-size: 23px;
            }

            .btn-home,
            .btn-refresh {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="error-container">

        <div class="error-card">

            <div class="error-icon">
                <i class="fas fa-server"></i>
            </div>

            <div class="error-code">
                500
            </div>

            <h1 class="error-title">
                Terjadi Kesalahan Server
            </h1>

            <p class="error-description">
                Maaf, terjadi kesalahan pada server aplikasi.
                Silakan coba kembali beberapa saat lagi.
                Jika masalah terus terjadi, silakan hubungi administrator.
            </p>

            <div class="d-flex flex-wrap justify-content-center gap-2">

                <a href="{{ url('/') }}" class="btn btn-home">
                    <i class="fas fa-home me-2"></i>
                    Kembali ke Beranda
                </a>

                <button onclick="location.reload()" class="btn btn-refresh">
                    <i class="fas fa-rotate-right me-2"></i>
                    Muat Ulang
                </button>

            </div>

            <div class="brand">
                <i class="fas fa-mosque me-1"></i>
                <strong>KUA Karang Baru</strong>
                <br>
                Kantor Urusan Agama Kecamatan Karang Baru
            </div>

        </div>

    </div>

</body>

</html>
```
