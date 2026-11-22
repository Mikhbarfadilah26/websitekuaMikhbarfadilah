
@extends('layouts.appmasyarakat')

@section('title', 'Berita KUA')

@section('page-title', 'Berita KUA')

@section('breadcrumb', 'Berita')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp

<style>

/* ==========================================
   HALAMAN BERITA MASYARAKAT
========================================== */

.masyarakat-berita-page {
    padding-bottom: 25px;
}

/* ==========================================
   HEADER
========================================== */

.berita-header {
    background: linear-gradient(135deg, #93c5fd, #60a5fa, #3b82f6);
    color: white;
    padding: 32px;
    border-radius: 16px;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
}

.berita-header::after {
    content: "";
    position: absolute;
    width: 190px;
    height: 190px;
    background: rgba(255,255,255,.15);
    border-radius: 50%;
    right: -40px;
    top: -70px;
}

.berita-header::before {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    background: rgba(255,255,255,.10);
    border-radius: 50%;
    right: 100px;
    bottom: -70px;
}

.berita-header h3 {
    font-weight: 700;
    margin-bottom: 8px;
    position: relative;
    z-index: 1;
    color: #172b45;
}

.berita-header p {
    margin-bottom: 0;
    color: #eff6ff;
    position: relative;
    z-index: 1;
}

.berita-count {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,.22);
    padding: 9px 15px;
    border-radius: 30px;
    margin-top: 18px;
    font-size: 13px;
    font-weight: 600;
    position: relative;
    z-index: 1;
}

/* ==========================================
   CARD BERITA
========================================== */

.berita-card {
    border: 1px solid #e5efff;
    border-radius: 15px;
    overflow: hidden;
    background: white;
    height: 100%;
    transition: .25s ease;
    display: flex;
    flex-direction: column;
}

.berita-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(59, 130, 246, .13);
    border-color: #bfdbfe;
}

/* ==========================================
   FOTO
========================================== */

.berita-image {
    height: 215px;
    background: #eff6ff;
    overflow: hidden;
    position: relative;
}

.berita-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .4s ease;
}

.berita-card:hover .berita-image img {
    transform: scale(1.05);
}

.berita-image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #93c5fd;
}

.berita-image-placeholder i {
    font-size: 55px;
}

/* ==========================================
   TANGGAL
========================================== */

.berita-date {
    color: #3b82f6;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 12px;
}

/* ==========================================
   JUDUL
========================================== */

.berita-card-title {
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.5;
    margin-bottom: 12px;
}

/* ==========================================
   DESKRIPSI
========================================== */

.berita-description {
    color: #64748b;
    font-size: 14px;
    line-height: 1.7;
    min-height: 72px;
}

/* ==========================================
   TOMBOL
========================================== */

.berita-read-more {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #60a5fa;
    color: white;
    text-decoration: none;
    padding: 10px 17px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    transition: .2s ease;
}

.berita-read-more:hover {
    background: #3b82f6;
    color: white;
    box-shadow: 0 4px 12px rgba(59, 130, 246, .2);
}

/* ==========================================
   BERITA KOSONG
========================================== */

.berita-empty {
    background: #f8fbff;
    border: 1px dashed #bfdbfe;
    border-radius: 15px;
    padding: 65px 20px;
    text-align: center;
}

.berita-empty i {
    font-size: 55px;
    color: #93c5fd;
    margin-bottom: 18px;
}

.berita-empty h5 {
    font-weight: 700;
    color: #334155;
}

.berita-empty p {
    color: #64748b;
}

/* ==========================================
   RESPONSIVE
========================================== */

@media (max-width: 576px) {

    .berita-header {
        padding: 23px;
    }

    .berita-header h3 {
        font-size: 21px;
    }

    .berita-image {
        height: 190px;
    }

}

</style>

