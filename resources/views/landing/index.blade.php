@extends('layouts.applanding')

@section('title', 'KUA Karang Baru | Beranda')

@section('content')

{{-- =====================================================
     1. HERO SLIDER
===================================================== --}}

<section class="hero-section-kua" id="beranda">

    <div class="hero-slider-container-kua">

        <div id="heroSlider" class="carousel slide h-100"
            data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroSlider"
                    data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>

                <button type="button" data-bs-target="#heroSlider"
                    data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>

            <div class="carousel-inner h-100">

                <div class="carousel-item active h-100">
                    <img src="{{ asset('foto/landing/kantorbenar.jpg') }}"
                        class="hero-image-kua"
                        alt="Kantor KUA Karang Baru">
                </div>

                <div class="carousel-item h-100">
                    <img src="{{ asset('foto/landing/pegawaikua.jpeg') }}"
                        class="hero-image-kua"
                        alt="Pelayanan KUA Karang Baru">
                </div>
            </div>

            <button class="carousel-control-prev" type="button"
                data-bs-target="#heroSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>

            <button class="carousel-control-next" type="button"
                data-bs-target="#heroSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>

        </div>

        <div class="hero-overlay-kua"></div>

        <div class="hero-content-kua">

            <div class="hero-badge-kua">
                <i class="fas fa-mosque"></i>
                <span>KANTOR URUSAN AGAMA</span>
            </div>

            <h1 class="hero-title-kua">
                Pelayanan KUA
                <span>Karang Baru</span>
            </h1>

            <p class="hero-description-kua">
                Memberikan pelayanan kepada masyarakat dengan mudah,
                cepat, transparan, dan profesional di wilayah Karang Baru.
            </p>

            <div class="hero-buttons-kua">

                <a href="{{ route('landing.layanan') }}"
                    class="btn-hero-primary-kua">
                    <i class="fas fa-hand-holding-heart"></i>
                    Lihat Layanan
                </a>

                <a href="{{ route('landing.tentang') }}"
                    class="btn-hero-secondary-kua">
                    <i class="fas fa-info-circle"></i>
                    Tentang KUA
                </a>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     2. QUICK INFORMATION
===================================================== --}}

<section class="quick-info-section">

    <div class="container">

        <div class="row g-4 align-items-stretch">

            {{-- JAM OPERASIONAL --}}
            <div class="col-md-4 reveal">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fas fa-clock"></i>
                    </div>

                    <div class="quick-content">

                        <span class="quick-label">INFORMASI</span>

                        <h6>Jam Operasional</h6>

                        <p>
                            Senin - Kamis: 08.00 - 15.00 WIB<br>
                            Jumat: 08.00 - 16.30 WIB
                        </p>

                    </div>

                    <div class="quick-bottom">
                        <i class="fas fa-calendar-check"></i>
                        Pelayanan pada hari kerja
                    </div>

                </div>

            </div>

            {{-- LOKASI --}}
            <div class="col-md-4 reveal">

                <div class="quick-card">

                    <div class="quick-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>

                    <div class="quick-content">

                        <h6>Lokasi Kantor</h6>

                        <p>
                            Jl. Medan - Banda Aceh, Medang Ara,
                            Kec. Karang Baru,
                            Kab. Aceh Tamiang
                        </p>

                        <span class="quick-location">
                            <i class="fas fa-map-marker-alt"></i>
                            KUA Karang Baru
                        </span>

                    </div>

                </div>

            </div>

            {{-- INFORMASI --}}
            <div class="col-md-4 reveal">

                <div class="quick-card">

                    <div class="service-top">

                        <div>
                            <span class="quick-label">SIAP MELAYANI</span>
                            <h5>Layanan Informasi</h5>
                        </div>

                        <div class="quick-icon service-icon">
                            <i class="fas fa-headset"></i>
                        </div>

                    </div>

                    <p class="service-description">
                        Hubungi kontak kami atau datang langsung
                        untuk mendapatkan informasi dan asistensi
                        pelayanan.
                    </p>

                    <div class="quick-bottom">
                        <i class="fas fa-phone-alt"></i>
                        Informasi dan bantuan pelayanan
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     3. LAYANAN KUA - SLIDER FOTO LOGO LINGKARAN
===================================================== --}}

