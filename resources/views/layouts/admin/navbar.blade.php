
<nav class="app-header navbar navbar-expand clean-kua-navbar">

    <div class="container-fluid px-3 px-lg-4">

        {{-- =================================================
             LEFT NAVBAR
        ================================================== --}}
        <ul class="navbar-nav align-items-center">

            {{-- SIDEBAR TOGGLE --}}
            <li class="nav-item me-2">

                <a class="nav-link admin-menu-toggle"
                    data-lte-toggle="sidebar"
                    href="#"
                    role="button"
                    title="Buka Menu">

                    <i class="bi bi-list"></i>

                </a>

            </li>

            {{-- BRAND MINI --}}
            <li class="nav-item d-none d-lg-flex align-items-center">

                <div class="admin-brand-mini">

                    <div class="admin-brand-icon">
                        <i class="bi bi-building"></i>
                    </div>

                    <div class="admin-brand-text">

                        <span class="brand-title">
                            KUA Karang Baru
                        </span>

                        <span class="brand-subtitle">
                            Administrator
                        </span>

                    </div>

                </div>

            </li>

            {{-- SEARCH --}}
            <li class="nav-item ms-lg-4 d-none d-md-block">

                <form action="{{ url('/pencarian') }}"
                    method="GET"
                    class="admin-search">

                    <i class="bi bi-search"></i>

                    <input
                        type="search"
                        name="search"
                        placeholder="Cari sesuatu..."
                        value="{{ request('search') }}">

                    <span class="search-shortcut">
                        /
                    </span>

                </form>

            </li>

        </ul>


        {{-- =================================================
             RIGHT NAVBAR
        ================================================== --}}
        <ul class="navbar-nav ms-auto align-items-center">

            {{-- HOME --}}
            <li class="nav-item me-1 d-none d-lg-block">

                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link admin-top-link"
                    title="Dashboard">

                    <i class="bi bi-house"></i>

                </a>

            </li>


            {{-- NOTIFICATION --}}
            <li class="nav-item dropdown me-1">

                <a class="nav-link admin-top-link position-relative"
                    href="#"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    title="Notifikasi">

                    <i class="bi bi-bell"></i>

                    @php
                        try {
                            $jumlahNotifikasi = \App\Models\Saran::where(
                                'status',
                                'baru'
                            )->count();
                        } catch (\Throwable $e) {
                            $jumlahNotifikasi = 0;
                        }
                    @endphp

                    @if($jumlahNotifikasi > 0)

                        <span class="notification-dot"></span>

                    @endif

                </a>

                {{-- NOTIFICATION DROPDOWN --}}
                <div class="dropdown-menu dropdown-menu-end admin-dropdown notification-dropdown">

                    <div class="notification-header">

                        <div>
                            <strong>Notifikasi</strong>

                            <small>
                                Pemberitahuan sistem
                            </small>
                        </div>

                        <span class="notification-count">
                            {{ $jumlahNotifikasi }}
                        </span>

                    </div>

                    <div class="dropdown-divider"></div>

                    @if($jumlahNotifikasi > 0)

                        <a href="{{ route('admin.saran.index', ['status' => 'baru']) }}"
                            class="notification-item">

                            <div class="notification-icon">
                                <i class="bi bi-chat-dots"></i>
                            </div>

                            <div class="notification-content">

                                <strong>
                                    Pertanyaan baru
                                </strong>

                                <span>
                                    Ada {{ $jumlahNotifikasi }} pesan yang belum dibaca.
                                </span>

                            </div>

                            <i class="bi bi-chevron-right notification-arrow"></i>

                        </a>

                    @else

                        <div class="empty-notification">

                            <div class="empty-notification-icon">
                                <i class="bi bi-bell-slash"></i>
                            </div>

                            <strong>
                                Tidak ada notifikasi
                            </strong>

                            <span>
                                Belum ada pemberitahuan baru.
                            </span>

                        </div>

                    @endif

                </div>

            </li>


            {{-- PROFILE --}}
            <li class="nav-item dropdown">

                <a class="nav-link admin-profile"
                    href="#"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                    <div class="profile-avatar">
                        <i class="bi bi-person"></i>
                    </div>

                    <div class="profile-info d-none d-md-flex">

                        <span class="profile-name">
                            {{ auth()->user()->nama ?? auth()->user()->name ?? 'Administrator' }}
                        </span>

                        <span class="profile-role">
                            Administrator
                        </span>

                    </div>

                    <i class="bi bi-chevron-down profile-chevron"></i>

                </a>


                {{-- PROFILE DROPDOWN --}}
                <div class="dropdown-menu dropdown-menu-end admin-dropdown profile-dropdown">

                    <div class="profile-dropdown-header">

                        <div class="profile-avatar profile-avatar-large">
                            <i class="bi bi-person"></i>
                        </div>

                        <div>

                            <strong>
                                {{ auth()->user()->nama ?? auth()->user()->name ?? 'Administrator' }}
                            </strong>

                            <small>
                                Administrator KUA
                            </small>

                        </div>

                    </div>

                    <div class="dropdown-divider"></div>

                    {{-- AKUN SAYA --}}
                    <a href="{{ route('admin.akun.index') }}"
                        class="dropdown-item admin-dropdown-item">

                        <span class="dropdown-item-icon">
                            <i class="bi bi-person"></i>
                        </span>

                        <span>Akun Saya</span>

                        <i class="bi bi-chevron-right ms-auto"></i>

                    </a>

                    {{-- DASHBOARD --}}
                    <a href="{{ route('admin.dashboard') }}"
                        class="dropdown-item admin-dropdown-item">

                        <span class="dropdown-item-icon">
                            <i class="bi bi-speedometer2"></i>
                        </span>

                        <span>Dashboard</span>

                        <i class="bi bi-chevron-right ms-auto"></i>

                    </a>

                    <div class="dropdown-divider"></div>

                    {{-- LOGOUT --}}
                    <form action="{{ route('logout') }}"
                        method="POST">

                        @csrf

                        <button type="submit"
                            class="dropdown-item admin-dropdown-item logout-item">

                            <span class="dropdown-item-icon">
                                <i class="bi bi-box-arrow-right"></i>
                            </span>

                            <span>Keluar</span>

                        </button>

                    </form>

                </div>

            </li>

        </ul>

    </div>

</nav>


{{-- =========================================================
     CLEAN GREEN NAVBAR CSS
========================================================= --}}

<style>

:root {
    --kua-green-dark: #285b46;
    --kua-green: #39765b;
    --kua-green-medium: #6c9b7d;
    --kua-green-soft: #eaf2ec;
    --kua-green-light: #f3f7f3;
    --kua-green-border: #dce8de;
    --kua-text: #34483c;
    --kua-muted: #87968b;
}

/* =========================================================
   NAVBAR
========================================================= */

.clean-kua-navbar {
    min-height: 68px;
    background: #ffffff !important;
    border-bottom: 1px solid var(--kua-green-border) !important;
    box-shadow: 0 2px 10px rgba(40, 91, 70, .035) !important;
    z-index: 1030;
}

/* =========================================================
   SIDEBAR TOGGLE
========================================================= */

.admin-menu-toggle {
    width: 40px;
    height: 40px;

    display: flex !important;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    color: var(--kua-green-dark) !important;

    transition: all .2s ease;
}

.admin-menu-toggle i {
    font-size: 23px;
}

.admin-menu-toggle:hover {
    background: var(--kua-green-soft);
    color: var(--kua-green) !important;
}

/* =========================================================
   MINI BRAND
========================================================= */

.admin-brand-mini {
    display: flex;
    align-items: center;
    gap: 10px;
}

.admin-brand-icon {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--kua-green-soft);

    color: var(--kua-green-dark);

    border: 1px solid var(--kua-green-border);

    border-radius: 10px;
}

.admin-brand-icon i {
    font-size: 18px;
}

.admin-brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.25;
}

.brand-title {
    color: var(--kua-green-dark);
    font-size: 13px;
    font-weight: 600;
}

.brand-subtitle {
    margin-top: 3px;
    color: var(--kua-muted);
    font-size: 10px;
    font-weight: 400;
}

/* =========================================================
   SEARCH
========================================================= */

.admin-search {
    width: 270px;
    height: 40px;

    display: flex;
    align-items: center;
    gap: 9px;

    padding: 0 11px 0 13px;

    background: var(--kua-green-light);

    border: 1px solid transparent;

    border-radius: 9px;

    transition: all .2s ease;
}

.admin-search > i {
    color: var(--kua-green-medium);
    font-size: 14px;
}

.admin-search input {
    flex: 1;
    min-width: 0;

    border: 0;
    outline: 0;

    background: transparent;

    color: var(--kua-text);

    font-size: 11.5px;
}

.admin-search input::placeholder {
    color: #9aa99e;
}

.admin-search:focus-within {
    background: #fff;
    border-color: var(--kua-green-medium);
    box-shadow: 0 0 0 3px rgba(108, 155, 125, .10);
}

.search-shortcut {
    width: 22px;
    height: 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #fff;

    border: 1px solid var(--kua-green-border);

    border-radius: 5px;

    color: var(--kua-muted);

    font-size: 11px;
}

/* =========================================================
   TOP LINKS
========================================================= */

.admin-top-link {
    width: 40px;
    height: 40px;

    display: flex !important;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    color: var(--kua-green-dark) !important;

    transition: all .2s ease;
}

.admin-top-link i {
    font-size: 17px;
}

.admin-top-link:hover {
    background: var(--kua-green-soft);
    color: var(--kua-green) !important;
}

/* =========================================================
   NOTIFICATION DOT
========================================================= */

.notification-dot {
    position: absolute;
    top: 8px;
    right: 8px;

    width: 7px;
    height: 7px;

    background: #dc6464;

    border: 1.5px solid white;

    border-radius: 50%;
}

/* =========================================================
   DROPDOWN
========================================================= */

.admin-dropdown {
    margin-top: 10px !important;
    padding: 8px;

    border: 1px solid var(--kua-green-border);

    border-radius: 12px;

    background: #fff;

    box-shadow: 0 12px 35px rgba(40, 91, 70, .10);

    min-width: 250px;
}

