@extends('layouts.appadmin')

@section('title', 'Detail Saran dan Pengaduan')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1">Detail Saran dan Pengaduan</h3>
            <p class="text-muted mb-0">
                Informasi pesan dan tanggapan dari masyarakat.
            </p>
        </div>

        <a href="{{ route('admin.saran.index') }}"
           class="btn btn-outline-secondary rounded-3">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>


    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger rounded-3">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row g-4">

        {{-- INFORMASI PENGIRIM --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-person-circle text-success me-2"></i>
                        Informasi Pengirim
                    </h5>
                </div>

                <div class="card-body px-4">

                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">
                            Nama Pengirim
                        </small>

                        <div class="fw-semibold">
                            {{ $saran->user->nama ?? $saran->user->name ?? 'Pengguna tidak ditemukan' }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">
                            Email
                        </small>

                        <div>
                            {{ $saran->user->email ?? '-' }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">
                            Nomor HP
                        </small>

                        <div>
                            {{ $saran->user->no_hp ?? '-' }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">
                            Tanggal Pengiriman
                        </small>

                        <div>
                            {{ $saran->created_at->format('d F Y, H:i') }}
                        </div>
                    </div>

                    <hr>

                    <div>
                        <small class="text-muted d-block mb-2">
                            Status Pesan
                        </small>

                        @if($saran->status === 'baru')
                            <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill">
                                Baru
                            </span>
                        @elseif($saran->status === 'dibaca')
                            <span class="badge bg-info-subtle text-info px-3 py-2 rounded-pill">
                                Dibaca
                            </span>
                        @elseif($saran->status === 'dibalas')
                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                Dibalas
                            </span>
                        @else
                            <span class="badge bg-secondary px-3 py-2 rounded-pill">
                                {{ ucfirst($saran->status) }}
                            </span>
                        @endif
                    </div>

                </div>
            </div>

        </div>


        {{-- ISI PESAN DAN BALASAN --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-envelope-paper text-success me-2"></i>
                        Isi Pesan / Pertanyaan
                    </h5>
                </div>

                <div class="card-body px-4">

                    <div class="pesan-box">
                        {{ $saran->isi_saran ?? $saran->pesan ?? '-' }}
                    </div>

                </div>
            </div>


            {{-- BALASAN ADMIN --}}
            @if($saran->tanggapan)

                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-reply-all text-success me-2"></i>
                            Balasan Admin
                        </h5>
                    </div>

                    <div class="card-body px-4 pb-4">

                        <div class="balasan-box">
                            {{ $saran->tanggapan }}
                        </div>

                    </div>
                </div>

            @endif


            {{-- FORM BALASAN --}}
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-1">
                        <i class="bi bi-pencil-square text-success me-2"></i>
                        {{ $saran->tanggapan ? 'Ubah Balasan' : 'Kirim Balasan' }}
                    </h5>

                    <small class="text-muted">
                        Tulis tanggapan admin untuk saran atau pertanyaan ini.
                    </small>
                </div>

                <div class="card-body px-4 pb-4">

                    <form action="{{ route('admin.saran.balas', $saran->id) }}"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label for="tanggapan" class="form-label fw-semibold">
                                Tanggapan Admin
                            </label>

                            <textarea
                                name="tanggapan"
                                id="tanggapan"
                                rows="5"
                                maxlength="2000"
                                class="form-control rounded-3 @error('tanggapan') is-invalid @enderror"
                                placeholder="Tuliskan balasan atau tanggapan admin..."
                                required>{{ old('tanggapan', $saran->tanggapan) }}</textarea>

                            @error('tanggapan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                Maksimal 2000 karakter.
                            </small>

                        </div>

                        <div class="d-flex justify-content-end">

                            <button type="submit"
                                    class="btn btn-success rounded-3 px-4">

                                <i class="bi bi-send me-1"></i>

                                {{ $saran->tanggapan ? 'Perbarui Balasan' : 'Kirim Balasan' }}

                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>


{{-- CSS --}}
<style>

    .pesan-box {
        background: #f6faf7;
        border: 1px solid #e4eee7;
        border-radius: 14px;
        padding: 22px;
        min-height: 130px;
        line-height: 1.8;
        color: #344b3b;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .balasan-box {
        background: #edf8f0;
        border-left: 4px solid #23834b;
        border-radius: 10px;
        padding: 20px;
        line-height: 1.8;
        color: #285c3a;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .card {
        transition: box-shadow .2s ease;
    }

    .form-control {
        border-color: #dce7df;
        padding: 12px 14px;
    }

    .form-control:focus {
        border-color: #429b64;
        box-shadow: 0 0 0 .2rem rgba(66, 155, 100, .12);
    }

    @media(max-width: 576px) {
        .pesan-box,
        .balasan-box {
            padding: 15px;
        }
    }

</style>

@endsection