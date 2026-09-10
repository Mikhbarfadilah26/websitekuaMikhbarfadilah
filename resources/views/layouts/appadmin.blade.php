<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Panel')
    </title>

    {{-- =====================================================
         ADMINLTE CSS
    ====================================================== --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">

    {{-- =====================================================
         BOOTSTRAP ICONS
    ====================================================== --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- =====================================================
         GOOGLE FONT
    ====================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- =====================================================
         CSS TAMBAHAN
    ====================================================== --}}
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            font-size: 14px;
        }

        .app-sidebar {
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.08);
        }

        .app-sidebar .nav-link {
            margin: 3px 10px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .app-sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.10);
        }

        .app-sidebar .nav-link.active {
            font-weight: 600;
        }

        .app-main {
            background: #f5f7fb;
        }

        .app-content {
            padding-top: 20px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            border-bottom: 1px solid #eee;
            background: #fff;
        }

        .btn {
            border-radius: 7px;
        }

        .table {
            vertical-align: middle;
        }

        .badge {
            border-radius: 6px;
        }
    </style>

    @stack('styles')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">

        {{-- =================================================
             NAVBAR
        ================================================== --}}
        @include('layouts.admin.navbar')

        {{-- =================================================
             SIDEBAR
        ================================================== --}}
        @include('layouts.admin.sidebar')

        {{-- =================================================
             MAIN CONTENT
        ================================================== --}}
        <main class="app-main">

            {{-- HEADER / BREADCRUMB --}}
            <div class="app-content-header">
                <div class="container-fluid">

                    <div class="row">
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

            {{-- =================================================
                 CONTENT
            ================================================== --}}
            <div class="app-content">
                <div class="container-fluid">

                    {{-- ALERT SESSION --}}
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

        {{-- =================================================
             FOOTER
        ================================================== --}}
        @include('layouts.admin.footer')

    </div>

    {{-- =====================================================
         JAVASCRIPT
    ====================================================== --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>

    @stack('scripts')

</body>

</html>