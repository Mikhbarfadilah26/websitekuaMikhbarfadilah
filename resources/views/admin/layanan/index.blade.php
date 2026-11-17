
@extends('layouts.appadmin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
            <h4 class="fw-bold mb-1">Kelola Layanan</h4>
            <p class="text-muted mb-0">Kelola informasi layanan KUA Karang Baru.</p>
        </div>

        <a href="{{ route('admin.layanan.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Layanan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <form action="{{ route('admin.layanan.index') }}" method="GET">
                <div class="row g-2">
                    <div class="col-md-5">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari judul atau isi layanan..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-search me-1"></i> Cari
                        </button>

                        <a href="{{ route('admin.layanan.index') }}"
                           class="btn btn-secondary">
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="60">No.</th>
                            <th width="120">Gambar</th>
                            <th>Judul Layanan</th>
                            <th>Isi Layanan</th>
                            <th width="150">Tanggal</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($layanan as $item)
                            <tr>
                                <td class="text-center">
                                    {{ $layanan->firstItem() + $loop->index }}
                                </td>

                                <td class="text-center">
                                    @if($item->gambar && file_exists(public_path('foto/layanan/' . $item->gambar)))
                                        <img
                                            src="{{ asset('foto/layanan/' . $item->gambar) }}"
                                            alt="{{ $item->judul }}"
                                            style="width:85px;height:65px;object-fit:cover;border-radius:8px;">
                                    @else
                                        <span class="text-muted small">Tidak ada gambar</span>
                                    @endif
                                </td>

                                <td>
                                    <strong>{{ $item->judul }}</strong>
                                    <div class="small text-muted">{{ $item->slug }}</div>
                                </td>

                                <td>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                                </td>

                                <td class="text-center">
                                    {{ $item->created_at ? $item->created_at->format('d-m-Y') : '-' }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('admin.layanan.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.layanan.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    Data layanan belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($layanan->hasPages())
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <small class="text-muted">
                        Menampilkan {{ $layanan->firstItem() ?? 0 }}
                        sampai {{ $layanan->lastItem() ?? 0 }}
                        dari {{ $layanan->total() }} data
                    </small>

                    {{ $layanan->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
