<nav class="app-header navbar navbar-expand bg-white border-0 shadow-sm">

<div class="container-fluid px-3 px-lg-4">

    {{-- =================================================
         LEFT
    ================================================== --}}
    <ul class="navbar-nav align-items-center">

        {{-- SIDEBAR TOGGLE --}}
        <li class="nav-item me-2">

            <a class="nav-link d-flex align-items-center justify-content-center admin-menu-toggle"
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
                        Admin Panel
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
         RIGHT
    ================================================== --}}
    <ul class="navbar-nav ms-auto align-items-center">


        {{-- HOME --}}
        <li class="nav-item me-1 d-none d-lg-block">

            <a href="{{ url('/admin') }}"
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

                {{-- NOTIFICATION DOT --}}
                <span class="notification-dot"></span>

            </a>


            <div class="dropdown-menu dropdown-menu-end admin-dropdown notification-dropdown">

                <div class="notification-header">

                    <div>

                        <strong>
                            Notifikasi
                        </strong>

                        <small>
                            Pemberitahuan sistem
                        </small>

                    </div>

                    <span class="notification-count">
                        0
                    </span>

                </div>


                <div class="dropdown-divider"></div>


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

                            Administrator

                        </small>

                    </div>

                </div>


                <div class="dropdown-divider"></div>


                <a href="{{ route('admin.akun.index') }}"
                    class="dropdown-item admin-dropdown-item">

                    <span class="dropdown-item-icon">

                        <i class="bi bi-person"></i>

                    </span>

                    <span>

                        Akun Saya

                    </span>

                    <i class="bi bi-chevron-right ms-auto"></i>

                </a>


                <a href="{{ url('/admin') }}"
                    class="dropdown-item admin-dropdown-item">

                    <span class="dropdown-item-icon">

                        <i class="bi bi-speedometer2"></i>

                    </span>

                    <span>

                        Dashboard

                    </span>

                    <i class="bi bi-chevron-right ms-auto"></i>

                </a>


                <div class="dropdown-divider"></div>


                <form action="{{ url('/logout') }}"
                    method="POST">

                    @csrf

                    <button type="submit"
                        class="dropdown-item admin-dropdown-item logout-item">

                        <span class="dropdown-item-icon">

                            <i class="bi bi-box-arrow-right"></i>

                        </span>

                        <span>

                            Keluar

                        </span>

                    </button>

                </form>

            </div>

        </li>

    </ul>

</div>


</nav>

<style>

/* =========================================================
   ADMIN PREMIUM NAVBAR
========================================================= */

.app-header {
    min-height: 68px;
    z-index: 1030;
    border-bottom: 1px solid rgba(0, 0, 0, .06) !important;
}


/* SIDEBAR BUTTON
--------------------------------------------------------- */

.admin-menu-toggle {
    width: 42px;
    height: 42px;

    border-radius: 12px;

    color: #475569;

    transition:
        background .2s ease,
        color .2s ease,
        transform .2s ease;
}

.admin-menu-toggle i {
    font-size: 22px;
}

.admin-menu-toggle:hover {
    background: #f1f5f9;
    color: #2563eb;
}


/* MINI BRAND
--------------------------------------------------------- */

.admin-brand-mini {
    display: flex;
    align-items: center;
    gap: 10px;
}

.admin-brand-icon {
    width: 38px;
    height: 38px;

    border-radius: 11px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #2563eb,
        #4f46e5
    );

    color: white;

    box-shadow:
        0 5px 15px rgba(37, 99, 235, .22);
}

.admin-brand-icon i {
    font-size: 18px;
}

.admin-brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.15;
}

.brand-title {
    font-size: 13px;
    font-weight: 700;
    color: #172033;
}

.brand-subtitle {
    margin-top: 3px;
    font-size: 10px;
    font-weight: 500;
    color: #94a3b8;
    letter-spacing: .3px;
}


/* SEARCH
--------------------------------------------------------- */

.admin-search {
    width: 280px;
    height: 42px;

    display: flex;
    align-items: center;

    gap: 9px;

    padding: 0 10px 0 14px;

    background: #f8fafc;

    border: 1px solid #e8edf3;

    border-radius: 12px;

    transition:
        border-color .2s ease,
        box-shadow .2s ease,
        background .2s ease;
}

.admin-search i {
    color: #94a3b8;
    font-size: 15px;
}

.admin-search input {
    flex: 1;

    min-width: 0;

    border: 0;
    outline: 0;

    background: transparent;

    color: #334155;

    font-size: 12px;
}

.admin-search input::placeholder {
    color: #94a3b8;
}

.admin-search:focus-within {
    background: white;

    border-color: #bfdbfe;

    box-shadow:
        0 0 0 3px rgba(37, 99, 235, .08);
}

