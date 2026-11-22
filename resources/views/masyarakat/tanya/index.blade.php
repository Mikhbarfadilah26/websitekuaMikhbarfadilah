@extends('layouts.appmasyarakat')

@section('title', 'Tanya Admin | KUA Karang Baru')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="fw-bold text-primary">Tanya Admin KUA</h3>
            <p class="text-muted">Ajukan pertanyaan atau konsultasi seputar layanan KUA Kecamatan Karang Baru di sini.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        <!-- Form Kirim Pertanyaan -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold mb-3 text-primary">Buat Pertanyaan Baru</h5>
                <form action="{{ route('masyarakat.tanya.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="isi_saran" rows="5" class="form-control @error('isi_saran') is-invalid @enderror" placeholder="Tuliskan pertanyaan Anda secara jelas..." required>{{ old('isi_saran') }}</textarea>
                        @error('isi_saran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                        <i class="bi bi-send-fill me-2"></i> Kirim Pertanyaan
                    </button>
                </form>
            </div>
        </div>

        <!-- Riwayat Pertanyaan -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold mb-3 text-primary">Riwayat Konsultasi Anda</h5>

                @forelse($riwayatTanya as $tanya)
                    <div class="p-3 mb-3 border rounded-3 bg-light">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">
                                <i class="bi bi-clock me-1"></i> {{ $tanya->created_at->diffForHumans() }}
                            </small>
                            @if($tanya->status === 'dibalas')
                                <span class="badge bg-success">Sudah Dibalas</span>
                            @else
                                <span class="badge bg-warning text-dark">Menunggu Balasan</span>
                            @endif
                        </div>

                        <p class="mb-2 fw-semibold text-dark">
                            {{ $tanya->isi_saran }}
                        </p>

                        @if($tanya->tanggapan)
                            <div class="p-3 mt-2 bg-white border-start border-primary border-4 rounded shadow-sm">
                                <small class="text-primary fw-bold d-block mb-1">
                                    <i class="bi bi-patch-check-fill me-1"></i> Balasan Admin KUA:
                                </small>
                                <p class="mb-0 text-secondary" style="font-size: 13px; white-space: pre-line;">{{ $tanya->tanggapan }}</p>
                            </div>
                        @else
                            <p class="text-muted fst-italic mb-0" style="font-size: 12px;">
                                Belum ada balasan dari admin.
                            </p>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-chat-square-text fs-1 mb-2 d-block"></i>
                        <p>Belum ada pertanyaan yang diajukan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection