@extends('layouts.appadmin')

@section('title', 'Saran & Pengaduan Masyarakat')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp

<div class="container-fluid py-4 halaman-saran">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="header-saran mb-4">
        <div class="header-content">
            <span class="header-label">
                PUSAT INFORMASI MASYARAKAT
            </span>

            <h3>Saran & Pengaduan</h3>

            <p>
                Kelola saran, pengaduan, dan pertanyaan umum
                yang disampaikan oleh masyarakat.
            </p>

            <div class="header-info">
                <i class="bi bi-shield-check"></i>
                Panel Pengelolaan Pesan & Aspirasi
            </div>
        </div>

        <div class="header-icon">
            <i class="bi bi-chat-square-heart"></i>
        </div>

        <div class="header-decoration header-decoration-one"></div>
        <div class="header-decoration header-decoration-two"></div>
    </div>


    {{-- =====================================================
         NOTIFIKASI
    ====================================================== --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif


    {{-- =====================================================
         FILTER DAN PENCARIAN
    ====================================================== --}}
    <div class="card filter-card border-0 mb-4">
        <div class="card-body p-4">
            <div class="filter-heading mb-3">
                <div class="filter-heading-icon">
                    <i class="bi bi-funnel-fill"></i>
                </div>
                <div>
                    <h6>Filter dan Pencarian</h6>
                    <p>Temukan pesan berdasarkan kata kunci dan status.</p>
                </div>
            </div>

            <form action="{{ route('admin.saran.index') }}" method="GET">
                <div class="row g-3 align-items-end">

                    {{-- PENCARIAN --}}
                    <div class="col-lg-6 col-md-6">
                        <label class="form-label">Cari Pesan</label>
                        <div class="input-group search-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Nama pengirim atau isi pesan..."
                                value="{{ request('search') }}">
                        </div>
                    </div>

                    {{-- STATUS --}}
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Status Pesan</label>
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="baru" {{ request('status') === 'baru' ? 'selected' : '' }}>Baru</option>
                            <option value="dibaca" {{ request('status') === 'dibaca' ? 'selected' : '' }}>Dibaca</option>
                            <option value="dibalas" {{ request('status') === 'dibalas' ? 'selected' : '' }}>Dibalas</option>
                        </select>
                    </div>

                    {{-- TOMBOL --}}
                    <div class="col-lg-2 col-md-12">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-filter flex-grow-1">
                                <i class="bi bi-funnel me-1"></i> Filter
                            </button>
                            <a href="{{ route('admin.saran.index') }}"
                               class="btn btn-reset"
                               title="Reset filter">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>


    {{-- =====================================================
         TABEL DATA SARAN
    ====================================================== --}}
    <div class="card table-card border-0">
        <div class="card-header table-card-header">
            <div class="table-heading">
                <div class="table-heading-icon">
                    <i class="bi bi-inbox-fill"></i>
                </div>
                <div>
                    <h5>Daftar Saran & Pengaduan</h5>
                    <p>
                        Total data ditemukan:
                        <strong>{{ $saran->total() }}</strong> pesan
                    </p>
                </div>
            </div>

            <div class="table-header-badge">
                <i class="bi bi-database-check me-1"></i>
                Data Aspirasi
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th width="25%">Pengirim</th>
                            <th width="35%">Isi Pesan / Pertanyaan</th>
                            <th width="15%">Status</th>
                            <th width="15%">Tanggal</th>
                            <th class="text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($saran as $index => $item)
                            <tr>
                                {{-- NOMOR --}}
                                <td class="text-center">
                                    <span class="number-cell">
                                        {{ $saran->firstItem() + $index }}
                                    </span>
                                </td>

                                {{-- PENGIRIM --}}
                                <td>
                                    <div class="sender-name">
                                        <div class="sender-avatar">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <div class="sender-information">
                                            <strong>
                                                {{ $item->user->nama ?? $item->user->name ?? 'Pengguna tidak ditemukan' }}
                                            </strong>
                                            <small>
                                                {{ $item->user->email ?? '-' }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                {{-- ISI PESAN --}}
                                <td>
                                    <div class="isi-pesan">
                                        {{ Str::limit(strip_tags($item->isi_saran ?? $item->pesan ?? '-'), 90) }}
                                    </div>
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    @if($item->status === 'baru')
                                        <span class="badge badge-baru">
                                            <span class="status-dot"></span> Baru
                                        </span>
                                    @elseif($item->status === 'dibaca')
                                        <span class="badge badge-dibaca">
                                            <span class="status-dot"></span> Dibaca
                                        </span>
                                    @elseif($item->status === 'dibalas')
                                        <span class="badge badge-dibalas">
                                            <span class="status-dot"></span> Dibalas
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    @endif
                                </td>

                                {{-- TANGGAL --}}
                                <td>
                                    <div class="date-cell">
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </div>
                                    <small class="time-cell">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $item->created_at->format('H:i') }} WIB
                                    </small>
                                </td>

                                {{-- AKSI --}}
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.saran.show', $item->id) }}"
                                           class="btn-action btn-detail"
                                           title="Lihat detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <form action="{{ route('admin.saran.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn-action btn-hapus"
                                                    title="Hapus data">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i class="bi bi-inbox"></i>
                                        </div>
                                        <h6>Belum Ada Data</h6>
                                        <p>Belum ada saran atau pengaduan masyarakat yang ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        @if($saran->hasPages())
            <div class="card-footer table-card-footer">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <small>
                        Menampilkan
                        <strong>{{ $saran->firstItem() }}</strong>
                        sampai
                        <strong>{{ $saran->lastItem() }}</strong>
                        dari
                        <strong>{{ $saran->total() }}</strong> data
                    </small>
                    {{ $saran->links() }}
                </div>
            </div>
        @endif
    </div>

</div>


{{-- =====================================================
     CSS TEMA HIJAU SOFT
====================================================== --}}
<style>
    :root {
        --saran-dark: #285b46;
        --saran-green: #39765b;
        --saran-medium: #6c9b7d;
        --saran-soft: #eaf2ec;
        --saran-light: #f3f7f3;
        --saran-border: #dce8de;
        --saran-text: #34483c;
        --saran-muted: #7b8c80;
    }

    .halaman-saran {
        color: var(--saran-text);
    }

    /* HEADER */
    .header-saran {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 190px;
        padding: 30px 34px;
        overflow: hidden;
        border-radius: 18px;
        color: #fff;
        background: linear-gradient(120deg, #285b46 0%, #39765b 55%, #638e70 100%);
        box-shadow: 0 8px 22px rgba(40, 91, 70, .12);
    }

    .header-content {
        position: relative;
        z-index: 2;
    }

    .header-label {
        display: inline-block;
        margin-bottom: 9px;
        color: #dcebe0;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 1.6px;
    }

    .header-saran h3 {
        margin: 0 0 8px;
        color: #fff;
        font-size: 25px;
        font-weight: 750;
    }

    .header-saran p {
        margin: 0;
        color: rgba(255,255,255,.82);
        font-size: 12px;
    }

    .header-info {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 17px;
        padding: 7px 11px;
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 7px;
        background: rgba(255,255,255,.12);
        color: white;
        font-size: 10px;
    }

    .header-icon {
        position: relative;
        z-index: 2;
        margin-right: 35px;
        color: rgba(255,255,255,.25);
        font-size: 82px;
    }

    .header-decoration {
        position: absolute;
        border: 1px solid rgba(255,255,255,.09);
        border-radius: 50%;
    }

    .header-decoration-one {
        width: 210px;
        height: 210px;
        right: 100px;
        top: -100px;
    }

    .header-decoration-two {
        width: 150px;
        height: 150px;
        right: -30px;
        bottom: -90px;
    }

    /* FILTER & CARD */
    .filter-card,
    .table-card {
        border-radius: 16px !important;
        background: #fff;
        box-shadow: 0 4px 18px rgba(40, 91, 70, .045);
    }

    .filter-card {
        border: 1px solid var(--saran-border) !important;
    }

    .filter-heading {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .filter-heading-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 39px;
        height: 39px;
        border-radius: 11px;
        color: var(--saran-green);
        background: var(--saran-soft);
        font-size: 16px;
    }

    .filter-heading h6 {
        margin: 0 0 3px;
        color: var(--saran-dark);
        font-size: 13px;
        font-weight: 750;
    }

    .filter-heading p {
        margin: 0;
        color: var(--saran-muted);
        font-size: 10px;
    }

    .halaman-saran .form-label {
        margin-bottom: 7px;
        color: var(--saran-text);
        font-size: 11px;
        font-weight: 700;
    }

    .halaman-saran .form-control,
    .halaman-saran .form-select,
    .halaman-saran .input-group-text {
        min-height: 42px;
        border-color: var(--saran-border);
        color: var(--saran-text);
        font-size: 11px;
    }

    .halaman-saran .form-control,
    .halaman-saran .form-select {
        border-radius: 8px;
    }

    .halaman-saran .input-group-text {
        display: flex;
        align-items: center;
        background: var(--saran-light);
        color: var(--saran-medium);
        border-radius: 8px 0 0 8px;
    }

    .search-group .form-control {
        border-radius: 0 8px 8px 0;
    }

    .btn-filter {
        min-height: 42px;
        border: 0;
        border-radius: 8px;
        background: var(--saran-green);
        color: #fff;
        font-size: 11px;
        font-weight: 650;
        transition: .2s;
    }

    .btn-filter:hover {
        background: var(--saran-dark);
        color: #fff;
    }

    .btn-reset {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        min-width: 43px;
        min-height: 42px;
        border: 1px solid var(--saran-border);
        border-radius: 8px;
        background: var(--saran-light);
        color: var(--saran-green);
    }

    .btn-reset:hover {
        border-color: var(--saran-green);
        background: var(--saran-soft);
        color: var(--saran-dark);
    }

    /* TABLE */
    .table-card {
        border: 1px solid var(--saran-border) !important;
        overflow: hidden;
    }

    .table-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        padding: 20px 23px;
        border: 0;
        background: #fff;
    }

    .table-heading {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .table-heading-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        border-radius: 12px;
        color: var(--saran-green);
        background: var(--saran-soft);
        font-size: 19px;
    }

    .table-heading h5 {
        margin: 0 0 4px;
        color: var(--saran-dark);
        font-size: 14px;
        font-weight: 750;
    }

    .table-heading p {
        margin: 0;
        color: var(--saran-muted);
        font-size: 10px;
    }

    .table-heading strong {
        color: var(--saran-green);
    }

    .table-header-badge {
        padding: 8px 12px;
        border-radius: 20px;
        background: var(--saran-light);
        color: var(--saran-green);
        font-size: 10px;
        font-weight: 650;
    }

    .table {
        min-width: 900px;
    }

    .table thead th {
        padding: 15px 13px;
        border-top: 1px solid var(--saran-border);
        border-bottom: 1px solid var(--saran-border);
        background: var(--saran-light);
        color: var(--saran-dark);
        font-size: 10px;
        font-weight: 750;
        letter-spacing: .4px;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .table tbody td {
        padding: 14px 13px;
        border-color: #edf2ed;
        color: var(--saran-text);
        font-size: 11px;
    }

    .number-cell {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 27px;
        height: 27px;
        border-radius: 8px;
        background: var(--saran-soft);
        color: var(--saran-green);
        font-size: 10px;
        font-weight: 750;
    }

    /* PENGIRIM */
    .sender-name {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .sender-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        min-width: 34px;
        border-radius: 50%;
        background: var(--saran-soft);
        color: var(--saran-green);
        font-size: 15px;
    }

    .sender-information {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    .sender-information strong {
        color: var(--saran-text);
        font-size: 11px;
    }

    .sender-information small {
        color: var(--saran-muted);
        font-size: 9px;
    }

    /* BADGE */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 7px 10px;
        border-radius: 20px;
        font-size: 9px;
        font-weight: 700;
        white-space: nowrap;
    }

    .badge-baru {
        background: #f8f0da;
        color: #9b7930;
    }

    .badge-dibaca {
        background: #e9f0e9;
        color: #557b60;
    }

    .badge-dibalas {
        background: #dceee2;
        color: #34724e;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .isi-pesan {
        color: #64766a;
        font-size: 11px;
        line-height: 1.6;
    }

    .date-cell {
        color: var(--saran-text);
        font-size: 10px;
        font-weight: 650;
    }

    .time-cell {
        display: inline-block;
        margin-top: 4px;
        color: var(--saran-muted);
        font-size: 9px;
    }

    /* ACTION BUTTON */
    .action-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border: 0;
        border-radius: 8px;
        text-decoration: none;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-detail {
        background: var(--saran-soft);
        color: var(--saran-green);
    }

    .btn-detail:hover {
        background: var(--saran-green);
        color: #fff;
    }

    .btn-hapus {
        background: #f8e9e7;
        color: #b65e51;
    }

    .btn-hapus:hover {
        background: #b65e51;
        color: #fff;
    }

    /* EMPTY STATE */
    .empty-state {
        padding: 15px;
    }

    .empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 65px;
        height: 65px;
        margin: 0 auto 14px;
        border-radius: 20px;
        background: var(--saran-soft);
        color: var(--saran-medium);
        font-size: 30px;
    }

    .empty-state h6 {
        color: var(--saran-dark);
        font-size: 13px;
        font-weight: 750;
    }

    .empty-state p {
        margin: 0;
        color: var(--saran-muted);
        font-size: 11px;
    }

    /* FOOTER */
    .table-card-footer {
        padding: 16px 22px;
        border-top: 1px solid var(--saran-border);
        background: #fff;
    }

    .table-card-footer small {
        color: var(--saran-muted);
        font-size: 10px;
    }

    .table-card-footer strong {
        color: var(--saran-green);
    }
</style>
@endsection