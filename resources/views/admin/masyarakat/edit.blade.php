@extends('layouts.appadmin')

@section('title', 'Edit Masyarakat')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5 class="mb-0 fw-bold">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Masyarakat
            </h5>

        </div>


        <form action="{{ route('admin.masyarakat.update', $masyarakat->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="card-body">

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <div class="row g-3">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Lengkap
                        </label>

                        <input type="text"
                            name="nama"
                            class="form-control"
                            value="{{ old('nama', $masyarakat->nama) }}"
                            required>

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $masyarakat->email) }}"
                            required>

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nomor HP
                        </label>

                        <input type="text"
                            name="no_hp"
                            class="form-control"
                            value="{{ old('no_hp', $masyarakat->no_hp) }}">

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status"
                            class="form-select"
                            required>

                            <option value="pending"
                                {{ old('status', $masyarakat->status) === 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="disetujui"
                                {{ old('status', $masyarakat->status) === 'disetujui' ? 'selected' : '' }}>
                                Disetujui
                            </option>

                            <option value="ditolak"
                                {{ old('status', $masyarakat->status) === 'ditolak' ? 'selected' : '' }}>
                                Ditolak
                            </option>

                        </select>

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Password Baru
                        </label>

                        <input type="password"
                            name="password"
                            class="form-control">

                        <small class="text-muted">
                            Kosongkan jika password tidak ingin diubah.
                        </small>

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Konfirmasi Password Baru
                        </label>

                        <input type="password"
                            name="password_confirmation"
                            class="form-control">

                    </div>


                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Alamat
                        </label>

                        <textarea name="alamat"
                            class="form-control"
                            rows="4">{{ old('alamat', $masyarakat->alamat) }}</textarea>

                    </div>

                </div>

            </div>


            <div class="card-footer bg-white">

                <a href="{{ url('/admin/masyarakat') }}"
                    class="btn btn-light border">

                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali

                </a>

                <button type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>
                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection