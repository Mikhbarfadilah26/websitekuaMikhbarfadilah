
@extends('layouts.applanding')

@section('title', 'Berita KUA Karang Baru')

@section('content')

<style>
/* =====================================================
   HALAMAN BERITA KUA KARANG BARU
===================================================== */

.berita-page {
    background: #f7faf8;
    min-height: 100vh;
    font-family: 'Inter', sans-serif;
}

/* HERO */

.berita-hero {
    position: relative;
    overflow: hidden;
    padding: 75px 20px 125px;
    text-align: center;
    color: #fff;
    background:
        radial-gradient(circle at 15% 20%, rgba(255,255,255,.10), transparent 25%),
        radial-gradient(circle at 85% 80%, rgba(255,255,255,.10), transparent 25%),
        linear-gradient(120deg, #064e3b, #047857, #059669);
}

.berita-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    opacity: .09;
    background-image:
        repeating-linear-gradient(
            60deg,
            transparent,
            transparent 35px,
            rgba(255,255,255,.3) 36px,
            transparent 37px
        ),
        repeating-linear-gradient(
            -60deg,
            transparent,
            transparent 35px,
            rgba(255,255,255,.3) 36px,
            transparent 37px
        );
    pointer-events: none;
}

.berita-hero-content {
    position: relative;
    z-index: 2;
    max-width: 750px;
    margin: auto;
}

.berita-icon {
    width: 82px;
    height: 82px;
    margin: 0 auto 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #fff;
    color: #059669;
    font-size: 34px;
    box-shadow: 0 10px 30px rgba(0,0,0,.12);
}

.berita-hero h1 {
    font-size: clamp(32px, 5vw, 48px);
    font-weight: 800;
    color: #fff;
    margin-bottom: 14px;
    letter-spacing: -.8px;
}

.berita-hero h1 span {
    color: #d1fae5;
}

.berita-hero p {
    font-size: 17px;
    line-height: 1.8;
    color: rgba(255,255,255,.9);
    margin: auto;
}

/* SEARCH AREA */

.berita-search-wrapper {
    position: relative;
    z-index: 5;
    margin-top: -60px;
}

.berita-search {
    max-width: 1450px;
    margin: auto;
    padding: 22px 25px;
    background: #fff;
    border: 1px solid #e5eee8;
    border-radius: 19px;
    box-shadow: 0 8px 25px rgba(15, 23, 42, .06);
}

.berita-search-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.berita-search-input {
    position: relative;
    flex: 1;
    max-width: 600px;
}

.berita-search-input i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 16px;
}

.berita-search-input input {
    width: 100%;
    height: 46px;
    padding: 0 15px 0 43px;
    border: 1px solid #dce5df;
    border-radius: 9px;
    outline: none;
    font-size: 14px;
    color: #334155;
    transition: .25s;
}

.berita-search-input input:focus {
    border-color: #059669;
    box-shadow: 0 0 0 3px rgba(5,150,105,.10);
}

.berita-filter {
    display: flex;
    align-items: center;
    gap: 10px;
}

.berita-filter-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #dce5df;
    border-radius: 9px;
    color: #059669;
    background: #fff;
}

.berita-filter select {
    height: 43px;
    min-width: 185px;
    padding: 0 35px 0 13px;
    border: 1px solid #dce5df;
    border-radius: 9px;
    background-color: #fff;
    color: #334155;
    font-size: 14px;
    outline: none;
    cursor: pointer;
}

.berita-filter select:focus {
    border-color: #059669;
}

/* SECTION */

.berita-section {
    padding: 32px 0 85px;
}

.berita-container {
    max-width: 1450px;
    margin: auto;
    padding: 0 15px;
}

/* CARD */

.berita-card {
    height: 100%;
    overflow: hidden;
    background: #fff;
    border: 1px solid #e8eee9;
    border-radius: 17px;
    box-shadow: 0 5px 20px rgba(15,23,42,.045);
    transition: all .3s ease;
}

.berita-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(6,78,59,.10);
    border-color: #a7f3d0;
}

/* IMAGE */

.berita-image {
    height: 235px;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg,#d1fae5,#ecfdf5);
}

.berita-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .5s ease;
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
    color: #059669;
    font-size: 55px;
}

/* BADGE */

.berita-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    z-index: 2;
    padding: 7px 15px;
    border-radius: 30px;
    background: rgba(255,255,255,.96);
    color: #047857;
    font-size: 12px;
    font-weight: 700;
    box-shadow: 0 3px 10px rgba(0,0,0,.08);
}

/* BODY */

.berita-body {
    padding: 23px 25px 25px;
}

.berita-date {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #94a3b8;
    font-size: 13px;
    margin-bottom: 12px;
}

.berita-date i {
    color: #059669;
}

.berita-card h3 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 56px;
    margin-bottom: 13px;
    color: #172b25;
    font-size: 19px;
    line-height: 1.5;
    font-weight: 750;
}

.berita-card p {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 76px;
    color: #718078;
    font-size: 14px;
    line-height: 1.8;
    margin-bottom: 18px;
}

.berita-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 15px;
    border-top: 1px solid #edf2ee;
}

.berita-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #047857;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    transition: .25s;
}

.berita-link:hover {
    color: #064e3b;
    gap: 13px;
}

/* EMPTY */

.empty-berita {
    padding: 70px 25px;
    text-align: center;
    background: #fff;
    border: 1px solid #e5eee8;
    border-radius: 18px;
}

.empty-berita i {
    font-size: 55px;
    color: #a7cdb9;
    margin-bottom: 20px;
}

.empty-berita h4 {
    font-size: 22px;
    font-weight: 750;
    color: #164e3d;
    margin-bottom: 10px;
}

.empty-berita p {
    color: #84938b;
    font-size: 14px;
}

/* SEARCH EMPTY */

.berita-not-found {
    display: none;
    padding: 50px 20px;
    text-align: center;
    color: #718078;
    background: #fff;
    border-radius: 16px;
}

/* RESPONSIVE */

@media (max-width: 768px) {

    .berita-hero {
        padding: 65px 20px 100px;
    }

    .berita-icon {
        width: 70px;
        height: 70px;
        font-size: 28px;
    }

    .berita-hero p {
        font-size: 14px;
    }

    .berita-search {
        padding: 17px;
        border-radius: 14px;
    }

    .berita-search-inner {
        flex-direction: column;
        align-items: stretch;
        gap: 13px;
    }

    .berita-search-input {
        max-width: 100%;
    }

    .berita-filter {
        width: 100%;
    }

    .berita-filter-icon {
        flex-shrink: 0;
    }

    .berita-filter select {
        flex: 1;
        min-width: 0;
    }

    .berita-section {
        padding-top: 25px;
    }

    .berita-image {
        height: 220px;
    }

    .berita-body {
        padding: 20px;
    }
}

@media (max-width: 400px) {
    .berita-card h3 {
        font-size: 17px;
    }

    .berita-image {
        height: 195px;
    }
}
</style>


