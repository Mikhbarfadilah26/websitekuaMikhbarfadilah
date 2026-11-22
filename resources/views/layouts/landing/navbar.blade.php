
{{-- =========================================================
     NAVBAR KUA KARANG BARU
     VERSI FINAL RESPONSIVE - TEMA HIJAU SOFT
========================================================= --}}

@php
    use Illuminate\Support\Facades\DB;

    $dataLayananNavbar = DB::table('layanan')
        ->orderBy('id', 'asc')
        ->get();

    $tampilkanTopbar =
        request()->routeIs('landing') ||
        request()->routeIs('landing.beranda');
@endphp


{{-- =========================================================
     TOPBAR BERANDA
========================================================= --}}

@if ($tampilkanTopbar)

    <div class="top-navbar-kua">

        <div class="top-marquee">

            <div class="top-welcome">

                <i class="fas fa-mosque me-2"></i>

                Assalamu'alaikum Warahmatullahi Wabarakatuh.
                Selamat Datang di Website Layanan KUA Kecamatan Karang Baru.
                Kami hadir dengan sepenuh hati untuk memberikan pelayanan yang amanah,
                profesional, ramah, transparan, dan mudah bagi seluruh masyarakat.
                Semoga setiap pelayanan menjadi jalan kebaikan dan membawa keberkahan
                bagi kita semua. Mari bersama-sama mewujudkan pelayanan KUA yang
                santun, cepat, mudah, transparan, dan penuh dengan nilai-nilai Islam.

            </div>

        </div>

        <div class="top-date-kua">

            <i class="far fa-calendar-alt me-2"></i>

            <span id="tanggalKua"></span>

        </div>

    </div>

@endif


{{-- =========================================================
     NAVBAR UTAMA
========================================================= --}}

