@extends('layouts.applanding')

@section('content')

{{-- =========================================================
     HALAMAN SEJARAH SINGKAT KUA KARANG BARU
========================================================= --}}

<section class="sejarah-section">

    <div class="container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div class="text-center sejarah-header">

            <span class="badge-sejarah">
                <i class="fas fa-landmark me-1"></i>
                Tentang Kami
            </span>

            <h1 class="judul-sejarah">
                Sejarah Singkat
            </h1>

            <p class="subjudul-sejarah">
                Sejarah dan perkembangan KUA Kecamatan Karang Baru
            </p>

        </div>


        {{-- =====================================================
             CARD SEJARAH
        ====================================================== --}}
        <div class="sejarah-card">

            <div class="row g-0">

                {{-- =================================================
                     BAGIAN KIRI
                     TANPA LOGO / GAMBAR
                ================================================== --}}
                <div class="col-lg-5">

                    <div class="sejarah-sambutan">

                        <div class="sejarah-sambutan-content">

                            <span class="sejarah-label">
                                TENTANG KAMI
                            </span>

                            <h2>
                                KUA Karang Baru
                            </h2>

                            <div class="sejarah-garis"></div>

                            <p>
                                Kantor Urusan Agama Kecamatan Karang Baru
                                hadir untuk memberikan pelayanan keagamaan
                                kepada masyarakat dengan amanah dan profesional.
                            </p>

                            <div class="sejarah-info">

                                <i class="fas fa-building"></i>

                                <span>
                                    Pelayanan keagamaan dan administrasi
                                    masyarakat Kecamatan Karang Baru
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     BAGIAN KANAN
                ================================================== --}}
                <div class="col-lg-7">

                    <div class="sejarah-content">

                        <h3 class="sejarah-title">
                            <i class="fas fa-history"></i>
                            Sejarah KUA Karang Baru
                        </h3>


                        <p>
                            Kantor Urusan Agama (KUA) Kecamatan Karang Baru
                            merupakan salah satu instansi yang berada di bawah
                            Kementerian Agama yang memiliki peran penting dalam
                            memberikan pelayanan keagamaan kepada masyarakat.
                        </p>


                        <p>
                            Dalam menjalankan tugasnya, KUA Kecamatan Karang Baru
                            memberikan berbagai pelayanan kepada masyarakat,
                            khususnya dalam bidang pencatatan pernikahan,
                            bimbingan keluarga sakinah, pelayanan keagamaan,
                            serta berbagai kegiatan administrasi yang berkaitan
                            dengan urusan agama.
                        </p>


                        <p>
                            Seiring dengan perkembangan teknologi dan kebutuhan
                            masyarakat, KUA Kecamatan Karang Baru terus berupaya
                            meningkatkan kualitas pelayanan agar menjadi lebih
                            efektif, cepat, transparan, dan mudah diakses oleh
                            masyarakat.
                        </p>


                        {{-- =================================================
                             INFORMASI PELAYANAN
                        ================================================== --}}
                        <div class="pelayanan-sejarah">

                            <div class="pelayanan-icon">
                                <i class="fas fa-check"></i>
                            </div>

                            <div class="pelayanan-text">

                                <h6>
                                    Pelayanan Masyarakat
                                </h6>

                                <p>
                                    Memberikan pelayanan keagamaan yang
                                    mudah, cepat, dan berkualitas.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     STYLE HALAMAN SEJARAH
========================================================= --}}

