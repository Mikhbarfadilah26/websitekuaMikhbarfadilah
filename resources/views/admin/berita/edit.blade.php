
@extends('layouts.appadmin')

@section('title', 'Edit Berita')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.berita.index') }}" class="btn btn-light border shadow-sm">
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

    <form
        action="{{ route('admin.berita.update', $berita->id) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row g-4">

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-file-text me-2"></i>
                            Informasi Berita
                        </h5>
                    </div>

                    <div class="card-body px-4 pb-4">

                        <div class="mb-4">
                            <label for="judul" class="form-label fw-semibold">
                                Judul Berita <span class="text-danger">*</span>
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
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="slugPreview" class="form-label fw-semibold">
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

                        <div class="mb-3">
                            <label for="isi" class="form-label fw-semibold">
                                Isi Berita <span class="text-danger">*</span>
                            </label>

                            <textarea
                                name="isi"
                                id="isi"
                                rows="16"
                                class="form-control @error('isi') is-invalid @enderror"
                                placeholder="Tulis isi berita di sini..."
                                required>{{ old('isi', $berita->isi) }}</textarea>

                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="small text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            Periksa kembali judul dan isi berita sebelum menyimpan perubahan.
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-image me-2"></i>
                            Foto Berita
                        </h5>
                    </div>

                    <div class="card-body px-4">

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

                            <div
                                id="placeholderFoto"
                                style="{{ $berita->foto ? 'display:none;' : '' }}">

                                <i class="bi bi-image"></i>
                                <div class="mt-2">Belum ada foto</div>

                            </div>

                        </div>

                        <label for="foto" class="form-label fw-semibold">
                            Ganti Foto
                        </label>

                        <input
                            type="file"
                            name="foto"
                            id="foto"
                            class="form-control @error('foto') is-invalid @enderror"
                            accept="image/jpeg,image/png,image/webp">

                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <small class="text-muted d-block mt-2">
                            Kosongkan jika tidak ingin mengganti foto.
                            <br>
                            Format: JPG, JPEG, PNG, WEBP.
                            <br>
                            Maksimal ukuran: 2 MB.
                        </small>

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

                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-check-circle me-1"></i>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.berita.index') }}" class="btn btn-light border w-100 mt-2">
                            <i class="bi bi-x-circle me-1"></i>
                            Batal
                        </a>

                    </div>
                </div>

            </div>

        </div>
    </form>

</div>

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

<script>
document.addEventListener('DOMContentLoaded', function () {

    const fotoInput = document.getElementById('foto');
    const previewFoto = document.getElementById('previewFoto');
    const placeholderFoto = document.getElementById('placeholderFoto');

    if (fotoInput) {
        fotoInput.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }

            const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!allowedTypes.includes(file.type)) {
                alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');
                fotoInput.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran foto maksimal 2 MB.');
                fotoInput.value = '';
                return;
            }

            previewFoto.src = URL.createObjectURL(file);
            previewFoto.style.display = 'block';

            if (placeholderFoto) {
                placeholderFoto.style.display = 'none';
            }

        });
    }

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

    if (judulInput && slugPreview) {
        judulInput.addEventListener('input', function () {
            slugPreview.value = buatSlug(this.value);
        });
    }

});
</script>

@endsection
