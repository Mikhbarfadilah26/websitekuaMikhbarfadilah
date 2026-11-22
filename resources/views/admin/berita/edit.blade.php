
@extends('layouts.appadmin')

@section('title', 'Edit Berita')

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
        ERROR VALIDASI
    ====================================================== --}}
    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-sm">

            <strong>Terjadi Kesalahan</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    {{-- =====================================================
        FORM EDIT BERITA
    ====================================================== --}}
    <form
        action="{{ route('admin.berita.update', $berita->id) }}"
        method="POST"
        enctype="multipart/form-data"
        id="formEditBerita">

        @csrf
        @method('PUT')

        <div class="row g-4">


            {{-- =================================================
                INFORMASI BERITA
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


                        {{-- JUDUL BERITA --}}
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
                                value="{{ old('judul') ? \Illuminate\Support\Str::slug(old('judul')) : $berita->slug }}"
                                readonly>

                            <small class="text-muted">
                                Slug akan diperbarui otomatis berdasarkan judul berita.
                            </small>

                        </div>


                        {{-- =================================================
                            EDITOR BERITA
                        ================================================== --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Isi Berita
                                <span class="text-danger">*</span>

                            </label>


                            {{-- TOOLBAR --}}
                            <div id="toolbarEditBerita">


                                {{-- FONT --}}
                                <span class="ql-formats">

                                    <select class="ql-font">

                                        <option selected></option>
                                        <option value="serif">Serif</option>
                                        <option value="monospace">Monospace</option>

                                    </select>

                                </span>


                                {{-- UKURAN TULISAN --}}
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


                                {{-- FORMAT TULISAN --}}
                                <span class="ql-formats">

                                    <button type="button" class="ql-bold"></button>
                                    <button type="button" class="ql-italic"></button>
                                    <button type="button" class="ql-underline"></button>
                                    <button type="button" class="ql-strike"></button>

                                </span>


                                {{-- WARNA TEKS --}}
                                <span class="ql-formats">

                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>

                                </span>


                                {{-- ALIGNMENT --}}
                                <span class="ql-formats">

                                    <select class="ql-align"></select>

                                </span>


                                {{-- LIST --}}
                                <span class="ql-formats">

                                    <button type="button"
                                            class="ql-list"
                                            value="ordered">
                                    </button>

                                    <button type="button"
                                            class="ql-list"
                                            value="bullet">
                                    </button>

                                </span>


                                {{-- INDENT --}}
                                <span class="ql-formats">

                                    <button type="button"
                                            class="ql-indent"
                                            value="-1">
                                    </button>

                                    <button type="button"
                                            class="ql-indent"
                                            value="+1">
                                    </button>

                                </span>


                                {{-- LINK --}}
                                <span class="ql-formats">

                                    <button type="button" class="ql-link"></button>

                                </span>


                                {{-- HAPUS FORMAT --}}
                                <span class="ql-formats">

                                    <button type="button" class="ql-clean"></button>

                                </span>


                            </div>


                            {{-- AREA EDITOR --}}
                            <div id="editorEditBerita"></div>


                            {{-- TEXTAREA UNTUK DIKIRIM KE CONTROLLER --}}
                            <textarea
                                name="isi"
                                id="isi"
                                class="d-none"
                            >{{ old('isi', $berita->isi) }}</textarea>


                            @error('isi')
                                <div class="text-danger small mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- INFO --}}
                        <div class="alert alert-light border small mb-0">

                            <i class="bi bi-info-circle text-primary me-1"></i>

                            Kamu dapat mengatur tulisan, ukuran font, warna,
                            heading, daftar, dan format paragraf menggunakan toolbar.

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                FOTO BERITA
            ================================================== --}}
            <div class="col-lg-4">


                {{-- CARD FOTO --}}
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


                            @if($berita->foto)

                                <img
                                    id="previewFoto"
                                    src="{{ asset('foto/' . $berita->foto) }}"
                                    alt="{{ $berita->judul }}">

                            @else

                                <img
                                    id="previewFoto"
                                    src=""
                                    alt="Preview Foto"
                                    style="display:none;">

                            @endif


                            {{-- PLACEHOLDER --}}
                            <div
                                id="placeholderFoto"
                                style="{{ $berita->foto ? 'display:none;' : '' }}">

                                <i class="bi bi-image"></i>

                                <div class="mt-2">
                                    Belum ada foto
                                </div>

                            </div>

                        </div>


                        {{-- INPUT FOTO --}}
                        <label for="foto"
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


                        {{-- INFORMASI FOTO --}}
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

                                <span class="fw-semibold text-break">
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
                            class="btn btn-success w-100 fw-semibold"
                            id="btnUpdateBerita">

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
    QUILL CSS
========================================================= --}}
<link
    href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css"
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
   TOOLBAR
