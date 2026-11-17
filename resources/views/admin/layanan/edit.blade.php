
@extends('layouts.appadmin')

@section('title', 'Edit Layanan')

@section('content')
<div class="container-fluid py-3">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Layanan</h4>
        <p class="text-muted mb-0">Perbarui informasi layanan KUA Karang Baru.</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h6 class="fw-bold mb-0">Form Edit Layanan</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.layanan.update', $layanan->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Judul Layanan <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $layanan->judul) }}"
                        placeholder="Masukkan judul layanan"
                        required>

                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Isi Layanan <span class="text-danger">*</span>
                    </label>

                    <textarea
                        name="isi"
                        rows="7"
                        class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Masukkan penjelasan layanan..."
                        required>{{ old('isi', $layanan->isi) }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar Saat Ini</label>

                    <div class="mb-3">
                        @if($layanan->gambar && file_exists(public_path('foto/layanan/' . $layanan->gambar)))
                            <img
                                src="{{ asset('foto/layanan/' . $layanan->gambar) }}"
                                alt="{{ $layanan->judul }}"
                                style="width:180px;height:130px;object-fit:cover;border-radius:8px;">
                        @else
                            <p class="text-muted mb-0">Belum ada gambar.</p>
                        @endif
                    </div>

                    <label class="form-label fw-semibold">Ganti Gambar</label>

                    <input
                        type="file"
                        name="gambar"
                        id="gambar"
                        class="form-control @error('gambar') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mt-3">
                        <img id="previewGambar"
                             src=""
                             alt="Preview gambar baru"
                             style="display:none;width:180px;height:130px;object-fit:cover;border-radius:8px;">
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.layanan.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('gambar').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewGambar');

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});
</script>
@endsection
