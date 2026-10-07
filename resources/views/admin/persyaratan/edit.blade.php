@extends('layouts.appadmin')

@section('title', 'Edit Persyaratan')

@section('content')

<div class="container-fluid">

{{-- HEADER --}}
<div class="mb-4">

    <h3 class="fw-bold mb-1">
        Edit Persyaratan
    </h3>

    <p class="text-muted mb-0">
        Perbarui informasi persyaratan layanan.
    </p>

</div>


{{-- VALIDATION ERROR --}}
@if($errors->any())

    <div class="alert alert-danger">

        <strong>
            Terdapat kesalahan:
        </strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


<div class="card shadow-sm border-0">

    <div class="card-header bg-white">

        <strong>
            Form Edit Persyaratan
        </strong>

    </div>


    <div class="card-body">

        <form action="{{ route('admin.persyaratan.update', $persyaratan->id) }}"
            method="POST">

            @csrf

            @method('PUT')


            {{-- LAYANAN --}}
            <div class="mb-3">

                <label for="layanan_id"
                    class="form-label fw-semibold">

                    Layanan
                    <span class="text-danger">*</span>

                </label>


                <select name="layanan_id"
                    id="layanan_id"
                    class="form-select @error('layanan_id') is-invalid @enderror"
                    required>

                    <option value="">
                        -- Pilih Layanan --
                    </option>

                    @foreach($layanan as $item)

                        <option value="{{ $item->id }}"
                            {{ old('layanan_id', $persyaratan->layanan_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->judul }}

                        </option>

                    @endforeach

                </select>


                @error('layanan_id')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- NAMA PERSYARATAN --}}
            <div class="mb-3">

                <label for="nama_persyaratan"
                    class="form-label fw-semibold">

                    Nama Persyaratan
                    <span class="text-danger">*</span>

                </label>


                <input type="text"
                    name="nama_persyaratan"
                    id="nama_persyaratan"
                    class="form-control @error('nama_persyaratan') is-invalid @enderror"
                    value="{{ old('nama_persyaratan', $persyaratan->nama_persyaratan) }}"
                    placeholder="Contoh: Fotokopi KTP"
                    required>


                @error('nama_persyaratan')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- KETERANGAN --}}
            <div class="mb-4">

                <label for="keterangan"
                    class="form-label fw-semibold">

                    Keterangan

                </label>


                <textarea name="keterangan"
                    id="keterangan"
                    rows="4"
                    class="form-control @error('keterangan') is-invalid @enderror"
                    placeholder="Masukkan keterangan jika diperlukan">{{ old('keterangan', $persyaratan->keterangan) }}</textarea>


                @error('keterangan')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- BUTTON --}}
            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('admin.persyaratan.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali

                </a>


                <button type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>
                    Update

                </button>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
