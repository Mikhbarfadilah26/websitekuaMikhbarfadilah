@extends('layouts.appmasyarakat')

@section('title', 'Dashboard Masyarakat')

@section('page-title', 'Dashboard')

@section('breadcrumb', 'Dashboard Masyarakat')


@section('content')

<style>

/* =========================================================
   DASHBOARD
========================================================= */

.dashboard-wrapper {
    width: 100%;
}


/* =========================================================
   LAYOUT UTAMA
========================================================= */

.dashboard-main {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 350px;
    gap: 22px;
    align-items: stretch;
}

.dashboard-left {
    min-width: 0;
}


/* =========================================================
   WELCOME CARD
========================================================= */

.welcome-card {
    position: relative;
    overflow: hidden;

    border: none;
    border-radius: 22px;

    min-height: 190px;

    background:
        linear-gradient(
            135deg,
            #1261d8 0%,
            #087cf5 55%,
            #00a884 100%
        );

    color: white;

    box-shadow:
        0 10px 28px rgba(0, 91, 234, 0.20);
}


.welcome-card::before {
    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    right: -100px;
    top: -120px;

    border-radius: 50%;

    background: rgba(255,255,255,0.08);
}


.welcome-card::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: 180px;
    bottom: -100px;

    border-radius: 50%;

    background: rgba(255,255,255,0.06);
}


.welcome-content {
    position: relative;
    z-index: 2;

    padding: 32px;
}


.welcome-label {
    font-size: 13px;

    font-weight: 700;

    letter-spacing: 1px;

    color: rgba(255,255,255,0.75);

    margin-bottom: 8px;
}


.welcome-title {
    font-size: 28px;

    font-weight: 800;

    line-height: 1.3;

    margin-bottom: 10px;
}


.welcome-description {
    max-width: 700px;

    font-size: 14px;

    line-height: 1.7;

    color: rgba(255,255,255,0.88);

    margin-bottom: 18px;
}


.welcome-badge {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 9px 15px;

    border-radius: 50px;

    background: rgba(255,255,255,0.15);

    border: 1px solid rgba(255,255,255,0.25);

    font-size: 12px;

    font-weight: 600;
}


/* =========================================================
   MENU CEPAT
========================================================= */

.quick-title {
    margin-top: 24px;

    margin-bottom: 15px;

    text-align: center;
}


.quick-title h4 {
    margin-bottom: 4px;

    font-size: 20px;

    font-weight: 800;

    color: #172033;
}


.quick-title p {
    margin: 0;

    font-size: 13px;

    color: #7b8494;
}


.quick-menu {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0, 1fr));

    gap: 15px;
}


.quick-card {
    min-height: 125px;

    border: none;

    border-radius: 18px;

    padding: 20px;

    background: white;

    box-shadow:
        0 6px 18px rgba(0,0,0,0.07);

    transition: all 0.25s ease;

    text-decoration: none;
}


.quick-card:hover {
    transform: translateY(-4px);

    box-shadow:
        0 12px 25px rgba(0,0,0,0.12);
}


.quick-icon {
    width: 48px;
    height: 48px;

    border-radius: 14px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 12px;
}


.quick-icon i {
    font-size: 22px;
}


.quick-card h6 {
    margin: 0 0 5px;

    font-size: 14px;

    font-weight: 800;

    color: #172033;
}


.quick-card p {
    margin: 0;

    font-size: 11px;

    line-height: 1.5;

    color: #7b8494;
}


.quick-blue {
    background: #e7f0ff;
    color: #0061ff;
}


.quick-green {
    background: #e3f9ef;
    color: #00a86b;
}


.quick-orange {
    background: #fff0dc;
    color: #f28c00;
}


.quick-purple {
    background: #f0e8ff;
    color: #7040c8;
}


/* =========================================================
   FOTO SLIDER
========================================================= */

.photo-slider-card {
    position: relative;

    height: 100%;

    min-height: 500px;

    border: none;

    border-radius: 22px;

    overflow: hidden;

    background: #ffffff;

    box-shadow:
        0 8px 25px rgba(0,0,0,0.09);
}


.photo-slider-header {
    padding: 22px 20px 12px;

    text-align: center;
}


.photo-slider-header h5 {
    margin: 0 0 4px;

    font-size: 18px;

    font-weight: 800;

    color: #172033;
}


.photo-slider-header p {
    margin: 0;

    font-size: 12px;

    color: #7b8494;
}


.photo-slider {
    position: relative;

    height: calc(100% - 80px);

    min-height: 420px;

    background: #f5f7fa;

    display: flex;

    align-items: center;

    justify-content: center;
}


