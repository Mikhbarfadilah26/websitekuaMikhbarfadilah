
@extends('layouts.appadmin')

@section('title', 'Tambah Layanan')

@section('content')

<style>

/* =========================================================
   HEADER
========================================================= */

.form-header {
    background: linear-gradient(
        135deg,
        #0f172a 0%,
        #1e3a8a 100%
    );

    border-radius: 16px;

    padding: 24px 28px;

    color: #ffffff;

    margin-bottom: 22px;

    box-shadow: 0 8px 24px rgba(15, 23, 42, .15);
}

.form-header-title {

    font-size: 24px;

    font-weight: 700;

    margin-bottom: 5px;
}

.form-header-subtitle {

    font-size: 14px;

    color: rgba(255,255,255,.80);
}


/* =========================================================
   CARD
========================================================= */

.form-card {

    background: #ffffff;

    border: 1px solid #e5e7eb;

    border-radius: 16px;

    box-shadow: 0 5px 18px rgba(15, 23, 42, .07);

    overflow: hidden;
}

.form-card-header {

    padding: 18px 22px;

    border-bottom: 1px solid #e5e7eb;

    background: #f8fafc;
}

.form-card-title {

    color: #1e293b;

    font-size: 17px;

    font-weight: 700;

    margin: 0;
}

.form-card-subtitle {

    color: #64748b;

    font-size: 13px;

    margin-top: 3px;
}

.form-card-body {

    padding: 25px;
}


/* =========================================================
   LABEL
========================================================= */

.form-label-custom {

    display: block;

    margin-bottom: 7px;

    color: #334155;

    font-size: 14px;

    font-weight: 700;
}

.required {

    color: #dc2626;
}


/* =========================================================
   INPUT
========================================================= */

.form-control-custom {

    width: 100%;

    padding: 11px 13px;

    border: 1px solid #dbe1e8;

    border-radius: 10px;

    color: #334155;

    background: #ffffff;

    font-size: 14px;

    outline: none;

    transition: .2s;
}

.form-control-custom:focus {

    border-color: #2563eb;

    box-shadow:
        0 0 0 3px rgba(37,99,235,.10);
}

textarea.form-control-custom {

    min-height: 220px;

    resize: vertical;

    line-height: 1.7;
}


/* =========================================================
   SLUG
========================================================= */

.slug-wrapper {

    position: relative;
}

.slug-prefix {

    position: absolute;

    left: 13px;

    top: 50%;

    transform: translateY(-50%);

    color: #94a3b8;

    font-size: 13px;

    pointer-events: none;
}

.slug-input {

    padding-left: 88px;
}

.slug-info {

    margin-top: 6px;

    color: #64748b;

    font-size: 12px;
}


/* =========================================================
   FOTO
========================================================= */

.photo-upload-box {

    border: 2px dashed #cbd5e1;

    border-radius: 12px;

    padding: 22px;

    background: #f8fafc;

    text-align: center;

    cursor: pointer;

    transition: .2s;
}

.photo-upload-box:hover {

    border-color: #3b82f6;

    background: #eff6ff;
}

.photo-upload-icon {

    width: 55px;

    height: 55px;

    display: flex;

    align-items: center;

    justify-content: center;

    margin: 0 auto 10px;

    border-radius: 50%;

    background: #dbeafe;

    color: #2563eb;

    font-size: 24px;
}

.photo-upload-title {

    color: #334155;

    font-size: 14px;

    font-weight: 700;

    margin-bottom: 4px;
}

.photo-upload-info {

    color: #64748b;

    font-size: 12px;
}


/* =========================================================
   PREVIEW
========================================================= */

.photo-preview-wrapper {

    display: none;

    margin-top: 15px;

    padding: 12px;

    border: 1px solid #e2e8f0;

    border-radius: 10px;

    background: #f8fafc;
}

.photo-preview {

    width: 180px;

    height: 120px;

    object-fit: cover;

    border-radius: 9px;

    border: 1px solid #cbd5e1;
}


/* =========================================================
   ERROR
========================================================= */

