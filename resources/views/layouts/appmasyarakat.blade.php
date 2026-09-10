<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard Masyarakat')
    </title>

    {{-- =====================================================
         BOOTSTRAP
    ====================================================== --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- =====================================================
         BOOTSTRAP ICON
    ====================================================== --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- =====================================================
         GOOGLE FONT
    ====================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


    {{-- =====================================================
         CSS LAYOUT MASYARAKAT
    ====================================================== --}}
    <style>

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            background: #f5f7fb;
            color: #1f2937;
            font-size: 14px;
            overflow-x: hidden;
        }


        /* =====================================================
           NAVBAR
        ====================================================== */

        .masyarakat-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            z-index: 1050;
        }


        /* =====================================================
           SIDEBAR
        ====================================================== */

        .masyarakat-sidebar {
            position: fixed !important;

            top: 70px !important;
            left: 0 !important;

            width: 260px !important;
            height: calc(100vh - 70px) !important;

            z-index: 1040;

            overflow-y: auto;
            overflow-x: hidden;
        }


        /* =====================================================
           MAIN CONTENT
        ====================================================== */

        .masyarakat-main {
            display: block !important;

            margin-left: 260px !important;

            padding: 100px 30px 40px 30px;

            width: calc(100% - 260px) !important;

            min-height: 100vh;

            background: #f5f7fb;
        }


        /* =====================================================
           CONTAINER
        ====================================================== */

        .masyarakat-main .container-fluid {
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 0;
        }


        /* =====================================================
           PAGE HEADER
        ====================================================== */

        .masyarakat-main h3 {
            color: #111827;
            font-size: 28px;
        }


        /* =====================================================
           CARD
        ====================================================== */

        .content-card {
            border: none;
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .06);
        }

        .stat-card {
            border: none;
            border-radius: 14px;
            background: #ffffff;
            transition: .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }


        /* =====================================================
           ALERT
        ====================================================== */

        .alert {
            border-radius: 10px;
        }


        /* =====================================================
           BUTTON
        ====================================================== */

        .btn {
            border-radius: 8px;
        }


        /* =====================================================
           TABLE
        ====================================================== */

        .table {
            vertical-align: middle;
        }


        /* =====================================================
           BADGE
        ====================================================== */

        .badge {
            border-radius: 6px;
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .masyarakat-footer {
            margin-left: 260px !important;
        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 991.98px) {

            .masyarakat-sidebar {
                width: 230px !important;
            }

            .masyarakat-main {
                margin-left: 230px !important;
                width: calc(100% - 230px) !important;
                padding-left: 20px;
                padding-right: 20px;
            }

            .masyarakat-footer {
                margin-left: 230px !important;
            }

        }


        @media (max-width: 767.98px) {

            .masyarakat-sidebar {
                position: relative !important;

                top: 0 !important;

                width: 100% !important;

                height: auto !important;
            }

            .masyarakat-main {
                margin-left: 0 !important;

                width: 100% !important;

                padding: 90px 15px 30px 15px;
            }

            .masyarakat-footer {
                margin-left: 0 !important;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


{{-- =========================================================
     NAVBAR
========================================================= --}}

@include('layouts.masyarakat.navbar')


{{-- =========================================================
     SIDEBAR
========================================================= --}}

@include('layouts.masyarakat.sidebar')


{{-- =========================================================
     MAIN
========================================================= --}}

<main class="masyarakat-main">

    <div class="container-fluid">


        {{-- =================================================
             HEADER
        ================================================== --}}

        <div class="mb-4">

            <h3 class="fw-semibold mb-1">
                @yield('page-title', 'Dashboard')
            </h3>

            <small class="text-muted">
                @yield('breadcrumb', 'Dashboard')
            </small>

        </div>


        {{-- =================================================
             SUCCESS
        ================================================== --}}

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show mb-4">

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- =================================================
             ERROR
        ================================================== --}}

        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show mb-4">

                <i class="bi bi-exclamation-circle me-2"></i>

                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- =================================================
             VALIDATION ERROR
        ================================================== --}}

        @if($errors->any())

            <div class="alert alert-danger alert-dismissible fade show mb-4">

                <strong>
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Terjadi kesalahan
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- =================================================
             CONTENT
        ================================================== --}}

        @yield('content')


    </div>

</main>


{{-- =========================================================
     FOOTER
========================================================= --}}

@include('layouts.masyarakat.footer')


{{-- =========================================================
     BOOTSTRAP JS
========================================================= --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@stack('scripts')

</body>

</html>