<div class="masyarakat-berita-page">

    {{-- HEADER HALAMAN --}}
    <div class="berita-header">

        <h3>
            <i class="bi bi-newspaper me-2"></i>
            Informasi dan Berita KUA
        </h3>

        <p>
            Temukan informasi terbaru mengenai kegiatan dan pelayanan
            KUA Kecamatan Karang Baru.
        </p>

        <div class="berita-count">

            <i class="bi bi-journal-text"></i>

            {{ $beritas->count() }} Berita Dipublikasikan

        </div>

    </div>

    {{-- DAFTAR BERITA --}}
    <div class="row g-4">

        @forelse($beritas as $berita)

            @php

                /*
                ==========================================
                PENGATURAN FOTO BERITA
                ==========================================
                */

                $fotoPath = null;
                $fotoUrl = null;

                if (!empty($berita->foto)) {

                    $fotoFile = trim($berita->foto);

                    // Foto berupa URL luar
                    if (
                        Str::startsWith($fotoFile, ['http://', 'https://'])
                    ) {

                        $fotoUrl = $fotoFile;

                    } else {

                        // Ubah backslash menjadi slash
                        $fotoFile = str_replace('\\', '/', $fotoFile);

                        // Hilangkan prefix public/
                        $fotoFile = preg_replace(
                            '/^public\//',
                            '',
                            $fotoFile
                        );

                        // Hilangkan slash di awal
                        $fotoFile = ltrim($fotoFile, '/');

                        // Jika foto hanya berupa nama file
                        if (!Str::startsWith($fotoFile, 'foto/berita/')) {

                            if (Str::startsWith($fotoFile, 'foto/')) {

                                $fotoFile = 'foto/berita/' . basename($fotoFile);

                            } else {

                                $fotoFile = 'foto/berita/' . basename($fotoFile);

                            }

                        }

                        // Lokasi fisik foto
                        $fotoPath = public_path($fotoFile);

                        // URL foto
                        $fotoUrl = asset($fotoFile);

                    }

                }

                // TANGGAL BERITA
                $tanggalBerita = $berita->created_at
                    ? $berita->created_at->format('d M Y')
                    : '-';

                // RINGKASAN BERITA
                $ringkasan = Str::limit(
                    strip_tags($berita->isi ?? ''),
                    140
                );

            @endphp

            <div class="col-12 col-md-6 col-xl-4">

                <div class="berita-card">

                    {{-- FOTO BERITA --}}
                    <div class="berita-image">

                        @if($fotoUrl && ($fotoPath === null || file_exists($fotoPath)))

                            <img
                                src="{{ $fotoUrl }}"
                                alt="{{ $berita->judul }}"
                                loading="lazy">

                        @else

                            <div class="berita-image-placeholder">

                                <i class="bi bi-newspaper"></i>

                            </div>

                        @endif

                    </div>

                    {{-- INFORMASI BERITA --}}
                    <div class="p-4 d-flex flex-column flex-grow-1">

                        {{-- TANGGAL --}}
                        <div class="berita-date">

                            <i class="bi bi-calendar3 me-1"></i>

                            {{ $tanggalBerita }}

                        </div>

                        {{-- JUDUL --}}
                        <h5 class="berita-card-title">

                            {{ $berita->judul }}

                        </h5>

                        {{-- DESKRIPSI --}}
                        <p class="berita-description">

                            {{ $ringkasan }}

                        </p>

                        {{-- TOMBOL BACA --}}
                        <div class="mt-auto pt-2">

                            <a
                                href="{{ route('masyarakat.berita.show', $berita->slug) }}"
                                class="berita-read-more">

                                Baca Selengkapnya

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            {{-- JIKA BELUM ADA BERITA --}}
            <div class="col-12">

                <div class="berita-empty">

                    <i class="bi bi-newspaper d-block"></i>

                    <h5>Belum Ada Berita</h5>

                    <p class="mb-0">
                        Berita KUA akan ditampilkan di halaman ini
                        setelah dipublikasikan oleh Admin.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection
