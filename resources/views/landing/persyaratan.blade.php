
@extends('layouts.applanding')

@section('title', 'Persyaratan Pelayanan | KUA Karang Baru')

@section('content')

{{-- =========================================================
     DAFTAR PERSYARATAN
========================================================= --}}

<section class="persyaratan-section">

    <div class="container">

        {{-- JUDUL HALAMAN --}}

        <div class="section-heading text-center">

            <span class="section-label">
                INFORMASI ADMINISTRASI
            </span>

            <h2>Daftar Persyaratan</h2>

            <p>
                Pilih jenis pelayanan di bawah ini untuk melihat
                dokumen yang perlu dipersiapkan.
            </p>

        </div>


        <div class="row justify-content-center">

            <div class="col-lg-9">

                {{-- CARD UTAMA --}}

                <div class="persyaratan-card">

                    <div class="card-heading">

                        <div class="heading-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>

                        <div>
                            <h4>Informasi Persyaratan</h4>

                            <p>
                                Persiapkan dokumen sesuai ketentuan pelayanan.
                            </p>
                        </div>

                    </div>


                    {{-- ACCORDION --}}

                    <div class="accordion custom-accordion"
                         id="accordionPersyaratan">

                        <div class="accordion-item">

                            <h2 class="accordion-header">

                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#persyaratanNikah"
                                    aria-expanded="false"
                                    aria-controls="persyaratanNikah">

                                    <span class="accordion-icon">
                                        <i class="fas fa-ring"></i>
                                    </span>

                                    <span class="accordion-title">

                                        <strong>Persyaratan Nikah</strong>

                                        <small>
                                            Dokumen administrasi pendaftaran nikah
                                        </small>

                                    </span>

                                    <span class="accordion-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </span>

                                </button>

                            </h2>


                            <div
                                id="persyaratanNikah"
                                class="accordion-collapse collapse"
                                data-bs-parent="#accordionPersyaratan">

                                <div class="accordion-body">

                                    {{-- INFORMASI --}}

                                    <div class="syarat-intro">

                                        <div class="syarat-intro-icon">
                                            <i class="fas fa-info-circle"></i>
                                        </div>

                                        <div>

                                            <h5>
                                                Persyaratan Pendaftaran Nikah
                                            </h5>

                                            <p>
                                                Silakan lengkapi dokumen berikut
                                                sebelum melakukan pendaftaran nikah
                                                di KUA Kecamatan Karang Baru.
                                            </p>

                                        </div>

                                    </div>


                                    {{-- DATA PERSYARATAN DARI DATABASE --}}

                                    <div class="persyaratan-list">

                                        @forelse ($layanan->persyaratan as $index => $syarat)

                                            <div class="syarat-item">

                                                <div class="syarat-number">
                                                    {{ $index + 1 }}
                                                </div>

                                                <div class="syarat-content">

                                                    <h6>
                                                        {{ $syarat->nama_persyaratan }}
                                                    </h6>

                                                    @if ($syarat->keterangan)

                                                        <p>
                                                            <i class="fas fa-info-circle"></i>
                                                            {{ $syarat->keterangan }}
                                                        </p>

                                                    @endif

                                                </div>

                                                <div class="syarat-check">
                                                    <i class="fas fa-check-circle"></i>
                                                </div>

                                            </div>

                                        @empty

                                            <div class="empty-state">

                                                <div class="empty-icon">
                                                    <i class="fas fa-folder-open"></i>
                                                </div>

                                                <h5>Data Belum Tersedia</h5>

                                                <p>
                                                    Informasi persyaratan belum
                                                    ditambahkan oleh administrator.
                                                </p>

                                            </div>

                                        @endforelse

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- INFORMASI TAMBAHAN --}}

                <div class="information-card">

                    <div class="information-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>

                    <div class="information-content">

                        <h5>Informasi Penting</h5>

                        <p>
                            Pastikan seluruh dokumen persyaratan telah
                            dipersiapkan sebelum datang ke Kantor Urusan
                            Agama Kecamatan Karang Baru.
                        </p>

                        <p class="mb-0">
                            Untuk informasi lebih lanjut, silakan
                            menghubungi petugas pelayanan KUA.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     CSS TEMA HIJAU SOFT MENYELURUH
========================================================= --}}

