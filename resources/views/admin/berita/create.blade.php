
@extends('layouts.appadmin')

@section('title', 'Tambah Berita')

@section('content')

<div class="container-fluid pb-4">

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
                    Buat dan publikasikan informasi terbaru KUA Karang Baru
                </p>
            </div>
        </div>
    </div>


    {{-- =====================================================
        ERROR VALIDASI
    ====================================================== --}}
    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm">
            <strong>Periksa kembali data berikut:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- =====================================================
        FORM BERITA
    ====================================================== --}}
    <form action="{{ route('admin.berita.store') }}"
          method="POST"
          enctype="multipart/form-data"
          id="formBerita">

        @csrf

        <div class="row g-4">

            {{-- =================================================
                BAGIAN KONTEN BERITA
            ================================================== --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm berita-card">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-file-text me-2 text-success"></i>
                            Informasi Berita
                        </h5>
                    </div>

                    <div class="card-body px-4 pb-4">

                        {{-- JUDUL --}}
                        <div class="mb-4">

                            <label for="judul"
                                   class="form-label fw-semibold">
                                Judul Berita
                                <span class="text-danger">*</span>
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


                        {{-- SLUG --}}
                        <div class="mb-4">

                            <label for="slugPreview"
                                   class="form-label fw-semibold">
                                Slug Berita
                            </label>

                            <input
                                type="text"
                                id="slugPreview"
                                class="form-control bg-light"
                                placeholder="Slug otomatis dibuat dari judul"
                                readonly>

                            <small class="text-muted">
                                Slug akan dibuat otomatis berdasarkan judul berita.
                            </small>

                        </div>


                        {{-- ISI BERITA --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Isi Berita
                                <span class="text-danger">*</span>
                            </label>

                            {{-- TOOLBAR EDITOR --}}
                            <div id="toolbarBerita">

                                {{-- FONT --}}
                                <span class="ql-formats">
                                    <select class="ql-font">
                                        <option selected></option>
                                        <option value="serif">Serif</option>
                                        <option value="monospace">Monospace</option>
                                    </select>
                                </span>

                                {{-- UKURAN --}}
                                <span class="ql-formats">
                                    <select class="ql-size">
                                        <option value="small"></option>
                                        <option selected></option>
                                        <option value="large"></option>
                                        <option value="huge"></option>
                                    </select>
                                </span>

                                {{-- HEADING --}}
                                <span class="ql-formats">
                                    <select class="ql-header">
                                        <option selected></option>
                                        <option value="1"></option>
                                        <option value="2"></option>
                                        <option value="3"></option>
                                    </select>
                                </span>

                                {{-- FORMAT TEKS --}}
                                <span class="ql-formats">
                                    <button type="button" class="ql-bold"></button>
                                    <button type="button" class="ql-italic"></button>
                                    <button type="button" class="ql-underline"></button>
                                    <button type="button" class="ql-strike"></button>
                                </span>

                                {{-- WARNA --}}
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>

                                {{-- ALIGN --}}
                                <span class="ql-formats">
                                    <select class="ql-align"></select>
                                </span>

                                {{-- LIST --}}
                                <span class="ql-formats">
                                    <button type="button" class="ql-list"
                                            value="ordered"></button>
                                    <button type="button" class="ql-list"
                                            value="bullet"></button>
                                </span>

                                {{-- INDENT --}}
                                <span class="ql-formats">
                                    <button type="button" class="ql-indent"
                                            value="-1"></button>
                                    <button type="button" class="ql-indent"
                                            value="+1"></button>
                                </span>

                                {{-- LINK --}}
                                <span class="ql-formats">
                                    <button type="button" class="ql-link"></button>
                                </span>

                                {{-- CLEAN --}}
                                <span class="ql-formats">
                                    <button type="button" class="ql-clean"></button>
                                </span>

                            </div>


                            {{-- AREA EDITOR --}}
                            <div id="editorBerita"></div>


                            {{-- FIELD ISI YANG DIKIRIM KE LARAVEL --}}
                            <textarea
                                name="isi"
                                id="isi"
                                class="d-none"
                            >{{ old('isi') }}</textarea>


                            @error('isi')
                                <div class="text-danger small mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- INFO --}}
                        <div class="alert alert-light border small mb-0">
                            <i class="bi bi-info-circle text-primary me-1"></i>

                            Gunakan toolbar di atas untuk mengatur format tulisan
                            berita seperti Word.
                        </div>

                    </div>
                </div>

            </div>


            {{-- =================================================
                BAGIAN FOTO
            ================================================== --}}
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm berita-card">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-image me-2 text-success"></i>
                            Foto Berita
                        </h5>
                    </div>

                    <div class="card-body px-4">

                        {{-- PREVIEW FOTO --}}
                        <div class="preview-box mb-3">

                            <img
                                id="previewFoto"
                                src=""
                                alt="Preview Foto Berita"
                                style="display:none;">

                            <div id="placeholderFoto">
                                <i class="bi bi-image"></i>

                                <div class="mt-2">
                                    Belum ada foto
                                </div>
                            </div>

                        </div>


                        {{-- INPUT FOTO --}}
                        <label for="foto"
                               class="form-label fw-semibold">
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
                            Format: JPG, JPEG, PNG, WEBP.
                            <br>
                            Maksimal ukuran: 2 MB.
                        </small>

                    </div>
                </div>


                {{-- =================================================
                    TOMBOL SIMPAN
                ================================================== --}}
                <div class="card border-0 shadow-sm mt-4">

                    <div class="card-body">

                        <button type="submit"
                                class="btn btn-success w-100 fw-semibold"
                                id="btnSimpanBerita">

                            <i class="bi bi-save me-1"></i>
                            Simpan Berita
                        </button>

                        <a href="{{ route('admin.berita.index') }}"
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
    QUILL CSS
========================================================= --}}
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css"
      rel="stylesheet">


<style>

/* =========================================================
   CARD
========================================================= */

.berita-card {
    border-radius: 14px;
    overflow: hidden;
}

.berita-card .card-header {
    border-bottom: 1px solid #f1f3f5 !important;
}


/* =========================================================
   EDITOR TOOLBAR
========================================================= */

#toolbarBerita {
    background: #f8fafc;
    border: 1px solid #dfe3e8;
    border-radius: 10px 10px 0 0;
    padding: 10px;
}

#toolbarBerita .ql-formats {
    margin-right: 10px;
}