.photo-slider .carousel,
.photo-slider .carousel-inner,
.photo-slider .carousel-item {
    width: 100%;
    height: 100%;
}


.photo-slider .carousel-item {
    align-items: center;
    justify-content: center;

    padding: 12px 45px 40px;
}


.photo-slider .carousel-item.active {
    display: flex;
}


/* =========================================================
   FOTO YANG BISA DIKLIK
========================================================= */

.slide-photo {
    display: block;

    max-width: 100%;

    max-height: 100%;

    width: auto;

    height: auto;

    object-fit: contain;

    border-radius: 10px;

    cursor: zoom-in;

    box-shadow:
        0 5px 15px rgba(0,0,0,0.12);

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;
}


.slide-photo:hover {
    transform: scale(1.02);

    box-shadow:
        0 10px 25px rgba(0,0,0,0.20);
}


/* =========================================================
   TOMBOL SLIDER
========================================================= */

.photo-slider .carousel-control-prev,
.photo-slider .carousel-control-next {

    width: 36px;
    height: 36px;

    top: 50%;

    transform: translateY(-50%);

    border-radius: 50%;

    background: #0061ff;

    opacity: 1;

    margin: 0 7px;

    z-index: 5;
}


.photo-slider .carousel-control-prev:hover,
.photo-slider .carousel-control-next:hover {
    background: #004dcc;
}


.photo-slider .carousel-control-prev-icon,
.photo-slider .carousel-control-next-icon {
    width: 15px;
    height: 15px;
}


/* =========================================================
   INDICATOR
========================================================= */

.photo-slider .carousel-indicators {
    bottom: 8px;

    margin: 0;

    z-index: 5;
}


.photo-slider .carousel-indicators button {

    width: 8px;
    height: 8px;

    border: none;

    border-radius: 50%;

    margin: 0 3px;

    background: #aab2bd;
}


.photo-slider .carousel-indicators .active {
    background: #0061ff;
}


/* =========================================================
   PETUNJUK KLIK FOTO
========================================================= */

.photo-click-info {
    position: absolute;

    left: 50%;

    bottom: 35px;

    transform: translateX(-50%);

    z-index: 4;

    padding: 6px 12px;

    border-radius: 50px;

    background: rgba(0,0,0,0.55);

    color: white;

    font-size: 10px;

    pointer-events: none;

    white-space: nowrap;
}


/* =========================================================
   MODAL FOTO
========================================================= */

.photo-modal {
    position: fixed;

    inset: 0;

    z-index: 99999;

    display: none;

    align-items: center;

    justify-content: center;

    padding: 25px;

    background: rgba(0,0,0,0.90);
}


.photo-modal.show {
    display: flex;
}


.photo-modal-content {

    position: relative;

    width: 100%;

    height: 100%;

    display: flex;

    align-items: center;

    justify-content: center;
}


.photo-modal-image {

    max-width: 92vw;

    max-height: 92vh;

    width: auto;

    height: auto;

    object-fit: contain;

    border-radius: 6px;

    box-shadow:
        0 10px 50px rgba(0,0,0,0.5);
}


/* =========================================================
   TOMBOL CLOSE MODAL
========================================================= */

.photo-modal-close {

    position: absolute;

    top: 5px;

    right: 5px;

    width: 45px;
    height: 45px;

    border: none;

    border-radius: 50%;

    background: rgba(255,255,255,0.15);

    color: white;

    font-size: 25px;

    cursor: pointer;

    display: flex;

    align-items: center;
    justify-content: center;

    z-index: 10;

    transition: 0.2s;
}


.photo-modal-close:hover {

    background: #ff3b30;

    transform: rotate(90deg);
}


/* =========================================================
   TOMBOL ZOOM
========================================================= */

.photo-modal-title {

    position: absolute;

    left: 50%;

    bottom: 5px;

    transform: translateX(-50%);

    padding: 7px 15px;

    border-radius: 50px;

    background: rgba(255,255,255,0.12);

    color: rgba(255,255,255,0.85);

    font-size: 12px;
}


/* =========================================================
   INFORMATION CARD
========================================================= */

.information-card {

    margin-top: 25px;

    border: none;

    border-radius: 20px;

    background:
        linear-gradient(
            135deg,
            #eaf3ff,
            #effcf7
        );

    box-shadow:
        0 6px 18px rgba(0,0,0,0.06);
}


.information-content {

    display: flex;

    align-items: center;

    gap: 15px;

    padding: 20px 22px;
}


.information-icon {

    flex-shrink: 0;

    width: 48px;
    height: 48px;

    border-radius: 14px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #0061ff;

    color: white;
}


