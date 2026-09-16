
@extends('layouts.appadmin')

@section('title', 'Kelola Layanan')

@section('content')

<style>

/* =========================================================
   HEADER
========================================================= */

.layanan-header {
    background: linear-gradient(
        135deg,
        #0f172a 0%,
        #1e3a8a 100%
    );

    border-radius: 16px;
    padding: 24px 28px;
    color: #ffffff;
    margin-bottom: 22px;

    box-shadow: 0 8px 24px rgba(15, 23, 42, .15);
}

.layanan-header-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 5px;
}

.layanan-header-subtitle {
    font-size: 14px;
    color: rgba(255,255,255,.80);
}


/* =========================================================
   BUTTON TAMBAH
========================================================= */

.btn-tambah-layanan {

    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 11px 18px;

    background: #ffffff;
    color: #1e3a8a;

    border: none;
    border-radius: 10px;

    font-size: 14px;
    font-weight: 700;

    text-decoration: none;

    box-shadow: 0 4px 12px rgba(0,0,0,.12);

    transition: .2s;
}

.btn-tambah-layanan:hover {

    background: #f8fafc;
    color: #0f172a;

    text-decoration: none;
}


/* =========================================================
   CARD
========================================================= */

.layanan-card {

    background: #ffffff;

    border: 1px solid #e5e7eb;

    border-radius: 16px;

    box-shadow: 0 5px 18px rgba(15, 23, 42, .07);

    overflow: hidden;
}


/* =========================================================
   TOOLBAR
========================================================= */

.layanan-toolbar {

    padding: 18px 20px;

    display: flex;
    justify-content: space-between;
    align-items: center;

    gap: 15px;

    flex-wrap: wrap;

    border-bottom: 1px solid #e5e7eb;
}

.toolbar-title {

    font-size: 17px;
    font-weight: 700;

    color: #1e293b;
}

.toolbar-subtitle {

    margin-top: 3px;

    font-size: 13px;

    color: #64748b;
}


/* =========================================================
   SEARCH
========================================================= */

.search-box {

    position: relative;

    width: 280px;
}

.search-box i {

    position: absolute;

    left: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #64748b;

    font-size: 15px;
}

.search-box input {

    width: 100%;

    padding: 10px 13px 10px 38px;

    border: 1px solid #dbe1e8;

    border-radius: 10px;

    font-size: 14px;

    color: #334155;

    background: #ffffff;

    outline: none;
}

.search-box input:focus {

    border-color: #2563eb;

    box-shadow: 0 0 0 3px rgba(37,99,235,.10);
}


/* =========================================================
   TABLE
========================================================= */

.table-layanan {

    width: 100%;

    margin: 0;
}

.table-layanan thead th {

    padding: 14px 16px;

    background: #f8fafc;

    border-bottom: 1px solid #e2e8f0;

    color: #475569;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .4px;

    white-space: nowrap;
}

.table-layanan tbody td {

    padding: 15px 16px;

    vertical-align: middle;

    border-bottom: 1px solid #f1f5f9;

    color: #334155;

    font-size: 14px;
}

.table-layanan tbody tr:last-child td {

    border-bottom: none;
}

.table-layanan tbody tr:hover {

    background: #f8fafc;
}


/* =========================================================
   NOMOR
========================================================= */

.nomor {

    width: 55px;

    text-align: center;

    color: #64748b;

    font-weight: 600;
}


/* =========================================================
   FOTO
========================================================= */

.layanan-photo {

    width: 78px;
    height: 56px;

    object-fit: cover;

    border-radius: 9px;

    border: 1px solid #e2e8f0;

    background: #f8fafc;
}

.no-photo {

    width: 78px;
    height: 56px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    border: 1px solid #e2e8f0;

    background: #f1f5f9;

    color: #94a3b8;

    font-size: 22px;
}


/* =========================================================
   JUDUL
========================================================= */

.judul-layanan {

    max-width: 310px;

    margin-bottom: 4px;

    color: #1e293b;

    font-size: 14px;

    font-weight: 700;
}