#toolbarBerita button,
#toolbarBerita select {
    margin-bottom: 3px;
}


/* =========================================================
   AREA EDITOR
========================================================= */

#editorBerita {
    min-height: 400px;
    background: #ffffff;
    font-size: 16px;
    border-radius: 0 0 10px 10px;
}

#editorBerita .ql-editor {
    min-height: 400px;
    padding: 25px;
    line-height: 1.8;
    color: #333333;
}

#editorBerita .ql-editor.ql-blank::before {
    font-style: normal;
    color: #a0a0a0;
}

#editorBerita .ql-container {
    border-radius: 0 0 10px 10px;
    border-color: #dfe3e8;
}

#editorBerita .ql-editor h1 {
    font-size: 2em;
    font-weight: 700;
}

#editorBerita .ql-editor h2 {
    font-size: 1.5em;
    font-weight: 700;
}

#editorBerita .ql-editor h3 {
    font-size: 1.25em;
    font-weight: 700;
}


/* =========================================================
   FONT EDITOR
========================================================= */

.ql-font-serif {
    font-family: Georgia, Times New Roman, serif;
}

.ql-font-monospace {
    font-family: Consolas, monospace;
}


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
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    #editorBerita,
    #editorBerita .ql-editor {
        min-height: 300px;
    }

    #editorBerita .ql-editor {
        padding: 15px;
    }

    #toolbarBerita {
        padding: 8px;
    }

}

</style>


{{-- =========================================================
    QUILL JAVASCRIPT
========================================================= --}}
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       EDITOR BERITA QUILL
    ====================================================== */

    const isiTextarea = document.getElementById('isi');

    const quill = new Quill('#editorBerita', {

        theme: 'snow',

        placeholder: 'Tuliskan berita atau informasi KUA Karang Baru di sini...',

        modules: {
            toolbar: '#toolbarBerita'
        },

        formats: [
            'header',
            'font',
            'size',
            'bold',
            'italic',
            'underline',
            'strike',
            'color',
            'background',
            'align',
            'list',
            'bullet',
            'indent',
            'link'
        ]

    });


    /* =====================================================
       MEMASUKKAN ISI LAMA JIKA VALIDASI GAGAL
    ====================================================== */

    if (isiTextarea.value.trim() !== '') {

        quill.root.innerHTML = isiTextarea.value;

    }


    /* =====================================================
       SINKRONISASI EDITOR KE TEXTAREA
    ====================================================== */

    quill.on('text-change', function () {

        isiTextarea.value = quill.root.innerHTML;

    });


    /* =====================================================
       FOTO BERITA PREVIEW
    ====================================================== */

    const fotoInput = document.getElementById('foto');
    const previewFoto = document.getElementById('previewFoto');
    const placeholderFoto = document.getElementById('placeholderFoto');

    let urlFotoPreview = null;

    fotoInput.addEventListener('change', function (event) {

        const file = event.target.files[0];

        if (!file) {

            previewFoto.style.display = 'none';
            placeholderFoto.style.display = 'block';
            previewFoto.src = '';

            return;

        }


        /* VALIDASI FORMAT */

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {

            alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');

            fotoInput.value = '';

            previewFoto.style.display = 'none';
            placeholderFoto.style.display = 'block';

            return;

        }


        /* VALIDASI UKURAN */

        if (file.size > 2 * 1024 * 1024) {

            alert('Ukuran foto maksimal 2 MB.');

            fotoInput.value = '';

            previewFoto.style.display = 'none';
            placeholderFoto.style.display = 'block';

            return;

        }


        /* PREVIEW FOTO */

        if (urlFotoPreview) {
            URL.revokeObjectURL(urlFotoPreview);
        }

        urlFotoPreview = URL.createObjectURL(file);

        previewFoto.src = urlFotoPreview;

        previewFoto.style.display = 'block';
        placeholderFoto.style.display = 'none';

    });


    /* =====================================================
       SLUG OTOMATIS
    ====================================================== */

    const judulInput = document.getElementById('judul');
    const slugPreview = document.getElementById('slugPreview');


    function buatSlug(text) {

        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/[\s-]+/g, '-')
            .replace(/^-+|-+$/g, '');

    }


    judulInput.addEventListener('input', function () {

        slugPreview.value = buatSlug(this.value);

    });


    slugPreview.value = buatSlug(judulInput.value);


    /* =====================================================
       SEBELUM FORM DIKIRIM
    ====================================================== */

    const formBerita = document.getElementById('formBerita');

    formBerita.addEventListener('submit', function (event) {

        isiTextarea.value = quill.root.innerHTML;

        if (quill.getText().trim().length === 0) {

            event.preventDefault();

            alert('Isi berita tidak boleh kosong.');

            quill.focus();

            return;

        }

    });


});

</script>

@endsection
