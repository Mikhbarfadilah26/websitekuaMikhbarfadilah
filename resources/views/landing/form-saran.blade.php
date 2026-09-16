@extends('layouts.applanding')

@section('title', 'Saran & Pengaduan')

@section('content')

<style>

    /* =====================================================
       HALAMAN SARAN
    ====================================================== */

    .saran-page {
        background: #f4faf6;
        min-height: calc(100vh - 70px);
        padding-top: 70px;
        padding-bottom: 50px;
    }


    /* =====================================================
       HEADER JUDUL
    ====================================================== */

    .saran-header {
        background: linear-gradient(
            135deg,
            #087f5b,
            #0b9b6e
        );

        padding: 32px 20px 35px;

        margin-bottom: 30px;

        text-align: center;

        color: white;

        box-shadow: 0 4px 15px rgba(0, 100, 70, .08);
    }


    .saran-header h1 {
        font-size: 38px;
        font-weight: 700;
        margin: 0 0 8px;
        letter-spacing: .3px;
    }


    .saran-header h1 i {
        margin-right: 10px;
    }


    .saran-header p {
        margin: 0;
        font-size: 16px;
        opacity: .95;
    }


    /* =====================================================
       CARD
    ====================================================== */

    .saran-card {
        border: 1px solid #d7eee2;

        border-radius: 16px;

        background: #ffffff;

        box-shadow:
            0 8px 25px rgba(0, 100, 70, .08);

        overflow: hidden;
    }


    .saran-card-header {
        background: #e8f7ef;

        border-bottom: 1px solid #d3eddf;

        padding: 18px 24px;
    }


    .saran-card-header h4 {
        margin: 0;

        color: #087f5b;

        font-size: 20px;

        font-weight: 700;
    }


    .saran-card-header p {
        margin: 5px 0 0;

        color: #5f7469;

        font-size: 14px;
    }


    .saran-card-body {
        padding: 28px;
    }


    /* =====================================================
       LABEL
    ====================================================== */

    .saran-form-label {
        color: #145c45;

        font-weight: 600;

        margin-bottom: 8px;
    }


    .saran-form-label i {
        color: #0b9b6e;
    }


    /* =====================================================
       TEXTAREA
    ====================================================== */

    .saran-textarea {
        min-height: 180px;

        resize: vertical;

        border: 1px solid #cfe5d9;

        border-radius: 10px;

        padding: 14px 16px;

        transition: .2s;
    }


    .saran-textarea:focus {
        border-color: #0b9b6e;

        box-shadow: 0 0 0 .2rem rgba(11, 155, 110, .12);
    }


    /* =====================================================
       KARAKTER
    ====================================================== */

    .saran-help {
        color: #718078;

        font-size: 13px;
    }


    /* =====================================================
       BUTTON
    ====================================================== */

    .btn-saran-kembali {
        border-radius: 9px;

        padding: 10px 20px;

        font-weight: 600;
    }


    .btn-saran-kirim {
        background: linear-gradient(
            135deg,
            #087f5b,
            #0b9b6e
        );

        color: white;

        border: none;

        border-radius: 9px;

        padding: 10px 24px;

        font-weight: 600;

        transition: .2s;
    }


    .btn-saran-kirim:hover {
        color: white;

        transform: translateY(-1px);

        box-shadow: 0 5px 15px rgba(8, 127, 91, .25);
    }


    /* =====================================================
       ALERT ERROR
    ====================================================== */

    .saran-alert {
        border-radius: 10px;
    }


    /* =====================================================
       SUCCESS POPUP
    ====================================================== */

    .success-overlay {
        position: fixed;

        inset: 0;

        width: 100%;
        height: 100%;

        background: rgba(0, 0, 0, .45);

        backdrop-filter: blur(4px);

        -webkit-backdrop-filter: blur(4px);

        display: flex;

        align-items: center;

        justify-content: center;

        z-index: 99999;

        padding: 20px;

        animation: successOverlayIn .25s ease;
    }


    .success-popup {
        width: 100%;

        max-width: 440px;

        background: #ffffff;

        border-radius: 24px;

        padding: 35px 30px 30px;

        text-align: center;

        position: relative;

        box-shadow:
            0 25px 70px rgba(0, 0, 0, .22);

        animation: successPopupIn .45s cubic-bezier(.17,.67,.35,1.25);

        overflow: hidden;
    }


    /* garis atas */

    .success-popup::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;

        height: 6px;

        background: linear-gradient(
            90deg,
            #087f5b,
            #0b9b6e,
            #18b981
        );
    }


    /* =====================================================
       ICON BULAT
    ====================================================== */

    .success-icon-wrapper {
        width: 92px;

        height: 92px;

        margin: 0 auto 20px;

        border-radius: 50%;

        background: #e7f8ef;

        display: flex;

        align-items: center;

        justify-content: center;

        position: relative;

        animation: successIconPop .6s ease .15s both;
    }


    .success-icon-wrapper::before {
        content: "";

        position: absolute;

        width: 108px;

        height: 108px;

        border-radius: 50%;

        border: 2px solid rgba(11, 155, 110, .15);

        animation: successRing 1.2s ease-out;
    }


    .success-icon {
        width: 66px;

        height: 66px;

        border-radius: 50%;

        background: linear-gradient(
            135deg,
            #087f5b,
            #0b9b6e
        );

        color: white;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 34px;

        box-shadow:
            0 8px 20px rgba(8, 127, 91, .25);
    }


    /* =====================================================
       TEXT POPUP
    ====================================================== */

    .success-popup h3 {
        margin: 0 0 10px;

        color: #145c45;

        font-size: 25px;

        font-weight: 700;

        animation: successTextIn .45s ease .25s both;
    }


    .success-popup p {
        margin: 0 auto 24px;

        max-width: 340px;

        color: #66756e;

        font-size: 15px;

        line-height: 1.6;

        animation: successTextIn .45s ease .32s both;
    }


    /* =====================================================
       BUTTON POPUP
    ====================================================== */

    .success-popup-button {
        border: none;

        outline: none;

        width: 100%;

        padding: 12px 20px;

        border-radius: 11px;

        color: white;

        font-weight: 600;

        font-size: 15px;

        background: linear-gradient(
            135deg,
            #087f5b,
            #0b9b6e
        );

        box-shadow:
            0 7px 18px rgba(8, 127, 91, .22);

        cursor: pointer;

        transition: all .2s ease;

        animation: successTextIn .45s ease .4s both;
    }


    .success-popup-button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 10px 22px rgba(8, 127, 91, .30);
    }


    .success-popup-button:active {
        transform: scale(.98);
    }


    /* =====================================================
       CLOSE BUTTON
    ====================================================== */

    .success-popup-close {
        position: absolute;

        top: 16px;

        right: 17px;

        width: 34px;

        height: 34px;

        border: none;

        border-radius: 50%;

        background: #f1f5f3;

        color: #718078;

        font-size: 16px;

        display: flex;

        align-items: center;

        justify-content: center;

        cursor: pointer;

        transition: .2s;

        z-index: 2;
    }


    .success-popup-close:hover {
        background: #e3ebe7;

        color: #145c45;

        transform: rotate(90deg);
    }


    /* =====================================================
       ANIMATION
    ====================================================== */

    @keyframes successOverlayIn {

        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }

    }


    @keyframes successPopupIn {

        0% {
            opacity: 0;

            transform:
                translateY(30px)
                scale(.85);
        }

        70% {
            transform:
                translateY(-5px)
                scale(1.02);
        }

        100% {
            opacity: 1;

            transform:
                translateY(0)
                scale(1);
        }

    }


    @keyframes successIconPop {

        0% {
            opacity: 0;

            transform: scale(.4);
        }

        70% {
            transform: scale(1.12);
        }

        100% {
            opacity: 1;

            transform: scale(1);
        }

    }


    @keyframes successRing {

        0% {
            opacity: 1;

            transform: scale(.5);
        }

        100% {
            opacity: 0;

            transform: scale(1.35);
        }

    }


    @keyframes successTextIn {

        from {
            opacity: 0;

            transform: translateY(10px);
        }

        to {
            opacity: 1;

            transform: translateY(0);
        }

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .saran-page {
            padding-top: 65px;
        }


        .saran-header {
            padding: 25px 15px 28px;
        }


        .saran-header h1 {
            font-size: 29px;
        }


        .saran-header p {
            font-size: 14px;
        }


        .saran-card-body {
            padding: 20px;
        }


        .success-popup {
            max-width: 360px;

            padding: 32px 22px 24px;

            border-radius: 20px;
        }


        .success-icon-wrapper {
            width: 82px;

            height: 82px;
        }


        .success-icon {
            width: 58px;

            height: 58px;

            font-size: 29px;
        }


        .success-popup h3 {
            font-size: 22px;
        }


        .success-popup p {
            font-size: 14px;
        }

    }

