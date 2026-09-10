@extends('layouts.appadmin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('breadcrumb', 'Dashboard')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <h4 class="fw-semibold mb-2">
                    Selamat Datang, {{ auth()->user()->nama }} 👋
                </h4>

                <p class="text-muted mb-0">
                    Anda berhasil masuk ke halaman Administrator.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection