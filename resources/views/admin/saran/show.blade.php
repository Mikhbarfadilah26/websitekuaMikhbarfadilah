@extends('layouts.appadmin')

@section('title', 'Detail Saran & Pengaduan')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
     HEADER
====================================================== --}}
    <div class="saran-header shadow-sm">

        <div>
            <div class="saran-header-title">
                <i class="bi bi-chat-dots-fill me-2"></i>
                Detail Saran & Pengaduan
            </div>

            <div class="saran-header-subtitle">
                Lihat detail masukan yang disampaikan masyarakat
            </div>
        </div>

        <a href="{{ route('admin.saran.index') }}"
            class="btn btn-light btn-back">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>


    {{-- =====================================================
     SUCCESS MESSAGE
====================================================== --}}
    @if(session('success'))

    <div class="success-popup" id="successPopup">

        <div class="success-icon">
            <i class="bi bi-check-lg"></i>
        </div>

        <div>
            <div class="success-title">
                Berhasil
            </div>

            <div class="success-text">
                {{ session('success') }}
            </div>
        </div>

    </div>

    @endif


    <div class="row g-4 mt-1">

        {{-- =================================================
         INFORMASI PENGIRIM
    ================================================== --}}
        <div class="col-lg-4">

            <div class="card detail-card shadow-sm border-0">

                <div class="card-header-custom">

                    <div class="card-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div>
                        <div class="card-title-custom">
                            Informasi Pengirim
                        </div>

                        <div class="card-subtitle-custom">
                            Data pengguna
                        </div>
                    </div>

                </div>


                <div class="card-body">

                    <div class="info-item">

                        <div class="info-label">
                            <i class="bi bi-person me-2"></i>
                            Nama
                        </div>

                        <div class="info-value">
                            {{ optional($saran->user)->nama
                            ?? optional($saran->user)->name
                            ?? 'Pengguna' }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            <i class="bi bi-envelope me-2"></i>
                            Email
                        </div>

                        <div class="info-value">
                            {{ optional($saran->user)->email ?? '-' }}
                        </div>

                    </div>


                    @if(optional($saran->user)->no_hp)

                    <div class="info-item">

                        <div class="info-label">
                            <i class="bi bi-telephone me-2"></i>
                            No. HP
                        </div>

                        <div class="info-value">
                            {{ $saran->user->no_hp }}
                        </div>

                    </div>

                    @endif


                    <div class="info-item">

                        <div class="info-label">
                            <i class="bi bi-calendar3 me-2"></i>
                            Tanggal
                        </div>

                        <div class="info-value">
                            {{ $saran->created_at
                            ? $saran->created_at->format('d F Y, H:i')
                            : '-' }}
                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div class="info-item border-0 pb-0">

                        <div class="info-label">
                            <i class="bi bi-circle-half me-2"></i>
                            Status
                        </div>

                        <div>

                            @if($saran->status === 'belum_dibaca')

                            <span class="status-badge status-unread">
                                <i class="bi bi-envelope-fill me-1"></i>
                                Belum Dibaca
                            </span>

                            @elseif($saran->status === 'dibaca')

                            <span class="status-badge status-read">
                                <i class="bi bi-envelope-open-fill me-1"></i>
                                Dibaca
                            </span>

                            @elseif($saran->status === 'dibalas')

                            <span class="status-badge status-replied">
                                <i class="bi bi-reply-fill me-1"></i>
                                Sudah Dibalas
                            </span>

                            @else

                            <span class="status-badge status-default">
                                {{ ucfirst(str_replace('_', ' ', $saran->status ?? '-')) }}
                            </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
         DETAIL SARAN
    ================================================== --}}
        <div class="col-lg-8">

            <div class="card detail-card shadow-sm border-0">

                <div class="card-header-custom">

                    <div class="card-icon message-icon">
                        <i class="bi bi-chat-left-text-fill"></i>
                    </div>

                    <div>
                        <div class="card-title-custom">
                            Isi Saran & Pengaduan
                        </div>

                        <div class="card-subtitle-custom">
                            Pesan yang disampaikan oleh masyarakat
                        </div>
                    </div>

                </div>


                <div class="card-body">

                    <div class="message-box">

                        {!! nl2br(e($saran->isi_saran)) !!}

                    </div>


                    {{-- =================================================
                     BALASAN ADMIN
                ================================================== --}}
                    @if(!empty($saran->balasan))

                    <div class="reply-section">

                        <div class="reply-heading">

                            <div class="reply-icon">
                                <i class="bi bi-reply-fill"></i>
                            </div>

                            <div>
                                <div class="reply-title">
                                    Balasan Admin
                                </div>

                                <div class="reply-subtitle">
                                    Tanggapan dari pihak KUA
                                </div>
                            </div>

                        </div>


                        <div class="reply-box">

                            {!! nl2br(e($saran->balasan)) !!}

                        </div>

                    </div>

                    @endif


                    {{-- =================================================
                     FORM BALAS
                ================================================== --}}
                    <div class="reply-form-section">

                        <div class="section-title">

                            <i class="bi bi-send-fill me-2"></i>
                            {{ !empty($saran->balasan)
                            ? 'Perbarui Balasan'
                            : 'Balas Saran' }}

                        </div>


                        @if($errors->any())

                        <div class="alert alert-danger border-0 shadow-sm">

                            <div class="fw-semibold mb-1">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                Periksa kembali data
                            </div>

                            <ul class="mb-0 ps-3">

                                @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                        @endif


                        <form
                            action="{{ route('admin.saran.balas', $saran->id) }}"
                            method="POST">

                            @csrf

                            <div class="mb-3">

                                <label
                                    for="tanggapan"
                                    class="form-label fw-semibold">

                                    Tanggapan Admin

                                </label>

                                <textarea
                                    name="tanggapan"
                                    id="tanggapan"
                                    rows="6"
                                    class="form-control"
                                    placeholder="Tuliskan tanggapan untuk saran atau pengaduan ini..."
                                    required>{{ old('tanggapan', $saran->balasan ?? '') }}</textarea>

                            </div>


                            <div class="d-flex justify-content-end">

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-send">

                                    <i class="bi bi-send-fill me-1"></i>
                                    Kirim Balasan

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- =========================================================
STYLE
========================================================= --}}

