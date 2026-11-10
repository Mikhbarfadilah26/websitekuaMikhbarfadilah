{{-- =========================================================
NAVBAR KUA KARANG BARU
========================================================= --}}

@php
use Illuminate\Support\Facades\DB;

$dataLayananNavbar = DB::table('layanan')
    ->orderBy('id', 'asc')
    ->get();
@endphp


{{-- =========================================================
CEK HALAMAN BERANDA
TOP NAVBAR HANYA TAMPIL DI BERANDA
========================================================= --}}

@php

$tampilkanTopbar =
    request()->routeIs('landing') ||
    request()->routeIs('landing.beranda');

@endphp


{{-- =========================================================
TOP NAVBAR / RUNNING TEXT
HANYA UNTUK BERANDA LANDING
========================================================= --}}

@if ($tampilkanTopbar)

<div class="top-navbar-kua">

    {{-- =================================================
        RUNNING TEXT
    ================================================== --}}

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


    {{-- =================================================
        TANGGAL
    ================================================== --}}

    <div class="top-date-kua">

        <i class="far fa-calendar-alt me-2"></i>

        <span id="tanggalKua"></span>

    </div>

</div>

@endif



{{-- =========================================================
NAVBAR UTAMA
========================================================= --}}

<nav class="navbar navbar-expand-lg navbar-dark navbar-kua
    {{ $tampilkanTopbar ? 'with-topbar' : 'without-topbar' }}">

    <div class="container">


        {{-- =================================================
        LOGO + BRAND
        ================================================== --}}

        <a
            class="navbar-brand d-flex align-items-center fw-bold"
            href="{{ route('landing') }}">

            <img
                src="{{ asset('7.png') }}"
                alt="Logo KUA Karang Baru"
                class="logo-kua me-2">


            <div class="brand-text running-brand">

                <div class="running-wrapper">

                    <span>
                        KUA Karang Baru
                    </span>

                </div>

                <small class="d-block">
                    Kantor Urusan Agama Kecamatan Karang Baru
                </small>

            </div>

        </a>



        {{-- =================================================
        BUTTON MOBILE
        ================================================== --}}

        <button
            class="navbar-toggler border-0 shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarKua"
            aria-controls="navbarKua"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>



        {{-- =================================================
        NAVIGATION MENU
        ================================================== --}}

        <div
            class="collapse navbar-collapse"
            id="navbarKua">

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">


                {{-- =================================================
                BERANDA
                ================================================== --}}

                <li class="nav-item">

                    <a
                        href="{{ route('landing.beranda') }}"
                        class="nav-link">

                        <i class="fas fa-home me-1"></i>

                        Beranda

                    </a>

                </li>



                {{-- =================================================
                PROFIL
                ================================================== --}}

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdownProfil"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-user-shield me-1"></i>

                        Profil

                    </a>


                    <ul
                        class="dropdown-menu dropdown-menu-dark shadow-lg border-0 rounded-3 mt-2"
                        aria-labelledby="navbarDropdownProfil">

                        <li>

                            <a
                                class="dropdown-item py-2 px-3 rounded-2 mb-1 text-light"
                                href="{{ route('landing.sejarah') }}">

                                <i class="fas fa-history text-info me-2 small"></i>

                                Sejarah Singkat

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item py-2 px-3 rounded-2 mb-1 text-light"
                                href="{{ route('landing.visimisi') }}">

                                <i class="fas fa-bullseye text-info me-2 small"></i>

                                Visi & Misi

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item py-2 px-3 rounded-2 mb-1 text-light"
                                href="{{ route('landing.tentang') }}">

                                <i class="fas fa-info-circle text-info me-2 small"></i>

                                Tentang Kami

                            </a>

                        </li>


                        <li>

                            <hr class="dropdown-divider border-secondary opacity-25">

                        </li>


                        <li>

                            <a
                                class="dropdown-item py-2 px-3 rounded-2 text-light"
                                href="{{ url('/struktur-organisasi') }}">

                                <i class="fas fa-sitemap text-info me-2 small"></i>

                                Struktur Organisasi

                            </a>

                        </li>

                    </ul>

                </li>



                {{-- =================================================
                LAYANAN
                ================================================== --}}

                <li class="nav-item dropdown layanan-dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdownLayanan"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-concierge-bell me-1"></i>

                        Layanan

                    </a>


                    <div
                        class="dropdown-menu layanan-menu shadow-lg border-0"
                        aria-labelledby="navbarDropdownLayanan">


                        <div class="layanan-title">

                            <i class="fas fa-concierge-bell me-2"></i>

                            LAYANAN KUA

                        </div>


                        <div class="dropdown-divider border-secondary opacity-25 my-1"></div>


                        @foreach ($dataLayananNavbar as $item)

                        <a
                            class="layanan-item"
                            href="{{ route('layanan.show', $item->id) }}">

                            <i class="fas fa-chevron-right"></i>

                            {{ $item->judul }}

                        </a>

                        @endforeach

                    </div>

                </li>



                {{-- =================================================
                BERITA
                ================================================== --}}

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('landing.berita') }}">

                        <i class="fas fa-newspaper me-1"></i>

                        <span>Berita</span>

                    </a>

                </li>



                {{-- =================================================
                PERSYARATAN
                ================================================== --}}

                <li class="nav-item">

                    <a
                        href="{{ route('landing.persyaratan') }}"
                        class="nav-link">

                        <i class="fas fa-clipboard-check me-1"></i>

                        <span>Persyaratan</span>

                    </a>

                </li>



                {{-- =================================================
                PENCARIAN
                ================================================== --}}

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



                {{-- =================================================
                SARAN & PENGADUAN
                ================================================== --}}

                <li class="nav-item">

                    <a
                        href="{{ route('landing.saran.create') }}"
                        class="nav-link {{ request()->routeIs('landing.saran.*') ? 'active' : '' }}">

                        <i class="fas fa-comment-dots me-1"></i>

                        <span>Tanya</span>

                    </a>

                </li>

            </ul>



            {{-- =================================================
            BUTTON NAVBAR
            ================================================== --}}

            <div class="d-flex align-items-center gap-2 navbar-buttons flex-nowrap">


                {{-- LOGIN --}}

                <a
                    href="{{ route('login') }}"
                    class="btn btn-login-admin btn-sm rounded-pill px-3">

                    <i class="fas fa-user-shield me-1"></i>

                    <span>Login Role</span>

                </a>



                {{-- LOKASI --}}

                <a
                    href="https://maps.google.com/?q=KUA+Karang+Baru+Aceh+Tamiang"
                    target="_blank"
                    class="btn btn-location rounded-pill px-3 d-inline-flex align-items-center gap-2"
                    title="Lokasi KUA Karang Baru di Google Maps">

                    <i class="fas fa-map-marker-alt text-danger"></i>

                    <span class="location-text">
                        Lokasi
                    </span>

                </a>

            </div>

        </div>

    </div>

