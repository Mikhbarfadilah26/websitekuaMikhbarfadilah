
@extends('layouts.appmasyarakat')

@section('title', 'Edit Pengajuan')

@section('content')

<style>
.edit-pmh {
    max-width: 850px;
    margin: 0 auto;
    padding: 8px 0 30px;
}

.edit-pmh-card {
    background: #fff;
    border: 1px solid #e5eaf1;
    border-radius: 13px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(15,23,42,.04);
}

.edit-pmh-header {
    padding: 20px 24px;
    border-bottom: 1px solid #edf0f5;
}

.edit-pmh-header h5 {
    font-weight: 800;
    margin: 0 0 5px;
}

.edit-pmh-header p {
    color: #8491a5;
    font-size: 12px;
    margin: 0;
}

.edit-pmh-body {
    padding: 25px;
}

.edit-pmh label {
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 8px;
}

.edit-pmh .form-control,
.edit-pmh .form-select {
    min-height: 45px;
    border-radius: 8px;
    border-color: #dfe6ef;
    font-size: 13px;
    box-shadow: none;
}

.edit-pmh textarea.form-control {
    min-height: 110px;
}

.edit-pmh .form-control:focus,
.edit-pmh .form-select:focus {
    border-color: #1677ee;
    box-shadow: 0 0 0 3px rgba(22,119,238,.09);
}
</style>

<div class="edit-pmh">

    <div class="mb-3">

        <h4 class="fw-bold fs-5 mb-1">
            <i class="bi bi-pencil-square text-primary"></i>
            Edit Pengajuan
        </h4>

        <p class="text-secondary small">
            Perbarui informasi permohonan Anda.
        </p>

    </div>


    <div class="edit-pmh-card">

        <div class="edit-pmh-header">

            <h5>Perubahan Data Permohonan</h5>

            <p>
                Nomor:
                <strong>{{ $permohonan->nomor_permohonan }}</strong>
            </p>

        </div>


        <div class="edit-pmh-body">

            @if($errors->any())

                <div class="alert alert-danger small">

                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach

                </div>

            @endif


            <form action="{{ route('masyarakat.pengajuan.update', $permohonan->id) }}"
                  method="POST">

                @csrf
                @method('PUT')


                <div class="mb-4">

                    <label for="layanan_id">
                        Jenis Layanan
                    </label>

                    <select name="layanan_id"
                            id="layanan_id"
                            class="form-select"
                            required>

                        <option value="">-- Pilih Layanan --</option>

                        @foreach($layanan as $item)

                            <option value="{{ $item->id }}"
                                {{ old('layanan_id', $permohonan->layanan_id) == $item->id ? 'selected' : '' }}>

                                {{ $item->judul }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="mb-3">

                    <label for="keterangan">
                        Keterangan Tambahan
                    </label>

                    <textarea name="keterangan"
                              id="keterangan"
                              class="form-control"
                              maxlength="2000"
                              placeholder="Keterangan tambahan...">{{ old('keterangan', $permohonan->keterangan) }}</textarea>

                </div>


                <div class="d-flex justify-content-end gap-2 mt-4">

                    <a href="{{ route('masyarakat.pengajuan.index') }}"
                       class="btn btn-light border btn-sm px-3 py-2">

                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary btn-sm px-3 py-2">

                        <i class="bi bi-check-circle me-1"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
