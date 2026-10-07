@extends('layouts.appadmin')

@section('title', 'Kelola Persyaratan')

@section('content')

<div class="container-fluid">


{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            Kelola Persyaratan
        </h3>

        <p class="text-muted mb-0">
            Kelola persyaratan untuk setiap layanan KUA Karang Baru.
        </p>
    </div>

    <a href="{{ route('admin.persyaratan.create') }}"
        class="btn btn-primary">

        <i class="bi bi-plus-circle me-1"></i>
        Tambah Persyaratan

    </a>

</div>


{{-- PESAN SUKSES --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show"
        role="alert">

        <i class="bi bi-check-circle me-1"></i>

        {{ session('success') }}

        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- ERROR --}}
@if($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


{{-- KELOMPOKKAN BERDASARKAN LAYANAN --}}
@php
    $kelompokPersyaratan = $persyaratan->groupBy(function ($item) {
        return $item->layanan->id ?? 0;
    });
@endphp


{{-- CARD --}}
<div class="card shadow-sm border-0">

    <div class="card-header bg-white">

        <div class="d-flex align-items-center">

            <i class="bi bi-card-checklist fs-5 me-2"></i>

            <strong>
                Daftar Persyaratan Berdasarkan Layanan
            </strong>

        </div>

    </div>


    <div class="card-body">

        @forelse($kelompokPersyaratan as $layananId => $items)

            @php
                $layanan = $items->first()->layanan;
                $collapseId = 'layanan-' . $layananId;
            @endphp


            {{-- JUDUL LAYANAN --}}
            <div class="border rounded mb-3 overflow-hidden">

                <div class="d-flex align-items-center justify-content-between bg-light p-3">

                    <div class="d-flex align-items-center">

                        <div class="me-3">

                            <i class="bi bi-folder2-open fs-4 text-primary"></i>

                        </div>

                        <div>

                            <div class="fw-bold fs-5">

                                {{ $layanan->judul ?? 'Layanan Tidak Diketahui' }}

                            </div>

                            <small class="text-muted">

                                {{ $items->count() }}
                                persyaratan

                            </small>

                        </div>

                    </div>


                    {{-- TOMBOL BUKA/TUTUP --}}
                    <button
                        type="button"
                        class="btn btn-outline-primary btn-sm"
                        data-bs-toggle="collapse"
                        data-bs-target="#{{ $collapseId }}"
                        aria-expanded="false"
                        aria-controls="{{ $collapseId }}">

                        <i class="bi bi-chevron-down me-1"></i>

                        Lihat Persyaratan

                    </button>

                </div>


                {{-- ISI DROPDOWN --}}
                <div id="{{ $collapseId }}"
                    class="collapse">

                    <div class="p-3">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                    <tr>

                                        <th width="70"
                                            class="text-center">
                                            No
                                        </th>

                                        <th>
                                            Nama Persyaratan
                                        </th>

                                        <th width="40%">
                                            Keterangan
                                        </th>

                                        <th width="130"
                                            class="text-center">
                                            Aksi
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @foreach($items as $item)

                                        <tr>

                                            <td class="text-center">

                                                {{ $loop->iteration }}

                                            </td>


                                            <td>

                                                <span class="fw-semibold">

                                                    {{ $item->nama_persyaratan }}

                                                </span>

                                            </td>


                                            <td>

                                                @if($item->keterangan)

                                                    {{ $item->keterangan }}

                                                @else

                                                    <span class="text-muted">
                                                        -
                                                    </span>

                                                @endif

                                            </td>


                                            <td class="text-center">

                                                <div class="d-inline-flex gap-1">

                                                    {{-- EDIT --}}
                                                    <a href="{{ route('admin.persyaratan.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning"
                                                        title="Edit">

                                                        <i class="bi bi-pencil-square"></i>

                                                    </a>


                                                    {{-- HAPUS --}}
                                                    <form
                                                        action="{{ route('admin.persyaratan.destroy', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus persyaratan ini?');">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger"
                                                            title="Hapus">

                                                            <i class="bi bi-trash"></i>

                                                        </button>

                                                    </form>

                                                </div>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            {{-- DATA KOSONG --}}
            <div class="text-center py-5">

                <i class="bi bi-card-checklist fs-1 text-muted d-block mb-3"></i>

                <h5 class="fw-semibold">
                    Belum ada persyaratan
                </h5>

                <p class="text-muted mb-3">
                    Silakan tambahkan persyaratan baru.
                </p>

                <a href="{{ route('admin.persyaratan.create') }}"
                    class="btn btn-primary">

                    <i class="bi bi-plus-circle me-1"></i>

                    Tambah Persyaratan

                </a>

            </div>

        @endforelse

    </div>

</div>


</div>

@endsection