<nav class="navbar navbar-expand-md navbar-dark navbar-kua
    {{ $tampilkanTopbar ? 'with-topbar' : 'without-topbar' }}">

    <div class="container navbar-container-kua">


        {{-- LOGO DAN BRAND --}}

        <a class="navbar-brand navbar-brand-kua"
           href="{{ route('landing') }}">

            <img
                src="{{ asset('foto/landing/7.png') }}"
                alt="Logo KUA Karang Baru"
                class="logo-kua">

            <div class="brand-text">

                <div class="running-wrapper">
                    <span>KUA Karang Baru</span>
                </div>

                <small>
                    Kantor Urusan Agama Kecamatan Karang Baru
                </small>

            </div>

        </a>


        {{-- TOMBOL MOBILE --}}

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarKua"
            aria-controls="navbarKua"
            aria-expanded="false"
            aria-label="Buka menu navigasi">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- MENU NAVIGASI --}}

        <div class="collapse navbar-collapse" id="navbarKua">

            <ul class="navbar-nav me-auto">


                {{-- BERANDA --}}

                <li class="nav-item">

                    <a
                        href="{{ route('landing.beranda') }}"
                        class="nav-link {{ request()->routeIs('landing.beranda') || request()->routeIs('landing') ? 'active' : '' }}">

                        <i class="fas fa-home"></i>
                        <span>Beranda</span>

                    </a>

                </li>


                {{-- PROFIL --}}

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle {{ request()->routeIs('landing.sejarah') || request()->routeIs('landing.visimisi') || request()->routeIs('landing.tentang') ? 'active' : '' }}"
                        href="#"
                        id="navbarDropdownProfil"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-user-shield"></i>
                        <span>Profil</span>

                    </a>

                    <ul
                        class="dropdown-menu profil-menu"
                        aria-labelledby="navbarDropdownProfil">

                        <li>

                            <a class="dropdown-item"
                               href="{{ route('landing.sejarah') }}">

                                <i class="fas fa-history me-2"></i>
                                Sejarah Singkat

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="{{ route('landing.visimisi') }}">

                                <i class="fas fa-bullseye me-2"></i>
                                Visi & Misi

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="{{ route('landing.tentang') }}">

                                <i class="fas fa-info-circle me-2"></i>
                                Tentang Kami

                            </a>

                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="{{ url('/struktur-organisasi') }}">

                                <i class="fas fa-sitemap me-2"></i>
                                Struktur Organisasi

                            </a>

                        </li>

                    </ul>

                </li>


                {{-- LAYANAN --}}

                <li class="nav-item dropdown layanan-dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdownLayanan"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-concierge-bell"></i>
                        <span>Layanan</span>

                    </a>

                    <div
                        class="dropdown-menu layanan-menu"
                        aria-labelledby="navbarDropdownLayanan">

                        <div class="layanan-title">

                            <i class="fas fa-concierge-bell me-2"></i>

                            LAYANAN KUA

                        </div>

                        <div class="dropdown-divider"></div>

                        @forelse ($dataLayananNavbar as $item)

                            <a
                                class="layanan-item"
                                href="{{ route('layanan.show', $item->id) }}">

                                <i class="fas fa-chevron-right"></i>

                                <span>{{ $item->judul }}</span>

                            </a>

                        @empty

                            <span class="layanan-item">
                                Belum ada layanan tersedia
                            </span>

                        @endforelse

                    </div>

                </li>


                {{-- BERITA --}}

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('landing.berita') ? 'active' : '' }}"
                        href="{{ route('landing.berita') }}">

                        <i class="fas fa-newspaper"></i>
                        <span>Berita</span>

                    </a>

                </li>


                {{-- PERSYARATAN --}}

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('landing.persyaratan') ? 'active' : '' }}"
                        href="{{ route('landing.persyaratan') }}">

                        <i class="fas fa-clipboard-check"></i>
                        <span>Persyaratan</span>

                    </a>

                </li>


                {{-- PENCARIAN --}}

                <li class="nav-item search-nav-item">

                    <form
                        action="{{ route('landing.pencarian') }}"
                        method="GET"
                        class="search-navbar">

                        <input
                            type="text"
                            name="search"
                            class="search-input"
                            placeholder="Cari apa saja..."
                            value="{{ request('search') }}">

                        <button
                            type="submit"
                            class="search-button"
                            title="Cari">

                            <i class="fas fa-search"></i>

                        </button>

                    </form>

                </li>

            </ul>


            {{-- TOMBOL LOGIN DAN LOKASI --}}

            <div class="navbar-buttons">

                <a
                    href="{{ route('login') }}"
                    class="btn btn-login-admin">

                    <i class="fas fa-user-shield"></i>
                    <span>Login Role</span>

                </a>

                <a
                    href="https://maps.google.com/?q=KUA+Karang+Baru+Aceh+Tamiang"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-location">

                    <i class="fas fa-map-marker-alt"></i>
                    <span>Lokasi</span>

                </a>

            </div>

        </div>

    </div>

</nav>


{{-- =========================================================
     CSS NAVBAR - TEMA HIJAU SOFT
========================================================= --}}

<style>

/* =========================================================
   WARNA UTAMA
========================================================= */

:root {
    --kua-green: #367b59;
    --kua-green-dark: #285f43;
    --kua-green-soft: #eaf3eb;
    --kua-green-light: #dcebdd;
    --kua-green-hover: #d2e6d5;
    --kua-border: #d7e6d9;
}


/* =========================================================
   TOPBAR
========================================================= */

.top-navbar-kua {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 42px;
    z-index: 1060;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: linear-gradient(
        90deg,
        #285f43,
        #367b59,
        #438563,
        #367b59
    );
    color: #fff;
    border-bottom: 1px solid rgba(255,255,255,.1);
    box-shadow: 0 3px 12px rgba(41,91,59,.15);
}

.top-marquee {
    height: 42px;
    flex: 1;
    min-width: 0;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding-right: 10px;
}

.top-welcome {
    display: inline-block;
    width: max-content;
    flex-shrink: 0;
    white-space: nowrap;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .2px;
    animation: topRunningText 38s linear infinite;
}

.top-welcome i {
    color: #dcebdd;
}

@keyframes topRunningText {
    from { transform: translateX(100%); }
    to { transform: translateX(-100%); }
}

.top-date-kua {
    height: 42px;
    min-width: 215px;
    padding: 0 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: rgba(40,95,67,.35);
    border-left: 1px solid rgba(255,255,255,.15);
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}

.top-date-kua i {
    color: #dcebdd;
}


