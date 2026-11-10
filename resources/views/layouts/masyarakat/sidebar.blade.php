{{-- =========================================================
     SIDEBAR MASYARAKAT
========================================================= --}}

<aside class="masyarakat-sidebar" id="masyarakatSidebar">

    <div class="sidebar-inner">

        {{-- =================================================
             MOBILE HEADER
        ================================================== --}}
        <div class="sidebar-mobile-header">

            <span>MENU</span>

            <button
                type="button"
                class="sidebar-close-btn"
                id="sidebarCloseBtn"
                aria-label="Tutup menu">

                <i class="bi bi-x-lg"></i>

            </button>

        </div>


        {{-- =================================================
             PROFILE / BRAND
        ================================================== --}}
        <div class="sidebar-profile text-center">

            <div class="sidebar-profile-icon">
                <i class="bi bi-person-circle"></i>
            </div>

            <div class="sidebar-profile-name">
                {{ auth()->user()->nama ?? 'Masyarakat KUA' }}
            </div>

            <small>
                Masyarakat
            </small>

        </div>


        <hr>


        {{-- =================================================
             MENU UTAMA
        ================================================== --}}
        <div class="sidebar-title">
            MENU UTAMA
        </div>


        <ul class="nav flex-column sidebar-menu">

            {{-- DASHBOARD --}}
            <li class="nav-item">

                <a
                    href="{{ route('masyarakat.dashboard') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.dashboard') ? 'active' : '' }}">

                    <i class="bi bi-speedometer2"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>


            {{-- PENGAJUAN --}}
            <li class="nav-item">

                <a
                    href="#"
                    class="nav-link">

                    <i class="bi bi-file-earmark-text"></i>

                    <span>
                        Pengajuan
                    </span>

                </a>

            </li>


            {{-- BERITA --}}
            <li class="nav-item">

                <a
                    href="{{ route('masyarakat.berita') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.berita*') ? 'active' : '' }}">

                    <i class="bi bi-newspaper"></i>

                    <span>
                        Berita
                    </span>

                </a>

            </li>


            {{-- RIWAYAT --}}
            <li class="nav-item">

                <a
                    href="#"
                    class="nav-link">

                    <i class="bi bi-clock-history"></i>

                    <span>
                        Riwayat
                    </span>

                </a>

            </li>


            {{-- PROFIL --}}
            <li class="nav-item">

                <a
                    href="{{ route('masyarakat.profil') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.profil') ? 'active' : '' }}">

                    <i class="bi bi-person"></i>

                    <span>
                        Profil
                    </span>

                </a>

            </li>

        </ul>


        {{-- =================================================
             SISTEM
        ================================================== --}}
        <hr class="sidebar-divider">


        <div class="sidebar-title">
            SISTEM
        </div>


        <ul class="nav flex-column sidebar-menu">

            {{-- LOGOUT --}}
            <li class="nav-item">

                <form
                    action="{{ route('logout') }}"
                    method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="nav-link sidebar-logout">

                        <i class="bi bi-box-arrow-right"></i>

                        <span>
                            Logout
                        </span>

                    </button>

                </form>

            </li>

        </ul>


        {{-- =================================================
             FOOTER SIDEBAR
        ================================================== --}}
        <div class="sidebar-footer">

            <i class="bi bi-building"></i>

            KUA Kecamatan Karang Baru

        </div>

    </div>

</aside>


{{-- =========================================================
     OVERLAY MOBILE
========================================================= --}}

<div
    class="sidebar-overlay"
    id="sidebarOverlay">
</div>


{{-- =========================================================
     CSS SIDEBAR
========================================================= --}}