</nav>



{{-- =========================================================
NAVBAR CSS
========================================================= --}}

<style>

/* =========================================================
   SEARCH
========================================================= */

.search-navbar {

    display: flex;

    align-items: center;

    width: 170px;

    height: 40px;

    background: #ffffff;

    border-radius: 25px;

    padding: 0 6px 0 15px;

    box-shadow:
        0 3px 10px rgba(0,0,0,.12);

}

.search-input {

    width: 100%;

    height: 100%;

    border: none;

    outline: none;

    background: transparent;

    color: #333;

    font-size: 14px;

}

.search-input::placeholder {

    color: #777;

}

.search-button {

    width: 32px;

    height: 32px;

    border: none;

    background: transparent;

    color: #777;

    display: flex;

    align-items: center;

    justify-content: center;

    cursor: pointer;

    border-radius: 50%;

    transition: .3s;

}

.search-button:hover {

    color: #15803d;

    background: rgba(22,163,74,.10);

}



/* =========================================================
   MENU NAVBAR
========================================================= */

.navbar-kua .navbar-nav {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 3px;

    flex-wrap: nowrap;

}

.navbar-kua .navbar-nav > .nav-item {

    display: flex;

    align-items: center;

}

.navbar-kua .navbar-nav > .nav-item > .nav-link {

    min-width: 105px;

    height: 42px;

    display: flex;

    align-items: center;

    justify-content: center;

    text-align: center;

    padding: 9px 10px !important;

    margin: 0 1px;

    border-radius: 10px;

    white-space: nowrap;

    transform: none !important;

}

.navbar-kua .navbar-nav > .nav-item > .nav-link i {

    width: 18px;

    min-width: 18px;

    text-align: center;

    flex-shrink: 0;

}

.navbar-kua .navbar-nav .search-nav-item {

    margin-left: 5px;

}

.navbar-kua .navbar-nav .search-navbar {

    width: 165px;

    height: 40px;

    flex-shrink: 0;

}

.navbar-kua .navbar-buttons {

    flex-shrink: 0;

    white-space: nowrap;

}