<style>

    :root {
        --kua-green: #367b59;
        --kua-green-dark: #285f43;
        --kua-bg: #eaf3eb;
        --kua-bg-soft: #eaf3eb;
        --kua-border: #d7e6d9;
        --kua-text: #304b3b;
        --kua-muted: #718477;
    }


    /* BACKGROUND UTAMA */

    .persyaratan-section {
        padding: 65px 0;
        background: var(--kua-bg);
        min-height: 75vh;
    }


    /* JUDUL */

    .section-heading {
        margin-bottom: 38px;
    }

    .section-label {
        display: inline-block;
        color: var(--kua-green-dark);
        background: #dcebdd;
        padding: 8px 17px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.3px;
    }

    .section-heading h2 {
        color: var(--kua-green-dark);
        font-size: 32px;
        font-weight: 800;
        margin: 15px 0 10px;
    }

    .section-heading p {
        color: var(--kua-muted);
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }


    /* CARD UTAMA */

    .persyaratan-card {
        background: var(--kua-bg-soft);
        border: 1px solid var(--kua-border);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 30px rgba(41, 91, 59, 0.05);
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 17px;
        padding-bottom: 23px;
        margin-bottom: 23px;
        border-bottom: 1px solid var(--kua-border);
    }

    .heading-icon {
        width: 55px;
        height: 55px;
        min-width: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: #dcebdd;
        color: var(--kua-green);
        font-size: 23px;
    }

    .card-heading h4 {
        color: var(--kua-green-dark);
        font-size: 18px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .card-heading p {
        color: var(--kua-muted);
        font-size: 13px;
        margin: 0;
    }


    /* ACCORDION */

    .custom-accordion .accordion-item {
        border: 1px solid var(--kua-border);
        border-radius: 13px !important;
        overflow: hidden;
        margin-bottom: 15px;
        background: var(--kua-bg);
    }

    .custom-accordion .accordion-button {
        padding: 19px;
        background: var(--kua-bg);
        color: var(--kua-green-dark);
        box-shadow: none;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .custom-accordion .accordion-button:not(.collapsed) {
        background: var(--kua-bg);
        color: var(--kua-green-dark);
        box-shadow: none;
    }

    .custom-accordion .accordion-button::after {
        display: none;
    }

    .accordion-icon {
        width: 45px;
        height: 45px;
        min-width: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dcebdd;
        border-radius: 12px;
        color: var(--kua-green);
        font-size: 19px;
    }

    .accordion-title {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .accordion-title strong {
        font-size: 15px;
        font-weight: 800;
    }

    .accordion-title small {
        color: var(--kua-muted);
        font-size: 12px;
        font-weight: 400;
    }

    .accordion-arrow {
        color: var(--kua-green);
        transition: transform .3s ease;
    }

    .accordion-button:not(.collapsed) .accordion-arrow {
        transform: rotate(180deg);
    }


    /* ISI ACCORDION */

    .custom-accordion .accordion-body {
        padding: 25px;
        background: var(--kua-bg);
        border-top: 1px solid var(--kua-border);
    }

    .syarat-intro {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 17px;
        border-radius: 12px;
        background: #dfece1;
        margin-bottom: 20px;
    }

    .syarat-intro-icon {
        color: var(--kua-green);
        font-size: 21px;
        padding-top: 2px;
    }

    .syarat-intro h5 {
        color: var(--kua-green-dark);
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .syarat-intro p {
        color: var(--kua-muted);
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
    }


    /* DAFTAR PERSYARATAN */

    .persyaratan-list {
        background: var(--kua-bg);
        border-radius: 12px;
    }

    .syarat-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 17px 12px;
        border-bottom: 1px solid var(--kua-border);
        transition: background .2s ease;
    }

    .syarat-item:last-child {
        border-bottom: none;
    }

    .syarat-item:hover {
        background: #e2eee4;
        border-radius: 10px;
    }

    .syarat-number {
        width: 34px;
        height: 34px;
        min-width: 34px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        background: #d5e7d8;
        color: var(--kua-green-dark);
        font-size: 13px;
        font-weight: 800;
    }

    .syarat-content {
        flex: 1;
    }

    .syarat-content h6 {
        color: var(--kua-text);
        font-size: 14px;
        font-weight: 700;
        line-height: 1.6;
        margin: 5px 0 0;
    }

    .syarat-content p {
        color: var(--kua-muted);
        font-size: 12px;
        line-height: 1.7;
        margin: 7px 0 0;
    }

    .syarat-content p i {
        color: var(--kua-green);
        margin-right: 5px;
    }

    .syarat-check {
        color: var(--kua-green);
        font-size: 17px;
        padding-top: 7px;
    }


    /* DATA KOSONG */

    .empty-state {
        text-align: center;
        padding: 35px 15px;
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dcebdd;
        color: var(--kua-green);
        font-size: 25px;
        border-radius: 18px;
        margin: 0 auto 15px;
    }

    .empty-state h5 {
        color: var(--kua-green-dark);
        font-weight: 800;
    }

    .empty-state p {
        color: var(--kua-muted);
        font-size: 13px;
        margin: 0;
    }


    /* INFORMASI */

    .information-card {
        display: flex;
        gap: 18px;
        padding: 25px;
        margin-top: 23px;
        border: 1px solid var(--kua-border);
        border-radius: 17px;
        background: var(--kua-bg);
        box-shadow: 0 5px 20px rgba(41, 91, 59, 0.04);
    }

    .information-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: #dcebdd;
        color: var(--kua-green-dark);
        font-size: 21px;
    }

    .information-content h5 {
        color: var(--kua-green-dark);
        font-size: 16px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .information-content p {
        color: var(--kua-muted);
        font-size: 13px;
        line-height: 1.8;
        margin-bottom: 7px;
    }


    /* RESPONSIVE HP */

    @media (max-width: 767px) {

        .persyaratan-section {
            padding: 45px 0;
        }

        .section-heading h2 {
            font-size: 26px;
        }

        .persyaratan-card {
            padding: 18px 13px;
            border-radius: 15px;
        }

        .card-heading {
            gap: 12px;
        }

        .card-heading h4 {
            font-size: 16px;
        }

        .custom-accordion .accordion-button {
            padding: 15px 12px;
            gap: 10px;
        }

        .accordion-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
        }

        .accordion-title strong {
            font-size: 13px;
        }

        .accordion-title small {
            font-size: 11px;
        }

        .custom-accordion .accordion-body {
            padding: 15px 10px;
        }

        .syarat-item {
            gap: 10px;
            padding: 14px 5px;
        }

        .syarat-content h6 {
            font-size: 13px;
        }

        .information-card {
            padding: 17px;
            gap: 12px;
        }

    }

</style>

@endsection
