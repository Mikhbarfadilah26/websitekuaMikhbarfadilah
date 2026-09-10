@extends('layouts.applanding')

@section('title', 'Registrasi Masyarakat - KUA Karang Baru')

@section('content')

<style>
    /* =========================================================
       SEMBUNYIKAN TOP NAVBAR
    ========================================================= */
    body:has(.register-page-kua) .top-navbar-kua {
        display: none !important;
    }

    /* =========================================================
       HALAMAN REGISTRASI
    ========================================================= */
    .register-page-kua {
        width: 100%;
        min-height: calc(100vh - 100px);
        padding: 40px 20px;
        background: #f0f4f8;

        display: flex;
        justify-content: center;
        align-items: center;

        position: relative;
    }

    /* =========================================================
       CARD UTAMA
    ========================================================= */
    .register-card-split {
        display: flex;

        width: 100%;
        max-width: 1000px;

        background: #ffffff;

        border-radius: 20px;

        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);

        overflow: hidden;

        position: relative;
        z-index: 2;
    }

    /* =========================================================
       KOLOM KIRI
    ========================================================= */
    .register-left-side {
        flex: 1;

        background: linear-gradient(
            135deg,
            #00b4db,
            #0083b0
        );

        color: #ffffff;

        padding: 45px 35px;

        display: flex;
        flex-direction: column;
        justify-content: space-between;

        position: relative;
        overflow: hidden;
    }

    .register-left-side::after {
        content: "";

        position: absolute;

        bottom: 0;
        left: 0;
        right: 0;

        height: 120px;

        background: rgba(255, 255, 255, 0.1);

        clip-path: ellipse(
            70% 100% at 50% 100%
        );

        pointer-events: none;
    }

    .register-brand-title {
        font-size: 32px;

        font-weight: 800;

        line-height: 1.25;

        margin-bottom: 12px;
    }

    .register-brand-subtitle {
        font-size: 14px;

        opacity: 0.9;

        line-height: 1.6;

        margin: 0;
    }

    .register-info {
        margin-top: 30px;

        position: relative;
        z-index: 2;
    }

    .register-info-item {
        display: flex;

        align-items: flex-start;

        gap: 12px;

        margin-bottom: 18px;
    }

    .register-info-icon {
        width: 38px;
        height: 38px;

        min-width: 38px;

        display: flex;

        align-items: center;
        justify-content: center;

        background: rgba(255, 255, 255, 0.15);

        border-radius: 8px;
    }

    .register-info-text {
        font-size: 13px;

        line-height: 1.5;

        opacity: 0.95;
    }

    /* =========================================================
       KOLOM KANAN
    ========================================================= */
    .register-right-side {
        flex: 1.15;

        padding: 45px 40px;

        background: #ffffff;

        display: flex;

        flex-direction: column;

        justify-content: center;
    }

    .register-form-title {
        font-size: 26px;

        font-weight: 800;

        color: #2d3748;

        margin-bottom: 6px;

        text-transform: uppercase;

        letter-spacing: 0.5px;
    }

    .register-form-subtitle {
        font-size: 13px;

        color: #718096;

        margin-bottom: 25px;
    }

    /* =========================================================
       ALERT
    ========================================================= */
    .register-alert-kua {
        border-radius: 8px;

        font-size: 13px;

        margin-bottom: 20px;
    }

    /* =========================================================
       INPUT
    ========================================================= */
    .register-input-group {
        display: flex;

        width: 100%;

        margin-bottom: 15px;
    }

    .register-input-icon {
        width: 45px;

        min-width: 45px;

        height: 46px;

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

    .register-input-kua {
        height: 46px;

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

    .register-input-kua::placeholder {
        color: #a0aec0;
    }

    .register-input-kua:focus {
        border-color: #00b4db;

        background: #ffffff;

        box-shadow:
            0 0 0 3px
            rgba(0, 180, 219, 0.1);
    }

    /* =========================================================
       TEXTAREA
    ========================================================= */
    .register-textarea {
        height: 80px;

        padding-top: 12px;

        resize: vertical;
    }

    /* =========================================================
       PASSWORD
    ========================================================= */
    .register-password-wrapper {
        position: relative;

        flex: 1;

        min-width: 0;
    }

    .register-password-wrapper
    .register-input-kua {
        width: 100%;

        padding-right: 42px;
    }

    .btn-show-register-password {
        position: absolute;

        top: 0;

        right: 0;

        width: 42px;

        height: 46px;

        border: none;

        background: transparent;

        color: #718096;

        font-size: 15px;

        cursor: pointer;

        display: flex;

        align-items: center;

        justify-content: center;
    }

    .btn-show-register-password:hover {
        color: #00b4db;
    }

    /* =========================================================
       BUTTON
    ========================================================= */
    .register-btn {
        width: 100%;

        height: 46px;

        border: none;

        border-radius: 8px;

        background: #007bff;

        color: #ffffff;

        font-size: 14px;

        font-weight: 700;

        cursor: pointer;

        display: flex;

        align-items: center;

        justify-content: center;

        transition: all 0.2s ease;

        box-shadow:
            0 4px 12px
            rgba(0, 123, 255, 0.2);
    }

    .register-btn:hover {
        background: #0056b3;

        transform: translateY(-1px);

        color: #ffffff;
    }

    /* =========================================================
       LOGIN LINK
    ========================================================= */
    .register-login-wrapper {
        margin-top: 20px;

        text-align: center;

        font-size: 13px;

        color: #718096;
    }

    .register-login-link {
        color: #007bff;

        text-decoration: none;

        font-weight: 700;
    }

    .register-login-link:hover {
        text-decoration: underline;
    }

    /* =========================================================
       BACK
    ========================================================= */
    .register-back-wrapper {
        margin-top: 12px;

        text-align: center;
    }

    .register-back-link {
        font-size: 13px;

        color: #4a5568;

        text-decoration: none;

        font-weight: 600;

        display: inline-flex;

        align-items: center;

        gap: 5px;
    }

    .register-back-link:hover {
        color: #007bff;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */
    @media (max-width: 768px) {

        .register-page-kua {
            padding: 20px 10px;
        }

        .register-card-split {
            flex-direction: column;

            max-width: 500px;
        }

        .register-left-side {
            padding: 30px 25px;
        }

        .register-brand-title {
            font-size: 24px;
        }

        .register-info {
            display: none;
        }

        .register-right-side {
            padding: 30px 25px;
        }
    }
</style>


<div class="register-page-kua">

    <div class="register-card-split">

        {{-- =====================================================
             KOLOM KIRI
        ====================================================== --}}
        <div class="register-left-side">

            <div>

                <h1 class="register-brand-title">
                    Buat Akun<br>
                    Masyarakat
                </h1>

                <p class="register-brand-subtitle">
                    Daftarkan akun Anda untuk mendapatkan akses
                    ke Sistem Informasi Layanan KUA Karang Baru.
                </p>

            </div>


            <div class="register-info">

                <div class="register-info-item">

                    <div class="register-info-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>

                    <div class="register-info-text">
                        Isi data pendaftaran dengan benar.
                    </div>

                </div>


                <div class="register-info-item">

                    <div class="register-info-icon">
                        <i class="fas fa-user-check"></i>
                    </div>

                    <div class="register-info-text">
                        Akun akan diperiksa dan disetujui
                        oleh admin KUA.
                    </div>

                </div>


                <div class="register-info-item">

                    <div class="register-info-icon">
                        <i class="fas fa-lock"></i>
                    </div>

                    <div class="register-info-text">
                        Setelah disetujui, Anda dapat login
                        menggunakan email dan password.
                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             KOLOM KANAN
        ====================================================== --}}
        <div class="register-right-side">

            <h2 class="register-form-title">
                Registrasi
            </h2>

            <p class="register-form-subtitle">
                Silakan isi data untuk membuat akun masyarakat.
            </p>


            {{-- ERROR --}}

            @if ($errors->any())

                <div class="alert alert-danger register-alert-kua">

                    <i class="fas fa-exclamation-circle me-1"></i>

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- FORM --}}

            <form
                action="{{ route('register.proses') }}"
                method="POST"
            >

                @csrf


                {{-- NAMA --}}

                <div class="register-input-group">

                    <div class="register-input-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <input
                        type="text"
                        name="nama"
                        class="register-input-kua"
                        placeholder="Nama Lengkap"
                        value="{{ old('nama') }}"
                        autocomplete="name"
                        required
                    >

                </div>


                {{-- EMAIL --}}

                <div class="register-input-group">

                    <div class="register-input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <input
                        type="email"
                        name="email"
                        class="register-input-kua"
                        placeholder="Email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >

                </div>


                {{-- NO HP --}}

                <div class="register-input-group">

                    <div class="register-input-icon">
                        <i class="fas fa-phone"></i>
                    </div>

                    <input
                        type="text"
                        name="no_hp"
                        class="register-input-kua"
                        placeholder="Nomor HP"
                        value="{{ old('no_hp') }}"
                        autocomplete="tel"
                        required
                    >

                </div>


                {{-- ALAMAT --}}

                <div class="register-input-group">

                    <div class="register-input-icon">

                        <i class="fas fa-map-marker-alt"></i>

                    </div>

                    <textarea
                        name="alamat"
                        class="register-input-kua register-textarea"
                        placeholder="Alamat Lengkap"
                        required
                    >{{ old('alamat') }}</textarea>

                </div>


                {{-- PASSWORD --}}

                <div class="register-input-group">

                    <div class="register-input-icon">

                        <i class="fas fa-lock"></i>

                    </div>

                    <div class="register-password-wrapper">

                        <input
                            type="password"
                            id="registerPassword"
                            name="password"
                            class="register-input-kua"
                            placeholder="Password minimal 6 karakter"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="btn-show-register-password"
                            onclick="toggleRegisterPassword(
                                'registerPassword',
                                'registerEyeIcon'
                            )"
                            aria-label="Tampilkan password"
                        >

                            <i
                                class="fas fa-eye"
                                id="registerEyeIcon"
                            ></i>

                        </button>

                    </div>

                </div>


                {{-- KONFIRMASI PASSWORD --}}

                <div class="register-input-group">

                    <div class="register-input-icon">

                        <i class="fas fa-lock"></i>

                    </div>

                    <div class="register-password-wrapper">

                        <input
                            type="password"
                            id="registerPasswordConfirmation"
                            name="password_confirmation"
                            class="register-input-kua"
                            placeholder="Konfirmasi password"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="btn-show-register-password"
                            onclick="toggleRegisterPassword(
                                'registerPasswordConfirmation',
                                'registerEyeConfirmationIcon'
                            )"
                            aria-label="Tampilkan konfirmasi password"
                        >

                            <i
                                class="fas fa-eye"
                                id="registerEyeConfirmationIcon"
                            ></i>

                        </button>

                    </div>

                </div>


                {{-- BUTTON --}}

                <button
                    type="submit"
                    class="register-btn"
                >

                    <i class="fas fa-user-plus me-2"></i>

                    DAFTAR AKUN

                </button>

            </form>


            {{-- LOGIN --}}

            <div class="register-login-wrapper">

                Sudah punya akun?

                <a
                    href="{{ route('login') }}"
                    class="register-login-link"
                >
                    Login di sini
                </a>

            </div>


            {{-- BACK --}}

            <div class="register-back-wrapper">

                <a
                    href="{{ route('landing.beranda') }}"
                    class="register-back-link"
                >

                    <i class="fas fa-arrow-left"></i>

                    Kembali ke Beranda Website

                </a>

            </div>

        </div>

    </div>

</div>


<script>

function toggleRegisterPassword(
    inputId,
    iconId
) {

    const input =
        document.getElementById(inputId);

    const icon =
        document.getElementById(iconId);


    if (input.type === 'password') {

        input.type = 'text';

        icon.classList.remove('fa-eye');

        icon.classList.add('fa-eye-slash');

    } else {

        input.type = 'password';

        icon.classList.remove('fa-eye-slash');

        icon.classList.add('fa-eye');

    }

}

</script>

@endsection