@extends('layouts.applanding')

@section('title', 'Login Admin - KUA Karang Baru')

@section('content')

<style>
    /* =========================================================
        SEMBUNYIKAN TOP NAVBAR JIKA ADA
        ========================================================= */
    body:has(.login-page-kua) .top-navbar-kua {
        display: none !important;
    }

    /* =========================================================
        HALAMAN LOGIN SPLIT SCREEN
        ========================================================= */
    .login-page-kua {
        width: 100%;
        min-height: calc(100vh - 100px);
        padding: 40px 20px;
        background: #f0f4f8;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    /* KARTU UTAMA DUA KOLOM */
    .login-card-split {
        display: flex;
        width: 100%;
        max-width: 950px;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
        z-index: 2;
    }

    /* KOLOM KIRI (BRANDING / ILUSTRASI) */
    .login-left-side {
        flex: 1;
        background: linear-gradient(135deg, #00b4db, #0083b0);
        color: #ffffff;
        padding: 45px 35px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .login-left-side::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 120px;
        background: rgba(255, 255, 255, 0.1);
        clip-path: ellipse(70% 100% at 50% 100%);
        pointer-events: none;
    }

    .login-brand-title {
        font-size: 32px;
        font-weight: 800;
        line-height: 1.25;
        margin-bottom: 12px;
    }

    .login-brand-subtitle {
        font-size: 14px;
        opacity: 0.9;
        line-height: 1.5;
        margin: 0;
    }

    .login-illustration-box {
        text-align: center;
        margin-top: 20px;
        position: relative;
        z-index: 1;
    }

    /* KOLOM KANAN (FORM LOGIN) */
    .login-right-side {
        flex: 1;
        padding: 50px 40px;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-form-title {
        font-size: 26px;
        font-weight: 800;
        color: #2d3748;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .login-form-subtitle {
        font-size: 13px;
        color: #718096;
        margin-bottom: 25px;
    }

    /* ALERT */
    .login-alert-kua {
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 20px;
    }

    /* INPUT GROUPS */
    .login-input-group {
        display: flex;
        width: 100%;
        margin-bottom: 18px;
    }

    .login-input-icon {
        width: 45px;
        min-width: 45px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f7fafc;
        border: 1px solid #e2e8f0;
        border-right: none;
        border-radius: 8px 0 0 8px;
        color: #4a5568;
        font-size: 15px;
    }

    .login-input-kua {
        height: 48px;
        flex: 1;
        min-width: 0;
        border: 1px solid #e2e8f0;
        border-radius: 0 8px 8px 0;
        padding: 0 14px;
        font-size: 14px;
        color: #2d3748;
        outline: none;
        background: #fdfdfd;
        transition: all 0.2s ease;
    }

    .login-input-kua::placeholder {
        color: #a0aec0;
    }

    .login-input-kua:focus {
        border-color: #00b4db;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(0, 180, 219, 0.1);
    }

    /* PASSWORD WRAPPER & TOGGLE */
    .login-password-wrapper {
        position: relative;
        flex: 1;
        min-width: 0;
    }

    .login-password-wrapper .login-input-kua {
        width: 100%;
        border-radius: 0 8px 8px 0;
        padding-right: 42px;
    }

    .btn-show-password {
        position: absolute;
        top: 0;
        right: 0;
        width: 42px;
        height: 48px;
        border: none;
        background: transparent;
        color: #718096;
        font-size: 15px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-show-password:hover {
        color: #00b4db;
    }

    /* EXTRA LINKS / ACTIONS */
    .login-actions-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
        font-size: 13px;
    }

    .login-register-text {
        font-size: 13px;
        color: #718096;
        margin-bottom: 20px;
    }

    .login-register-link {
        color: #007bff;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }

    .login-register-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    .login-link-muted {
        color: #718096;
        text-decoration: none;
        transition: color 0.2s;
    }

    .login-link-muted:hover {
        color: #00b4db;
        text-decoration: underline;
    }

    /* BUTTON GROUP */
    .login-btn-group {
        display: flex;
        gap: 10px;
    }

    .btn-login-action {
        flex: 1;
        height: 46px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .btn-masuk-blue {
        background: #007bff;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
    }

    .btn-masuk-blue:hover {
        background: #0056b3;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-daftar-yellow {
        background: #ffc107;
        color: #212529;
        box-shadow: 0 4px 12px rgba(255, 193, 7, 0.2);
    }

    .btn-daftar-yellow:hover {
        background: #e0a800;
        color: #212529;
        transform: translateY(-1px);
    }

    .login-back-wrapper {
        margin-top: 20px;
        text-align: center;
    }

    .login-back-link {
        font-size: 13px;
        color: #4a5568;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .login-back-link:hover {
        color: #007bff;
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 768px) {
        .login-page-kua {
            padding: 20px 10px;
        }

        .login-card-split {
            flex-direction: column;
            max-width: 450px;
        }

        .login-left-side {
            padding: 30px 20px;
        }

        .login-brand-title {
            font-size: 24px;
        }

        .login-illustration-box {
            display: none;
        }

        .login-right-side {
            padding: 30px 25px;
        }
    }
</style>

<div class="login-page-kua">
    <div class="login-card-split">
        
        <!-- KOLOM KIRI (BRANDING & ILUSTRASI) -->
        <div class="login-left-side">
            <div>
                <h1 class="login-brand-title">Sistem Informasi<br>Layanan KUA</h1>
                <p class="login-brand-subtitle">Selamat datang di Sistem Layanan Kantor Urusan Agama Karang Baru</p>
            </div>
            <div class="login-illustration-box">
                <i class="fas fa-shield-alt" style="font-size: 90px; opacity: 0.85; margin-top: 15px;"></i>
            </div>
        </div>

        <!-- KOLOM KANAN (FORM LOGIN) -->
        <div class="login-right-side">
            <h2 class="login-form-title">Masuk</h2>
            <p class="login-form-subtitle">Silahkan masuk ke Aplikasi dengan Akun Anda</p>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger login-alert-kua">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- SUCCESS --}}
            @if (session('success'))
                <div class="alert alert-success login-alert-kua">
                    <i class="fas fa-check-circle me-1"></i>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf

                {{-- EMAIL --}}
                <div class="login-input-group">
                    <div class="login-input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="login-input-kua"
                        placeholder="Email/Username"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                </div>

                {{-- PASSWORD --}}
                <div class="login-input-group">
                    <div class="login-input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="login-password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="login-input-kua"
                            placeholder="Password"
                            autocomplete="current-password"
                            required
                        >
                        <button
                            type="button"
                            class="btn-show-password"
                            onclick="togglePassword()"
                            aria-label="Tampilkan password"
                        >
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                {{-- LUPA PASSWORD --}}
                <div class="login-actions-row">
                    <span style="visibility: hidden;"></span>
                    <a href="#" class="login-link-muted">Lupa Password ?</a>
                </div>

{{-- REGISTRASI TEKS --}}
<div class="login-register-text">
    Belum punya akun? <a href="{{ route('register') }}" class="login-register-link">Silahkan Registrasi</a>
</div>

                {{-- TOMBOL AKSI (MASUK & KEMBALI) --}}
                <div class="login-btn-group">
                    <button type="submit" class="btn-login-action btn-masuk-blue">
                        MASUK
                    </button>
                    <a href="{{ route('landing.beranda') }}" class="btn-login-action btn-daftar-yellow">
                        KEMBALI
                    </a>
                </div>

            </form>

            <div class="login-back-wrapper">
                <a href="{{ route('landing.beranda') }}" class="login-back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda Website
                </a>
            </div>

        </div>

    </div>
</div>

<script>
function togglePassword() {
    const password = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (password.type === 'password') {
        password.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        password.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}
</script>

@endsection