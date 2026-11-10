@extends('layouts.applanding')

@section('title', 'Login Admin - KUA Karang Baru')

@section('content')

<style>

/* =========================================================
   GLOBAL FIX
   MENCEGAH HALAMAN MELEBAR KE KANAN
========================================================= */

html,
body {
    width: 100%;
    max-width: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden !important;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}


/* =========================================================
   HILANGKAN NAVBAR PADA HALAMAN LOGIN
========================================================= */

body:has(.login-page-kua) .top-navbar-kua {
    display: none !important;
}


/* =========================================================
   LOGIN PAGE
========================================================= */

.login-page-kua {

    width: 100%;
    max-width: 100%;

    min-height: calc(100vh - 1px);

    padding: 35px 20px;

    background:
        radial-gradient(
            circle at 10% 10%,
            rgba(22, 163, 74, 0.10),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 90%,
            rgba(21, 128, 61, 0.08),
            transparent 30%
        ),
        #f4f8f5;

    display: flex;

    align-items: center;
    justify-content: center;

    position: relative;

    overflow: hidden;
}


/* =========================================================
   ORNAMEN BACKGROUND
========================================================= */

.login-page-kua::before {

    content: "";

    position: absolute;

    width: 280px;
    height: 280px;

    top: -130px;
    right: -100px;

    background: rgba(22, 163, 74, 0.08);

    border-radius: 50%;

    pointer-events: none;
}


.login-page-kua::after {

    content: "";

    position: absolute;

    width: 220px;
    height: 220px;

    bottom: -100px;
    left: -80px;

    background: rgba(21, 128, 61, 0.07);

    border-radius: 50%;

    pointer-events: none;
}


/* =========================================================
   KARTU LOGIN
========================================================= */

.login-card-split {

    width: 100%;
    max-width: 930px;

    display: flex;

    background: #ffffff;

    border-radius: 22px;

    overflow: hidden;

    box-shadow:
        0 20px 50px rgba(15, 60, 35, 0.12),
        0 5px 15px rgba(0, 0, 0, 0.04);

    position: relative;

    z-index: 2;
}


/* =========================================================
   BAGIAN KIRI
========================================================= */

.login-left-side {

    width: 45%;
    flex: 0 0 45%;

    padding: 45px 38px;

    background:
        linear-gradient(
            145deg,
            #166534 0%,
            #15803d 45%,
            #16a34a 100%
        );

    color: #ffffff;

    display: flex;

    flex-direction: column;

    justify-content: space-between;

    position: relative;

    overflow: hidden;
}


/* Ornamen kiri */

.login-left-side::before {

    content: "";

    position: absolute;

    width: 240px;
    height: 240px;

    right: -100px;
    top: -90px;

    border: 35px solid rgba(255, 255, 255, 0.07);

    border-radius: 50%;
}


.login-left-side::after {

    content: "";

    position: absolute;

    width: 300px;
    height: 300px;

    left: -150px;
    bottom: -170px;

    border: 40px solid rgba(255, 255, 255, 0.06);

    border-radius: 50%;
}


/* =========================================================
   LOGO KUA
========================================================= */

.login-logo-wrapper {

    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;

    gap: 15px;

    margin-bottom: 35px;
}


.login-logo {

    width: 68px;
    height: 68px;

    object-fit: contain;

    background: #ffffff;

    padding: 7px;

    border-radius: 14px;

    box-shadow:
        0 8px 20px rgba(0, 0, 0, 0.15);
}


.login-logo-text {

    min-width: 0;
}


.login-logo-text strong {

    display: block;

    color: #ffffff;

    font-size: 15px;

    font-weight: 800;

    line-height: 1.35;
}


.login-logo-text span {

    display: block;

    color: rgba(255, 255, 255, 0.82);

    font-size: 11px;

    margin-top: 3px;
}


/* =========================================================
   BRANDING
========================================================= */

.login-brand-content {

    position: relative;

    z-index: 2;
}


