@extends('layouts.applanding')

@section('title', 'Struktur Organisasi KUA Karang Baru')

@section('content')

{{-- =========================================================
    HERO / HEADER (Ditambah margin-top agar tidak tertutup navbar fixed)
========================================================= --}}
<section class="py-5" 
    style="
        background: linear-gradient(135deg, #064e3b, #0f766e);
        min-height: 280px;
        display: flex;
        align-items: center;
        margin-top: 76px; /* Menyesuaikan tinggi navbar */
    ">

    <div class="container text-center text-white">

        <i class="fas fa-sitemap fa-3x mb-3"></i>

        <h1 class="fw-bold mb-2">
            Struktur Organisasi
        </h1>

        <p class="mb-0 opacity-75">
            Struktur Organisasi dan Daftar Personil Kantor Urusan Agama (KUA) Kecamatan Karang Baru
        </p>

    </div>

</section>


{{-- =========================================================
    STRUKTUR ORGANISASI & PERSONil (Total 17 Orang)
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge rounded-pill bg-success px-3 py-2 mb-3">
                <i class="fas fa-users me-1"></i>
                Total Personil: 17 Orang
            </span>

            <h2 class="fw-bold text-dark">
                Struktur Organisasi KUA Karang Baru
            </h2>

            <p class="text-muted">
                Susunan pimpinan, pejabat fungsional, dan staf pelaksana Kantor Urusan Agama Kecamatan Karang Baru.
            </p>

        </div>


        {{-- =================================================
            1. KEPALA KUA (1 Orang)
        ================================================== --}}
        <div class="row justify-content-center mb-4">

            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 text-center h-100 border-top border-success border-4">

                    <div class="card-body p-4">

                        <div class="mb-3">
                            {{-- Foto Dummy Kepala KUA --}}
                            <img src="https://via.placeholder.com/100" alt="Kepala KUA" class="rounded-circle shadow-sm mb-3" style="width: 90px; height: 90px; object-fit: cover;">
                        </div>

                        <span class="badge bg-success bg-opacity-15 text-success mb-2 px-3 py-1 rounded-pill fw-semibold">Kepala KUA (1 Orang)</span>
                        <h5 class="fw-bold mb-1">
                            Nama Kepala KUA, S.Ag., M.Sy.
                        </h5>
                        <p class="text-muted small mb-0">
                            NIP. 19xxxxxxxxxxxxxxxxx
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- GARIS PENGHUBUNG --}}
        <div class="text-center mb-4">
            <div style="
                width: 2px;
                height: 40px;
                background: #198754;
                margin: auto;
            "></div>
        </div>


        {{-- =================================================
            2. UNIT / FORMASI LAINNYA (Total 16 Orang)
        ================================================== --}}
        <div class="row g-4 justify-content-center">


            {{-- PENGHULU (Contoh: 3 Orang) --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <div class="mb-3">
                            <img src="https://via.placeholder.com/80" alt="Penghulu" class="rounded-circle shadow-sm mb-2" style="width: 75px; height: 75px; object-fit: cover;">
                        </div>

                        <span class="badge bg-warning bg-opacity-20 text-dark mb-2 px-3 py-1 rounded-pill fw-semibold">Penghulu (3 Orang)</span>
                        <h5 class="fw-bold">
                            Jabatan Fungsional Penghulu
                        </h5>

                        <p class="text-muted small mb-0">
                            Melaksanakan pelayanan akad nikah, rujuk, bimbingan keluarga sakinah, dan penyuluhan syariat.
                        </p>

                    </div>

                </div>

            </div>


            {{-- PENYULUH AGAMA (Contoh: 5 Orang) --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <div class="mb-3">
                            <img src="https://via.placeholder.com/80" alt="Penyuluh Agama" class="rounded-circle shadow-sm mb-2" style="width: 75px; height: 75px; object-fit: cover;">
                        </div>

                        <span class="badge bg-info bg-opacity-20 text-dark mb-2 px-3 py-1 rounded-pill fw-semibold">Penyuluh Agama (5 Orang)</span>
                        <h5 class="fw-bold">
                            Penyuluh Agama Islam
                        </h5>

                        <p class="text-muted small mb-0">
                            Memberikan bimbingan, penyuluhan keagamaan, serta edukasi moderasi beragama kepada masyarakat.
                        </p>

                    </div>

                </div>

            </div>


            {{-- PENATA LAYANAN & ADMINISTRASI / STAF (Contoh: 8 Orang) --}}
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body text-center p-4">

                        <div class="mb-3">
                            <img src="https://via.placeholder.com/80" alt="Staf dan Penata Layanan" class="rounded-circle shadow-sm mb-2" style="width: 75px; height: 75px; object-fit: cover;">
                        </div>

                        <span class="badge bg-primary bg-opacity-20 text-dark mb-2 px-3 py-1 rounded-pill fw-semibold">Penata Layanan & Staf (8 Orang)</span>
                        <h5 class="fw-bold">
                            Administrasi & Umum
                        </h5>

                        <p class="text-muted small mb-0">
                            Mengelola data sistem layanan (SIMKAH, SIMAS), arsip surat-menyurat, serta pelayanan umum kantor.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    INFORMASI TAMBAHAN
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
                            Tentang Formasi Personil KUA Karang Baru
                        </h4>

                        <p class="text-muted mb-0">
                            Kantor Urusan Agama (KUA) Kecamatan Karang Baru didukung oleh total 17 orang personil yang terdiri dari 1 Kepala KUA, 3 orang Penghulu, 5 orang Penyuluh Agama, serta 8 orang Penata Layanan dan Staf Administrasi guna mengoptimalkan pelayanan prima kepada masyarakat.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection