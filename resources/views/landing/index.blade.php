@extends('layouts.applanding')

@section('title', 'KUA Karang Baru | Beranda')

@section('content')
{{-- =========================================================
     HERO SECTION (Slider Carousel)
========================================================= --}}
<section class="hero-section position-relative overflow-hidden" id="beranda" style="margin-top: -1px;">
    <div class="hero-slider-container position-relative w-100" style="height: 580px;">

        <div id="heroSlider" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                    <img src="{{ asset('88.png') }}" class="w-100 h-100 object-fit-cover" alt="Kantor KUA Karang Baru">
                    {{-- Overlay ditingkatkan gelapnya agar kontras teks optimal --}}
                    <div class="position-absolute inset-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(2, 6, 23, 0.96) 0%, rgba(2, 6, 23, 0.82) 55%, rgba(2, 6, 23, 0.45) 100%);"></div>
                </div>
                <div class="carousel-item h-100">
                    <img src="{{ asset('ud.png') }}" class="w-100 h-100 object-fit-cover" alt="Pelayanan KUA">
                    <div class="position-absolute inset-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(2, 6, 23, 0.96) 0%, rgba(2, 6, 23, 0.82) 55%, rgba(2, 6, 23, 0.45) 100%);"></div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
        </div>

        {{-- KONTEN TEKS HERO --}}
        <div class="position-absolute top-50 start-0 translate-middle-y z-3 ps-4 ps-md-5 ms-md-4" style="max-width: 750px;">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-0 text-white shadow-sm" style="background: rgba(37, 99, 235, 0.95); font-size: 13px; font-weight: 700;">
                <i class="fas fa-mosque"></i>
                <span>KANTOR URUSAN AGAMA</span>
            </div>

            <h1 class="text-white display-4 mb-3 text-shadow" style="font-weight: 800; line-height: 1.1;">
                Pelayanan KUA <span class="d-block text-warning">Karang Baru</span>
            </h1>

            {{-- Opini dan ketebalan teks disesuaikan agar sangat mudah dibaca --}}
            <p class="text-white fs-6 mb-4 fw-normal text-shadow-sm" style="opacity: 0.98; line-height: 1.6;">
                Memberikan pelayanan kepada masyarakat dengan mudah, cepat, transparan, dan profesional di wilayah Karang Baru.
            </p>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('landing.layanan') }}" class="btn btn-primary px-4 py-3 fw-bold rounded-0 shadow-lg">
                    <i class="fas fa-hand-holding-heart me-2"></i> Lihat Layanan
                </a>
                <a href="{{ route('landing.tentang') }}" class="btn btn-outline-light px-4 py-3 fw-bold rounded-0 shadow-sm" style="background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(5px);">
                    <i class="fas fa-info-circle me-2"></i> Tentang KUA
                </a>
            </div>
        </div>

    </div>
</section>

