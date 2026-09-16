@extends('layouts.appadmin')

@section('title', 'Saran & Pengaduan')

@section('content')

<div class="container-fluid">

{{-- =====================================================
     HEADER
====================================================== --}}
<div class="saran-header shadow-sm">

    <div>
        <div class="saran-header-title">
            <i class="bi bi-chat-dots-fill me-2"></i>
            Saran & Pengaduan
        </div>

        <div class="saran-header-subtitle">
            Kelola saran dan pengaduan yang disampaikan masyarakat
        </div>
    </div>

</div>


{{-- =====================================================
     SUCCESS POPUP
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


{{-- =====================================================
     CARD TABLE
====================================================== --}}
<div class="card saran-card shadow-sm border-0 mt-4">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table saran-table align-middle mb-0">

                <thead>

                    <tr>

                        <th width="70" class="text-center">
                            No
                        </th>

                        <th>
                            Pengirim
                        </th>

                        <th>
                            Isi Saran / Pengaduan
                        </th>

                        <th width="150" class="text-center">
                            Status
                        </th>

                        <th width="180" class="text-center">
                            Tanggal
                        </th>

                        <th width="150" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($saran as $item)

                        <tr>

                            {{-- NO --}}
                            <td class="text-center">

                                <span class="number-badge">
                                    {{ $saran->firstItem() + $loop->index }}
                                </span>

                            </td>


                            {{-- PENGIRIM --}}
                            <td>

                                <div class="sender-box">

                                    <div class="sender-avatar">
                                        <i class="bi bi-person-fill"></i>
                                    </div>

                                    <div>

                                        <div class="sender-name">

                                            {{ optional($item->user)->nama
                                                ?? optional($item->user)->name
                                                ?? 'Pengguna' }}

                                        </div>

                                        <div class="sender-email">

                                            {{ optional($item->user)->email ?? '-' }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- ISI --}}
                            <td>

                                <div class="message-preview">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->isi_saran),
                                        100
                                    ) }}

                                </div>

                            </td>


                            {{-- STATUS --}}
                            <td class="text-center">

                                @if($item->status === 'belum_dibaca')

                                    <span class="status-badge status-unread">

                                        <i class="bi bi-envelope-fill me-1"></i>

                                        Belum Dibaca

                                    </span>

                                @elseif($item->status === 'dibaca')

                                    <span class="status-badge status-read">

                                        <i class="bi bi-envelope-open-fill me-1"></i>

                                        Dibaca

                                    </span>

                                @elseif($item->status === 'dibalas')

                                    <span class="status-badge status-replied">

                                        <i class="bi bi-reply-fill me-1"></i>

                                        Dibalas

                                    </span>

                                @else

                                    <span class="status-badge status-default">

                                        {{ ucfirst(
                                            str_replace(
                                                '_',
                                                ' ',
                                                $item->status ?? '-'
                                            )
                                        ) }}

                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}
                            <td class="text-center">

                                <div class="date-main">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ $item->created_at
                                        ? $item->created_at->format('d/m/Y')
                                        : '-' }}

                                </div>

                                <div class="date-time">

                                    {{ $item->created_at
                                        ? $item->created_at->format('H:i')
                                        : '' }}

                                </div>

                            </td>


                            {{-- =================================================
                                 AKSI
                            ================================================== --}}
                            <td>

                                <div class="action-buttons">

                                    {{-- LIHAT --}}
                                    <a
                                        href="{{ route('admin.saran.show', $item->id) }}"
                                        class="action-btn action-view"
                                        title="Lihat Detail"
                                        aria-label="Lihat Detail">

                                        <i class="bi bi-eye-fill"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('admin.saran.destroy', $item->id) }}"
                                        method="POST"
                                        class="delete-form">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus"
                                            aria-label="Hapus">

                                            <i class="bi bi-trash3-fill"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">

                                        <i class="bi bi-chat-square-text"></i>

                                    </div>

                                    <div class="empty-title">
                                        Belum Ada Saran
                                    </div>

                                    <div class="empty-text">
                                        Belum ada saran atau pengaduan dari masyarakat.
                                    </div>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =====================================================
             PAGINATION
        ====================================================== --}}
        @if($saran->hasPages())

            <div class="pagination-wrapper">

                {{ $saran->links() }}

            </div>

        @endif

    </div>

</div>

</div>

{{-- =========================================================
STYLE
========================================================= --}}

<style>

    /* =====================================================
       HEADER
    ====================================================== */

    .saran-header {

        background: linear-gradient(
            135deg,
            #0f172a 0%,
            #1e3a8a 55%,
            #2563eb 100%
        );

        border-radius: 16px;

        padding: 22px 26px;

        color: #fff;

        display: flex;
        align-items: center;
        justify-content: space-between;

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

        min-width: 43px;

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

    .saran-card {

        border-radius: 16px;

        overflow: hidden;

    }


    /* =====================================================
       TABLE
    ====================================================== */

    .saran-table {

        min-width: 950px;

    }

    .saran-table thead th {

        background: #f8fafc;

        color: #475569;

        font-size: 12px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .4px;

        padding: 16px 14px;

        border-bottom: 1px solid #e2e8f0;

        white-space: nowrap;

    }

    .saran-table tbody td {

        padding: 15px 14px;

        border-bottom: 1px solid #eef2f7;

        color: #334155;

    }

    .saran-table tbody tr:last-child td {

        border-bottom: none;

    }

    .saran-table tbody tr {

        transition: background .2s ease;

    }

    .saran-table tbody tr:hover {

        background: #f8fafc;

    }


    /* =====================================================
       NUMBER
    ====================================================== */

    .number-badge {

        display: inline-flex;

        align-items: center;
        justify-content: center;

        width: 31px;
        height: 31px;

        border-radius: 9px;

        background: #eff6ff;

        color: #2563eb;

        font-size: 12px;

        font-weight: 700;

    }


    /* =====================================================
       SENDER
    ====================================================== */

    .sender-box {

        display: flex;

        align-items: center;

        gap: 11px;

        min-width: 190px;

    }

    .sender-avatar {

        width: 40px;
        height: 40px;

        min-width: 40px;

        border-radius: 50%;

        background: #e0ecff;

        color: #2563eb;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 17px;

    }

    .sender-name {

        font-weight: 700;

        color: #1e293b;

        font-size: 14px;

        margin-bottom: 2px;

    }

    .sender-email {

        color: #94a3b8;

        font-size: 12px;

        max-width: 190px;

        overflow: hidden;

        text-overflow: ellipsis;

        white-space: nowrap;

    }


    /* =====================================================
       MESSAGE
    ====================================================== */

    .message-preview {

        max-width: 330px;

        line-height: 1.5;

        color: #64748b;

        font-size: 13px;

    }


    /* =====================================================
       STATUS
    ====================================================== */

    .status-badge {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 7px 10px;

        border-radius: 20px;

        font-size: 11px;

        font-weight: 700;

        white-space: nowrap;

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
       DATE
    ====================================================== */

    .date-main {

        color: #334155;

        font-size: 13px;

        font-weight: 600;

        white-space: nowrap;

    }

    .date-time {

        color: #94a3b8;

        font-size: 11px;

        margin-top: 3px;

    }


    /* =====================================================
       ACTION BUTTONS
    ====================================================== */

    .action-buttons {

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

    }

    .action-btn {

        width: 38px;

        height: 38px;

        min-width: 38px;

        padding: 0;

        border: none;

        border-radius: 9px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        text-decoration: none;

        cursor: pointer;

        transition:
            transform .18s ease,
            box-shadow .18s ease,
            background .18s ease;

    }

    .action-btn i {

        font-size: 17px;

        line-height: 1;

        display: block;

    }

    /* Mata */
    .action-view {

        background: #dbeafe;

        color: #2563eb;

    }

    .action-view:hover {

        background: #2563eb;

        color: #fff;

        transform: translateY(-2px);

        box-shadow:
            0 5px 12px rgba(37, 99, 235, .25);

    }

    /* Tong Sampah */
    .action-delete {

        background: #fee2e2;

        color: #dc2626;

    }

    .action-delete:hover {

        background: #dc2626;

        color: #fff;

        transform: translateY(-2px);

        box-shadow:
            0 5px 12px rgba(220, 38, 38, .25);

    }

    .delete-form {

        margin: 0;

        padding: 0;

        display: inline-flex;

    }


    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .empty-state {

        padding: 65px 20px;

        text-align: center;

    }

    .empty-icon {

        width: 65px;
        height: 65px;

        margin: 0 auto 15px;

        border-radius: 18px;

        background: #f1f5f9;

        color: #94a3b8;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 29px;

    }

    .empty-title {

        color: #334155;

        font-size: 16px;

        font-weight: 700;

    }

    .empty-text {

        color: #94a3b8;

        font-size: 13px;

        margin-top: 5px;

    }


    /* =====================================================
       PAGINATION
    ====================================================== */

    .pagination-wrapper {

        padding: 18px 20px;

        border-top: 1px solid #eef2f7;

        display: flex;

        justify-content: flex-end;

    }

    .pagination-wrapper .pagination {

        margin-bottom: 0;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 768px) {

        .saran-header {

            padding: 18px;

        }

        .saran-header-title {

            font-size: 19px;

        }

        .success-popup {

            width: calc(100% - 30px);

            min-width: auto;

        }

    }

</style>

{{-- =========================================================
JAVASCRIPT POPUP
========================================================= --}}
@if(session('success'))

<script>

document.addEventListener('DOMContentLoaded', function () {

    const popup = document.getElementById('successPopup');

    if (popup) {

        setTimeout(function () {

            popup.style.opacity = '0';

            popup.style.transform =
                'translate(-50%, -55%)';

            popup.style.transition =
                'opacity .3s ease, transform .3s ease';

            setTimeout(function () {

                popup.remove();

            }, 300);

        }, 2500);

    }

});

</script>

@endif

@endsection
