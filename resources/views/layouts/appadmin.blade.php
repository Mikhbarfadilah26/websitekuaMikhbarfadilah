
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard Admin - KUA Karang Baru')
    </title>

    {{-- FAVICON --}}
    <link rel="icon"
        type="image/png"
        href="{{ asset('7.png') }}?v=2">

    <link rel="shortcut icon"
        href="{{ asset('7.png') }}?v=2">

    {{-- ADMINLTE CSS --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">

    {{-- BOOTSTRAP ICONS --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- =====================================================
         KUA ADMIN GREEN THEME
    ====================================================== --}}
<style>
        :root {
            --kua-green-dark: #285b46;
            --kua-green: #39765b;
            --kua-green-medium: #6c9b7d;
            --kua-green-soft: #eaf2ec;
            --kua-green-light: #f3f7f3;
            --kua-green-border: #dce8de;
            --kua-text: #34483c;
            --kua-muted: #7b8c80;
        }

        /* =====================================================
            GLOBAL
        ====================================================== */
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            font-size: 13.5px;
            color: var(--kua-text);
            background: var(--kua-green-light);
        }

        .app-wrapper {
            background: var(--kua-green-light);
        }

        /* =====================================================
            SIDEBAR PERFECTION ALIGNMENT
        ====================================================== */
        .kua-sidebar {
            background: var(--kua-green-dark) !important;
            border-right: 1px solid rgba(255,255,255,.06);
            box-shadow: 3px 0 15px rgba(35,75,53,.08) !important;
        }

        .kua-sidebar .sidebar-brand {
            background: var(--kua-green-dark);
            border-bottom: 1px solid rgba(255,255,255,.10);
            min-height: 65px;
        }

        .kua-sidebar .brand-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff !important;
            text-decoration: none;
            padding: 0 16px;
        }

        .kua-sidebar .brand-image {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .kua-sidebar .brand-text {
            color: #fff;
            font-size: 15px;
            letter-spacing: .5px;
        }

        /* SIDEBAR MENU NAVIGATION */
        .kua-sidebar .sidebar-menu {
            padding: 0 10px;
        }

        .kua-sidebar .nav-header {
            color: #b7d1be !important;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 18px 12px 6px 12px;
        }

        .kua-sidebar .nav-item {
            width: 100%;
        }

        .kua-sidebar .nav-link {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 3px 0;
            padding: 10px 12px;
            border-radius: 9px;
            color: #e1ede4 !important;
            transition: all .25s ease;
        }

        /* KUNCI UTAMA: Lebar ikon diseragamkan agar teks lurus vertikal */
        .kua-sidebar .nav-link .nav-icon {
            color: #c0d8c7;
            font-size: 16px;
            width: 24px;
            text-align: center;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .kua-sidebar .nav-link p {
            margin: 0 !important;
            font-size: 12.5px;
            font-weight: 400;
            line-height: 1.2;
            flex-grow: 1;
        }

        /* HOVER EFFECT */
        .kua-sidebar .nav-link:hover {
            background: rgba(255,255,255,.10) !important;
            color: #fff !important;
        }

        .kua-sidebar .nav-link:hover .nav-icon {
            color: #fff;
        }

        /* ACTIVE MENU */
        .kua-sidebar .nav-link.active {
            background: #e6f0e7 !important;
            color: var(--kua-green-dark) !important;
            font-weight: 600;
            box-shadow: 0 3px 8px rgba(0,0,0,.08);
        }

        .kua-sidebar .nav-link.active .nav-icon {
            color: var(--kua-green-dark) !important;
        }

        .kua-sidebar .nav-link.active p {
            font-weight: 600;
        }

        /* =====================================================
            NAVBAR, CONTENT, CARD, TABLE, DLL (Tetap)
        ====================================================== */
        .app-header {
            background: #ffffff !important;
            border-bottom: 1px solid var(--kua-green-border);
            box-shadow: 0 2px 10px rgba(40,91,70,.04);
        }
        .app-header .nav-link {
            color: var(--kua-green-dark) !important;
        }
        .app-main {
            background: var(--kua-green-light) !important;
            min-height: 100vh;
        }
        .app-content-header {
            padding-top: 22px;
            padding-bottom: 10px;
        }
        .app-content-header h3 {
            color: var(--kua-green-dark);
            font-size: 20px;
            font-weight: 600;
        }
        .breadcrumb {
            font-size: 12px;
        }
        .breadcrumb a {
            color: var(--kua-green);
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: var(--kua-muted);
        }
        .card {
            background: #fff;
            border: 1px solid #e8eee9;
            border-radius: 13px;
            box-shadow: 0 3px 14px rgba(40,91,70,.045);
            overflow: hidden;
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid var(--kua-green-border);
            padding: 15px 18px;
        }
        .card-header h3, .card-header h4, .card-header h5 {
            color: var(--kua-green-dark);
            font-weight: 600;
        }
        .card-body {
            padding: 18px;
        }
        .btn {
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 500;
            padding: 8px 14px;
            transition: all .2s ease;
        }
        .btn-primary {
            background: var(--kua-green);
            border-color: var(--kua-green);
            color: #fff;
        }
        .btn-primary:hover {
            background: var(--kua-green-dark);
            border-color: var(--kua-green-dark);
        }
        .table {
            vertical-align: middle;
            color: var(--kua-text);
            margin-bottom: 0;
        }
        .table thead th {
            background: #edf4ee;
            color: var(--kua-green-dark);
            font-size: 12px;
            font-weight: 600;
            border-bottom: 1px solid var(--kua-green-border);
            padding: 13px 12px;
            white-space: nowrap;
        }
        .table tbody td {
            padding: 12px;
            border-color: #edf1ed;
            font-size: 12.5px;
        }
        .form-label {
            color: var(--kua-green-dark);
            font-size: 12.5px;
            font-weight: 500;
        }
        .form-control, .form-select {
            border: 1px solid #dce7de;
            border-radius: 8px;
            font-size: 12.5px;
            padding: 9px 12px;
        }
        .badge {
            border-radius: 6px;
            font-size: 10.5px;
            font-weight: 500;
            padding: 6px 9px;
        }
        a {
            text-decoration: none;
        }
    </style>

    @stack('styles')

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">

        {{-- NAVBAR --}}
        @include('layouts.admin.navbar')

        {{-- SIDEBAR --}}
        @include('layouts.admin.sidebar')

        {{-- MAIN CONTENT --}}
        <main class="app-main">

            {{-- HEADER --}}
            <div class="app-content-header">

                <div class="container-fluid">

                    <div class="row align-items-center">

                        <div class="col-sm-6">

                            <h3 class="mb-0">
                                @yield('page-title', 'Dashboard')
                            </h3>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-end">

                                <li class="breadcrumb-item">
                                    <a href="{{ url('/admin') }}">
                                        Admin
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">
                                    @yield('breadcrumb', 'Dashboard')
                                </li>

                            </ol>

                        </div>

                    </div>

                </div>

            </div>

            {{-- CONTENT --}}
            <div class="app-content">

                <div class="container-fluid">

                    {{-- ALERT SUCCESS --}}
                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible fade show">

                            <i class="bi bi-check-circle me-2"></i>

                            {{ session('success') }}

                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                            </button>

                        </div>

                    @endif

                    {{-- ALERT ERROR --}}
                    @if(session('error'))

                        <div class="alert alert-danger alert-dismissible fade show">

                            <i class="bi bi-exclamation-circle me-2"></i>

                            {{ session('error') }}

                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                            </button>

                        </div>

                    @endif

                    @yield('content')

                </div>

            </div>

        </main>

        {{-- FOOTER --}}
        @include('layouts.admin.footer')

    </div>

    {{-- JAVASCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>

    @stack('scripts')

</body>

</html>