{{-- =========================================================
     1. QUICK INFO BAR (Informasi Cepat di Bawah Hero)
========================================================= --}}
<section class="py-4 bg-white shadow-sm position-relative z-2" style="margin-top: -30px;">
    <div class="container">

        {{-- =================================================
             INFORMASI UTAMA
        ================================================== --}}
        <div class="row g-4 align-items-stretch">

            {{-- JAM OPERASIONAL --}}
            <div class="col-md-4">
                <div class="p-4 bg-light border rounded-4 shadow-sm h-100 position-relative overflow-hidden">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                            style="width: 65px; height: 65px;">
                            <i class="fas fa-clock fs-3"></i>
                        </div>

                        <div>
                            <span class="badge bg-primary rounded-pill mb-2">
                                INFORMASI
                            </span>

                            <h6 class="fw-bold mb-1 text-dark">
                                Jam Operasional
                            </h6>

                            <p class="text-secondary small mb-0">
                                Senin - Kamis: 08.00 - 15.00 WIB<br>
                                Jumat: 08.00 - 16.30 WIB
                            </p>
                        </div>

                    </div>

                    <div class="mt-3 pt-3 border-top">
                        <small class="text-muted">
                            <i class="fas fa-calendar-check text-primary me-1"></i>
                            Pelayanan pada hari kerja
                        </small>
                    </div>

                </div>
            </div>


            {{-- LOKASI KANTOR --}}
            <div class="col-md-4">
                <div class="p-4 bg-white border border-primary rounded-4 shadow h-100">

                    <div class="d-flex align-items-start gap-3">

                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 flex-shrink-0">
                            <i class="fas fa-map-marked-alt fs-2"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold mb-2 text-dark">
                                Lokasi Kantor
                            </h6>

                            <p class="text-secondary small mb-3">
                                Jl. Medan - Banda Aceh, Medang Ara,
                                Kec. Karang Baru,
                                Kab. Aceh Tamiang
                            </p>

                            <span class="badge bg-light text-primary border rounded-pill">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                KUA Karang Baru
                            </span>
                        </div>

                    </div>

                </div>
            </div>


            {{-- LAYANAN INFORMASI --}}
            <div class="col-md-4">
                <div class="p-4 bg-primary text-white rounded-4 shadow h-100">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>
                            <span class="badge bg-white text-primary rounded-pill mb-3">
                                SIAP MELAYANI
                            </span>

                            <h5 class="fw-bold mb-2">
                                Layanan Informasi
                            </h5>

                            <p class="small mb-0 opacity-75">
                                Hubungi kontak kami atau datang langsung
                                untuk mendapatkan informasi dan asistensi
                                pelayanan.
                            </p>
                        </div>

                        <div class="bg-white text-primary rounded-circle p-3 ms-2">
                            <i class="fas fa-headset fs-3"></i>
                        </div>

                    </div>

                    <div class="mt-4 pt-3 border-top border-light">
                        <small>
                            <i class="fas fa-phone-alt me-1"></i>
                            Informasi & bantuan pelayanan
                        </small>
                    </div>

                </div>
            </div>

        </div>


        {{-- =================================================
             AKSES CEPAT
        ================================================== --}}
        <div class="row g-3 mt-4 pt-4 border-top">

            <div class="col-12 mb-1">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase text-muted fw-bold"
                            style="font-size: 11px; letter-spacing: 0.8px;">
                            Akses Cepat
                        </span>

                        <h6 class="fw-bold text-dark mb-0 mt-1">
                            Layanan Utama KUA
                        </h6>
                    </div>

                    <i class="fas fa-arrow-right text-primary"></i>
                </div>
            </div>


            {{-- PENDAFTARAN NIKAH --}}
            <div class="col-6 col-lg-3">
                <a href="{{ route('landing.layanan') }}"
                    class="btn btn-outline-primary w-100 rounded-3 py-3 text-start shadow-sm">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                            <i class="fas fa-rings-wedding text-primary fs-5"></i>
                        </div>

                        <div>
                            <div class="small fw-bold text-dark">
                                Pendaftaran Nikah
                            </div>
                            <small class="text-muted">
                                Informasi & layanan
                            </small>
                        </div>

                    </div>
                </a>
            </div>


            {{-- BIMBINGAN PRA NIKAH --}}
            <div class="col-6 col-lg-3">
                <a href="{{ route('landing.layanan') }}"
                    class="btn btn-outline-success w-100 rounded-3 py-3 text-start shadow-sm">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-success bg-opacity-10 rounded-3 p-2">
                            <i class="fas fa-hands-heart text-success fs-5"></i>
                        </div>

                        <div>
                            <div class="small fw-bold text-dark">
                                Bimbingan Pra-Nikah
                            </div>
                            <small class="text-muted">
                                Pembinaan keluarga
                            </small>
                        </div>

                    </div>
                </a>
            </div>


            {{-- LEGALISASI --}}
            <div class="col-6 col-lg-3">
                <a href="{{ route('landing.layanan') }}"
                    class="btn btn-outline-warning w-100 rounded-3 py-3 text-start shadow-sm">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-warning bg-opacity-10 rounded-3 p-2">
                            <i class="fas fa-file-certificate text-warning fs-5"></i>
                        </div>

                        <div>
                            <div class="small fw-bold text-dark">
                                Legalisasi Dokumen
                            </div>
                            <small class="text-muted">
                                Administrasi dokumen
                            </small>
                        </div>

                    </div>
                </a>
            </div>


            {{-- KONSULTASI --}}
            <div class="col-6 col-lg-3">
                <a href="{{ route('landing.layanan') }}"
                    class="btn btn-outline-info w-100 rounded-3 py-3 text-start shadow-sm">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-info bg-opacity-10 rounded-3 p-2">
                            <i class="fas fa-comments text-info fs-5"></i>
                        </div>

                        <div>
                            <div class="small fw-bold text-dark">
                                Konsultasi Syariah
                            </div>
                            <small class="text-muted">
                                Konsultasi & informasi
                            </small>
                        </div>

                    </div>
                </a>
            </div>

        </div>

    </div>
</section>

{{-- =========================================================
     2. SECTION BERITA TERBARU
     3 CARD SAJA
     1 BESAR + 2 KECIL
     CARD BESAR BERGANTIAN OTOMATIS
========================================================= --}}
<section class="py-5 bg-white">

    <div class="container py-4">

        {{-- =====================================================
             JUDUL
        ====================================================== --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 pb-2 border-bottom">

            <div>

                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-0 fw-bold mb-2">
                    BERITA & INFORMASI
                </span>

                <h2 class="fw-bold text-dark mb-0">
                    Berita Terbaru KUA Karang Baru
                </h2>

            </div>


            @if(isset($berita) && $berita->count() > 0)

            <div class="mt-3 mt-md-0">

                <a href="{{ route('landing.berita') }}"
                    class="text-primary fw-bold text-decoration-none d-inline-flex align-items-center gap-2">

                    Lihat Semua Berita

                    <i class="fas fa-arrow-right small"></i>

                </a>

            </div>

            @endif

        </div>


        {{-- =====================================================
             BERITA
        ====================================================== --}}
        @if(isset($berita) && $berita->count() > 0)

        @php

        /*
        |--------------------------------------------------------------------------
        | HANYA AMBIL 3 BERITA
        |--------------------------------------------------------------------------
        */
        $beritaTampil = $berita->take(3)->values();

        @endphp


        {{-- =================================================
                 CONTAINER SLIDE
            ================================================== --}}
        <div id="beritaSlider"
            class="berita-slider-container">


            {{-- =================================================
                     CARD BESAR
                     BERITA YANG AKTIF
                ================================================== --}}
            <div class="berita-slide-area">


                @foreach($beritaTampil as $index => $item)

                @php

                if ($item->foto === 'bimwin.jpg') {

                $fotoPublic = 'bimbingan1.jpg';

                } else {

                $fotoPublic = $item->foto;

                }

                $fotoPath = $fotoPublic
                ? public_path($fotoPublic)
                : null;

                @endphp


                <div class="berita-big-slide {{ $index === 0 ? 'active' : '' }}"
                    data-slide="{{ $index }}">


                    <div class="card premium-main-card border-0 shadow-sm rounded-0 overflow-hidden h-100">


                        {{-- =================================================
                                     GAMBAR BESAR
                                ================================================== --}}
                        <div class="premium-main-image position-relative"
                            style="height: 380px;">


                            @if(
                            $fotoPublic &&
                            $fotoPath &&
                            file_exists($fotoPath)
                            )

                            <img
                                src="{{ asset($fotoPublic) }}"
                                alt="{{ $item->judul }}"
                                class="w-100 h-100 object-fit-cover">

                            @else

                            <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light text-primary"
                                style="min-height: 380px;">

                                <i class="fas fa-newspaper"
                                    style="font-size: 60px;">
                                </i>

                            </div>

                            @endif


                            {{-- LABEL UTAMA --}}
                            <span class="position-absolute top-0 start-0 m-3 badge bg-primary px-3 py-2 rounded-0 fw-bold shadow-sm">

                                <i class="fas fa-star me-1"></i>

                                UTAMA

                            </span>

                        </div>


                        {{-- =================================================
                                     ISI BERITA BESAR
                                ================================================== --}}
                        <div class="card-body p-4 p-lg-5 bg-white">


                            {{-- TANGGAL --}}
                            <div class="text-muted small mb-2">

                                <i class="fas fa-calendar-alt text-primary me-1"></i>

                                {{ $item->created_at->format('l, d F Y') }}

                            </div>


                            {{-- JUDUL --}}
                            <h3 class="fw-bold text-dark mb-3"
                                style="font-size: 24px; line-height: 1.3;">

                                <a
                                    href="{{ route('berita.detail', $item->slug) }}"
                                    class="text-dark text-decoration-none">

                                    {{ $item->judul }}

                                </a>

                            </h3>


                            {{-- DESKRIPSI --}}
                            <p class="text-secondary mb-0"
                                style="line-height: 1.7; font-size: 15px;">

                                {{ \Illuminate\Support\Str::limit(
                                            strip_tags($item->isi),
                                            180
                                        ) }}

                            </p>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>



            {{-- =================================================
                     2 CARD KECIL DI KANAN
                     BERITA SELAIN YANG BESAR
                ================================================== --}}
            <div class="berita-small-area">


                @foreach($beritaTampil as $index => $item)

                @php

                if ($item->foto === 'bimwin.jpg') {

                $fotoSmall = 'bimbingan1.jpg';

                } else {

                $fotoSmall = $item->foto;

                }

                $fotoSmallPath = $fotoSmall
                ? public_path($fotoSmall)
                : null;

                @endphp


                <div class="berita-small-card {{ $index === 0 ? 'small-active' : '' }}"
                    data-small="{{ $index }}">


                    <div class="card border-0 shadow-sm rounded-0 p-3 bg-white h-100">

                        <div class="row g-3 align-items-center h-100">


                            {{-- =================================================
                                         GAMBAR
                                    ================================================== --}}
                            <div class="col-5">

                                <div class="rounded-0 overflow-hidden"
                                    style="height: 120px;">


                                    @if(
                                    $fotoSmall &&
                                    $fotoSmallPath &&
                                    file_exists($fotoSmallPath)
                                    )

                                    <img
                                        src="{{ asset($fotoSmall) }}"
                                        alt="{{ $item->judul }}"
                                        class="w-100 h-100 object-fit-cover">

                                    @else

                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light text-primary">

                                        <i class="fas fa-newspaper"
                                            style="font-size: 30px;">
                                        </i>

                                    </div>

                                    @endif

                                </div>

                            </div>



                            {{-- =================================================
                                         INFORMASI
                                    ================================================== --}}
                            <div class="col-7">


                                {{-- TANGGAL --}}
                                <div class="text-primary small fw-semibold mb-2"
                                    style="font-size: 12px;">

                                    <i class="fas fa-calendar-alt me-1"></i>

                                    {{ $item->created_at->format('d M Y') }}

                                </div>


                                {{-- JUDUL --}}
                                <h5 class="fw-bold text-dark mb-0"
                                    style="font-size: 15px; line-height: 1.4;">

                                    {{ \Illuminate\Support\Str::limit(
                                                $item->judul,
                                                65
                                            ) }}

                                </h5>


                            </div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>


        @else


        {{-- =================================================
                 BELUM ADA BERITA
            ================================================== --}}
        <div class="text-center bg-light rounded-0 shadow-sm p-5">

            <i class="fas fa-newspaper text-secondary mb-3"
                style="font-size: 50px;">
            </i>

            <h4 class="fw-bold text-dark">
                Belum Ada Berita
            </h4>

            <p class="text-secondary mb-0">

                Belum ada berita atau informasi yang dipublikasikan
                oleh KUA Karang Baru.

            </p>

        </div>


        @endif

    </div>

</section>



{{-- =========================================================
     CSS
========================================================= --}}
<style>
    /*
    |--------------------------------------------------------------------------
    | CONTAINER
    |--------------------------------------------------------------------------
    */

    .berita-slider-container {

        display: grid;

        grid-template-columns: 7fr 5fr;

        gap: 24px;

        align-items: stretch;

    }


    /*
    |--------------------------------------------------------------------------
    | AREA CARD BESAR
    |--------------------------------------------------------------------------
    */

    .berita-slide-area {

        position: relative;

        min-height: 600px;

    }


    /*
    |--------------------------------------------------------------------------
    | CARD BESAR
    |--------------------------------------------------------------------------
    */

    .berita-big-slide {

        position: absolute;

        inset: 0;

        opacity: 0;

        visibility: hidden;

        transform: translateX(30px);

        transition:
            opacity .7s ease,
            transform .7s ease,
            visibility .7s ease;

    }


    .berita-big-slide.active {

        opacity: 1;

        visibility: visible;

        transform: translateX(0);

        z-index: 2;

    }


    /*
    |--------------------------------------------------------------------------
    | AREA CARD KECIL
    |--------------------------------------------------------------------------
    */

    .berita-small-area {

        display: flex;

        flex-direction: column;

        gap: 24px;

    }


    /*
    |--------------------------------------------------------------------------
    | CARD KECIL
    |--------------------------------------------------------------------------
    */

    .berita-small-card {

        transition:
            opacity .5s ease,
            transform .5s ease;

        flex: 1;

    }


    /*
    |--------------------------------------------------------------------------
    | CARD KECIL YANG AKTIF
    |--------------------------------------------------------------------------
    */

    .berita-small-card.small-active {

        transform: scale(1.02);

        box-shadow:
            0 8px 25px rgba(0, 0, 0, .08) !important;

    }


    /*
    |--------------------------------------------------------------------------
    | HOVER
    |--------------------------------------------------------------------------
    */

    .premium-main-card {

        transition:
            transform .3s ease,
            box-shadow .3s ease;

    }


    .premium-main-card:hover {

        transform: translateY(-3px);

        box-shadow:
            0 15px 35px rgba(0, 0, 0, .12) !important;

    }


    .berita-small-card .card {

        transition:
            transform .3s ease,
            box-shadow .3s ease;

    }


    .berita-small-card .card:hover {

        transform: translateY(-3px);

        box-shadow:
            0 10px 25px rgba(0, 0, 0, .10) !important;

    }


    /*
    |--------------------------------------------------------------------------
    | GAMBAR
    |--------------------------------------------------------------------------
    */

    .object-fit-cover {

        object-fit: cover;

        object-position: center;

    }


    /*
    |--------------------------------------------------------------------------
    | TABLET
    |--------------------------------------------------------------------------
    */

    @media (max-width: 991.98px) {

        .berita-slider-container {

            grid-template-columns: 1fr;

        }


        .berita-slide-area {

            min-height: 600px;

        }


        .berita-small-area {

            display: grid;

            grid-template-columns: 1fr 1fr;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | HP
    |--------------------------------------------------------------------------
    */

    @media (max-width: 575.98px) {

        .berita-slide-area {

            min-height: 560px;

        }


        .berita-small-area {

            grid-template-columns: 1fr;

        }


        .premium-main-image {

            height: 280px !important;

        }


        .berita-big-slide .card-body {

            padding: 20px !important;

        }


        .berita-big-slide h3 {

            font-size: 20px !important;

        }

    }
</style>



{{-- =========================================================
     JAVASCRIPT SLIDE
========================================================= --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const bigSlides = document.querySelectorAll('.berita-big-slide');

        const smallCards = document.querySelectorAll('.berita-small-card');

        let currentSlide = 0;

        /*
        |--------------------------------------------------------------------------
        | Kalau berita kurang dari 2
        |--------------------------------------------------------------------------
        */

        if (bigSlides.length <= 1) {

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | Fungsi pindah berita
        |--------------------------------------------------------------------------
        */

        function changeBerita(index) {


            /*
            |----------------------------------------------------------
            | CARD BESAR
            |----------------------------------------------------------
            */

            bigSlides.forEach(function(slide) {

                slide.classList.remove('active');

            });


            /*
            |----------------------------------------------------------
            | CARD KECIL
            |----------------------------------------------------------
            */

            smallCards.forEach(function(card) {

                card.classList.remove('small-active');

            });


            /*
            |----------------------------------------------------------
            | AKTIFKAN BERITA BARU
            |----------------------------------------------------------
            */

            if (bigSlides[index]) {

                bigSlides[index].classList.add('active');

            }


            /*
            |----------------------------------------------------------
            | CARD KECIL
            |
            | Berita yang sedang besar tidak ditampilkan
            | sebagai card kecil.
            |----------------------------------------------------------
            */

            smallCards.forEach(function(card, cardIndex) {

                if (cardIndex !== index) {

                    card.style.display = '';

                } else {

                    card.style.display = 'none';

                }

            });


            /*
            |----------------------------------------------------------
            | Simpan index
            |----------------------------------------------------------
            */

            currentSlide = index;

        }


        /*
        |--------------------------------------------------------------------------
        | Jalankan pertama kali
        |--------------------------------------------------------------------------
        */

        changeBerita(0);


        /*
        |--------------------------------------------------------------------------
        | BERGANTI SETIAP 5 DETIK
        |--------------------------------------------------------------------------
        */

        setInterval(function() {

            currentSlide++;

            if (currentSlide >= bigSlides.length) {

                currentSlide = 0;

            }

            changeBerita(currentSlide);

        }, 5000);

    });
</script>

{{-- =========================================================
     3. SECTION LAYANAN UNGGULAN
     DATA DIAMBIL DARI DATABASE
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container py-4">

        {{-- =====================================================
             JUDUL SECTION
        ====================================================== --}}
        <div class="text-center mb-4">

            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-0 fw-bold mb-2">
                LAYANAN KAMI
            </span>

            <h2 class="fw-bold text-dark mb-2">
                Layanan Utama KUA Karang Baru
            </h2>

            <p class="text-secondary mx-auto mb-0"
                style="max-width: 600px; font-size: 14px;">

                Berbagai kemudahan layanan keagamaan dan administrasi
                yang kami hadirkan untuk masyarakat.

            </p>

        </div>


        {{-- =====================================================
             DATA LAYANAN DARI DATABASE
        ====================================================== --}}
        @if(isset($layanan) && $layanan->count() > 0)

        <div class="row g-3">

            @foreach($layanan as $item)

            {{-- =================================================
                         CARD LAYANAN
                    ================================================== --}}
            <div class="col-xl-3 col-lg-4 col-md-6">

                <div class="card layanan-card border-0 shadow-sm h-100 rounded-0 bg-white">

                    <div class="card-body p-3 d-flex flex-column">

                        {{-- =================================================
                                     ICON
                                ================================================== --}}
                        <div class="layanan-icon mb-2">

                            <i class="fas fa-mosque"></i>

                        </div>


                        {{-- =================================================
                                     JUDUL LAYANAN
                                ================================================== --}}
                        <h5 class="fw-bold text-dark mb-2 layanan-title">

                            {{ $item->judul }}

                        </h5>


                        {{-- =================================================
                                     ISI / DESKRIPSI
                                ================================================== --}}
                        <p class="text-secondary small mb-3 layanan-description">

                            {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->isi),
                                        90
                                    ) }}

                        </p>


                        {{-- =================================================
                                     TOMBOL DETAIL
                                ================================================== --}}
                        <a
                            href="{{ route('layanan.show', $item->id) }}"
                            class="layanan-link mt-auto">

                            Selengkapnya

                            <i class="fas fa-arrow-right ms-1"></i>

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>


        @else

        {{-- =================================================
                 JIKA BELUM ADA DATA
            ================================================== --}}
        <div class="text-center bg-white shadow-sm p-4">

            <i class="fas fa-concierge-bell text-secondary mb-2"
                style="font-size: 35px;">
            </i>

            <h5 class="fw-bold text-dark">
                Belum Ada Layanan
            </h5>

            <p class="text-secondary small mb-0">
                Data layanan belum tersedia.
            </p>

        </div>

        @endif

    </div>

</section>


{{-- =========================================================
     CSS
========================================================= --}}
<style>
    /* CARD */

    .layanan-card {

        transition:
            transform .25s ease,
            box-shadow .25s ease;

        border: 1px solid rgba(0, 0, 0, .04) !important;

    }


    /* HOVER */

    .layanan-card:hover {

        transform: translateY(-4px);

        box-shadow:
            0 10px 25px rgba(0, 0, 0, .10) !important;

    }


    /* ICON */

    .layanan-icon {

        width: 40px;

        height: 40px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: rgba(13, 110, 253, .08);

        color: #0d6efd;

        font-size: 18px;

    }


    /* JUDUL */

    .layanan-title {

        font-size: 15px;

        line-height: 1.35;

        min-height: 40px;

    }


    /* DESKRIPSI */

    .layanan-description {

        font-size: 12px;

        line-height: 1.55;

        min-height: 38px;

    }


    /* LINK */

    .layanan-link {

        display: inline-flex;

        align-items: center;

        font-size: 12px;

        font-weight: 700;

        color: #0d6efd;

        text-decoration: none;

        transition: .2s ease;

    }


    .layanan-link:hover {

        color: #084298;

    }


    /* RESPONSIVE */

    @media (max-width: 575.98px) {

        .layanan-title {

            font-size: 14px;

        }

        .layanan-description {

            font-size: 12px;

        }

    }
</style>

@endsection

@push('styles')
<style>
    .text-shadow {
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.75);
    }

    .text-shadow-sm {
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.75);
    }

    .transition-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1) !important;
    }

    .premium-main-card {
        border: 1px solid #e9eef5 !important;
        transition: all .35s ease;
    }

    .premium-main-card:hover {
        box-shadow: 0 20px 45px rgba(15, 23, 42, .1) !important;
    }

    .premium-main-image {
        height: 340px;
        overflow: hidden;
        background: linear-gradient(135deg, #dbeafe, #eff6ff);
    }

    .premium-main-image img {
        transition: transform .5s ease;
    }

    .premium-main-card:hover .premium-main-image img {
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .premium-main-image {
            height: 220px;
        }
    }
</style>

@endpush