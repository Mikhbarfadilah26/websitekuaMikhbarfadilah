
@extends('layouts.appadmin')

@section('title', 'Laporan')

@section('page-title', 'Laporan')

@section('breadcrumb', 'Laporan')

@section('content')

@php
    use App\Models\Berita;
    use App\Models\Layanan;
    use App\Models\Saran;

    /*
    |--------------------------------------------------------------------------
    | STATISTIK BERITA
    |--------------------------------------------------------------------------
    */

    $totalBerita = Berita::count();

    $beritaHariIni = Berita::whereDate(
        'created_at',
        today()
    )->count();

    $beritaBulanIni = Berita::whereYear(
        'created_at',
        now()->year
    )->whereMonth(
        'created_at',
        now()->month
    )->count();

    /*
    |--------------------------------------------------------------------------
    | STATISTIK DATA LAINNYA
    |--------------------------------------------------------------------------
    */

    $totalLayanan = Layanan::count();

    $totalSaran = Saran::whereNull('berita_id')->count();

    $totalKomentar = Saran::whereNotNull('berita_id')->count();

    $namaBulan = now()->translatedFormat('F Y');

    $tanggalHariIni = now()->translatedFormat('d F Y');
@endphp


<div class="container-fluid halaman-laporan">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="laporan-header mb-4">

        <div class="laporan-header-content">

            <span class="laporan-eyebrow">
                PUSAT INFORMASI ADMINISTRATOR
            </span>

            <h3 class="laporan-title">
                <i class="bi bi-bar-chart-line-fill"></i>
                Laporan
            </h3>

            <p class="laporan-subtitle">
                Pantau informasi dan perkembangan data layanan
                KUA Kecamatan Karang Baru.
            </p>

            <div class="laporan-date">
                <i class="bi bi-calendar3"></i>
                {{ $tanggalHariIni }}
            </div>

        </div>

        <div class="laporan-header-icon">
            <i class="bi bi-clipboard-data"></i>
        </div>

        <div class="header-circle circle-one"></div>
        <div class="header-circle circle-two"></div>

    </div>


    {{-- =====================================================
         RINGKASAN STATISTIK BERITA
    ====================================================== --}}

    <div class="section-heading mb-3">

        <div>
            <span class="section-eyebrow">
                RINGKASAN PUBLIKASI
            </span>

            <h5>Statistik Berita</h5>

            <p>
                Informasi jumlah berita yang telah dipublikasikan.
            </p>
        </div>

        <div class="section-icon">
            <i class="bi bi-newspaper"></i>
        </div>

    </div>


    <div class="row g-3 mb-4">

        {{-- TOTAL BERITA --}}
        <div class="col-xl-4 col-md-6">

            <div class="statistik-card">

                <div class="statistik-top">

                    <div class="statistik-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>

                    <span class="statistik-label">
                        KESELURUHAN
                    </span>

                </div>

                <div class="statistik-number">
                    {{ number_format($totalBerita) }}
                </div>

                <div class="statistik-title">
                    Total Berita
                </div>

                <p class="statistik-description">
                    Seluruh berita yang tersimpan dalam sistem.
                </p>

                <div class="statistik-decoration">
                    <i class="bi bi-newspaper"></i>
                </div>

            </div>

        </div>


        {{-- BERITA HARI INI --}}
        <div class="col-xl-4 col-md-6">

            <div class="statistik-card">

                <div class="statistik-top">

                    <div class="statistik-icon">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>

                    <span class="statistik-label">
                        HARI INI
                    </span>

                </div>

                <div class="statistik-number">
                    {{ number_format($beritaHariIni) }}
                </div>

                <div class="statistik-title">
                    Berita Hari Ini
                </div>

                <p class="statistik-description">
                    Berita yang diunggah pada {{ $tanggalHariIni }}.
                </p>

                <div class="statistik-decoration">
                    <i class="bi bi-calendar-check"></i>
                </div>

            </div>

        </div>


        {{-- BERITA BULAN INI --}}
        <div class="col-xl-4 col-md-6">

            <div class="statistik-card">

                <div class="statistik-top">

                    <div class="statistik-icon">
                        <i class="bi bi-calendar-month-fill"></i>
                    </div>

                    <span class="statistik-label">
                        BULAN INI
                    </span>

                </div>

                <div class="statistik-number">
                    {{ number_format($beritaBulanIni) }}
                </div>

                <div class="statistik-title">
                    Berita Bulan Ini
                </div>

                <p class="statistik-description">
                    Jumlah berita yang diunggah selama {{ $namaBulan }}.
                </p>

                <div class="statistik-decoration">
                    <i class="bi bi-calendar-month"></i>
                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         RINGKASAN DATA LAINNYA
    ====================================================== --}}

    <div class="section-heading mb-3">

        <div>
            <span class="section-eyebrow">
                DATA PENGELOLAAN
            </span>

            <h5>Ringkasan Data Website</h5>

            <p>
                Jumlah data layanan dan interaksi masyarakat.
            </p>
        </div>

        <div class="section-icon">
            <i class="bi bi-database-check"></i>
        </div>

    </div>


    <div class="row g-3 mb-4">

        {{-- LAYANAN --}}
        <div class="col-xl-4 col-md-6">

            <div class="mini-stat-card">

                <div class="mini-stat-icon">
                    <i class="bi bi-grid-fill"></i>
                </div>

                <div>
                    <span>Total Layanan</span>

                    <h4>
                        {{ number_format($totalLayanan) }}
                    </h4>

                    <small>
                        Layanan yang tersedia
                    </small>
                </div>

            </div>

        </div>


        {{-- SARAN --}}
        <div class="col-xl-4 col-md-6">

            <div class="mini-stat-card">

                <div class="mini-stat-icon">
                    <i class="bi bi-envelope-paper-fill"></i>
                </div>

                <div>
                    <span>Saran & Pengaduan</span>

                    <h4>
                        {{ number_format($totalSaran) }}
                    </h4>

                    <small>
                        Pesan dari masyarakat
                    </small>
                </div>

            </div>

        </div>


        {{-- KOMENTAR --}}
        <div class="col-xl-4 col-md-6">

            <div class="mini-stat-card">

                <div class="mini-stat-icon">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>

                <div>
                    <span>Komentar Berita</span>

                    <h4>
                        {{ number_format($totalKomentar) }}
                    </h4>

                    <small>
                        Komentar pada berita
                    </small>
                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         MENU LAPORAN
    ====================================================== --}}

    <div class="section-heading mb-3">

        <div>
            <span class="section-eyebrow">
                AKSES PENGELOLAAN
            </span>

            <h5>Menu Laporan</h5>

            <p>
                Pilih bagian yang ingin dilihat atau dikelola.
            </p>
        </div>

        <div class="section-icon">
            <i class="bi bi-folder2-open"></i>
        </div>

    </div>


    <div class="row g-3">

        {{-- LAPORAN BERITA --}}
        <div class="col-xl-4 col-md-6">

            <div class="laporan-card">

                <div class="laporan-card-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <div class="laporan-card-body">

                    <span class="card-category">
                        PUBLIKASI
                    </span>

                    <h5>Laporan Berita</h5>

                    <p>
                        Melihat dan mengelola seluruh data berita
                        yang telah dipublikasikan oleh administrator.
                    </p>

                    <div class="card-data">
                        <span>Total berita</span>

                        <strong>
                            {{ number_format($totalBerita) }} Data
                        </strong>
                    </div>

                    <a href="{{ route('admin.berita.index') }}"
                       class="btn-laporan">

                        <span>
                            Lihat Berita
                        </span>

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>


        {{-- LAPORAN LAYANAN --}}
        <div class="col-xl-4 col-md-6">

            <div class="laporan-card">

                <div class="laporan-card-icon">
                    <i class="bi bi-grid-fill"></i>
                </div>

                <div class="laporan-card-body">

                    <span class="card-category">
                        PELAYANAN
                    </span>

                    <h5>Laporan Layanan</h5>

                    <p>
                        Melihat informasi dan data layanan
                        yang tersedia pada sistem KUA.
                    </p>

                    <div class="card-data">
                        <span>Total layanan</span>

                        <strong>
                            {{ number_format($totalLayanan) }} Data
                        </strong>
                    </div>

                    <a href="{{ route('admin.layanan.index') }}"
                       class="btn-laporan">

                        <span>
                            Lihat Layanan
                        </span>

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>


        {{-- LAPORAN SARAN --}}
        <div class="col-xl-4 col-md-6">

            <div class="laporan-card">

                <div class="laporan-card-icon">
                    <i class="bi bi-chat-square-text-fill"></i>
                </div>

                <div class="laporan-card-body">

                    <span class="card-category">
                        INTERAKSI MASYARAKAT
                    </span>

                    <h5>Saran & Pengaduan</h5>

                    <p>
                        Melihat dan menanggapi saran,
                        pengaduan, serta komentar masyarakat.
                    </p>

                    <div class="card-data">
                        <span>Total pesan</span>

                        <strong>
                            {{ number_format($totalSaran + $totalKomentar) }} Data
                        </strong>
                    </div>

                    <a href="{{ route('admin.saran.index') }}"
                       class="btn-laporan">

                        <span>
                            Lihat Pesan
                        </span>

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         INFORMASI
    ====================================================== --}}

    <div class="info-laporan mt-4">

        <div class="info-icon">
            <i class="bi bi-info-circle-fill"></i>
        </div>

        <div class="info-content">

            <strong>Informasi Laporan</strong>

            <p class="mb-0">
                Statistik berita diperbarui berdasarkan data yang tersimpan
                pada sistem. Berita hari ini dihitung berdasarkan tanggal
                unggah, sedangkan berita bulan ini dihitung berdasarkan
                bulan dan tahun berjalan.
            </p>

        </div>

    </div>

