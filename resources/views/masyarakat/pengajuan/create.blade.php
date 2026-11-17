
@extends('layouts.appmasyarakat')

@section('title', 'Buat Pengajuan')

@section('content')

<style>
.form-pmh {
    max-width: 850px;
    margin: 0 auto;
    padding: 8px 0 30px;
}

.form-pmh-card {
    background: #fff;
    border: 1px solid #e5eaf1;
    border-radius: 14px;
    box-shadow: 0 4px 15px rgba(15,23,42,.04);
    overflow: hidden;
}

.form-pmh-header {
    padding: 21px 25px;
    border-bottom: 1px solid #edf0f5;
}

.form-pmh-header h4 {
    font-size: 20px;
    font-weight: 800;
    margin: 0 0 5px;
}

.form-pmh-header p {
    font-size: 12px;
    color: #8491a5;
    margin: 0;
}

.form-pmh-body {
    padding: 25px;
}

.form-pmh label {
    font-size: 13px;
    font-weight: 700;
    color: #344256;
    margin-bottom: 8px;
}

.form-pmh .form-control,
.form-pmh .form-select {
    min-height: 45px;
    border-color: #dfe6ef;
    border-radius: 8px;
    font-size: 13px;
    box-shadow: none;
}

.form-pmh textarea.form-control {
    min-height: 115px;
    resize: vertical;
}

.form-pmh .form-control:focus,
.form-pmh .form-select:focus {
    border-color: #1677ee;
    box-shadow: 0 0 0 3px rgba(22,119,238,.09);
}

.form-pmh .form-text {
    font-size: 11px;
    color: #8491a5;
}

.form-pmh-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 25px;
}

.form-pmh-actions a,
.form-pmh-actions button {
    padding: 10px 17px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
}

@media(max-width: 575px) {
    .form-pmh-body {
        padding: 18px;
    }

    .form-pmh-header {
        padding: 18px;
    }
}
</style>

<div class="form-pmh">

    <div class="mb-3">

        <h4 class="fw-bold fs-5 mb-1">
            <i class="bi bi-file-earmark-plus text-primary"></i>
            Buat Pengajuan
        </h4>

        <p class="text-secondary small mb-0">
            Silakan lengkapi formulir permohonan layanan KUA.
        </p>

    </div>


    <div class="form-pmh-card">

        <div class="form-pmh-header">

            <h4>Formulir Pengajuan Layanan</h4>

            <p>Isi informasi berikut dengan benar.</p>

        </div>


        <div class="form-pmh-body">

            @if($errors->any())

                <div class="alert alert-danger small">
                    <strong>Periksa kembali formulir:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif


            <form action="{{ route('masyarakat.pengajuan.store') }}"
                  method="POST">

                @csrf


                <div class="mb-4">

                    <label for="layanan_id">
                        Jenis Layanan <span class="text-danger">*</span>
                    </label>

                    <select name="layanan_id"
                            id="layanan_id"
                            class="form-select @error('layanan_id') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih Jenis Layanan --</option>

                        @foreach($layanan as $item)

                            <option value="{{ $item->id }}"
                                {{ old('layanan_id') == $item->id ? 'selected' : '' }}>

                                {{ $item->judul }}

                            </option>

                        @endforeach

                    </select>

                    @error('layanan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="form-text">
                        Pilih jenis pelayanan yang ingin Anda ajukan.
                    </div>

                </div>


                <div class="mb-3">

                    <label for="keterangan">
                        Keterangan Tambahan
                    </label>

                    <textarea name="keterangan"
                              id="keterangan"
                              class="form-control @error('keterangan') is-invalid @enderror"
                              placeholder="Tuliskan informasi tambahan mengenai permohonan Anda..."
                              maxlength="2000">{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="form-text">
                        Bagian ini boleh dikosongkan jika tidak ada keterangan tambahan.
                    </div>

                </div>


                <div class="alert alert-info small mt-4 mb-0">

                    <i class="bi bi-info-circle-fill me-2"></i>

                    Nomor permohonan akan dibuat otomatis setelah formulir berhasil dikirim.

                </div>


                <div class="form-pmh-actions">

                    <a href="{{ route('masyarakat.pengajuan.index') }}"
                       class="btn btn-light border">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">

                        <i class="bi bi-send-fill me-1"></i>
                        Kirim Pengajuan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