.login-brand-title {

    font-size: 31px;

    font-weight: 800;

    line-height: 1.25;

    margin: 0 0 13px;

    color: #ffffff;
}


.login-brand-subtitle {

    max-width: 340px;

    font-size: 14px;

    line-height: 1.7;

    color: rgba(255, 255, 255, 0.88);

    margin: 0;
}


/* =========================================================
   ILUSTRASI
========================================================= */

.login-illustration-box {

    position: relative;

    z-index: 2;

    text-align: center;

    margin-top: 30px;
}


.login-illustration-icon {

    width: 110px;
    height: 110px;

    margin: auto;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(255, 255, 255, 0.10);

    border: 1px solid rgba(255, 255, 255, 0.20);

    box-shadow:
        inset 0 0 25px rgba(255, 255, 255, 0.05);
}


.login-illustration-icon i {

    font-size: 48px;

    color: #ffffff;

    opacity: 0.95;
}


.login-security-text {

    color: rgba(255, 255, 255, 0.75);

    font-size: 11px;

    margin-top: 12px;

    margin-bottom: 0;
}


/* =========================================================
   BAGIAN KANAN FORM LOGIN
========================================================= */

.login-right-side {

    width: 55%;
    flex: 0 0 55%;

    padding: 45px 45px;

    background: #ffffff;

    display: flex;

    flex-direction: column;

    justify-content: center;

    min-width: 0;

    overflow: hidden;
}


/* =========================================================
   HEADER FORM
========================================================= */

.login-form-header {

    width: 100%;

    margin-bottom: 24px;
}


.login-form-title {

    color: #14532d;

    font-size: 28px;

    font-weight: 800;

    margin: 0 0 6px;

    line-height: 1.25;
}


.login-form-subtitle {

    color: #64748b;

    font-size: 13px;

    line-height: 1.5;

    margin: 0;
}


.login-title-line {

    width: 45px;

    height: 4px;

    background: #16a34a;

    border-radius: 10px;

    margin-top: 12px;
}


/* =========================================================
   ALERT
========================================================= */

.login-alert-kua {

    border-radius: 10px;

    font-size: 13px;

    line-height: 1.5;

    padding: 11px 13px;

    margin-bottom: 18px;

    border: none;
}


/* =========================================================
   FORM
========================================================= */

.login-right-side form {

    width: 100%;

    max-width: 100%;
}


.login-input-group {

    display: flex;

    width: 100%;

    min-width: 0;

    margin-bottom: 15px;

    position: relative;
}


.login-input-icon {

    width: 46px;
    min-width: 46px;
    flex: 0 0 46px;

    height: 48px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #f0fdf4;

    border: 1px solid #d8e8dc;

    border-right: none;

    border-radius: 9px 0 0 9px;

    color: #15803d;

    font-size: 14px;
}


.login-input-kua {

    width: 100%;

    min-width: 0;

    height: 48px;

    border: 1px solid #d8e8dc;

    border-radius: 0 9px 9px 0;

    padding: 0 13px;

    font-size: 14px;

    color: #1e293b;

    outline: none;

    background: #ffffff;

    transition: all 0.2s ease;
}


.login-input-kua::placeholder {

    color: #94a3b8;
}


.login-input-kua:focus {

    border-color: #16a34a;

    background: #ffffff;

    box-shadow:
        0 0 0 3px rgba(22, 163, 74, 0.10);
}


.login-input-group:focus-within .login-input-icon {

    border-color: #16a34a;

    color: #15803d;

    background: #f0fdf4;
}


/* =========================================================
   PASSWORD
========================================================= */

.login-password-wrapper {

    position: relative;

    flex: 1 1 auto;

    min-width: 0;

    width: 100%;
}


.login-password-wrapper .login-input-kua {

    width: 100%;

    padding-right: 42px;
}


.btn-show-password {

    position: absolute;

    top: 0;

    right: 0;

    width: 44px;

    height: 48px;

    border: none;

    background: transparent;

    color: #94a3b8;

    font-size: 14px;

    cursor: pointer;

    display: flex;

    align-items: center;
    justify-content: center;

    transition: 0.2s;
}