.isi-singkat {

    max-width: 370px;

    color: #64748b;

    font-size: 13px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* =========================================================
   SLUG
========================================================= */

.slug-badge {

    display: inline-block;

    max-width: 190px;

    padding: 6px 9px;

    overflow: hidden;

    text-overflow: ellipsis;

    white-space: nowrap;

    border-radius: 7px;

    background: #eff6ff;

    color: #2563eb;

    font-size: 12px;

    font-weight: 600;
}


/* =========================================================
   TANGGAL
========================================================= */

.tanggal {

    white-space: nowrap;

    color: #64748b;

    font-size: 13px;
}


/* =========================================================
   AKSI
========================================================= */

.action-wrapper {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 8px;
}


/*
|--------------------------------------------------------------------------
| TOMBOL AKSI
|--------------------------------------------------------------------------
*/

.btn-action {

    width: 40px;
    height: 40px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    border: 1px solid transparent;

    text-decoration: none;

    cursor: pointer;

    font-size: 17px;

    line-height: 1;

    transition: .2s;

    flex-shrink: 0;
}


/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

.btn-edit {

    background: #eff6ff;

    border-color: #bfdbfe;

    color: #2563eb;
}

.btn-edit:hover {

    background: #dbeafe;

    border-color: #93c5fd;

    color: #1d4ed8;

    text-decoration: none;
}


/*
|--------------------------------------------------------------------------
| HAPUS
|--------------------------------------------------------------------------
*/

.btn-delete {

    background: #fef2f2;

    border-color: #fecaca;

    color: #dc2626;
}

.btn-delete:hover {

    background: #fee2e2;

    border-color: #fca5a5;

    color: #b91c1c;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {

    padding: 55px 20px;

    text-align: center;

    color: #64748b;
}

.empty-icon {

    width: 65px;
    height: 65px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 15px;

    border-radius: 50%;

    background: #f1f5f9;

    color: #94a3b8;

    font-size: 27px;
}

.empty-state h5 {

    margin-bottom: 6px;

    color: #334155;

    font-weight: 700;
}


/* =========================================================
   PAGINATION
========================================================= */

.pagination-wrapper {

    padding: 18px 20px;

    border-top: 1px solid #e5e7eb;
}


/* =========================================================
   SUCCESS POPUP
========================================================= */

.success-popup {

    position: fixed;

    top: 50%;
    left: 50%;

    transform: translate(-50%, -50%);

    z-index: 9999;

    min-width: 330px;
    max-width: 90%;

    padding: 22px 28px;

    background: #ffffff;

    border: 1px solid #e5e7eb;

    border-radius: 15px;

    box-shadow: 0 15px 45px rgba(0,0,0,.18);

    text-align: center;
}

.success-icon {

    width: 50px;
    height: 50px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 10px;

    border-radius: 50%;

    background: #dcfce7;

    color: #16a34a;

    font-size: 23px;
}

.success-popup strong {

    display: block;

    margin-bottom: 4px;

    color: #166534;

    font-size: 16px;
}

.success-popup span {

    color: #64748b;

    font-size: 13px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .layanan-header {

        padding: 20px;
    }

    .layanan-header-title {

        font-size: 20px;
    }

    .search-box {

        width: 100%;
    }

    .table-responsive {

        overflow-x: auto;
    }

}

</style>


<div class="container-fluid">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="layanan-header">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>

                <div class="layanan-header-title">

                    <i class="bi bi-grid-fill me-2"></i>

                    Kelola Layanan

                </div>

                <div class="layanan-header-subtitle">

                    Kelola informasi layanan yang ditampilkan
                    pada website KUA Karang Baru.

                </div>

            </div>


            {{-- =================================================
                 TAMBAH
            ================================================== --}}

            <a
                href="{{ route('admin.layanan.create') }}"
                class="btn-tambah-layanan">

                <i class="bi bi-plus-lg"></i>

                Tambah Layanan

            </a>

        </div>

    </div>



    {{-- =====================================================
         SUCCESS
    ====================================================== --}}

    @if(session('success'))

        <div
            id="successPopup"
            class="success-popup">

            <div class="success-icon">

                <i class="bi bi-check-lg"></i>

            </div>

            <strong>
                Berhasil
            </strong>

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif



    {{-- =====================================================
         CARD
    ====================================================== --}}

    <div class="layanan-card">


        {{-- =================================================
             TOOLBAR
        ================================================== --}}

        <div class="layanan-toolbar">

            <div>

                <div class="toolbar-title">

                    Daftar Layanan

                </div>

                <div class="toolbar-subtitle">

                    Total data:

                    <strong>
                        {{ $layanan->total() }}
                    </strong>

                    layanan

                </div>

            </div>


            {{-- SEARCH --}}

            <form
                action="{{ route('admin.layanan.index') }}"
                method="GET"
                class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari layanan...">

            </form>

        </div>



        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="table-responsive">

            <table class="table table-layanan">

                <thead>

                    <tr>

                        <th class="text-center">
                            No
                        </th>

                        <th>
                            Foto
                        </th>

                        <th>
                            Layanan
                        </th>

                        <th>
                            Slug
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($layanan as $item)

                        <tr>


                            {{-- NOMOR --}}

                            <td class="nomor">

                                {{ $layanan->firstItem() + $loop->index }}

                            </td>


                            {{-- FOTO --}}

                            <td>

                                @if($item->foto)

                                    <img
                                        src="{{ asset('layanan/' . $item->foto) }}"
                                        alt="{{ $item->judul }}"
                                        class="layanan-photo">

                                @else

                                    <div class="no-photo">

                                        <i class="bi bi-image"></i>

                                    </div>

                                @endif

                            </td>


                            {{-- JUDUL --}}

                            <td>

                                <div class="judul-layanan">

                                    {{ $item->judul }}

                                </div>

                                <div class="isi-singkat">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->isi),
                                        90
                                    ) }}

                                </div>

                            </td>


                            {{-- SLUG --}}

                            <td>

                                @if($item->slug)

                                    <span class="slug-badge">

                                        {{ $item->slug }}

                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}

                            <td class="tanggal">

                                {{ $item->created_at
                                    ? $item->created_at->format('d/m/Y')
                                    : '-' }}

                            </td>


                            {{-- =================================================
                                 AKSI
                            ================================================== --}}

                            <td>

                                <div class="action-wrapper">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route(
                                            'admin.layanan.edit',
                                            $item->id
                                        ) }}"
                                        class="btn-action btn-edit"
                                        title="Edit Layanan"
                                        aria-label="Edit Layanan">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    {{-- HAPUS LANGSUNG --}}

                                    <form
                                        action="{{ route(
                                            'admin.layanan.destroy',
                                            $item->id
                                        ) }}"
                                        method="POST"
                                        style="display: inline;">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-action btn-delete"
                                            title="Hapus Layanan"
                                            aria-label="Hapus Layanan">

                                            <i class="bi bi-trash3-fill"></i>

                                        </button>

                                    </form>


                                </div>

                            </td>

                        </tr>


                    @empty


                        {{-- =================================================
                             EMPTY
                        ================================================== --}}

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">

                                        <i class="bi bi-grid-3x3-gap"></i>

                                    </div>

                                    <h5>
                                        Belum Ada Layanan
                                    </h5>

                                    <p>

                                        @if(request('search'))

                                            Tidak ditemukan layanan dengan kata
                                            pencarian

                                            "<strong>
                                                {{ request('search') }}
                                            </strong>".

                                        @else

                                            Belum ada data layanan yang tersedia.

                                        @endif

                                    </p>


                                    @if(!request('search'))

                                        <a
                                            href="{{ route(
                                                'admin.layanan.create'
                                            ) }}"
                                            class="btn btn-primary btn-sm">

                                            <i class="bi bi-plus-lg me-1"></i>

                                            Tambah Layanan

                                        </a>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>



        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if($layanan->hasPages())

            <div class="pagination-wrapper">

                {{ $layanan->links() }}

            </div>

        @endif


    </div>

</div>



{{-- =========================================================
     SUCCESS SCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const successPopup =
        document.getElementById('successPopup');

    if (successPopup) {

        setTimeout(function () {

            successPopup.remove();

        }, 2500);

    }

});

</script>

@endsection
