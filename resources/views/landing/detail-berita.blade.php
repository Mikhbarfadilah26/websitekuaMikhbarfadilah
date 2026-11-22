@extends('layouts.applanding')

@section('title', $berita->judul . ' | KUA Karang Baru')

@section('content')

@php
    use App\Models\KomentarBerita;
    use App\Models\Berita;
    use Illuminate\Support\Facades\Auth;

    // Mengambil komentar untuk berita ini dari tabel komentar_berita
    $komentarBerita = KomentarBerita::with('user')
        ->where('berita_id', $berita->id)
        ->latest()
        ->get();

    // Mengambil berita terbaru untuk sidebar
    $beritaTerbaru = Berita::where('id', '!=', $berita->id)
        ->latest()
        ->take(5)
        ->get();

    // Memeriksa hak akses komentar
    $bolehKomentar = Auth::check()
        && Auth::user()->role === 'masyarakat'
        && Auth::user()->status === 'disetujui';
@endphp


{{-- =====================================================
     HEADER DETAIL BERITA
===================================================== --}}

<section class="detail-berita-header">
    <div class="container">

        <div class="detail-breadcrumb">
            <a href="{{ route('landing') }}">Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <a href="{{ route('landing.berita') }}">Berita</a>
            <i class="bi bi-chevron-right"></i>
            <span>Detail Berita</span>
        </div>

        <div class="detail-header-content">
            <span class="detail-label">
                <i class="bi bi-newspaper me-2"></i>
                Informasi KUA Karang Baru
            </span>

            <h1>{{ $berita->judul }}</h1>

            <div class="detail-meta">
                <span>
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ $berita->created_at->translatedFormat('d F Y') }}
                </span>

                <span>
                    <i class="bi bi-chat-dots me-1"></i>
                    {{ $komentarBerita->count() }} Komentar
                </span>
            </div>
        </div>

    </div>
</section>


{{-- =====================================================
     KONTEN DETAIL BERITA
===================================================== --}}