.dropdown-divider {
    border-color: #edf2ed;
    opacity: 1;
}

/* =========================================================
   NOTIFICATION DROPDOWN
========================================================= */

.notification-dropdown {
    width: 310px;
    padding: 12px;
}

.notification-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 5px 6px;
}

.notification-header > div {
    display: flex;
    flex-direction: column;
}

.notification-header strong {
    color: var(--kua-green-dark);
    font-size: 12.5px;
    font-weight: 600;
}

.notification-header small {
    margin-top: 3px;
    color: var(--kua-muted);
    font-size: 10px;
}

.notification-count {
    min-width: 25px;
    height: 25px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--kua-green-soft);

    border-radius: 7px;

    color: var(--kua-green-dark);

    font-size: 11px;
    font-weight: 600;
}

/* NOTIFICATION ITEM */

.notification-item {
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 11px 8px;

    border-radius: 9px;

    color: var(--kua-text);

    transition: background .2s ease;
}

.notification-item:hover {
    background: var(--kua-green-light);
    color: var(--kua-green-dark);
}

.notification-icon {
    width: 35px;
    height: 35px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--kua-green-soft);

    border-radius: 9px;

    color: var(--kua-green);
}

.notification-content {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.notification-content strong {
    font-size: 11.5px;
    font-weight: 600;
}

.notification-content span {
    color: var(--kua-muted);
    font-size: 10px;
}

.notification-arrow {
    margin-left: auto;
    color: var(--kua-muted);
    font-size: 11px;
}

/* EMPTY NOTIFICATION */

.empty-notification {
    padding: 24px 10px;

    display: flex;
    flex-direction: column;
    align-items: center;

    text-align: center;
}

.empty-notification-icon {
    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 10px;

    background: var(--kua-green-light);

    border-radius: 12px;

    color: var(--kua-green-medium);
}

.empty-notification-icon i {
    font-size: 19px;
}

.empty-notification strong {
    color: var(--kua-green-dark);
    font-size: 11.5px;
}

.empty-notification span {
    margin-top: 4px;
    color: var(--kua-muted);
    font-size: 10px;
}

/* =========================================================
   PROFILE
========================================================= */

.admin-profile {
    display: flex !important;
    align-items: center;
    gap: 9px;

    padding: 5px 8px !important;

    border-radius: 10px;

    transition: background .2s ease;
}

.admin-profile:hover {
    background: var(--kua-green-light);
}

.profile-avatar {
    width: 37px;
    height: 37px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--kua-green-soft);

    border: 1px solid var(--kua-green-border);

    border-radius: 10px;

    color: var(--kua-green-dark);
}

.profile-avatar i {
    font-size: 17px;
}

.profile-info {
    flex-direction: column;
    line-height: 1.2;
}

.profile-name {
    max-width: 130px;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;

    color: var(--kua-green-dark);

    font-size: 11.5px;
    font-weight: 600;
}

.profile-role {
    margin-top: 4px;

    color: var(--kua-muted);

    font-size: 10px;
}

.profile-chevron {
    color: var(--kua-muted);
    font-size: 10px;
}

/* =========================================================
   PROFILE DROPDOWN
========================================================= */

.profile-dropdown {
    width: 270px;
}

.profile-dropdown-header {
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 10px 8px 12px;
}

.profile-avatar-large {
    width: 43px;
    height: 43px;
    border-radius: 11px;
}

.profile-dropdown-header > div:last-child {
    display: flex;
    flex-direction: column;
}

.profile-dropdown-header strong {
    color: var(--kua-green-dark);
    font-size: 11.5px;
    font-weight: 600;
}

.profile-dropdown-header small {
    margin-top: 4px;
    color: var(--kua-muted);
    font-size: 10px;
}

/* DROPDOWN ITEM */

.admin-dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;

    margin: 2px 0;
    padding: 9px 10px !important;

    border-radius: 8px;

    color: var(--kua-text);

    font-size: 11.5px;

    transition: all .2s ease;
}

.admin-dropdown-item:hover {
    background: var(--kua-green-light);
    color: var(--kua-green-dark);
}

.dropdown-item-icon {
    width: 29px;
    height: 29px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--kua-green-soft);

    border-radius: 8px;

    color: var(--kua-green);
}

.admin-dropdown-item:hover .dropdown-item-icon {
    background: #dcebdd;
    color: var(--kua-green-dark);
}

/* LOGOUT */

.logout-item {
    color: #b65d5d !important;
}

.logout-item:hover {
    background: #fbefef !important;
    color: #a64242 !important;
}

.logout-item .dropdown-item-icon {
    background: #fbefef;
    color: #b65d5d;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 767.98px) {

    .clean-kua-navbar {
        min-height: 60px;
    }

    .admin-profile {
        padding: 4px !important;
    }

    .profile-chevron {
        display: none;
    }

    .admin-dropdown {
        margin-right: 5px !important;
    }

    .notification-dropdown {
        width: 280px;
    }

}

</style>
