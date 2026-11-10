@extends('layouts.appmasyarakat')

@section('title', 'Berita KUA')

@section('page-title', 'Berita KUA')

@section('breadcrumb', 'Berita')


@section('content')

<div class="row g-4">

    @forelse($beritas as $berita)

        <div class="col-12 col-md-6 col-xl-4">

            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">


                {{-- FOTO --}}
                <div
                    style="
                        height: 210px;
                        background: #f1f5f9;
                        overflow: hidden;
                    ">

                    @if($berita->foto)

                        <img
                            src="{{ asset($berita->foto) }}"
                            alt="{{ $berita->judul }}"
                            style="
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                            ">

                    @else

                        <div
                            class="d-flex
                                   align-items-center
                                   justify-content-center
                                   h-100
                                   text-muted">

                            <i
                                class="bi bi-newspaper"
                                style="font-size: 55px;">
                            </i>

                        </div>

                    @endif

                </div>


                {{-- ISI CARD --}}
                <div class="card-body p-4">

                    <div class="mb-2">

                        <small class="text-muted">

                            <i class="bi bi-calendar3 me-1"></i>

                            {{ $berita->created_at?->format('d M Y') }}

                        </small>

                    </div>


                    <h5 class="fw-semibold mb-2">

                        {{ $berita->judul }}

                    </h5>


                    <p
                        class="text-muted mb-4"
                        style="
                            display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                        ">

                        {{ \Illuminate\Support\Str::limit(
                            strip_tags($berita->isi),
                            150
                        ) }}

                    </p>


                    <a
                        href="{{ route(
                            'masyarakat.berita.show',
                            $berita->slug
                        ) }}"
                        class="btn btn-primary">

                        Baca Selengkapnya

                        <i class="bi bi-arrow-right ms-1"></i>

                    </a>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div
                class="card border-0 shadow-sm rounded-4">

                <div
                    class="card-body text-center py-5">

                    <i
                        class="bi bi-newspaper text-muted"
                        style="font-size: 60px;">
                    </i>

                    <h5 class="mt-3">

                        Belum Ada Berita

                    </h5>

                    <p class="text-muted mb-0">

                        Berita KUA akan ditampilkan di halaman ini.

                    </p>

                </div>

            </div>

        </div>

    @endforelse

</div>

@endsection