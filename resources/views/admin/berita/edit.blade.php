
@extends('layouts.appadmin')

@section('title', 'Edit Berita')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="mb-4">

        <div class="d-flex align-items-center gap-3">

            {{-- KEMBALI --}}
            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-light border shadow-sm">

                <i class="bi bi-arrow-left"></i>

            </a>

            <div>

                <h3 class="fw-bold mb-1">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Berita

                </h3>

                <p class="text-muted mb-0">

                    Perbarui informasi berita KUA Karang Baru

                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
         POPUP ERROR
    ====================================================== --}}
    @if($errors->any())

        <div id="errorPopup"
             class="error-popup">

            <div class="error-icon">

                <i class="bi bi-exclamation-lg"></i>

            </div>

            <div>

                <div class="error-title">
                    Terjadi Kesalahan
                </div>

                <div class="error-message">

                    Silakan periksa data yang diisi.

                </div>

            </div>

            <button type="button"
                    class="btn-close ms-2"
                    onclick="closeErrorPopup()">
            </button>

        </div>

    @endif


    {{-- =====================================================
         FORM EDIT
    ====================================================== --}}
    <form
        action="{{ route('admin.berita.update', $berita->id) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @method('PUT')


        <div class="row g-4">


            {{-- =================================================
                 KOLOM KIRI
            ================================================== --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">


                    {{-- CARD HEADER --}}
                    <div class="card-header bg-white border-0 pt-4 px-4">

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-file-text me-2"></i>

                            Informasi Berita

                        </h5>

                    </div>


                    {{-- CARD BODY --}}
                    <div class="card-body px-4 pb-4">


                        {{-- =================================================
                             JUDUL
                        ================================================== --}}
                        <div class="mb-4">

                            <label
                                for="judul"
                                class="form-label fw-semibold">

                                Judul Berita

                                <span class="text-danger">
                                    *
                                </span>

                            </label>


                            <input
                                type="text"
                                name="judul"
                                id="judul"
                                class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $berita->judul) }}"
                                placeholder="Masukkan judul berita..."
                                autocomplete="off"
                                required>


                            @error('judul')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                             SLUG
                        ================================================== --}}
                        <div class="mb-4">

                            <label
                                for="slugPreview"
                                class="form-label fw-semibold">

                                Slug

                            </label>


                            <input
                                type="text"
                                id="slugPreview"
                                class="form-control bg-light"
                                value="{{ old('judul') ? \Illuminate\Support\Str::slug(old('judul')) : $berita->slug }}"
                                readonly>


                            <small class="text-muted">

                                Slug akan diperbarui otomatis berdasarkan judul.

                            </small>

                        </div>


                        {{-- =================================================
                             ISI BERITA
                        ================================================== --}}
                        <div class="mb-3">

                            <label
                                for="isi"
                                class="form-label fw-semibold">

                                Isi Berita

                                <span class="text-danger">
                                    *
                                </span>

                            </label>


                            <textarea
                                name="isi"
                                id="isi"
                                rows="16"
                                class="form-control @error('isi') is-invalid @enderror"
                                placeholder="Tulis isi berita di sini..."
                                required>{{ old('isi', $berita->isi) }}</textarea>


                            @error('isi')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <div class="small text-muted">

                            <i class="bi bi-info-circle me-1"></i>

                            Periksa kembali judul dan isi berita sebelum menyimpan perubahan.

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 KOLOM KANAN
            ================================================== --}}
            <div class="col-lg-4">


                {{-- =================================================
                     FOTO BERITA
                ================================================== --}}
                <div class="card border-0 shadow-sm">


                    {{-- HEADER --}}
                    <div class="card-header bg-white border-0 pt-4 px-4">

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-image me-2"></i>

                            Foto Berita

                        </h5>

                    </div>


                    {{-- BODY --}}
                    <div class="card-body px-4">


                        {{-- =================================================
                             PREVIEW FOTO
                        ================================================== --}}
                        <div class="preview-box mb-3">


                            @if($berita->foto)

                                <img
                                    id="previewFoto"
                                    src="{{ asset('berita/' . $berita->foto) }}"
                                    alt="{{ $berita->judul }}">


                                <div
                                    id="placeholderFoto"
                                    style="display:none;">

                                    <i class="bi bi-image"></i>

                                    <div class="mt-2">

                                        Belum ada foto

                                    </div>

                                </div>

                            @else

                                <img
                                    id="previewFoto"
                                    src=""
                                    alt="Preview Foto"
                                    style="display:none;">


                                <div id="placeholderFoto">

                                    <i class="bi bi-image"></i>

                                    <div class="mt-2">

                                        Belum ada foto

                                    </div>

                                </div>

                            @endif

                        </div>


                        {{-- =================================================
                             INPUT FOTO
                        ================================================== --}}
                        <label
                            for="foto"
                            class="form-label fw-semibold">

                            Ganti Foto

                        </label>


                        <input
                            type="file"
                            name="foto"
                            id="foto"
                            class="form-control @error('foto') is-invalid @enderror"
                            accept="image/jpeg,image/png,image/webp">


                        @error('foto')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror


                        <small class="text-muted d-block mt-2">

                            Kosongkan jika tidak ingin mengganti foto.

                            <br>

                            Format: JPG, JPEG, PNG, WEBP.

                            <br>

                            Maksimal ukuran: 2 MB.

                        </small>


                        {{-- NAMA FOTO LAMA --}}
                        @if($berita->foto)

                            <div class="mt-3 p-3 bg-light rounded">

                                <small class="text-muted d-block">

                                    Foto saat ini:

                                </small>

                                <span class="fw-semibold">

                                    {{ $berita->foto }}

                                </span>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- =================================================
                     TOMBOL SIMPAN
                ================================================== --}}
                <div class="card border-0 shadow-sm mt-4">

                    <div class="card-body">


                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="bi bi-check-circle me-1"></i>

                            Simpan Perubahan

                        </button>


                        <a
                            href="{{ route('admin.berita.index') }}"
                            class="btn btn-light border w-100 mt-2">

                            <i class="bi bi-x-circle me-1"></i>

                            Batal

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- =========================================================
     STYLE