</style>


<div class="saran-page">


    {{-- =====================================================
         SUCCESS POPUP
    ====================================================== --}}

    @if(session('success'))

        <div
            class="success-overlay"
            id="successPopup">

            <div
                class="success-popup"
                role="dialog"
                aria-modal="true"
                aria-labelledby="successTitle">


                {{-- CLOSE --}}

                <button
                    type="button"
                    class="success-popup-close"
                    onclick="closeSuccessPopup()"
                    aria-label="Tutup">

                    <i class="fas fa-times"></i>

                </button>


                {{-- ICON --}}

                <div class="success-icon-wrapper">

                    <div class="success-icon">

                        <i class="fas fa-check"></i>

                    </div>

                </div>


                {{-- TITLE --}}

                <h3 id="successTitle">

                    Berhasil!

                </h3>


                {{-- MESSAGE --}}

                <p>

                    {{ session('success') }}

                </p>


                {{-- BUTTON --}}

                <button
                    type="button"
                    class="success-popup-button"
                    onclick="closeSuccessPopup()">

                    <i class="fas fa-check-circle me-1"></i>

                    Mengerti

                </button>


            </div>

        </div>

    @endif



    {{-- =====================================================
         HEADER JUDUL
    ====================================================== --}}

    <div class="saran-header">

        <div class="container">

            <h1>

                <i class="fas fa-comment-dots"></i>

                Saran & Pengaduan

            </h1>


            <p>

                Sampaikan saran, kritik, atau masukan untuk
                meningkatkan pelayanan KUA Kecamatan Karang Baru.

            </p>

        </div>

    </div>



    {{-- =====================================================
         CONTENT
    ====================================================== --}}

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 col-xl-7">


                {{-- =====================================================
                     VALIDATION ERROR
                ====================================================== --}}

                @if($errors->any())

                    <div class="alert alert-danger saran-alert">

                        <strong>

                            <i class="fas fa-exclamation-circle me-1"></i>

                            Terjadi kesalahan

                        </strong>


                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>

                                    {{ $error }}

                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                {{-- =====================================================
                     CARD SARAN
                ====================================================== --}}

                <div class="saran-card">


                    {{-- CARD HEADER --}}

                    <div class="saran-card-header">

                        <h4>

                            <i class="fas fa-pen me-2"></i>

                            Kirim Saran Anda

                        </h4>


                        <p>

                            Saran Anda akan menjadi bahan evaluasi
                            untuk meningkatkan kualitas pelayanan.

                        </p>

                    </div>



                    {{-- CARD BODY --}}

                    <div class="saran-card-body">

                        <form
                            action="{{ route('landing.saran.store') }}"
                            method="POST">

                            @csrf


                            {{-- =================================================
                                 ISI SARAN
                            ================================================== --}}

                            <div class="mb-4">

                                <label
                                    for="isi_saran"
                                    class="form-label saran-form-label">

                                    <i class="fas fa-comment-alt me-1"></i>

                                    Isi Saran / Pengaduan

                                </label>


                                <textarea
                                    name="isi_saran"
                                    id="isi_saran"
                                    rows="6"
                                    maxlength="1000"
                                    required
                                    class="form-control saran-textarea @error('isi_saran') is-invalid @enderror"
                                    placeholder="Tuliskan saran, kritik, atau pengaduan Anda di sini...">{{ old('isi_saran') }}</textarea>


                                @error('isi_saran')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror


                                <div class="text-end mt-2">

                                    <span class="saran-help">

                                        Maksimal 1000 karakter

                                    </span>

                                </div>

                            </div>



                            {{-- =================================================
                                 BUTTON
                            ================================================== --}}

                            <div
                                class="d-flex justify-content-between align-items-center">


                                <a
                                    href="{{ url('/') }}"
                                    class="btn btn-secondary btn-saran-kembali">

                                    <i class="fas fa-arrow-left me-1"></i>

                                    Kembali

                                </a>


                                <button
                                    type="submit"
                                    class="btn btn-saran-kirim">

                                    <i class="fas fa-paper-plane me-1"></i>

                                    Kirim Saran

                                </button>


                            </div>


                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =====================================================
     SUCCESS POPUP SCRIPT
