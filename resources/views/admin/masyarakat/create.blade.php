@extends('layouts.appadmin')

@section('title', 'Tambah Masyarakat')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        {{-- HEADER --}}
        <div class="card-header bg-white py-3">

            <h5 class="mb-0 fw-bold text-primary">
                <i class="bi bi-person-plus-fill me-2"></i>
                Tambah Masyarakat
            </h5>

        </div>


        {{-- FORM --}}
        <form
            action="{{ route('admin.masyarakat.store') }}"
            method="POST"
        >

            @csrf


            <div class="card-body">

                {{-- ERROR --}}
                @if($errors->any())

                    <div class="alert alert-danger">

                        <div class="fw-bold mb-2">

                            <i class="bi bi-exclamation-triangle-fill me-1"></i>

                            Terjadi kesalahan:

                        </div>

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <div class="row g-3">

                    {{-- NAMA --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                        >

                    </div>


                    {{-- EMAIL --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                            required
                        >

                    </div>


                    {{-- NOMOR HP --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nomor HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-control"
                            value="{{ old('no_hp') }}"
                            placeholder="08xxxxxxxxxx"
                        >

                    </div>


                    {{-- PASSWORD --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Password
                        </label>

                        <div class="input-group">

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Minimal 6 karakter"
                                required
                            >

                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                onclick="togglePassword('password', 'iconPassword')"
                                title="Lihat password"
                            >

                                <i
                                    class="bi bi-eye"
                                    id="iconPassword"
                                ></i>

                            </button>

                        </div>

                    </div>


                    {{-- KONFIRMASI PASSWORD --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Konfirmasi Password
                        </label>

                        <div class="input-group">

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                placeholder="Ulangi password"
                                required
                            >

                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                onclick="togglePassword(
                                    'password_confirmation',
                                    'iconPasswordConfirmation'
                                )"
                                title="Lihat konfirmasi password"
                            >

                                <i
                                    class="bi bi-eye"
                                    id="iconPasswordConfirmation"
                                ></i>

                            </button>

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <div class="form-control bg-light">

                            <span class="badge bg-success">

                                <i class="bi bi-check-circle-fill me-1"></i>

                                Disetujui

                            </span>

                            <small class="text-muted ms-2">
                                Otomatis disetujui oleh admin
                            </small>

                        </div>

                    </div>


                    {{-- ALAMAT --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="4"
                            placeholder="Masukkan alamat lengkap"
                        >{{ old('alamat') }}</textarea>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="card-footer bg-white d-flex justify-content-between">

                <a
                    href="{{ route('admin.masyarakat.index') }}"
                    class="btn btn-light border"
                >

                    <i class="bi bi-arrow-left me-1"></i>

                    Kembali

                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-save me-1"></i>

                    Simpan Masyarakat

                </button>

            </div>

        </form>

    </div>

</div>


{{-- =====================================================
     JAVASCRIPT LIHAT PASSWORD
===================================================== --}}

<script>

    function togglePassword(inputId, iconId) {

        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {

            input.type = "text";

            icon.classList.remove("bi-eye");

            icon.classList.add("bi-eye-slash");

        } else {

            input.type = "password";

            icon.classList.remove("bi-eye-slash");

            icon.classList.add("bi-eye");

        }

    }

</script>

@endsection