<section class="home-service-section" id="layanan">

    <div class="container">

        <div class="section-heading reveal">

            <span class="section-eyebrow">
                <i class="fas fa-hand-holding-heart"></i>
                PELAYANAN KAMI
            </span>

            <h2>Layanan KUA Karang Baru</h2>

            <div class="section-line"></div>

            <p>
                Berbagai layanan keagamaan dan administrasi untuk
                membantu memenuhi kebutuhan masyarakat Kecamatan Karang Baru.
            </p>

        </div>


        @if(isset($layanan) && $layanan->count() > 0)

        <div class="service-slider-wrapper reveal">

            {{-- TOMBOL KIRI --}}
            <button type="button"
                class="service-slider-arrow service-slider-prev"
                id="servicePrev"
                aria-label="Layanan sebelumnya">

                <i class="fas fa-chevron-left"></i>

            </button>


            {{-- SLIDER --}}
            <div class="service-slider-viewport" id="serviceViewport">

                <div class="service-slider-track" id="serviceTrack">

                    @foreach($layanan as $index => $item)

                    @php
                    $gambarPath = $item->gambar
                    ? public_path('foto/layanan/' . basename($item->gambar))
                    : null;

                    $gambarUrl = $item->gambar
                    ? asset('foto/layanan/' . basename($item->gambar))
                    : null;
                    @endphp

                    <article class="service-circle-item">

                        {{-- FOTO LOGO --}}
                        <a href="{{ route('layanan.show', $item->id) }}"
                            class="service-circle-link"
                            aria-label="Lihat layanan {{ $item->judul }}">

                            <div class="service-circle-image">

                                <div class="service-circle-inner">

                                    @if($gambarPath && file_exists($gambarPath))

                                    <img src="{{ $gambarUrl }}"
                                        alt="{{ $item->judul }}"
                                        loading="lazy">

                                    @else

                                    <div class="service-circle-placeholder">
                                        <i class="fas fa-mosque"></i>
                                    </div>

                                    @endif

                                </div>

                                <div class="service-circle-overlay">
                                    <i class="fas fa-arrow-right"></i>
                                </div>

                            </div>

                        </a>


                        {{-- NOMOR --}}
                        <span class="service-circle-number">
                            {{ sprintf('%02d', $index + 1) }}
                        </span>


                        {{-- NAMA --}}
                        <h3 class="service-circle-title">
                            {{ $item->judul }}
                        </h3>


                        {{-- DESKRIPSI --}}
                        <p class="service-circle-description">
                            {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->isi), 75
                                    ) }}
                        </p>


                        {{-- DETAIL --}}
                        <a href="{{ route('layanan.show', $item->id) }}"
                            class="service-circle-detail">

                            Lihat Detail
                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </article>

                    @endforeach

                </div>

            </div>


            {{-- TOMBOL KANAN --}}
            <button type="button"
                class="service-slider-arrow service-slider-next"
                id="serviceNext"
                aria-label="Layanan berikutnya">

                <i class="fas fa-chevron-right"></i>

            </button>

        </div>


        {{-- INDIKATOR --}}
        <div class="service-slider-bottom">

            <div class="service-slider-progress">
                <div class="service-slider-progress-bar"
                    id="serviceProgressBar"></div>
            </div>

            <span class="service-slider-caption">
                Geser untuk melihat layanan lainnya
            </span>

        </div>


        {{-- SEMUA LAYANAN --}}
        <div class="service-more reveal">

            <a href="{{ route('landing.layanan') }}"
                class="service-more-button">

                Lihat Semua Layanan
                <i class="fas fa-arrow-right"></i>

            </a>

        </div>

        @else

        <div class="service-empty reveal">

            <i class="fas fa-folder-open"></i>

            <h4>Layanan Belum Tersedia</h4>

            <p>
                Informasi layanan akan ditampilkan setelah
                admin menambahkan data melalui CMS.
            </p>

        </div>

        @endif

    </div>

</section>



{{-- =====================================================
     4. BERITA TERBARU
===================================================== --}}

<section class="news-modern-section" id="berita">

    <div class="container">

        <div class="news-modern-header reveal">

            <div class="news-header-left">

                <span class="news-eyebrow">
                    <i class="fas fa-newspaper"></i>
                    INFORMASI TERKINI
                </span>

                <h2>Berita Terbaru</h2>

                <div class="news-title-line"></div>

                <p>
                    Informasi terbaru seputar kegiatan dan pelayanan
                    KUA Kecamatan Karang Baru.
                </p>

            </div>

            @if(isset($berita) && $berita->count() > 0)

                <a href="{{ route('landing.berita') }}"
                   class="news-all-button">

                    Lihat Semua Berita
                    <i class="fas fa-arrow-right"></i>

                </a>

            @endif

        </div>


        @if(isset($berita) && $berita->count() > 0)

            <div class="news-modern-grid">

                @foreach($berita as $index => $item)

                    @php
                        // PATH FOTO BERITA
                        $fotoPath = $item->foto
                            ? public_path('foto/berita/' . basename($item->foto))
                            : null;

                        // URL FOTO BERITA
                        $fotoUrl = $item->foto
                            ? asset('foto/berita/' . basename($item->foto))
                            : null;
                    @endphp

                    <article class="news-modern-card reveal">

                        <a href="{{ route('berita.detail', $item->slug) }}"
                           class="news-image-wrapper">

                            @if($fotoPath && file_exists($fotoPath))

                                <img
                                    src="{{ $fotoUrl }}"
                                    alt="{{ $item->judul }}"
                                    class="news-image"
                                    loading="lazy">

                            @else

                                <div class="news-image-placeholder">
                                    <i class="fas fa-newspaper"></i>
                                </div>

                            @endif

                            <span class="news-category">
                                BERITA KUA
                            </span>

                            <span class="news-number">
                                {{ sprintf('%02d', $index + 1) }}
                            </span>

                        </a>


                        <div class="news-card-content">

                            <div class="news-date">

                                <i class="far fa-calendar-alt"></i>

                                {{ $item->created_at
                                    ? $item->created_at->format('d F Y')
                                    : '-' }}

                            </div>


                            <h3 class="news-card-title">

                                <a href="{{ route('berita.detail', $item->slug) }}">

                                    {{ \Illuminate\Support\Str::limit(
                                        $item->judul, 65
                                    ) }}

                                </a>

                            </h3>


                            <p class="news-description">

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->isi), 115
                                ) }}

                            </p>


                            <div class="news-card-footer">

                                <a href="{{ route('berita.detail', $item->slug) }}"
                                   class="news-read-more">

                                    Baca Selengkapnya
                                    <i class="fas fa-arrow-right"></i>

                                </a>

                                <span class="news-read-icon">
                                    <i class="far fa-newspaper"></i>
                                </span>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="news-empty reveal">

                <div class="news-empty-icon">
                    <i class="far fa-newspaper"></i>
                </div>

                <h4>Belum Ada Berita</h4>

                <p>
                    Belum ada berita atau informasi yang dipublikasikan
                    oleh KUA Karang Baru.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =====================================================
     5. CSS - SOFT SAGE GREEN MODERN
===================================================== --}}

<style>
    :root {
        --green-bg: #DCEEDC;
        --green-card: #EAF5E8;
        --green-light: #F0F7EF;
        --green-medium: #C8E3C5;
        --green-accent: #78A982;
        --green-dark: #285C3A;
        --green-text: #365B42;
        --green-border: #D1E5CF;
    }


    /* GENERAL */

    .quick-info-section,
    .home-service-section,
    .news-modern-section {
        background: var(--green-bg);
    }

    .quick-info-section {
        position: relative;
        z-index: 2;
        margin-top: -20px;
        padding: 50px 0;
    }


    /* =====================================================
   HERO
===================================================== */

    .hero-section-kua {
        width: 100%;
        position: relative;
        overflow: hidden;
        background: var(--green-bg);
    }

    .hero-slider-container-kua {
        width: 100%;
        height: 500px;
        position: relative;
        overflow: hidden;
    }

    .hero-section-kua .carousel,
    .hero-section-kua .carousel-inner,
    .hero-section-kua .carousel-item {
        width: 100%;
        height: 100%;
    }

    .hero-image-kua {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center 45%;
        transition: transform 6s ease;
    }

    .hero-section-kua .carousel-item.active .hero-image-kua {
        transform: scale(1.02);
    }

    .hero-overlay-kua {
        position: absolute;
        inset: 0;
        z-index: 1;
        pointer-events: none;
        background: linear-gradient(90deg,
                rgba(10, 45, 27, .45),
                rgba(10, 45, 27, .22),
                rgba(10, 45, 27, .03));
    }

    .hero-content-kua {
        position: absolute;
        z-index: 3;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100%;
        max-width: 650px;
        padding: 0 25px 0 6%;
    }

    .hero-badge-kua {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 8px 14px;
        margin-bottom: 15px;
        background: var(--green-bg);
        color: var(--green-dark);
        border-radius: 5px;
        font-size: 11px;
        font-weight: 800;
    }

    .hero-title-kua {
        color: white;
        font-size: clamp(32px, 3.2vw, 45px);
        font-weight: 800;
        line-height: 1.2;
        margin: 0 0 14px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, .35);
    }

    .hero-title-kua span {
        display: block;
        color: #D1EBD1;
    }

    .hero-description-kua {
        color: white;
        font-size: 14px;
        line-height: 1.7;
        max-width: 490px;
        margin-bottom: 21px;
        text-shadow: 0 2px 6px rgba(0, 0, 0, .65);
    }

    .hero-buttons-kua {
        display: flex;
        flex-wrap: wrap;
        gap: 11px;
    }

    .btn-hero-primary-kua,
    .btn-hero-secondary-kua {
        min-height: 46px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 0 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: .3s;
    }

    .btn-hero-primary-kua {
        background: #198754;
        color: white;
        border: 1px solid #198754;
    }

    .btn-hero-primary-kua:hover {
        background: #146c43;
        color: white;
        transform: translateY(-3px);
    }

    .btn-hero-secondary-kua {
        background: rgba(255, 255, 255, .18);
        color: white;
        border: 1px solid white;
        backdrop-filter: blur(5px);
    }

    .btn-hero-secondary-kua:hover {
        background: var(--green-bg);
        color: var(--green-dark);
    }

    .hero-section-kua .carousel-indicators {
        z-index: 5;
    }

    .hero-section-kua .carousel-indicators button {
        width: 25px;
        height: 4px;
        border: 0;
        border-radius: 10px;
    }

    .hero-section-kua .carousel-indicators button.active {
        width: 38px;
        background: #B9DFBD;
    }


    /* =====================================================
   QUICK INFO
===================================================== */

    .quick-card {
        height: 100%;
        min-height: 245px;
        padding: 25px;
        border-radius: 17px;
        background: var(--green-card);
        border: 1px solid var(--green-border);
        box-shadow: 0 4px 15px rgba(40, 92, 58, .06);
        display: flex;
        flex-direction: column;
        transition: .35s;
    }

    .quick-card:hover {
        transform: translateY(-7px);
        background: var(--green-light);
        box-shadow: 0 12px 28px rgba(40, 92, 58, .12);
    }

    .quick-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: var(--green-medium);
        color: var(--green-dark);
        font-size: 24px;
        margin-bottom: 17px;
    }

    .quick-label {
        display: inline-block;
        padding: 6px 12px;
        background: var(--green-medium);
        color: var(--green-dark);
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .quick-content h6 {
        color: var(--green-dark);
        font-size: 18px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .quick-content p,
    .service-description {
        color: var(--green-text);
        font-size: 13px;
        line-height: 1.8;
    }

    .quick-bottom {
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid var(--green-border);
        color: var(--green-text);
        font-size: 12px;
    }

    .quick-bottom i {
        color: var(--green-accent);
        margin-right: 6px;
    }

    .quick-location {
        display: inline-flex;
        gap: 7px;
        padding: 7px 12px;
        margin-top: 14px;
        background: var(--green-medium);
        color: var(--green-dark);
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .service-top {
        display: flex;
        justify-content: space-between;
        gap: 12px;
    }

    .service-top h5 {
        color: var(--green-dark);
        font-size: 19px;
        font-weight: 800;
        margin: 0;
    }

    .service-icon {
        flex-shrink: 0;
        margin: 0;
    }


    /* =====================================================
   SECTION HEADING
===================================================== */

    .section-heading {
        max-width: 700px;
        text-align: center;
        margin: 0 auto 42px;
    }

    .section-eyebrow,
    .news-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        background: var(--green-medium);
        color: var(--green-dark);
        border-radius: 7px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .7px;
    }

    .section-heading h2 {
        color: var(--green-dark);
        font-size: 35px;
        font-weight: 900;
        margin: 15px 0 0;
    }

    .section-line {
        width: 65px;
        height: 4px;
        background: var(--green-accent);
        border-radius: 10px;
        margin: 13px auto;
    }

    .section-heading p {
        color: var(--green-text);
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }


    /* =====================================================
   LAYANAN KUA - CIRCLE SLIDER
===================================================== */

    .home-service-section {
        position: relative;
        padding: 75px 0 80px;
        background: var(--green-bg);
        overflow: hidden;
    }

    .home-service-section .section-heading {
        margin-bottom: 48px;
    }


    /* SLIDER */

    .service-slider-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0 45px;
    }

    .service-slider-viewport {
        width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        scroll-behavior: smooth;
        scrollbar-width: none;
        -ms-overflow-style: none;
        padding: 15px 3px 20px;
    }

    .service-slider-viewport::-webkit-scrollbar {
        display: none;
    }

    .service-slider-track {
        display: flex;
        align-items: flex-start;
        gap: 25px;
        width: max-content;
        min-width: 100%;
    }


    /* ITEM */

    .service-circle-item {
        position: relative;
        flex: 0 0 190px;
        width: 190px;
        min-width: 0;
        text-align: center;
        padding: 5px 10px 15px;
        transition: transform .35s ease;
    }

    .service-circle-item:hover {
        transform: translateY(-7px);
    }


    /* LINK */

    .service-circle-link {
        display: inline-block;
        text-decoration: none;
        outline: none;
    }


    /* FOTO LINGKARAN */

    .service-circle-image {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 17px;
        padding: 7px;
        border-radius: 50%;
        background: linear-gradient(145deg,
                #FFFFFF,
                var(--green-medium),
                var(--green-accent));
        box-shadow:
            0 7px 20px rgba(40, 92, 58, .12),
            0 0 0 5px rgba(255, 255, 255, .55);
        transition: all .4s ease;
    }

    .service-circle-item:hover .service-circle-image {
        transform: scale(1.07);
        box-shadow:
            0 12px 28px rgba(40, 92, 58, .20),
            0 0 0 7px rgba(255, 255, 255, .7);
    }

    .service-circle-inner {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 50%;
        background: var(--green-card);
        border: 3px solid white;
    }

    .service-circle-inner img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        border-radius: 50%;
        transition: transform .5s ease;
    }

    .service-circle-item:hover .service-circle-inner img {
        transform: scale(1.12);
    }


    /* FOTO KOSONG */

    .service-circle-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--green-medium);
        color: var(--green-dark);
        font-size: 45px;
    }


    /* OVERLAY */

    .service-circle-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(40, 92, 58, .55);
        color: white;
        font-size: 25px;
        opacity: 0;
        transition: opacity .35s ease;
        pointer-events: none;
    }

    .service-circle-item:hover .service-circle-overlay {
        opacity: 1;
    }


    /* NOMOR */

    .service-circle-number {
        position: absolute;
        top: 112px;
        right: 18px;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--green-dark);
        color: white;
        border: 3px solid var(--green-bg);
        border-radius: 50%;
        font-size: 10px;
        font-weight: 900;
        z-index: 2;
    }


    /* JUDUL */

    .service-circle-title {
        min-height: 48px;
        color: var(--green-dark);
        font-size: 15px;
        line-height: 1.5;
        font-weight: 800;
        margin: 0 0 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }


    /* DESKRIPSI */

    .service-circle-description {
        min-height: 60px;
        color: var(--green-text);
        font-size: 11px;
        line-height: 1.7;
        margin: 0 0 12px;
    }


    /* DETAIL */

    .service-circle-detail {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        color: var(--green-dark);
        font-size: 11px;
        font-weight: 800;
        text-decoration: none;
        transition: all .3s ease;
    }

    .service-circle-detail:hover {
        color: var(--green-accent);
        gap: 12px;
    }


    /* TOMBOL SLIDER */

    .service-slider-arrow {
        position: absolute;
        top: 70px;
        z-index: 5;
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--green-border);
        border-radius: 50%;
        background: var(--green-card);
        color: var(--green-dark);
        font-size: 15px;
        box-shadow: 0 4px 12px rgba(40, 92, 58, .10);
        cursor: pointer;
        transition: all .3s ease;
    }

    .service-slider-arrow:hover {
        background: var(--green-dark);
        color: white;
        transform: scale(1.08);
    }

    .service-slider-arrow:disabled {
        opacity: .35;
        cursor: not-allowed;
        transform: none;
    }

    .service-slider-prev {
        left: 0;
    }

    .service-slider-next {
        right: 0;
    }


    /* PROGRESS */

    .service-slider-bottom {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        margin-top: 15px;
    }

    .service-slider-progress {
        width: 150px;
        height: 4px;
        overflow: hidden;
        background: var(--green-medium);
        border-radius: 10px;
    }

    .service-slider-progress-bar {
        width: 0;
        height: 100%;
        background: var(--green-dark);
        border-radius: 10px;
        transition: width .3s ease;
    }

    .service-slider-caption {
        color: var(--green-text);
        font-size: 11px;
    }


    /* SEMUA LAYANAN */

    .service-more {
        text-align: center;
        margin-top: 35px;
    }

    .service-more-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 13px 25px;
        background: var(--green-dark);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 800;
        transition: .3s;
    }

    .service-more-button:hover {
        background: #3D7650;
        color: white;
        transform: translateY(-3px);
    }


    /* KOSONG */

    .service-empty {
        text-align: center;
        padding: 45px 20px;
        background: var(--green-card);
        border: 1px dashed var(--green-accent);
        border-radius: 16px;
        color: var(--green-dark);
    }

    .service-empty>i {
        font-size: 40px;
        margin-bottom: 15px;
    }

    .service-empty h4 {
        font-weight: 800;
    }

    .service-empty p {
        color: var(--green-text);
        margin: 0;
    }


    /* =====================================================
   BERITA
===================================================== */

    .news-modern-section {
        padding: 75px 0 85px;
        overflow: hidden;
    }

    .news-modern-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
        margin-bottom: 38px;
    }

    .news-header-left {
        max-width: 650px;
    }

    .news-header-left h2 {
        color: var(--green-dark);
        font-size: 36px;
        font-weight: 900;
        margin: 14px 0 0;
    }

    .news-title-line {
        width: 65px;
        height: 4px;
        border-radius: 10px;
        background: var(--green-accent);
        margin: 12px 0;
    }

    .news-header-left p {
        color: var(--green-text);
        font-size: 15px;
        line-height: 1.8;
        margin: 0;
    }

    .news-all-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 12px 21px;
        border: 1.5px solid var(--green-accent);
        border-radius: 9px;
        color: var(--green-dark);
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        white-space: nowrap;
        transition: .3s;
    }

    .news-all-button:hover {
        background: var(--green-medium);
        color: var(--green-dark);
        transform: translateY(-3px);
    }

    .news-modern-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 23px;
    }

    .news-modern-card {
        display: flex;
        flex-direction: column;
        min-width: 0;
        background: var(--green-card);
        border: 1px solid var(--green-border);
        border-top: 4px solid var(--green-accent);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(40, 92, 58, .06);
        transition: .35s;
    }

    .news-modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 14px 30px rgba(40, 92, 58, .13);
    }

    .news-image-wrapper {
        position: relative;
        display: block;
        height: 215px;
        width: 100%;
        overflow: hidden;
        background: var(--green-medium);
        text-decoration: none;
    }

    .news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }

    .news-modern-card:hover .news-image {
        transform: scale(1.07);
    }

    .news-image-placeholder {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--green-medium);
        color: var(--green-dark);
        font-size: 48px;
    }

    .news-category {
        position: absolute;
        top: 14px;
        left: 14px;
        padding: 7px 12px;
        border-radius: 20px;
        background: var(--green-medium);
        color: var(--green-dark);
        font-size: 10px;
        font-weight: 800;
    }

    .news-number {
        position: absolute;
        top: 14px;
        right: 14px;
        background: rgba(40, 92, 58, .85);
        color: white;
        font-size: 11px;
        font-weight: 800;
        padding: 7px 10px;
        border-radius: 7px;
    }

    .news-card-content {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .news-date {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #718477;
        font-size: 12px;
        margin-bottom: 13px;
    }

    .news-date i {
        color: var(--green-accent);
    }

    .news-card-title {
        font-size: 17px;
        font-weight: 800;
        line-height: 1.5;
        margin: 0 0 12px;
        min-height: 51px;
    }

    .news-card-title a {
        color: var(--green-dark);
        text-decoration: none;
    }

    .news-card-title a:hover {
        color: var(--green-accent);
    }

    .news-description {
        color: var(--green-text);
        font-size: 13px;
        line-height: 1.8;
        margin: 0 0 20px;
        flex: 1;
    }

    .news-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid var(--green-border);
        padding-top: 14px;
        margin-top: auto;
    }

    .news-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--green-dark);
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s;
    }

    .news-read-more:hover {
        color: var(--green-accent);
        gap: 12px;
    }

    .news-read-icon {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--green-medium);
        color: var(--green-dark);
    }

    .news-empty {
        text-align: center;
        background: var(--green-card);
        border: 1px dashed var(--green-accent);
        border-radius: 17px;
        padding: 60px 20px;
    }

    .news-empty-icon {
        width: 75px;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--green-medium);
        color: var(--green-dark);
        font-size: 30px;
        margin: 0 auto 18px;
    }

    .news-empty h4 {
        font-size: 21px;
        font-weight: 800;
        color: var(--green-dark);
    }

    .news-empty p {
        color: var(--green-text);
        font-size: 14px;
        margin: 0;
    }


    /* =====================================================
   SCROLL REVEAL
===================================================== */

    .reveal {
        opacity: 0;
        visibility: hidden;
        transform: translateY(45px) scale(.96);
        filter: blur(3px);

        transition:
            opacity .8s ease,
            transform .8s cubic-bezier(.2, .7, .2, 1),
            filter .8s ease,
            visibility .8s ease;
    }

    .reveal.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
        filter: blur(0);
    }


    /* HERO ANIMATION */

    .hero-content-kua {
        animation: heroAppear 1s ease both;
    }

    @keyframes heroAppear {
        from {
            opacity: 0;
            transform: translate(-20px, -45%);
        }

        to {
            opacity: 1;
            transform: translate(0, -50%);
        }
    }


    /* STAGGER */

    .home-service-section .service-circle-item:nth-child(2),
    .news-modern-card:nth-child(2),
    .quick-info-section .col-md-4:nth-child(2) {
        transition-delay: .12s;
    }

    .home-service-section .service-circle-item:nth-child(3),
    .news-modern-card:nth-child(3),
    .quick-info-section .col-md-4:nth-child(3) {
        transition-delay: .22s;
    }

    .news-modern-card:nth-child(4) {
        transition-delay: .12s;
    }

    .home-service-section .service-circle-item:nth-child(4) {
        transition-delay: .12s;
    }

    .home-service-section .service-circle-item:nth-child(5) {
        transition-delay: .22s;
    }


    /* =====================================================
   RESPONSIVE
===================================================== */

    @media(max-width:1199.98px) {

        .news-modern-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

    }


    @media(max-width:991.98px) {

        .hero-slider-container-kua {
            height: 440px;
        }

        .hero-content-kua {
            max-width: 560px;
        }

        .hero-title-kua {
            font-size: 38px;
        }

        .news-modern-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .news-header-left h2 {
            font-size: 31px;
        }

        .service-slider-wrapper {
            padding: 0 40px;
        }

        .service-circle-item {
            flex-basis: 175px;
            width: 175px;
        }

        .service-circle-image {
            width: 135px;
            height: 135px;
        }

        .service-circle-number {
            top: 102px;
            right: 15px;
        }

        .service-slider-arrow {
            top: 62px;
        }

    }


    @media(max-width:575.98px) {

        .hero-slider-container-kua {
            height: 440px;
        }

        .hero-overlay-kua {
            background: rgba(10, 45, 27, .42);
        }

        .hero-content-kua {
            padding: 0 24px;
            max-width: 100%;
        }

        .hero-title-kua {
            font-size: 32px;
        }

        .hero-description-kua {
            font-size: 13px;
        }

        .btn-hero-primary-kua,
        .btn-hero-secondary-kua {
            min-height: 43px;
            padding: 0 14px;
            font-size: 12px;
        }

        .quick-info-section {
            padding: 35px 0 40px;
        }

        .quick-card {
            min-height: auto;
            padding: 22px;
        }

        .home-service-section {
            padding: 48px 0 55px;
        }

        .home-service-section .section-heading {
            margin-bottom: 25px;
            padding: 0 10px;
        }

        .home-service-section .section-heading h2 {
            font-size: 27px;
        }

        .home-service-section .section-heading p {
            font-size: 12px;
        }

        .service-slider-wrapper {
            padding: 0 29px;
        }

        .service-slider-track {
            gap: 12px;
        }

        .service-circle-item {
            flex-basis: 145px;
            width: 145px;
            padding: 5px 7px 12px;
        }

        .service-circle-image {
            width: 112px;
            height: 112px;
            padding: 5px;
            margin-bottom: 15px;
        }

        .service-circle-number {
            top: 85px;
            right: 12px;
            width: 27px;
            height: 27px;
            font-size: 9px;
        }

        .service-circle-title {
            font-size: 13px;
            min-height: 40px;
        }

        .service-circle-description {
            font-size: 10px;
            min-height: 55px;
        }

        .service-circle-placeholder {
            font-size: 35px;
        }

        .service-slider-arrow {
            width: 32px;
            height: 32px;
            font-size: 11px;
            top: 45px;
        }

        .service-slider-progress {
            width: 110px;
        }

        .service-slider-caption {
            font-size: 10px;
        }

        .service-more {
            margin-top: 25px;
        }

        .news-modern-section {
            padding: 45px 0;
        }

        .news-modern-header {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .news-header-left h2 {
            font-size: 28px;
        }

        .news-header-left p {
            font-size: 13px;
        }

        .news-modern-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .news-image-wrapper {
            height: 230px;
        }

        .news-card-title {
            min-height: auto;
        }

    }


    @media(max-width:380px) {

        .hero-slider-container-kua {
            height: 420px;
        }

        .hero-title-kua {
            font-size: 29px;
        }

        .hero-description-kua {
            font-size: 12px;
        }

    }


    /* AKSESIBILITAS */

    @media(prefers-reduced-motion:reduce) {

        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            animation-duration: .01ms !important;
            transition-duration: .01ms !important;
        }

        .reveal {
            opacity: 1;
            visibility: visible;
            transform: none;
            filter: none;
        }

        .service-slider-viewport {
            scroll-behavior: auto;
        }

    }


    /* =====================================================
   AKHIR CSS
===================================================== */
</style>


{{-- =====================================================
     6. JAVASCRIPT SCROLL REVEAL DAN SLIDER
===================================================== --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {

        /* =========================================
           SCROLL REVEAL BERULANG
        ========================================= */

        const revealElements = document.querySelectorAll(
            '.quick-info-section .col-md-4, ' +
            '.section-heading, ' +
            '.service-slider-wrapper, ' +
            '.service-circle-item, ' +
            '.service-slider-bottom, ' +
            '.service-more, ' +
            '.service-empty, ' +
            '.news-modern-header, ' +
            '.news-modern-card, ' +
            '.news-empty'
        );

        revealElements.forEach(function(element) {
            element.classList.add('reveal');
        });

        if ('IntersectionObserver' in window) {

            const observer = new IntersectionObserver(function(entries) {

                entries.forEach(function(entry) {

                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    } else {
                        entry.target.classList.remove('show');
                    }

                });

            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -35px 0px'
            });

            revealElements.forEach(function(element) {
                observer.observe(element);
            });

        } else {

            revealElements.forEach(function(element) {
                element.classList.add('show');
            });

        }


        /* =========================================
           SLIDER LAYANAN
        ========================================= */

        const viewport = document.getElementById('serviceViewport');
        const track = document.getElementById('serviceTrack');
        const prevButton = document.getElementById('servicePrev');
        const nextButton = document.getElementById('serviceNext');
        const progressBar = document.getElementById('serviceProgressBar');

        if (!viewport || !track || !prevButton || !nextButton) {
            return;
        }

        const items = track.querySelectorAll('.service-circle-item');

        if (items.length === 0) {
            return;
        }

        let autoSlide = null;
        let isHovered = false;

        function getStep() {

            const item = items[0];
            const styles = window.getComputedStyle(track);
            const gap = parseFloat(styles.columnGap) || 0;

            return item.getBoundingClientRect().width + gap;
        }


        function updateSlider() {

            const maxScroll = Math.max(
                0,
                viewport.scrollWidth - viewport.clientWidth
            );

            prevButton.disabled = viewport.scrollLeft <= 2;
            nextButton.disabled = viewport.scrollLeft >= maxScroll - 2;

            if (progressBar) {

                const progress = maxScroll > 0 ?
                    (viewport.scrollLeft / maxScroll) * 100 :
                    100;

                progressBar.style.width = progress + '%';

            }

        }


        function slideNext() {

            const maxScroll = viewport.scrollWidth - viewport.clientWidth;

            if (maxScroll <= 0) {
                return;
            }

            if (viewport.scrollLeft >= maxScroll - 5) {

                viewport.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });

            } else {

                viewport.scrollBy({
                    left: getStep(),
                    behavior: 'smooth'
                });

            }

        }


        function slidePrev() {

            const maxScroll = viewport.scrollWidth - viewport.clientWidth;

            if (maxScroll <= 0) {
                return;
            }

            if (viewport.scrollLeft <= 5) {

                viewport.scrollTo({
                    left: maxScroll,
                    behavior: 'smooth'
                });

            } else {

                viewport.scrollBy({
                    left: -getStep(),
                    behavior: 'smooth'
                });

            }

        }


        function stopAutoSlide() {

            if (autoSlide) {
                clearInterval(autoSlide);
                autoSlide = null;
            }

        }


        function startAutoSlide() {

            stopAutoSlide();

            if (
                window.matchMedia('(prefers-reduced-motion: reduce)').matches
            ) {
                return;
            }

            autoSlide = setInterval(function() {

                if (!isHovered && !document.hidden) {
                    slideNext();
                }

            }, 4000);

        }


        nextButton.addEventListener('click', function() {

            slideNext();
            startAutoSlide();

        });


        prevButton.addEventListener('click', function() {

            slidePrev();
            startAutoSlide();

        });


        viewport.addEventListener('scroll', updateSlider);


        viewport.addEventListener('mouseenter', function() {
            isHovered = true;
        });


        viewport.addEventListener('mouseleave', function() {
            isHovered = false;
        });


        viewport.addEventListener('touchstart', stopAutoSlide, {
            passive: true
        });


        viewport.addEventListener('touchend', startAutoSlide, {
            passive: true
        });


        document.addEventListener('visibilitychange', function() {

            if (document.hidden) {
                stopAutoSlide();
            } else {
                startAutoSlide();
            }

        });


        window.addEventListener('resize', updateSlider);


        updateSlider();
        startAutoSlide();

    });
</script>

@endsection