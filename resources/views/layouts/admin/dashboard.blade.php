@extends('layouts.appadmin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('breadcrumb', 'Dashboard')

@section('content')

<div class="row g-4">

    <div class="col-lg-3 col-md-6">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>
                        <p class="text-muted mb-1">
                            Total Peminjaman
                        </p>

                        <h3 class="fw-bold mb-0">
                            120
                        </h3>
                    </div>

                    <div class="fs-1 text-primary">
                        <i class="bi bi-journal-text"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>
                        <p class="text-muted mb-1">
                            Menunggu Persetujuan
                        </p>

                        <h3 class="fw-bold mb-0">
                            12
                        </h3>
                    </div>

                    <div class="fs-1 text-warning">
                        <i class="bi bi-clock-history"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>
                        <p class="text-muted mb-1">
                            Sedang Dipinjam
                        </p>

                        <h3 class="fw-bold mb-0">
                            35
                        </h3>
                    </div>

                    <div class="fs-1 text-success">
                        <i class="bi bi-box-seam"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>
                        <p class="text-muted mb-1">
                            Pengembalian
                        </p>

                        <h3 class="fw-bold mb-0">
                            73
                        </h3>
                    </div>

                    <div class="fs-1 text-danger">
                        <i class="bi bi-arrow-return-left"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection