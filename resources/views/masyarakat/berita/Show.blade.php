@extends('layouts.appmasyarakat')

@section('title', $berita->judul . ' | Detail Berita KUA')

@section('content')

@php
    use Illuminate\Support\Str;

    // Tanggal berita
    $tanggalBerita = $berita->created_at
        ? $berita->created_at->translatedFormat('d F Y')
        : '-';

    // Foto berita
    $fotoBerita = $berita->foto ?? null;

    if ($fotoBerita) {
        $fotoBerita = trim(str_replace('\\', '/', $fotoBerita));

        if (
            !str_starts_with($fotoBerita, 'http://') &&
            !str_starts_with($fotoBerita, 'https://')
        ) {
            $fotoBerita = ltrim($fotoBerita, '/');
            $fotoBerita = preg_replace('/^public\//', '', $fotoBerita);

            if (str_starts_with($fotoBerita, 'foto/berita/')) {
                // Path sudah benar
            } elseif (str_starts_with($fotoBerita, 'foto/')) {
                $fotoBerita = 'foto/berita/' . basename($fotoBerita);
            } else {
                $fotoBerita = 'foto/berita/' . basename($fotoBerita);
            }
        }
    }
@endphp


{{-- =========================================================
     HEADER DETAIL BERITA
========================================================= --}}

<section class="mn-news-header">

    <div class="mn-header-container">

        {{-- BREADCRUMB --}}
        <div class="mn-breadcrumb">

            <a href="{{ route('masyarakat.dashboard') }}">
                <i class="bi bi-house-door"></i>
                Dashboard
            </a>

            <i class="bi bi-chevron-right"></i>

            <a href="{{ route('masyarakat.berita') }}">
                Berita
            </a>

            <i class="bi bi-chevron-right"></i>

            <span>Detail Berita</span>

        </div>

        {{-- HEADER CONTENT --}}
        <div class="mn-header-content">

            <div class="mn-header-label">
                <i class="bi bi-newspaper"></i>
                Informasi KUA Karang Baru
            </div>

            <h1>{{ $berita->judul }}</h1>

            <div class="mn-header-meta">

                <span>
                    <i class="bi bi-calendar3"></i>
                    {{ $tanggalBerita }}
                </span>

                <span>
                    <i class="bi bi-building"></i>
                    KUA Kecamatan Karang Baru
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     KONTEN DETAIL BERITA FULL WIDTH
========================================================= --}}

<section class="mn-news-section">

    <div class="mn-news-container">

        <article class="mn-article-card">

            {{-- FOTO BERITA --}}
            @if($fotoBerita)

                <div class="mn-article-image">

                    <img
                        src="{{ str_starts_with($fotoBerita, 'http') ? $fotoBerita : asset($fotoBerita) }}"
                        alt="{{ $berita->judul }}"
                        onerror="this.parentElement.style.display='none'"
                    >

                    <div class="mn-image-overlay"></div>

                    <div class="mn-image-caption">
                        <i class="bi bi-building"></i>
                        KUA Kecamatan Karang Baru
                    </div>

                </div>

            @else

                <div class="mn-article-placeholder">

                    <i class="bi bi-image"></i>

                    <span>Foto berita belum tersedia</span>

                </div>

            @endif


            {{-- ISI BERITA --}}
            <div class="mn-article-body">

                {{-- INFORMASI BERITA --}}
                <div class="mn-article-meta">

                    <span>
                        <i class="bi bi-calendar-event"></i>
                        {{ $tanggalBerita }}
                    </span>

                    <span class="mn-category">
                        <i class="bi bi-bookmark-fill"></i>
                        Berita KUA
                    </span>

                </div>


                {{-- JUDUL --}}
                <h2>{{ $berita->judul }}</h2>

                <div class="mn-title-decoration"></div>


                {{-- ISI --}}
                <div class="mn-article-text">

                    {!! $berita->isi !!}

                </div>


                {{-- BAGIKAN BERITA --}}
                <div class="mn-share">

                    <span class="mn-share-label">
                        Bagikan berita:
                    </span>

                    {{-- FACEBOOK --}}
                    <a
                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mn-share-btn facebook"
                        title="Bagikan ke Facebook"
                    >
                        <i class="bi bi-facebook"></i>
                    </a>


                    {{-- WHATSAPP --}}
                    <a
                        href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mn-share-btn whatsapp"
                        title="Bagikan ke WhatsApp"
                    >
                        <i class="bi bi-whatsapp"></i>
                    </a>


                    {{-- SALIN LINK --}}
                    <button
                        type="button"
                        onclick="salinLinkBeritaMasyarakat()"
                        class="mn-share-btn copy"
                        title="Salin tautan"
                    >
                        <i class="bi bi-link-45deg"></i>
                    </button>

                </div>

            </div>

        </article>


        {{-- TOMBOL KEMBALI --}}
        <div class="mn-back-area">

            <a href="{{ route('masyarakat.berita') }}" class="mn-back-btn">

                <i class="bi bi-arrow-left"></i>

                Kembali ke Daftar Berita

            </a>

        </div>

    </div>

