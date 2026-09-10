@extends('layouts.applanding')

@section('title', $layanan->judul)

@section('content')

{{-- =========================================================
     HALAMAN DETAIL LAYANAN KUA
========================================================= --}}

<div class="layanan-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <section class="layanan-header">
        <div class="container">
            <div class="layanan-header-content">
                <div class="layanan-icon">
                    <i class="fas fa-mosque"></i>
                </div>

                <h1>{{ $layanan->judul }}</h1>
                <p>Layanan KUA Kecamatan Karang Baru</p>
            </div>
        </div>
    </section>

    {{-- =====================================================
         CONTENT
    ====================================================== --}}
    <section class="layanan-content-section">
        <div class="container">
            <div class="row g-4">

                {{-- =================================================
                     ISI UTAMA
                ================================================== --}}
                <div class="col-lg-8">
                    <article class="layanan-card">
                        <header class="layanan-card-header">
                            <div class="header-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div>
                                <span class="badge-category">INFORMASI LAYANAN</span>
                                <h2>{{ $layanan->judul }}</h2>
                            </div>
                        </header>

                        <div class="layanan-card-body">
                            {!! $layanan->isi !!}
                        </div>
                    </article>
                </div>

                {{-- =================================================
                     SIDEBAR LAYANAN LAINNYA
                ================================================== --}}
                <div class="col-lg-4">
                    <aside class="layanan-sidebar">
                        <div class="sidebar-title">
                            <i class="fas fa-concierge-bell"></i>
                            <span>LAYANAN LAINNYA</span>
                        </div>

                        <nav class="sidebar-list">
                            @foreach($layananLainnya as $item)
                                <a href="{{ route('layanan.show', $item->id) }}" 
                                   class="sidebar-item {{ request()->route('id') == $item->id ? 'active' : '' }}">
                                    <span class="sidebar-arrow">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="sidebar-text">{{ $item->judul }}</span>
                                </a>
                            @endforeach
                        </nav>
                    </aside>
                </div>

            </div>
        </div>
    </section>

</div>

{{-- =========================================================
     STYLE
========================================================= --}}
<style>
.layanan-page {
    background: #f8fafc;
    min-height: calc(100vh - 100px);
}

/* =========================================================
   HEADER & JARAK DARI NAVBAR
========================================================= */
.layanan-header {
    background: linear-gradient(135deg, #0f1c2e 0%, #162b43 100%);
    /* Menambah padding-top (80px) agar memberi jarak aman dari Navbar */
    padding: 80px 0 70px 0; 
    position: relative;
    overflow: hidden;
}

.layanan-header::before {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .03);
    top: -150px;
    right: -80px;
    pointer-events: none;
}

.layanan-header::after {
    content: "";
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: rgba(25, 191, 216, .05);
    bottom: -100px;
    left: -50px;
    pointer-events: none;
}

.layanan-header-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

/* =========================================================
   ICON & TITLE HEADER
========================================================= */
.layanan-icon {
    width: 70px;
    height: 70px;
    /* Memberikan margin-top 15px & margin-bottom 20px agar lega */
    margin: 15px auto 20px auto;
    border-radius: 50%;
    background: #19bfcf;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 30px;
    box-shadow: 0 8px 25px rgba(25, 191, 207, .3);
}

.layanan-header h1 {
    color: #ffffff;
    font-size: 32px;
    font-weight: 700;
    margin: 0 auto 12px;
    max-width: 800px;
    line-height: 1.3;
}

.layanan-header p {
    color: rgba(255, 255, 255, .75);
    margin: 0;
    font-size: 15px;
    letter-spacing: .5px;
}

/* =========================================================
   CONTENT SECTION
========================================================= */
.layanan-content-section {
    padding: 50px 0 80px;
}

/* =========================================================
   CARD UTAMA
========================================================= */
.layanan-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(15, 28, 46, .05);
    border: 1px solid #e2e8f0;
}

.layanan-card-header {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 28px 32px;
    border-bottom: 1px solid #f1f5f9;
}

.header-icon {
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    border-radius: 12px;
    background: #e6f7f9;
    color: #13afc1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.badge-category {
    display: inline-block;
    font-size: 11px;
    font-weight: 700;
    color: #13afc1;
    letter-spacing: 1.2px;
    margin-bottom: 2px;
}

.layanan-card-header h2 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
    color: #0f1c2e;
    line-height: 1.4;
}

/* =========================================================
   ISI KONTEN
========================================================= */
.layanan-card-body {
    padding: 32px;
    color: #334155;
    font-size: 16px;
    line-height: 1.8;
}

.layanan-card-body p {
    margin-bottom: 20px;
}

.layanan-card-body h1,
.layanan-card-body h2,
.layanan-card-body h3,
.layanan-card-body h4 {
    color: #0f1c2e;
    font-weight: 700;
    margin-top: 30px;
    margin-bottom: 15px;
}

.layanan-card-body ul,
.layanan-card-body ol {
    padding-left: 24px;
    margin-bottom: 24px;
}

.layanan-card-body li {
    margin-bottom: 10px;
}

.layanan-card-body img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 15px 0;
}

/* =========================================================
   SIDEBAR
========================================================= */
.layanan-sidebar {
    background: #0f1c2e;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(15, 28, 46, .1);
    position: sticky;
    top: 100px; /* Disesuaikan agar saat scroll tidak tertutup navbar */
}

.sidebar-title {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 22px 25px;
    color: #ffffff;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 1px;
    border-bottom: 1px solid rgba(255, 255, 255, .08);
}

.sidebar-title i {
    color: #19bfcf;
    font-size: 18px;
}

.sidebar-list {
    padding: 10px 0;
}

.sidebar-item {
    display: flex;
    align-items: center;
    gap: 14px;
    color: #cbd5e1;
    text-decoration: none;
    padding: 14px 25px;
    font-size: 14px;
    line-height: 1.5;
    border-bottom: 1px solid rgba(255, 255, 255, .04);
    transition: all .25s ease;
}

.sidebar-item:last-child {
    border-bottom: none;
}

.sidebar-item:hover,
.sidebar-item.active {
    background: rgba(255, 255, 255, .08);
    color: #19bfcf;
    padding-left: 30px;
}

.sidebar-arrow {
    color: #19bfcf;
    font-size: 12px;
    flex-shrink: 0;
    transition: transform .25s ease;
}

.sidebar-item:hover .sidebar-arrow {
    transform: translateX(3px);
}

.sidebar-text {
    flex: 1;
    font-weight: 500;
}

/* =========================================================
   RESPONSIVE
========================================================= */
@media (max-width: 991px) {
    .layanan-sidebar {
        position: static;
        margin-top: 15px;
    }
}

@media (max-width: 768px) {
    .layanan-header {
        padding: 60px 0 45px 0;
    }

    .layanan-header h1 {
        font-size: 24px;
    }

    .layanan-content-section {
        padding: 35px 0 50px;
    }

    .layanan-card-header {
        padding: 20px;
    }

    .layanan-card-body {
        padding: 20px;
        font-size: 15px;
    }
}
</style>

@endsection