<style>

    /* =========================================================
       SECTION UTAMA
    ========================================================= */

    .sejarah-section {
        padding: 120px 0 80px;
        background: #f8fafc;
        min-height: 100vh;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .sejarah-header {
        margin-bottom: 45px;
    }

    .badge-sejarah {
        display: inline-block;
        padding: 9px 18px;
        background: #dcfce7;
        color: #047857;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .judul-sejarah {
        margin: 0;
        color: #1f2937;
        font-size: 38px;
        font-weight: 800;
    }

    .subjudul-sejarah {
        margin-top: 12px;
        margin-bottom: 0;
        color: #6b7280;
        font-size: 16px;
    }


    /* =========================================================
       CARD UTAMA
    ========================================================= */

    .sejarah-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(15, 23, 42, 0.08);
    }


    /* =========================================================
       BAGIAN KIRI
    ========================================================= */

    .sejarah-sambutan {
        height: 100%;
        min-height: 480px;
        padding: 55px 45px;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;

        background: linear-gradient(
            135deg,
            #064e3b,
            #047857
        );

        color: #ffffff;
    }


    /* DEKORASI BACKGROUND */

    .sejarah-sambutan::before {
        content: "";
        position: absolute;

        width: 230px;
        height: 230px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.05);

        top: -90px;
        right: -80px;
    }

    .sejarah-sambutan::after {
        content: "";
        position: absolute;

        width: 180px;
        height: 180px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.04);

        bottom: -80px;
        left: -70px;
    }


    .sejarah-sambutan-content {
        position: relative;
        z-index: 2;
        max-width: 430px;
    }


    .sejarah-label {
        display: inline-block;

        font-size: 12px;
        font-weight: 700;

        letter-spacing: 1.5px;

        color: rgba(255, 255, 255, 0.72);

        margin-bottom: 18px;
    }


    .sejarah-sambutan-content h2 {
        margin: 0 0 18px;

        font-size: 40px;
        line-height: 1.2;

        font-weight: 800;
    }


    .sejarah-garis {
        width: 65px;
        height: 4px;

        border-radius: 20px;

        background: #ffffff;

        margin-bottom: 22px;
    }


    .sejarah-sambutan-content > p {
        margin-bottom: 28px;

        font-size: 17px;
        line-height: 1.8;

        color: rgba(255, 255, 255, 0.88);
    }


    /* =========================================================
       INFO KIRI
    ========================================================= */

    .sejarah-info {
        display: flex;
        align-items: flex-start;

        gap: 12px;

        padding-top: 20px;

        border-top: 1px solid rgba(255, 255, 255, 0.2);

        color: rgba(255, 255, 255, 0.75);

        font-size: 14px;
        line-height: 1.6;
    }


    .sejarah-info i {
        margin-top: 3px;

        font-size: 18px;

        color: #ffffff;
    }


    /* =========================================================
       BAGIAN KANAN
    ========================================================= */

    .sejarah-content {
        padding: 50px;
    }


    .sejarah-title {
        display: flex;
        align-items: center;

        gap: 12px;

        margin-bottom: 27px;

        color: #047857;

        font-size: 24px;
        font-weight: 750;
    }


    .sejarah-title i {
        font-size: 21px;
    }


    .sejarah-content > p {
        margin-bottom: 18px;

        color: #64748b;

        font-size: 15px;
        line-height: 1.9;

        text-align: justify;
    }


    /* =========================================================
       PELAYANAN
    ========================================================= */

    .pelayanan-sejarah {
        display: flex;
        align-items: center;

        gap: 15px;

        margin-top: 30px;
        padding-top: 25px;

        border-top: 1px solid #e5e7eb;
    }


    .pelayanan-icon {
        width: 44px;
        height: 44px;

        min-width: 44px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #059669;

        color: #ffffff;
    }


    .pelayanan-text h6 {
        margin: 0 0 5px;

        color: #1f2937;

        font-size: 15px;
        font-weight: 700;
    }


    .pelayanan-text p {
        margin: 0;

        color: #94a3b8;

        font-size: 13px;
        line-height: 1.6;
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 991.98px) {

        .sejarah-section {
            padding-top: 100px;
        }

        .sejarah-sambutan {
            min-height: 350px;
            padding: 45px;
        }

        .sejarah-sambutan-content {
            max-width: 100%;
        }

        .sejarah-content {
            padding: 40px;
        }

    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767.98px) {

        .sejarah-section {
            padding: 90px 15px 60px;
        }

        .sejarah-header {
            margin-bottom: 30px;
        }

        .judul-sejarah {
            font-size: 29px;
        }

        .subjudul-sejarah {
            font-size: 14px;
            line-height: 1.7;
        }

        .sejarah-card {
            border-radius: 18px;
        }

        .sejarah-sambutan {
            min-height: auto;
            padding: 40px 30px;
        }

        .sejarah-sambutan-content h2 {
            font-size: 32px;
        }

        .sejarah-sambutan-content > p {
            font-size: 16px;
        }

        .sejarah-content {
            padding: 35px 25px;
        }

        .sejarah-title {
            font-size: 21px;
        }

        .sejarah-content > p {
            font-size: 14px;
            line-height: 1.8;
        }

    }

</style>

@endsection