</div>


{{-- =====================================================
     CSS TEMA HIJAU SOFT
====================================================== --}}

<style>

    :root {
        --laporan-dark: #285b46;
        --laporan-green: #39765b;
        --laporan-medium: #6c9b7d;
        --laporan-soft: #eaf2ec;
        --laporan-light: #f3f7f3;
        --laporan-border: #dce8de;
        --laporan-text: #34483c;
        --laporan-muted: #7b8c80;
    }

    .halaman-laporan {
        padding-bottom: 25px;
        color: var(--laporan-text);
    }


    /* HEADER */

    .laporan-header {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 190px;
        padding: 30px 34px;
        overflow: hidden;
        border-radius: 17px;
        color: white;
        background: linear-gradient(
            120deg,
            #285b46 0%,
            #39765b 55%,
            #638e70 100%
        );
        box-shadow: 0 8px 22px rgba(40, 91, 70, .12);
    }

    .laporan-header-content {
        position: relative;
        z-index: 2;
    }

    .laporan-eyebrow {
        display: block;
        margin-bottom: 9px;
        color: #dcebe0;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 1.5px;
    }

    .laporan-title {
        display: flex;
        align-items: center;
        gap: 11px;
        margin: 0;
        color: #fff;
        font-size: 25px;
        font-weight: 750;
    }

    .laporan-title i {
        font-size: 25px;
    }

    .laporan-subtitle {
        margin: 8px 0 0;
        color: rgba(255,255,255,.84);
        font-size: 12px;
    }

    .laporan-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 15px;
        padding: 7px 11px;
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 7px;
        background: rgba(255,255,255,.12);
        color: white;
        font-size: 10px;
    }

    .laporan-header-icon {
        position: relative;
        z-index: 2;
        margin-right: 35px;
        color: rgba(255,255,255,.23);
        font-size: 85px;
    }

    .header-circle {
        position: absolute;
        border: 1px solid rgba(255,255,255,.09);
        border-radius: 50%;
    }

    .circle-one {
        width: 210px;
        height: 210px;
        top: -110px;
        right: 80px;
    }

    .circle-two {
        width: 155px;
        height: 155px;
        right: -25px;
        bottom: -95px;
    }


    /* SECTION HEADING */

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .section-eyebrow {
        display: block;
        margin-bottom: 5px;
        color: var(--laporan-medium);
        font-size: 9px;
        font-weight: 750;
        letter-spacing: 1.3px;
    }

    .section-heading h5 {
        margin: 0;
        color: var(--laporan-dark);
        font-size: 16px;
        font-weight: 750;
    }

    .section-heading p {
        margin: 5px 0 0;
        color: var(--laporan-muted);
        font-size: 10px;
    }

    .section-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 39px;
        height: 39px;
        border-radius: 11px;
        background: var(--laporan-soft);
        color: var(--laporan-green);
        font-size: 17px;
    }


    /* STATISTIK BERITA */

    .statistik-card {
        position: relative;
        height: 100%;
        min-height: 175px;
        padding: 19px;
        overflow: hidden;
        border: 1px solid var(--laporan-border);
        border-radius: 15px;
        background: #fff;
        transition: .25s ease;
    }

    .statistik-card:hover {
        transform: translateY(-3px);
        border-color: #b8cfbd;
        box-shadow: 0 9px 22px rgba(40, 91, 70, .08);
    }

    .statistik-top {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .statistik-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: var(--laporan-soft);
        color: var(--laporan-green);
        font-size: 19px;
    }

    .statistik-label {
        padding: 6px 9px;
        border-radius: 20px;
        background: var(--laporan-light);
        color: var(--laporan-green);
        font-size: 8px;
        font-weight: 750;
        letter-spacing: .5px;
    }

    .statistik-number {
        position: relative;
        z-index: 2;
        margin-top: 13px;
        color: var(--laporan-dark);
        font-size: 29px;
        font-weight: 750;
        line-height: 1.2;
    }

    .statistik-title {
        position: relative;
        z-index: 2;
        margin-top: 4px;
        color: var(--laporan-text);
        font-size: 12px;
        font-weight: 700;
    }

    .statistik-description {
        position: relative;
        z-index: 2;
        margin: 4px 0 0;
        color: var(--laporan-muted);
        font-size: 10px;
    }

    .statistik-decoration {
        position: absolute;
        right: 12px;
        bottom: 0;
        color: rgba(57, 118, 91, .055);
        font-size: 90px;
    }


    /* MINI STATISTIK */

    .mini-stat-card {
        display: flex;
        align-items: center;
        gap: 14px;
        height: 100%;
        min-height: 105px;
        padding: 18px;
        border: 1px solid var(--laporan-border);
        border-radius: 14px;
        background: #fff;
        transition: .2s ease;
    }

    .mini-stat-card:hover {
        border-color: #b8cfbd;
        box-shadow: 0 7px 17px rgba(40, 91, 70, .06);
    }

    .mini-stat-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        min-width: 46px;
        border-radius: 13px;
        background: var(--laporan-soft);
        color: var(--laporan-green);
        font-size: 20px;
    }

    .mini-stat-card span {
        color: var(--laporan-muted);
        font-size: 10px;
        font-weight: 600;
    }

    .mini-stat-card h4 {
        margin: 3px 0;
        color: var(--laporan-dark);
        font-size: 22px;
        font-weight: 750;
    }

    .mini-stat-card small {
        color: var(--laporan-muted);
        font-size: 9px;
    }


    /* MENU LAPORAN */

    .laporan-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid var(--laporan-border);
        border-radius: 15px;
        background: #fff;
        transition: .25s ease;
    }

    .laporan-card:hover {
        transform: translateY(-4px);
        border-color: #b8cfbd;
        box-shadow: 0 10px 24px rgba(40, 91, 70, .08);
    }

    .laporan-card-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 105px;
        border-bottom: 1px solid var(--laporan-border);
        background: var(--laporan-light);
        color: var(--laporan-green);
        font-size: 39px;
        transition: .2s ease;
    }

    .laporan-card:hover .laporan-card-icon {
        background: var(--laporan-soft);
    }

    .laporan-card-body {
        padding: 19px;
    }

    .card-category {
        display: inline-block;
        margin-bottom: 9px;
        color: var(--laporan-medium);
        font-size: 8px;
        font-weight: 750;
        letter-spacing: 1px;
    }

    .laporan-card-body h5 {
        margin: 0 0 8px;
        color: var(--laporan-dark);
        font-size: 14px;
        font-weight: 750;
    }

    .laporan-card-body p {
        min-height: 48px;
        margin: 0;
        color: var(--laporan-muted);
        font-size: 10px;
        line-height: 1.7;
    }

    .card-data {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
        margin: 15px 0;
        padding: 10px 11px;
        border: 1px solid var(--laporan-border);
        border-radius: 8px;
        background: var(--laporan-light);
    }

    .card-data span {
        color: var(--laporan-muted);
        font-size: 9px;
    }

    .card-data strong {
        color: var(--laporan-green);
        font-size: 10px;
    }

    .btn-laporan {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        width: 100%;
        padding: 10px 13px;
        border-radius: 8px;
        background: var(--laporan-green);
        color: white !important;
        text-decoration: none;
        font-size: 10px;
        font-weight: 650;
        transition: .2s ease;
    }

    .btn-laporan:hover {
        background: var(--laporan-dark);
        color: white !important;
    }

    .btn-laporan i {
        transition: .2s ease;
    }

    .btn-laporan:hover i {
        transform: translateX(3px);
    }


    /* INFORMASI */

    .info-laporan {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 17px 19px;
        border: 1px solid var(--laporan-border);
        border-radius: 13px;
        background: var(--laporan-light);
    }

    .info-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: 11px;
        background: var(--laporan-soft);
        color: var(--laporan-green);
        font-size: 18px;
    }

    .info-content strong {
        display: block;
        margin-bottom: 4px;
        color: var(--laporan-dark);
        font-size: 11px;
        font-weight: 750;
    }

    .info-content p {
        color: var(--laporan-muted);
        font-size: 10px;
        line-height: 1.7;
    }


    /* RESPONSIVE */

    @media (max-width: 768px) {

        .laporan-header {
            min-height: 165px;
            padding: 23px;
        }

        .laporan-title {
            font-size: 21px;
        }

        .laporan-header-icon {
            margin-right: 0;
            font-size: 55px;
        }

        .statistik-card {
            min-height: 160px;
        }

        .laporan-card-icon {
            height: 90px;
        }

    }

    @media (max-width: 480px) {

        .laporan-header-icon {
            display: none;
        }

        .laporan-title {
            font-size: 19px;
        }

        .laporan-subtitle {
            max-width: 260px;
            line-height: 1.6;
        }

        .section-heading h5 {
            font-size: 14px;
        }

        .info-laporan {
            align-items: flex-start;
        }

    }

</style>

@endsection
