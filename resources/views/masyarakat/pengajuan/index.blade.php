
@extends('layouts.appmasyarakat')

@section('title', 'Pengajuan Layanan')

@section('content')

<style>
.pmh-page {
    padding: 8px 0 30px;
    color: #243247;
}

.pmh-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 22px;
}

.pmh-heading h4 {
    font-size: 22px;
    font-weight: 800;
    margin: 0 0 5px;
}

.pmh-heading p {
    color: #8491a5;
    font-size: 13px;
    margin: 0;
}

.pmh-card {
    background: #fff;
    border: 1px solid #e5eaf1;
    border-radius: 13px;
    box-shadow: 0 4px 15px rgba(15, 23, 42, .035);
    overflow: hidden;
}

.pmh-card-header {
    padding: 19px 22px;
    border-bottom: 1px solid #edf0f5;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.pmh-card-header h5 {
    font-size: 15px;
    font-weight: 750;
    margin: 0;
}

.pmh-card-body {
    padding: 20px;
}

.pmh-btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 10px 16px;
    background: #1677ee;
    color: #fff;
    text-decoration: none;
    border: 0;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
}

.pmh-btn-primary:hover {
    background: #095fce;
    color: #fff;
}

.pmh-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 750px;
}

.pmh-table th {
    background: #f7f9fc;
    color: #64748b;
    font-size: 11px;
    font-weight: 750;
    text-transform: uppercase;
    letter-spacing: .4px;
    padding: 14px 12px;
    border-bottom: 1px solid #e8edf3;
    white-space: nowrap;
}

.pmh-table td {
    padding: 15px 12px;
    border-bottom: 1px solid #edf0f5;
    font-size: 12px;
    color: #475569;
    vertical-align: middle;
}

.pmh-table tr:last-child td {
    border-bottom: 0;
}

.pmh-number {
    font-weight: 750;
    color: #1677ee;
}

.pmh-status {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 750;
    white-space: nowrap;
}

.status-diajukan {
    background: #fff4d8;
    color: #a66b00;
}

.status-diproses {
    background: #e5efff;
    color: #1761bf;
}

.pmh-action {
    display: flex;
    gap: 6px;
}

.pmh-action a,
.pmh-action button {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 7px;
    text-decoration: none;
    cursor: pointer;
}

.pmh-edit {
    background: #e8f1ff;
    color: #1677ee;
}

.pmh-delete {
    background: #fff0f0;
    color: #dc3545;
}

.pmh-empty {
    text-align: center;
    padding: 45px 15px;
}

.pmh-empty i {
    font-size: 43px;
    color: #b6c8df;
}

.pmh-empty h6 {
    font-weight: 750;
    margin: 13px 0 6px;
}

.pmh-empty p {
    font-size: 12px;
    color: #8491a5;
}

.pmh-pagination {
    padding: 15px 20px;
    border-top: 1px solid #edf0f5;
}

@media(max-width: 600px) {
    .pmh-heading h4 {
        font-size: 19px;
    }

    .pmh-card-body {
        padding: 12px;
    }
}
</style>

<div class="pmh-page">

    <div class="pmh-heading">

        <div>
            <h4>
                <i class="bi bi-file-earmark-text text-primary"></i>
                Pengajuan Layanan
            </h4>

            <p>Kelola permohonan layanan KUA Karang Baru Anda.</p>
        </div>

        <a href="{{ route('masyarakat.pengajuan.create') }}"
           class="pmh-btn-primary">
            <i class="bi bi-plus-lg"></i>
            Buat Pengajuan
        </a>

    </div>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show small">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="pmh-card">

        <div class="pmh-card-header">

            <h5>
                <i class="bi bi-list-check text-primary me-2"></i>
                Daftar Pengajuan Aktif
            </h5>

            <span class="text-secondary small">
                {{ $permohonan->total() }} pengajuan
            </span>

        </div>


        @if($permohonan->count())

            <div class="table-responsive">

                <table class="pmh-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Permohonan</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($permohonan as $item)

                            <tr>

                                <td>{{ $loop->iteration + $permohonan->firstItem() - 1 }}</td>

                                <td>
                                    <span class="pmh-number">
                                        {{ $item->nomor_permohonan }}
                                    </span>
                                </td>

                                <td>
                                    {{ $item->layanan->judul ?? 'Layanan tidak tersedia' }}
                                </td>

                                <td>
                                    {{ $item->tanggal_pengajuan->format('d/m/Y') }}
                                </td>

                                <td>
                                    <span class="pmh-status status-{{ $item->status }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>

                                <td>

                                    <div class="pmh-action">

                                        @if($item->status === 'diajukan')

                                            <a href="{{ route('masyarakat.pengajuan.edit', $item->id) }}"
                                               class="pmh-edit"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('masyarakat.pengajuan.destroy', $item->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin membatalkan pengajuan ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="pmh-delete"
                                                        title="Batalkan">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        @else

                                            <span class="text-muted small">
                                                Sedang diproses
                                            </span>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="pmh-pagination">
                {{ $permohonan->links() }}
            </div>

        @else

            <div class="pmh-empty">

                <i class="bi bi-folder2-open"></i>

                <h6>Belum Ada Pengajuan</h6>

                <p>Anda belum memiliki pengajuan layanan aktif.</p>

                <a href="{{ route('masyarakat.pengajuan.create') }}"
                   class="pmh-btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Buat Pengajuan Sekarang
                </a>

            </div>

        @endif

    </div>

</div>

@endsection