.information-icon i {
    font-size: 22px;
}


.information-content h6 {

    margin: 0 0 5px;

    font-weight: 800;

    color: #172033;
}


.information-content p {

    margin: 0;

    font-size: 12px;

    line-height: 1.6;

    color: #6d7787;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .dashboard-main {
        grid-template-columns:
            minmax(0, 1fr) 300px;
    }


    .quick-menu {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

}


@media (max-width: 850px) {

    .dashboard-main {

        display: flex;

        flex-direction: column;
    }


    .dashboard-left {
        order: 1;
    }


    .photo-slider-card {
        order: 2;

        min-height: 500px;
    }


    .photo-slider {
        height: 430px;

        min-height: 430px;
    }

}


@media (max-width: 576px) {

    .welcome-content {
        padding: 25px;
    }


    .welcome-title {
        font-size: 22px;
    }


    .quick-menu {

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 10px;
    }


    .quick-card {
        padding: 16px;

        min-height: 115px;
    }


    .photo-slider-card {
        min-height: 430px;
    }


    .photo-slider {

        height: 370px;

        min-height: 370px;
    }


    .photo-slider .carousel-item {

        padding-left: 35px;
        padding-right: 35px;
    }

}

</style>



<div class="dashboard-wrapper">


    {{-- =====================================================
         DASHBOARD UTAMA
    ====================================================== --}}

    <div class="dashboard-main">


        {{-- =================================================
             BAGIAN KIRI
        ================================================== --}}

        <div class="dashboard-left">


            {{-- =================================================
                 WELCOME
            ================================================== --}}

            <div class="welcome-card">

                <div class="welcome-content">

                    <div class="welcome-label">

                        MASYARAKAT

                    </div>


                    <div class="welcome-title">

                        Selamat Datang,

                        {{ auth()->user()->nama ?? 'Masyarakat KUA' }}

                        👋

                    </div>


                    <p class="welcome-description">

                        Selamat datang di layanan digital
                        KUA Kecamatan Karang Baru.

                        Silakan gunakan menu yang tersedia
                        untuk mengakses berbagai informasi
                        dan layanan KUA dengan mudah.

                    </p>


                    <div class="welcome-badge">

                        <i class="bi bi-shield-check"></i>

                        Layanan Resmi KUA Karang Baru

                    </div>

                </div>

            </div>



            {{-- =================================================
                 MENU CEPAT
            ================================================== --}}

            <div class="quick-title">

                <h4>
                    Menu Cepat
                </h4>


                <p>
                    Akses layanan yang Anda butuhkan dengan cepat
                </p>

            </div>


            <div class="quick-menu">


                {{-- PERSYARATAN --}}

                <a href="#"
                   class="quick-card">

                    <div class="quick-icon quick-blue">

                        <i class="bi bi-file-earmark-check"></i>

                    </div>


                    <h6>
                        Persyaratan
                    </h6>


                    <p>
                        Lihat persyaratan layanan KUA.
                    </p>

                </a>



                {{-- ALUR --}}

                <a href="#"
                   class="quick-card">

                    <div class="quick-icon quick-green">

                        <i class="bi bi-diagram-3"></i>

                    </div>


                    <h6>
                        Alur Pelayanan
                    </h6>


                    <p>
                        Lihat alur pelayanan KUA.
                    </p>

                </a>



                {{-- PENGAJUAN --}}

                <a href="#"
                   class="quick-card">

                    <div class="quick-icon quick-orange">

                        <i class="bi bi-send"></i>

                    </div>


                    <h6>
                        Pengajuan
                    </h6>


                    <p>
                        Ajukan layanan KUA.
                    </p>

                </a>



                {{-- BANTUAN --}}

                <a href="#"
                   class="quick-card">

                    <div class="quick-icon quick-purple">

                        <i class="bi bi-question-circle"></i>

                    </div>


                    <h6>
                        Bantuan
                    </h6>


                    <p>
                        Dapatkan bantuan pelayanan.
                    </p>

                </a>


            </div>



            {{-- =================================================
                 INFORMATION
            ================================================== --}}

            <div class="information-card">

                <div class="information-content">

                    <div class="information-icon">

                        <i class="bi bi-info-lg"></i>

                    </div>


                    <div>

                        <h6>
                            Pelayanan KUA Kecamatan Karang Baru
                        </h6>


                        <p>

                            Kami siap memberikan pelayanan
                            yang mudah, ramah, transparan,
                            amanah, dan profesional kepada
                            masyarakat.

                        </p>

                    </div>

                </div>

            </div>


        </div>



        {{-- =================================================
             BAGIAN KANAN
             FOTO SLIDER
        ================================================== --}}

        <div class="photo-slider-card">


            <div class="photo-slider-header">

                <h5>
                    Informasi Pelayanan
                </h5>


                <p>
                    Klik foto untuk melihat ukuran besar
                </p>

            </div>



            <div class="photo-slider">


                <div
                    id="dashboardPhotoSlider"
                    class="carousel slide"
                    data-bs-ride="carousel"
                    data-bs-interval="4500"
                >


                    {{-- INDICATOR --}}

                    <div class="carousel-indicators">

                        <button
                            type="button"
                            data-bs-target="#dashboardPhotoSlider"
                            data-bs-slide-to="0"
                            class="active"
                            aria-current="true"
                        ></button>


                        <button
                            type="button"
                            data-bs-target="#dashboardPhotoSlider"
                            data-bs-slide-to="1"
                        ></button>

                    </div>



                    {{-- SLIDER --}}

                    <div class="carousel-inner">


                        {{-- =================================================
                             FOTO ALUR
                        ================================================== --}}

                        <div class="carousel-item active">

                            <img
                                src="{{ asset('alur.png') }}"
                                alt="Alur Pelayanan KUA"
                                class="slide-photo"
                                onclick="openPhotoModal(
                                    '{{ asset('alur.png') }}',
                                    'Alur Pelayanan KUA'
                                )"
                            >

                        </div>



                        {{-- =================================================
                             FOTO SARAT
                        ================================================== --}}

                        <div class="carousel-item">

                            <img
                                src="{{ asset('sarat.png') }}"
                                alt="Persyaratan Pelayanan KUA"
                                class="slide-photo"
                                onclick="openPhotoModal(
                                    '{{ asset('sarat.png') }}',
                                    'Persyaratan Pelayanan KUA'
                                )"
                            >

                        </div>


                    </div>



                    {{-- TULISAN KLIK --}}

                    <div class="photo-click-info">

                        <i class="bi bi-zoom-in"></i>

                        Klik foto untuk memperbesar

                    </div>



                    {{-- PREVIOUS --}}

                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#dashboardPhotoSlider"
                        data-bs-slide="prev"
                    >

                        <span class="carousel-control-prev-icon"></span>

                        <span class="visually-hidden">
                            Sebelumnya
                        </span>

                    </button>



                    {{-- NEXT --}}

                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#dashboardPhotoSlider"
                        data-bs-slide="next"
                    >

                        <span class="carousel-control-next-icon"></span>

                        <span class="visually-hidden">
                            Berikutnya
                        </span>

                    </button>


                </div>

            </div>


        </div>


    </div>