<style>
    .saran-header {
        background: linear-gradient(135deg,
                #0f172a 0%,
                #1e3a8a 55%,
                #2563eb 100%);

        border-radius: 16px;
        padding: 22px 26px;
        color: #fff;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;
    }

    .saran-header-title {
        font-size: 23px;
        font-weight: 700;
    }

    .saran-header-subtitle {
        margin-top: 5px;
        font-size: 14px;
        opacity: .85;
    }

    .btn-back {
        border: none;
        border-radius: 10px;
        padding: 10px 17px;
        font-weight: 600;
        white-space: nowrap;
    }


    /* =====================================================
       SUCCESS POPUP
    ====================================================== */

    .success-popup {
        position: fixed;
        top: 50%;
        left: 50%;

        transform: translate(-50%, -50%);

        z-index: 9999;

        min-width: 330px;
        max-width: 90%;

        padding: 18px 22px;

        background: #fff;

        border-radius: 14px;

        box-shadow:
            0 15px 50px rgba(15, 23, 42, .22);

        display: flex;
        align-items: center;
        gap: 14px;

        animation: popupShow .25s ease;
    }

    .success-icon {
        width: 43px;
        height: 43px;

        border-radius: 50%;

        background: #dcfce7;
        color: #16a34a;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;
    }

    .success-title {
        font-weight: 700;
        color: #166534;
    }

    .success-text {
        color: #64748b;
        font-size: 13px;
        margin-top: 2px;
    }

    @keyframes popupShow {

        from {
            opacity: 0;
            transform: translate(-50%, -46%);
        }

        to {
            opacity: 1;
            transform: translate(-50%, -50%);
        }

    }


    /* =====================================================
       CARD
    ====================================================== */

    .detail-card {
        border-radius: 16px;
        overflow: hidden;
    }

    .card-header-custom {
        padding: 18px 20px;

        display: flex;
        align-items: center;
        gap: 13px;

        border-bottom: 1px solid #eef2f7;
        background: #fff;
    }

    .card-icon {
        width: 43px;
        height: 43px;

        border-radius: 11px;

        background: #e0ecff;
        color: #2563eb;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 19px;
    }

    .message-icon {
        background: #ede9fe;
        color: #7c3aed;
    }

    .card-title-custom {
        font-size: 16px;
        font-weight: 700;
        color: #1e293b;
    }

    .card-subtitle-custom {
        font-size: 12px;
        color: #94a3b8;
        margin-top: 2px;
    }


    /* =====================================================
       INFORMATION
    ====================================================== */

    .info-item {
        padding: 14px 0;
        border-bottom: 1px solid #eef2f7;
    }

    .info-label {
        font-size: 12px;
        color: #94a3b8;
        margin-bottom: 5px;
    }

    .info-value {
        color: #1e293b;
        font-weight: 600;
        word-break: break-word;
    }


    /* =====================================================
       STATUS
    ====================================================== */

    .status-badge {
        display: inline-flex;
        align-items: center;

        padding: 6px 10px;

        border-radius: 20px;

        font-size: 12px;
        font-weight: 600;
    }

    .status-unread {
        background: #fee2e2;
        color: #dc2626;
    }

    .status-read {
        background: #fef3c7;
        color: #b45309;
    }

    .status-replied {
        background: #dcfce7;
        color: #15803d;
    }

    .status-default {
        background: #e2e8f0;
        color: #475569;
    }


    /* =====================================================
       MESSAGE
    ====================================================== */

    .message-box {
        background: #f8fafc;

        border: 1px solid #e2e8f0;

        border-radius: 12px;

        padding: 20px;

        color: #334155;

        line-height: 1.8;

        min-height: 130px;
    }


    /* =====================================================
       REPLY
    ====================================================== */

    .reply-section {
        margin-top: 25px;
        padding-top: 22px;

        border-top: 1px solid #eef2f7;
    }

    .reply-heading {
        display: flex;
        align-items: center;
        gap: 11px;

        margin-bottom: 12px;
    }

    .reply-icon {
        width: 38px;
        height: 38px;

        border-radius: 10px;

        background: #dcfce7;
        color: #16a34a;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .reply-title {
        font-weight: 700;
        color: #1e293b;
    }

    .reply-subtitle {
        color: #94a3b8;
        font-size: 12px;
    }

    .reply-box {
        background: #f0fdf4;

        border: 1px solid #bbf7d0;

        border-radius: 12px;

        padding: 17px;

        color: #166534;

        line-height: 1.8;
    }


    /* =====================================================
       FORM BALAS
    ====================================================== */

    .reply-form-section {
        margin-top: 25px;
        padding-top: 22px;

        border-top: 1px solid #eef2f7;
    }

    .section-title {
        font-size: 15px;
        font-weight: 700;

        color: #1e293b;

        margin-bottom: 14px;
    }

    textarea.form-control {
        resize: vertical;
        line-height: 1.6;

        border-color: #dbe2ea;
    }

    textarea.form-control:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 .2rem rgba(37, 99, 235, .10);
    }

    .btn-send {
        border: none;
        border-radius: 10px;

        padding: 10px 18px;

        font-weight: 600;
    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .saran-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-back {
            width: 100%;
        }

        .success-popup {
            min-width: auto;
            width: calc(100% - 30px);
        }

    }
</style>

{{-- =========================================================
JAVASCRIPT
========================================================= --}}
@if(session('success'))

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const popup = document.getElementById('successPopup');

        if (popup) {

            setTimeout(function() {

                popup.style.opacity = '0';
                popup.style.transform = 'translate(-50%, -55%)';

                popup.style.transition =
                    'opacity .3s ease, transform .3s ease';

                setTimeout(function() {

                    popup.remove();

                }, 300);

            }, 2500);

        }

    });
</script>

@endif

@endsection