.invalid-feedback-custom {

    display: block;

    margin-top: 6px;

    color: #dc2626;

    font-size: 12px;
}

.input-error {

    border-color: #dc2626 !important;
}


/* =========================================================
   BUTTON
========================================================= */

.form-actions {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 10px;

    padding: 20px 25px;

    border-top: 1px solid #e5e7eb;

    background: #f8fafc;
}

.btn-kembali {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 10px 17px;

    border: 1px solid #cbd5e1;

    border-radius: 9px;

    background: #ffffff;

    color: #475569;

    font-size: 14px;

    font-weight: 600;

    text-decoration: none;
}

.btn-kembali:hover {

    background: #f1f5f9;

    color: #334155;

    text-decoration: none;
}

.btn-simpan {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 10px 19px;

    border: none;

    border-radius: 9px;

    background: #2563eb;

    color: #ffffff;

    font-size: 14px;

    font-weight: 700;

    cursor: pointer;
}

.btn-simpan:hover {

    background: #1d4ed8;
}


/* =========================================================
   ALERT ERROR
========================================================= */

.error-alert {

    margin-bottom: 20px;

    padding: 13px 16px;

    border: 1px solid #fecaca;

    border-radius: 10px;

    background: #fef2f2;

    color: #991b1b;

    font-size: 13px;
}

.error-alert strong {

    display: block;

    margin-bottom: 5px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .form-header {

        padding: 20px;
    }

    .form-header-title {

        font-size: 20px;
    }

    .form-card-body {

        padding: 18px;
    }

    .form-actions {

        padding: 17px;

        flex-direction: column-reverse;

        align-items: stretch;
    }

    .btn-kembali,
    .btn-simpan {

        justify-content: center;

        width: 100%;
    }

}

</style>


