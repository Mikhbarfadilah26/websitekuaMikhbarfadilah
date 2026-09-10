@extends('layouts.applanding')

@section('content')

<style>
    .kontak-page {
        background: #f8fafc;
        min-height: 100vh;
    }

    .kontak-hero {
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

    .kontak-badge {
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

    .kontak-hero h1 {
        font-size: clamp(38px, 5vw, 55px);
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 18px;
    }

    .kontak-hero h1 span {
        color: #2563eb;
    }

    .kontak-hero p {
        max-width: 750px;
        margin: auto;
        color: #64748b;
        line-height: 1.8;
        font-size: 17px;
    }

    .kontak-section {
        padding: 80px 0;
    }

    .kontak-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 25px;
        padding: 35px;
        height: 100%;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .06);
        transition: all .35s ease;
    }

    .kontak-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 55px rgba(15, 23, 42, .10);
        border-color: #bfdbfe;
    }

    .kontak-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: #dbeafe;
        color: #2563eb;
        font-size: 25px;
        margin-bottom: 20px;
    }

    .kontak-card h4 {
        color: #0f172a;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .kontak-card p {
        color: #64748b;
        line-height: 1.8;
        margin-bottom: 0;
    }

    .kontak-card a {
        color: #2563eb;
        text-decoration: none;
    }

    .kontak-card a:hover {
        color: #1d4ed8;
    }

    .kontak-form {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 25px;
        padding: 35px;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .06);
    }

    .kontak-form h3 {
        color: #0f172a;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 600;
        color: #334155;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #cbd5e1;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .12);
    }

    .btn-kontak {
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 12px 25px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-kontak:hover {
        background: #1d4ed8;
        color: white;
        transform: translateY(-2px);
    }

    .map-card {
        margin-top: 40px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .06);
    }

    .map-placeholder {
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        color: #2563eb;
        text-align: center;
        padding: 30px;
    }

    @media (max-width: 768px) {
        .kontak-hero {
            padding-top: 120px;
        }

        .kontak-section {
            padding: 60px 0;
        }
    }
</style>

<div class="kontak-page">

```
{{-- =================================================
     HERO
================================================== --}}
<section class="kontak-hero">
    <div class="container">

        <span class="kontak-badge">
            <i class="fas fa-address-book me-2"></i>
            Hubungi Kami
        </span>

        <h1>
            Kontak
            <span>KUA Karang Baru</span>
        </h1>

        <p>
            Silakan hubungi Kantor Urusan Agama Kecamatan
            Karang Baru untuk mendapatkan informasi dan
            pelayanan yang dibutuhkan masyarakat.
        </p>

    </div>
</section>


{{-- =================================================
     INFORMASI KONTAK
================================================== --}}
<section class="kontak-section">

    <div class="container">

        <div class="row g-4">

            {{-- ALAMAT --}}
            <div class="col-lg-4 col-md-6">

                <div class="kontak-card">

                    <div class="kontak-icon">
                        <i class="fas fa-location-dot"></i>
                    </div>

                    <h4>Alamat Kantor</h4>

                    <p>
                        Kantor Urusan Agama Kecamatan
                        Karang Baru, Kabupaten Aceh Tamiang.
                    </p>

                </div>

            </div>


            {{-- TELEPON --}}
            <div class="col-lg-4 col-md-6">

                <div class="kontak-card">

                    <div class="kontak-icon">
                        <i class="fas fa-phone"></i>
                    </div>

                    <h4>Telepon</h4>

                    <p>
                        <a href="tel:+62641234567">
                            (0641) 123456
                        </a>
                    </p>

                    <small class="text-muted">
                        Silakan sesuaikan nomor dengan
                        nomor resmi KUA.
                    </small>

                </div>

            </div>


            {{-- EMAIL --}}
            <div class="col-lg-4 col-md-6">

                <div class="kontak-card">

                    <div class="kontak-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <h4>Email</h4>

                    <p>
                        <a href="mailto:kua.karangbaru@example.com">
                            kua.karangbaru@example.com
                        </a>
                    </p>

                    <small class="text-muted">
                        Silakan ganti dengan email resmi KUA.
                    </small>

                </div>

            </div>

        </div>


        {{-- =================================================
             JAM PELAYANAN
        ================================================== --}}
        <div class="row g-4 mt-4">

            <div class="col-lg-6">

                <div class="kontak-card">

                    <div class="kontak-icon">
                        <i class="fas fa-clock"></i>
                    </div>

                    <h4>Jam Pelayanan</h4>

                    <p>
                        Senin - Kamis
                        <br>
                        08.00 - 16.00 WIB
                    </p>

                    <p class="mt-3">
                        Jumat
                        <br>
                        08.00 - 16.30 WIB
                    </p>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="kontak-card">

                    <div class="kontak-icon">
                        <i class="fas fa-building"></i>
                    </div>

                    <h4>Kantor Urusan Agama</h4>

                    <p>
                        KUA Kecamatan Karang Baru
                        <br>
                        Kabupaten Aceh Tamiang
                    </p>

                </div>

            </div>

        </div>


        {{-- =================================================
             FORM KONTAK
        ================================================== --}}
        <div class="row mt-5">

            <div class="col-lg-8 mx-auto">

                <div class="kontak-form">

                    <h3>
                        <i class="fas fa-paper-plane text-primary me-2"></i>
                        Kirim Pesan
                    </h3>

                    <form action="#" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Masukkan nama lengkap"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Masukkan email"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                No. WhatsApp
                            </label>

                            <input
                                type="text"
                                name="whatsapp"
                                class="form-control"
                                placeholder="Masukkan nomor WhatsApp"
                            >

                        </div>


                        <div class="mb-4">

                            <label class="form-label">
                                Pesan
                            </label>

                            <textarea
                                name="pesan"
                                rows="5"
                                class="form-control"
                                placeholder="Tuliskan pesan Anda..."
                                required
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-kontak"
                        >
                            <i class="fas fa-paper-plane me-2"></i>
                            Kirim Pesan
                        </button>

                    </form>

                </div>

            </div>

        </div>


        {{-- =================================================
             LOKASI
        ================================================== --}}
        <div class="map-card">

            <div class="map-placeholder">

                <div>

                    <i class="fas fa-map-location-dot fa-4x mb-3"></i>

                    <h4 class="fw-bold">
                        Lokasi KUA Karang Baru
                    </h4>

                    <p class="mb-0">
                        Kabupaten Aceh Tamiang
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
```

</div>

@endsection
