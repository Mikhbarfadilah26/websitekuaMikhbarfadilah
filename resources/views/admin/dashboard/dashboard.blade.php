
@extends('layouts.appadmin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

@php
    use App\Models\Berita;
    use App\Models\Layanan;
    use App\Models\Saran;
    use App\Models\ModelUser;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | STATISTIK DASHBOARD
    |--------------------------------------------------------------------------
    */

    $totalBerita = 0;
    $totalLayanan = 0;
    $totalKomentar = 0;
    $totalPertanyaan = 0;
    $totalMasyarakat = 0;
    $totalPersyaratan = 0;
    $totalSaranDibalas = 0;
    $totalSaranBaru = 0;

    try {
        $totalBerita = Berita::count();
    } catch (\Throwable $e) {}

    try {
        $totalLayanan = Layanan::count();
    } catch (\Throwable $e) {}

    try {
        $totalKomentar = Saran::whereNotNull('berita_id')->count();
    } catch (\Throwable $e) {}

    try {
        $totalPertanyaan = Saran::whereNull('berita_id')->count();
    } catch (\Throwable $e) {}

    try {
        $totalSaranDibalas = Saran::where('status', 'dibalas')->count();
        $totalSaranBaru = Saran::where('status', 'baru')->count();
    } catch (\Throwable $e) {}

    try {
        $totalMasyarakat = ModelUser::where('role', 'masyarakat')->count();
    } catch (\Throwable $e) {}

    try {
        if (Schema::hasTable('persyaratan')) {
            $totalPersyaratan = DB::table('persyaratan')->count();
        }
    } catch (\Throwable $e) {}

    /*
    |--------------------------------------------------------------------------
    | INFORMASI ADMIN
    |--------------------------------------------------------------------------
    */

    $admin = auth()->user();

    $namaAdmin = $admin->nama
        ?? $admin->name
        ?? 'Administrator';

    $fotoAdmin = $admin->foto
        && file_exists(public_path($admin->foto))
            ? asset($admin->foto)
            : asset('7.png');

    $waktu = now()->translatedFormat('l, d F Y');

    /*
    |--------------------------------------------------------------------------
    | MENU ADMINISTRATOR
    |--------------------------------------------------------------------------
    */

    $menuAdmin = [

        [
            'judul' => 'Kelola Berita',
            'deskripsi' => 'Mengelola informasi dan berita terbaru KUA.',
            'icon' => 'bi-newspaper',
            'route' => 'admin.berita.index',
            'jumlah' => $totalBerita,
            'label' => 'Berita',
        ],

        [
            'judul' => 'Kelola Layanan',
            'deskripsi' => 'Mengatur informasi layanan KUA.',
            'icon' => 'bi-grid-fill',
            'route' => 'admin.layanan.index',
            'jumlah' => $totalLayanan,
            'label' => 'Layanan',
        ],

        [
            'judul' => 'Saran dan Pengaduan',
            'deskripsi' => 'Melihat dan menanggapi masukan masyarakat.',
            'icon' => 'bi-chat-left-text-fill',
            'route' => 'admin.saran.index',
            'jumlah' => $totalPertanyaan,
            'label' => 'Masukan',
        ],

        [
            'judul' => 'Kelola Masyarakat',
            'deskripsi' => 'Mengelola akun pengguna masyarakat.',
            'icon' => 'bi-people-fill',
            'route' => 'admin.masyarakat.index',
            'jumlah' => $totalMasyarakat,
            'label' => 'Akun',
        ],

        [
            'judul' => 'Kelola Persyaratan',
            'deskripsi' => 'Mengatur persyaratan setiap layanan.',
            'icon' => 'bi-file-earmark-check-fill',
            'route' => 'admin.persyaratan.index',
            'jumlah' => $totalPersyaratan,
            'label' => 'Persyaratan',
        ],

        [
            'judul' => 'Akun Saya',
            'deskripsi' => 'Melihat dan mengatur profil administrator.',
            'icon' => 'bi-person-circle',
            'route' => 'admin.akun.index',
            'jumlah' => null,
            'label' => null,
        ],

    ];
@endphp


<div class="container-fluid kua-dashboard">

    {{-- =====================================================
         HEADER DASHBOARD
    ====================================================== --}}

    <section class="dashboard-welcome">

        <div class="welcome-left">

            {{-- FOTO PROFIL ADMIN --}}
            <div class="welcome-admin-photo">

                <img
                    src="{{ $fotoAdmin }}"
                    alt="Foto Admin"
                    onerror="this.onerror=null;this.src='{{ asset('7.png') }}';"
                >

            </div>

            {{-- INFORMASI SELAMAT DATANG --}}
            <div class="welcome-information">

                <div class="welcome-greeting">
                    DASHBOARD ADMINISTRATOR
                </div>

                <h3>
                    Selamat Datang, {{ $namaAdmin }}
                </h3>

                <p>
                    Kelola Website Layanan KUA Kecamatan Karang Baru
                    melalui halaman administrator ini.
                </p>

                <div class="welcome-date">
                    <i class="bi bi-calendar3"></i>
                    {{ $waktu }}
                </div>

            </div>

        </div>

        <div class="welcome-decoration">
            <i class="bi bi-flower1"></i>
        </div>

    </section>


    {{-- =====================================================
         STATISTIK
    ====================================================== --}}

    <section class="dashboard-section">

        <div class="dashboard-section-heading">

            <div>
                <span class="section-eyebrow">RINGKASAN DATA</span>
                <h5>Statistik Website</h5>
                <p>Informasi jumlah data yang tersimpan dalam sistem.</p>
            </div>

            <div class="section-heading-icon">
                <i class="bi bi-bar-chart-line-fill"></i>
            </div>

        </div>


        <div class="row g-3">

            {{-- BERITA --}}
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <span class="stat-category">Publikasi</span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalBerita) }}
                    </div>

                    <div class="stat-title">Total Berita</div>
                    <div class="stat-description">Berita yang tersimpan</div>

                </div>
            </div>

            {{-- LAYANAN --}}
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="stat-category">Pelayanan</span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalLayanan) }}
                    </div>

                    <div class="stat-title">Total Layanan</div>
                    <div class="stat-description">Layanan yang tersedia</div>

                </div>
            </div>

            {{-- KOMENTAR --}}
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <span class="stat-category">Interaksi</span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalKomentar) }}
                    </div>

                    <div class="stat-title">Total Komentar</div>
                    <div class="stat-description">Komentar pada berita</div>

                </div>
            </div>

            {{-- PERTANYAAN / SARAN --}}
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="bi bi-question-circle-fill"></i>
                        </div>
                        <span class="stat-category">Masukan</span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalPertanyaan) }}
                    </div>

                    <div class="stat-title">Pertanyaan & Saran</div>
                    <div class="stat-description">Masukan masyarakat</div>

                </div>
            </div>

            {{-- MASYARAKAT --}}
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="stat-category">Pengguna</span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalMasyarakat) }}
                    </div>

                    <div class="stat-title">Total Masyarakat</div>
                    <div class="stat-description">Akun masyarakat terdaftar</div>

                </div>
            </div>

            {{-- PERSYARATAN --}}
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="bi bi-file-earmark-check-fill"></i>
                        </div>
                        <span class="stat-category">Dokumen</span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalPersyaratan) }}
                    </div>

                    <div class="stat-title">Total Persyaratan</div>
                    <div class="stat-description">Dokumen persyaratan layanan</div>

                </div>
            </div>

            {{-- MASUKAN BARU --}}
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="bi bi-bell-fill"></i>
                        </div>
                        <span class="stat-category">Notifikasi</span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalSaranBaru) }}
                    </div>

                    <div class="stat-title">Belum Ditanggapi</div>
                    <div class="stat-description">Masukan dengan status baru</div>

                </div>
            </div>

            {{-- SUDAH DIBALAS --}}
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <span class="stat-category">Selesai</span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalSaranDibalas) }}
                    </div>

                    <div class="stat-title">Sudah Ditanggapi</div>
                    <div class="stat-description">Masukan yang sudah dibalas</div>

                </div>
            </div>

        </div>

    </section>


    {{-- =====================================================
         MODUL ADMINISTRATOR
    ====================================================== --}}

    <section class="dashboard-section module-section">

        <div class="dashboard-section-heading">

            <div>
                <span class="section-eyebrow">PENGELOLAAN SISTEM</span>
                <h5>Modul Administrator</h5>
                <p>Kelola berbagai bagian website melalui modul berikut.</p>
            </div>

            <div class="section-heading-icon">
                <i class="bi bi-window-stack"></i>
            </div>

        </div>


        <div class="row g-3">

            @foreach ($menuAdmin as $menu)

                @if (Route::has($menu['route']))

                    <div class="col-xl-4 col-md-6">

                        <a href="{{ route($menu['route']) }}"
                           class="module-card">

                            <div class="module-icon">
                                <i class="bi {{ $menu['icon'] }}"></i>
                            </div>

                            <div class="module-content">

                                <h6>{{ $menu['judul'] }}</h6>

                                <p>{{ $menu['deskripsi'] }}</p>

                                @if (!is_null($menu['jumlah']))

                                    <span class="module-count">
                                        {{ number_format($menu['jumlah']) }}
                                        {{ $menu['label'] }}
                                    </span>

                                @else

                                    <span class="module-count">
                                        Pengaturan Profil
                                    </span>

                                @endif

                            </div>

                            <div class="module-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </div>

                        </a>

                    </div>

                @endif

            @endforeach

        </div>

    </section>


    {{-- =====================================================
         INFORMASI STATUS
    ====================================================== --}}

    <section class="dashboard-section">

        <div class="system-information">

            <div class="system-information-icon">
                <i class="bi bi-shield-check"></i>
            </div>

            <div class="system-information-content">

                <h6>Panel Administrator KUA Karang Baru</h6>

                <p>
                    Gunakan panel ini untuk mengelola berita, layanan,
                    persyaratan, akun masyarakat, komentar, serta masukan
                    masyarakat pada Website Layanan KUA Kecamatan Karang Baru.
                </p>

            </div>

            <div class="system-status">
                <span></span>
                Sistem Aktif
            </div>

        </div>

    </section>

</div>


{{-- =====================================================
     STYLE DASHBOARD
====================================================== --}}

<style>

    :root {
        --dash-green-dark: #315d49;
        --dash-green: #47785e;
        --dash-green-medium: #71977d;
        --dash-green-soft: #eaf2ec;
        --dash-green-light: #f4f8f4;
        --dash-border: #e3ebe4;
        --dash-text: #35483c;
        --dash-muted: #829087;
        --dash-white: #ffffff;
    }

    .kua-dashboard {
        padding-bottom: 25px;
        color: var(--dash-text);
    }

    /* WELCOME */

    .dashboard-welcome {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        overflow: hidden;
        min-height: 175px;
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 18px;
        color: white;
        background: linear-gradient(120deg, #315d49, #527d63);
        box-shadow: 0 8px 24px rgba(49, 93, 73, .12);
    }

    .welcome-left {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 19px;
        min-width: 0;
    }

    /* FOTO ADMIN */

    .welcome-admin-photo {
        width: 85px;
        height: 85px;
        min-width: 85px;
        padding: 4px;
        border-radius: 50%;
        overflow: hidden;
        background: rgba(255, 255, 255, .25);
        border: 2px solid rgba(255, 255, 255, .65);
        box-shadow: 0 5px 18px rgba(0, 0, 0, .12);
    }

    .welcome-admin-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .welcome-information {
        min-width: 0;
    }

    .welcome-greeting {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
        color: #dcebe0;
        margin-bottom: 7px;
    }

    .dashboard-welcome h3 {
        font-size: 23px;
        font-weight: 700;
        margin: 0 0 7px;
        color: #fff;
    }

    .dashboard-welcome p {
        margin: 0;
        font-size: 12px;
        color: #e5eee7;
        line-height: 1.6;
    }

    .welcome-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 13px;
        padding: 7px 11px;
        border-radius: 8px;
        background: rgba(255, 255, 255, .13);
        color: #fff;
        font-size: 11px;
    }

    .welcome-decoration {
        position: absolute;
        right: 35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 125px;
        color: rgba(255, 255, 255, .08);
    }

    /* SECTION */

    .dashboard-section {
        margin-bottom: 30px;
    }

    .dashboard-section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 17px;
    }

    .section-eyebrow {
        display: block;
        margin-bottom: 5px;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 1.4px;
        color: var(--dash-green-medium);
    }

    .dashboard-section-heading h5 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: var(--dash-green-dark);
    }

    .dashboard-section-heading p {
        margin: 5px 0 0;
        color: var(--dash-muted);
        font-size: 11px;
    }

    .section-heading-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        color: var(--dash-green);
        background: var(--dash-green-soft);
        font-size: 17px;
    }

    /* STAT CARD */

    .stat-card {
        height: 100%;
        min-height: 155px;
        padding: 18px;
        background: var(--dash-white);
        border: 1px solid var(--dash-border);
        border-radius: 14px;
        transition: .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        border-color: #b8cfbd;
        box-shadow: 0 8px 20px rgba(49, 93, 73, .07);
    }

    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
    }

    .stat-icon {
        width: 39px;
        height: 39px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        color: var(--dash-green);
        background: var(--dash-green-soft);
        font-size: 17px;
    }

    .stat-category {
        padding: 5px 9px;
        border-radius: 20px;
        background: var(--dash-green-light);
        color: var(--dash-green);
        font-size: 9px;
        font-weight: 600;
    }

    .stat-number {
        margin-top: 14px;
        color: var(--dash-green-dark);
        font-size: 27px;
        font-weight: 750;
        line-height: 1.2;
    }

    .stat-title {
        margin-top: 4px;
        color: var(--dash-text);
        font-size: 12px;
        font-weight: 700;
    }

    .stat-description {
        margin-top: 3px;
        color: var(--dash-muted);
        font-size: 10px;
    }

    /* MODULE CARD */

    .module-card {
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 14px;
        height: 100%;
        min-height: 125px;
        padding: 19px;
        border: 1px solid var(--dash-border);
        border-radius: 14px;
        background: #fff;
        text-decoration: none;
        transition: .2s ease;
    }

    .module-card:hover {
        transform: translateY(-3px);
        border-color: #b8cfbd;
        box-shadow: 0 9px 22px rgba(49, 93, 73, .08);
        text-decoration: none;
    }

    .module-icon {
        width: 43px;
        height: 43px;
        min-width: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: var(--dash-green-soft);
        color: var(--dash-green);
        font-size: 19px;
    }

    .module-content {
        flex: 1;
        min-width: 0;
    }

    .module-content h6 {
        margin: 1px 0 6px;
        color: var(--dash-green-dark);
        font-size: 13px;
        font-weight: 700;
    }

    .module-content p {
        margin: 0;
        color: var(--dash-muted);
        font-size: 10px;
        line-height: 1.6;
    }

    .module-count {
        display: inline-block;
        margin-top: 10px;
        padding: 5px 9px;
        border-radius: 6px;
        color: var(--dash-green);
        background: var(--dash-green-light);
        font-size: 9px;
        font-weight: 700;
    }

    .module-arrow {
        color: #a6b8aa;
        font-size: 15px;
        transition: .2s ease;
    }

    .module-card:hover .module-arrow {
        color: var(--dash-green);
        transform: translate(2px, -2px);
    }

    /* SYSTEM INFORMATION */

    .system-information {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 19px;
        border: 1px solid var(--dash-border);
        border-radius: 14px;
        background: var(--dash-green-light);
    }

    .system-information-icon {
        width: 43px;
        height: 43px;
        min-width: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        color: var(--dash-green);
        background: #e1ece3;
        font-size: 19px;
    }

    .system-information-content {
        flex: 1;
    }

    .system-information-content h6 {
        margin: 0 0 5px;
        color: var(--dash-green-dark);
        font-size: 12px;
        font-weight: 700;
    }

    .system-information-content p {
        margin: 0;
        color: var(--dash-muted);
        font-size: 10px;
        line-height: 1.7;
    }

    .system-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
        color: var(--dash-green);
        font-size: 10px;
        font-weight: 700;
    }

    .system-status span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #6b9b78;
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .dashboard-welcome {
            min-height: auto;
            padding: 22px 18px;
        }

        .welcome-left {
            align-items: flex-start;
            gap: 12px;
        }

        .welcome-admin-photo {
            width: 62px;
            height: 62px;
            min-width: 62px;
        }

        .dashboard-welcome h3 {
            font-size: 18px;
        }

        .dashboard-welcome p {
            font-size: 11px;
        }

        .welcome-decoration {
            right: 10px;
            font-size: 75px;
        }

        .stat-card {
            min-height: 140px;
            padding: 14px;
        }

        .stat-number {
            font-size: 23px;
        }

        .module-card {
            min-height: 115px;
            padding: 15px;
        }

        .system-information {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .system-information-content {
            min-width: calc(100% - 65px);
        }

        .system-status {
            margin-left: 58px;
        }

    }

    @media (max-width: 380px) {

        .stat-category {
            font-size: 8px;
        }

        .stat-title {
            font-size: 11px;
        }

        .welcome-admin-photo {
            width: 54px;
            height: 54px;
            min-width: 54px;
        }

        .dashboard-welcome h3 {
            font-size: 16px;
        }

    }

</style>

@endsection
