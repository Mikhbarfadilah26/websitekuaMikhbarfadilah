@extends('layouts.applanding')

@section('content')

{{-- =========================================================
    HERO
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center">

            <span class="badge bg-primary px-3 py-2 mb-3">
                Pelayanan KUA
            </span>

            <h1 class="fw-bold mb-3">
                Persyaratan
            </h1>

            <p class="text-muted mb-0">
                Informasi persyaratan pelayanan di Kantor Urusan Agama
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
    DAFTAR PERSYARATAN
========================================================= --}}

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4 p-md-5">

                        {{-- =================================================
                            JUDUL
                        ================================================== --}}

                        <div class="text-center mb-4">

                            <div
                                class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">

                                <i class="fas fa-clipboard-check fa-lg"></i>

                            </div>

                            <h3 class="fw-bold mb-2">
                                Daftar Persyaratan
                            </h3>

                            <p class="text-muted mb-0">
                                Pilih jenis pelayanan untuk melihat persyaratannya.
                            </p>

                        </div>


                        {{-- =================================================
                            DROPDOWN PERSYARATAN NIKAH
                        ================================================== --}}

                        <div class="accordion" id="accordionPersyaratan">

                            <div class="accordion-item border rounded-3 mb-3">

                                <h2 class="accordion-header">

                                    <button
                                        class="accordion-button collapsed fw-semibold"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#persyaratanNikah"
                                        aria-expanded="false"
                                        aria-controls="persyaratanNikah">

                                        <i class="fas fa-ring me-3 text-primary"></i>

                                        Persyaratan Nikah

                                    </button>

                                </h2>


                                <div
                                    id="persyaratanNikah"
                                    class="accordion-collapse collapse"
                                    data-bs-parent="#accordionPersyaratan">

                                    <div class="accordion-body">

                                        <div class="mb-4">

                                            <h5 class="fw-bold">
                                                Persyaratan Nikah
                                            </h5>

                                            <p class="text-muted small mb-0">
                                                Silakan lengkapi seluruh persyaratan
                                                berikut sebelum melakukan pendaftaran nikah.
                                            </p>

                                        </div>


                                        {{-- =================================================
                                            LIST PERSYARATAN
                                        ================================================== --}}

                                        <div class="persyaratan-list">

                                            @forelse ($layanan->persyaratan as $index => $syarat)

                                                <div class="d-flex mb-3">

                                                    <div class="me-3">

                                                        <span
                                                            class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                                            style="width: 32px; height: 32px;">

                                                            {{ $index + 1 }}

                                                        </span>

                                                    </div>


                                                    <div class="flex-grow-1">

                                                        <div class="fw-semibold">

                                                            {{ $syarat->nama_persyaratan }}

                                                        </div>


                                                        @if ($syarat->keterangan)

                                                            <div class="text-muted small mt-1">

                                                                <i class="fas fa-info-circle me-1"></i>

                                                                {{ $syarat->keterangan }}

                                                            </div>

                                                        @endif

                                                    </div>

                                                </div>

                                            @empty

                                                <div class="alert alert-warning">

                                                    <i class="fas fa-exclamation-circle me-2"></i>

                                                    Data persyaratan belum tersedia.

                                                </div>

                                            @endforelse

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                TEMPAT PERSYARATAN BERIKUTNYA
                            ================================================== --}}

                            {{-- 
                            Nanti bisa ditambahkan:

                            <div class="accordion-item border rounded-3 mb-3">

                                <h2 class="accordion-header">

                                    <button
                                        class="accordion-button collapsed fw-semibold"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#persyaratanBerikutnya">

                                        <i class="fas fa-file-alt me-3 text-primary"></i>

                                        Nama Persyaratan Berikutnya

                                    </button>

                                </h2>

                                <div
                                    id="persyaratanBerikutnya"
                                    class="accordion-collapse collapse">

                                    <div class="accordion-body">
                                        ...
                                    </div>

                                </div>

                            </div>
                            --}}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    INFORMASI
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="alert alert-info border-0 shadow-sm">

                    <div class="d-flex">

                        <div class="me-3">

                            <i class="fas fa-info-circle fa-2x"></i>

                        </div>

                        <div>

                            <h5 class="fw-bold">
                                Informasi
                            </h5>

                            <p class="mb-0">
                                Silakan pilih jenis pelayanan di atas
                                untuk melihat persyaratan yang diperlukan.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
