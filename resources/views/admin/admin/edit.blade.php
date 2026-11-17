
@extends('layouts.appadmin')

@section('title', 'Edit Admin')

@section('content')
<div class="container-fluid py-3 admin-crud">
    <a href="{{ route('admin.admin.index') }}" class="text-success text-decoration-none">
        <i class="bi bi-arrow-left"></i> Kembali ke Kelola Admin
    </a>

    <h3 class="page-title mt-3">Edit Admin</h3>
    <p class="text-muted">Perbarui informasi akun administrator.</p>

    <div class="table-card mt-4">
        <form action="{{ route('admin.admin.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.admin.form')

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('admin.admin.index') }}" class="btn btn-light border">Batal</a>
                <button type="submit" class="btn btn-green">
                    <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
