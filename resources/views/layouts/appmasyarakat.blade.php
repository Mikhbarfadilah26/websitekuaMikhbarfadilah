
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Masyarakat')</title>

    <link rel="icon" type="image/png" href="{{ asset('7.png') }}?v=2">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-mini: 78px;
            --navbar-height: 72px;

            --blue: #2563eb;
            --blue-dark: #1d4ed8;
            --blue-soft: #eaf2ff;
            --blue-hover: #dceaff;

            --sidebar-bg: #f0f6ff;
            --sidebar-border: #dce8f8;

            --body-bg: #f4f7fc;
            --text-main: #1e293b;
            --text-muted: #718096;
        }

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html, body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            width: 100%;
        }

        body {
            background: var(--body-bg);
            color: var(--text-main);
            font-size: 14px;
            overflow-x: hidden;
        }

        /* ==============================
           SIDEBAR
        ============================== */

        .masyarakat-sidebar {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;

            width: var(--sidebar-width) !important;
            height: 100vh !important;

            background: var(--sidebar-bg) !important;
            border-right: 1px solid var(--sidebar-border);

            z-index: 1040;
            overflow-y: auto;
            overflow-x: hidden;

            transition: width .25s ease, transform .25s ease;
        }

        /* ==============================
           NAVBAR
        ============================== */

        .masyarakat-navbar {
            position: fixed !important;
            top: 0 !important;
            left: var(--sidebar-width) !important;
            right: 0 !important;

            height: var(--navbar-height) !important;

            z-index: 1050;
            transition: left .25s ease;
        }

        /* ==============================
           MAIN CONTENT
        ============================== */

        .masyarakat-main {
            margin-left: var(--sidebar-width) !important;
            width: calc(100% - var(--sidebar-width)) !important;

            min-height: 100vh;

            padding: calc(var(--navbar-height) + 28px) 30px 40px;

            transition: margin-left .25s ease, width .25s ease;

            background: var(--body-bg);
        }

        .masyarakat-main .container-fluid {
            width: 100%;
            max-width: none;
            padding: 0;
            margin: 0;
        }

        .masyarakat-main h3 {
            color: #172033;
            font-size: 27px;
            font-weight: 700;
        }

        /* ==============================
           COLLAPSED DESKTOP
        ============================== */

        body.sidebar-collapsed {
            --sidebar-width: var(--sidebar-mini);
        }

        body.sidebar-collapsed .sidebar-profile {
            padding-left: 0;
            padding-right: 0;
        }

        body.sidebar-collapsed .sidebar-profile-name,
        body.sidebar-collapsed .sidebar-profile small,
        body.sidebar-collapsed .sidebar-title,
        body.sidebar-collapsed .sidebar-menu .nav-link span,
        body.sidebar-collapsed .sidebar-footer,
        body.sidebar-collapsed .sidebar-divider {
            display: none !important;
        }

        body.sidebar-collapsed .sidebar-profile-icon {
            margin: 0 auto;
        }

        body.sidebar-collapsed .sidebar-menu .nav-link {
            justify-content: center;
            padding: 12px 5px;
        }

        body.sidebar-collapsed .sidebar-menu .nav-link i {
            margin: 0;
            font-size: 20px;
        }

        body.sidebar-collapsed .sidebar-inner {
            padding: 20px 10px;
        }

        body.sidebar-collapsed .sidebar-menu form {
            width: 100%;
        }

        /* ==============================
           CARD
        ============================== */

        .content-card {
            background: #fff;
            border: 1px solid #e9eef6;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(30, 64, 120, .04);
        }

        .stat-card {
            border: none;
            border-radius: 15px;
            background: #fff;
            transition: .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        /* ==============================
           ALERT
        ============================== */

        .alert {
            border-radius: 11px;
        }

        /* ==============================
           BUTTON
        ============================== */

        .btn {
            border-radius: 9px;
        }

        /* ==============================
           TABLE
        ============================== */

        .table {
            vertical-align: middle;
        }

        /* ==============================
           BADGE
        ============================== */

        .badge {
            border-radius: 7px;
        }

        /* ==============================
           FOOTER
        ============================== */

        .masyarakat-footer {
            margin-left: var(--sidebar-width) !important;
            transition: margin-left .25s ease;
        }

        /* ==============================
           OVERLAY
        ============================== */

        .sidebar-overlay {
            display: none;
        }

        /* ==============================
           RESPONSIVE TABLET
        ============================== */

        @media (max-width: 991.98px) {
            .masyarakat-main {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        /* ==============================
           MOBILE
        ============================== */

        @media (max-width: 767.98px) {

            .masyarakat-sidebar {
                top: 0 !important;
                left: 0 !important;

                width: 280px !important;
                max-width: 85vw;
                height: 100vh !important;

                transform: translateX(-100%);
                z-index: 1060;

                box-shadow: none;
            }

            .masyarakat-sidebar.show {
                transform: translateX(0);
                box-shadow: 8px 0 30px rgba(15, 23, 42, .15);
            }

            .masyarakat-navbar {
                left: 0 !important;
            }

            .masyarakat-main {
                margin-left: 0 !important;
                width: 100% !important;

                padding: 92px 15px 30px;
            }

            .masyarakat-footer {
                margin-left: 0 !important;
            }

            /* Sidebar tidak ikut mini saat mobile */
            body.sidebar-collapsed {
                --sidebar-width: 0px;
            }

            body.sidebar-collapsed .sidebar-profile-name,
            body.sidebar-collapsed .sidebar-profile small,
            body.sidebar-collapsed .sidebar-title,
            body.sidebar-collapsed .sidebar-menu .nav-link span,
            body.sidebar-collapsed .sidebar-footer,
            body.sidebar-collapsed .sidebar-divider {
                display: block !important;
            }

            body.sidebar-collapsed .sidebar-menu .nav-link {
                justify-content: flex-start;
                padding: 11px 14px;
            }

            body.sidebar-collapsed .sidebar-profile-icon {
                margin: 0 auto 10px;
            }

            body.sidebar-collapsed .sidebar-inner {
                padding: 18px 15px 25px;
            }

            .sidebar-overlay {
                display: block;
                position: fixed;
                inset: 0;

                background: rgba(15, 23, 42, .48);
                z-index: 1055;

                opacity: 0;
                pointer-events: none;
                transition: opacity .25s ease;
            }

            .sidebar-overlay.show {
                opacity: 1;
                pointer-events: auto;
            }

            body.sidebar-open {
                overflow: hidden;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    @include('layouts.masyarakat.navbar')

    {{-- SIDEBAR --}}
    @include('layouts.masyarakat.sidebar')

    {{-- OVERLAY MOBILE --}}
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- MAIN CONTENT --}}
    <main class="masyarakat-main">
        <div class="container-fluid">

            {{-- HEADER --}}
            <div class="mb-4">
                <h3 class="fw-semibold mb-1">
                    @yield('page-title', 'Dashboard')
                </h3>

                <small class="text-muted">
                    @yield('breadcrumb', 'Dashboard')
                </small>
            </div>

            {{-- SUCCESS --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ERROR --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- VALIDATION ERROR --}}
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4">

                    <strong>
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Terjadi kesalahan
                    </strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- CONTENT --}}
            @yield('content')

        </div>
    </main>

    {{-- FOOTER --}}
    @include('layouts.masyarakat.footer')

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- SIDEBAR CONTROL --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const sidebar = document.getElementById('masyarakatSidebar');
            const overlay = document.getElementById('sidebarOverlay');

            window.toggleMasyarakatSidebar = function () {

                if (window.innerWidth <= 767) {
                    sidebar.classList.toggle('show');
                    overlay.classList.toggle('show');
                    document.body.classList.toggle('sidebar-open');
                } else {
                    document.body.classList.toggle('sidebar-collapsed');
                }
            };

            window.openMasyarakatSidebar = function () {
                if (window.innerWidth <= 767) {
                    sidebar.classList.add('show');
                    overlay.classList.add('show');
                    document.body.classList.add('sidebar-open');
                }
            };

            window.closeMasyarakatSidebar = function () {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                document.body.classList.remove('sidebar-open');
            };

            if (overlay) {
                overlay.addEventListener('click', closeMasyarakatSidebar);
            }

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    closeMasyarakatSidebar();
                }
            });

            sidebar.querySelectorAll('.sidebar-menu a').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 767) {
                        closeMasyarakatSidebar();
                    }
                });
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth > 767) {
                    closeMasyarakatSidebar();
                    document.body.classList.remove('sidebar-collapsed');
                }
            });

        });
    </script>

    @stack('scripts')

</body>
</html>