/* =========================================================
   NAVBAR UTAMA
========================================================= */

.navbar-kua {
    position: fixed !important;
    left: 0;
    width: 100%;
    z-index: 1050;
    padding: 10px 0;
    background: rgba(40,95,67,.98) !important;
    border-bottom: 1px solid rgba(255,255,255,.12);
    box-shadow: 0 8px 25px rgba(41,91,59,.15);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    transition: background .3s ease;
}

.navbar-kua.with-topbar {
    top: 42px !important;
}

.navbar-kua.without-topbar {
    top: 0 !important;
}

.navbar-container-kua {
    max-width: 1440px;
    width: calc(100% - 48px);
}


/* =========================================================
   BRAND
========================================================= */

.navbar-brand-kua {
    display: flex;
    align-items: center;
    flex-shrink: 0;
    margin-right: 18px;
    padding: 0;
    gap: 10px;
}

.logo-kua {
    width: 48px;
    height: 48px;
    object-fit: contain;
    flex-shrink: 0;
    background: transparent;
    transition: transform .3s ease;
}

.navbar-brand-kua:hover .logo-kua {
    transform: scale(1.05);
}

.brand-text {
    width: 205px;
    min-width: 0;
    overflow: hidden;
}

.running-wrapper {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
}

.running-wrapper span {
    display: inline-block;
    color: #fff;
    font-size: 21px;
    font-weight: 700;
    letter-spacing: .5px;
    animation: runningText 9s linear infinite;
}

@keyframes runningText {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
}

.brand-text small {
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #dcebdd;
    font-size: 9px;
    font-weight: 500;
    letter-spacing: .3px;
}


/* =========================================================
   MENU NAVIGASI
========================================================= */

.navbar-kua .navbar-collapse {
    min-width: 0;
    align-items: center;
}

.navbar-kua .navbar-nav {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: nowrap;
    gap: 1px;
    min-width: 0;
}

.navbar-kua .navbar-nav > .nav-item {
    display: flex;
    align-items: center;
    flex-shrink: 0;
}

.navbar-kua .navbar-nav > .nav-item > .nav-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    height: 42px;
    padding: 8px 9px !important;
    margin: 0;
    border-radius: 9px;
    color: #f0f7f1 !important;
    font-size: 13px;
    font-weight: 600;
    white-space: nowrap;
    transition: background .25s ease, color .25s ease;
}

.navbar-kua .nav-link i {
    color: #c5ddca;
    font-size: 13px;
    flex-shrink: 0;
}

.navbar-kua .nav-link:hover {
    color: #fff !important;
    background: rgba(255,255,255,.12);
}

.navbar-kua .nav-link:hover i {
    color: #e0f0e2;
}

.navbar-kua .nav-link.active {
    color: #fff !important;
    background: rgba(220,237,221,.18);
}

.navbar-kua .nav-link.active i {
    color: #dcebdd;
}


/* =========================================================
   DROPDOWN PROFIL - HIJAU SOFT
========================================================= */

.navbar-kua .profil-menu {
    min-width: 230px;
    margin-top: 10px;
    padding: 9px;
    background: #eaf3eb !important;
    border: 1px solid #d7e6d9 !important;
    border-radius: 12px !important;
    box-shadow: 0 12px 30px rgba(41,91,59,.13);
}

.navbar-kua .profil-menu .dropdown-item {
    display: flex;
    align-items: center;
    padding: 11px 12px;
    border-radius: 8px;
    color: #285f43 !important;
    background: transparent;
    font-size: 13px;
    font-weight: 600;
    transition: all .2s ease;
}

.navbar-kua .profil-menu .dropdown-item i {
    width: 19px;
    color: #367b59 !important;
    font-size: 13px;
}

.navbar-kua .profil-menu .dropdown-item:hover {
    color: #285f43 !important;
    background: #d5e8d8 !important;
    padding-left: 17px;
}

.navbar-kua .profil-menu .dropdown-item:active,
.navbar-kua .profil-menu .dropdown-item.active {
    color: #285f43 !important;
    background: #d5e8d8 !important;
}

.navbar-kua .profil-menu .dropdown-divider {
    border-color: #cfdfd2;
    opacity: 1;
    margin: 7px 5px;
}