.navbar-kua .navbar-buttons .btn {

    height: 40px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    white-space: nowrap;

    margin: 0 !important;

}

.navbar-kua .btn-login-admin {

    min-width: 125px;

}

.navbar-kua .btn-location {

    min-width: 95px;

}



/* =========================================================
   TOP RUNNING BAR
   HIJAU TEMA LOGIN
========================================================= */

.top-navbar-kua {

    position: fixed;

    top: 0;

    left: 0;

    width: 100%;

    height: 42px;

    z-index: 1051;

    background:
        linear-gradient(
            90deg,
            #14532d 0%,
            #166534 35%,
            #15803d 65%,
            #166534 100%
        );

    color: #ffffff;

    box-shadow:
        0 3px 12px rgba(0,0,0,.20);

    overflow: hidden;

    border-bottom:
        1px solid rgba(255,255,255,.10);

}



/* =========================================================
   RUNNING TEXT
========================================================= */

.top-marquee {

    position: relative;

    width: 100%;

    height: 42px;

    display: flex;

    align-items: center;

    overflow: hidden;

    padding-right: 210px;

}

.top-welcome {

    position: absolute;

    left: 100%;

    width: max-content;

    white-space: nowrap;

    display: block;

    font-size: 13px;

    font-weight: 500;

    letter-spacing: .2px;

    color: #ffffff;

    animation:
        topRunningText 35s linear infinite;

}

.top-welcome i {

    color: #bbf7d0;

}



/* =========================================================
   ANIMASI RUNNING TEXT
========================================================= */

@keyframes topRunningText {

    from {

        transform:
            translateX(0);

    }

    to {

        transform:
            translateX(-120%);

    }

}



/* =========================================================
   TANGGAL
========================================================= */

.top-date-kua {

    position: absolute;

    top: 0;

    right: 0;

    height: 42px;

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 0 18px;

    min-width: 205px;

    font-size: 12px;

    font-weight: 600;

    letter-spacing: .2px;

    color: #ffffff;

    background:
        rgba(5,46,22,.45);

    border-left:
        1px solid rgba(255,255,255,.18);

    backdrop-filter: blur(8px);

    -webkit-backdrop-filter: blur(8px);

    white-space: nowrap;

    z-index: 10;

}

.top-date-kua i {

    color: #bbf7d0;

    font-size: 13px;

}



/* =========================================================
   NAVBAR UTAMA
========================================================= */

.navbar-kua {

    position: fixed !important;

    left: 0;

    width: 100%;

    background:
        rgba(8,18,35,.96) !important;

    backdrop-filter: blur(18px);

    -webkit-backdrop-filter: blur(18px);

    border-bottom:
        1px solid rgba(255,255,255,.08);

    box-shadow:
        0 8px 30px rgba(0,0,0,.25);

    padding-top: 10px;

    padding-bottom: 10px;

    transition: all .3s ease;

}



/* TOPBAR ADA */

.navbar-kua.with-topbar {

    top: 42px !important;

}



/* TOPBAR TIDAK ADA */

.navbar-kua.without-topbar {

    top: 0 !important;

}



/* =========================================================
   LOGO
========================================================= */

.logo-kua {

    width: 48px;

    height: 48px;

    object-fit: contain;

    border-radius: 10px;

    background: transparent !important;

    padding: 0;

    transition: all .3s ease;

}

.navbar-brand:hover .logo-kua {

    transform: scale(1.05);

}



/* =========================================================
   BRAND
========================================================= */

.brand-text {

    min-width: 0;

}

.running-brand {

    width: 190px;

    overflow: hidden;

    white-space: nowrap;

    position: relative;

}

.running-wrapper {

    width: 100%;

    overflow: hidden;

    position: relative;

}

.running-wrapper span {

    display: inline-block;

    font-size: 21px;

    font-weight: 700;

    letter-spacing: 1px;

    background:
        linear-gradient(
            90deg,
            #ffffff,
            #bbf7d0
        );

    -webkit-background-clip: text;

    -webkit-text-fill-color: transparent;

    animation:
        runningText 9s linear infinite;

}

@keyframes runningText {

    0% {

        transform:
            translateX(100%);

    }

    100% {

        transform:
            translateX(-100%);

    }

}

.brand-text small {

    font-size: 9px;

    font-weight: 500;

    letter-spacing: .5px;

    color: #94a3b8;

    overflow: hidden;

    text-overflow: ellipsis;

}



/* =========================================================
   MENU
========================================================= */

.navbar-kua .nav-link {

    color: #cbd5e1 !important;

    font-size: 14px;

    font-weight: 500;

    padding: 9px 14px !important;

    margin: 0 2px;

    border-radius: 10px;

    position: relative;

    transition: all .3s ease;

}

.navbar-kua .nav-link i {

    color: #64748b;

    transition: all .3s ease;

}

.navbar-kua .nav-link:hover {

    color: #ffffff !important;

    background:
        rgba(255,255,255,.07);

    transform:
        translateY(-1px);

}

.navbar-kua .nav-link:hover i {

    color: #4ade80;

}

.navbar-kua .nav-link.active {

    color: #ffffff !important;

    background:
        rgba(22,163,74,.15);

}

.navbar-kua .nav-link.active i {

    color: #4ade80;

}

.navbar-kua .nav-link.active::after {

    content: "";

    position: absolute;

    left: 50%;

    bottom: 3px;

    width: 25px;

    height: 2px;

    transform:
        translateX(-50%);

    border-radius: 20px;

    background: #22c55e;

    box-shadow:
        0 0 10px #22c55e;

}



/* =========================================================
   DROPDOWN PROFIL
========================================================= */

.dropdown-menu .dropdown-item {

    font-size: 13px;

    font-weight: 500;

    transition: all .2s ease;

}

.dropdown-menu .dropdown-item:hover {

    background:
        rgba(34,197,94,.15) !important;

    color: #4ade80 !important;

    transform:
        translateX(4px);

}

.dropdown-menu .dropdown-item:hover i {

    color: #4ade80 !important;

}



/* =========================================================
   LAYANAN
========================================================= */

.layanan-dropdown {

    position: relative;

}

.layanan-menu {

    width: 270px;

    padding: 10px;

    margin-top: 10px !important;

    background: #111c2e !important;

    border-radius: 10px !important;

    box-shadow:
        0 12px 35px rgba(0,0,0,.25) !important;

    border-top:
        3px solid #22c55e !important;

}

.layanan-title {

    color: #ffffff;

    font-weight: 600;

    font-size: 14px;

    padding: 9px 10px;

    display: flex;

    align-items: center;

}

.layanan-title i {

    color: #4ade80;

}

.layanan-item {

    color: #ffffff !important;

    padding: 9px 10px;

    display: flex;

    align-items: center;

    text-decoration: none;

    border-radius: 7px;

    transition: all .2s ease;

    font-size: 13px;

}

.layanan-item i {

    margin-right: 10px;

    font-size: 10px;

    color: #4ade80;

}

.layanan-item:hover {

    background:
        rgba(34,197,94,.10);

    color: #4ade80 !important;

    transform:
        translateX(4px);

}

.layanan-dropdown > .nav-link.show {

    color: #4ade80 !important;

    background:
        rgba(34,197,94,.10) !important;

}

.layanan-dropdown > .nav-link.show i {

    color: #4ade80 !important;

}

.layanan-dropdown .dropdown-toggle::after {

    margin-left: 5px;

    vertical-align: middle;

    border-top-color: #22c55e;

    transition: transform .25s ease;

}

.layanan-dropdown .dropdown-toggle.show::after {

    transform:
        rotate(180deg);

}

@media (min-width: 992px) {

    .layanan-menu {

        position: absolute;

        left: 50%;

        transform:
            translateX(-50%);

    }

}



/* =========================================================
   LOGIN ROLE
========================================================= */

.btn-login-admin {

    background:
        linear-gradient(
            135deg,
            #15803d,
            #22c55e
        );

    color: #ffffff !important;

    border:
        1px solid #22c55e !important;

    font-weight: 600;

    box-shadow:
        0 5px 18px rgba(22,163,74,.30);

    transition: all .3s ease;

}

.btn-login-admin:hover {

    background:
        linear-gradient(
            135deg,
            #166534,
            #16a34a
        );

    color: #ffffff !important;

    transform:
        translateY(-2px);

    box-shadow:
        0 8px 25px rgba(34,197,94,.40);

}



/* =========================================================
   LOKASI
========================================================= */

.btn-location {

    border:
        1px solid rgba(255,255,255,.2) !important;

    background:
        rgba(255,255,255,.05);

    color: #e2e8f0 !important;

    font-size: 13px;

    font-weight: 500;

    transition: all .3s ease;

}

.btn-location:hover {

    background:
        rgba(220,53,69,.15);

    border-color:
        #dc3545 !important;

    color: #ffffff !important;

    transform:
        translateY(-2px);

    box-shadow:
        0 4px 15px rgba(220,53,69,.3);

}



/* =========================================================
   MOBILE TOGGLER
========================================================= */

.navbar-toggler {

    padding: 6px 8px;

    border-radius: 8px;

}

.navbar-toggler:focus {

    box-shadow:
        0 0 0 3px rgba(34,197,94,.20);

}



/* =========================================================
   TABLET / MOBILE
========================================================= */

@media (max-width: 991px) {

    .navbar-kua .navbar-nav {

        display: block;

    }

    .navbar-kua .navbar-nav > .nav-item {

        display: block;

        width: 100%;

    }

    .navbar-kua .navbar-nav > .nav-item > .nav-link {

        width: 100%;

        min-width: 0;

        justify-content: flex-start;

        text-align: left;

    }

    .navbar-kua .navbar-nav .search-nav-item {

        margin: 8px 0;

    }

    .navbar-kua .navbar-nav .search-navbar {

        width: 100%;

        height: 42px;

    }

    .navbar-kua {

        padding-top: 8px;

        padding-bottom: 8px;

    }

    .navbar-kua .navbar-collapse {

        margin-top: 15px;

        padding: 15px;

        border-radius: 15px;

        background:
            rgba(15,30,50,.98);

        border:
            1px solid rgba(255,255,255,.08);

    }

    .navbar-kua .nav-link {

        margin-bottom: 4px;

    }

    .navbar-kua .nav-link.active::after {

        display: none;

    }

    .navbar-buttons {

        margin-top: 15px;

    }

    .navbar-buttons a {

        flex: 1;

        text-align: center;

    }

    .layanan-menu {

        width: 100%;

        margin-top: 5px !important;

        padding: 10px;

        border-radius: 12px !important;

        border-top:
            2px solid #22c55e !important;

        background:
            #111c2e !important;

    }

    .layanan-title {

        font-size: 14px;

        margin-bottom: 5px;

    }

    .layanan-item {

        font-size: 14px;

        padding: 8px 5px;

    }

}



/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .top-navbar-kua {

        height: 38px;

    }

    .top-marquee {

        height: 38px;

        padding-right: 160px;

    }

    .top-welcome {

        font-size: 11px;

        animation-duration: 28s;

    }

    .top-date-kua {

        height: 38px;

        min-width: 155px;

        padding: 0 10px;

        font-size: 10px;

    }

    .top-date-kua i {

        font-size: 11px;

    }

    .navbar-kua.with-topbar {

        top: 38px !important;

    }

    .navbar-kua.without-topbar {

        top: 0 !important;

    }

}



/* =========================================================
   MOBILE KECIL
========================================================= */

@media (max-width: 576px) {

    .logo-kua {

        width: 42px;

        height: 42px;

    }

    .running-brand {

        width: 155px;

    }

    .running-wrapper span {

        font-size: 18px;

    }

    .brand-text small {

        font-size: 8px;

    }

    .navbar-buttons {

        flex-direction: column;

    }

    .navbar-buttons a {

        width: 100%;

    }

}



/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media (max-width: 400px) {

    .top-date-kua {

        min-width: 135px;

        padding: 0 7px;

        font-size: 9px;

    }

    .top-date-kua i {

        margin-right: 4px !important;

        font-size: 10px;

    }

}



/* =========================================================
   AKSESIBILITAS
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .top-welcome {

        animation: none;

        left: 15px;

    }

    .running-wrapper span {

        animation: none;

    }

}

</style>



{{-- =========================================================
JAVASCRIPT TANGGAL
HANYA DIJALANKAN KALAU TOPBAR ADA
========================================================= --}}

@if ($tampilkanTopbar)

<script>

document.addEventListener(
    'DOMContentLoaded',
    function() {

        const tanggalElement =
            document.getElementById(
                'tanggalKua'
            );


        if (!tanggalElement) {

            return;

        }


        function tampilkanTanggal() {

            const sekarang =
                new Date();


            const hari = [

                'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu'

            ];


            const bulan = [

                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'

            ];


            const namaHari =
                hari[
                    sekarang.getDay()
                ];


            const tanggal =
                sekarang.getDate();


            const namaBulan =
                bulan[
                    sekarang.getMonth()
                ];


            const tahun =
                sekarang.getFullYear();


            tanggalElement.textContent =

                namaHari +
                ', ' +
                tanggal +
                ' ' +
                namaBulan +
                ' ' +
                tahun;

        }


        tampilkanTanggal();


        setInterval(
            tampilkanTanggal,
            60000
        );

    }
);

</script>

@endif