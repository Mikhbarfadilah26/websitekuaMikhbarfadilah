@extends('layouts.appadmin')

@section('title', 'Kelola Pengajuan Masyarakat | Admin KUA')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-0">Kelola Pengajuan Masyarakat</h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Pemohon</th>
                        <th>Jenis Layanan / Keterangan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($daftarPengajuan as $index => $item)
                        <tr>
                            <td>{{ $daftarPengajuan->firstItem() + $index }}</td>
                            <td>
                                <strong>{{ $item->user->nama ?? 'Masyarakat' }}</strong><br>
                                <small class="text-muted">{{ $item->user->email ?? '-' }}</small>
                            </td>
                            <td>
                                {{-- Sesuaikan nama kolom jenis layanan/judul di tabel permohonan Anda --}}
                                <strong>{{ $item->jenis_layanan ?? $item->layanan->judul ?? 'Permohonan Layanan' }}</strong><br>
                                <small class="text-muted">{{ \Illuminate\Support\Str::limit($item->keterangan ?? '-', 60) }}</small>
                            </td>
                            <td>{{ $item->created_at->translatedFormat('d M Y') }}</td>
                            <td>
                                @if($item->status === 'disetujui' || $item->status === 'selesai')
                                    <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                                @elseif($item->status === 'ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal{{ $item->id }}">
                                    <i class="bi bi-pencil-square me-1"></i> Proses
                                </button>

                                <form action="{{ route('admin.pengajuan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengajuan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Update Status -->
                        <div class="modal fade" id="statusModal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.pengajuan.status', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">Proses Pengajuan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="p-3 bg-light rounded-3 mb-3">
                                                <small class="text-muted d-block">Pemohon:</small>
                                                <strong>{{ $item->user->nama ?? 'Masyarakat' }}</strong>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Ubah Status Pengajuan</label>
                                                <select name="status" class="form-select" required>
                                                    <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="disetujui" {{ $item->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                    <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                    <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada data pengajuan dari masyarakat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $daftarPengajuan->links() }}
        </div>
    </div>
</div>
@endsection