.btn-show-password:hover {

    color: #15803d;
}


/* =========================================================
   LUPA PASSWORD
========================================================= */

.login-actions-row {

    display: flex;

    justify-content: flex-end;

    align-items: center;

    margin: 2px 0 15px;

    font-size: 12px;
}


.login-link-muted {

    color: #64748b;

    text-decoration: none;

    transition: 0.2s;
}


.login-link-muted:hover {

    color: #15803d;

    text-decoration: none;
}


/* =========================================================
   REGISTER
========================================================= */

.login-register-text {

    font-size: 13px;

    color: #64748b;

    margin-bottom: 20px;
}


.login-register-link {

    color: #15803d;

    font-weight: 700;

    text-decoration: none;

    transition: 0.2s;
}


.login-register-link:hover {

    color: #166534;

    text-decoration: underline;
}


/* =========================================================
   BUTTON GROUP
========================================================= */

.login-btn-group {

    width: 100%;

    display: flex;

    gap: 10px;
}


.btn-login-action {

    flex: 1 1 50%;

    min-width: 0;

    width: 50%;

    height: 46px;

    border: none;

    border-radius: 9px;

    font-size: 13px;

    font-weight: 700;

    cursor: pointer;

    display: flex;

    align-items: center;

    justify-content: center;

    text-decoration: none;

    white-space: nowrap;

    transition: all 0.2s ease;
}


/* =========================================================
   BUTTON MASUK
========================================================= */

.btn-masuk-green {

    background:
        linear-gradient(
            135deg,
            #15803d,
            #16a34a
        );

    color: #ffffff;

    box-shadow:
        0 6px 16px rgba(22, 163, 74, 0.20);
}


.btn-masuk-green:hover {

    background:
        linear-gradient(
            135deg,
            #166534,
            #15803d
        );

    color: #ffffff;

    transform: translateY(-1px);

    box-shadow:
        0 8px 20px rgba(22, 163, 74, 0.25);
}


/* =========================================================
   BUTTON KEMBALI
========================================================= */

.btn-kembali {

    background: #f0fdf4;

    color: #166534;

    border: 1px solid #ccebd5;
}


.btn-kembali:hover {

    background: #dcfce7;

    color: #14532d;

    transform: translateY(-1px);
}


/* =========================================================
   KEMBALI BERANDA
========================================================= */

.login-back-wrapper {

    margin-top: 20px;

    text-align: center;
}


.login-back-link {

    font-size: 12px;

    color: #64748b;

    text-decoration: none;

    font-weight: 600;

    display: inline-flex;

    align-items: center;

    gap: 6px;

    transition: 0.2s;
}


.login-back-link:hover {

    color: #15803d;

    text-decoration: none;
}


/* =========================================================
   =========================================================
   FOOTER FIX
   MENCEGAH FOOTER TERPOTONG / MELEBAR
   =========================================================
========================================================= */

.footer-section {

    width: 100% !important;

    max-width: 100% !important;

    margin: 0 !important;

    padding: 0 !important;

    overflow-x: hidden !important;

    overflow-y: hidden;

    box-sizing: border-box;
}


.footer-section *,
.footer-section *::before,
.footer-section *::after {

    box-sizing: border-box;
}


.footer-main {

    width: 100%;

    max-width: 100%;

    padding: 30px 0 20px;

    overflow: hidden;
}


.footer-section .container {

    width: 100%;

    max-width: 1200px;

    margin-left: auto;
    margin-right: auto;

    padding-left: 20px;
    padding-right: 20px;
}


.footer-column {

    min-width: 0;

    margin-bottom: 20px;
}


/* =========================================================
   FOOTER HEADING
========================================================= */

.footer-heading {

    color: #ffffff;

    font-size: 17px;

    font-weight: 700;

    margin: 0 0 13px;

    line-height: 1.3;
}


/* =========================================================
   FOOTER MAP
========================================================= */

.footer-map {

    width: 100%;

    max-width: 100%;

    overflow: hidden;

    border-radius: 4px;
}


.footer-map iframe {

    display: block;

    width: 100% !important;

    max-width: 100% !important;

    height: 235px;

    border: 0;
}


/* =========================================================
   FANSPAGE
========================================================= */

.fanspage-box {

    width: 100%;

    max-width: 100%;

    overflow: hidden;
}


.fanspage-content {

    width: 100%;

    text-align: center;

    padding: 5px 5px 0;
}


.mosque-icon {

    display: block;

    font-size: 43px;

    color: #ffffff;

    margin-bottom: 9px;
}


.fanspage-content h5 {

    color: #ffffff;

    font-size: 21px;

    font-weight: 700;

    margin: 0 0 5px;
}


.fanspage-content p {

    color: #dddddd;

    font-size: 14px;

    margin: 0 0 15px;
}


/* =========================================================
   SOCIAL ICON
========================================================= */

.social-icons,
.contact-social {

    display: flex;

    align-items: center;

    gap: 9px;

    flex-wrap: wrap;
}


.social-icons {

    justify-content: center;
}


.social-icons a,
.contact-social a {

    width: 40px;

    height: 40px;

    flex: 0 0 40px;

    border-radius: 50%;

    background: #ffffff;

    color: #343a40;

    display: flex;

    align-items: center;

    justify-content: center;

    text-decoration: none;

    font-size: 14px;

    transition: 0.2s;
}


.social-icons a:hover,
.contact-social a:hover {

    color: #15803d;

    transform: translateY(-1px);
}


/* =========================================================
   CONTACT
========================================================= */

.contact-content {

    width: 100%;

    max-width: 100%;

    color: #eeeeee;

    overflow-wrap: anywhere;
}


.contact-content p {

    font-size: 14px;

    line-height: 1.55;

    margin: 0 0 9px;
}


.contact-content .contact-title {

    color: #ffffff;

    font-size: 16px;

    font-weight: 700;

    line-height: 1.45;

    margin-bottom: 11px;
}


.contact-content strong {

    color: #ffffff;
}


.wa-layanan {

    margin-top: 10px !important;

    margin-bottom: 13px !important;
}


/* =========================================================
   FOOTER BOTTOM
========================================================= */

.footer-bottom {

    width: 100% !important;

    max-width: 100% !important;

    background: #2c3237;

    padding: 11px 0;

    overflow: hidden;
}


.footer-bottom .container {

    width: 100%;

    max-width: 1200px;
}


.footer-bottom-content {

    width: 100%;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    min-width: 0;
}


