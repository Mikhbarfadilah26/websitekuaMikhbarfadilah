@extends('layouts.appadmin')

@section('title', 'Laporan & Statistik | KUA Karang Baru')

@section('page-title', 'Laporan KUA')

@section('breadcrumb', 'Laporan')

@section('content')

@php
    $namaBulan = now()->translatedFormat('F Y');
    $tanggalHariIni = now()->translatedFormat('d F Y');
@endphp

<div class="container-fluid halaman-laporan py-2">

    {{-- =====================================================
         HEADER / KOP LAPORAN (TAMPIL SAAT DICETAK)
    ====================================================== --}}
    <div class="print-kop text-center mb-4 d-none">
        <h4 class="fw-bold mb-1">KEMENTERIAN AGAMA REPUBLIK INDONESIA</h4>
        <h5 class="fw-bold mb-1">CANTOR URUSAN AGAMA (KUA) KECAMATAN KARANG BARU</h5>
        <p class="text-muted small mb-0">Kabupaten Aceh Tamiang, Provinsi Aceh</p>
        <hr class="mt-2 mb-3 border-dark">
        <h5 class="fw-bold text-uppercase">LAPORAN REKAPITULASI DATA & STATISTIK SISTEM</h5>
        <p class="small text-muted">Per Tanggal Cetak: {{ $tanggalHariIni }}</p>
    </div>


    {{-- =====================================================
         HEADER UI DASHBOARD
    ====================================================== --}}
    <div class="laporan-header mb-4 no-print">
        <div class="laporan-header-content">
            <span class="laporan-eyebrow">
                <i class="bi bi-moon-stars-fill me-1"></i> PUSAT INFORMASI ADMINISTRATOR KUA
            </span>

            <h3 class="laporan-title">
                <i class="bi bi-file-earmark-medical-fill"></i>
                Laporan & Statistik Layanan
            </h3>

            <p class="laporan-subtitle">
                Pantau perkembangan data publikasi, layanan keagamaan, serta interaksi umat 
                KUA Kecamatan Karang Baru secara transparan dan akuntabel.
            </p>

            <div class="d-flex align-items-center gap-3 flex-wrap mt-3">
                <div class="laporan-date mb-0">
                    <i class="bi bi-calendar3 me-1"></i> {{ $tanggalHariIni }}
                </div>

                <!-- Tombol Cetak / Print -->
                <button onclick="window.print()" class="btn btn-light btn-sm fw-bold text-success px-3 py-2 shadow-sm d-inline-flex align-items-center gap-2">
                    <i class="bi bi-printer-fill"></i> Cetak Laporan Resmi
                </button>
            </div>
        </div>

        <div class="laporan-header-icon">
            <i class="bi bi-journal-richtext"></i>
        </div>

        <div class="header-circle circle-one"></div>
        <div class="header-circle circle-two"></div>
    </div>


    {{-- =====================================================
         RINGKASAN STATISTIK BERITA & PUBLIKASI
    ====================================================== --}}
    <div class="section-heading mb-3">
        <div>
            <span class="section-eyebrow">PUBLIKASI & SYIAR INFORMASI</span>
            <h5>Statistik Berita & Informasi</h5>
            <p>Rekapitulasi warta dan kegiatan keagamaan yang telah dipublikasikan.</p>
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
                    <span class="statistik-label">KESELURUHAN</span>
                </div>
                <div class="statistik-number">{{ number_format($totalBerita) }}</div>
                <div class="statistik-title">Total Berita</div>
                <p class="statistik-description">Seluruh warta dan artikel tersimpan dalam sistem.</p>
                <div class="statistik-decoration"><i class="bi bi-newspaper"></i></div>
            </div>
        </div>

        {{-- BERITA HARI INI --}}
        <div class="col-xl-4 col-md-6">
            <div class="statistik-card">
                <div class="statistik-top">
                    <div class="statistik-icon">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <span class="statistik-label">HARI INI</span>
                </div>
                <div class="statistik-number">{{ number_format($beritaHariIni) }}</div>
                <div class="statistik-title">Berita Hari Ini</div>
                <p class="statistik-description">Berita yang diunggah pada tanggal aktif.</p>
                <div class="statistik-decoration"><i class="bi bi-calendar-check"></i></div>
            </div>
        </div>

        {{-- BERITA BULAN INI --}}
        <div class="col-xl-4 col-md-6">
            <div class="statistik-card">
                <div class="statistik-top">
                    <div class="statistik-icon">
                        <i class="bi bi-calendar-month-fill"></i>
                    </div>
                    <span class="statistik-label">BULAN INI</span>
                </div>
                <div class="statistik-number">{{ number_format($beritaBulanIni) }}</div>
                <div class="statistik-title">Berita Bulan Ini</div>
                <p class="statistik-description">Total syiar warta selama periode {{ $namaBulan }}.</p>
                <div class="statistik-decoration"><i class="bi bi-calendar-month"></i></div>
            </div>
        </div>
    </div>


    {{-- =====================================================
         RINGKASAN DATA LAYANAN & UMAT
    ====================================================== --}}
    <div class="section-heading mb-3">
        <div>
            <span class="section-eyebrow">ADMINISTRASI & PELAYANAN UMAT</span>
            <h5>Ringkasan Layanan & Interaksi</h5>
            <p>Data kuantitatif permohonan layanan, konsultasi, dan pengaduan masyarakat.</p>
        </div>
        <div class="section-icon">
            <i class="bi bi-database-check"></i>
        </div>
    </div>

    <div class="row g-3 mb-4">
        {{-- LAYANAN --}}
        <div class="col-xl-3 col-md-6">
            <div class="mini-stat-card">
                <div class="mini-stat-icon">
                    <i class="bi bi-grid-fill"></i>
                </div>
                <div>
                    <span>Jenis Layanan</span>
                    <h4>{{ number_format($totalLayanan) }}</h4>
                    <small>Layanan KUA tersedia</small>
                </div>
            </div>
        </div>

        {{-- PENGAJUAN MASYARAKAT --}}
        <div class="col-xl-3 col-md-6">
            <div class="mini-stat-card">
                <div class="mini-stat-icon">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <div>
                    <span>Total Pengajuan</span>
                    <h4>{{ number_format($totalPengajuan) }}</h4>
                    <small>Permohonan nikah/layanan</small>
                </div>
            </div>
        </div>

        {{-- SARAN & PENGADUAN --}}
        <div class="col-xl-3 col-md-6">
            <div class="mini-stat-card">
                <div class="mini-stat-icon">
                    <i class="bi bi-envelope-paper-fill"></i>
                </div>
                <div>
                    <span>Saran & Tanya Admin</span>
                    <h4>{{ number_format($totalSaran) }}</h4>
                    <small>Konsultasi masyarakat</small>
                </div>
            </div>
        </div>

        {{-- KOMENTAR BERITA --}}
        <div class="col-xl-3 col-md-6">
            <div class="mini-stat-card">
                <div class="mini-stat-icon">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>
                <div>
                    <span>Komentar Warta</span>
                    <h4>{{ number_format($totalKomentar) }}</h4>
                    <small>Interaksi pada berita</small>
                </div>
            </div>
        </div>
    </div>


    {{-- =====================================================
         MENU AKSES CEPAT PENGELOLAAN LAPORAN
    ====================================================== --}}
    <div class="section-heading mb-3 no-print">
        <div>
            <span class="section-eyebrow">NAVIGASI MODUL</span>
            <h5>Akses Pengelolaan Data</h5>
            <p>Pilih modul di bawah untuk memeriksa atau mengelola rincian data secara langsung.</p>
        </div>
        <div class="section-icon">
            <i class="bi bi-folder2-open"></i>
        </div>
    </div>


    <div class="row g-3 no-print">
        {{-- LAPORAN BERITA --}}
        <div class="col-xl-4 col-md-6">
            <div class="laporan-card">
                <div class="laporan-card-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <div class="laporan-card-body">
                    <span class="card-category">PUBLIKASI & SYIAR</span>
                    <h5>Kelola Berita KUA</h5>
                    <p>Melihat, menambah, menyunting, atau menghapus artikel kegiatan keagamaan.</p>
                    <div class="card-data">
                        <span>Total Terpublikasi</span>
                        <strong>{{ number_format($totalBerita) }} Artikel</strong>
                    </div>
                    <a href="{{ route('admin.berita.index') }}" class="btn-laporan">
                        <span>Lihat Data Berita</span>
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
                    <span class="card-category">KEMASJIDAN & NIKAH</span>
                    <h5>Kelola Layanan KUA</h5>
                    <p>Pengaturan informasi jenis pelayanan nikah, rujuk, bimbingan, dan konsultasi.</p>
                    <div class="card-data">
                        <span>Layanan Aktif</span>
                        <strong>{{ number_format($totalLayanan) }} Jenis</strong>
                    </div>
                    <a href="{{ route('admin.layanan.index') }}" class="btn-laporan">
                        <span>Lihat Data Layanan</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- LAPORAN PENGADUAN / TANYA ADMIN --}}
        <div class="col-xl-4 col-md-6">
            <div class="laporan-card">
                <div class="laporan-card-icon">
                    <i class="bi bi-chat-square-text-fill"></i>
                </div>
                <div class="laporan-card-body">
                    <span class="card-category">PELAYANAN UMAT</span>
                    <h5>Saran & Tanya Admin</h5>
                    <p>Meninjau dan memberikan balasan tanggapan atas konsultasi keagamaan masyarakat.</p>
                    <div class="card-data">
                        <span>Total Pesan Masuk</span>
                        <strong>{{ number_format($totalSaran + $totalKomentar) }} Pesan</strong>
                    </div>
                    <a href="{{ route('admin.saran.index') }}" class="btn-laporan">
                        <span>Lihat Kotak Pesan</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


    {{-- =====================================================
         INFORMASI & LEGALITAS KUA
    ====================================================== --}}
    <div class="info-laporan mt-4">
        <div class="info-icon">
            <i class="bi bi-shield-check"></i>
        </div>
        <div class="info-content">
            <strong>Catatan & Akuntabilitas Sistem KUA</strong>
            <p class="mb-0">
                Seluruh data laporan dihitung secara otomatis dan real-time dari basis data terpusat sistem informasi 
                Kecamatan Karang Baru. Pastikan melakukan pencetakan laporan berkala pada akhir bulan sebagai arsip fisik administrasi kantor.
            </p>
        </div>
    </div>