/* =========================================================
   DROPDOWN LAYANAN - HIJAU SOFT
========================================================= */

.layanan-dropdown {
    position: relative;
}

.navbar-kua .layanan-menu {
    width: 270px;
    padding: 10px !important;
    background: #eaf3eb !important;
    border: 1px solid #d7e6d9 !important;
    border-top: 3px solid #367b59 !important;
    border-radius: 12px !important;
    box-shadow: 0 12px 30px rgba(41,91,59,.13);
}

.layanan-title {
    display: flex;
    align-items: center;
    padding: 9px 10px;
    color: #285f43;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: .5px;
}

.layanan-title i {
    color: #367b59;
}

.navbar-kua .layanan-menu .dropdown-divider {
    border-color: #cfdfd2;
    opacity: 1;
}

.layanan-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    border-radius: 8px;
    color: #285f43 !important;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: all .2s ease;
}

.layanan-item i {
    color: #367b59;
    font-size: 10px;
    flex-shrink: 0;
}

.layanan-item:hover {
    color: #285f43 !important;
    background: #d5e8d8;
    transform: translateX(3px);
}


/* =========================================================
   SEARCH
========================================================= */

.search-nav-item {
    margin-left: 4px;
}

.search-navbar {
    display: flex;
    align-items: center;
    width: 150px;
    height: 40px;
    padding: 0 6px 0 13px;
    border-radius: 25px;
    background: #eaf3eb;
    border: 1px solid #d7e6d9;
}

.search-input {
    width: 100%;
    min-width: 0;
    height: 100%;
    padding: 0;
    border: none;
    outline: none;
    background: transparent;
    color: #285f43;
    font-size: 13px;
}

.search-input::placeholder {
    color: #77877c;
}

.search-button {
    width: 30px;
    height: 30px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 50%;
    background: transparent;
    color: #367b59;
    cursor: pointer;
}

.search-button:hover {
    color: #285f43;
    background: #d5e8d8;
}


/* =========================================================
   LOGIN DAN LOKASI
========================================================= */

.navbar-buttons {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-shrink: 0;
    gap: 8px;
    margin-left: 12px;
}

.navbar-buttons .btn {
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 0 13px;
    border-radius: 25px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    transition: all .25s ease;
}

.btn-login-admin {
    min-width: 125px;
    color: #fff !important;
    background: #367b59;
    border: 1px solid #7eae8a;
}

.btn-login-admin:hover {
    color: #285f43 !important;
    background: #eaf3eb;
    transform: translateY(-2px);
}

.btn-location {
    min-width: 95px;
    color: #285f43 !important;
    background: #eaf3eb;
    border: 1px solid #d7e6d9;
}

.btn-location:hover {
    color: #285f43 !important;
    background: #d5e8d8;
    border-color: #b7d4bd;
}


/* =========================================================
   HAMBURGER
========================================================= */

.navbar-toggler {
    display: none;
    padding: 7px 10px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 8px;
    box-shadow: none !important;
}

.navbar-toggler:focus {
    box-shadow: 0 0 0 3px rgba(220,237,221,.2) !important;
}


/* =========================================================
   LAPTOP MENENGAH
========================================================= */

@media (min-width: 768px) and (max-width: 1199.98px) {

    .navbar-container-kua {
        flex-wrap: wrap;
    }

    .navbar-kua .navbar-brand {
        margin-right: auto;
    }

    .navbar-kua .navbar-toggler {
        display: none;
    }

    .navbar-kua .navbar-collapse {
        display: flex !important;
        flex: 0 0 100%;
        width: 100%;
        flex-direction: column;
        align-items: stretch;
        margin-top: 12px;
        padding-top: 10px;
        border-top: 1px solid rgba(255,255,255,.15);
    }

    .navbar-kua .navbar-nav {
        width: 100%;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 4px;
    }

    .navbar-kua .navbar-nav > .nav-item > .nav-link {
        padding: 8px 12px !important;
    }

    .navbar-kua .search-navbar {
        width: 190px;
    }

    .navbar-buttons {
        margin: 10px 0 0;
        justify-content: flex-start;
    }

}


/* =========================================================
   LAPTOP LEBAR
========================================================= */

@media (min-width: 1200px) {

    .navbar-container-kua {
        flex-wrap: nowrap;
    }

    .navbar-kua .navbar-collapse {
        display: flex !important;
        flex-basis: auto;
        flex-grow: 1;
        flex-direction: row;
    }

    .navbar-kua .navbar-nav {
        flex-wrap: nowrap;
    }

    .navbar-kua .navbar-toggler {
        display: none !important;
    }

    .navbar-kua .navbar-nav > .nav-item > .nav-link {
        padding-left: 8px !important;
        padding-right: 8px !important;
    }

}


/* =========================================================
   TABLET DAN HP
========================================================= */

@media (max-width: 767.98px) {

    .navbar-kua {
        padding: 9px 0;
    }

    .navbar-container-kua {
        width: calc(100% - 30px);
    }

    .navbar-brand-kua {
        margin-right: 10px;
        gap: 8px;
    }

    .logo-kua {
        width: 43px;
        height: 43px;
    }

    .brand-text {
        width: 180px;
    }

    .running-wrapper span {
        font-size: 18px;
    }

    .brand-text small {
        font-size: 8px;
    }

    .navbar-toggler {
        display: block;
    }

    .navbar-kua .navbar-collapse {
        margin-top: 12px;
        padding: 14px;
        border: 1px solid #d7e6d9;
        border-radius: 12px;
        background: #eaf3eb;
    }

    .navbar-kua .navbar-nav {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        width: 100%;
        gap: 4px;
    }

    .navbar-kua .navbar-nav > .nav-item {
        display: block;
        width: 100%;
    }

    .navbar-kua .navbar-nav > .nav-item > .nav-link {
        width: 100%;
        height: 42px;
        justify-content: flex-start;
        padding: 8px 12px !important;
        color: #285f43 !important;
    }

    .navbar-kua .nav-link i {
        color: #367b59;
    }

    .navbar-kua .nav-link:hover,
    .navbar-kua .nav-link.active {
        color: #285f43 !important;
        background: #d5e8d8;
    }

    .navbar-kua .nav-link:hover i,
    .navbar-kua .nav-link.active i {
        color: #285f43;
    }

    .navbar-kua .search-nav-item {
        margin: 7px 0;
    }

    .navbar-kua .search-navbar {
        width: 100%;
        height: 42px;
    }

    .navbar-kua .navbar-buttons {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin: 12px 0 0;
    }

    .navbar-kua .navbar-buttons .btn {
        width: 100%;
    }

    .navbar-kua .dropdown-menu,
    .navbar-kua .layanan-menu {
        width: 100%;
        margin-top: 3px;
    }

    .navbar-kua .dropdown-menu {
        position: static;
    }

}


/* =========================================================
   HP KECIL
========================================================= */

@media (max-width: 480px) {

    .top-navbar-kua,
    .top-marquee {
        height: 38px;
    }

    .top-welcome {
        font-size: 11px;
        animation-duration: 30s;
    }

    .top-date-kua {
        height: 38px;
        min-width: 145px;
        padding: 0 8px;
        font-size: 9px;
    }

    .navbar-kua.with-topbar {
        top: 38px !important;
    }

    .brand-text {
        width: 155px;
    }

    .running-wrapper span {
        font-size: 17px;
    }

    .brand-text small {
        font-size: 7px;
    }

}


/* =========================================================
   AKSESIBILITAS
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .top-welcome,
    .running-wrapper span {
        animation: none;
    }

}

</style>


{{-- =========================================================
     JAVASCRIPT TANGGAL
========================================================= --}}

@if ($tampilkanTopbar)

<script>
document.addEventListener('DOMContentLoaded', function () {

    const tanggalElement = document.getElementById('tanggalKua');

    if (!tanggalElement) {
        return;
    }

    function tampilkanTanggal() {

        const sekarang = new Date();

        const formatTanggal = new Intl.DateTimeFormat('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            timeZone: 'Asia/Jakarta'
        });

        tanggalElement.textContent = formatTanggal.format(sekarang);
    }

    tampilkanTanggal();

    setInterval(tampilkanTanggal, 60000);

});
</script>

@endif
