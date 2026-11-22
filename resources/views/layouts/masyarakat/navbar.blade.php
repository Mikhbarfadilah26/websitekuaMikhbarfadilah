
{{-- =========================================================
     NAVBAR MASYARAKAT
========================================================= --}}

<nav class="masyarakat-navbar">

    <div class="navbar-container">

        {{-- BAGIAN KIRI --}}
        <div class="navbar-left">

            {{-- TOGGLE SIDEBAR --}}
            <button type="button"
                    class="mobile-sidebar-toggle"
                    id="mobileSidebarToggle"
                    onclick="toggleMasyarakatSidebar()"
                    title="Buka / tutup sidebar">

                <i class="bi bi-list"></i>

            </button>

            {{-- BRAND --}}
            <a href="{{ route('masyarakat.dashboard') }}"
               class="navbar-brand-custom">

                <span class="navbar-brand-icon">
                    <i class="bi bi-grid-1x2-fill"></i>
                </span>

                <span class="navbar-brand-text">
                    <strong>Panel Masyarakat</strong>
                    <small>KUA Karang Baru</small>
                </span>

            </a>

        </div>

        {{-- USER --}}
        <div class="navbar-user">

            <button type="button"
                    class="navbar-user-button"
                    id="userDropdownButton">

                <span class="navbar-user-icon">
                    <i class="bi bi-person-circle"></i>
                </span>

                <span class="navbar-user-name">
                    {{ auth()->user()->nama ?? 'Masyarakat' }}
                </span>

                <i class="bi bi-chevron-down navbar-user-arrow"></i>

            </button>

            {{-- DROPDOWN --}}
            <div class="navbar-user-dropdown" id="userDropdown">

                {{-- PROFIL --}}
                <a href="{{ route('masyarakat.profil') }}"
                   class="user-dropdown-item">

                    <span class="dropdown-item-icon">
                        <i class="bi bi-person"></i>
                    </span>

                    <span>Profil</span>

                </a>

                <div class="dropdown-divider-custom"></div>

                {{-- LOGOUT --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="user-dropdown-item logout-item">

                        <span class="dropdown-item-icon">
                            <i class="bi bi-box-arrow-right"></i>
                        </span>

                        <span>Logout</span>

                    </button>
                </form>

            </div>

        </div>

    </div>

</nav>


{{-- =========================================================
     CSS NAVBAR
========================================================= --}}

<style>

    /* NAVBAR */
    .masyarakat-navbar {
        background: #ffffff;
        border-bottom: 1px solid #e5edf7;

        box-shadow: 0 2px 12px rgba(30, 64, 120, .05);
    }

    /* CONTAINER */
    .navbar-container {
        width: 100%;
        height: 72px;

        padding: 0 25px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;
    }

    /* LEFT */
    .navbar-left {
        display: flex;
        align-items: center;
        min-width: 0;
        gap: 12px;
    }

    /* SIDEBAR BUTTON */
    .mobile-sidebar-toggle {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 42px;
        height: 42px;
        flex-shrink: 0;

        border: 1px solid #e2eaf5;
        border-radius: 11px;

        background: #eff6ff;
        color: #2563eb;

        font-size: 23px;
        cursor: pointer;

        transition: all .2s ease;
    }

    .mobile-sidebar-toggle:hover {
        background: #dbeafe;
        color: #1d4ed8;
        transform: translateY(-1px);
    }

    /* BRAND */
    .navbar-brand-custom {
        display: flex;
        align-items: center;
        gap: 10px;

        min-width: 0;

        color: #172033;
        text-decoration: none;
    }

    .navbar-brand-custom:hover {
        color: #2563eb;
    }

    /* BRAND ICON */
    .navbar-brand-icon {
        width: 40px;
        height: 40px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: #ffffff;

        font-size: 18px;
    }

    /* BRAND TEXT */
    .navbar-brand-text {
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    .navbar-brand-text strong {
        font-size: 14px;
        font-weight: 700;
        line-height: 1.3;
        white-space: nowrap;
    }

    .navbar-brand-text small {
        margin-top: 2px;
        color: #718096;
        font-size: 10px;
        white-space: nowrap;
    }

    /* USER */
    .navbar-user {
        position: relative;
        flex-shrink: 0;
    }

    .navbar-user-button {
        display: flex;
        align-items: center;
        gap: 8px;

        border: none;
        background: transparent;

        padding: 7px 9px;
        border-radius: 10px;

        color: #334155;
        cursor: pointer;

        transition: background .2s ease;
    }

    .navbar-user-button:hover {
        background: #f1f5f9;
    }

    /* USER ICON */
    .navbar-user-icon {
        display: flex;
        align-items: center;
        justify-content: center;

        color: #2563eb;
        font-size: 25px;
    }

    /* USER NAME */
    .navbar-user-name {
        max-width: 180px;

        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;

        font-size: 13px;
        font-weight: 600;
    }

    /* ARROW */
    .navbar-user-arrow {
        color: #64748b;
        font-size: 11px;
        transition: transform .2s ease;
    }

    /* DROPDOWN */
    .navbar-user-dropdown {
        position: absolute;
        top: calc(100% + 9px);
        right: 0;

        width: 190px;
        padding: 7px;

        background: #ffffff;
        border: 1px solid #e5eaf2;
        border-radius: 12px;

        box-shadow: 0 12px 30px rgba(0, 0, 0, .12);

        display: none;
        z-index: 2000;
    }

    .navbar-user-dropdown.show {
        display: block;
    }

    /* DROPDOWN ITEM */
    .user-dropdown-item {
        width: 100%;
        min-height: 40px;

        display: flex;
        align-items: center;
        gap: 10px;

        padding: 9px 10px;

        border: none;
        border-radius: 8px;
        background: transparent;

        color: #475569;
        font-size: 13px;
        font-weight: 500;

        text-decoration: none;
        text-align: left;

        cursor: pointer;
    }

    .user-dropdown-item:hover {
        background: #eff6ff;
        color: #2563eb;
    }

    .dropdown-item-icon {
        width: 20px;
        min-width: 20px;
        text-align: center;
        font-size: 16px;
    }

    /* DIVIDER */
    .dropdown-divider-custom {
        height: 1px;
        margin: 5px 4px;
        background: #e5eaf2;
    }

    /* LOGOUT */
    .logout-item {
        color: #dc2626;
    }

    .logout-item:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    /* MOBILE */
    @media (max-width: 767.98px) {

        .navbar-container {
            height: 62px;
            padding: 0 13px;
            gap: 8px;
        }

        .mobile-sidebar-toggle {
            width: 40px;
            height: 40px;
            font-size: 22px;
        }

        .navbar-brand-icon {
            width: 36px;
            height: 36px;
            font-size: 16px;
        }

        .navbar-brand-text strong {
            font-size: 13px;
        }

        .navbar-brand-text small {
            font-size: 9px;
        }

        .navbar-user-button {
            padding: 5px;
        }

        .navbar-user-icon {
            font-size: 27px;
        }

        .navbar-user-name,
        .navbar-user-arrow {
            display: none;
        }

        .navbar-user-dropdown {
            position: fixed;
            top: 67px;
            right: 10px;
            width: 190px;
        }
    }

    /* HP KECIL */
    @media (max-width: 380px) {

        .navbar-brand-text small {
            display: none;
        }

        .navbar-brand-text strong {
            font-size: 12px;
        }

        .mobile-sidebar-toggle {
            width: 37px;
            height: 37px;
        }

        .navbar-brand-icon {
            width: 34px;
            height: 34px;
        }
    }

</style>


{{-- =========================================================
     JAVASCRIPT USER DROPDOWN
========================================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const userButton = document.getElementById('userDropdownButton');
        const userDropdown = document.getElementById('userDropdown');

        if (userButton && userDropdown) {

            userButton.addEventListener('click', function (event) {
                event.stopPropagation();
                userDropdown.classList.toggle('show');
            });

            document.addEventListener('click', function (event) {

                if (
                    !userDropdown.contains(event.target) &&
                    !userButton.contains(event.target)
                ) {
                    userDropdown.classList.remove('show');
                }

            });

        }

    });
</script>