========================================================= --}}
<style>

/* =========================================================
   PREVIEW FOTO
========================================================= */

.preview-box {

    width: 100%;

    height: 230px;

    border: 2px dashed #d1d5db;

    border-radius: 12px;

    background: #f8fafc;

    display: flex;

    align-items: center;

    justify-content: center;

    overflow: hidden;

    text-align: center;

    color: #94a3b8;

}

.preview-box i {

    font-size: 50px;

}

.preview-box img {

    width: 100%;

    height: 100%;

    object-fit: cover;

}


/* =========================================================
   POPUP ERROR
========================================================= */

.error-popup {

    position: fixed;

    top: 50%;

    left: 50%;

    transform: translate(-50%, -50%);

    z-index: 9999;

    min-width: 350px;

    max-width: 90%;

    background: #ffffff;

    border-radius: 15px;

    padding: 20px 25px;

    display: flex;

    align-items: center;

    gap: 15px;

    box-shadow: 0 15px 50px rgba(0, 0, 0, .20);

    animation: popupShow .35s ease;

}


/* ICON ERROR */

.error-icon {

    width: 45px;

    height: 45px;

    min-width: 45px;

    border-radius: 50%;

    background: #dc3545;

    color: #ffffff;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 24px;

}


/* TITLE */

.error-title {

    font-weight: 700;

    font-size: 16px;

}


/* MESSAGE */

.error-message {

    color: #6c757d;

    font-size: 14px;

    margin-top: 2px;

}


/* ANIMATION */

@keyframes popupShow {

    from {

        opacity: 0;

        transform: translate(-50%, -45%);

    }

    to {

        opacity: 1;

        transform: translate(-50%, -50%);

    }

}

</style>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       PREVIEW FOTO BARU
    ====================================================== */

    const fotoInput =
        document.getElementById('foto');

    const previewFoto =
        document.getElementById('previewFoto');

    const placeholderFoto =
        document.getElementById('placeholderFoto');


    if (fotoInput) {

        fotoInput.addEventListener('change', function (event) {

            const file = event.target.files[0];


            // Jika tidak memilih file
            if (!file) {

                return;

            }


            // =================================================
            // CEK UKURAN
            // =================================================

            if (file.size > 2 * 1024 * 1024) {

                alert('Ukuran foto maksimal 2 MB.');

                fotoInput.value = '';

                return;

            }


            // =================================================
            // CEK FORMAT
            // =================================================

            const allowedTypes = [

                'image/jpeg',

                'image/png',

                'image/webp'

            ];


            if (!allowedTypes.includes(file.type)) {

                alert(
                    'Format foto harus JPG, JPEG, PNG, atau WEBP.'
                );

                fotoInput.value = '';

                return;

            }


            // =================================================
            // TAMPILKAN PREVIEW
            // =================================================

            previewFoto.src =
                URL.createObjectURL(file);

            previewFoto.style.display = 'block';


            if (placeholderFoto) {

                placeholderFoto.style.display = 'none';

            }

        });

    }


    /* =====================================================
       SLUG PREVIEW
    ====================================================== */

    const judulInput =
        document.getElementById('judul');

    const slugPreview =
        document.getElementById('slugPreview');


    function buatSlug(text) {

        return text

            .toString()

            .toLowerCase()

            .trim()

            .replace(/[^\w\s-]/g, '')

            .replace(/[\s_-]+/g, '-')

            .replace(/^-+|-+$/g, '');

    }


    if (judulInput && slugPreview) {

        judulInput.addEventListener('input', function () {

            slugPreview.value =
                buatSlug(this.value);

        });

    }


    /* =====================================================
       POPUP ERROR OTOMATIS HILANG
    ====================================================== */

    const errorPopup =
        document.getElementById('errorPopup');


    if (errorPopup) {

        setTimeout(function () {

            errorPopup.style.transition =
                'all .3s ease';

            errorPopup.style.opacity = '0';

            errorPopup.style.transform =
                'translate(-50%, -55%)';


            setTimeout(function () {

                errorPopup.remove();

            }, 300);

        }, 4000);

    }

});


/* =========================================================
   CLOSE ERROR POPUP
========================================================= */

function closeErrorPopup() {

    const popup =
        document.getElementById('errorPopup');

    if (!popup) {

        return;

    }


    popup.style.transition =
        'all .3s ease';

    popup.style.opacity = '0';

    popup.style.transform =
        'translate(-50%, -55%)';


    setTimeout(function () {

        popup.remove();

    }, 300);

}

</script>

@endsection
