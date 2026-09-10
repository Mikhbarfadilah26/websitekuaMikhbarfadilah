@extends('layouts.applanding')

@section('title', 'Hasil Pencarian')

@section('content')

<div class="container py-5">

    {{-- =================================================
    JUDUL
    ================================================== --}}

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Hasil Pencarian
        </h2>

        <p class="text-muted">
            Menampilkan hasil untuk:
            <strong>"{{ $keyword }}"</strong>
        </p>

    </div>


    {{-- =================================================
    HASIL LAYANAN
    ================================================== --}}

    @if($layanan->count() > 0)

        <div class="mb-5">

            <h4 class="fw-bold mb-3">

                <i class="fas fa-concierge-bell me-2"></i>

                Layanan KUA

            </h4>


            <div class="row g-4">

                @foreach($layanan as $item)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 shadow-sm border-0">

                            <div class="card-body">

                                <h5 class="fw-bold">
                                    {{ $item->judul }}
                                </h5>

                                <p class="text-muted">
                                    {{ \Illuminate\Support\Str::limit($item->isi, 150) }}
                                </p>

                                <a
                                    href="{{ route('landing.layanan') }}"
                                    class="btn btn-sm btn-primary">

                                    Lihat Layanan

                                    <i class="fas fa-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @endif


    {{-- =================================================
    HASIL BERITA
    ================================================== --}}

    @if($berita->count() > 0)

        <div class="mb-5">

            <h4 class="fw-bold mb-3">

                <i class="fas fa-newspaper me-2"></i>

                Berita

            </h4>


            <div class="row g-4">

                @foreach($berita as $item)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 shadow-sm border-0">

                            <div class="card-body">

                                <h5 class="fw-bold">
                                    {{ $item->judul }}
                                </h5>

                                <p class="text-muted">
                                    {{ \Illuminate\Support\Str::limit($item->isi, 150) }}
                                </p>

                                @if($item->slug)

                                    <a
                                        href="{{ route('berita.detail', $item->slug) }}"
                                        class="btn btn-sm btn-primary">

                                        Baca Berita

                                        <i class="fas fa-arrow-right ms-1"></i>

                                    </a>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @endif


    {{-- =================================================
    TIDAK ADA HASIL
    ================================================== --}}

    @if($layanan->count() == 0 && $berita->count() == 0)

        <div class="text-center py-5">

            <i class="fas fa-search fa-3x text-muted mb-3"></i>

            <h4 class="fw-bold">
                Data Tidak Ditemukan
            </h4>

            <p class="text-muted">

                Tidak ada layanan atau berita yang sesuai
                dengan pencarian
                <strong>"{{ $keyword }}"</strong>.

            </p>


            {{-- KEMBALI KE BERANDA --}}

            <a
                href="{{ route('landing.beranda') }}"
                class="btn btn-primary">

                <i class="fas fa-home me-1"></i>

                Kembali ke Beranda

            </a>

        </div>

    @endif

</div>

@endsection