.copyright {

    color: #dddddd;

    font-size: 12px;

    margin: 0;

    line-height: 1.4;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .login-page-kua {

        padding: 30px 15px;
    }


    .login-card-split {

        max-width: 850px;
    }


    .login-left-side {

        padding: 40px 30px;
    }


    .login-right-side {

        padding: 40px 30px;
    }


    .footer-section .container {

        padding-left: 18px;

        padding-right: 18px;
    }


    .footer-map iframe {

        height: 210px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    /* LOGIN */

    .login-page-kua {

        width: 100%;

        min-height: 100vh;

        padding: 15px 10px;

        align-items: center;

        overflow-x: hidden;
    }


    .login-card-split {

        width: 100%;

        max-width: 460px;

        display: flex;

        flex-direction: column;

        margin: 0 auto;

        overflow: hidden;

        border-radius: 18px;
    }


    .login-left-side {

        width: 100%;

        flex: none;

        padding: 24px 20px;
    }


    .login-logo-wrapper {

        margin-bottom: 20px;

        gap: 11px;
    }


    .login-logo {

        width: 53px;

        height: 53px;

        padding: 6px;

        border-radius: 11px;
    }


    .login-logo-text strong {

        font-size: 13px;
    }


    .login-logo-text span {

        font-size: 10px;
    }


    .login-brand-title {

        font-size: 23px;

        margin-bottom: 7px;
    }


    .login-brand-subtitle {

        font-size: 12px;

        line-height: 1.55;
    }


    /* Hilangkan ilustrasi besar pada HP */

    .login-illustration-box {

        display: none;
    }


    /* FORM */

    .login-right-side {

        width: 100%;

        flex: none;

        padding: 28px 20px 25px;

        min-width: 0;

        overflow: hidden;
    }


    .login-form-header {

        width: 100%;

        margin-bottom: 20px;
    }


    .login-form-title {

        font-size: 23px;
    }


    .login-form-subtitle {

        font-size: 12px;
    }


    .login-title-line {

        width: 38px;

        height: 3px;

        margin-top: 10px;
    }


    .login-input-group {

        width: 100%;

        margin-bottom: 13px;
    }


    .login-input-icon {

        width: 43px;

        min-width: 43px;

        flex-basis: 43px;

        height: 46px;
    }


    .login-input-kua {

        width: 100%;

        min-width: 0;

        height: 46px;

        font-size: 13px;
    }


    .btn-show-password {

        height: 46px;
    }


    .login-register-text {

        font-size: 12px;

        margin-bottom: 16px;
    }


    .login-btn-group {

        width: 100%;

        gap: 8px;
    }


    .btn-login-action {

        width: 50%;

        min-width: 0;

        flex: 1 1 50%;

        height: 45px;

        font-size: 12px;
    }


    .login-back-wrapper {

        margin-top: 15px;
    }


    /* FOOTER */

    .footer-main {

        padding: 24px 0 5px;
    }


    .footer-section .container {

        width: 100%;

        padding-left: 15px;

        padding-right: 15px;
    }


    .footer-column {

        width: 100%;

        margin-bottom: 23px;
    }


    .footer-heading {

        font-size: 16px;

        margin-bottom: 10px;
    }


    .footer-map {

        width: 100%;
    }


    .footer-map iframe {

        width: 100% !important;

        max-width: 100% !important;

        height: 185px;
    }


    .mosque-icon {

        font-size: 37px;

        margin-bottom: 7px;
    }


    .fanspage-content h5 {

        font-size: 19px;
    }


    .fanspage-content p {

        font-size: 13px;

        margin-bottom: 12px;
    }


    .contact-content p {

        font-size: 13px;

        line-height: 1.5;

        margin-bottom: 7px;
    }


    .contact-content .contact-title {

        font-size: 14px;

        line-height: 1.4;
    }


    .social-icons a,
    .contact-social a {

        width: 36px;

        height: 36px;

        flex-basis: 36px;

        font-size: 13px;
    }


    .footer-bottom {

        padding: 10px 0;
    }


    .footer-bottom-content {

        display: flex;

        flex-direction: column;

        justify-content: center;

        text-align: center;

        gap: 3px;
    }


    .copyright {

        font-size: 11px;
    }

}


/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media (max-width: 400px) {

    .login-page-kua {

        padding: 10px 7px;
    }


    .login-card-split {

        border-radius: 15px;
    }


    .login-left-side {

        padding: 20px 18px;
    }


    .login-logo {

        width: 48px;

        height: 48px;
    }


    .login-brand-title {

        font-size: 20px;
    }


    .login-brand-subtitle {

        font-size: 11px;
    }


    .login-right-side {

        padding: 23px 16px 20px;
    }


    .login-form-title {

        font-size: 21px;
    }


    .login-form-subtitle {

        font-size: 11px;
    }


    .login-input-icon {

        width: 40px;

        min-width: 40px;

        flex-basis: 40px;
    }


    .login-input-kua {

        font-size: 12px;

        padding-left: 11px;

        padding-right: 11px;
    }


    .login-btn-group {

        gap: 7px;
    }


    .btn-login-action {

        height: 43px;

        font-size: 11px;
    }


    /* FOOTER */

    .footer-section .container {

        padding-left: 12px;

        padding-right: 12px;
    }


    .footer-main {

        padding-top: 20px;
    }


    .footer-map iframe {

        height: 165px;
    }


    .footer-column {

        margin-bottom: 19px;
    }


    .footer-heading {

        font-size: 15px;
    }


    .contact-content p {

        font-size: 12px;
    }

}

</style>


{{-- =========================================================
     LOGIN PAGE
========================================================= --}}

<div class="login-page-kua">

    <div class="login-card-split">


        {{-- =====================================================
             BAGIAN KIRI
        ====================================================== --}}

        <div class="login-left-side">


            {{-- LOGO KUA --}}

            <div class="login-logo-wrapper">

                <img
                    src="{{ asset('7.png') }}"
                    alt="Logo KUA Karang Baru"
                    class="login-logo"
                >

                <div class="login-logo-text">

                    <strong>
                        KANTOR URUSAN AGAMA
                    </strong>

                    <span>
                        Kecamatan Karang Baru
                    </span>

                </div>

            </div>


            {{-- BRANDING --}}

            <div class="login-brand-content">

                <h1 class="login-brand-title">

                    Sistem Informasi
                    <br>
                    Layanan KUA

                </h1>


                <p class="login-brand-subtitle">

                    Selamat datang di Sistem Layanan
                    Kantor Urusan Agama Kecamatan
                    Karang Baru.

                </p>

            </div>


            {{-- ILUSTRASI --}}

            <div class="login-illustration-box">

                <div class="login-illustration-icon">

                    <i class="fas fa-mosque"></i>

                </div>


                <p class="login-security-text">

                    Pelayanan KUA Karang Baru

                </p>

            </div>

        </div>


        {{-- =====================================================
             BAGIAN KANAN / FORM LOGIN
        ====================================================== --}}

        <div class="login-right-side">


            {{-- HEADER FORM --}}

            <div class="login-form-header">

                <h2 class="login-form-title">

                    Masuk

                </h2>


                <p class="login-form-subtitle">

                    Silahkan masuk ke aplikasi dengan akun Anda

                </p>


                <div class="login-title-line"></div>

            </div>


            {{-- =================================================
                 ERROR
            ================================================== --}}

            @if ($errors->any())

                <div class="alert alert-danger login-alert-kua">

                    <i class="fas fa-exclamation-circle me-1"></i>

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- =================================================
                 SUCCESS
            ================================================== --}}

            @if (session('success'))

                <div class="alert alert-success login-alert-kua">

                    <i class="fas fa-check-circle me-1"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- =================================================
                 FORM LOGIN
            ================================================== --}}

            <form
                action="{{ route('login.proses') }}"
                method="POST"
            >

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

                            <i
                                class="fas fa-eye"
                                id="eyeIcon"
                            ></i>

                        </button>

                    </div>

                </div>


                {{-- LUPA PASSWORD --}}

                <div class="login-actions-row">

                    <a
                        href="#"
                        class="login-link-muted"
                    >
                        Lupa Password?
                    </a>

                </div>


                {{-- REGISTRASI --}}

                <div class="login-register-text">

                    Belum punya akun?

                    <a
                        href="{{ route('register') }}"
                        class="login-register-link"
                    >
                        Silahkan Registrasi
                    </a>

                </div>


                {{-- =================================================
                     TOMBOL AKSI
                ================================================== --}}

                <div class="login-btn-group">


                    {{-- MASUK --}}

                    <button
                        type="submit"
                        class="btn-login-action btn-masuk-green"
                    >

                        <i class="fas fa-sign-in-alt me-2"></i>

                        MASUK

                    </button>


                    {{-- KEMBALI --}}

                    <a
                        href="{{ route('landing.beranda') }}"
                        class="btn-login-action btn-kembali"
                    >

                        KEMBALI

                    </a>

                </div>


            </form>


          


{{-- =========================================================
     JAVASCRIPT TOGGLE PASSWORD
========================================================= --}}

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