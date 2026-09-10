@extends('layouts.applanding')

@section('content')

<style>
    .layanan-page {
        background: #f8fafc;
        min-height: 100vh;
    }

    .layanan-hero {
        padding: 140px 0 80px;
        text-align: center;
        background:
            radial-gradient(
                circle at top right,
                rgba(37, 99, 235, .15),
                transparent 35%
            ),
            linear-gradient(
                135deg,
                #eff6ff,
                #ffffff
            );
    }

    .layanan-badge {
        display: inline-flex;
        align-items: center;
        padding: 9px 20px;
        border-radius: 50px;
        background: #dbeafe;
        color: #2563eb;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .layanan-hero h1 {
        font-size: clamp(38px, 5vw, 55px);
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 18px;
    }

    .layanan-hero h1 span {
        color: #2563eb;
    }

    .layanan-hero p {
        max-width: 750px;
        margin: auto;
        color: #64748b;
        line-height: 1.8;
        font-size: 17px;
    }

    .layanan-section {
        padding: 80px 0;
    }

    .layanan-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 25px;
        padding: 35px;
        height: 100%;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .06);
        transition: all .35s ease;
    }

    .layanan-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 55px rgba(15, 23, 42, .11);
        border-color: #bfdbfe;
    }

    .layanan-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        background: #dbeafe;
        color: #2563eb;
        font-size: 30px;
        margin-bottom: 25px;
    }

    .layanan-card h3 {
        font-size: 21px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 14px;
    }

    .layanan-card p {
        color: #64748b;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .layanan-link {
        color: #2563eb;
        text-decoration: none;
        font-weight: 600;
    }

    .layanan-link:hover {
        color: #1d4ed8;
    }

    .persyaratan {
        margin-top: 60px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .05);
    }

    .persyaratan h3 {
        color: #0f172a;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .persyaratan li {
        color: #64748b;
        margin-bottom: 10px;
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        .layanan-hero {
            padding-top: 120px;
        }

        .layanan-section {
            padding: 60px 0;
        }
    }
</style>

<div class="layanan-page">

```
{{-- =================================================
     HERO
================================================== --}}
<section class="layanan-hero">

    <div class="container">

        <span class="layanan-badge">
            <i class="fas fa-concierge-bell me-2"></i>
            Pelayanan Masyarakat
        </span>

        <h1>
            Layanan
            <span>KUA Karang Baru</span>
        </h1>

        <p>
            Berbagai layanan Kantor Urusan Agama Kecamatan
            Karang Baru untuk membantu masyarakat dalam
            memperoleh pelayanan keagamaan dan administrasi.
        </p>

    </div>

</section>


{{-- =================================================
     DAFTAR LAYANAN
================================================== --}}
<section class="layanan-section">

    <div class="container">

        <div class="row g-4">

            {{-- NIKAH --}}
            <div class="col-lg-4 col-md-6">

                <div class="layanan-card">

                    <div class="layanan-icon">
                        <i class="fas fa-ring"></i>
                    </div>

                    <h3>
                        Pendaftaran Nikah
                    </h3>

                    <p>
                        Informasi dan pelayanan pendaftaran
                        pernikahan bagi masyarakat Kecamatan
                        Karang Baru.
                    </p>

                    <a href="#" class="layanan-link">
                        Selengkapnya
                        <i class="fas fa-arrow-right ms-1"></i>
                    </a>

                </div>

            </div>


            {{-- RUJUK --}}
            <div class="col-lg-4 col-md-6">

                <div class="layanan-card">

                    <div class="layanan-icon">
                        <i class="fas fa-file-signature"></i>
                    </div>

                    <h3>
                        Surat Rekomendasi Nikah
                    </h3>

                    <p>
                        Pelayanan informasi dan pengurusan
                        surat rekomendasi pernikahan sesuai
                        ketentuan yang berlaku.
                    </p>

                    <a href="#" class="layanan-link">
                        Selengkapnya
                        <i class="fas fa-arrow-right ms-1"></i>
                    </a>

                </div>

            </div>


            {{-- BIMBINGAN --}}
            <div class="col-lg-4 col-md-6">

                <div class="layanan-card">

                    <div class="layanan-icon">
                        <i class="fas fa-people-arrows"></i>
                    </div>

                    <h3>
                        Bimbingan Perkawinan
                    </h3>

                    <p>
                        Informasi mengenai bimbingan perkawinan
                        dan pembinaan bagi calon pengantin.
                    </p>

                    <a href="#" class="layanan-link">
                        Selengkapnya
                        <i class="fas fa-arrow-right ms-1"></i>
                    </a>

                </div>

            </div>


            {{-- WAKAF --}}
            <div class="col-lg-4 col-md-6">

                <div class="layanan-card">

                    <div class="layanan-icon">
                        <i class="fas fa-mosque"></i>
                    </div>

                    <h3>
                        Wakaf
                    </h3>

                    <p>
                        Informasi pelayanan dan administrasi
                        wakaf bagi masyarakat.
                    </p>

                    <a href="#" class="layanan-link">
                        Selengkapnya
                        <i class="fas fa-arrow-right ms-1"></i>
                    </a>

                </div>

            </div>


            {{-- BIMAS ISLAM --}}
            <div class="col-lg-4 col-md-6">

                <div class="layanan-card">

                    <div class="layanan-icon">
                        <i class="fas fa-book-quran"></i>
                    </div>

                    <h3>
                        Bimbingan Keagamaan
                    </h3>

                    <p>
                        Informasi mengenai pembinaan dan
                        bimbingan kehidupan keagamaan masyarakat.
                    </p>

                    <a href="#" class="layanan-link">
                        Selengkapnya
                        <i class="fas fa-arrow-right ms-1"></i>
                    </a>

                </div>

            </div>


            {{-- KONSULTASI --}}
            <div class="col-lg-4 col-md-6">

                <div class="layanan-card">

                    <div class="layanan-icon">
                        <i class="fas fa-comments"></i>
                    </div>

                    <h3>
                        Konsultasi Keagamaan
                    </h3>

                    <p>
                        Masyarakat dapat memperoleh informasi
                        dan konsultasi terkait berbagai persoalan
                        keagamaan.
                    </p>

                    <a href="{{ route('landing.kontak') }}"
                       class="layanan-link">

                        Hubungi Kami
                        <i class="fas fa-arrow-right ms-1"></i>

                    </a>

                </div>

            </div>

        </div>


        {{-- =================================================
             PERSYARATAN
        ================================================== --}}
        <div class="persyaratan">

            <h3>
                <i class="fas fa-circle-info text-primary me-2"></i>
                Informasi Pelayanan
            </h3>

            <ul class="mb-0">

                <li>
                    Pastikan membawa dokumen persyaratan
                    sesuai dengan jenis layanan yang dibutuhkan.
                </li>

                <li>
                    Data yang diberikan harus benar dan sesuai
                    dengan dokumen resmi.
                </li>

                <li>
                    Untuk informasi lebih lanjut, masyarakat
                    dapat menghubungi KUA Kecamatan Karang Baru.
                </li>

                <li>
                    Jadwal dan ketentuan pelayanan dapat berubah
                    sesuai dengan kebijakan yang berlaku.
                </li>

            </ul>

        </div>

    </div>

</section>


</div>

@endsection
