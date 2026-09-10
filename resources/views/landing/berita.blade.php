@extends('layouts.applanding')

@section('content')

<style>
    .berita-page {
        background: #f8fafc;
        min-height: 100vh;
    }

    .berita-hero {
        padding: 140px 0 80px;
        text-align: center;
        background:
            radial-gradient(circle at top right,
                rgba(37, 99, 235, .15),
                transparent 35%),
            linear-gradient(135deg,
                #eff6ff,
                #ffffff);
    }

    .berita-badge {
        display: inline-flex;
        align-items: center;
        padding: 9px 20px;
        border-radius: 50px;
        background: #dbeafe;
        color: #2563eb;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .berita-hero h1 {
        font-size: clamp(38px, 5vw, 55px);
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 18px;
    }

    .berita-hero h1 span {
        color: #2563eb;
    }

    .berita-hero p {
        max-width: 750px;
        margin: auto;
        color: #64748b;
        line-height: 1.8;
        font-size: 17px;
    }

    .berita-section {
        padding: 80px 0;
    }

    .berita-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 25px;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .06);
        transition: all .35s ease;
    }

    .berita-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 55px rgba(15, 23, 42, .11);
        border-color: #bfdbfe;
    }

    .berita-image {
        height: 210px;
        background:
            linear-gradient(135deg,
                #dbeafe,
                #eff6ff);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2563eb;
        font-size: 55px;
        overflow: hidden;
    }

    .berita-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .berita-body {
        padding: 30px;
    }

    .berita-date {
        color: #2563eb;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .berita-card h3 {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 12px;
    }

    .berita-card p {
        color: #64748b;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .berita-link {
        color: #2563eb;
        text-decoration: none;
        font-weight: 600;
    }

    .berita-link:hover {
        color: #1d4ed8;
    }

    .info-card {
        margin-top: 50px;
        padding: 35px;
        border-radius: 25px;
        background: white;
        border: 1px solid #e2e8f0;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .05);
    }

    .empty-berita {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 25px;
        padding: 60px 30px;
        text-align: center;
        box-shadow: 0 15px 40px rgba(15, 23, 42, .05);
    }

    .empty-berita i {
        font-size: 55px;
        color: #94a3b8;
        margin-bottom: 20px;
    }

    .empty-berita h4 {
        color: #0f172a;
        font-weight: 700;
    }

    .empty-berita p {
        color: #64748b;
    }

    @media (max-width: 768px) {
        .berita-hero {
            padding-top: 120px;
        }

        .berita-section {
            padding: 60px 0;
        }

        .berita-body {
            padding: 25px;
        }
    }
</style>

<div class="berita-page">

    {{-- =================================================
     HERO
================================================== --}}
    <section class="berita-hero">

        <div class="container">

            <span class="berita-badge">
                <i class="fas fa-newspaper me-2"></i>
                Berita & Informasi
            </span>

            <h1>
                Informasi
                <span>KUA Karang Baru</span>
            </h1>

            <p>
                Informasi kegiatan, pengumuman, dan berbagai
                informasi pelayanan KUA Kecamatan Karang Baru
                untuk masyarakat.
            </p>

        </div>

    </section>


    {{-- =================================================
     DAFTAR BERITA DARI DATABASE
================================================== --}}
    <section class="berita-section">

        <div class="container">

            <div class="row g-4">

                @forelse($berita as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="berita-card">

                        {{-- =================================================
                             FOTO BERITA DARI PUBLIC
                        ================================================== --}}
                        <div class="berita-image">

                            @php
                            /*
                            | Jika database menyimpan bimwin.jpg,
                            | gunakan file public/bimbingan1.jpg
                            */
                            if ($item->foto === 'bimwin.jpg') {
                            $fotoPublic = 'bimbingan1.jpg';
                            } else {
                            $fotoPublic = $item->foto;
                            }

                            $fotoPath = public_path($fotoPublic);
                            @endphp

                            @if($fotoPublic && file_exists($fotoPath))

                            <img
                                src="{{ asset($fotoPublic) }}"
                                alt="{{ $item->judul }}">

                            @else

                            <i class="fas fa-newspaper"></i>

                            @endif

                        </div>


                        {{-- =================================================
                             ISI BERITA
                        ================================================== --}}
                        <div class="berita-body">

                            <div class="berita-date">

                                <i class="fas fa-calendar me-1"></i>

                                {{ $item->created_at->format('d M Y') }}

                            </div>


                            <h3>
                                {{ $item->judul }}
                            </h3>


                            <p>

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->isi),
                                    120
                                ) }}

                            </p>


                            {{-- DETAIL --}}
                            <a
                                href="{{ route('berita.detail', $item->slug) }}"
                                class="berita-link">

                                Baca Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

                @empty

                {{-- JIKA BELUM ADA BERITA --}}
                <div class="col-12">

                    <div class="empty-berita">

                        <i class="fas fa-newspaper"></i>

                        <h4>
                            Belum Ada Berita
                        </h4>

                        <p class="mb-0">

                            Belum ada berita atau informasi
                            yang dipublikasikan oleh KUA
                            Kecamatan Karang Baru.

                        </p>

                    </div>

                </div>

                @endforelse

            </div>



        </div>

    </section>
</div>

@endsection