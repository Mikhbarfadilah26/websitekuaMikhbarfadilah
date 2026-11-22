{{-- =========================================================
     SIDEBAR MASYARAKAT
========================================================= --}}

<aside class="masyarakat-sidebar" id="masyarakatSidebar">

    <div class="sidebar-inner">

        {{-- HEADER SIDEBAR --}}
        <div class="sidebar-mobile-header">
            <span>MENU MASYARAKAT</span>

            <button type="button"
                class="sidebar-close-btn"
                onclick="closeMasyarakatSidebar()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        {{-- PROFILE --}}
        <div class="sidebar-profile text-center">

            <div class="sidebar-profile-icon">
                <i class="bi bi-person-circle"></i>
            </div>

            <div class="sidebar-profile-name">
                {{ auth()->user()->nama ?? 'Masyarakat KUA' }}
            </div>

            <small>Masyarakat</small>

        </div>

        <hr class="sidebar-divider">

        {{-- MENU UTAMA --}}
        <div class="sidebar-title">
            MENU UTAMA
        </div>

        <ul class="nav flex-column sidebar-menu">

            {{-- DASHBOARD --}}
            <li class="nav-item">
                <a href="{{ route('masyarakat.dashboard') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.dashboard') ? 'active' : '' }}"
                    title="Dashboard">

                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- PENGAJUAN --}}
            <li class="nav-item">
                <a href="{{ route('masyarakat.pengajuan.index') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.pengajuan.*') ? 'active' : '' }}"
                    title="Pengajuan">

                    <i class="bi bi-file-earmark-text"></i>
                    <span>Pengajuan</span>
                </a>
            </li>

            {{-- BERITA --}}
            <li class="nav-item">
                <a href="{{ route('masyarakat.berita') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.berita*') ? 'active' : '' }}"
                    title="Berita">

                    <i class="bi bi-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>

            {{-- RIWAYAT --}}
            <li class="nav-item">
                <a href="{{ route('masyarakat.riwayat') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.riwayat') ? 'active' : '' }}"
                    title="Riwayat">

                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat</span>
                </a>
            </li>

            {{-- PROFIL --}}
            <li class="nav-item">
                <a href="{{ route('masyarakat.profil') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.profil') ? 'active' : '' }}"
                    title="Profil">

                    <i class="bi bi-person"></i>
                    <span>Profil</span>
                </a>
            </li>
            {{-- TANYA --}}
            <li class="nav-item">
                <a href="{{ route('masyarakat.tanya.index') }}"
                    class="nav-link {{ request()->routeIs('masyarakat.tanya.*') ? 'active' : '' }}"
                    title="Tanya Admin">

                    <i class="bi bi-chat-dots"></i>
                    <span>Tanya Admin</span>

                </a>
            </li>
        </ul>

        {{-- SISTEM --}}
        <hr class="sidebar-divider">

        <div class="sidebar-title">
            SISTEM
        </div>

        <ul class="nav flex-column sidebar-menu">

            {{-- LOGOUT --}}
            <li class="nav-item">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="nav-link sidebar-logout"
                        title="Logout">

                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>

                    </button>
                </form>

            </li>

        </ul>

        {{-- FOOTER SIDEBAR --}}
        <div class="sidebar-footer">
            <i class="bi bi-building"></i>
            <span>KUA Kecamatan Karang Baru</span>
        </div>

    </div>

</aside>


{{-- =========================================================
     CSS SIDEBAR
========================================================= --}}

<style>
    /* HEADER MOBILE */
    .sidebar-mobile-header {
        display: none;
    }

    /* INNER */
    .sidebar-inner {
        min-height: 100%;
        padding: 22px 15px;
        display: flex;
        flex-direction: column;
    }

    /* PROFILE */
    .sidebar-profile {
        padding: 8px 10px 20px;
    }

    .sidebar-profile-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #3b82f6;
        font-size: 55px;
    }

    .sidebar-profile-name {
        color: #1e3a5f;
        font-size: 14px;
        font-weight: 700;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .sidebar-profile small {
        display: block;
        margin-top: 4px;
        color: #718096;
        font-size: 12px;
    }

    /* DIVIDER */
    .masyarakat-sidebar hr {
        margin: 15px 0;
        border: 0;
        border-top: 1px solid #d8e5f5;
        opacity: 1;
    }

    /* TITLE */
    .sidebar-title {
        margin: 8px 0 10px;
        padding-left: 5px;

        color: #7b91ad;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .8px;
    }

    /* MENU */
    .sidebar-menu {
        gap: 5px;
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
        min-height: 45px;

        display: flex;
        align-items: center;
        gap: 12px;

        padding: 11px 13px;

        border-radius: 10px;
        background: transparent;

        color: #526781 !important;
        font-size: 13px;
        font-weight: 500;

        text-decoration: none;
        white-space: nowrap;

        transition: all .2s ease;
    }

    /* ICON */
    .sidebar-menu .nav-link i {
        width: 21px;
        min-width: 21px;
        text-align: center;

        color: #7090b9;
        font-size: 17px;
    }

    /* HOVER */
    .sidebar-menu .nav-link:hover {
        background: #e0edff;
        color: #2456a6 !important;
        transform: translateX(2px);
    }

    .sidebar-menu .nav-link:hover i {
        color: #2563eb;
    }

    /* ACTIVE */
    .sidebar-menu .nav-link.active {
        background: linear-gradient(135deg, #3b82f6, #2563eb) !important;
        color: #ffffff !important;

        box-shadow: 0 4px 12px rgba(37, 99, 235, .20);
        font-weight: 600;
    }

    .sidebar-menu .nav-link.active i {
        color: #ffffff !important;
    }

    /* LOGOUT FORM */
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
        background: #fff0f0;
        color: #dc2626 !important;
    }

    .sidebar-menu .sidebar-logout:hover i {
        color: #dc2626;
    }

    /* FOOTER */
    .sidebar-footer {
        margin-top: auto;
        padding: 13px 10px;
        margin-top: 30px;

        border: 1px solid #e0eaf7;
        border-radius: 11px;

        background: #e8f1ff;
        color: #6b83a1;

        text-align: center;
        font-size: 10px;
        line-height: 1.6;
    }

    .sidebar-footer i {
        margin-right: 5px;
        color: #3b82f6;
    }

    /* SCROLLBAR */
    .masyarakat-sidebar::-webkit-scrollbar {
        width: 5px;
    }

    .masyarakat-sidebar::-webkit-scrollbar-track {
        background: transparent;
    }

    .masyarakat-sidebar::-webkit-scrollbar-thumb {
        background: #c5d8f2;
        border-radius: 10px;
    }

    /* MOBILE */
    @media (max-width: 767.98px) {

        .sidebar-mobile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            height: 42px;
            margin-bottom: 10px;
            padding: 0 3px;

            color: #1e3a5f;
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

            background: #deebff;
            color: #3b82f6;

            font-size: 16px;
            cursor: pointer;
        }

        .sidebar-close-btn:hover {
            background: #d1e3ff;
            color: #1d4ed8;
        }

        .sidebar-profile {
            padding-bottom: 15px;
        }

        .sidebar-profile-icon {
            width: 52px;
            height: 52px;
            font-size: 48px;
        }

        .sidebar-menu .nav-link {
            min-height: 48px;
            padding: 11px 14px;
            font-size: 14px;
        }

        .sidebar-menu .nav-link i {
            font-size: 18px;
        }
    }
</style>