<div class="berita-page">

    {{-- ================= HERO ================= --}}

    <section class="berita-hero">

        <div class="berita-hero-content">

            <div class="berita-icon">
                <i class="fas fa-newspaper"></i>
            </div>

            <h1>
                Berita & <span>Informasi</span>
            </h1>

            <p>
                Dapatkan informasi terbaru seputar kegiatan,
                pengumuman, dan berbagai informasi pelayanan
                Kantor Urusan Agama Kecamatan Karang Baru.
            </p>

        </div>

    </section>


    {{-- ================= SEARCH ================= --}}

    <div class="berita-search-wrapper">

        <div class="berita-search">

            <div class="berita-search-inner">

                <div class="berita-search-input">

                    <i class="fas fa-search"></i>

                    <input
                        type="text"
                        id="searchBerita"
                        placeholder="Cari berita dan informasi..."
                        autocomplete="off"
                    >

                </div>

                <div class="berita-filter">

                    <div class="berita-filter-icon">
                        <i class="fas fa-filter"></i>
                    </div>

                    <select id="sortBerita">
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>

                </div>

            </div>

        </div>

    </div>


    {{-- ================= DAFTAR BERITA ================= --}}

    <section class="berita-section">

        <div class="berita-container">

            @if($berita->count() > 0)

                <div class="row g-4" id="daftarBerita">

                    @foreach($berita as $item)

                        <div class="col-lg-4 col-md-6 berita-item"
                             data-judul="{{ strtolower($item->judul) }}"
                             data-tanggal="{{ $item->created_at ? $item->created_at->timestamp : 0 }}">

                            <article class="berita-card">

                                {{-- FOTO BERITA --}}

                                <div class="berita-image">

                                    <span class="berita-badge">
                                        <i class="fas fa-leaf me-1"></i>
                                        Informasi KUA
                                    </span>

                                    @php
                                        $namaFoto = $item->foto
                                            ? basename($item->foto)
                                            : null;

                                        $fotoPath = $namaFoto
                                            ? public_path('foto/berita/' . $namaFoto)
                                            : null;

                                        $fotoUrl = $namaFoto
                                            ? asset('foto/berita/' . $namaFoto)
                                            : null;
                                    @endphp

                                    @if($fotoPath && is_file($fotoPath))

                                        <img
                                            src="{{ $fotoUrl }}"
                                            alt="{{ $item->judul }}"
                                            loading="lazy"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                        >

                                        <div class="berita-image-placeholder" style="display:none;">
                                            <i class="fas fa-newspaper"></i>
                                        </div>

                                    @else

                                        <div class="berita-image-placeholder">
                                            <i class="fas fa-newspaper"></i>
                                        </div>

                                    @endif

                                </div>


                                {{-- KONTEN BERITA --}}

                                <div class="berita-body">

                                    <div class="berita-date">

                                        <i class="far fa-calendar-alt"></i>

                                        {{ $item->created_at
                                            ? $item->created_at->translatedFormat('d F Y')
                                            : '-' }}

                                    </div>


                                    <h3>
                                        {{ $item->judul }}
                                    </h3>


                                    <p>
                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($item->isi),
                                            125
                                        ) }}
                                    </p>


                                    <div class="berita-footer">

                                        <a
                                            href="{{ route('berita.detail', $item->slug) }}"
                                            class="berita-link"
                                        >
                                            Baca Selengkapnya

                                            <i class="fas fa-arrow-right"></i>
                                        </a>

                                    </div>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>


                {{-- HASIL PENCARIAN KOSONG --}}

                <div class="berita-not-found" id="beritaNotFound">

                    <i class="fas fa-search fa-2x mb-3"></i>

                    <h5 class="fw-bold">
                        Berita Tidak Ditemukan
                    </h5>

                    <p class="mb-0">
                        Coba gunakan kata kunci pencarian lainnya.
                    </p>

                </div>

            @else

                {{-- BELUM ADA BERITA --}}

                <div class="empty-berita">

                    <i class="fas fa-newspaper"></i>

                    <h4>Belum Ada Berita</h4>

                    <p class="mb-0">
                        Belum ada berita atau informasi yang
                        dipublikasikan oleh KUA Kecamatan Karang Baru.
                        Silakan kunjungi kembali halaman ini.
                    </p>

                </div>

            @endif

        </div>

    </section>

</div>


{{-- ================= JAVASCRIPT SEARCH & FILTER ================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchBerita');
    const sortSelect = document.getElementById('sortBerita');
    const daftarBerita = document.getElementById('daftarBerita');
    const notFound = document.getElementById('beritaNotFound');

    if (!searchInput || !sortSelect || !daftarBerita) {
        return;
    }

    function filterBerita() {

        const keyword = searchInput.value.toLowerCase().trim();

        const items = Array.from(
            daftarBerita.querySelectorAll('.berita-item')
        );

        let jumlahTampil = 0;

        items.forEach(function (item) {

            const judul = item.dataset.judul || '';

            const cocok = judul.includes(keyword);

            item.style.display = cocok ? '' : 'none';

            if (cocok) {
                jumlahTampil++;
            }

        });

        if (notFound) {
            notFound.style.display =
                jumlahTampil === 0 ? 'block' : 'none';
        }

    }

    function urutkanBerita() {

        const items = Array.from(
            daftarBerita.querySelectorAll('.berita-item')
        );

        items.sort(function (a, b) {

            const tanggalA = Number(a.dataset.tanggal || 0);
            const tanggalB = Number(b.dataset.tanggal || 0);

            if (sortSelect.value === 'terbaru') {
                return tanggalB - tanggalA;
            }

            return tanggalA - tanggalB;

        });

        items.forEach(function (item) {
            daftarBerita.appendChild(item);
        });

        filterBerita();

    }

    searchInput.addEventListener('input', filterBerita);

    sortSelect.addEventListener('change', urutkanBerita);

});
</script>

@endsection
