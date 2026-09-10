@extends('layouts.appmasyarakat')

@section('title', 'Dashboard Masyarakat')

@section('page-title', 'Dashboard')

@section('breadcrumb', 'Dashboard Masyarakat')


@section('content')

<div class="row g-4">


    {{-- =====================================================
         WELCOME CARD
    ====================================================== --}}

    <div class="col-12">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4 p-lg-5">

                <div class="d-flex align-items-center">

                    <div class="flex-grow-1">

                        <h3 class="fw-semibold mb-2">

                            Selamat Datang,

                            {{ auth()->user()->nama ?? 'Masyarakat KUA' }}

                            👋

                        </h3>

                        <p class="text-muted mb-0">

                            Silakan gunakan menu di samping
                            untuk mengakses berbagai layanan KUA
                            Karang Baru.

                        </p>

                    </div>


                    <div class="ms-4 d-none d-md-block">

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-center
                                   bg-primary
                                   text-white
                                   rounded-circle"
                            style="width: 70px; height: 70px;">

                            <i class="bi bi-person fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         STAT 1
    ====================================================== --}}

    <div class="col-md-4">

        <div class="card stat-card shadow-sm h-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center">

                    <div
                        class="bg-primary-subtle
                               text-primary
                               rounded-3
                               p-3">

                        <i class="bi bi-file-earmark-text fs-4"></i>

                    </div>

                    <div class="ms-3">

                        <small class="text-muted">
                            Pengajuan
                        </small>

                        <h4 class="fw-semibold mb-0">
                            0
                        </h4>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         STAT 2
    ====================================================== --}}

    <div class="col-md-4">

        <div class="card stat-card shadow-sm h-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center">

                    <div
                        class="bg-success-subtle
                               text-success
                               rounded-3
                               p-3">

                        <i class="bi bi-check-circle fs-4"></i>

                    </div>

                    <div class="ms-3">

                        <small class="text-muted">
                            Selesai
                        </small>

                        <h4 class="fw-semibold mb-0">
                            0
                        </h4>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         STAT 3
    ====================================================== --}}

    <div class="col-md-4">

        <div class="card stat-card shadow-sm h-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center">

                    <div
                        class="bg-warning-subtle
                               text-warning
                               rounded-3
                               p-3">

                        <i class="bi bi-clock-history fs-4"></i>

                    </div>

                    <div class="ms-3">

                        <small class="text-muted">
                            Dalam Proses
                        </small>

                        <h4 class="fw-semibold mb-0">
                            0
                        </h4>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection