
@extends('layouts.applanding')

@section('title', 'Layanan | KUA Karang Baru')

@section('content')

<style>
    :root {
        --kua-green: #397d57;
        --kua-green-dark: #286443;
        --kua-green-soft: #e8f2eb;
        --kua-green-light: #f3f8f4;
        --kua-text: #263b2e;
        --kua-muted: #718176;
        --kua-border: #dce9df;
    }

    /* =========================================
       MAIN
    ========================================= */

    .layanan-page {
        min-height: 100vh;
        background: #f5f9f5;
        color: var(--kua-text);
        overflow: hidden;
    }

    /* =========================================
       HERO
    ========================================= */

    .layanan-hero {
        position: relative;
        padding: 145px 0 100px;
        text-align: center;
        overflow: hidden;
        background:
            radial-gradient(circle at 10% 20%, rgba(255,255,255,.75), transparent 30%),
            radial-gradient(circle at 90% 80%, rgba(119,169,132,.16), transparent 35%),
            linear-gradient(135deg, #e7f1e9, #f2f8f3, #e6f0e8);
    }

    .layanan-hero::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border: 1px solid rgba(57,125,87,.12);
        border-radius: 50%;
        top: -140px;
        right: -70px;
    }

    .layanan-hero::after {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border: 1px solid rgba(57,125,87,.12);
        border-radius: 50%;
        bottom: -120px;
        left: -60px;
    }

    .layanan-hero .container {
        position: relative;
        z-index: 2;
    }

    .layanan-badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 21px;
        border-radius: 50px;
        background: #dcecdf;
        color: var(--kua-green-dark);
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 24px;
        border: 1px solid #d0e3d4;
    }

    .layanan-hero h1 {
        font-size: clamp(36px, 5vw, 57px);
        font-weight: 800;
        color: #243c2d;
        line-height: 1.2;
        margin-bottom: 22px;
        letter-spacing: -1.5px;
    }

    .layanan-hero h1 span {
        color: var(--kua-green);
    }

    .layanan-hero p {
        max-width: 760px;
        margin: auto;
        color: #65786a;
        line-height: 1.9;
        font-size: 16px;
    }

    .hero-decoration {
        position: absolute;
        color: rgba(57,125,87,.09);
        font-size: 100px;
    }

    .hero-decoration.one {
        left: 8%;
        top: 35%;
    }

    .hero-decoration.two {
        right: 9%;
        bottom: 15%;
        font-size: 75px;
    }

    /* =========================================
       SECTION
    ========================================= */

    .layanan-section {
        padding: 85px 0;
        background: linear-gradient(180deg, #f5f9f5, #edf5ef);
    }

    .section-heading {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-heading span {
        display: inline-block;
        color: var(--kua-green);
        font-weight: 700;
        font-size: 13px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .section-heading h2 {
        font-size: clamp(27px, 4vw, 36px);
        font-weight: 800;
        color: #263d2e;
        margin-bottom: 15px;
    }

    .section-heading p {
        max-width: 650px;
        margin: auto;
        color: var(--kua-muted);
        line-height: 1.8;
        font-size: 15px;
    }

    /* =========================================
       SERVICE CARD
    ========================================= */

    .layanan-card {
        position: relative;
        height: 100%;
        padding: 35px 30px;
        background: #ffffff;
        border: 1px solid var(--kua-border);
        border-radius: 22px;
        box-shadow: 0 8px 28px rgba(43, 91, 57, .045);
        transition: all .35s ease;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .layanan-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: #83ae8d;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .35s ease;
    }

    .layanan-card:hover {
        transform: translateY(-8px);
        border-color: #a9cbb1;
        box-shadow: 0 18px 40px rgba(43, 91, 57, .10);
    }

    .layanan-card:hover::before {
        transform: scaleX(1);
    }

    .layanan-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        background: #e8f2ea;
        color: #397d57;
        font-size: 28px;
        margin-bottom: 25px;
        transition: all .35s ease;
        flex-shrink: 0;
    }

    .layanan-card:hover .layanan-icon {
        background: #397d57;
        color: #ffffff;
        transform: translateY(-3px);
    }

    .layanan-card h3 {
        font-size: 20px;
        font-weight: 750;
        color: #294332;
        margin-bottom: 15px;
    }

    .layanan-card p {
        color: #748278;
        font-size: 14px;
        line-height: 1.9;
        margin-bottom: 24px;
        flex-grow: 1;
    }

    .layanan-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--kua-green);
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        transition: all .3s ease;
        align-self: flex-start;
    }

    .layanan-link i {
        transition: transform .3s ease;
    }

    .layanan-link:hover {
        color: var(--kua-green-dark);
    }

    .layanan-link:hover i {
        transform: translateX(5px);
    }

    /* =========================================
       EMPTY DATA
    ========================================= */

    .layanan-empty {
        padding: 55px 25px;
        text-align: center;
        background: #ffffff;
        border: 1px dashed #b9d2bf;
        border-radius: 22px;
    }

    .layanan-empty i {
        font-size: 45px;
        color: #83ae8d;
        margin-bottom: 18px;
    }

    .layanan-empty h3 {
        font-size: 21px;
        color: #315e40;
        font-weight: 800;
    }

    .layanan-empty p {
        color: var(--kua-muted);
        margin-bottom: 0;
    }

    /* =========================================
       INFORMASI PELAYANAN
    ========================================= */

    .persyaratan {
        position: relative;
        margin-top: 65px;
        padding: 38px 40px;
        background: linear-gradient(135deg, #e6f0e8, #edf5ef);
        border: 1px solid #d5e6d9;
        border-radius: 24px;
        overflow: hidden;
    }

    .persyaratan::after {
        content: "\f058";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        right: 35px;
        bottom: -35px;
        font-size: 150px;
        color: rgba(57,125,87,.055);
    }

    .persyaratan h3 {
        position: relative;
        z-index: 1;
        color: #315e40;
        font-size: 23px;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .persyaratan ul {
        position: relative;
        z-index: 1;
        padding-left: 0;
        list-style: none;
    }

    .persyaratan li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        color: #617568;
        margin-bottom: 15px;
        line-height: 1.8;
        font-size: 14px;
    }

    .persyaratan li:last-child {
        margin-bottom: 0;
    }

    .persyaratan li i {
        color: #4d9363;
        margin-top: 5px;
    }

    /* =========================================
       CONTACT BOX
    ========================================= */

    .layanan-contact {
        margin-top: 35px;
        padding: 35px;
        border-radius: 22px;
        background: #ffffff;
        border: 1px solid var(--kua-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;
        box-shadow: 0 8px 28px rgba(43,91,57,.04);
    }

    .layanan-contact h3 {
        font-size: 21px;
        font-weight: 800;
        color: #294332;
        margin-bottom: 9px;
    }

    .layanan-contact p {
        margin: 0;
        color: #77867b;
        font-size: 14px;
        line-height: 1.7;
    }

    .btn-layanan-contact {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 13px 24px;
        border-radius: 12px;
        background: #397d57;
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        white-space: nowrap;
        transition: all .3s ease;
    }

    .btn-layanan-contact:hover {
        background: #286443;
        color: #ffffff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(57,125,87,.2);
    }

    /* =========================================
       SCROLL ANIMATION
    ========================================= */

    .layanan-reveal {
        opacity: 0;
        transform: translateY(25px);
        transition: opacity .7s ease, transform .7s ease;
    }

    .layanan-reveal.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 768px) {
        .layanan-hero {
            padding: 120px 0 75px;
        }

        .layanan-hero h1 {
            letter-spacing: -1px;
        }

        .layanan-hero p {
            font-size: 14px;
            padding: 0 10px;
        }

        .layanan-section {
            padding: 60px 0;
        }

        .section-heading {
            margin-bottom: 35px;
        }

        .layanan-card {
            padding: 28px 25px;
        }

        .persyaratan {
            padding: 30px 24px;
            margin-top: 45px;
        }

        .persyaratan h3 {
            font-size: 20px;
        }

        .layanan-contact {
            flex-direction: column;
            align-items: flex-start;
            padding: 28px 24px;
        }

        .btn-layanan-contact {
            width: 100%;
        }

        .hero-decoration {
            display: none;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .layanan-reveal,
        .layanan-card,
        .layanan-icon {
            transition: none;
        }
    }
</style>


<div class="layanan-page">

    {{-- =========================================
         HERO SECTION
    ========================================== --}}

    <section class="layanan-hero">

        <div class="hero-decoration one">
            <i class="fas fa-leaf"></i>
        </div>

        <div class="hero-decoration two">
            <i class="fas fa-mosque"></i>
        </div>

        <div class="container">

            <span class="layanan-badge">
                <i class="fas fa-concierge-bell"></i>
                Pelayanan Masyarakat
            </span>

            <h1>
                Layanan
                <span>KUA Karang Baru</span>
            </h1>

            <p>
                Kantor Urusan Agama Kecamatan Karang Baru
                menyediakan berbagai pelayanan keagamaan dan
                administrasi untuk membantu masyarakat dengan
                pelayanan yang mudah, ramah, dan profesional.
            </p>

        </div>

    </section>


    {{-- =========================================
         DAFTAR LAYANAN
    ========================================== --}}

    <section class="layanan-section">

        <div class="container">

            <div class="section-heading layanan-reveal">

                <span>Pelayanan KUA</span>

                <h2>Pelayanan untuk Masyarakat</h2>

                <p>
                    Temukan berbagai informasi layanan yang
                    tersedia di KUA Kecamatan Karang Baru
                    untuk memenuhi kebutuhan masyarakat.
                </p>

            </div>


            {{-- DAFTAR LAYANAN DARI DATABASE --}}

            <div class="row g-4">

                @forelse ($layanan as $item)

                    <div class="col-lg-4 col-md-6 layanan-reveal">

                        <div class="layanan-card">

                            <div class="layanan-icon">
                                <i class="fas fa-concierge-bell"></i>
                            </div>

                            <h3>
                                {{ $item->judul }}
                            </h3>

                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi ?? ''), 150) }}
                            </p>

                            <a href="{{ route('layanan.show', $item->id) }}"
                               class="layanan-link">

                                Selengkapnya

                                <i class="fas fa-arrow-right"></i>

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-12 layanan-reveal">

                        <div class="layanan-empty">

                            <i class="fas fa-concierge-bell"></i>

                            <h3>Belum Ada Layanan</h3>

                            <p>
                                Informasi layanan KUA Karang Baru
                                belum tersedia. Silakan kunjungi kembali
                                halaman ini.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>


            {{-- =========================================
                 INFORMASI PELAYANAN
            ========================================== --}}

            <div class="persyaratan layanan-reveal">

                <h3>
                    <i class="fas fa-circle-info me-2"></i>
                    Informasi Pelayanan
                </h3>

                <ul>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            Pastikan membawa dokumen persyaratan
                            sesuai dengan jenis layanan yang
                            dibutuhkan.
                        </span>
                    </li>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            Data yang diberikan harus benar dan
                            sesuai dengan dokumen resmi.
                        </span>
                    </li>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            Untuk mendapatkan informasi lebih
                            lanjut, masyarakat dapat menghubungi
                            petugas KUA Kecamatan Karang Baru.
                        </span>
                    </li>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            Jadwal dan ketentuan pelayanan dapat
                            berubah sesuai dengan kebijakan
                            yang berlaku.
                        </span>
                    </li>

                </ul>

            </div>


            {{-- =========================================
                 HUBUNGI KAMI
            ========================================== --}}

            <div class="layanan-contact layanan-reveal">

                <div>

                    <h3>
                        Membutuhkan Informasi Lebih Lanjut?
                    </h3>

                    <p>
                        Silakan hubungi KUA Kecamatan Karang Baru
                        untuk mendapatkan informasi mengenai
                        pelayanan yang tersedia.
                    </p>

                </div>

                <a href="{{ route('landing.kontak') }}"
                   class="btn-layanan-contact">

                    <i class="fas fa-headset"></i>

                    Hubungi Kami

                </a>

            </div>

        </div>

    </section>

</div>


{{-- =========================================
     ANIMASI SCROLL
========================================== --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const elements = document.querySelectorAll('.layanan-reveal');

        if ('IntersectionObserver' in window) {

            const observer = new IntersectionObserver((entries) => {

                entries.forEach((entry) => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('show');

                        observer.unobserve(entry.target);

                    }

                });

            }, {
                threshold: 0.12
            });

            elements.forEach((element) => {
                observer.observe(element);
            });

        } else {

            elements.forEach((element) => {
                element.classList.add('show');
            });

        }

    });
</script>

@endsection