</div>



{{-- =========================================================
     MODAL FOTO BESAR
========================================================= --}}

<div
    id="photoModal"
    class="photo-modal"
    onclick="closePhotoModal(event)"
>


    <div class="photo-modal-content">


        {{-- TOMBOL CLOSE --}}

        <button
            type="button"
            class="photo-modal-close"
            onclick="closePhotoModal()"
            aria-label="Tutup"
        >

            <i class="bi bi-x-lg"></i>

        </button>



        {{-- FOTO BESAR --}}

        <img
            id="photoModalImage"
            src=""
            alt=""
            class="photo-modal-image"
        >



        {{-- JUDUL --}}

        <div
            id="photoModalTitle"
            class="photo-modal-title"
        ></div>


    </div>


</div>



{{-- =========================================================
     JAVASCRIPT FOTO
========================================================= --}}

<script>

function openPhotoModal(imageUrl, title) {

    const modal = document.getElementById('photoModal');

    const image = document.getElementById('photoModalImage');

    const titleElement = document.getElementById('photoModalTitle');


    image.src = imageUrl;

    image.alt = title;

    titleElement.innerText = title;


    modal.classList.add('show');


    document.body.style.overflow = 'hidden';

}


/* =========================================================
   TUTUP MODAL
========================================================= */

function closePhotoModal(event) {

    const modal = document.getElementById('photoModal');


    /*
     * Kalau yang diklik adalah area gambar,
     * jangan tutup modal.
     */

    if (
        event &&
        event.target &&
        event.target.id === 'photoModalImage'
    ) {

        return;

    }


    modal.classList.remove('show');


    document.body.style.overflow = '';


    /*
     * Kosongkan gambar setelah ditutup
     */

    setTimeout(function() {

        document.getElementById('photoModalImage').src = '';

    }, 200);

}


/* =========================================================
   TOMBOL ESC UNTUK MENUTUP
========================================================= */

document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {

        closePhotoModal();

    }

});

</script>


@endsection