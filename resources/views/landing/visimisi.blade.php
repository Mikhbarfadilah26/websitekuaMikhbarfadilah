@extends('layouts.applanding')

@section('title', 'Visi, Misi & Motto - Kantor Urusan Agama Karang Baru')

@section('content')

{{-- =========================================================
     VISI, MISI & MOTTO
========================================================= --}}

<section class="visi-section">

    <div class="container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div class="visi-header text-center">

            <span class="instansi-badge">
                <i class="fas fa-building me-2"></i>
                Kantor Urusan Agama Kecamatan Karang Baru
            </span>

            <h1>
                Visi, Misi &amp; Motto
            </h1>

            <p>
                Pedoman Pelayanan Prima dan Keagamaan Berbasis Nilai-Nilai Religius
            </p>

        </div>


        {{-- =====================================================
             VISI & MOTTO
        ====================================================== --}}
        <div class="row g-4 justify-content-center mb-4">

            {{-- =================================================
                 VISI
            ================================================== --}}
            <div class="col-lg-7">

                <div class="info-card visi-card h-100">

                    <div class="card-inner">

                        <div class="icon-box">
                            <i class="fas fa-eye"></i>
                        </div>

                        <span class="card-label">
                            VISI
                        </span>

                        <h2>
                            Terwujudnya Masyarakat Karang Baru
                            yang Taat Beragama, Sejahtera
                            dan Bahagia.
                        </h2>

                        <div class="card-line"></div>

                        <p>
                            Menjadi pedoman dalam mewujudkan pelayanan
                            keagamaan yang berkualitas serta kehidupan
                            masyarakat yang harmonis.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 MOTTO
            ================================================== --}}
            <div class="col-lg-4">

                <div class="info-card motto-card h-100">

                    <div class="card-inner">

                        <div class="icon-box">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>

                        <span class="card-label">
                            MOTTO
                        </span>

                        <h2>
                            "Melayani dengan Ikhlas"
                        </h2>

                        <div class="card-line"></div>

                        <p>
                            Memberikan pelayanan kepada masyarakat
                            dengan tulus, ramah, dan penuh tanggung jawab.
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             MISI
        ====================================================== --}}
        <div class="row justify-content-center">

            <div class="col-lg-11">

                <div class="misi-card">

                    <div class="misi-header text-center">

                        <div class="icon-box">
                            <i class="fas fa-tasks"></i>
                        </div>

                        <span class="card-label">
                            MISI
                        </span>

                        <h2>
                            Misi KUA Kecamatan Karang Baru
                        </h2>

                        <p>
                            Komitmen dalam meningkatkan kualitas pelayanan
                            keagamaan dan pemberdayaan masyarakat.
                        </p>

                    </div>


                    {{-- =================================================
                         LIST MISI
                    ================================================== --}}
                    <div class="row g-3">

                        {{-- MISI 1 --}}
                        <div class="col-md-6">

                            <div class="misi-item">

                                <span class="nomor">
                                    1
                                </span>

                                <p>
                                    Meningkatkan kualitas pemahaman dan
                                    pengamalan ajaran Islam.
                                </p>

                            </div>

                        </div>


                        {{-- MISI 2 --}}
                        <div class="col-md-6">

                            <div class="misi-item">

                                <span class="nomor">
                                    2
                                </span>

                                <p>
                                    Meningkatkan kerjasama lintas sektoral
                                    dan kemitraan umat.
                                </p>

                            </div>

                        </div>


                        {{-- MISI 3 --}}
                        <div class="col-md-6">

                            <div class="misi-item">

                                <span class="nomor">
                                    3
                                </span>

                                <p>
                                    Meningkatkan kualitas pelayanan
                                    kepenghuluan dan keluarga sakinah.
                                </p>

                            </div>

                        </div>


                        {{-- MISI 4 --}}
                        <div class="col-md-6">

                            <div class="misi-item">

                                <span class="nomor">
                                    4
                                </span>

                                <p>
                                    Meningkatkan kualitas pelayanan zakat,
                                    wakaf, produk halal dan kemasjidan.
                                </p>

                            </div>

                        </div>


                        {{-- MISI 5 --}}
                        <div class="col-md-6">

                            <div class="misi-item">

                                <span class="nomor">
                                    5
                                </span>

                                <p>
                                    Meningkatkan kualitas pelayanan manasik
                                    haji, hisab, rukyat dan pembinaan syariah.
                                </p>

                            </div>

                        </div>


                        {{-- MISI 6 --}}
                        <div class="col-md-6">

                            <div class="misi-item">

                                <span class="nomor">
                                    6
                                </span>

                                <p>
                                    Meningkatkan kualitas SDM dan data KUA.
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
     STYLE
========================================================= --}}

<style>

    /* =========================================================
       SECTION
    ========================================================= */

    .visi-section {
        padding: 115px 0 80px;
        min-height: 100vh;

        background:
            linear-gradient(
                180deg,
                #f8fafc 0%,
                #ffffff 100%
            );
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .visi-header {
        margin-bottom: 48px;
    }


    .instansi-badge {
        display: inline-flex;
        align-items: center;

        padding: 10px 20px;

        border-radius: 50px;

        background: #ecfdf5;
        border: 1px solid #a7f3d0;

        color: #047857;

        font-size: 15px;
        font-weight: 700;

        box-shadow: 0 4px 15px rgba(4, 120, 87, 0.08);
    }


    .visi-header h1 {
        margin: 20px 0 10px;

        color: #064e3b;

        font-size: 42px;
        line-height: 1.2;

        font-weight: 800;
        letter-spacing: -0.5px;
    }


    .visi-header p {
        margin: 0;

        color: #64748b;

        font-size: 16px;
        line-height: 1.7;
    }


    /* =========================================================
       CARD VISI & MOTTO
    ========================================================= */

    .info-card {
        position: relative;

        overflow: hidden;

        border-radius: 22px;

        background: #ffffff;

        border: 1px solid #e2e8f0;

        box-shadow:
            0 12px 35px rgba(15, 23, 42, 0.07);

        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease;
    }


    .info-card:hover {
        transform: translateY(-4px);

        box-shadow:
            0 18px 45px rgba(15, 23, 42, 0.11);
    }


    .info-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 5px;

        background: linear-gradient(
            90deg,
            #047857,
            #10b981
        );
    }


    .card-inner {
        min-height: 350px;

        padding: 45px 40px;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;

        text-align: center;
    }


    /* =========================================================
       ICON
    ========================================================= */

    .icon-box {
        width: 68px;
        height: 68px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 18px;

        border-radius: 50%;

        background: #ecfdf5;

        color: #047857;

        border: 1px solid #a7f3d0;

        font-size: 27px;

        box-shadow:
            0 6px 18px rgba(4, 120, 87, 0.10);
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .card-label {
        color: #059669;

        font-size: 13px;
        font-weight: 800;

        letter-spacing: 2px;

        margin-bottom: 14px;
    }


    /* =========================================================
       JUDUL CARD
    ========================================================= */

    .info-card h2 {
        max-width: 650px;

        margin: 0;

        color: #1f2937;

        font-size: 24px;
        line-height: 1.55;

        font-weight: 750;
    }


    .motto-card h2 {
        font-size: 25px;

        color: #065f46;
    }


    /* =========================================================
       GARIS
    ========================================================= */

    .card-line {
        width: 60px;
        height: 4px;

        margin: 20px auto;

        border-radius: 20px;

        background: #10b981;
    }


    .info-card p {
        max-width: 600px;

        margin: 0;

        color: #64748b;

        font-size: 14px;
        line-height: 1.8;
    }


    /* =========================================================
       MISI CARD
    ========================================================= */

    .misi-card {
        padding: 45px;

        border-radius: 22px;

        background: #ffffff;

        border: 1px solid #e2e8f0;

        box-shadow:
            0 12px 35px rgba(15, 23, 42, 0.07);
    }


    .misi-header {
        margin-bottom: 30px;
    }


    .misi-header .icon-box {
        margin-left: auto;
        margin-right: auto;
    }


    .misi-header h2 {
        margin: 0 0 8px;

        color: #064e3b;

        font-size: 25px;
        font-weight: 800;
    }


    .misi-header p {
        margin: 0;

        color: #64748b;

        font-size: 14px;
    }


    /* =========================================================
       ITEM MISI
    ========================================================= */

    .misi-item {
        height: 100%;

        display: flex;
        align-items: flex-start;

        gap: 15px;

        padding: 20px;

        border-radius: 15px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;

        transition:
            background 0.2s ease,
            border-color 0.2s ease,
            transform 0.2s ease;
    }


    .misi-item:hover {
        background: #ecfdf5;

        border-color: #a7f3d0;

        transform: translateY(-2px);
    }


    .nomor {
        width: 35px;
        height: 35px;

        min-width: 35px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #059669;

        color: #ffffff;

        font-size: 14px;
        font-weight: 800;

        box-shadow:
            0 4px 10px rgba(5, 150, 105, 0.20);
    }


    .misi-item p {
        margin: 0;

        color: #475569;

        font-size: 14px;
        line-height: 1.75;
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 991.98px) {

        .visi-section {
            padding-top: 100px;
        }

        .visi-header h1 {
            font-size: 36px;
        }

        .card-inner {
            min-height: 320px;
        }

        .misi-card {
            padding: 35px;
        }

    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767.98px) {

        .visi-section {
            padding: 90px 15px 60px;
        }


        .visi-header {
            margin-bottom: 35px;
        }


        .instansi-badge {
            padding: 8px 14px;

            font-size: 12px;

            line-height: 1.5;
        }


        .visi-header h1 {
            margin-top: 17px;

            font-size: 30px;
        }


        .visi-header p {
            font-size: 14px;
        }


        .card-inner {
            min-height: auto;

            padding: 38px 25px;
        }


        .info-card h2 {
            font-size: 21px;
        }


        .motto-card h2 {
            font-size: 22px;
        }


        .misi-card {
            padding: 30px 20px;
        }


        .misi-header h2 {
            font-size: 21px;
        }


        .misi-item {
            padding: 17px;
        }


        .misi-item p {
            font-size: 13px;
        }

    }

</style>

@endsection