.search-shortcut {
    width: 23px;
    height: 23px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: white;

    border: 1px solid #e2e8f0;

    border-radius: 6px;

    color: #94a3b8;

    font-size: 12px;
}


/* TOP BUTTON
--------------------------------------------------------- */

.admin-top-link {
    width: 42px;
    height: 42px;

    display: flex !important;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    color: #64748b;

    transition:
        background .2s ease,
        color .2s ease;
}

.admin-top-link i {
    font-size: 18px;
}

.admin-top-link:hover {
    background: #f1f5f9;
    color: #2563eb;
}


/* NOTIFICATION
--------------------------------------------------------- */

.notification-dot {
    position: absolute;

    top: 9px;
    right: 9px;

    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: #ef4444;

    border: 1.5px solid white;
}


/* DROPDOWN
--------------------------------------------------------- */

.admin-dropdown {
    margin-top: 9px !important;

    padding: 8px;

    border: 1px solid #edf0f5;

    border-radius: 14px;

    box-shadow:
        0 15px 40px rgba(15, 23, 42, .12);

    min-width: 250px;
}


/* NOTIFICATION DROPDOWN */

.notification-dropdown {
    width: 320px;
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
    font-size: 13px;
    color: #1e293b;
}

.notification-header small {
    margin-top: 2px;
    color: #94a3b8;
    font-size: 10px;
}

.notification-count {
    min-width: 24px;
    height: 24px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: #eff6ff;
    color: #2563eb;

    font-size: 11px;
    font-weight: 700;
}

.empty-notification {
    padding: 25px 10px;

    display: flex;
    align-items: center;
    flex-direction: column;

    text-align: center;
}

.empty-notification-icon {
    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 10px;

    border-radius: 14px;

    background: #f8fafc;

    color: #94a3b8;
}

.empty-notification-icon i {
    font-size: 20px;
}

.empty-notification strong {
    font-size: 12px;
    color: #475569;
}

.empty-notification span {
    margin-top: 4px;

    font-size: 10px;

    color: #94a3b8;
}


/* PROFILE
--------------------------------------------------------- */

.admin-profile {
    display: flex !important;
    align-items: center;

    gap: 9px;

    padding: 5px 8px !important;

    border-radius: 13px;

    transition: background .2s ease;
}

.admin-profile:hover {
    background: #f8fafc;
}

.profile-avatar {
    width: 38px;
    height: 38px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: linear-gradient(
        135deg,
        #2563eb,
        #4f46e5
    );

    color: white;

    box-shadow:
        0 5px 15px rgba(37, 99, 235, .20);
}

.profile-avatar i {
    font-size: 18px;
}

.profile-info {
    flex-direction: column;

    line-height: 1.15;
}

.profile-name {
    max-width: 130px;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;

    color: #1e293b;

    font-size: 12px;
    font-weight: 700;
}

.profile-role {
    margin-top: 4px;

    color: #94a3b8;

    font-size: 10px;
}

.profile-chevron {
    color: #94a3b8;
    font-size: 11px;
}


/* PROFILE DROPDOWN */

.profile-dropdown {
    width: 280px;
}

.profile-dropdown-header {
    display: flex;
    align-items: center;

    gap: 10px;

    padding: 10px 8px 12px;
}

.profile-avatar-large {
    width: 44px;
    height: 44px;

    border-radius: 13px;
}

.profile-dropdown-header > div:last-child {
    display: flex;
    flex-direction: column;
}

.profile-dropdown-header strong {
    color: #1e293b;
    font-size: 12px;
}

.profile-dropdown-header small {
    margin-top: 3px;

    color: #94a3b8;

    font-size: 10px;
}


/* DROPDOWN ITEMS */

.admin-dropdown-item {
    display: flex;

    align-items: center;

    gap: 10px;

    margin: 2px 0;

    padding: 9px 10px !important;

    border-radius: 9px;

    color: #475569;

    font-size: 12px;

    transition:
        background .2s ease,
        color .2s ease;
}

.admin-dropdown-item:hover {
    background: #f1f5f9;

    color: #2563eb;
}

.dropdown-item-icon {
    width: 30px;
    height: 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #f8fafc;

    color: #64748b;
}

.admin-dropdown-item:hover .dropdown-item-icon {
    background: #eff6ff;
    color: #2563eb;
}

.logout-item {
    color: #dc2626 !important;
}

.logout-item:hover {
    background: #fef2f2 !important;
    color: #dc2626 !important;
}

.logout-item .dropdown-item-icon {
    color: #dc2626;
    background: #fef2f2;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 767.98px) {

    .app-header {
        min-height: 60px;
    }

    .admin-brand-mini {
        display: none;
    }

    .admin-profile {
        padding: 4px !important;
    }

    .profile-chevron {
        display: none;
    }

    .admin-dropdown {
        margin-right: 6px !important;
    }

}

</style>