</div>


{{-- =====================================================
     CSS TEMA HIJAU SOFT KHAS KUA (AGAMIS & ELEGAN)
====================================================== --}}
<style>
    :root {
        --laporan-dark: #204e3b;
        --laporan-green: #2e6b52;
        --laporan-medium: #5a8f76;
        --laporan-soft: #e5f1ea;
        --laporan-light: #f2f7f4;
        --laporan-border: #d2e4d8;
        --laporan-text: #2c3e35;
        --laporan-muted: #6b7c72;
    }

    .halaman-laporan {
        padding-bottom: 30px;
        color: var(--laporan-text);
    }

    /* HEADER */
    .laporan-header {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 195px;
        padding: 32px 36px;
        overflow: hidden;
        border-radius: 16px;
        color: white;
        background: linear-gradient(135deg, #204e3b 0%, #2e6b52 50%, #448268 100%);
        box-shadow: 0 10px 25px rgba(32, 78, 59, 0.15);
    }

    .laporan-header-content {
        position: relative;
        z-index: 2;
    }

    .laporan-eyebrow {
        display: block;
        margin-bottom: 8px;
        color: #bce3cf;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
    }

    .laporan-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0;
        color: #fff;
        font-size: 26px;
        font-weight: 800;
    }

    .laporan-subtitle {
        max-width: 650px;
        margin: 8px 0 0;
        color: rgba(255, 255, 255, 0.88);
        font-size: 12.5px;
        line-height: 1.6;
    }

    .laporan-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 12px;
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.12);
        color: white;
        font-size: 11px;
    }

    .laporan-header-icon {
        position: relative;
        z-index: 2;
        margin-right: 35px;
        color: rgba(255, 255, 255, 0.18);
        font-size: 90px;
    }

    .header-circle {
        position: absolute;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 50%;
    }

    .circle-one {
        width: 220px;
        height: 220px;
        top: -110px;
        right: 70px;
    }

    .circle-two {
        width: 160px;
        height: 160px;
        right: -30px;
        bottom: -95px;
    }

    /* SECTION HEADING */
    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }

    .section-eyebrow {
        display: block;
        margin-bottom: 4px;
        color: var(--laporan-medium);
        font-size: 9.5px;
        font-weight: 800;
        letter-spacing: 1.3px;
    }

    .section-heading h5 {
        margin: 0;
        color: var(--laporan-dark);
        font-size: 17px;
        font-weight: 800;
    }

    .section-heading p {
        margin: 4px 0 0;
        color: var(--laporan-muted);
        font-size: 11px;
    }

    .section-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: var(--laporan-soft);
        color: var(--laporan-green);
        font-size: 18px;
    }

    /* STATISTIK BERITA */
    .statistik-card {
        position: relative;
        height: 100%;
        min-height: 175px;
        padding: 20px;
        overflow: hidden;
        border: 1px solid var(--laporan-border);
        border-radius: 14px;
        background: #fff;
        transition: all 0.25s ease;
    }

    .statistik-card:hover {
        transform: translateY(-3px);
        border-color: var(--laporan-medium);
        box-shadow: 0 8px 20px rgba(32, 78, 59, 0.08);
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
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: var(--laporan-soft);
        color: var(--laporan-green);
        font-size: 20px;
    }

    .statistik-label {
        padding: 6px 10px;
        border-radius: 20px;
        background: var(--laporan-light);
        color: var(--laporan-green);
        font-size: 8.5px;
        font-weight: 800;
        letter-spacing: .5px;
    }

    .statistik-number {
        position: relative;
        z-index: 2;
        margin-top: 14px;
        color: var(--laporan-dark);
        font-size: 30px;
        font-weight: 800;
        line-height: 1.1;
    }

    .statistik-title {
        position: relative;
        z-index: 2;
        margin-top: 5px;
        color: var(--laporan-text);
        font-size: 13px;
        font-weight: 750;
    }

    .statistik-description {
        position: relative;
        z-index: 2;
        margin: 4px 0 0;
        color: var(--laporan-muted);
        font-size: 10.5px;
    }

    .statistik-decoration {
        position: absolute;
        right: 12px;
        bottom: -5px;
        color: rgba(46, 107, 82, 0.05);
        font-size: 95px;
    }

    /* MINI STATISTIK */
    .mini-stat-card {
        display: flex;
        align-items: center;
        gap: 15px;
        height: 100%;
        min-height: 110px;
        padding: 18px;
        border: 1px solid var(--laporan-border);
        border-radius: 14px;
        background: #fff;
        transition: all 0.2s ease;
    }

    .mini-stat-card:hover {
        border-color: var(--laporan-medium);
        box-shadow: 0 6px 15px rgba(32, 78, 59, 0.06);
    }

    .mini-stat-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: 13px;
        background: var(--laporan-soft);
        color: var(--laporan-green);
        font-size: 21px;
    }

    .mini-stat-card span {
        color: var(--laporan-muted);
        font-size: 10.5px;
        font-weight: 600;
    }

    .mini-stat-card h4 {
        margin: 3px 0;
        color: var(--laporan-dark);
        font-size: 23px;
        font-weight: 800;
    }

    .mini-stat-card small {
        color: var(--laporan-muted);
        font-size: 9.5px;
    }

    /* MENU LAPORAN CARD */
    .laporan-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid var(--laporan-border);
        border-radius: 14px;
        background: #fff;
        transition: all 0.25s ease;
    }

    .laporan-card:hover {
        transform: translateY(-4px);
        border-color: var(--laporan-medium);
        box-shadow: 0 10px 24px rgba(32, 78, 59, 0.08);
    }

    .laporan-card-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 110px;
        border-bottom: 1px solid var(--laporan-border);
        background: var(--laporan-light);
        color: var(--laporan-green);
        font-size: 40px;
        transition: background 0.2s ease;
    }

    .laporan-card:hover .laporan-card-icon {
        background: var(--laporan-soft);
    }

    .laporan-card-body {
        padding: 20px;
    }

    .card-category {
        display: inline-block;
        margin-bottom: 8px;
        color: var(--laporan-medium);
        font-size: 8.5px;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .laporan-card-body h5 {
        margin: 0 0 8px;
        color: var(--laporan-dark);
        font-size: 15px;
        font-weight: 800;
    }

    .laporan-card-body p {
        min-height: 48px;
        margin: 0;
        color: var(--laporan-muted);
        font-size: 11px;
        line-height: 1.6;
    }

    .card-data {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
        margin: 15px 0;
        padding: 10px 12px;
        border: 1px solid var(--laporan-border);
        border-radius: 8px;
        background: var(--laporan-light);
    }

    .card-data span {
        color: var(--laporan-muted);
        font-size: 10px;
    }

    .card-data strong {
        color: var(--laporan-green);
        font-size: 11px;
        font-weight: 700;
    }

    .btn-laporan {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        width: 100%;
        padding: 11px 14px;
        border-radius: 8px;
        background: var(--laporan-green);
        color: white !important;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        transition: background 0.2s ease;
    }

    .btn-laporan:hover {
        background: var(--laporan-dark);
    }

    .btn-laporan i {
        transition: transform 0.2s ease;
    }

    .btn-laporan:hover i {
        transform: translateX(3px);
    }

    /* INFORMASI */
    .info-laporan {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 18px 22px;
        border: 1px solid var(--laporan-border);
        border-radius: 13px;
        background: var(--laporan-light);
    }

    .info-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 11px;
        background: var(--laporan-soft);
        color: var(--laporan-green);
        font-size: 19px;
    }

    .info-content strong {
        display: block;
        margin-bottom: 4px;
        color: var(--laporan-dark);
        font-size: 12px;
        font-weight: 800;
    }

    .info-content p {
        color: var(--laporan-muted);
        font-size: 11px;
        line-height: 1.6;
    }

    /* =====================================================
       MEDIA PRINT CONFIG (KHUSUS CETAK LAPORAN)
    ====================================================== */
    @media print {
        body {
            background-color: #fff !important;
            color: #000 !important;
        }

        .no-print, 
        .sidebar, 
        .navbar, 
        .footer, 
        .btn-laporan {
            display: none !important;
        }

        .d-none {
            display: block !important;
        }

        .container-fluid {
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .statistik-card, .mini-stat-card {
            border: 1px solid #333 !important;
            box-shadow: none !important;
            background: #fff !important;
            margin-bottom: 10px;
        }

        .statistik-number, .mini-stat-card h4 {
            color: #000 !important;
        }
    }

    @media (max-width: 768px) {
        .laporan-header {
            min-height: 170px;
            padding: 24px;
        }
        .laporan-title {
            font-size: 22px;
        }
        .laporan-header-icon {
            display: none;
        }
    }
</style>

@endsection