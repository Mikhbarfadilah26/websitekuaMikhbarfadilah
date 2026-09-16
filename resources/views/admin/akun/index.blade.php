@extends('layouts.appadmin')

@section('title', 'Akun Saya')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
     HEADER
====================================================== --}}
    <div class="akun-header shadow-sm">

        <div>

            <div class="akun-header-title">

                <i class="bi bi-person-circle me-2"></i>

                Akun Saya

            </div>

            <div class="akun-header-subtitle">

                Kelola informasi akun dan profil administrator

            </div>

        </div>

    </div>


    {{-- =====================================================
     SUCCESS
====================================================== --}}
    @if(session('success'))

    <div class="success-popup" id="successPopup">

        <div class="success-icon">

            <i class="bi bi-check-lg"></i>

        </div>

        <div>

            <div class="success-title">
                Berhasil
            </div>

            <div class="success-text">
                {{ session('success') }}
            </div>

        </div>

    </div>

    @endif


    {{-- =====================================================
     VALIDATION ERROR
====================================================== --}}
    @if($errors->any())

    <div class="alert alert-danger border-0 shadow-sm mt-4">

        <div class="fw-bold mb-2">

            <i class="bi bi-exclamation-triangle-fill me-1"></i>

            Terjadi kesalahan

        </div>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif


    {{-- =====================================================
     PROFILE CARD
====================================================== --}}
    <div class="row g-4 mt-1">

        {{-- PROFIL --}}
        <div class="col-lg-4">

            <div class="card profile-card border-0 shadow-sm">

                <div class="card-body text-center p-4">

                    <div class="profile-avatar">

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <h5 class="profile-name mt-3 mb-1">

                        {{ auth()->user()->nama
                        ?? auth()->user()->name
                        ?? 'Administrator' }}

                    </h5>

                    <div class="profile-role">

                        <i class="bi bi-shield-check me-1"></i>

                        {{ ucfirst(auth()->user()->role ?? 'Admin') }}

                    </div>

                    <div class="profile-line"></div>

                    <div class="profile-info">

                        <div class="profile-info-item">

                            <i class="bi bi-envelope-fill"></i>

                            <span>
                                {{ auth()->user()->email ?? '-' }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- FORM AKUN --}}
        <div class="col-lg-8">

            <div class="card account-card border-0 shadow-sm">

                <div class="card-header account-card-header">

                    <div>

                        <div class="account-title">

                            <i class="bi bi-pencil-square me-2"></i>

                            Informasi Akun

                        </div>

                        <div class="account-subtitle">

                            Perbarui data akun administrator

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.akun.update') }}"
                        method="POST">

                        @csrf
                        @method('PUT')


                        {{-- NAMA --}}
                        <div class="mb-4">

                            <label class="form-label">

                                <i class="bi bi-person me-1"></i>

                                Nama

                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control form-control-modern @error('nama') is-invalid @enderror"
                                value="{{ old('nama', auth()->user()->nama ?? auth()->user()->name ?? '') }}"
                                placeholder="Masukkan nama"
                                required>

                            @error('nama')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                            @enderror

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-4">

                            <label class="form-label">

                                <i class="bi bi-envelope me-1"></i>

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-modern @error('email') is-invalid @enderror"
                                value="{{ old('email', auth()->user()->email ?? '') }}"
                                placeholder="Masukkan email"
                                required>

                            @error('email')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                            @enderror

                        </div>


                        {{-- PASSWORD --}}
                        <div class="mb-4">

                            <label class="form-label">

                                <i class="bi bi-lock me-1"></i>

                                Password Baru

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-modern @error('password') is-invalid @enderror"
                                placeholder="Kosongkan jika tidak ingin mengubah password">

                            <div class="form-text">

                                Kosongkan jika password tidak ingin diubah.

                            </div>

                            @error('password')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                            @enderror

                        </div>


                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="mb-4">

                            <label class="form-label">

                                <i class="bi bi-lock-fill me-1"></i>

                                Konfirmasi Password Baru

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control form-control-modern"
                                placeholder="Ulangi password baru">

                        </div>


                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2">

                            <button
                                type="submit"
                                class="btn btn-save">

                                <i class="bi bi-check-lg me-1"></i>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

{{-- =====================================================
STYLE
====================================================== --}}

<style>
    .akun-header {

        background: linear-gradient(135deg,
                #0f172a 0%,
                #1e3a8a 55%,
                #2563eb 100%);

        border-radius: 16px;

        padding: 22px 26px;

        color: #fff;

    }

    .akun-header-title {

        font-size: 23px;

        font-weight: 700;

    }

    .akun-header-subtitle {

        margin-top: 5px;

        font-size: 14px;

        opacity: .85;

    }


    /* PROFILE */

    .profile-card {

        border-radius: 16px;

        overflow: hidden;

    }

    .profile-avatar {

        width: 95px;

        height: 95px;

        margin: 0 auto;

        border-radius: 50%;

        background: linear-gradient(135deg,
                #dbeafe,
                #bfdbfe);

        color: #2563eb;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 43px;

    }

    .profile-name {

        color: #1e293b;

        font-weight: 700;

    }

    .profile-role {

        display: inline-flex;

        align-items: center;

        padding: 6px 12px;

        border-radius: 20px;

        background: #eff6ff;

        color: #2563eb;

        font-size: 12px;

        font-weight: 600;

    }

    .profile-line {

        height: 1px;

        background: #e2e8f0;

        margin: 22px 0;

    }

    .profile-info {

        text-align: left;

    }

    .profile-info-item {

        display: flex;

        align-items: center;

        gap: 10px;

        color: #64748b;

        font-size: 13px;

        word-break: break-word;

    }

    .profile-info-item i {

        color: #2563eb;

        font-size: 16px;

    }


    /* ACCOUNT */

    .account-card {

        border-radius: 16px;

        overflow: hidden;

    }

    .account-card-header {

        background: #f8fafc;

        border-bottom: 1px solid #e2e8f0;

        padding: 18px 22px;

    }

    .account-title {

        color: #1e293b;

        font-size: 16px;

        font-weight: 700;

    }

    .account-subtitle {

        color: #94a3b8;

        font-size: 12px;

        margin-top: 3px;

    }


    /* FORM */

    .form-label {

        color: #334155;

        font-size: 13px;

        font-weight: 700;

        margin-bottom: 8px;

    }

    .form-label i {

        color: #2563eb;

    }

    .form-control-modern {

        min-height: 45px;

        border: 1px solid #dbe2ea;

        border-radius: 10px;

        padding: 10px 13px;

        color: #334155;

        font-size: 14px;

        box-shadow: none;

    }

    .form-control-modern:focus {

        border-color: #2563eb;

        box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);

    }


    /* BUTTON */

    .btn-save {

        border: none;

        border-radius: 10px;

        padding: 10px 18px;

        background: #2563eb;

        color: #fff;

        font-size: 13px;

        font-weight: 600;

        transition: .2s ease;

    }

    .btn-save:hover {

        background: #1d4ed8;

        color: #fff;

        transform: translateY(-1px);

    }


    /* SUCCESS POPUP */

    .success-popup {

        position: fixed;

        top: 50%;

        left: 50%;

        transform: translate(-50%, -50%);

        z-index: 9999;

        min-width: 330px;

        max-width: 90%;

        padding: 18px 22px;

        background: #fff;

        border-radius: 14px;

        box-shadow: 0 15px 50px rgba(15, 23, 42, .22);

        display: flex;

        align-items: center;

        gap: 14px;

        animation: popupShow .25s ease;

    }

    .success-icon {

        width: 43px;

        height: 43px;

        min-width: 43px;

        border-radius: 50%;

        background: #dcfce7;

        color: #16a34a;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;

    }

    .success-title {

        font-weight: 700;

        color: #166534;

    }

    .success-text {

        color: #64748b;

        font-size: 13px;

        margin-top: 2px;

    }

    @keyframes popupShow {

        from {

            opacity: 0;

            transform: translate(-50%, -46%);

        }

        to {

            opacity: 1;

            transform: translate(-50%, -50%);

        }

    }


    @media (max-width: 768px) {

        .akun-header {

            padding: 18px;

        }

        .akun-header-title {

            font-size: 19px;

        }

    }
</style>

{{-- =====================================================
POPUP SCRIPT
====================================================== --}}
@if(session('success'))

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const popup = document.getElementById('successPopup');

        if (popup) {

            setTimeout(function() {

                popup.style.opacity = '0';

                popup.style.transform =
                    'translate(-50%, -55%)';

                popup.style.transition =
                    'opacity .3s ease, transform .3s ease';

                setTimeout(function() {

                    popup.remove();

                }, 300);

            }, 2500);

        }

    });
</script>

@endif

@endsection