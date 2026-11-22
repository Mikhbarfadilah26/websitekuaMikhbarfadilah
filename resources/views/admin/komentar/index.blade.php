@extends('layouts.appadmin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Kelola Komentar & Pertanyaan Berita</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Komentar Berita</li>
    </ol>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="bi bi-chat-dots-fill me-1"></i>
                Daftar Pertanyaan / Komentar dari Masyarakat
            </div>
            {{-- Form Pencarian & Filter Status --}}
            <form action="{{ route('admin.komentar.index') }}" method="GET" class="d-flex gap-2">
                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="belum" {{ request('status') == 'belum' ? 'selected' : '' }}>Belum Dibalas</option>
                    <option value="sudah" {{ request('status') == 'sudah' ? 'selected' : '' }}>Sudah Dibalas</option>
                </select>
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari komentar/berita..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-sm btn-primary" title="Cari">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Judul Berita</th>
                            <th width="15%">Pengguna</th>
                            <th width="25%">Isi Komentar / Pertanyaan</th>
                            <th width="25%">Tanggapan Admin</th>
                            <th width="10%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($komentar as $item)
                        @php
                            $namaPengguna = $item->user->nama ?? $item->user->nama_lengkap ?? $item->user->name ?? 'Pengguna Tidak Dikenal';
                        @endphp
                        <tr>
                            <td>{{ $komentar->firstItem() + $loop->index }}</td>
                            <td>
                                <a href="{{ route('berita.detail', $item->berita->slug ?? '#') }}" target="_blank" class="text-decoration-none">
                                    {{ $item->berita->judul ?? 'Berita Dihapus' }}
                                </a>
                            </td>
                            <td>
                                <strong>{{ $namaPengguna }}</strong><br>
                                <small class="text-muted">{{ $item->user->email ?? '-' }}</small>
                            </td>
                            <td>
                                <p class="mb-1">{{ $item->isi_komentar }}</p>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>{{ $item->created_at->diffForHumans() }}
                                </small>
                            </td>
                            <td>
                                @if($item->tanggapan)
                                    <div class="p-2 bg-light border rounded">
                                        <p class="mb-1 text-success small"><strong>Balasan Admin:</strong></p>
                                        <p class="mb-0">{{ $item->tanggapan }}</p>
                                    </div>
                                @else
                                    <span class="badge bg-warning text-dark">Belum Dibalas</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    {{-- Tombol Buka Modal Balas --}}
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#balasModal{{ $item->id }}" title="Balas">
                                        <i class="bi bi-reply-fill"></i>
                                    </button>

                                    {{-- Tombol Hapus (Tong Sampah) --}}
                                    <form action="{{ route('admin.komentar.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Balas Komentar --}}
                        <div class="modal fade" id="balasModal{{ $item->id }}" tabindex="-1" aria-labelledby="balasModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.komentar.balas', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="balasModalLabel{{ $item->id }}">Balas Pertanyaan Komentar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label text-muted small">Pertanyaan dari: <strong>{{ $namaPengguna }}</strong></label>
                                                <div class="p-2 bg-light border rounded small fst-italic">
                                                    "{{ $item->isi_komentar }}"
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggapan" class="form-label">Tanggapan / Balasan Admin <span class="text-danger">*</span></label>
                                                <textarea name="tanggapan" class="form-control @error('tanggapan') is-invalid @enderror" rows="4" required>{{ old('tanggapan', $item->tanggapan) }}</textarea>
                                                @error('tanggapan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary btn-sm">Kirim Tanggapan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Belum ada komentar atau pertanyaan masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-end mt-3">
                {{ $komentar->links() }}
            </div>
        </div>
    </div>
</div>
@endsection