<style>

    /* =========================================================
       SIDEBAR DESKTOP
    ========================================================= */

    .masyarakat-sidebar {
        position: fixed !important;

        top: 70px !important;
        left: 0 !important;

        width: 260px !important;
        height: calc(100vh - 70px) !important;

        background: #ffffff !important;

        border-right: 1px solid #e5e7eb;

        z-index: 1040;

        overflow-y: auto;
        overflow-x: hidden;

        transition:
            transform .3s ease,
            box-shadow .3s ease;
    }


    /* =========================================================
       INNER
    ========================================================= */

    .sidebar-inner {
        min-height: 100%;
        padding: 22px 15px;
    }


    /* =========================================================
       MOBILE HEADER
    ========================================================= */

    .sidebar-mobile-header {
        display: none;
    }


    /* =========================================================
       PROFILE
    ========================================================= */

    .sidebar-profile {
        padding: 0 10px 20px;
    }


    .sidebar-profile-icon {
        width: 60px;
        height: 60px;

        margin: 0 auto 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #0d6efd;

        font-size: 55px;
    }


    .sidebar-profile-name {
        color: #111827;

        font-size: 14px;
        font-weight: 700;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    .sidebar-profile small {
        display: block;

        margin-top: 4px;

        color: #64748b;

        font-size: 12px;
    }


    /* =========================================================
       HR
    ========================================================= */

    .masyarakat-sidebar hr {
        margin: 15px 0;

        border: 0;
        border-top: 1px solid #e2e8f0;

        opacity: 1;
    }


    /* =========================================================
       SIDEBAR TITLE
    ========================================================= */

    .sidebar-title {
        margin-bottom: 8px;
        padding-left: 4px;

        color: #64748b;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .7px;

        text-transform: uppercase;
    }


    /* =========================================================
       MENU
    ========================================================= */

    .sidebar-menu {
        gap: 4px;
        padding: 0;
        margin: 0;

        list-style: none;
    }


    .sidebar-menu .nav-item {
        width: 100%;
        margin: 0;
        padding: 0;
    }


    .sidebar-menu .nav-link {
        width: 100%;
        min-height: 44px;

        display: flex;
        align-items: center;

        gap: 11px;

        padding: 10px 13px;

        border-radius: 9px;

        background: transparent;

        color: #475569 !important;

        font-size: 13px;
        font-weight: 500;

        text-decoration: none;

        transition: all .2s ease;
    }


    /* =========================================================
       ICON
    ========================================================= */

    .sidebar-menu .nav-link i {
        width: 20px;
        min-width: 20px;

        text-align: center;

        color: #64748b;

        font-size: 17px;
    }


    /* =========================================================
       HOVER
    ========================================================= */

    .sidebar-menu .nav-link:hover {
        background: #f1f5f9;
        color: #0f172a !important;
    }


    .sidebar-menu .nav-link:hover i {
        color: #0f172a;
    }


    /* =========================================================
       ACTIVE
    ========================================================= */

    .sidebar-menu .nav-link.active {
        background: #0d6efd !important;

        color: #ffffff !important;

        box-shadow:
            0 4px 10px rgba(13, 110, 253, .20);
    }


    .sidebar-menu .nav-link.active i {
        color: #ffffff !important;
    }


    /* =========================================================
       LOGOUT
    ========================================================= */

    .sidebar-menu form {
        width: 100%;
        margin: 0;
        padding: 0;
    }


    .sidebar-menu .sidebar-logout {
        border: none;
        outline: none;

        cursor: pointer;

        text-align: left;
    }


    .sidebar-menu .sidebar-logout:hover {
        background: #fef2f2;

        color: #dc2626 !important;
    }


    .sidebar-menu .sidebar-logout:hover i {
        color: #dc2626;
    }


    /* =========================================================
       FOOTER SIDEBAR
    ========================================================= */

    .sidebar-footer {
        margin-top: 35px;
        padding: 12px;

        border-radius: 10px;

        background: #f8fafc;

        color: #64748b;

        text-align: center;

        font-size: 10px;

        line-height: 1.5;
    }


    .sidebar-footer i {
        margin-right: 4px;

        color: #0d6efd;
    }


    /* =========================================================
       SCROLLBAR
    ========================================================= */

    .masyarakat-sidebar::-webkit-scrollbar {
        width: 5px;
    }


    .masyarakat-sidebar::-webkit-scrollbar-track {
        background: transparent;
    }


    .masyarakat-sidebar::-webkit-scrollbar-thumb {
        background: #cbd5e1;

        border-radius: 10px;
    }


    /* =========================================================
       OVERLAY
    ========================================================= */

    .sidebar-overlay {
        display: none;

        position: fixed;

        inset: 0;

        background: rgba(15, 23, 42, .55);

        z-index: 1035;

        opacity: 0;

        transition: opacity .3s ease;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767.98px) {

        .masyarakat-sidebar {
            top: 0 !important;
            left: 0 !important;

            width: 280px !important;
            max-width: 85vw;

            height: 100vh !important;

            z-index: 1060;

            transform: translateX(-100%);

            box-shadow: none;
        }


        .masyarakat-sidebar.show {
            transform: translateX(0);

            box-shadow:
                8px 0 30px rgba(0, 0, 0, .15);
        }


        .sidebar-inner {
            padding: 18px 15px 25px;
        }


        /* =====================================================
           MOBILE HEADER
        ===================================================== */

        .sidebar-mobile-header {
            display: flex;

            align-items: center;
            justify-content: space-between;

            height: 42px;

            margin-bottom: 10px;
            padding: 0 3px;

            color: #172033;

            font-size: 12px;
            font-weight: 800;

            letter-spacing: .5px;
        }


        .sidebar-close-btn {
            width: 36px;
            height: 36px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: none;
            border-radius: 9px;

            background: #f1f5f9;

            color: #475569;

            font-size: 16px;

            cursor: pointer;
        }


        .sidebar-close-btn:hover {
            background: #fee2e2;
            color: #dc2626;
        }


        /* =====================================================
           MOBILE PROFILE
        ===================================================== */

        .sidebar-profile {
            padding-bottom: 15px;
        }


        .sidebar-profile-icon {
            width: 52px;
            height: 52px;

            font-size: 48px;
        }


        /* =====================================================
           MOBILE MENU
        ===================================================== */

        .sidebar-menu .nav-link {
            min-height: 48px;

            padding: 11px 14px;

            font-size: 14px;
        }


        .sidebar-menu .nav-link i {
            font-size: 18px;
        }


        /* =====================================================
           MOBILE OVERLAY
        ===================================================== */

        .sidebar-overlay {
            display: block;

            pointer-events: none;
        }


        .sidebar-overlay.show {
            opacity: 1;

            pointer-events: auto;
        }

    }

</style>


{{-- =========================================================
     JAVASCRIPT SIDEBAR MOBILE
========================================================= --}}

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const sidebar =
            document.getElementById('masyarakatSidebar');

        const overlay =
            document.getElementById('sidebarOverlay');

        const closeButton =
            document.getElementById('sidebarCloseBtn');


        /* =====================================================
           BUKA SIDEBAR
        ===================================================== */

        window.openMasyarakatSidebar = function () {

            if (!sidebar || !overlay) {
                return;
            }

            sidebar.classList.add('show');

            overlay.classList.add('show');

            document.body.classList.add('sidebar-open');

        };


        /* =====================================================
           TUTUP SIDEBAR
        ===================================================== */

        window.closeMasyarakatSidebar = function () {

            if (!sidebar || !overlay) {
                return;
            }

            sidebar.classList.remove('show');

            overlay.classList.remove('show');

            document.body.classList.remove('sidebar-open');

        };


        /* =====================================================
           TOMBOL X
        ===================================================== */

        if (closeButton) {

            closeButton.addEventListener(
                'click',
                window.closeMasyarakatSidebar
            );

        }


        /* =====================================================
           KLIK OVERLAY
        ===================================================== */

        if (overlay) {

            overlay.addEventListener(
                'click',
                window.closeMasyarakatSidebar
            );

        }


        /* =====================================================
           KLIK MENU
        ===================================================== */

        if (sidebar) {

            const sidebarLinks =
                sidebar.querySelectorAll(
                    '.sidebar-menu .nav-link'
                );


            sidebarLinks.forEach(function (link) {

                link.addEventListener(
                    'click',
                    function () {

                        if (window.innerWidth <= 767) {

                            window.closeMasyarakatSidebar();

                        }

                    }
                );

            });

        }


        /* =====================================================
           TOMBOL ESC
        ===================================================== */

        document.addEventListener(
            'keydown',
            function (event) {

                if (event.key === 'Escape') {

                    window.closeMasyarakatSidebar();

                }

            }
        );


        /* =====================================================
           RESET KETIKA DESKTOP
        ===================================================== */

        window.addEventListener(
            'resize',
            function () {

                if (window.innerWidth > 767) {

                    window.closeMasyarakatSidebar();

                }

            }
        );

    });

</script>


{{-- =========================================================
     BODY LOCK SAAT SIDEBAR MOBILE TERBUKA
========================================================= --}}

<style>

    body.sidebar-open {
        overflow: hidden;
    }

</style>