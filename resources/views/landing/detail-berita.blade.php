@extends('layouts.applanding')

@section('title', $berita->judul)

@section('content')

<style>

/* =========================================================
   HALAMAN DETAIL BERITA
========================================================= */

.news-detail-page {
    background: #ffffff;
    min-height: 100vh;
    padding: 125px 0 80px;
}


/* =========================================================
   BREADCRUMB
========================================================= */

.news-breadcrumb {
    font-size: 13px;
    color: #94a3b8;
    margin-bottom: 28px;
}

.news-breadcrumb a {
    color: #64748b;
    text-decoration: none;
    transition: .2s;
}

.news-breadcrumb a:hover {
    color: #0f766e;
}

.news-breadcrumb span {
    margin: 0 8px;
    color: #cbd5e1;
}


/* =========================================================
   GRID ARTIKEL + SIDEBAR
========================================================= */

.news-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 310px;
    gap: 55px;
    align-items: start;
}


/* =========================================================
   ARTIKEL
========================================================= */

.news-article {
    min-width: 0;
}


/* =========================================================
   KATEGORI
========================================================= */

.news-category {
    display: inline-flex;
    align-items: center;
    color: #0f766e;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 14px;
}

.news-category::before {
    content: "";
    width: 4px;
    height: 18px;
    background: #0f766e;
    border-radius: 5px;
    margin-right: 9px;
}


/* =========================================================
   JUDUL
========================================================= */

.news-title {
    font-size: clamp(32px, 4vw, 48px);
    line-height: 1.16;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -1px;
    margin: 0 0 18px;
}


/* =========================================================
   META
========================================================= */

.news-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    color: #64748b;
    font-size: 14px;
    margin-bottom: 28px;
}

.news-meta .author {
    font-weight: 700;
    color: #334155;
}

.news-meta .separator {
    color: #cbd5e1;
}

.news-meta i {
    margin-right: 5px;
    color: #94a3b8;
}


/* =========================================================
   GARIS
========================================================= */

.news-divider {
    height: 1px;
    background: #e2e8f0;
    margin-bottom: 28px;
}


/* =========================================================
   FOTO UTAMA
========================================================= */

.news-main-image {
    width: 100%;
    overflow: hidden;
    margin-bottom: 10px;
}

.news-main-image img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    object-position: center;
    display: block;
}


/* =========================================================
   CAPTION
========================================================= */

.news-image-caption {
    font-size: 12px;
    color: #94a3b8;
    margin-bottom: 30px;
}


/* =========================================================
   TIDAK ADA FOTO
========================================================= */

.news-no-image {
    height: 430px;
    background: linear-gradient(
        135deg,
        #f0fdfa,
        #ecfeff
    );
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
}

.news-no-image i {
    font-size: 70px;
    color: #0f766e;
}


/* =========================================================
   ISI BERITA
========================================================= */

.news-content {
    color: #334155;
    font-size: 17px;
    line-height: 1.9;
}

.news-content p {
    margin-bottom: 22px;
}

.news-content h2,
.news-content h3 {
    color: #0f172a;
    font-weight: 750;
    margin-top: 35px;
    margin-bottom: 15px;
}

.news-content img {
    max-width: 100%;
    height: auto;
}


/* =========================================================
   SHARE
========================================================= */

.news-share {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 40px;
    padding-top: 25px;
    border-top: 1px solid #e2e8f0;
}

.news-share-label {
    font-size: 14px;
    font-weight: 700;
    color: #475569;
    margin-right: 5px;
}

.share-button {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #475569;
    background: #fff;
    text-decoration: none;
    transition: .25s;
}

.share-button:hover {
    background: #0f766e;
    color: #fff;
    border-color: #0f766e;
    transform: translateY(-2px);
}


/* =========================================================
   TOMBOL KEMBALI
========================================================= */

.news-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 35px;
    color: #0f766e;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: .2s;
}

.news-back:hover {
    color: #115e59;
    transform: translateX(-4px);
}


/* =========================================================
   SIDEBAR
========================================================= */

.news-sidebar {
    position: sticky;
    top: 110px;
}

.sidebar-title {
    font-size: 24px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 20px;
    padding-bottom: 13px;
    border-bottom: 2px solid #0f766e;
}


/* =========================================================
   SIDEBAR ITEM
========================================================= */

.sidebar-item {
    display: flex;
    gap: 13px;
    padding: 15px 0;
    border-bottom: 1px solid #e2e8f0;
}

.sidebar-number {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0fdfa;
    color: #0f766e;
    font-size: 14px;
    font-weight: 800;
    border-radius: 9px;
}

.sidebar-item-content {
    min-width: 0;
}

.sidebar-item-content h4 {
    font-size: 15px;
    line-height: 1.45;
    font-weight: 700;
    margin: 0 0 7px;
}

.sidebar-item-content h4 a {
    color: #334155;
    text-decoration: none;
    transition: .2s;
}

.sidebar-item-content h4 a:hover {
    color: #0f766e;
}

.sidebar-date {
    color: #94a3b8;
    font-size: 11px;
}

.sidebar-date i {
    margin-right: 4px;
}


/* =========================================================
   INFO SIDEBAR
========================================================= */

.sidebar-info {
    margin-top: 30px;
    padding: 25px;
    background: #f8fafc;
    border-left: 4px solid #0f766e;
}

.sidebar-info h4 {
    font-size: 17px;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 8px;
}

.sidebar-info p {
    font-size: 13px;
    line-height: 1.7;
    color: #64748b;
    margin: 0;
}


/* =========================================================
   RESPONSIVE TABLET
========================================================= */

@media (max-width: 991px) {

    .news-layout {
        grid-template-columns: 1fr;
        gap: 45px;
    }

    .news-sidebar {
        position: static;
    }

    .news-title {
        font-size: 38px;
    }

}


/* =========================================================
   RESPONSIVE HP
========================================================= */

@media (max-width: 768px) {

    .news-detail-page {
        padding: 105px 15px 60px;
    }

    .news-breadcrumb {
        margin-bottom: 20px;
    }

    .news-title {
        font-size: 30px;
        letter-spacing: -.5px;
    }

    .news-meta {
        font-size: 12px;
    }

    .news-main-image img {
        height: 280px;
    }

    .news-no-image {
        height: 280px;
    }

    .news-content {
        font-size: 16px;
        line-height: 1.8;
    }

    .news-sidebar {
        margin-top: 10px;
    }

}


/* =========================================================
   HP KECIL
========================================================= */

@media (max-width: 480px) {

    .news-detail-page {
        padding-left: 12px;
        padding-right: 12px;
    }

    .news-title {
        font-size: 27px;
    }

    .news-main-image img {
        height: 230px;
    }

    .news-content {
        font-size: 15.5px;
    }

}

</style>


<div class="news-detail-page">

    <div class="container">

        {{-- =================================================
             BREADCRUMB
        ================================================== --}}

        <div class="news-breadcrumb">

            <a href="{{ url('/beranda') }}">
                Beranda
            </a>

            <span>/</span>

            <a href="{{ route('landing.berita') }}">
                Berita
            </a>

            <span>/</span>

            <span>
                Detail
            </span>

        </div>


        {{-- =================================================
             LAYOUT ARTIKEL + SIDEBAR
        ================================================== --}}

        <div class="news-layout">


            {{-- =================================================
                 ARTIKEL UTAMA
            ================================================== --}}

            <article class="news-article">

                {{-- KATEGORI --}}

                <div class="news-category">
                    Berita KUA
                </div>


                {{-- JUDUL --}}

                <h1 class="news-title">
                    {{ $berita->judul }}
                </h1>


                {{-- META --}}

                <div class="news-meta">

                    <span class="author">
                        <i class="fas fa-user"></i>
                        Admin KUA
                    </span>

                    <span class="separator">
                        •
                    </span>

                    <span>
                        <i class="far fa-calendar"></i>

                        {{ $berita->created_at->translatedFormat('l, d F Y') }}
                    </span>

                    <span class="separator">
                        •
                    </span>

                    <span>
                        <i class="far fa-clock"></i>

                        {{ $berita->created_at->format('H:i') }} WIB
                    </span>

                </div>


                {{-- GARIS --}}

                <div class="news-divider"></div>


                {{-- =================================================
                     FOTO BERITA
                ================================================== --}}

                @if($berita->foto)

                    <div class="news-main-image">

                        {{-- FOTO LANGSUNG DARI PUBLIC --}}

                        <img
                            src="{{ asset($berita->foto) }}"
                            alt="{{ $berita->judul }}"
                            onerror="this.style.display='none';">

                    </div>

                    <div class="news-image-caption">
                        Foto: Dokumentasi KUA Karang Baru
                    </div>

                @else

                    <div class="news-no-image">

                        <i class="fas fa-newspaper"></i>

                    </div>

                @endif


                {{-- =================================================
                     ISI BERITA
                ================================================== --}}

                <div class="news-content">

                    {!! nl2br(e($berita->isi)) !!}

                </div>


                {{-- =================================================
                     SHARE
                ================================================== --}}

                <div class="news-share">

                    <span class="news-share-label">
                        Bagikan:
                    </span>

                    <a
                        href="#"
                        class="share-button"
                        onclick="shareFacebook(event)"
                        title="Bagikan ke Facebook">

                        <i class="fab fa-facebook-f"></i>

                    </a>

                    <a
                        href="#"
                        class="share-button"
                        onclick="shareWhatsApp(event)"
                        title="Bagikan ke WhatsApp">

                        <i class="fab fa-whatsapp"></i>

                    </a>

                    <a
                        href="#"
                        class="share-button"
                        onclick="copyNewsLink(event)"
                        title="Salin tautan">

                        <i class="fas fa-link"></i>

                    </a>

                </div>


                {{-- =================================================
                     KEMBALI
                ================================================== --}}

                <a
                    href="{{ route('landing.berita') }}"
                    class="news-back">

                    <i class="fas fa-arrow-left"></i>

                    Kembali ke Berita

                </a>

            </article>


            {{-- =================================================
                 SIDEBAR
                 DATA DARI DATABASE
            ================================================== --}}

            <aside class="news-sidebar">

                <div class="sidebar-title">
                    Berita Terbaru
                </div>


                {{-- =================================================
                     LOOP BERITA DARI DATABASE
                ================================================== --}}

                @forelse($beritaTerbaru as $index => $item)

                    <div class="sidebar-item">

                        <div class="sidebar-number">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <div class="sidebar-item-content">

                            <h4>

                                <a
                                    href="{{ route('berita.detail', $item->slug) }}">

                                    {{ $item->judul }}

                                </a>

                            </h4>

                            <div class="sidebar-date">

                                <i class="far fa-calendar"></i>

                                {{ $item->created_at->translatedFormat('d F Y') }}

                            </div>

                        </div>

                    </div>

                @empty

                    <div style="
                        padding:20px 0;
                        color:#94a3b8;
                        font-size:14px;
                    ">

                        Belum ada berita lainnya.

                    </div>

                @endforelse


                {{-- =================================================
                     INFO KUA
                ================================================== --}}

                <div class="sidebar-info">

                    <h4>
                        KUA Karang Baru
                    </h4>

                    <p>
                        Menyediakan informasi dan pelayanan
                        keagamaan bagi masyarakat Kecamatan
                        Karang Baru.
                    </p>

                </div>

            </aside>

        </div>

    </div>

</div>


{{-- =========================================================
     SCRIPT SHARE
========================================================= --}}

<script>

function shareFacebook(event) {

    event.preventDefault();

    const url = encodeURIComponent(
        window.location.href
    );

    window.open(
        'https://www.facebook.com/sharer/sharer.php?u=' + url,
        '_blank',
        'width=600,height=500'
    );
}


function shareWhatsApp(event) {

    event.preventDefault();

    const url = encodeURIComponent(
        window.location.href
    );

    const text = encodeURIComponent(
        @json($berita->judul)
    );

    window.open(
        'https://wa.me/?text=' + text + '%0A' + url,
        '_blank'
    );
}


function copyNewsLink(event) {

    event.preventDefault();

    navigator.clipboard.writeText(
        window.location.href
    ).then(function() {

        alert('Tautan berita berhasil disalin.');

    }).catch(function() {

        alert('Gagal menyalin tautan.');

    });

}

</script>

@endsection