{{-- =========================================================
     SIDEBAR MASYARAKAT
========================================================= --}}

<aside class="masyarakat-sidebar">

    <div class="sidebar-inner">

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
                    class="nav-link
                    {{ request()->routeIs('masyarakat.dashboard') ? 'active' : '' }}">

                    <i class="bi bi-speedometer2"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>


            {{-- PROFIL --}}
            <li class="nav-item">

                <a
                    href="#"
                    class="nav-link">

                    <i class="bi bi-person"></i>

                    <span>
                        Profil
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

    </div>

</aside>


{{-- =========================================================
     CSS SIDEBAR
========================================================= --}}

<style>

    /* =====================================================
       SIDEBAR
    ====================================================== */

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

    }


    /* =====================================================
       INNER
    ====================================================== */

    .sidebar-inner {

        padding: 25px 15px;

        min-height: 100%;

    }


    /* =====================================================
       PROFILE
    ====================================================== */

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

        font-size: 55px;

        color: #111827;

    }


    .sidebar-profile-name {

        font-size: 14px;

        font-weight: 600;

        color: #111827;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;

    }


    .sidebar-profile small {

        display: block;

        margin-top: 3px;

        color: #64748b;

        font-size: 12px;

    }


    /* =====================================================
       HR
    ====================================================== */

    .masyarakat-sidebar hr {

        margin: 15px 0;

        border: 0;

        border-top: 1px solid #e2e8f0;

        opacity: 1;

    }


    /* =====================================================
       SIDEBAR TITLE
    ====================================================== */

    .sidebar-title {

        margin-bottom: 8px;

        color: #64748b;

        font-size: 11px;

        font-weight: 500;

        letter-spacing: .3px;

        text-transform: uppercase;

    }


    /* =====================================================
       MENU
    ====================================================== */

    .sidebar-menu {

        gap: 4px;

    }


    .sidebar-menu .nav-item {

        width: 100%;

    }


    .sidebar-menu .nav-link {

        width: 100%;

        min-height: 42px;

        display: flex;

        align-items: center;

        gap: 11px;

        padding: 10px 13px;

        border-radius: 7px;

        color: #475569 !important;

        background: transparent;

        font-size: 13px;

        font-weight: 500;

        text-decoration: none;

        transition: all .2s ease;

    }


    /* ICON */

    .sidebar-menu .nav-link i {

        width: 20px;

        min-width: 20px;

        text-align: center;

        font-size: 16px;

        color: #64748b;

    }


    /* HOVER */

    .sidebar-menu .nav-link:hover {

        background: #f1f5f9;

        color: #0f172a !important;

    }


    .sidebar-menu .nav-link:hover i {

        color: #0f172a;

    }


    /* =====================================================
       ACTIVE
    ====================================================== */

    .sidebar-menu .nav-link.active {

        background: #0d6efd !important;

        color: #ffffff !important;

        box-shadow: 0 3px 8px rgba(13, 110, 253, .20);

    }


    .sidebar-menu .nav-link.active i {

        color: #ffffff !important;

    }


    /* =====================================================
       LOGOUT
    ====================================================== */

    .sidebar-menu form {

        width: 100%;

        margin: 0;

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


    /* =====================================================
       SCROLLBAR
    ====================================================== */

    .masyarakat-sidebar::-webkit-scrollbar {

        width: 5px;

    }


    .masyarakat-sidebar::-webkit-scrollbar-thumb {

        background: #cbd5e1;

        border-radius: 10px;

    }


    /* =====================================================
       MOBILE
    ====================================================== */

    @media (max-width: 767.98px) {

        .masyarakat-sidebar {

            position: relative !important;

            top: 0 !important;

            width: 100% !important;

            height: auto !important;

            border-right: none;

            border-bottom: 1px solid #e5e7eb;

        }

    }

</style>