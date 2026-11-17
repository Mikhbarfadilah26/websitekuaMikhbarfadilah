
@extends('layouts.appadmin')

@section('title', 'Akun Saya')

@section('content')

@php
    $admin = auth()->user();

    $fotoAdmin = $admin->foto && file_exists(public_path($admin->foto))
        ? asset($admin->foto)
        : asset('7.png');
@endphp

<div class="container-fluid">

    {{-- HEADER --}}
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

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mt-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- VALIDATION ERROR --}}
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

    <div class="row g-4 mt-1">

        {{-- KARTU PROFIL --}}
        <div class="col-lg-4">

            <div class="card profile-card border-0 shadow-sm">
                <div class="card-body text-center p-4">

                    <div class="profile-avatar-wrapper">

                        <img
                            src="{{ $fotoAdmin }}"
                            alt="Foto Profil Administrator"
                            id="profilePreview"
                            class="profile-avatar"
                        >

                    </div>

                    <h5 class="profile-name mt-3 mb-1">
                        {{ $admin->nama ?? $admin->name ?? 'Administrator' }}
                    </h5>

                    <div class="profile-role">
                        <i class="bi bi-shield-check me-1"></i>
                        {{ ucfirst($admin->role ?? 'Admin') }}
                    </div>

                    <div class="profile-line"></div>

                    <div class="profile-info">

                        <div class="profile-info-item">
                            <i class="bi bi-envelope-fill"></i>
                            <span>{{ $admin->email ?? '-' }}</span>
                        </div>

                    </div>

                    <div class="profile-hint mt-4">
                        <i class="bi bi-info-circle me-1"></i>
                        Foto profil administrator
                    </div>

                </div>
            </div>

        </div>

        {{-- FORM AKUN --}}
        <div class="col-lg-8">

            <div class="card account-card border-0 shadow-sm">

                <div class="card-header account-card-header">
                    <div class="account-title">
                        <i class="bi bi-pencil-square me-2"></i>
                        Informasi Akun
                    </div>

                    <div class="account-subtitle">
                        Perbarui data dan foto profil administrator
                    </div>
                </div>

                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.akun.update') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf
                        @method('PUT')

                        {{-- FOTO PROFIL --}}
                        <div class="mb-4">

                            <label class="form-label">
                                <i class="bi bi-image me-1"></i>
                                Foto Profil
                            </label>

                            <div class="photo-upload-area">

                                <div class="photo-upload-preview">
                                    <img
                                        src="{{ $fotoAdmin }}"
                                        alt="Pratinjau Foto"
                                        id="uploadPreview"
                                    >
                                </div>

                                <div class="photo-upload-content">

                                    <div class="photo-upload-title">
                                        Unggah Foto Profil
                                    </div>

                                    <div class="photo-upload-description">
                                        Pilih foto dengan format JPG, JPEG, PNG, atau WEBP.
                                        Maksimal ukuran 2 MB.
                                    </div>

                                    <label for="foto" class="btn btn-photo">
                                        <i class="bi bi-cloud-arrow-up me-1"></i>
                                        Pilih Foto
                                    </label>

                                    <input
                                        type="file"
                                        name="foto"
                                        id="foto"
                                        class="d-none @error('foto') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                    >

                                    <div id="fileName" class="file-name mt-2">
                                        Belum ada foto yang dipilih
                                    </div>

                                    @error('foto')
                                        <div class="text-danger small mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="form-divider"></div>

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
                                value="{{ old('nama', $admin->nama ?? $admin->name ?? '') }}"
                                placeholder="Masukkan nama"
                                required
                            >

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
                                value="{{ old('email', $admin->email ?? '') }}"
                                placeholder="Masukkan email"
                                required
                            >

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
                                placeholder="Kosongkan jika tidak ingin mengubah password"
                                autocomplete="new-password"
                            >

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
                                placeholder="Ulangi password baru"
                                autocomplete="new-password"
                            >

                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-end gap-2">

                            <button type="submit" class="btn btn-save">
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

{{-- STYLE --}}
<style>

    :root {
        --kua-green-dark: #285b46;
        --kua-green: #39765b;
        --kua-green-medium: #6c9b7d;
        --kua-green-soft: #eaf2ec;
        --kua-green-light: #f3f7f3;
        --kua-green-border: #dce8de;
        --kua-text: #34483c;
        --kua-muted: #7b8c80;
    }

    /* HEADER */

    .akun-header {
        background: linear-gradient(
            135deg,
            #285b46 0%,
            #39765b 55%,
            #6c9b7d 100%
        );
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
        opacity: .88;
    }

    /* PROFILE */

    .profile-card {
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
    }

    .profile-avatar-wrapper {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        border-radius: 50%;
        padding: 5px;
        background: var(--kua-green-soft);
        border: 2px solid var(--kua-green-border);
    }

    .profile-avatar {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        background: var(--kua-green-light);
    }

    .profile-name {
        color: var(--kua-text);
        font-weight: 700;
    }

    .profile-role {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 20px;
        background: var(--kua-green-soft);
        color: var(--kua-green-dark);
        font-size: 12px;
        font-weight: 600;
    }

    .profile-line {
        height: 1px;
        background: var(--kua-green-border);
        margin: 22px 0;
    }

    .profile-info {
        text-align: left;
    }

    .profile-info-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--kua-muted);
        font-size: 13px;
        word-break: break-word;
    }

    .profile-info-item i {
        color: var(--kua-green);
        font-size: 16px;
    }

    .profile-hint {
        color: var(--kua-muted);
        font-size: 12px;
    }

    /* ACCOUNT */

    .account-card {
        border-radius: 16px;
        overflow: hidden;
    }

    .account-card-header {
        background: var(--kua-green-light);
        border-bottom: 1px solid var(--kua-green-border);
        padding: 18px 22px;
    }

    .account-title {
        color: var(--kua-green-dark);
        font-size: 16px;
        font-weight: 700;
    }

    .account-subtitle {
        color: var(--kua-muted);
        font-size: 12px;
        margin-top: 3px;
    }

    /* FOTO UPLOAD */

    .photo-upload-area {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 18px;
        background: var(--kua-green-light);
        border: 1px dashed #b9d0bf;
        border-radius: 13px;
    }

    .photo-upload-preview {
        width: 90px;
        height: 90px;
        min-width: 90px;
        border-radius: 50%;
        overflow: hidden;
        background: var(--kua-green-soft);
        border: 3px solid #fff;
        box-shadow: 0 2px 10px rgba(40, 91, 70, .12);
    }

    .photo-upload-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .photo-upload-content {
        flex: 1;
        min-width: 0;
    }

    .photo-upload-title {
        color: var(--kua-text);
        font-size: 14px;
        font-weight: 700;
    }

    .photo-upload-description {
        color: var(--kua-muted);
        font-size: 12px;
        line-height: 1.6;
        margin: 5px 0 10px;
    }

    .btn-photo {
        background: var(--kua-green);
        color: #fff;
        border-radius: 8px;
        padding: 8px 13px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-photo:hover {
        background: var(--kua-green-dark);
        color: #fff;
    }

    .file-name {
        color: var(--kua-muted);
        font-size: 11px;
        word-break: break-word;
    }

    .form-divider {
        height: 1px;
        background: var(--kua-green-border);
        margin: 24px 0;
    }

    /* FORM */

    .form-label {
        color: var(--kua-text);
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-label i {
        color: var(--kua-green);
    }

    .form-control-modern {
        min-height: 45px;
        border: 1px solid var(--kua-green-border);
        border-radius: 10px;
        padding: 10px 13px;
        color: var(--kua-text);
        font-size: 14px;
        box-shadow: none;
    }

    .form-control-modern:focus {
        border-color: var(--kua-green-medium);
        box-shadow: 0 0 0 3px rgba(57, 118, 91, .10);
    }

    .form-text {
        color: var(--kua-muted);
        font-size: 11px;
        margin-top: 7px;
    }

    /* BUTTON */

    .btn-save {
        border: none;
        border-radius: 10px;
        padding: 11px 19px;
        background: var(--kua-green);
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-save:hover {
        background: var(--kua-green-dark);
        color: #fff;
        transform: translateY(-1px);
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .akun-header {
            padding: 18px;
        }

        .akun-header-title {
            font-size: 19px;
        }

        .photo-upload-area {
            align-items: flex-start;
            gap: 13px;
            padding: 13px;
        }

        .photo-upload-preview {
            width: 70px;
            height: 70px;
            min-width: 70px;
        }

        .account-card .card-body {
            padding: 18px !important;
        }

    }

    @media (max-width: 420px) {

        .photo-upload-area {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .photo-upload-content {
            width: 100%;
        }

    }

</style>

{{-- PREVIEW FOTO --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const inputFoto = document.getElementById('foto');
    const previewProfil = document.getElementById('profilePreview');
    const previewUpload = document.getElementById('uploadPreview');
    const fileName = document.getElementById('fileName');

    if (!inputFoto) return;

    inputFoto.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');
            this.value = '';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran foto maksimal 2 MB.');
            this.value = '';
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {
            previewProfil.src = event.target.result;
            previewUpload.src = event.target.result;
        };

        reader.readAsDataURL(file);

        fileName.textContent = file.name;

    });

});
</script>

@endsection
