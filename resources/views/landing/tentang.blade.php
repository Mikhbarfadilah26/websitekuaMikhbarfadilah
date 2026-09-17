@extends('layouts.applanding')

@section('content')

{{-- =========================================================
     HALAMAN TENTANG KUA KARANG BARU
========================================================= --}}

<section class="tentang-section">

    <div class="container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div class="text-center tentang-header">

            <span class="badge-profil">
                <i class="fas fa-info-circle me-1"></i>
                Profil Instansi
            </span>

            <h1 class="judul-halaman">
                Tentang KUA Karang Baru
            </h1>

            <p class="subjudul-halaman">
                Mengenal lebih dekat Kantor Urusan Agama Kecamatan Karang Baru
            </p>

        </div>


        {{-- =====================================================
             CARD PROFIL UTAMA
        ====================================================== --}}
        <div class="profil-card">

            <div class="row g-0">

                {{-- =================================================
                     BAGIAN KIRI
                     TANPA LOGO / GAMBAR
                ================================================== --}}
                <div class="col-lg-5">

                    <div class="profil-sambutan">

                        <div class="sambutan-content">

                            <span class="sambutan-label">
                                KUA KECAMATAN KARANG BARU
                            </span>

                            <h2>
                                KUA Karang Baru
                            </h2>

                            <div class="garis-hijau"></div>

                            <p>
                                Melayani masyarakat dengan
                                <strong>amanah</strong>,
                                <strong>profesional</strong>,
                                dan penuh
                                <strong>integritas</strong>.
                            </p>

                            <div class="sambutan-info">
                                <i class="fas fa-hand-holding-heart"></i>
                                <span>
                                    Pelayanan keagamaan untuk masyarakat
                                    Kecamatan Karang Baru
                                </span>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     BAGIAN KANAN
                ================================================== --}}
                <div class="col-lg-7">

                    <div class="profil-content">

                        <h3 class="section-title">
                            <i class="fas fa-bullhorn"></i>
                            Gambaran Umum
                        </h3>

                        <p>
                            Kantor Urusan Agama (KUA) Kecamatan Karang Baru
                            merupakan unit pelaksana teknis di tingkat kecamatan
                            yang berada di bawah naungan Kementerian Agama
                            Republik Indonesia. KUA menjadi salah satu bagian
                            penting dalam memberikan pelayanan di bidang
                            keagamaan Islam kepada masyarakat.
                        </p>

                        <p>
                            Selain berfokus pada pencatatan nikah dan rujuk,
                            KUA Karang Baru juga melaksanakan berbagai kegiatan
                            keagamaan dan pembinaan masyarakat, seperti
                            bimbingan keluarga sakinah, pembinaan kemasjidan,
                            pengelolaan zakat dan wakaf, serta pelayanan
                            informasi keagamaan.
                        </p>


                        {{-- =================================================
                             FITUR UTAMA
                        ================================================== --}}
                        <div class="fitur-wrapper">

                            <div class="fitur-item">

                                <div class="fitur-icon">
                                    <i class="fas fa-check"></i>
                                </div>

                                <div>
                                    <h6>
                                        Transparan & Akuntabel
                                    </h6>

                                    <small>
                                        Prosedur layanan yang jelas
                                    </small>
                                </div>

                            </div>


                            <div class="fitur-item">

                                <div class="fitur-icon">
                                    <i class="fas fa-check"></i>
                                </div>

                                <div>
                                    <h6>
                                        Berbasis Digital
                                    </h6>

                                    <small>
                                        Kemudahan akses informasi
                                    </small>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             VISI & MISI
        ====================================================== --}}
        <div class="row g-4 visi-misi-wrapper">

            {{-- =================================================
                 VISI
            ================================================== --}}
            <div class="col-md-6">

                <div class="visi-misi-card">

                    <div class="visi-misi-header">

                        <div class="visi-misi-icon">
                            <i class="fas fa-eye"></i>
                        </div>

                        <h3>
                            Visi
                        </h3>

                    </div>

                    <p>
                        Terwujudnya pelayanan keagamaan yang profesional,
                        handal, serta terwujudnya masyarakat Kecamatan
                        Karang Baru yang taat beragama, rukun, dan sejahtera.
                    </p>

                </div>

            </div>


            {{-- =================================================
                 MISI
            ================================================== --}}
            <div class="col-md-6">

                <div class="visi-misi-card">

                    <div class="visi-misi-header">

                        <div class="visi-misi-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>

                        <h3>
                            Misi
                        </h3>

                    </div>

                    <ul>

                        <li>
                            Meningkatkan kualitas pelayanan nikah,
                            rujuk, dan kepenghuluan.
                        </li>

                        <li>
                            Meningkatkan pembinaan bimbingan keluarga
                            sakinah dan kemasjidan.
                        </li>

                        <li>
                            Meningkatkan pengelolaan dan tata kelola
                            zakat serta wakaf.
                        </li>

                        <li>
                            Mengembangkan sistem informasi keagamaan
                            yang akurat dan mudah diakses.
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     STYLE HALAMAN TENTANG
========================================================= --}}

<style>

    /* =========================================================
       SECTION UTAMA
    ========================================================= */

    .tentang-section {
        padding: 120px 0 80px;
        background: #f8fafc;
        min-height: 100vh;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .tentang-header {
        margin-bottom: 45px;
    }

    .badge-profil {
        display: inline-block;
        padding: 9px 18px;
        background: #dcfce7;
        color: #047857;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .judul-halaman {
        margin: 0;
        font-size: 38px;
        font-weight: 800;
        color: #1f2937;
    }

    .subjudul-halaman {
        margin-top: 12px;
        margin-bottom: 0;
        color: #6b7280;
        font-size: 16px;
    }


    /* =========================================================
       CARD PROFIL
    ========================================================= */

    .profil-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(15, 23, 42, 0.08);
        margin-bottom: 35px;
    }


    /* =========================================================
       BAGIAN KIRI
    ========================================================= */

    .profil-sambutan {
        height: 100%;
        min-height: 430px;
        padding: 55px 45px;
        display: flex;
        align-items: center;
        background: linear-gradient(
            135deg,
            #064e3b,
            #047857
        );
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .profil-sambutan::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        top: -80px;
        right: -70px;
    }

    .profil-sambutan::after {
        content: "";
        position: absolute;
        width: 170px;
        height: 170px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.04);
        bottom: -80px;
        left: -60px;
    }

    .sambutan-content {
        position: relative;
        z-index: 2;
        max-width: 430px;
    }

    .sambutan-label {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        color: rgba(255, 255, 255, 0.75);
        margin-bottom: 18px;
    }

    .sambutan-content h2 {
        font-size: 40px;
        line-height: 1.2;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .garis-hijau {
        width: 65px;
        height: 4px;
        border-radius: 20px;
        background: #ffffff;
        margin-bottom: 22px;
    }

    .sambutan-content > p {
        font-size: 18px;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.88);
        margin-bottom: 28px;
    }

    .sambutan-content strong {
        color: #ffffff;
    }

    .sambutan-info {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        color: rgba(255, 255, 255, 0.75);
        font-size: 14px;
        line-height: 1.6;
    }

    .sambutan-info i {
        margin-top: 3px;
        font-size: 18px;
        color: #ffffff;
    }


    /* =========================================================
       BAGIAN KANAN
    ========================================================= */

    .profil-content {
        padding: 50px 50px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #047857;
        font-size: 24px;
        font-weight: 750;
        margin-bottom: 25px;
    }

    .section-title i {
        font-size: 21px;
    }

    .profil-content p {
        color: #64748b;
        font-size: 15px;
        line-height: 1.9;
        text-align: justify;
        margin-bottom: 18px;
    }


    /* =========================================================
       FITUR
    ========================================================= */

    .fitur-wrapper {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #e5e7eb;
    }

    .fitur-item {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .fitur-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 50%;
        background: #059669;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .fitur-item h6 {
        margin: 0 0 4px;
        color: #1f2937;
        font-size: 14px;
        font-weight: 700;
    }

    .fitur-item small {
        color: #94a3b8;
        font-size: 12px;
    }


    /* =========================================================
       VISI & MISI
    ========================================================= */

    .visi-misi-wrapper {
        margin-bottom: 20px;
    }

    .visi-misi-card {
        height: 100%;
        padding: 32px;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(15, 23, 42, 0.06);
        border: 1px solid #f1f5f9;
    }

    .visi-misi-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .visi-misi-icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 50%;
        background: #dcfce7;
        color: #047857;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 20px;
    }

    .visi-misi-header h3 {
        margin: 0;
        color: #1f2937;
        font-size: 22px;
        font-weight: 750;
    }

    .visi-misi-card p,
    .visi-misi-card li {
        color: #64748b;
        font-size: 15px;
        line-height: 1.8;
    }

    .visi-misi-card p {
        margin: 0;
        text-align: justify;
    }

    .visi-misi-card ul {
        padding-left: 20px;
        margin: 0;
    }

    .visi-misi-card li {
        margin-bottom: 10px;
    }

    .visi-misi-card li:last-child {
        margin-bottom: 0;
    }


    /* =========================================================
       RESPONSIVE TABLET
    ========================================================= */

    @media (max-width: 991.98px) {

        .tentang-section {
            padding-top: 100px;
        }

        .profil-sambutan {
            min-height: 350px;
            padding: 45px;
        }

        .sambutan-content {
            max-width: 100%;
        }

        .profil-content {
            padding: 40px;
        }

    }


    /* =========================================================
       RESPONSIVE HP
    ========================================================= */

    @media (max-width: 767.98px) {

        .tentang-section {
            padding: 90px 15px 60px;
        }

        .tentang-header {
            margin-bottom: 30px;
        }

        .judul-halaman {
            font-size: 29px;
        }

        .subjudul-halaman {
            font-size: 14px;
            line-height: 1.7;
        }

        .profil-card {
            border-radius: 18px;
        }

        .profil-sambutan {
            min-height: auto;
            padding: 40px 30px;
        }

        .sambutan-content h2 {
            font-size: 32px;
        }

        .sambutan-content > p {
            font-size: 16px;
        }

        .profil-content {
            padding: 35px 25px;
        }

        .section-title {
            font-size: 21px;
        }

        .fitur-wrapper {
            grid-template-columns: 1fr;
        }

        .visi-misi-card {
            padding: 27px 23px;
        }

    }

</style>

@endsection