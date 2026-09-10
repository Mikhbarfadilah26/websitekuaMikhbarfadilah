@extends('layouts.applanding')

@section('content')

{{-- =========================================================
     TENTANG KUA
========================================================= --}}

<section class="py-5" style="padding-top: 120px !important;">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <span class="badge bg-success px-3 py-2 rounded-pill mb-3">
                <i class="fas fa-info-circle me-1"></i>
                Profil Instansi
            </span>

            <h1 class="fw-bold text-dark">
                Tentang KUA Karang Baru
            </h1>

            <p class="text-muted">
                Mengenal lebih dekat Kantor Urusan Agama Kecamatan Karang Baru
            </p>

        </div>


        {{-- CARD PROFIL UTAMA --}}
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-5">

            <div class="row g-0 align-items-center">

                {{-- ILUSTRASI / GAMBAR --}}
                <div class="col-lg-5">

                    <div class="p-4 p-lg-5 text-center"
                        style="
                            background: linear-gradient(
                                135deg,
                                #064e3b,
                                #047857
                            );
                            min-height: 100%;
                            height: 100%;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                        ">

                        <div class="text-white my-auto">

                            <i class="fas fa-building-columns"
                                style="font-size:100px;"></i>

                            <h3 class="fw-bold mt-4">
                                KUA Karang Baru
                            </h3>

                            <p class="mb-0 opacity-75">
                                Melayani dengan Amanah, Profesional, dan Integritas
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ISI GAMBARAN UMUM --}}
                <div class="col-lg-7">

                    <div class="p-4 p-lg-5">

                        <h3 class="fw-bold text-success mb-4">

                            <i class="fas fa-bullhorn me-2"></i>

                            Gambaran Umum

                        </h3>


                        <p class="text-muted"
                            style="line-height:1.9; text-align:justify;">

                            Kantor Urusan Agama (KUA) Kecamatan Karang Baru merupakan unit pelaksana teknis di tingkat kecamatan yang berada di bawah naungan Kementerian Agama Republik Indonesia. KUA bertindak sebagai garda terdepan dalam menyelenggarakan pelayanan di bidang keagamaan Islam bagi masyarakat.

                        </p>

                        <p class="text-muted"
                            style="line-height:1.9; text-align:justify;">

                            Selain berfokus pada pencatatan nikah dan rujuk, KUA Karang Baru juga aktif dalam pengelolaan zakat, wakaf, bimbingan manasik haji, pembinaan kemasjidan, serta pembinaan keluarga sakinah untuk mewujudkan masyarakat yang religius dan harmonis.

                        </p>


                        {{-- GARIS FITUR KUNCI --}}
                        <div class="mt-4 pt-3 border-top">

                            <div class="row g-3">

                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle p-2 me-3">
                                            <i class="fas fa-check text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-0">Transparan & Akuntabel</h6>
                                            <small class="text-muted">Prosedur layanan yang jelas</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle p-2 me-3">
                                            <i class="fas fa-check text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-0">Berbasis Digital</h6>
                                            <small class="text-muted">Kemudahan akses informasi</small>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- VISI & MISI --}}
        <div class="row g-4">

            {{-- VISI --}}
            <div class="col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100 p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success-subtle rounded-circle p-3 me-3 text-success">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-0">Visi</h4>
                    </div>

                    <p class="text-muted mb-0" style="line-height:1.8;">
                        Terwujudnya pelayanan keagamaan yang profesional, handal, serta terwujudnya masyarakat Kecamatan Karang Baru yang taat beragama, rukun, dan sejahtera.
                    </p>

                </div>

            </div>

            {{-- MISI --}}
            <div class="col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100 p-4">

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success-subtle rounded-circle p-3 me-3 text-success">
                            <i class="fas fa-bullseye fa-2x"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-0">Misi</h4>
                    </div>

                    <ul class="text-muted ps-3 mb-0" style="line-height:1.8;">
                        <li class="mb-2">Meningkatkan kualitas pelayanan nikah, rujuk, dan kepenghuluan.</li>
                        <li class="mb-2">Meningkatkan pembinaan bimbingan keluarga sakinah dan kemasjidan.</li>
                        <li class="mb-2">Meningkatkan pengelolaan dan tata kelola zakat serta wakaf.</li>
                        <li>Mengembangkan sistem informasi keagamaan yang akurat dan mudah diakses.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection