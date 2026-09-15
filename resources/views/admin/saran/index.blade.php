@extends('layouts.appadmin')

@section('title', 'Saran Masyarakat')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="card border-0 shadow-sm mb-4"
         style="
            border-radius: 18px;
            overflow: hidden;
            background: linear-gradient(135deg, #0f172a, #1e3a8a);
         ">

        <div class="card-body text-white p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>
                    <div class="d-flex align-items-center mb-2">
                        <div
                            style="
                                width: 45px;
                                height: 45px;
                                border-radius: 12px;
                                background: rgba(255,255,255,.15);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-right: 12px;
                            "
                        >
                            <i class="fas fa-comments fa-lg"></i>
                        </div>

                        <div>
                            <h4 class="mb-0 font-weight-bold">
                                Saran Masyarakat
                            </h4>

                            <small style="opacity:.8;">
                                Kelola saran dan masukan dari masyarakat
                            </small>
                        </div>
                    </div>
                </div>

                <div class="mt-3 mt-md-0">

                    <span
                        class="badge badge-light px-3 py-2"
                        style="border-radius:10px; font-size:13px;"
                    >
                        <i class="fas fa-database mr-1"></i>
                        {{ $saran->total() }} Saran
                    </span>

                </div>

            </div>

        </div>
    </div>


    {{-- =====================================================
         ALERT SUCCESS
    ====================================================== --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm"
             style="border-radius:12px;">

            <i class="fas fa-check-circle mr-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif


    {{-- =====================================================
         FILTER
    ====================================================== --}}
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:16px;">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('admin.saran.index') }}">

                <div class="row align-items-end">

                    {{-- SEARCH --}}
                    <div class="col-md-7 mb-3 mb-md-0">

                        <label class="font-weight-bold">
                            <i class="fas fa-search mr-1"></i>
                            Cari Saran
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                value="{{ request('search') }}"
                                placeholder="Cari nama, email, isi saran..."
                                style="
                                    height:45px;
                                    border-radius:10px 0 0 10px;
                                "
                            >

                            <div class="input-group-append">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    style="
                                        border-radius:0 10px 10px 0;
                                        padding-left:20px;
                                        padding-right:20px;
                                    "
                                >
                                    <i class="fas fa-search mr-1"></i>
                                    Cari
                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div class="col-md-3 mb-3 mb-md-0">

                        <label class="font-weight-bold">
                            <i class="fas fa-filter mr-1"></i>
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-control"
                            style="
                                height:45px;
                                border-radius:10px;
                            "
                        >

                            <option value="">
                                Semua Status
                            </option>

                            <option
                                value="baru"
                                {{ request('status') == 'baru' ? 'selected' : '' }}
                            >
                                Baru
                            </option>

                            <option
                                value="dibaca"
                                {{ request('status') == 'dibaca' ? 'selected' : '' }}
                            >
                                Dibaca
                            </option>

                            <option
                                value="dibalas"
                                {{ request('status') == 'dibalas' ? 'selected' : '' }}
                            >
                                Dibalas
                            </option>

                        </select>

                    </div>


                    {{-- RESET --}}
                    <div class="col-md-2">

                        <a
                            href="{{ route('admin.saran.index') }}"
                            class="btn btn-outline-secondary btn-block"
                            style="
                                height:45px;
                                border-radius:10px;
                                padding-top:10px;
                            "
                        >
                            <i class="fas fa-sync-alt mr-1"></i>
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>
    </div>


    {{-- =====================================================
         DATA SARAN
    ====================================================== --}}
    <div class="card border-0 shadow-sm"
         style="border-radius:16px;">

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1 font-weight-bold">
                        <i class="fas fa-inbox mr-2 text-primary"></i>
                        Daftar Saran
                    </h5>

                    <small class="text-muted">
                        Saran yang masuk dari masyarakat
                    </small>
                </div>

                <span class="badge badge-primary px-3 py-2"
                      style="border-radius:10px;">

                    {{ $saran->count() }} data

                </span>

            </div>

        </div>


        <div class="card-body p-0">

            @if($saran->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover mb-0">

                        <thead style="background:#f8fafc;">

                            <tr>

                                <th class="px-4 py-3">
                                    #
                                </th>

                                <th class="py-3">
                                    Masyarakat
                                </th>

                                <th class="py-3">
                                    Isi Saran
                                </th>

                                <th class="py-3">
                                    Tanggal
                                </th>

                                <th class="py-3 text-center">
                                    Status
                                </th>

                                <th class="py-3 text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($saran as $item)

                                <tr>

                                    {{-- NOMOR --}}
                                    <td class="px-4 align-middle">

                                        <span class="text-muted">
                                            {{ $saran->firstItem() + $loop->index }}
                                        </span>

                                    </td>


                                    {{-- USER --}}
                                    <td class="align-middle">

                                        <div class="d-flex align-items-center">

                                            <div
                                                style="
                                                    width:40px;
                                                    height:40px;
                                                    border-radius:50%;
                                                    background:#e0f2fe;
                                                    color:#0369a1;
                                                    display:flex;
                                                    align-items:center;
                                                    justify-content:center;
                                                    margin-right:10px;
                                                    flex-shrink:0;
                                                "
                                            >

                                                <i class="fas fa-user"></i>

                                            </div>

                                            <div>

                                                <div class="font-weight-bold">

                                                    {{ $item->user->nama ?? 'Pengguna' }}

                                                </div>

                                                <small class="text-muted">

                                                    {{ $item->user->email ?? '-' }}

                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- ISI --}}
                                    <td class="align-middle"
                                        style="min-width:280px; max-width:400px;">

                                        <div style="
                                            white-space:nowrap;
                                            overflow:hidden;
                                            text-overflow:ellipsis;
                                            max-width:380px;
                                        ">

                                            {{ $item->isi_saran }}

                                        </div>

                                        @if($item->tanggapan)

                                            <small class="text-success">

                                                <i class="fas fa-reply mr-1"></i>
                                                Sudah dibalas

                                            </small>

                                        @else

                                            <small class="text-muted">

                                                <i class="far fa-comment mr-1"></i>
                                                Belum dibalas

                                            </small>

                                        @endif

                                    </td>


                                    {{-- TANGGAL --}}
                                    <td class="align-middle">

                                        <div class="font-weight-semibold">

                                            {{ $item->created_at->format('d/m/Y') }}

                                        </div>

                                        <small class="text-muted">

                                            {{ $item->created_at->format('H:i') }}

                                        </small>

                                    </td>


                                    {{-- STATUS --}}
                                    <td class="align-middle text-center">

                                        @if($item->status === 'baru')

                                            <span
                                                class="badge badge-warning px-3 py-2"
                                                style="border-radius:8px;"
                                            >
                                                <i class="fas fa-envelope mr-1"></i>
                                                Baru
                                            </span>

                                        @elseif($item->status === 'dibaca')

                                            <span
                                                class="badge badge-info px-3 py-2"
                                                style="border-radius:8px;"
                                            >
                                                <i class="fas fa-eye mr-1"></i>
                                                Dibaca
                                            </span>

                                        @elseif($item->status === 'dibalas')

                                            <span
                                                class="badge badge-success px-3 py-2"
                                                style="border-radius:8px;"
                                            >
                                                <i class="fas fa-reply mr-1"></i>
                                                Dibalas
                                            </span>

                                        @else

                                            <span
                                                class="badge badge-secondary px-3 py-2"
                                                style="border-radius:8px;"
                                            >
                                                {{ ucfirst($item->status) }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- AKSI --}}
                                    <td class="align-middle text-center">

                                        <div class="btn-group">

                                            {{-- DETAIL --}}
                                            <a
                                                href="{{ route('admin.saran.show', $item->id) }}"
                                                class="btn btn-sm btn-primary"
                                                title="Lihat Detail"
                                            >
                                                <i class="fas fa-eye"></i>
                                            </a>


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('admin.saran.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus saran ini?');"
                                                style="display:inline;"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- EMPTY --}}
                <div class="text-center py-5">

                    <div
                        style="
                            width:80px;
                            height:80px;
                            border-radius:50%;
                            background:#f1f5f9;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            margin:0 auto 20px;
                        "
                    >

                        <i class="fas fa-comments fa-2x text-muted"></i>

                    </div>

                    <h5 class="font-weight-bold">
                        Belum Ada Saran
                    </h5>

                    <p class="text-muted mb-0">
                        Belum ada saran yang masuk dari masyarakat.
                    </p>

                </div>

            @endif

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}
        @if($saran->hasPages())

            <div class="card-footer bg-white border-0 px-4 py-3">

                {{ $saran->links() }}

            </div>

        @endif

    </div>

</div>


{{-- =====================================================
     CUSTOM STYLE
====================================================== --}}
<style>

    .table td,
    .table th {
        vertical-align: middle;
    }

    .table tbody tr {
        transition: .2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
    }

    .font-weight-semibold {
        font-weight: 600;
    }

    @media (max-width: 768px) {

        .calendar-header-title {
            font-size: 20px;
        }

    }

</style>

@endsection