@extends('layouts.appadmin')

@section('title', 'Laporan')

@section('page-title', 'Laporan')

@section('breadcrumb', 'Laporan')

@section('content')

<div class="container-fluid">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="laporan-header shadow-sm">

    <div>
        <div class="laporan-title">
            <i class="bi bi-bar-chart-fill"></i>
            Laporan
        </div>

        <div class="laporan-subtitle">
            Informasi dan laporan data layanan KUA
        </div>
    </div>

</div>


{{-- =====================================================
     MENU LAPORAN
====================================================== --}}

<div class="row g-4 mt-1">

    {{-- LAPORAN BERITA --}}

    <div class="col-xl-4 col-md-6">

        <div class="laporan-card">

            <div class="laporan-icon">
                <i class="bi bi-newspaper"></i>
            </div>

            <div class="laporan-card-body">

                <h5>
                    Laporan Berita
                </h5>

                <p>
                    Melihat data berita yang telah dikelola oleh administrator.
                </p>

                <a href="{{ route('admin.berita.index') }}"
                   class="btn-laporan">

                    <i class="bi bi-arrow-right-circle-fill"></i>

                    Lihat Berita

                </a>

            </div>

        </div>

    </div>


    {{-- LAPORAN LAYANAN --}}

    <div class="col-xl-4 col-md-6">

        <div class="laporan-card">

            <div class="laporan-icon">
                <i class="bi bi-grid-fill"></i>
            </div>

            <div class="laporan-card-body">

                <h5>
                    Laporan Layanan
                </h5>

                <p>
                    Melihat data layanan yang tersedia pada sistem KUA.
                </p>

                <a href="{{ route('admin.layanan.index') }}"
                   class="btn-laporan">

                    <i class="bi bi-arrow-right-circle-fill"></i>

                    Lihat Layanan

                </a>

            </div>

        </div>

    </div>


    {{-- LAPORAN SARAN --}}

    <div class="col-xl-4 col-md-6">

        <div class="laporan-card">

            <div class="laporan-icon">
                <i class="bi bi-chat-dots-fill"></i>
            </div>

            <div class="laporan-card-body">

                <h5>
                    Laporan Saran & Pengaduan
                </h5>

                <p>
                    Melihat data saran dan pengaduan yang masuk dari masyarakat.
                </p>

                <a href="{{ route('admin.saran.index') }}"
                   class="btn-laporan">

                    <i class="bi bi-arrow-right-circle-fill"></i>

                    Lihat Saran

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

    <div>

        <strong>
            Informasi Laporan
        </strong>

        <p class="mb-0">
            Halaman ini digunakan sebagai pusat akses laporan
            dari data yang sudah tersedia pada sistem.
        </p>

    </div>

</div>


</div>

<style>

/* =====================================================
   HEADER
===================================================== */

.laporan-header {

    background: linear-gradient(
        135deg,
        #0f172a 0%,
        #1e3a8a 100%
    );

    border-radius: 16px;

    padding: 25px 28px;

    color: white;

    margin-bottom: 20px;

}


.laporan-title {

    font-size: 24px;

    font-weight: 700;

    display: flex;

    align-items: center;

    gap: 12px;

}


.laporan-title i {

    font-size: 25px;

}


.laporan-subtitle {

    margin-top: 6px;

    font-size: 14px;

    opacity: .85;

}


/* =====================================================
   CARD
===================================================== */

.laporan-card {

    background: #ffffff;

    border-radius: 16px;

    border: 1px solid #e5e7eb;

    height: 100%;

    overflow: hidden;

    transition: .2s ease;

}


.laporan-card:hover {

    transform: translateY(-4px);

    box-shadow: 0 10px 25px rgba(15, 23, 42, .10);

}


.laporan-icon {

    height: 110px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #f8fafc;

    border-bottom: 1px solid #e5e7eb;

}


.laporan-icon i {

    font-size: 42px;

    color: #1e3a8a;

}


.laporan-card-body {

    padding: 20px;

}


.laporan-card-body h5 {

    font-weight: 700;

    color: #0f172a;

    margin-bottom: 8px;

}


.laporan-card-body p {

    color: #64748b;

    font-size: 14px;

    min-height: 42px;

    margin-bottom: 18px;

}


/* =====================================================
   BUTTON
===================================================== */

.btn-laporan {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 8px 14px;

    border-radius: 8px;

    background: #1e3a8a;

    color: white !important;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    transition: .2s ease;

}


.btn-laporan:hover {

    background: #0f172a;

    color: white !important;

}


/* =====================================================
   INFO
===================================================== */

.info-laporan {

    display: flex;

    align-items: center;

    gap: 15px;

    background: #f8fafc;

    border: 1px solid #e2e8f0;

    border-radius: 14px;

    padding: 18px 20px;

    color: #475569;

}


.info-icon {

    font-size: 25px;

    color: #1e3a8a;

}


.info-laporan strong {

    color: #0f172a;

    display: block;

    margin-bottom: 3px;

}


.info-laporan p {

    font-size: 13px;

}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 576px) {

    .laporan-header {

        padding: 20px;

    }

    .laporan-title {

        font-size: 20px;

    }

    .laporan-icon {

        height: 90px;

    }

}

</style>

@endsection
