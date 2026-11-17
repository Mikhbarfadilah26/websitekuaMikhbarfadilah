```blade
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
          href="{{ asset('foto/landing/7.png') }}">

    {{-- =====================================================
         BOOTSTRAP
    ====================================================== --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- =====================================================
         FONT AWESOME
    ====================================================== --}}

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- =====================================================
         GOOGLE FONT
    ====================================================== --}}

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
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
            background: #DCEEDC;
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
            background: #78A982;
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
            color: #4F8B62 !important;
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
            width: 100%;
            background: #343b45;
            color: #ffffff;
            margin-top: 0;
        }


        /* =====================================================
           FOOTER MAIN
        ===================================================== */

        .footer-main {
            padding: 35px 0 30px;
        }

        .footer-heading {
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
            text-transform: uppercase;
        }


        /* =====================================================
           MAP
        ===================================================== */

        .footer-map {
            width: 100%;
            height: 260px;
            overflow: hidden;
            background: #ffffff;
        }

        .footer-map iframe {
            width: 100%;
            height: 260px;
            display: block;
            border: 0;
        }


        /* =====================================================
           FANSPAGE
        ===================================================== */

        .fanspage-box {
            min-height: 260px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .fanspage-content > i {
            font-size: 45px;
            color: #ffffff;
            margin-bottom: 12px;
        }

        .fanspage-content h5 {
            color: #ffffff;
            font-size: 19px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .fanspage-content p {
            color: #d9dde2;
            font-size: 14px;
            margin-bottom: 15px;
        }


        /* =====================================================
           SOCIAL ICON
        ===================================================== */

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .social-icons a {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #ffffff;
            color: #343b45;
            text-decoration: none;
            transition: .3s ease;
        }

        .social-icons a:hover {
            background: #C8E3C5;
            color: #285C3A;
            transform: translateY(-3px);
        }


        /* =====================================================
           CONTACT
        ===================================================== */

        .contact-content {
            color: #ffffff;
            font-size: 14px;
            line-height: 1.6;
        }

        .contact-content p {
            margin-bottom: 8px;
        }

        .contact-title {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 8px !important;
        }

        .contact-content strong {
            font-weight: 700;
            color: #ffffff;
        }

        .wa-layanan {
            margin-top: 18px;
        }


        /* =====================================================
           CONTACT SOCIAL
        ===================================================== */

        .contact-social {
            display: flex;
            gap: 7px;
            margin-top: 18px;
        }

        .contact-social a {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #ffffff;
            color: #343b45;
            text-decoration: none;
            font-size: 15px;
            transition: .3s ease;
        }

        .contact-social a:hover {
            background: #C8E3C5;
            color: #285C3A;
            transform: translateY(-3px);
        }


        /* =====================================================
           FOOTER BOTTOM
        ===================================================== */

        .footer-bottom {
            background: #2c323a;
            padding: 16px 0;
        }

        .copyright {
            color: #ffffff;
            font-size: 13px;
            margin: 0;
        }

        .footer-line {
            border-color: #334155;
            margin: 40px 0 20px;
        }

        .footer-menu a:hover {
            color: #ffffff;
        }


        /* =====================================================
           FLOATING BUBBLE - LAYANAN ONLINE
           SOFT SAGE GREEN MODERN
        ===================================================== */

        .floating-bubble-container {
            z-index: 1050;
        }

        .floating-bubble-btn {

            position: relative;
            overflow: hidden;

            background: linear-gradient(
                135deg,
                #78A982 0%,
                #4F8B62 100%
            ) !important;

            border: 1px solid rgba(255,255,255,.35) !important;

            color: #ffffff !important;

            border-radius: 50px !important;

            box-shadow:
                0 8px 22px rgba(40,92,58,.22),
                0 3px 8px rgba(40,92,58,.12) !important;

            transition:
                transform .35s ease,
                box-shadow .35s ease,
                background .35s ease;

            animation: floatBubble 3s ease-in-out infinite;

        }


        /* EFEK CAHAYA HIGHLIGHT */

        .floating-bubble-btn::before {

            content: "";

            position: absolute;
            top: 0;
            left: -120%;

            width: 70%;
            height: 100%;

            background: linear-gradient(
                110deg,
                transparent,
                rgba(255,255,255,.28),
                transparent
            );

            transform: skewX(-20deg);

            transition: left .65s ease;

            pointer-events: none;

        }

        .floating-bubble-btn:hover::before {
            left: 150%;
        }


        /* EFEK HOVER */

        .floating-bubble-btn:hover {

            transform: translateY(-6px) scale(1.045);

            background: linear-gradient(
                135deg,
                #4F8B62 0%,
                #285C3A 100%
            ) !important;

            color: #ffffff !important;

            box-shadow:
                0 14px 30px rgba(40,92,58,.30),
                0 5px 12px rgba(40,92,58,.15) !important;

        }


        /* IKON KALENDER */

        .bubble-icon {

            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #EAF5E8;
            color: #285C3A;

            flex-shrink: 0;

            transition: transform .3s ease;

        }

        .floating-bubble-btn:hover .bubble-icon {
            transform: rotate(-8deg) scale(1.08);
        }


        /* TEKS */

        .floating-bubble-btn span {
            position: relative;
            z-index: 1;
        }


        /* ANIMASI MENGAMBANG */

        @keyframes floatBubble {

            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }

        }


        /* =====================================================
           RESPONSIVE TABLET
        ===================================================== */

        @media (max-width: 991px) {

            .footer-main {
                padding: 30px 0;
            }

            .footer-map,
            .footer-map iframe,
            .fanspage-box {
                height: 230px;
            }

        }


        /* =====================================================
           RESPONSIVE HP
        ===================================================== */

        @media (max-width: 767px) {

            .navbar {
                min-height: 65px;
            }

            .footer-main {
                padding: 30px 0;
            }

            .footer-map,
            .footer-map iframe {
                height: 220px;
            }

            .fanspage-box {
                min-height: 220px;
            }

            .footer-heading {
                margin-top: 10px;
            }

            .footer-bottom {
                text-align: center;
            }

            .footer-bottom .text-md-end {
                text-align: center !important;
                margin-top: 5px;
            }

        }


        /* =====================================================
           FLOATING BUBBLE RESPONSIVE
        ===================================================== */

        @media (max-width: 575px) {

            .floating-bubble-container {
                padding: 15px !important;
            }

            .floating-bubble-btn {
                padding: 10px 17px !important;
                font-size: 12px !important;
            }

            .floating-bubble-btn .bubble-icon {
                width: 31px;
                height: 31px;
            }

        }


        /* =====================================================
           AKSESIBILITAS
        ===================================================== */

        @media (prefers-reduced-motion: reduce) {

            .floating-bubble-btn {
                animation: none;
                transition: none;
            }

            .floating-bubble-btn::before {
                display: none;
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
         FLOATING BUBBLE - LAYANAN ONLINE
    ====================================================== --}}

    <div class="position-fixed bottom-0 end-0 p-4 floating-bubble-container">

        <a href="{{ route('landing.layanan') }}"
           class="btn btn-lg rounded-pill shadow-lg d-flex align-items-center gap-2 px-4 py-3 text-white fw-bold floating-bubble-btn">

            <div class="bubble-icon">

                <i class="fas fa-calendar-check"></i>

            </div>

            <span>Layanan Online</span>

            <i class="fas fa-arrow-right ms-1"
               style="font-size: 12px;"></i>

        </a>

    </div>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    @include('layouts.landing.footer')


    {{-- =====================================================
         BOOTSTRAP JS
    ====================================================== --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    {{-- =====================================================
         CUSTOM SCRIPT
    ====================================================== --}}

    @stack('scripts')


</body>

</html>
```