========================================================= */

#toolbarEditBerita {
    background: #f8fafc;
    border: 1px solid #dfe3e8;
    border-radius: 10px 10px 0 0;
    padding: 10px;
}

#toolbarEditBerita .ql-formats {
    margin-right: 10px;
}

#toolbarEditBerita button,
#toolbarEditBerita select {
    margin-bottom: 3px;
}


/* =========================================================
   EDITOR
========================================================= */

#editorEditBerita {
    min-height: 400px;
    background: #ffffff;
    font-size: 16px;
}

#editorEditBerita .ql-editor {
    min-height: 400px;
    padding: 25px;
    line-height: 1.8;
    color: #333333;
}

#editorEditBerita .ql-editor.ql-blank::before {
    font-style: normal;
    color: #a0a0a0;
}

#editorEditBerita .ql-container {
    border-radius: 0 0 10px 10px;
    border-color: #dfe3e8;
}

#editorEditBerita .ql-editor h1 {
    font-size: 2em;
    font-weight: 700;
}

#editorEditBerita .ql-editor h2 {
    font-size: 1.5em;
    font-weight: 700;
}

#editorEditBerita .ql-editor h3 {
    font-size: 1.25em;
    font-weight: 700;
}


/* =========================================================
   FONT
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

    #editorEditBerita,
    #editorEditBerita .ql-editor {
        min-height: 300px;
    }

    #editorEditBerita .ql-editor {
        padding: 15px;
    }

    #toolbarEditBerita {
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
       EDITOR QUILL
    ====================================================== */

    const isiTextarea = document.getElementById('isi');

    const quill = new Quill('#editorEditBerita', {

        theme: 'snow',

        placeholder: 'Perbarui isi berita di sini...',

        modules: {
            toolbar: '#toolbarEditBerita'
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
       MEMUAT ISI BERITA LAMA
    ====================================================== */

    const isiBeritaLama = isiTextarea.value.trim();

    if (isiBeritaLama !== '') {

        quill.root.innerHTML = isiBeritaLama;

    }


    /* =====================================================
       SINKRONISASI EDITOR
    ====================================================== */

    quill.on('text-change', function () {

        isiTextarea.value = quill.root.innerHTML;

    });


    /* =====================================================
       PREVIEW FOTO
    ====================================================== */

    const fotoInput = document.getElementById('foto');
    const previewFoto = document.getElementById('previewFoto');
    const placeholderFoto = document.getElementById('placeholderFoto');

    let urlFotoPreview = null;


    if (fotoInput) {

        fotoInput.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }


            /* FORMAT FOTO */

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {

                alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');

                fotoInput.value = '';

                return;

            }


            /* UKURAN FOTO */

            if (file.size > 2 * 1024 * 1024) {

                alert('Ukuran foto maksimal 2 MB.');

                fotoInput.value = '';

                return;

            }


            /* PREVIEW */

            if (urlFotoPreview) {
                URL.revokeObjectURL(urlFotoPreview);
            }

            urlFotoPreview = URL.createObjectURL(file);

            previewFoto.src = urlFotoPreview;
            previewFoto.style.display = 'block';

            if (placeholderFoto) {
                placeholderFoto.style.display = 'none';
            }

        });

    }


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


    if (judulInput && slugPreview) {

        judulInput.addEventListener('input', function () {

            slugPreview.value = buatSlug(this.value);

        });

        slugPreview.value = buatSlug(judulInput.value);

    }


    /* =====================================================
       SEBELUM FORM DIKIRIM
    ====================================================== */

    const formEditBerita = document.getElementById('formEditBerita');

    formEditBerita.addEventListener('submit', function (event) {


        /* SINKRONKAN ISI EDITOR */

        isiTextarea.value = quill.root.innerHTML;


        /* VALIDASI ISI */

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
