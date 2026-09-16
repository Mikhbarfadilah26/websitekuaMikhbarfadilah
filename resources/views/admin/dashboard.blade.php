@extends('layouts.appadmin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('breadcrumb', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
     WELCOME
====================================================== --}}
    <div class="welcome-card shadow-sm">

        <div class="welcome-content">

            <div class="welcome-icon">

                <i class="bi bi-grid-1x2-fill"></i>

            </div>

            <div>

                <div class="welcome-title">

                    Selamat Datang,
                    {{ auth()->user()->nama ?? auth()->user()->name ?? 'Administrator' }}
                    👋

                </div>

                <div class="welcome-text">

                    Anda berhasil masuk ke halaman Administrator
                    Website Layanan KUA Kecamatan Karang Baru.

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
     MENU CEPAT
====================================================== --}}
    <div class="section-title">

        <div class="section-title-icon">

            <i class="bi bi-lightning-fill"></i>

        </div>

        <div>

            <h5>Menu Cepat</h5>

            <p>Akses cepat ke menu administrator</p>

        </div>

    </div>


    <div class="row g-4">


        {{-- =================================================
         BERITA
    ================================================== --}}
        <div class="col-xl-3 col-md-6">

            <a
                href="{{ route('admin.berita.index') }}"
                class="quick-card">

                <div class="quick-icon quick-blue">

                    <i class="bi bi-newspaper"></i>

                </div>

                <div class="quick-content">

                    <div class="quick-title">
                        Kelola Berita
                    </div>

                    <div class="quick-description">
                        Tambah, edit, dan hapus berita
                    </div>

                </div>

                <div class="quick-arrow">

                    <i class="bi bi-arrow-right"></i>

                </div>

            </a>

        </div>


        {{-- =================================================
         LAYANAN
    ================================================== --}}
        <div class="col-xl-3 col-md-6">

            <a
                href="{{ route('admin.layanan.index') }}"
                class="quick-card">

                <div class="quick-icon quick-green">

                    <i class="bi bi-grid-fill"></i>

                </div>

                <div class="quick-content">

                    <div class="quick-title">
                        Kelola Layanan
                    </div>

                    <div class="quick-description">
                        Kelola layanan KUA
                    </div>

                </div>

                <div class="quick-arrow">

                    <i class="bi bi-arrow-right"></i>

                </div>

            </a>

        </div>


        {{-- =================================================
         SARAN
    ================================================== --}}
        <div class="col-xl-3 col-md-6">

            <a
                href="{{ route('admin.saran.index') }}"
                class="quick-card">

                <div class="quick-icon quick-orange">

                    <i class="bi bi-chat-dots-fill"></i>

                </div>

                <div class="quick-content">

                    <div class="quick-title">
                        Saran & Pengaduan
                    </div>

                    <div class="quick-description">
                        Lihat dan tanggapi saran masyarakat
                    </div>

                </div>

                <div class="quick-arrow">

                    <i class="bi bi-arrow-right"></i>

                </div>

            </a>

        </div>


        {{-- =================================================
         AKUN
    ================================================== --}}
        <div class="col-xl-3 col-md-6">

            <a
                href="{{ route('admin.akun.index') }}"
                class="quick-card">

                <div class="quick-icon quick-purple">

                    <i class="bi bi-person-circle"></i>

                </div>

                <div class="quick-content">

                    <div class="quick-title">
                        Akun Saya
                    </div>

                    <div class="quick-description">
                        Kelola informasi akun administrator
                    </div>

                </div>

                <div class="quick-arrow">

                    <i class="bi bi-arrow-right"></i>

                </div>

            </a>

        </div>

    </div>


    {{-- =====================================================
     INFORMASI
====================================================== --}}
    <div class="row mt-4">

        <div class="col-12">

            <div class="info-card shadow-sm">

                <div class="info-card-header">

                    <div class="info-header-icon">

                        <i class="bi bi-info-circle-fill"></i>

                    </div>

                    <div>

                        <div class="info-title">
                            Informasi Administrator
                        </div>

                        <div class="info-subtitle">
                            Ringkasan akun yang sedang digunakan
                        </div>

                    </div>

                </div>


                <div class="info-body">

                    <div class="row g-3">


                        {{-- NAMA --}}
                        <div class="col-md-4">

                            <div class="info-item">

                                <div class="info-item-icon">

                                    <i class="bi bi-person-fill"></i>

                                </div>

                                <div>

                                    <div class="info-label">
                                        Nama Administrator
                                    </div>

                                    <div class="info-value">

                                        {{ auth()->user()->nama
                                        ?? auth()->user()->name
                                        ?? 'Administrator' }}

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- EMAIL --}}
                        <div class="col-md-4">

                            <div class="info-item">

                                <div class="info-item-icon">

                                    <i class="bi bi-envelope-fill"></i>

                                </div>

                                <div>

                                    <div class="info-label">
                                        Email
                                    </div>

                                    <div class="info-value">

                                        {{ auth()->user()->email ?? '-' }}

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- ROLE --}}
                        <div class="col-md-4">

                            <div class="info-item">

                                <div class="info-item-icon">

                                    <i class="bi bi-shield-check"></i>

                                </div>

                                <div>

                                    <div class="info-label">
                                        Hak Akses
                                    </div>

                                    <div class="info-value">

                                        {{ ucfirst(auth()->user()->role ?? 'Admin') }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
     AKSI ADMIN
====================================================== --}}
    <div class="admin-note">

        <i class="bi bi-shield-check"></i>

        <div>

            <strong>Panel Administrator</strong>

            <span>
                Gunakan menu di sidebar atau menu cepat di atas
                untuk mengelola website KUA Karang Baru.
            </span>

        </div>

    </div>

</div>

{{-- =========================================================
STYLE
========================================================= --}}

<style>
    /* =====================================================
       WELCOME
    ====================================================== */

    .welcome-card {

        background: linear-gradient(135deg,
                #0f172a 0%,
                #1e3a8a 55%,
                #2563eb 100%);

        border-radius: 18px;

        padding: 25px 28px;

        color: #fff;

        margin-bottom: 25px;

    }

    .welcome-content {

        display: flex;

        align-items: center;

        gap: 17px;

    }

    .welcome-icon {

        width: 55px;

        height: 55px;

        min-width: 55px;

        border-radius: 15px;

        background: rgba(255, 255, 255, .13);

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 23px;

    }

    .welcome-title {

        font-size: 21px;

        font-weight: 700;

        line-height: 1.4;

    }

    .welcome-text {

        margin-top: 5px;

        font-size: 13px;

        opacity: .82;

    }


    /* =====================================================
       SECTION
    ====================================================== */

    .section-title {

        display: flex;

        align-items: center;

        gap: 11px;

        margin-bottom: 15px;

    }

    .section-title-icon {

        width: 36px;

        height: 36px;

        border-radius: 10px;

        background: #eff6ff;

        color: #2563eb;

        display: flex;

        align-items: center;

        justify-content: center;

    }

    .section-title h5 {

        margin: 0;

        color: #1e293b;

        font-size: 16px;

        font-weight: 700;

    }

    .section-title p {

        margin: 2px 0 0;

        color: #94a3b8;

        font-size: 12px;

    }


    /* =====================================================
       QUICK CARD
    ====================================================== */

    .quick-card {

        position: relative;

        display: flex;

        align-items: center;

        gap: 13px;

        min-height: 112px;

        padding: 18px;

        background: #fff;

        border-radius: 15px;

        border: 1px solid #eef2f7;

        box-shadow: 0 4px 15px rgba(15, 23, 42, .05);

        text-decoration: none;

        overflow: hidden;

        transition:
            transform .2s ease,
            box-shadow .2s ease;

    }

    .quick-card:hover {

        text-decoration: none;

        transform: translateY(-4px);

        box-shadow: 0 12px 28px rgba(15, 23, 42, .10);

    }


    .quick-icon {

        width: 49px;

        height: 49px;

        min-width: 49px;

        border-radius: 13px;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 21px;

    }

    .quick-blue {

        background: #dbeafe;

        color: #2563eb;

    }

    .quick-green {

        background: #dcfce7;

        color: #16a34a;

    }

    .quick-orange {

        background: #ffedd5;

        color: #ea580c;

    }

    .quick-purple {

        background: #f3e8ff;

        color: #9333ea;

    }


    .quick-content {

        min-width: 0;

        flex: 1;

    }

    .quick-title {

        color: #1e293b;

        font-size: 14px;

        font-weight: 700;

    }

    .quick-description {

        color: #94a3b8;

        font-size: 11px;

        line-height: 1.4;

        margin-top: 4px;

    }

    .quick-arrow {

        color: #cbd5e1;

        font-size: 17px;

        transition: .2s ease;

    }

    .quick-card:hover .quick-arrow {

        color: #2563eb;

        transform: translateX(3px);

    }


    /* =====================================================
       INFO CARD
    ====================================================== */

    .info-card {

        background: #fff;

        border-radius: 16px;

        overflow: hidden;

        border: 1px solid #eef2f7;

    }

    .info-card-header {

        display: flex;

        align-items: center;

        gap: 12px;

        padding: 18px 20px;

        background: #f8fafc;

        border-bottom: 1px solid #eef2f7;

    }

    .info-header-icon {

        width: 39px;

        height: 39px;

        border-radius: 10px;

        background: #dbeafe;

        color: #2563eb;

        display: flex;

        align-items: center;

        justify-content: center;

    }

    .info-title {

        color: #1e293b;

        font-size: 14px;

        font-weight: 700;

    }

    .info-subtitle {

        color: #94a3b8;

        font-size: 11px;

        margin-top: 2px;

    }

    .info-body {

        padding: 20px;

    }


    /* =====================================================
       INFO ITEM
    ====================================================== */

    .info-item {

        display: flex;

        align-items: center;

        gap: 11px;

        padding: 14px;

        border-radius: 12px;

        background: #f8fafc;

        min-height: 70px;

    }

    .info-item-icon {

        width: 36px;

        height: 36px;

        min-width: 36px;

        border-radius: 9px;

        background: #fff;

        color: #2563eb;

        display: flex;

        align-items: center;

        justify-content: center;

        box-shadow: 0 2px 7px rgba(15, 23, 42, .05);

    }

    .info-label {

        color: #94a3b8;

        font-size: 10px;

        margin-bottom: 3px;

    }

    .info-value {

        color: #334155;

        font-size: 13px;

        font-weight: 600;

        word-break: break-word;

    }


    /* =====================================================
       ADMIN NOTE
    ====================================================== */

    .admin-note {

        display: flex;

        align-items: flex-start;

        gap: 11px;

        margin-top: 20px;

        padding: 14px 17px;

        border-radius: 12px;

        background: #eff6ff;

        color: #475569;

        font-size: 12px;

    }

    .admin-note>i {

        color: #2563eb;

        font-size: 18px;

        margin-top: 1px;

    }

    .admin-note strong {

        color: #1e3a8a;

        display: block;

        margin-bottom: 2px;

    }

    .admin-note span {

        color: #64748b;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .welcome-card {

            padding: 20px;

        }

        .welcome-title {

            font-size: 18px;

        }

        .welcome-text {

            font-size: 12px;

        }

        .quick-card {

            min-height: 100px;

        }

    }
</style>

@endsection