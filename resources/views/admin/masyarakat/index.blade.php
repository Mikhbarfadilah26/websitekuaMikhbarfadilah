@extends('layouts.appadmin')

@section('title', 'Kelola Masyarakat')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-people-fill me-2"></i>
                Kelola Masyarakat
            </h3>

            <p class="text-muted mb-0">
                Kelola data dan pendaftaran masyarakat KUA Karang Baru
            </p>
        </div>

        <a href="{{ route('admin.masyarakat.create') }}"
            class="btn btn-primary">

            <i class="bi bi-person-plus-fill me-1"></i>
            Tambah Masyarakat

        </a>

    </div>


    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- STATISTIK --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Semua Masyarakat
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $jumlahSemua }}
                            </h3>
                        </div>

                        <div class="text-primary fs-2">
                            <i class="bi bi-people-fill"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Menunggu
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $jumlahPending }}
                            </h3>
                        </div>

                        <div class="text-warning fs-2">
                            <i class="bi bi-hourglass-split"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Disetujui
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $jumlahDisetujui }}
                            </h3>
                        </div>

                        <div class="text-success fs-2">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Ditolak
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $jumlahDitolak }}
                            </h3>
                        </div>

                        <div class="text-danger fs-2">
                            <i class="bi bi-x-circle-fill"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- DATA --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <form method="GET"
                action="{{ url('/admin/masyarakat') }}">

                <div class="row g-2">

                    <div class="col-md-5">

                        <div class="input-group">

                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="text"
                                name="cari"
                                class="form-control"
                                placeholder="Cari nama, email, atau nomor HP..."
                                value="{{ request('cari') }}">

                        </div>

                    </div>

                    <div class="col-md-3">

                        <select name="status"
                            class="form-select">

                            <option value="">
                                Semua Status
                            </option>

                            <option value="pending"
                                {{ request('status') == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="disetujui"
                                {{ request('status') == 'disetujui' ? 'selected' : '' }}>
                                Disetujui
                            </option>

                            <option value="ditolak"
                                {{ request('status') == 'ditolak' ? 'selected' : '' }}>
                                Ditolak
                            </option>

                        </select>

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            <i class="bi bi-search me-1"></i>
                            Cari

                        </button>

                    </div>

                    <div class="col-md-2">

                        <a href="{{ url('/admin/masyarakat') }}"
                            class="btn btn-light border w-100">

                            <i class="bi bi-arrow-clockwise me-1"></i>
                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="60">
                                #
                            </th>

                            <th>
                                Masyarakat
                            </th>

                            <th>
                                No. HP
                            </th>

                            <th>
                                Alamat
                            </th>

                            <th>
                                Status
                            </th>

                            <th width="250"
                                class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($masyarakat as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration + ($masyarakat->currentPage() - 1) * $masyarakat->perPage() }}
                                </td>

                                <td>

                                    <div class="fw-semibold">
                                        {{ $item->nama }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $item->email }}
                                    </small>

                                </td>

                                <td>
                                    {{ $item->no_hp ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->alamat ?? '-' }}
                                </td>

                                <td>

                                    @if($item->status === 'pending')

                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-hourglass-split me-1"></i>
                                            Pending
                                        </span>

                                    @elseif($item->status === 'disetujui')

                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i>
                                            Disetujui
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            <i class="bi bi-x-circle me-1"></i>
                                            Ditolak
                                        </span>

                                    @endif

                                </td>

                                <td class="text-center">

                                    @if($item->status === 'pending')

                                        <form method="POST"
                                            action="{{ route('admin.masyarakat.setujui', $item->id) }}"
                                            class="d-inline">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="btn btn-sm btn-success"
                                                title="Setujui">

                                                <i class="bi bi-check-lg"></i>

                                            </button>

                                        </form>

                                        <form method="POST"
                                            action="{{ route('admin.masyarakat.tolak', $item->id) }}"
                                            class="d-inline">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="btn btn-sm btn-warning"
                                                title="Tolak">

                                                <i class="bi bi-x-lg"></i>

                                            </button>

                                        </form>

                                    @endif


                                    <a href="{{ route('admin.masyarakat.edit', $item->id) }}"
                                        class="btn btn-sm btn-primary"
                                        title="Edit">

                                        <i class="bi bi-pencil-fill"></i>

                                    </a>


                                    <form method="POST"
                                        action="{{ route('admin.masyarakat.destroy', $item->id) }}"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data masyarakat ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus">

                                            <i class="bi bi-trash-fill"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-5">

                                    <i class="bi bi-people fs-1 text-muted"></i>

                                    <div class="mt-2 text-muted">
                                        Belum ada data masyarakat.
                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        @if($masyarakat->hasPages())

            <div class="card-footer bg-white">

                {{ $masyarakat->links() }}

            </div>

        @endif

    </div>

</div>

@endsection