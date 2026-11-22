@extends('layouts.appmasyarakat')

@section('title', 'Profil Saya')

@section('content')

<style>
/* =========================================================
   PROFIL MASYARAKAT - PREMIUM BLUE
========================================================= */

.profil-page {
    width: 100%;
    padding: 8px 0 30px;
    font-family: 'Poppins', sans-serif;
}

.profil-header {
    margin-bottom: 20px;
}

.profil-header h3 {
    margin: 0;
    font-size: 24px;
    font-weight: 800;
    color: #17365c;
}

.profil-header h3 i {
    color: #2479ce;
}

.profil-header p {
    margin: 6px 0 0;
    font-size: 13px;
    color: #718198;
}

/* CARD */

.profil-card {
    width: 100%;
    background: #fff;
    border: 1px solid #e4ebf3;
    border-radius: 18px;
    box-shadow: 0 8px 28px rgba(22,58,102,.06);
    overflow: hidden;
    margin-bottom: 22px;
}

/* HEADER */

.profil-card-header {
    position: relative;
    overflow: hidden;
    padding: 22px 24px;
    background: linear-gradient(120deg, #123665, #1767b8, #1596c5);
    color: white;
}

.profil-card-header::after {
    content: "";
    position: absolute;
    width: 170px;
    height: 170px;
    border-radius: 50%;
    background: rgba(255,255,255,.07);
    right: -55px;
    top: -90px;
}

.profil-card-header h5 {
    position: relative;
    z-index: 1;
    margin: 0;
    font-size: 16px;
    font-weight: 800;
}

.profil-card-header h5 i {
    color: #a8eaff;
}

.profil-card-header p {
    position: relative;
    z-index: 1;
    margin: 5px 0 0;
    font-size: 12px;
    color: rgba(255,255,255,.82);
}

/* BODY */

.profil-card-body {
    padding: 25px;
}

/* USER INFORMATION */

.profil-user {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 20px;
    margin-bottom: 25px;
    border: 1px solid #e5edf7;
    border-radius: 16px;
    background: linear-gradient(135deg, #f5f9ff, #f1fbff);
}

/* FOTO PROFIL */

.profil-photo-wrapper {
    position: relative;
    flex-shrink: 0;
}

.profil-photo {
    width: 100px;
    height: 100px;
    border-radius: 24px;
    object-fit: cover;
    border: 4px solid white;
    box-shadow: 0 7px 18px rgba(32,117,197,.20);
}

.profil-avatar {
    width: 100px;
    height: 100px;
    min-width: 100px;
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #174b8a, #268ce0, #20b6cf);
    color: white;
    font-size: 34px;
    font-weight: 800;
    text-transform: uppercase;
    box-shadow: 0 7px 18px rgba(32,117,197,.22);
}

.profil-user-info {
    min-width: 0;
}

.profil-user-info h4 {
    margin: 0 0 8px;
    font-size: 18px;
    font-weight: 800;
    color: #1e3552;
    word-break: break-word;
}

.profil-user-info span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 11px;
    border-radius: 30px;
    background: #e1f0ff;
    color: #1765b0;
    font-size: 11px;
    font-weight: 700;
}

/* FOTO UPLOAD */

.profil-photo-section {
    padding: 20px;
    margin-bottom: 25px;
    background: #f8fbff;
    border: 1px dashed #b7cde4;
    border-radius: 15px;
}

.profil-photo-section h6 {
    margin: 0 0 7px;
    color: #244568;
    font-size: 14px;
    font-weight: 800;
}

.profil-photo-section p {
    margin: 0 0 15px;
    color: #718198;
    font-size: 12px;
}

.profil-photo-preview {
    display: none;
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 20px;
    margin-bottom: 15px;
    border: 4px solid white;
    box-shadow: 0 5px 15px rgba(0,0,0,.08);
}

.profil-photo-buttons {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.btn-foto-pilih {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border-radius: 9px;
    background: #e7f2ff;
    border: 1px solid #c5def7;
    color: #1765b0;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s;
}

.btn-foto-pilih:hover {
    background: #d7eaff;
    color: #124c88;
}

.btn-foto-hapus {
    display: none;
    align-items: center;
    gap: 6px;
    padding: 10px 14px;
    border-radius: 9px;
    background: #fff0f0;
    border: 1px solid #ffd1d1;
    color: #c63c3c;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
}

.btn-foto-hapus:hover {
    background: #ffe1e1;
}

.profil-photo-input {
    display: none;
}

.profil-photo-name {
    display: block;
    margin-top: 10px;
    font-size: 11px;
    color: #718198;
    word-break: break-word;
}

/* FORM */

.profil-form-group {
    margin-bottom: 19px;
}

.profil-form-label {
    display: block;
    margin-bottom: 8px;
    color: #344861;
    font-size: 13px;
    font-weight: 700;
}

.profil-form-label i {
    color: #3585ce;
    margin-right: 5px;
}

.profil-form-control {
    width: 100%;
    min-height: 46px;
    padding: 11px 14px;
    border: 1px solid #dce6f0;
    border-radius: 10px;
    background: #fbfdff;
    color: #24364d;
    font-size: 13px;
    outline: none;
    transition: all .25s ease;
}

.profil-form-control::placeholder {
    color: #a0adbd;
}

.profil-form-control:hover {
    border-color: #b8d3ed;
}

.profil-form-control:focus {
    border-color: #2683d3;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(37,126,208,.10);
}

textarea.profil-form-control {
    min-height: 110px;
    resize: vertical;
}

/* BUTTON SIMPAN */

.btn-profil-save {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border: none;
    border-radius: 10px;
    padding: 12px 20px;
    background: linear-gradient(135deg, #1758a5, #2386d6, #159fc7);
    color: white;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 6px 15px rgba(35,116,190,.17);
    transition: all .25s ease;
}

.btn-profil-save:hover {
    background: linear-gradient(135deg, #12477f, #176bb5);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(35,116,190,.24);
}

.btn-profil-save:active {
    transform: translateY(0);
}

/* ALERT */

.profil-alert {
    border-radius: 10px;
    font-size: 13px;
    margin-bottom: 18px;
    padding: 13px 16px;
}

.profil-error {
    margin-top: 6px;
    color: #dc3545;
    font-size: 11px;
}

/* RESPONSIVE */

@media (max-width: 767px) {

    .profil-page {
        padding: 5px 0 20px;
    }

    .profil-header h3 {
        font-size: 21px;
    }

    .profil-header p {
        font-size: 12px;
    }

    .profil-card {
        border-radius: 15px;
    }

    .profil-card-header {
        padding: 17px;
    }

    .profil-card-body {
        padding: 17px;
    }

    .profil-user {
        padding: 15px;
        gap: 12px;
        border-radius: 13px;
    }

    .profil-photo,
    .profil-avatar {
        width: 72px;
        height: 72px;
        min-width: 72px;
        border-radius: 18px;
    }

    .profil-avatar {
        font-size: 25px;
    }

    .profil-user-info h4 {
        font-size: 16px;
    }

    .profil-form-control {
        min-height: 44px;
        font-size: 13px;
    }

    textarea.profil-form-control {
        min-height: 100px;
    }

    .btn-profil-save {
        width: 100%;
    }

    .profil-photo-section {
        padding: 15px;
    }
}
</style>


<div class="container-fluid profil-page">

    {{-- HEADER --}}

    <div class="profil-header">
        <h3>
            <i class="bi bi-person-circle me-2"></i>
            Profil Saya
        </h3>

        <p>
            Kelola informasi akun dan data pribadi Anda.
        </p>
    </div>


    {{-- SUCCESS --}}

    @if(session('success'))
        <div class="alert alert-success profil-alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- SUCCESS PASSWORD --}}

    @if(session('success_password'))
        <div class="alert alert-success profil-alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success_password') }}
        </div>
    @endif


    {{-- ERROR --}}

    @if($errors->any())
        <div class="alert alert-danger profil-alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            Terdapat data yang belum benar. Silakan periksa kembali.
        </div>
    @endif


    {{-- CARD PROFIL --}}

    <div class="profil-card">

        {{-- HEADER CARD --}}

        <div class="profil-card-header">
            <h5>
                <i class="bi bi-person-vcard me-2"></i>
                Informasi Profil
            </h5>

            <p>
                Informasi akun masyarakat
            </p>
        </div>


        {{-- BODY --}}

        <div class="profil-card-body">


            {{-- IDENTITAS USER --}}

            <div class="profil-user">

                <div class="profil-photo-wrapper">

                    @if($user->foto && file_exists(public_path('storage/' . $user->foto)))

                        <img
                            src="{{ asset('storage/' . $user->foto) }}"
                            class="profil-photo"
                            alt="Foto Profil"
                            id="profilFotoUtama"
                        >

                    @else

                        <div class="profil-avatar" id="profilAvatar">
                            {{ strtoupper(substr($user->nama ?? 'M', 0, 1)) }}
                        </div>

                    @endif

                </div>


                <div class="profil-user-info">

                    <h4>{{ $user->nama }}</h4>

                    <span>
                        <i class="bi bi-shield-check"></i>
                        Masyarakat
                    </span>

                </div>

            </div>


            {{-- FORM PROFIL --}}

            <form
                action="{{ route('masyarakat.profil.update') }}"
                method="POST"
                enctype="multipart/form-data"
                id="formProfilMasyarakat"
            >

                @csrf
                @method('PUT')


                {{-- FOTO PROFIL --}}

                <div class="profil-photo-section">

                    <h6>
                        <i class="bi bi-camera-fill me-2"></i>
                        Foto Profil
                    </h6>

                    <p>
                        Pilih foto terbaik untuk profil akun Anda.
                        JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </p>


                    {{-- PREVIEW FOTO --}}

                    <img
                        src=""
                        id="previewFotoProfil"
                        class="profil-photo-preview"
                        alt="Preview Foto Profil"
                    >


                    {{-- INPUT FOTO --}}

                    <input
                        type="file"
                        name="foto"
                        id="inputFotoProfil"
                        class="profil-photo-input"
                        accept="image/jpeg,image/png,image/webp"
                    >


                    {{-- BUTTON FOTO --}}

                    <div class="profil-photo-buttons">

                        <label
                            for="inputFotoProfil"
                            class="btn-foto-pilih"
                        >
                            <i class="bi bi-image"></i>
                            Pilih Foto
                        </label>

                        <button
                            type="button"
                            class="btn-foto-hapus"
                            id="btnHapusPreviewFoto"
                        >
                            <i class="bi bi-x-circle"></i>
                            Batalkan Foto
                        </button>

                    </div>


                    <span
                        class="profil-photo-name"
                        id="namaFileFoto"
                    >
                </div>


                {{-- NAMA --}}

                <div class="profil-form-group">

                    <label for="nama" class="profil-form-label">
                        <i class="bi bi-person"></i>
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        class="profil-form-control"
                        value="{{ old('nama', $user->nama) }}"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                    @error('nama')
                        <div class="profil-error">{{ $message }}</div>
                    @enderror

                </div>


                {{-- EMAIL --}}

                <div class="profil-form-group">

                    <label for="email" class="profil-form-label">
                        <i class="bi bi-envelope"></i>
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="profil-form-control"
                        value="{{ old('email', $user->email) }}"
                        placeholder="Masukkan email"
                        required
                    >

                    @error('email')
                        <div class="profil-error">{{ $message }}</div>
                    @enderror

                </div>


                {{-- NOMOR HP --}}

                <div class="profil-form-group">

                    <label for="no_hp" class="profil-form-label">
                        <i class="bi bi-telephone"></i>
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        id="no_hp"
                        name="no_hp"
                        class="profil-form-control"
                        value="{{ old('no_hp', $user->no_hp) }}"
                        placeholder="Masukkan nomor HP"
                    >

                    @error('no_hp')
                        <div class="profil-error">{{ $message }}</div>
                    @enderror

                </div>


                {{-- ALAMAT --}}

                <div class="profil-form-group">

                    <label for="alamat" class="profil-form-label">
                        <i class="bi bi-geo-alt"></i>
                        Alamat
                    </label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        class="profil-form-control"
                        placeholder="Masukkan alamat lengkap"
                    >{{ old('alamat', $user->alamat) }}</textarea>

                    @error('alamat')
                        <div class="profil-error">{{ $message }}</div>
                    @enderror

                </div>


                {{-- ERROR FOTO --}}

                @error('foto')
                    <div class="profil-error mb-3">
                        {{ $message }}
                    </div>
                @enderror


                {{-- BUTTON SIMPAN --}}

                <button
                    type="submit"
                    class="btn-profil-save"
                >
                    <i class="bi bi-save2"></i>
                    Simpan Perubahan
                </button>

            </form>

        </div>

    </div>

</div>


{{-- =====================================================
     PREVIEW FOTO
===================================================== --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const inputFoto = document.getElementById('inputFotoProfil');
    const previewFoto = document.getElementById('previewFotoProfil');
    const tombolHapus = document.getElementById('btnHapusPreviewFoto');
    const namaFile = document.getElementById('namaFileFoto');

    let objectURL = null;

    inputFoto.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        // Validasi tipe file
        const tipeValid = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!tipeValid.includes(file.type)) {

            alert('Format foto harus JPG, PNG, atau WEBP.');

            this.value = '';

            previewFoto.style.display = 'none';
            tombolHapus.style.display = 'none';
            namaFile.textContent = '';

            return;
        }

        // Validasi ukuran maksimal 2 MB
        if (file.size > 2 * 1024 * 1024) {

            alert('Ukuran foto maksimal 2 MB.');

            this.value = '';

            previewFoto.style.display = 'none';
            tombolHapus.style.display = 'none';
            namaFile.textContent = '';

            return;
        }

        // Hapus preview sebelumnya
        if (objectURL) {
            URL.revokeObjectURL(objectURL);
        }

        objectURL = URL.createObjectURL(file);

        previewFoto.src = objectURL;
        previewFoto.style.display = 'block';

        tombolHapus.style.display = 'inline-flex';

        namaFile.textContent = 'Foto dipilih: ' + file.name;

    });


    // Batalkan foto yang baru dipilih
    tombolHapus.addEventListener('click', function () {

        inputFoto.value = '';

        previewFoto.src = '';
        previewFoto.style.display = 'none';

        tombolHapus.style.display = 'none';

        namaFile.textContent = '';

        if (objectURL) {
            URL.revokeObjectURL(objectURL);
            objectURL = null;
        }

    });

});
</script>

@endsection