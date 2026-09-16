
@extends('layouts.appadmin')

@section('title', 'Tambah Berita')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="mb-4">

        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-light border shadow-sm">

                <i class="bi bi-arrow-left"></i>

            </a>

            <div>

                <h3 class="fw-bold mb-1">

                    <i class="bi bi-plus-circle me-2"></i>

                    Tambah Berita

                </h3>

                <p class="text-muted mb-0">

                    Tambahkan berita atau informasi terbaru KUA Karang Baru

                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
         ERROR VALIDASI
    ====================================================== --}}
    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-sm">

            <div class="fw-bold mb-2">

                <i class="bi bi-exclamation-triangle me-1"></i>

                Periksa kembali data berikut:

            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         FORM
    ====================================================== --}}
    <form
        action="{{ route('admin.berita.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf


        <div class="row g-4">


            {{-- =================================================
                 BAGIAN KIRI
            ================================================== --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white border-0 pt-4 px-4">

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-file-text me-2"></i>

                            Informasi Berita

                        </h5>

                    </div>


                    <div class="card-body px-4 pb-4">


                        {{-- =================================================
                             JUDUL
                        ================================================== --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

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
                                value="{{ old('judul') }}"
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
                             SLUG PREVIEW
                        ================================================== --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Slug

                            </label>


                            <input
                                type="text"
                                id="slugPreview"
                                class="form-control bg-light"
                                placeholder="Slug otomatis dibuat dari judul"
                                readonly>


                            <small class="text-muted">

                                Slug akan dibuat otomatis ketika berita disimpan.

                            </small>

                        </div>


                        {{-- =================================================
                             ISI BERITA
                        ================================================== --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Isi Berita

                                <span class="text-danger">
                                    *
                                </span>

                            </label>


                            <textarea
                                name="isi"
                                id="isi"
                                rows="15"
                                class="form-control @error('isi') is-invalid @enderror"
                                placeholder="Tulis isi berita di sini..."
                                required>{{ old('isi') }}</textarea>


                            @error('isi')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <div class="text-muted small">

                            <i class="bi bi-info-circle me-1"></i>

                            Pastikan isi berita sudah benar sebelum disimpan.

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 BAGIAN KANAN
            ================================================== --}}
            <div class="col-lg-4">


                {{-- =================================================
                     FOTO
                ================================================== --}}
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white border-0 pt-4 px-4">

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-image me-2"></i>

                            Foto Berita

                        </h5>

                    </div>


                    <div class="card-body px-4">


                        {{-- PREVIEW --}}
                        <div class="preview-box mb-3">

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

                        </div>


                        {{-- FILE --}}
                        <label class="form-label fw-semibold">

                            Pilih Foto

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

                            Format: JPG, JPEG, PNG, WEBP

                            <br>

                            Maksimal ukuran: 2 MB

                        </small>

                    </div>

                </div>


                {{-- =================================================
                     TOMBOL
                ================================================== --}}
                <div class="card border-0 shadow-sm mt-4">

                    <div class="card-body">

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="bi bi-save me-1"></i>

                            Simpan Berita

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

</style>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       PREVIEW FOTO
    ====================================================== */

    const fotoInput = document.getElementById('foto');

    const previewFoto = document.getElementById('previewFoto');

    const placeholderFoto = document.getElementById('placeholderFoto');


    fotoInput.addEventListener('change', function (event) {

        const file = event.target.files[0];


        if (!file) {

            previewFoto.style.display = 'none';

            placeholderFoto.style.display = 'block';

            previewFoto.src = '';

            return;

        }


        // Validasi ukuran
        if (file.size > 2 * 1024 * 1024) {

            alert('Ukuran foto maksimal 2 MB.');

            fotoInput.value = '';

            previewFoto.style.display = 'none';

            placeholderFoto.style.display = 'block';

            previewFoto.src = '';

            return;

        }


        previewFoto.src = URL.createObjectURL(file);

        previewFoto.style.display = 'block';

        placeholderFoto.style.display = 'none';

    });


    /* =====================================================
       SLUG PREVIEW
    ====================================================== */

    const judulInput = document.getElementById('judul');

    const slugPreview = document.getElementById('slugPreview');


    function buatSlug(text) {

        return text

            .toString()

            .toLowerCase()

            .trim()

            .replace(/[^\w\s-]/g, '')

            .replace(/[\s_-]+/g, '-')

            .replace(/^-+|-+$/g, '');

    }


    judulInput.addEventListener('input', function () {

        slugPreview.value = buatSlug(this.value);

    });


});

</script>

@endsection