<div class="container-fluid">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="form-header">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>

                <div class="form-header-title">

                    <i class="bi bi-plus-circle me-2"></i>

                    Tambah Layanan

                </div>

                <div class="form-header-subtitle">

                    Tambahkan informasi layanan baru untuk website
                    KUA Karang Baru.

                </div>

            </div>


            <a
                href="{{ route('admin.layanan.index') }}"
                class="btn-kembali">

                <i class="bi bi-arrow-left"></i>

                Kembali

            </a>

        </div>

    </div>



    {{-- =====================================================
         VALIDATION ERROR
    ====================================================== --}}

    @if($errors->any())

        <div class="error-alert">

            <strong>

                <i class="bi bi-exclamation-triangle me-1"></i>

                Periksa kembali data yang diisi.

            </strong>

            <ul class="mb-0 ps-3">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="form-card">


        {{-- CARD HEADER --}}

        <div class="form-card-header">

            <div class="form-card-title">

                Informasi Layanan

            </div>

            <div class="form-card-subtitle">

                Isi informasi layanan secara lengkap.

            </div>

        </div>



        {{-- =================================================
             FORM
        ================================================== --}}

        <form
            action="{{ route('admin.layanan.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf


            <div class="form-card-body">


                <div class="row g-4">


                    {{-- =================================================
                         JUDUL
                    ================================================== --}}

                    <div class="col-md-12">

                        <label
                            for="judul"
                            class="form-label-custom">

                            Judul Layanan

                            <span class="required">*</span>

                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            class="form-control-custom @error('judul') input-error @enderror"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Bimbingan Perkawinan"
                            maxlength="255"
                            required>

                        @error('judul')

                            <div class="invalid-feedback-custom">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    {{-- =================================================
                         SLUG
                    ================================================== --}}

                    <div class="col-md-12">

                        <label
                            for="slug"
                            class="form-label-custom">

                            Slug

                        </label>

                        <div class="slug-wrapper">

                            <span class="slug-prefix">

                                /layanan/

                            </span>

                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                class="form-control-custom slug-input @error('slug') input-error @enderror"
                                value="{{ old('slug') }}"
                                placeholder="bimbingan-perkawinan">

                        </div>

                        <div class="slug-info">

                            Slug akan digunakan sebagai identitas URL layanan.

                        </div>

                        @error('slug')

                            <div class="invalid-feedback-custom">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    {{-- =================================================
                         ISI
                    ================================================== --}}

                    <div class="col-md-12">

                        <label
                            for="isi"
                            class="form-label-custom">

                            Deskripsi / Isi Layanan

                            <span class="required">*</span>

                        </label>

                        <textarea
                            id="isi"
                            name="isi"
                            class="form-control-custom @error('isi') input-error @enderror"
                            placeholder="Tuliskan informasi lengkap mengenai layanan..."
                            required>{{ old('isi') }}</textarea>

                        @error('isi')

                            <div class="invalid-feedback-custom">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    {{-- =================================================
                         FOTO
                    ================================================== --}}

                    <div class="col-md-12">

                        <label
                            class="form-label-custom">

                            Foto Layanan

                        </label>


                        <label
                            for="foto"
                            class="photo-upload-box"
                            id="photoUploadBox">

                            <div class="photo-upload-icon">

                                <i class="bi bi-cloud-arrow-up"></i>

                            </div>

                            <div class="photo-upload-title">

                                Pilih Foto Layanan

                            </div>

                            <div class="photo-upload-info">

                                JPG, JPEG, PNG atau WEBP — maksimal 2 MB

                            </div>

                        </label>


                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="d-none">


                        {{-- PREVIEW --}}

                        <div
                            id="photoPreviewWrapper"
                            class="photo-preview-wrapper">

                            <div class="mb-2">

                                <strong class="small">

                                    Preview Foto

                                </strong>

                            </div>

                            <img
                                id="photoPreview"
                                src=""
                                alt="Preview"
                                class="photo-preview">

                        </div>


                        @error('foto')

                            <div class="invalid-feedback-custom">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>


                </div>

            </div>



            {{-- =================================================
                 FORM ACTION
            ================================================== --}}

            <div class="form-actions">

                <a
                    href="{{ route('admin.layanan.index') }}"
                    class="btn-kembali">

                    <i class="bi bi-x-lg"></i>

                    Batal

                </a>


                <button
                    type="submit"
                    class="btn-simpan">

                    <i class="bi bi-check-lg"></i>

                    Simpan Layanan

                </button>

            </div>

        </form>

    </div>

</div>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

/*
|--------------------------------------------------------------------------
| GENERATE SLUG
|--------------------------------------------------------------------------
*/

const judulInput =
    document.getElementById('judul');

const slugInput =
    document.getElementById('slug');


judulInput.addEventListener('input', function () {

    const slug =
        this.value

        .toLowerCase()

        .trim()

        .replace(/[^a-z0-9\s-]/g, '')

        .replace(/\s+/g, '-')

        .replace(/-+/g, '-');

    slugInput.value = slug;

});


/*
|--------------------------------------------------------------------------
| PREVIEW FOTO
|--------------------------------------------------------------------------
*/

const fotoInput =
    document.getElementById('foto');

const photoPreview =
    document.getElementById('photoPreview');

const photoPreviewWrapper =
    document.getElementById('photoPreviewWrapper');


fotoInput.addEventListener('change', function () {

    const file = this.files[0];

    if (!file) {

        photoPreviewWrapper.style.display = 'none';

        photoPreview.src = '';

        return;

    }


    /*
    |--------------------------------------------------------------------------
    | VALIDASI UKURAN
    |--------------------------------------------------------------------------
    */

    if (file.size > 2 * 1024 * 1024) {

        alert('Ukuran foto maksimal 2 MB.');

        this.value = '';

        photoPreviewWrapper.style.display = 'none';

        photoPreview.src = '';

        return;

    }


    /*
    |--------------------------------------------------------------------------
    | PREVIEW
    |--------------------------------------------------------------------------
    */

    const reader =
        new FileReader();

    reader.onload = function (event) {

        photoPreview.src =
            event.target.result;

        photoPreviewWrapper.style.display =
            'block';

    };

    reader.readAsDataURL(file);

});

</script>

@endsection