<section class="detail-berita-section">
    <div class="container">

        <div class="row g-4">

            {{-- ARTIKEL UTAMA --}}
            <div class="col-lg-8">

                <article class="artikel-card">

                    {{-- FOTO BERITA --}}
                    @if($berita->foto)
                        <div class="artikel-image">
                            <img
                                src="{{ asset('foto/berita/' . basename($berita->foto)) }}"
                                alt="{{ $berita->judul }}"
                                onerror="this.style.display='none'">
                        </div>
                    @endif


                    {{-- ISI BERITA --}}
                    <div class="artikel-content">

                        <div class="artikel-info">
                            <span>
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ $berita->created_at->translatedFormat('d F Y') }}
                            </span>

                            <span>
                                <i class="bi bi-building me-1"></i>
                                KUA Kecamatan Karang Baru
                            </span>
                        </div>

                        <h2>{{ $berita->judul }}</h2>

                        <div class="artikel-isi">
                            {!! $berita->isi !!}
                        </div>


                        {{-- BAGIKAN BERITA --}}
                        <div class="artikel-share">

                            <span class="fw-semibold">
                                Bagikan Berita:
                            </span>

                            <a
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                target="_blank"
                                rel="noopener"
                                aria-label="Bagikan ke Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a
                                href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}"
                                target="_blank"
                                rel="noopener"
                                aria-label="Bagikan ke WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>

                            <button
                                type="button"
                                onclick="salinLinkBerita()"
                                aria-label="Salin tautan">
                                <i class="bi bi-link-45deg"></i>
                            </button>

                        </div>

                    </div>

                </article>


                {{-- =================================================
                     KOMENTAR BERITA
                ================================================== --}}

                <div class="komentar-card mt-4" id="komentar">

                    <div class="komentar-heading">

                        <div>
                            <span class="komentar-subtitle">
                                RUANG DISKUSI
                            </span>

                            <h3>
                                Komentar Pembaca
                            </h3>

                            <p>
                                Sampaikan pendapat dan tanggapan Anda mengenai berita ini.
                            </p>
                        </div>

                        <div class="jumlah-komentar">
                            <i class="bi bi-chat-dots"></i>
                            {{ $komentarBerita->count() }}
                        </div>

                    </div>


                    {{-- NOTIFIKASI --}}
                    @if(session('success'))
                        <div class="alert alert-success rounded-3 mt-3">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-warning rounded-3 mt-3">
                            <i class="bi bi-exclamation-circle-fill me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger rounded-3 mt-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{-- FORM KOMENTAR --}}
                    <div class="form-komentar-area">

                        @if($bolehKomentar)

                            <form
                                action="{{ route('berita.komentar.store', $berita->slug) }}"
                                method="POST">

                                @csrf

                                <div class="d-flex gap-3">

                                    <div class="avatar-komentar">
                                        {{ strtoupper(substr(Auth::user()->nama ?? 'M', 0, 1)) }}
                                    </div>

                                    <div class="flex-grow-1">

                                        <div class="mb-2">
                                            <strong>
                                                {{ Auth::user()->nama }}
                                            </strong>

                                            <small class="text-muted ms-1">
                                                Menulis komentar
                                            </small>
                                        </div>

                                        <textarea
                                            name="isi_komentar"
                                            rows="4"
                                            maxlength="2000"
                                            class="form-control komentar-textarea @error('isi_komentar') is-invalid @enderror"
                                            placeholder="Tuliskan komentar Anda di sini..."
                                            required>{{ old('isi_komentar') }}</textarea>

                                        @error('isi_komentar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">

                                            <small class="text-muted">
                                                Maksimal 2000 karakter.
                                            </small>

                                            <button type="submit"
                                                    class="btn btn-kirim-komentar">

                                                <i class="bi bi-send-fill me-2"></i>
                                                Kirim Komentar

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        @elseif(!Auth::check())

                            <div class="komentar-login-box">

                                <div class="login-komentar-icon">
                                    <i class="bi bi-person-lock"></i>
                                </div>

                                <div class="flex-grow-1">
                                    <h5>Ingin ikut berkomentar?</h5>

                                    <p>
                                        Silakan login menggunakan akun masyarakat
                                        yang telah disetujui oleh admin.
                                    </p>

                                    <a
                                        href="{{ route('login', ['redirect' => route('berita.detail', $berita->slug) . '#komentar']) }}"
                                        class="btn btn-kirim-komentar">

                                        <i class="bi bi-box-arrow-in-right me-2"></i>
                                        Login untuk Berkomentar

                                    </a>
                                </div>

                            </div>

                        @elseif(Auth::user()->role !== 'masyarakat')

                            <div class="komentar-login-box">
                                <div class="login-komentar-icon text-primary bg-primary-subtle">
                                    <i class="bi bi-info-circle-fill"></i>
                                </div>

                                <div>
                                    <h5>Akses Komentar</h5>
                                    <p class="mb-0">
                                        Fitur komentar hanya tersedia untuk akun masyarakat.
                                    </p>
                                </div>
                            </div>

                        @else

                            <div class="komentar-login-box">
                                <div class="login-komentar-icon text-warning bg-warning-subtle">
                                    <i class="bi bi-clock-history"></i>
                                </div>

                                <div>
                                    <h5>Akun Belum Disetujui</h5>
                                    <p class="mb-0">
                                        Anda dapat memberikan komentar setelah akun
                                        masyarakat disetujui oleh admin.
                                    </p>
                                </div>
                            </div>

                        @endif

                    </div>


                    {{-- DAFTAR KOMENTAR --}}
                    <div class="daftar-komentar">

                        <div class="daftar-komentar-title">
                            Komentar Pengunjung
                        </div>

                        @forelse($komentarBerita as $komentar)

                            <div class="komentar-item">

                                <div class="avatar-komentar">
                                    {{ strtoupper(substr($komentar->user->nama ?? 'M', 0, 1)) }}
                                </div>

                                <div class="komentar-body">

                                    <div class="komentar-user-info">

                                        <strong>
                                            {{ $komentar->user->nama ?? 'Pengguna' }}
                                        </strong>

                                        <small>
                                            {{ $komentar->created_at->diffForHumans() }}
                                        </small>

                                    </div>

                                    <div class="komentar-text">
                                        {{ $komentar->isi_komentar }}
                                    </div>


                                    {{-- BALASAN ADMIN --}}
                                    @if($komentar->tanggapan)

                                        <div class="balasan-admin">

                                            <div class="balasan-admin-header">
                                                <i class="bi bi-patch-check-fill me-1"></i>
                                                Tanggapan Admin KUA
                                            </div>

                                            <div class="balasan-admin-text">
                                                {{ $komentar->tanggapan }}
                                            </div>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @empty

                            <div class="komentar-kosong">

                                <div class="komentar-kosong-icon">
                                    <i class="bi bi-chat-square-text"></i>
                                </div>

                                <h5>Belum Ada Komentar</h5>

                                <p>
                                    Jadilah orang pertama yang memberikan komentar
                                    pada berita ini.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- =================================================
                 SIDEBAR BERITA TERBARU
            ================================================== --}}

            <div class="col-lg-4">

                <aside class="sidebar-berita">

                    <div class="sidebar-title">
                        <span></span>
                        Berita Terbaru
                    </div>

                    @forelse($beritaTerbaru as $item)

                        <a
                            href="{{ route('berita.detail', $item->slug) }}"
                            class="sidebar-berita-item">

                            @if($item->foto)
                                <img
                                    src="{{ asset('foto/berita/' . basename($item->foto)) }}"
                                    alt="{{ $item->judul }}"
                                    onerror="this.style.display='none'">
                            @else
                                <div class="sidebar-image-placeholder">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                            @endif

                            <div class="sidebar-berita-info">

                                <small>
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $item->created_at->translatedFormat('d M Y') }}
                                </small>

                                <h6>
                                    {{ \Illuminate\Support\Str::limit($item->judul, 65) }}
                                </h6>

                            </div>

                        </a>

                    @empty

                        <p class="text-muted">
                            Belum ada berita lainnya.
                        </p>

                    @endforelse


                    <div class="sidebar-kontak">

                        <div class="sidebar-kontak-icon">
                            <i class="bi bi-building"></i>
                        </div>

                        <h5>KUA Kecamatan Karang Baru</h5>

                        <p>
                            Melayani masyarakat dengan ikhlas,
                            ramah, dan penuh tanggung jawab.
                        </p>

                        <a href="{{ route('landing.kontak') }}">
                            Informasi Kontak
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                    </div>

                </aside>

            </div>

        </div>

    </div>
</section>


{{-- =====================================================
     JAVASCRIPT
===================================================== --}}

<script>
    function salinLinkBerita() {
        navigator.clipboard.writeText(window.location.href)
            .then(function () {
                alert('Tautan berita berhasil disalin.');
            })
            .catch(function () {
                alert('Tidak dapat menyalin tautan berita.');
            });
    }
</script>


{{-- =====================================================
     CSS STYLING (REDESIGNED & MODERN)
===================================================== --}}

<style>
    :root {
        --kua-green: #28794b;
        --kua-green-dark: #205f3b;
        --kua-green-soft: #edf6ef;
        --kua-text: #34483a;
        --kua-muted: #7b8b80;
        --kua-border: #e4ece6;
    }

    .detail-berita-header {
        background: linear-gradient(135deg, #eaf5ec, #f4f9f4);
        padding: 55px 0 65px;
        border-bottom: 1px solid var(--kua-border);
    }

    .detail-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        font-size: 13px;
        color: var(--kua-muted);
        margin-bottom: 25px;
    }

    .detail-breadcrumb a {
        color: var(--kua-green);
        text-decoration: none;
        font-weight: 500;
    }

    .detail-breadcrumb a:hover {
        text-decoration: underline;
    }

    .detail-header-content {
        max-width: 900px;
    }

    .detail-label {
        display: inline-block;
        color: var(--kua-green);
        background: #dcefe1;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .detail-header-content h1 {
        font-size: clamp(24px, 3.5vw, 38px);
        line-height: 1.35;
        font-weight: 800;
        color: #20452f;
        margin-bottom: 18px;
    }

    .detail-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        color: #6c7d72;
        font-size: 13px;
    }

    .detail-berita-section {
        padding: 50px 0 80px;
        background: #f8fbf8;
    }

    .artikel-card,
    .komentar-card {
        background: white;
        border: 1px solid var(--kua-border);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(35, 75, 48, 0.04);
    }

    .artikel-image {
        width: 100%;
        height: 420px;
        background: #eaf2eb;
        overflow: hidden;
    }

    .artikel-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .artikel-image img:hover {
        transform: scale(1.02);
    }

    .artikel-content {
        padding: 40px;
    }

    .artikel-info {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        color: var(--kua-muted);
        font-size: 13px;
        margin-bottom: 20px;
    }

    .artikel-content h2 {
        color: #244b32;
        font-size: 26px;
        line-height: 1.4;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .artikel-isi {
        color: #425447;
        font-size: 16px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .artikel-isi p {
        margin-bottom: 1.5rem;
    }

    .artikel-isi img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 15px 0;
    }

    .artikel-isi iframe {
        max-width: 100%;
        border-radius: 12px;
    }

    .artikel-share {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        border-top: 1px solid var(--kua-border);
        padding-top: 25px;
        margin-top: 40px;
        color: #53675a;
        font-size: 14px;
    }

    .artikel-share a,
    .artikel-share button {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 50%;
        background: var(--kua-green-soft);
        color: var(--kua-green);
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .artikel-share a:hover,
    .artikel-share button:hover {
        background: var(--kua-green);
        color: white;
        transform: translateY(-2px);
    }

    /* KOMENTAR */

    .komentar-card {
        padding: 35px;
    }

    .komentar-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        border-bottom: 1px solid var(--kua-border);
        padding-bottom: 24px;
    }

    .komentar-subtitle {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        color: var(--kua-green);
    }

    .komentar-heading h3 {
        font-size: 22px;
        font-weight: 800;
        color: #244b32;
        margin: 6px 0;
    }

    .komentar-heading p {
        color: var(--kua-muted);
        font-size: 13px;
        margin: 0;
    }

    .jumlah-komentar {
        width: 50px;
        height: 50px;
        flex-shrink: 0;
        border-radius: 14px;
        background: var(--kua-green-soft);
        color: var(--kua-green);
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        font-weight: 700;
        font-size: 16px;
    }

    .form-komentar-area {
        padding: 25px 0;
        border-bottom: 1px solid var(--kua-border);
    }

    .avatar-komentar {
        width: 45px;
        height: 45px;
        flex-shrink: 0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dcefe1;
        color: var(--kua-green-dark);
        font-size: 16px;
        font-weight: 800;
        box-shadow: inset 0 0 0 1px rgba(40, 121, 75, 0.15);
    }

    .komentar-textarea {
        border: 1px solid #d2e3d5;
        background: #fcfdfc;
        border-radius: 14px;
        padding: 15px;
        font-size: 14px;
        resize: vertical;
        transition: all 0.2s;
    }

    .komentar-textarea:focus {
        border-color: var(--kua-green);
        box-shadow: 0 0 0 4px rgba(40, 121, 75, 0.1);
        background: #fff;
    }

    .btn-kirim-komentar {
        background: var(--kua-green);
        color: white;
        border: 0;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-kirim-komentar:hover {
        background: var(--kua-green-dark);
        color: white;
        transform: translateY(-1px);
    }

    .komentar-login-box {
        display: flex;
        align-items: flex-start;
        gap: 18px;
        background: #f1f7f2;
        border: 1px solid #d9e8dc;
        border-radius: 16px;
        padding: 22px;
    }

    .login-komentar-icon {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dcefe1;
        color: var(--kua-green);
        font-size: 22px;
    }

    .komentar-login-box h5 {
        font-size: 15px;
        font-weight: 800;
        color: #244b32;
        margin-bottom: 6px;
    }

    .komentar-login-box p {
        color: var(--kua-muted);
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 14px;
    }

    .daftar-komentar {
        padding-top: 25px;
    }

    .daftar-komentar-title {
        color: #244b32;
        font-weight: 800;
        font-size: 15px;
        margin-bottom: 20px;
    }

    .komentar-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 20px 0;
        border-bottom: 1px solid #edf2ee;
    }

    .komentar-item:last-child {
        border-bottom: none;
    }

    .komentar-body {
        flex: 1;
        min-width: 0;
    }

    .komentar-user-info {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 8px;
    }

    .komentar-user-info strong {
        color: #244b32;
        font-size: 14px;
    }

    .komentar-user-info small {
        color: #8da194;
        font-size: 12px;
    }

    .komentar-text {
        color: #485c4f;
        font-size: 14px;
        line-height: 1.8;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .balasan-admin {
        margin-top: 15px;
        padding: 16px;
        background: #edf7ef;
        border-left: 3.5px solid var(--kua-green);
        border-radius: 10px;
    }

    .balasan-admin-header {
        color: var(--kua-green);
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .balasan-admin-text {
        color: #3b5441;
        font-size: 13px;
        line-height: 1.75;
        white-space: pre-line;
    }

    .komentar-kosong {
        text-align: center;
        padding: 40px 15px;
    }

    .komentar-kosong-icon {
        font-size: 42px;
        color: #b0c2b4;
        margin-bottom: 12px;
    }

    .komentar-kosong h5 {
        color: #2c4d37;
        font-size: 16px;
        font-weight: 800;
    }

    .komentar-kosong p {
        color: var(--kua-muted);
        font-size: 13px;
    }

    /* SIDEBAR */

    .sidebar-berita {
        background: white;
        padding: 28px;
        border: 1px solid var(--kua-border);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(35, 75, 48, 0.04);
    }

    .sidebar-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 17px;
        font-weight: 800;
        color: #244b32;
        margin-bottom: 22px;
    }

    .sidebar-title span {
        width: 4px;
        height: 22px;
        border-radius: 5px;
        background: var(--kua-green);
    }

    .sidebar-berita-item {
        display: flex;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid #edf2ee;
        text-decoration: none;
        transition: transform 0.2s;
    }

    .sidebar-berita-item:last-of-type {
        border-bottom: none;
    }

    .sidebar-berita-item img,
    .sidebar-image-placeholder {
        width: 95px;
        height: 75px;
        flex-shrink: 0;
        border-radius: 10px;
        object-fit: cover;
        background: #eaf3eb;
    }

    .sidebar-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--kua-green);
        font-size: 24px;
    }

    .sidebar-berita-info {
        min-width: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .sidebar-berita-info small {
        color: #89978d;
        font-size: 11px;
    }

    .sidebar-berita-info h6 {
        color: #3b5441;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.5;
        margin-top: 5px;
        margin-bottom: 0;
        transition: color 0.2s;
    }

    .sidebar-berita-item:hover h6 {
        color: var(--kua-green);
    }

    .sidebar-kontak {
        background: #edf6ef;
        border-radius: 14px;
        padding: 24px;
        margin-top: 28px;
        border: 1px solid #d9e8dc;
    }

    .sidebar-kontak-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #d8ebdc;
        color: var(--kua-green);
        font-size: 20px;
        margin-bottom: 14px;
    }

    .sidebar-kontak h5 {
        color: #244b32;
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .sidebar-kontak p {
        color: #6a7d71;
        font-size: 13px;
        line-height: 1.7;
        margin-bottom: 15px;
    }

    .sidebar-kontak a {
        color: var(--kua-green);
        text-decoration: none;
        font-size: 13px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
    }

    .sidebar-kontak a:hover {
        text-decoration: underline;
    }

    @media(max-width: 767px) {
        .detail-berita-header {
            padding: 35px 0 45px;
        }

        .detail-berita-section {
            padding: 30px 0 50px;
        }

        .artikel-image {
            height: 250px;
        }

        .artikel-content {
            padding: 24px;
        }

        .artikel-content h2 {
            font-size: 22px;
        }

        .komentar-card {
            padding: 22px;
        }

        .komentar-heading h3 {
            font-size: 20px;
        }
    }
</style>

@endsection