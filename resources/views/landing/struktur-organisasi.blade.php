@extends('layouts.applanding')

@section('title', 'Struktur Organisasi KUA Karang Baru')

@section('content')

{{-- =========================================================
    HERO / HEADER
========================================================= --}}
<section class="py-5"
    style="
        background: linear-gradient(135deg, #064e3b, #0f766e);
        min-height: 280px;
        display: flex;
        align-items: center;
    ">

    <div class="container text-center text-white">

        <i class="fas fa-sitemap fa-3x mb-3"></i>

        <h1 class="fw-bold mb-2">
            Struktur Organisasi
        </h1>

        <p class="mb-0 opacity-75">
            Struktur Organisasi Kantor Urusan Agama (KUA) Kecamatan Karang Baru
        </p>

    </div>

</section>


{{-- =========================================================
    STRUKTUR ORGANISASI
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge rounded-pill bg-success px-3 py-2 mb-3">
                <i class="fas fa-users me-1"></i>
                Organisasi KUA
            </span>

            <h2 class="fw-bold text-dark">
                Struktur Organisasi KUA Karang Baru
            </h2>

            <p class="text-muted">
                Susunan organisasi dan unsur pelayanan
                Kantor Urusan Agama Kecamatan Karang Baru.
            </p>

        </div>


        {{-- =================================================
             KEPALA KUA
        ================================================== --}}
        <div class="row justify-content-center mb-4">

            <div class="col-md-5 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 text-center h-100">

                    <div class="card-body p-4">

                        <div class="mb-3">

                            <div class="rounded-circle bg-success bg-opacity-10
                                        d-inline-flex align-items-center
                                        justify-content-center"
                                style="width: 80px; height: 80px;">

                                <i class="fas fa-user-tie fa-2x text-success"></i>

                            </div>

                        </div>

                        <h5 class="fw-bold mb-1">
                            Kepala KUA
                        </h5>

                        <p class="text-muted mb-0">
                            Kecamatan Karang Baru
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- GARIS --}}
        <div class="text-center mb-4">

            <div style="
                width: 2px;
                height: 40px;
                background: #198754;
                margin: auto;
            "></div>

        </div>


        {{-- =================================================
             BAGIAN ORGANISASI
        ================================================== --}}
        <div class="row g-4 justify-content-center">


            {{-- PENYULUH AGAMA --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <div class="rounded-circle bg-info bg-opacity-10
                                    d-inline-flex align-items-center
                                    justify-content-center mb-3"
                            style="width: 70px; height: 70px;">

                            <i class="fas fa-mosque fa-xl text-info"></i>

                        </div>

                        <h5 class="fw-bold">
                            Penyuluh Agama
                        </h5>

                        <p class="text-muted small mb-0">
                            Memberikan bimbingan dan penyuluhan
                            keagamaan kepada masyarakat.
                        </p>

                    </div>

                </div>

            </div>


            {{-- PENGHULU --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <div class="rounded-circle bg-warning bg-opacity-10
                                    d-inline-flex align-items-center
                                    justify-content-center mb-3"
                            style="width: 70px; height: 70px;">

                            <i class="fas fa-ring fa-xl text-warning"></i>

                        </div>

                        <h5 class="fw-bold">
                            Penghulu
                        </h5>

                        <p class="text-muted small mb-0">
                            Melaksanakan pelayanan dan pencatatan
                            pernikahan sesuai ketentuan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- TATA USAHA --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <div class="rounded-circle bg-primary bg-opacity-10
                                    d-inline-flex align-items-center
                                    justify-content-center mb-3"
                            style="width: 70px; height: 70px;">

                            <i class="fas fa-file-alt fa-xl text-primary"></i>

                        </div>

                        <h5 class="fw-bold">
                            Tata Usaha
                        </h5>

                        <p class="text-muted small mb-0">
                            Mengelola administrasi dan pelayanan
                            umum KUA.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 STAF
            ================================================== --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <div class="rounded-circle bg-danger bg-opacity-10
                                    d-inline-flex align-items-center
                                    justify-content-center mb-3"
                            style="width: 70px; height: 70px;">

                            <i class="fas fa-users fa-xl text-danger"></i>

                        </div>

                        <h5 class="fw-bold">
                            Staf Pelaksana
                        </h5>

                        <p class="text-muted small mb-0">
                            Mendukung pelaksanaan administrasi
                            dan pelayanan KUA.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 PETUGAS LAYANAN
            ================================================== --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <div class="rounded-circle bg-secondary bg-opacity-10
                                    d-inline-flex align-items-center
                                    justify-content-center mb-3"
                            style="width: 70px; height: 70px;">

                            <i class="fas fa-hands-helping fa-xl text-secondary"></i>

                        </div>

                        <h5 class="fw-bold">
                            Petugas Pelayanan
                        </h5>

                        <p class="text-muted small mb-0">
                            Membantu masyarakat dalam memperoleh
                            informasi dan layanan KUA.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    INFORMASI
========================================================= --}}
<section class="py-5">

    <div class="container">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4 p-md-5">

                <div class="row align-items-center">

                    <div class="col-md-2 text-center mb-3 mb-md-0">

                        <i class="fas fa-info-circle fa-4x text-success"></i>

                    </div>

                    <div class="col-md-10">

                        <h4 class="fw-bold">
                            Tentang Struktur Organisasi
                        </h4>

                        <p class="text-muted mb-0">
                            Struktur organisasi KUA Kecamatan Karang Baru
                            disusun untuk mendukung pelaksanaan tugas,
                            pelayanan masyarakat, administrasi keagamaan,
                            serta pelayanan nikah dan rujuk secara tertib,
                            efektif, dan sesuai dengan ketentuan yang berlaku.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