</section>


{{-- =========================================================
     JAVASCRIPT SALIN LINK
========================================================= --}}

<script>
    function salinLinkBeritaMasyarakat() {

        navigator.clipboard.writeText(window.location.href)
            .then(function () {
                alert('Tautan berita berhasil disalin.');
            })
            .catch(function () {
                alert('Tidak dapat menyalin tautan berita.');
            });

    }
</script>


{{-- =========================================================
     CSS DETAIL BERITA FULL WIDTH
========================================================= --}}

<style>

:root {
    --mn-green: #28794b;
    --mn-green-dark: #205f3b;
    --mn-green-soft: #edf6ef;
    --mn-text: #34483a;
    --mn-muted: #7b8b80;
    --mn-border: #e4ece6;
}


/* =========================================================
   HEADER
========================================================= */

.mn-news-header {
    width: 100%;
    background: linear-gradient(135deg, #eaf5ec, #f6faf6);
    padding: 40px 0 50px;
}

.mn-header-container {
    width: 100%;
    padding: 0 4%;
}

.mn-breadcrumb {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    font-size: 12px;
    color: #8b998e;
    margin-bottom: 25px;
}

.mn-breadcrumb a {
    color: var(--mn-green);
    text-decoration: none;
}

.mn-breadcrumb a:hover {
    text-decoration: underline;
}

.mn-breadcrumb .bi-chevron-right {
    font-size: 10px;
}

.mn-header-content {
    width: 100%;
}

.mn-header-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #dcefe1;
    color: var(--mn-green);
    padding: 8px 15px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 800;
    margin-bottom: 17px;
}

.mn-header-content h1 {
    color: #244b32;
    font-size: clamp(25px, 3.5vw, 40px);
    line-height: 1.45;
    font-weight: 800;
    margin-bottom: 20px;
    overflow-wrap: anywhere;
}

.mn-header-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    color: #718277;
    font-size: 12px;
}

.mn-header-meta span {
    display: inline-flex;
    align-items: center;
    gap: 7px;
}


/* =========================================================
   MAIN SECTION - FULL WIDTH
========================================================= */

.mn-news-section {
    width: 100%;
    padding: 35px 0 60px;
    background: #f7faf7;
}

.mn-news-container {
    width: 100%;
    max-width: 100%;
    padding: 0 3%;
    margin: 0 auto;
}


/* =========================================================
   ARTICLE CARD
========================================================= */

.mn-article-card {
    width: 100%;
    background: #ffffff;
    border: 1px solid var(--mn-border);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 7px 28px rgba(35, 75, 48, .045);
}


/* =========================================================
   FOTO BERITA
========================================================= */

.mn-article-image {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
    background: #eaf2eb;
}

.mn-article-image img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
    transition: transform .5s ease;
}

.mn-article-card:hover .mn-article-image img {
    transform: scale(1.015);
}

.mn-image-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(20, 43, 28, .55),
        transparent 50%
    );
    pointer-events: none;
}

.mn-image-caption {
    position: absolute;
    bottom: 20px;
    left: 25px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 30px;
    background: rgba(25, 52, 35, .48);
    color: #ffffff;
    backdrop-filter: blur(8px);
    font-size: 11px;
    font-weight: 700;
}


/* FOTO KOSONG */

.mn-article-placeholder {
    width: 100%;
    height: 350px;
    background: linear-gradient(135deg, #eaf4eb, #f4f9f4);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    color: #8eaf95;
}

.mn-article-placeholder i {
    font-size: 58px;
}

.mn-article-placeholder span {
    font-size: 13px;
    font-weight: 600;
}


/* =========================================================
   BODY BERITA
========================================================= */

.mn-article-body {
    width: 100%;
    padding: 40px 5%;
}

.mn-article-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 13px;
    color: #849187;
    font-size: 12px;
    margin-bottom: 20px;
}

