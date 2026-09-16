@extends('layouts.appadmin')

@section('title', 'Kelola Berita')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
     HEADER
====================================================== --}}

    <div class="mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>

                <h3 class="fw-bold mb-1">

                    <i class="bi bi-newspaper me-2"></i>

                    Kelola Berita

                </h3>

                <p class="text-muted mb-0">

                    Kelola informasi dan berita KUA Karang Baru

                </p>

            </div>


            <a
                href="{{ route('admin.berita.create') }}"
                class="btn btn-primary shadow-sm">

                <i class="bi bi-plus-circle me-1"></i>

                Tambah Berita

            </a>

        </div>

    </div>


    {{-- =====================================================
     POPUP SUKSES
====================================================== --}}

    @if(session('success'))

    <div id="successPopup" class="success-popup">

        <div class="success-icon">

            <i class="bi bi-check-lg"></i>

        </div>

        <div class="success-content">

            <div class="success-title">
                Berhasil!
            </div>

            <div class="success-message">

                {{ session('success') }}

            </div>

        </div>

    </div>

    @endif


    {{-- =====================================================
     CARD
====================================================== --}}

    <div class="card border-0 shadow-sm">

        {{-- CARD HEADER --}}

        <div class="card-header bg-white border-0 pt-4 px-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h5 class="fw-bold mb-1">

                        <i class="bi bi-list-ul me-2"></i>

                        Daftar Berita

                    </h5>

                    <small class="text-muted">

                        Total {{ $berita->total() }} berita

                    </small>

                </div>


                {{-- =================================================
                 SEARCH
            ================================================== --}}

                <form
                    action="{{ route('admin.berita.index') }}"
                    method="GET"
                    style="max-width: 350px; width: 100%;">

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="bi bi-search"></i>

                        </span>


                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari berita..."
                            value="{{ request('search') }}">


                        @if(request('search'))

                        <a
                            href="{{ route('admin.berita.index') }}"
                            class="btn btn-outline-secondary">

                            <i class="bi bi-x-lg"></i>

                        </a>

                        @endif


                        <button
                            type="submit"
                            class="btn btn-primary">

                            Cari

                        </button>

                    </div>

                </form>

            </div>

        </div>


        {{-- =====================================================
         CARD BODY
    ====================================================== --}}

        <div class="card-body px-4">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th width="110">
                                Foto
                            </th>

                            <th>
                                Judul Berita
                            </th>

                            <th>
                                Slug
                            </th>

                            <th width="150">
                                Tanggal
                            </th>

                            <th width="150" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($berita as $item)

                        <tr>

                            {{-- =================================================
                                 NO
                            ================================================== --}}

                            <td>

                                {{ $loop->iteration + (($berita->currentPage() - 1) * $berita->perPage()) }}

                            </td>


                            {{-- =================================================
                                 FOTO
                            ================================================== --}}

                            <td>

                                @if($item->foto)

                                <img
                                    src="{{ asset('berita/' . $item->foto) }}"
                                    alt="{{ $item->judul }}"
                                    class="berita-image">

                                @else

                                <div class="no-image">

                                    <i class="bi bi-image"></i>

                                </div>

                                @endif

                            </td>


                            {{-- =================================================
                                 JUDUL
                            ================================================== --}}

                            <td>

                                <div class="fw-semibold">

                                    {{ $item->judul }}

                                </div>

                                <small class="text-muted">

                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 80) }}

                                </small>

                            </td>


                            {{-- =================================================
                                 SLUG
                            ================================================== --}}

                            <td>

                                <span class="badge bg-light text-dark border">

                                    {{ $item->slug }}

                                </span>

                            </td>


                            {{-- =================================================
                                 TANGGAL
                            ================================================== --}}

                            <td>

                                @if($item->created_at)

                                <div>

                                    {{ $item->created_at->format('d M Y') }}

                                </div>

                                <small class="text-muted">

                                    {{ $item->created_at->format('H:i') }}

                                </small>

                                @else

                                -

                                @endif

                            </td>


                            {{-- =================================================
                                 AKSI
                            ================================================== --}}

                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('admin.berita.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route('admin.berita.destroy', $item->id) }}"
                                        method="POST"
                                        class="form-hapus">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5">

                                <i
                                    class="bi bi-newspaper"
                                    style="
                                        font-size:55px;
                                        color:#cbd5e1;
                                    ">
                                </i>

                                <h6 class="fw-bold mt-3">

                                    Belum ada berita

                                </h6>

                                <p class="text-muted">

                                    Silakan tambahkan berita pertama.

                                </p>

                                <a
                                    href="{{ route('admin.berita.create') }}"
                                    class="btn btn-primary">

                                    <i class="bi bi-plus-circle me-1"></i>

                                    Tambah Berita

                                </a>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =====================================================
             PAGINATION
        ====================================================== --}}

            @if($berita->hasPages())

            <div class="d-flex justify-content-end mt-3">

                {{ $berita->links() }}

            </div>

            @endif

        </div>

    </div>


</div>

{{-- ============================================================
POPUP KONFIRMASI HAPUS
============================================================ --}}

<div
    id="deleteModal"
    class="delete-modal">

    <div class="delete-modal-box">

        {{-- ICON --}}

        <div class="delete-icon">

            <i class="bi bi-trash3"></i>

        </div>


        {{-- JUDUL --}}

        <h5 class="delete-title">

            Hapus Berita?

        </h5>


        {{-- PESAN --}}

        <p class="delete-message">

            Berita yang dihapus tidak dapat dikembalikan.

        </p>


        {{-- BUTTON --}}

        <div class="delete-actions">

            <button
                type="button"
                id="cancelDelete"
                class="btn btn-light delete-cancel">

                Batal

            </button>


            <button
                type="button"
                id="confirmDelete"
                class="btn btn-danger delete-confirm">

                <i class="bi bi-trash3 me-1"></i>

                Hapus

            </button>

        </div>

    </div>

</div>

{{-- ============================================================
STYLE
============================================================ --}}

<style>
    /* ============================================================
   FOTO BERITA
============================================================ */

    .berita-image {

        width: 85px;
        height: 60px;

        object-fit: cover;

        border-radius: 8px;

        border: 1px solid #e5e7eb;

    }


    .no-image {

        width: 85px;
        height: 60px;

        border-radius: 8px;

        background: #f1f5f9;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #94a3b8;

        font-size: 25px;

    }


    /* ============================================================
   POPUP SUKSES
============================================================ */

    .success-popup {

        position: fixed;

        top: 50%;
        left: 50%;

        transform: translate(-50%, -50%);

        z-index: 9999;

        min-width: 350px;

        max-width: 90%;

        background: #ffffff;

        border-radius: 15px;

        padding: 20px 25px;

        display: flex;

        align-items: center;

        gap: 15px;

        box-shadow: 0 15px 50px rgba(0, 0, 0, .20);

    }


    .success-icon {

        width: 45px;
        height: 45px;

        flex-shrink: 0;

        border-radius: 50%;

        background: #198754;

        color: #ffffff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 24px;

    }


    .success-title {

        font-weight: 700;

        font-size: 16px;

    }


    .success-message {

        color: #6c757d;

        font-size: 14px;

        margin-top: 2px;

    }


    /* ============================================================
   DELETE MODAL
   TANPA ANIMASI / TANPA GERAK
============================================================ */

    .delete-modal {

        position: fixed;

        inset: 0;

        z-index: 10000;

        display: none;

        align-items: center;

        justify-content: center;

        background: rgba(15, 23, 42, .45);

    }


    .delete-modal.show {

        display: flex;

    }


    .delete-modal-box {

        width: 390px;

        max-width: calc(100% - 30px);

        background: #ffffff;

        border-radius: 18px;

        padding: 30px;

        text-align: center;

        box-shadow: 0 20px 60px rgba(0, 0, 0, .22);

    }


    .delete-icon {

        width: 65px;
        height: 65px;

        margin: 0 auto 18px;

        border-radius: 50%;

        background: #fee2e2;

        color: #dc2626;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 28px;

    }


    .delete-title {

        font-weight: 700;

        color: #1e293b;

        margin-bottom: 8px;

    }


    .delete-message {

        color: #64748b;

        font-size: 14px;

        margin-bottom: 25px;

    }


    .delete-actions {

        display: flex;

        justify-content: center;

        gap: 10px;

    }


    .delete-cancel,
    .delete-confirm {

        min-width: 110px;

        height: 42px;

        border-radius: 9px;

        font-weight: 600;

    }


    /* ============================================================
   RESPONSIVE
============================================================ */

    @media (max-width: 576px) {

        .success-popup {

            min-width: auto;

            width: calc(100% - 30px);

            padding: 18px;

        }


        .delete-modal-box {

            padding: 25px 20px;

        }


        .delete-actions {

            flex-direction: column;

        }


        .delete-cancel,
        .delete-confirm {

            width: 100%;

        }

    }
</style>

{{-- ============================================================
JAVASCRIPT
============================================================ --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {


        /*
        |--------------------------------------------------------------------------
        | POPUP SUKSES
        |--------------------------------------------------------------------------
        */

        const successPopup = document.getElementById('successPopup');

        if (successPopup) {

            setTimeout(function() {

                successPopup.remove();

            }, 2500);

        }


        /*
        |--------------------------------------------------------------------------
        | MODAL HAPUS
        |--------------------------------------------------------------------------
        */

        const deleteModal = document.getElementById('deleteModal');

        const cancelDelete = document.getElementById('cancelDelete');

        const confirmDelete = document.getElementById('confirmDelete');

        let deleteForm = null;


        /*
        |--------------------------------------------------------------------------
        | BUKA MODAL
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll('.form-hapus').forEach(function(form) {

            form.addEventListener('submit', function(event) {

                event.preventDefault();

                deleteForm = form;

                deleteModal.classList.add('show');

            });

        });


        /*
        |--------------------------------------------------------------------------
        | BATAL HAPUS
        |--------------------------------------------------------------------------
        */

        cancelDelete.addEventListener('click', function() {

            deleteForm = null;

            deleteModal.classList.remove('show');

        });


        /*
        |--------------------------------------------------------------------------
        | KONFIRMASI HAPUS
        |--------------------------------------------------------------------------
        */

        confirmDelete.addEventListener('click', function() {

            if (deleteForm) {

                deleteForm.submit();

            }

        });


        /*
        |--------------------------------------------------------------------------
        | KLIK AREA GELAP
        |--------------------------------------------------------------------------
        */

        deleteModal.addEventListener('click', function(event) {

            if (event.target === deleteModal) {

                deleteForm = null;

                deleteModal.classList.remove('show');

            }

        });


        /*
        |--------------------------------------------------------------------------
        | TOMBOL ESC
        |--------------------------------------------------------------------------
        */

        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {

                deleteForm = null;

                deleteModal.classList.remove('show');

            }

        });

    });
</script>

@endsection