====================================================== --}}

@if(session('success'))

<script>

    function closeSuccessPopup() {

        const popup = document.getElementById('successPopup');

        if (!popup) {
            return;
        }


        popup.style.opacity = '0';

        popup.style.transition = 'opacity .25s ease';


        const box = popup.querySelector('.success-popup');

        if (box) {

            box.style.transform = 'translateY(20px) scale(.95)';

            box.style.transition =
                'transform .25s ease';

        }


        setTimeout(function () {

            popup.remove();

        }, 250);

    }


    document.addEventListener('DOMContentLoaded', function () {

        const popup =
            document.getElementById('successPopup');


        if (!popup) {
            return;
        }


        /*
         * Klik area gelap di luar popup
         * untuk menutup popup.
         */

        popup.addEventListener('click', function (event) {

            if (event.target === popup) {

                closeSuccessPopup();

            }

        });


        /*
         * Tekan tombol ESC
         * untuk menutup popup.
         */

        document.addEventListener('keydown', function (event) {

            if (event.key === 'Escape') {

                closeSuccessPopup();

            }

        });


        /*
         * Popup otomatis tertutup
         * setelah 6 detik.
         */

        setTimeout(function () {

            closeSuccessPopup();

        }, 6000);

    });

</script>

@endif


@endsection