.mn-article-meta span {
    display: inline-flex;
    align-items: center;
    gap: 7px;
}

.mn-article-meta i {
    color: var(--mn-green);
}

.mn-category {
    background: #edf6ef;
    color: var(--mn-green) !important;
    border-radius: 30px;
    padding: 7px 12px;
    font-size: 10px;
    font-weight: 800;
}


/* JUDUL */

.mn-article-body h2 {
    color: #294b35;
    font-size: 30px;
    line-height: 1.5;
    font-weight: 800;
    margin-bottom: 22px;
    overflow-wrap: anywhere;
}

.mn-title-decoration {
    width: 58px;
    height: 4px;
    background: linear-gradient(90deg, #28794b, #9ac5a2);
    border-radius: 10px;
    margin-bottom: 27px;
}


/* =========================================================
   ISI BERITA
========================================================= */

.mn-article-text {
    width: 100%;
    color: #45574a;
    font-size: 15px;
    line-height: 2;
    text-align: justify;
    overflow-wrap: anywhere;
}

.mn-article-text p {
    margin-bottom: 18px;
}

.mn-article-text h2,
.mn-article-text h3,
.mn-article-text h4 {
    color: #31543a;
    margin-top: 25px;
    margin-bottom: 14px;
}

.mn-article-text img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
}

.mn-article-text table {
    max-width: 100%;
    width: 100%;
    border-collapse: collapse;
}

.mn-article-text iframe {
    max-width: 100%;
}


/* =========================================================
   BAGIKAN BERITA
========================================================= */

.mn-share {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 11px;
    margin-top: 35px;
    padding-top: 23px;
    border-top: 1px solid var(--mn-border);
}

.mn-share-label {
    color: #526357;
    font-size: 12px;
    font-weight: 700;
    margin-right: 5px;
}

.mn-share-btn {
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 50%;
    background: #edf6ef;
    color: var(--mn-green);
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    transition: .2s ease;
}

.mn-share-btn:hover {
    background: var(--mn-green);
    color: #ffffff;
    transform: translateY(-3px);
}


/* =========================================================
   TOMBOL KEMBALI
========================================================= */

.mn-back-area {
    width: 100%;
    display: flex;
    justify-content: flex-start;
    margin-top: 25px;
}

.mn-back-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    background: #ffffff;
    color: var(--mn-green);
    border: 1px solid #dce9df;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    transition: .2s ease;
}

.mn-back-btn:hover {
    background: var(--mn-green);
    color: #ffffff;
    border-color: var(--mn-green);
    transform: translateY(-2px);
}


/* =========================================================
   RESPONSIVE TABLET
========================================================= */

@media (max-width: 991px) {

    .mn-article-image {
        height: 380px;
    }

    .mn-article-body {
        padding: 30px 4%;
    }

}


/* =========================================================
   RESPONSIVE HP
========================================================= */

@media (max-width: 767px) {

    .mn-header-container {
        padding: 0 5%;
    }

    .mn-news-header {
        padding: 30px 0 38px;
    }

    .mn-news-section {
        padding: 22px 0 40px;
    }

    .mn-news-container {
        padding: 0 3%;
    }

    .mn-header-content h1 {
        font-size: 25px;
    }

    .mn-header-meta {
        gap: 12px;
        font-size: 11px;
    }

    .mn-article-card {
        border-radius: 13px;
    }

    .mn-article-image {
        height: 250px;
    }

    .mn-image-caption {
        left: 13px;
        bottom: 13px;
        font-size: 10px;
        padding: 9px 12px;
    }

    .mn-article-body {
        padding: 22px 18px;
    }

    .mn-article-body h2 {
        font-size: 22px;
    }

    .mn-article-text {
        font-size: 14px;
        line-height: 1.9;
    }

    .mn-article-placeholder {
        height: 230px;
    }

    .mn-share {
        gap: 9px;
        margin-top: 25px;
    }

    .mn-share-label {
        width: 100%;
        margin-bottom: 3px;
    }

    .mn-share-btn {
        width: 38px;
        height: 38px;
    }

    .mn-back-btn {
        width: 100%;
    }

}

</style>

@endsection