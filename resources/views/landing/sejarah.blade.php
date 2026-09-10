@extends('layouts.applanding')

@section('content')

{{-- =========================================================
     SEJARAH SINGKAT
========================================================= --}}

<section class="py-5" style="padding-top: 120px !important;">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <span class="badge bg-success px-3 py-2 rounded-pill mb-3">
                <i class="fas fa-landmark me-1"></i>
                Tentang Kami
            </span>

            <h1 class="fw-bold text-dark">
                Sejarah Singkat
            </h1>

            <p class="text-muted">
                Sejarah dan perkembangan KUA Kecamatan Karang Baru
            </p>

        </div>


        {{-- CARD SEJARAH --}}
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="row g-0 align-items-center">

                {{-- ILUSTRASI --}}
                <div class="col-lg-5">

                    <div class="p-4 p-lg-5 text-center"
                        style="
                            background: linear-gradient(
                                135deg,
                                #064e3b,
                                #047857
                            );
                            min-height: 350px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                        ">

                        <div class="text-white">

                            <i class="fas fa-mosque"
                                style="font-size:100px;"></i>

                            <h3 class="fw-bold mt-4">
                                KUA Karang Baru
                            </h3>

                            <p class="mb-0 opacity-75">
                                Kantor Urusan Agama Kecamatan Karang Baru
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ISI --}}
                <div class="col-lg-7">

                    <div class="p-4 p-lg-5">

                        <h3 class="fw-bold text-success mb-4">

                            <i class="fas fa-history me-2"></i>

                            Sejarah KUA Karang Baru

                        </h3>


                        <p class="text-muted"
                            style="line-height:1.9; text-align:justify;">

                            Kantor Urusan Agama (KUA) Kecamatan Karang Baru
                            merupakan salah satu instansi yang berada di bawah
                            Kementerian Agama yang memiliki peran penting dalam
                            memberikan pelayanan keagamaan kepada masyarakat.

                        </p>

                        <p class="text-muted"
                            style="line-height:1.9; text-align:justify;">

                            Dalam menjalankan tugasnya, KUA Kecamatan Karang Baru
                            memberikan berbagai pelayanan kepada masyarakat,
                            khususnya dalam bidang pencatatan pernikahan,
                            bimbingan keluarga sakinah, pelayanan keagamaan,
                            serta berbagai kegiatan administrasi yang berkaitan
                            dengan urusan agama.

                        </p>

                        <p class="text-muted"
                            style="line-height:1.9; text-align:justify;">

                            Seiring dengan perkembangan teknologi dan kebutuhan
                            masyarakat, KUA Kecamatan Karang Baru terus berupaya
                            meningkatkan kualitas pelayanan agar menjadi lebih
                            efektif, cepat, transparan, dan mudah diakses oleh
                            masyarakat.

                        </p>


                        {{-- GARIS --}}
                        <div class="mt-4 pt-3 border-top">

                            <div class="d-flex align-items-center">

                                <div class="bg-success rounded-circle p-2 me-3">

                                    <i class="fas fa-check text-white"></i>

                                </div>

                                <div>

                                    <h6 class="fw-bold mb-1">
                                        Pelayanan Masyarakat
                                    </h6>

                                    <small class="text-muted">
                                        Memberikan pelayanan keagamaan yang
                                        mudah, cepat, dan berkualitas.
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection