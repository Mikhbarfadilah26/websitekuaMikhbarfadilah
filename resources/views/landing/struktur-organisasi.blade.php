@extends('layouts.applanding')

@section('title', 'Struktur Organisasi KUA Karang Baru')

@section('content')

<style>
    /* =========================================================
       HERO
    ========================================================= */
    .struktur-hero {
        margin-top: 76px;
        min-height: 300px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(135deg, rgba(6, 78, 59, .97), rgba(22, 163, 74, .92)),
            url("{{ asset('7.png') }}");
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }

    .struktur-hero::before {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        border: 2px solid rgba(255,255,255,.12);
        border-radius: 50%;
        right: -100px;
        top: -150px;
    }

    .struktur-hero::after {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        border: 2px solid rgba(255,255,255,.10);
        border-radius: 50%;
        left: -100px;
        bottom: -130px;
    }

    .struktur-hero-content {
        position: relative;
        z-index: 2;
    }

    /* =========================================================
       WRAPPER DENAH
    ========================================================= */
    .struktur-section {
        background: #f4f8f5;
    }

    .struktur-wrapper {
        background: #ffffff;
        border-radius: 25px;
        padding: 40px 25px 50px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, .08);
        overflow-x: auto;
    }

    .struktur-title {
        color: #064e3b;
    }

    /* =========================================================
       NODE UMUM
    ========================================================= */
    .org-node {
        position: relative;
        background: #ffffff;
        border: 2px solid #198754;
        border-radius: 15px;
        box-shadow: 0 7px 18px rgba(0, 0, 0, .08);
        padding: 15px;
        transition: all .3s ease;
    }

    .org-node:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, .13);
    }

    .org-photo {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #198754;
        background: #e8f5e9;
    }

    .org-jabatan {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 50px;
        background: #198754;
        color: white;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .org-nama {
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 3px;
        font-size: 15px;
    }

    .org-keterangan {
        color: #6b7280;
        font-size: 12px;
        margin: 0;
    }

    /* =========================================================
       KEPALA KUA
    ========================================================= */
    .kepala-wrapper {
        width: 290px;
        margin: auto;
        position: relative;
        z-index: 5;
    }

    .kepala-node {
        border: 3px solid #087f3f;
        background: linear-gradient(180deg, #ffffff, #f1faf4);
    }

    .kepala-node .org-photo {
        width: 82px;
        height: 82px;
        border-color: #087f3f;
    }

    .kepala-node .org-jabatan {
        background: #087f3f;
        font-size: 13px;
    }

    /* =========================================================
       GARIS DARI KEPALA KE CABANG
    ========================================================= */
    .vertical-line-main {
        width: 3px;
        height: 45px;
        background: #198754;
        margin: 0 auto;
    }

    .horizontal-line {
        height: 3px;
        background: #198754;
        width: 78%;
        margin: 0 auto;
    }

    .branch-wrapper {
        position: relative;
    }

    .branch-item {
        position: relative;
    }

    .branch-item::before {
        content: "";
        position: absolute;
        width: 3px;
        height: 25px;
        background: #198754;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
    }

    /* =========================================================
       KARTU KATEGORI
    ========================================================= */
    .kategori-card {
        height: 100%;
        border: 0;
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
    }

    .kategori-header {
        padding: 14px 18px;
        color: white;
        font-weight: 700;
        text-align: center;
    }

    .header-penghulu {
        background: linear-gradient(135deg, #087f3f, #16a34a);
    }

    .header-staf {
        background: linear-gradient(135deg, #166534, #22c55e);
    }

    .header-penyuluh {
        background: linear-gradient(135deg, #047857, #10b981);
    }

    .kategori-body {
        padding: 20px;
    }

    /* =========================================================
       PERSONIL MINI
    ========================================================= */
    .personil-list {
        display: grid;
        gap: 10px;
    }

    .personil-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px;
        background: #f7faf8;
        border: 1px solid #dcefe3;
        border-radius: 12px;
    }

    .personil-number {
        min-width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #198754;
        color: white;
        font-weight: 700;
        font-size: 13px;
    }

    .personil-name {
        font-weight: 600;
        color: #374151;
        font-size: 13px;
    }

    .personil-role {
        font-size: 11px;
        color: #6b7280;
    }

    /* =========================================================
       INFO TOTAL
    ========================================================= */
    .jumlah-box {
        background: linear-gradient(135deg, #064e3b, #198754);
        color: white;
        border-radius: 20px;
        padding: 25px;
    }

    .jumlah-item {
        text-align: center;
        padding: 10px;
    }

    .jumlah-item i {
        font-size: 25px;
        margin-bottom: 8px;
    }

    .jumlah-angka {
        font-size: 28px;
        font-weight: 800;
        line-height: 1;
    }

    .jumlah-label {
        font-size: 13px;
        opacity: .9;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */
    @media (max-width: 991px) {

        .struktur-wrapper {
            padding: 30px 15px 40px;
        }

        .horizontal-line {
            display: none;
        }

        .branch-item::before {
            display: none;
        }

        .vertical-line-main {
            height: 30px;
        }
    }

    @media (max-width: 575px) {

        .struktur-hero {
            margin-top: 65px;
        }

        .kepala-wrapper {
            width: 100%;
            max-width: 290px;
        }

        .org-node {
            padding: 13px;
        }

        .struktur-wrapper {
            border-radius: 18px;
        }
    }
</style>


{{-- =========================================================
     HERO
========================================================= --}}
<section class="struktur-hero">

    <div class="container struktur-hero-content">

        <div class="text-center text-white">

            <div class="mb-3">
                <i class="fas fa-sitemap fa-3x"></i>
            </div>

            <h1 class="fw-bold mb-2">
                Struktur Organisasi
            </h1>

            <p class="mb-0 opacity-75">
                Kantor Urusan Agama (KUA) Kecamatan Karang Baru
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
     STRUKTUR ORGANISASI
========================================================= --}}
<section class="struktur-section py-5">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <span class="badge rounded-pill bg-success px-4 py-2 mb-3">
                <i class="fas fa-users me-1"></i>
                Struktur Organisasi
            </span>

            <h2 class="fw-bold struktur-title mb-2">
                Susunan Organisasi KUA Karang Baru
            </h2>

            <p class="text-muted mb-0">
                Susunan pimpinan dan personil Kantor Urusan Agama
                Kecamatan Karang Baru
            </p>

        </div>


        <div class="struktur-wrapper">


            {{-- =================================================
                 KEPALA KUA
            ================================================== --}}
            <div class="kepala-wrapper">

                <div class="org-node kepala-node text-center">

                    <img
                        src="https://via.placeholder.com/100"
                        alt="Kepala KUA"
                        class="org-photo mb-3"
                    >

                    <div>
                        <span class="org-jabatan">
                            <i class="fas fa-user-tie me-1"></i>
                            KEPALA KUA
                        </span>
                    </div>

                    <div class="org-nama">
                       SYAFUDDIN,S.ag
                    </div>

                    <p class="org-keterangan">
                        Kepala KUA / Penghulu
                    </p>

                    <div class="mt-2">
                        <span class="badge rounded-pill bg-success-subtle text-success">
                            Termasuk dalam 2 Penghulu
                        </span>
                    </div>

                </div>

            </div>


            {{-- GARIS VERTIKAL --}}
            <div class="vertical-line-main"></div>


            {{-- =================================================
                 GARIS HORIZONTAL CABANG
            ================================================== --}}
            <div class="horizontal-line"></div>


            {{-- =================================================
                 CABANG UTAMA
            ================================================== --}}
            <div class="row g-4 justify-content-center branch-wrapper mt-1">


                {{-- =================================================
                     PENGHULU
                     TOTAL 2
                     1 Kepala + 1 Penghulu lainnya
                ================================================== --}}
                <div class="col-lg-4 branch-item">

                    <div class="kategori-card">

                        <div class="kategori-header header-penghulu">

                            <i class="fas fa-user-tie me-1"></i>

                            PENGHULU

                            <span class="badge bg-white text-success ms-1">
                                2 Orang
                            </span>

                        </div>


                        <div class="kategori-body">

                            <div class="personil-list">

                                {{-- Penghulu 1 --}}
                                <div class="personil-item">

                                    <div class="personil-number">
                                        1
                                    </div>

                                    <div>
                                        <div class="personil-name">
                                            Nama Kepala KUA
                                        </div>

                                        <div class="personil-role">
                                            Kepala KUA / Penghulu
                                        </div>
                                    </div>

                                </div>


                                {{-- Penghulu 2 --}}
                                <div class="personil-item">

                                    <div class="personil-number">
                                        2
                                    </div>

                                    <div>
                                        <div class="personil-name">
                                            Nama Penghulu
                                        </div>

                                        <div class="personil-role">
                                            Penghulu
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     STAF ADMINISTRASI
                     TOTAL 5
                ================================================== --}}
                <div class="col-lg-4 branch-item">

                    <div class="kategori-card">

                        <div class="kategori-header header-staf">

                            <i class="fas fa-users-cog me-1"></i>

                            STAF ADMINISTRASI

                            <span class="badge bg-white text-success ms-1">
                                5 Orang
                            </span>

                        </div>


                        <div class="kategori-body">

                            <div class="personil-list">

                                @for ($i = 1; $i <= 5; $i++)

                                    <div class="personil-item">

                                        <div class="personil-number">
                                            {{ $i }}
                                        </div>

                                        <div>
                                            <div class="personil-name">
                                                Nama Staf {{ $i }}
                                            </div>

                                            <div class="personil-role">
                                                Staf Administrasi
                                            </div>
                                        </div>

                                    </div>

                                @endfor

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     PENYULUH
                     TOTAL 9
                ================================================== --}}
                <div class="col-lg-4 branch-item">

                    <div class="kategori-card">

                        <div class="kategori-header header-penyuluh">

                            <i class="fas fa-chalkboard-teacher me-1"></i>

                            PENYULUH AGAMA

                            <span class="badge bg-white text-success ms-1">
                                9 Orang
                            </span>

                        </div>


                        <div class="kategori-body">

                            <div class="personil-list">

                                @for ($i = 1; $i <= 9; $i++)

                                    <div class="personil-item">

                                        <div class="personil-number">
                                            {{ $i }}
                                        </div>

                                        <div>
                                            <div class="personil-name">
                                                Nama Penyuluh {{ $i }}
                                            </div>

                                            <div class="personil-role">
                                                Penyuluh Agama
                                            </div>
                                        </div>

                                    </div>

                                @endfor

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     KOMPOSISI PERSONIL
========================================================= --}}
<section class="py-5 bg-white">

    <div class="container">

        <div class="jumlah-box shadow">

            <div class="text-center mb-4">

                <h3 class="fw-bold mb-2">
                    Komposisi Personil
                </h3>

                <p class="mb-0 opacity-75">
                    Kantor Urusan Agama Kecamatan Karang Baru
                </p>

            </div>


            <div class="row g-3">


                {{-- Kepala --}}
                <div class="col-6 col-lg-3">

                    <div class="jumlah-item">

                        <i class="fas fa-user-tie"></i>

                        <div class="jumlah-angka">
                            1
                        </div>

                        <div class="jumlah-label">
                            Kepala KUA
                        </div>

                    </div>

                </div>


                {{-- Penghulu --}}
                <div class="col-6 col-lg-3">

                    <div class="jumlah-item">

                        <i class="fas fa-user-tie"></i>

                        <div class="jumlah-angka">
                            2
                        </div>

                        <div class="jumlah-label">
                            Penghulu
                        </div>

                    </div>

                </div>


                {{-- Staf --}}
                <div class="col-6 col-lg-3">

                    <div class="jumlah-item">

                        <i class="fas fa-users-cog"></i>

                        <div class="jumlah-angka">
                            5
                        </div>

                        <div class="jumlah-label">
                            Staf Administrasi
                        </div>

                    </div>

                </div>


                {{-- Penyuluh --}}
                <div class="col-6 col-lg-3">

                    <div class="jumlah-item">

                        <i class="fas fa-chalkboard-teacher"></i>

                        <div class="jumlah-angka">
                            9
                        </div>

                        <div class="jumlah-label">
                            Penyuluh Agama
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- KETERANGAN --}}
        <div class="alert alert-success border-0 shadow-sm rounded-4 mt-4">

            <div class="d-flex align-items-start">

                <i class="fas fa-info-circle fa-lg me-3 mt-1"></i>

                <div>

                    <strong>Keterangan Struktur</strong>

                    <div class="small mt-1">
                        Terdapat 1 Kepala KUA yang juga termasuk dalam
                        formasi 2 orang Penghulu. Selain itu terdapat
                        5 orang Staf Administrasi dan 9 orang Penyuluh Agama.
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


@endsection