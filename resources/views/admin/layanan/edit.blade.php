@extends('layouts.appadmin')

@section('title', 'Edit Layanan')

@section('content')

<div class="container-fluid">

{{-- =====================================================
     HEADER
====================================================== --}}
<div class="layanan-header shadow-sm">

    <div>
        <div class="layanan-header-title">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Layanan
        </div>

        <div class="layanan-header-subtitle">
            Perbarui informasi layanan KUA
        </div>
    </div>

    <a href="{{ route('admin.layanan.index') }}"
       class="btn btn-light btn-back">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali
    </a>

</div>


{{-- =====================================================
     VALIDATION ERROR
====================================================== --}}
@if ($errors->any())

    <div class="alert alert-danger shadow-sm border-0 mt-4">

        <div class="fw-bold mb-2">
            <i class="bi bi-exclamation-triangle-fill me-1"></i>
            Terjadi kesalahan
        </div>

        <ul class="mb-0 ps-3">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


{{-- =====================================================
     FORM
====================================================== --}}
<div class="card layanan-card shadow-sm border-0 mt-4">

    <div class="card-body p-4">

        <form action="{{ route('admin.layanan.update', $layanan->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            {{-- =================================================
                 JUDUL
            ================================================== --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Judul Layanan
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="judul"
                    id="judul"
                    class="form-control form-control-lg"
                    value="{{ old('judul', $layanan->judul) }}"
                    placeholder="Contoh: Bimbingan Perkawinan"
                    maxlength="255"
                    required>

                <div class="form-text">
                    Masukkan nama layanan yang akan ditampilkan kepada masyarakat.
                </div>

            </div>


            {{-- =================================================
                 SLUG
            ================================================== --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Slug
                </label>

                <div class="input-group input-group-lg">

                    <span class="input-group-text">
                        /layanan/
                    </span>

                    <input
                        type="text"
                        name="slug"
                        id="slug"
                        class="form-control"
                        value="{{ old('slug', $layanan->slug) }}"
                        placeholder="slug-layanan">

                </div>

                <div class="form-text">
                    Slug digunakan sebagai alamat layanan.
                </div>

            </div>


            {{-- =================================================
                 ISI / DESKRIPSI
            ================================================== --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Isi Layanan
                    <span class="text-danger">*</span>
                </label>

                <textarea
                    name="isi"
                    id="isi"
                    rows="9"
                    class="form-control"
                    placeholder="Tuliskan informasi lengkap mengenai layanan..."
                    required>{{ old('isi', $layanan->isi) }}</textarea>

                <div class="form-text">
                    Jelaskan informasi, prosedur, atau keterangan mengenai layanan.
                </div>

            </div>


            {{-- =================================================
                 FOTO
            ================================================== --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Foto Layanan
                </label>

                <div class="row g-4">

                    {{-- FOTO LAMA --}}
                    <div class="col-md-5">

                        <div class="photo-box">

                            <div class="photo-title">
                                <i class="bi bi-image me-1"></i>
                                Foto Saat Ini
                            </div>

                            @if ($layanan->foto && file_exists(public_path('layanan/' . $layanan->foto)))

                                <img
                                    src="{{ asset('layanan/' . $layanan->foto) }}"
                                    alt="{{ $layanan->judul }}"
                                    id="currentPhoto"
                                    class="current-photo">

                            @else

                                <div class="no-photo">

                                    <i class="bi bi-image"></i>

                                    <span>
                                        Belum ada foto
                                    </span>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- FOTO BARU --}}
                    <div class="col-md-7">

                        <div class="upload-box">

                            <div class="upload-icon">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                            </div>

                            <div class="upload-content">

                                <div class="fw-semibold mb-1">
                                    Ganti Foto Layanan
                                </div>

                                <div class="text-muted small mb-3">
                                    Pilih foto baru jika ingin mengganti foto yang lama.
                                </div>

                                <input
                                    type="file"
                                    name="foto"
                                    id="foto"
                                    class="form-control"
                                    accept=".jpg,.jpeg,.png,.webp">

                                <div class="form-text">
                                    Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                                </div>

                            </div>

                        </div>


                        {{-- PREVIEW FOTO BARU --}}
                        <div id="previewContainer"
                             class="preview-container d-none">

                            <div class="preview-title">
                                <i class="bi bi-eye me-1"></i>
                                Preview Foto Baru
                            </div>

                            <img
                                src=""
                                id="previewImage"
                                class="preview-image"
                                alt="Preview">

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 BUTTON
            ================================================== --}}
            <div class="form-footer">

                <a href="{{ route('admin.layanan.index') }}"
                   class="btn btn-light btn-lg px-4">

                    <i class="bi bi-x-lg me-1"></i>
                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-primary btn-lg px-4">

                    <i class="bi bi-check-lg me-1"></i>
                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

</div>

{{-- =========================================================
STYLE
========================================================= --}}

<style>

    .layanan-header {
        background: linear-gradient(
            135deg,
            #0f172a 0%,
            #1e3a8a 55%,
            #2563eb 100%
        );

        border-radius: 16px;
        padding: 22px 26px;
        color: #fff;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;
    }

    .layanan-header-title {
        font-size: 23px;
        font-weight: 700;
        letter-spacing: .2px;
    }

    .layanan-header-subtitle {
        margin-top: 5px;
        font-size: 14px;
        opacity: .85;
    }

    .btn-back {
        border: none;
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 17px;
        white-space: nowrap;
    }

    .layanan-card {
        border-radius: 16px;
        overflow: hidden;
    }

    .form-label {
        color: #1e293b;
        margin-bottom: 8px;
    }

    .form-control,
    .input-group-text {
        border-color: #dbe2ea;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .10);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 190px;
        line-height: 1.6;
    }

    .photo-box,
    .upload-box,
    .preview-container {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        background: #f8fafc;
        padding: 16px;
    }

    .photo-title,
    .preview-title {
        font-size: 14px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 12px;
    }

    .current-photo {
        display: block;
        width: 100%;
        height: 230px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: #fff;
    }

    .no-photo {
        height: 230px;
        border-radius: 10px;
        border: 1px dashed #cbd5e1;
        background: #fff;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        color: #94a3b8;
        gap: 8px;
    }

    .no-photo i {
        font-size: 42px;
    }

    .upload-box {
        display: flex;
        align-items: center;
        gap: 18px;
        min-height: 230px;
    }

    .upload-icon {
        width: 58px;
        height: 58px;
        min-width: 58px;

        border-radius: 14px;
        background: #e0ecff;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #2563eb;
        font-size: 25px;
    }

    .upload-content {
        flex: 1;
    }

    .preview-container {
        margin-top: 15px;
        background: #fff;
    }

    .preview-image {
        display: block;
        width: 100%;
        max-height: 250px;
        object-fit: contain;
        border-radius: 10px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }

    .form-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;

        padding-top: 10px;
        margin-top: 8px;

        border-top: 1px solid #eef2f7;
    }

    .form-footer .btn {
        border-radius: 10px;
        font-weight: 600;
    }

    @media (max-width: 768px) {

        .layanan-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-back {
            width: 100%;
        }

        .upload-box {
            align-items: flex-start;
            min-height: auto;
        }

        .form-footer {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .form-footer .btn {
            width: 100%;
        }

    }

</style>

{{-- =========================================================
JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const judul = document.getElementById('judul');
    const slug = document.getElementById('slug');

    const foto = document.getElementById('foto');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');


    /* =====================================================
       GENERATE SLUG
    ===================================================== */

    function generateSlug(text) {

        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

    }


    /*
     * Slug otomatis berubah mengikuti judul
     * ketika judul diedit.
     */
    judul.addEventListener('input', function () {

        slug.value = generateSlug(this.value);

    });


    /* =====================================================
       PREVIEW FOTO
    ===================================================== */

    foto.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {

            previewContainer.classList.add('d-none');
            previewImage.src = '';

            return;

        }


        /* Validasi ukuran */
        if (file.size > 2 * 1024 * 1024) {

            alert('Ukuran foto maksimal 2 MB.');

            this.value = '';

            previewContainer.classList.add('d-none');
            previewImage.src = '';

            return;

        }


        /* Preview */
        const reader = new FileReader();

        reader.onload = function (event) {

            previewImage.src = event.target.result;

            previewContainer.classList.remove('d-none');

        };

        reader.readAsDataURL(file);

    });

});

</script>

@endsection