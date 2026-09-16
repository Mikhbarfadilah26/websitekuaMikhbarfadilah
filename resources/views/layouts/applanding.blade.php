<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', config('app.name'))
    </title>

    {{-- FAVICON --}}
    <link rel="icon"
        type="image/png"
        href="{{ asset('7.png') }}">

    {{-- =====================================================
         BOOTSTRAP
    ====================================================== --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- =====================================================
         FONT AWESOME
    ====================================================== --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- =====================================================
         GOOGLE FONT
    ====================================================== --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- =====================================================
         GLOBAL STYLE
    ====================================================== --}}
    <style>
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            background: #f8fafc;
            color: #1e293b;
        }

        a {
            text-decoration: none;
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            min-height: 75px;
            background: #ffffff !important;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(15, 23, 42, .06);
        }

        .navbar-brand {
            font-size: 18px;
        }

        .navbar-brand small {
            font-size: 11px;
            font-weight: 500;
        }

        .logo-kua {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2563eb;
            color: #ffffff;
            border-radius: 12px;
            font-size: 20px;
        }

        .nav-link {
            color: #475569 !important;
            font-weight: 500;
            margin: 0 8px;
            transition: .2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #2563eb !important;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        main {
            min-height: 70vh;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .footer-section {
            background: #0f172a;
            color: #cbd5e1;
            padding: 70px 0 25px;
        }

        .footer-section .logo-kua {
            background: #2563eb;
        }

        .footer-title {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-text {
            line-height: 1.8;
        }

        .footer-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-menu li {
            margin-bottom: 12px;
        }

        .footer-menu a {
            color: #cbd5e1;
            transition: .2s;
        }

        .footer-menu a:hover {
            color: #ffffff;
        }

        .footer-line {
            border-color: #334155;
            margin: 40px 0 20px;
        }

        /* =====================================================
           FLOATING BUBBLE (LAYANAN ONLINE)
        ===================================================== */

        .floating-bubble-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: floatBubble 3s ease-in-out infinite;
        }

        .floating-bubble-btn:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 1rem 2rem rgba(37, 99, 235, 0.35) !important;
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%) !important;
        }

        @keyframes floatBubble {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .navbar {
                min-height: 65px;
            }

            .footer-section {
                padding: 50px 0 20px;
            }

        }
    </style>

    @stack('styles')

</head>


<body>

    {{-- =====================================================
         NAVBAR
    ====================================================== --}}

    @include('layouts.landing.navbar')


    {{-- =====================================================
         KONTEN HALAMAN
    ====================================================== --}}

    <main>

        @yield('content')

    </main>


    {{-- =====================================================
         FLOATING BUBBLE: LAYANAN ONLINE
    ====================================================== --}}
    <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 1050;">
        <a href="{{ route('landing.layanan') }}"
            class="btn btn-primary btn-lg rounded-pill shadow-lg d-flex align-items-center gap-2 px-4 py-3 text-white fw-bold floating-bubble-btn"
            style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border: none;">
            <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                <i class="fas fa-calendar-check fs-6"></i>
            </div>
            <span>Layanan Online</span>
        </a>
    </div>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    @include('layouts.landing.footer')


    {{-- =====================================================
         BOOTSTRAP JS
    ====================================================== --}}

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    {{-- =====================================================
         CUSTOM SCRIPT
    ====================================================== --}}

    @stack('scripts')

</body>

</html>