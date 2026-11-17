
@extends('layouts.appmasyarakat')

@section('title', 'Riwayat Permohonan')

@section('content')

<style>
.riwayat-pmh {
    padding: 8px 0 30px;
}

.riwayat-heading {
    margin-bottom: 22px;
}

.riwayat-heading h4 {
    font-size: 22px;
    font-weight: 800;
    margin-bottom: 5px;
}

.riwayat-heading p {
    font-size: 13px;
    color: #8491a5;
    margin: 0;
}

.riwayat-card {
    background: #fff;
    border: 1px solid #e5eaf1;
    border-radius: 13px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(15,23,42,.035);
}

.riwayat-card-header {
    padding: 19px 22px;
    border-bottom: 1px solid #edf0f5;
}

.riwayat-card-header h5 {
    font-size: 15px;
    font-weight: 750;
    margin: 0;
}

.riwayat-table {
    width: 100%;
    min-width: 750px;
    border-collapse: collapse;
}

.riwayat-table th {
    background: #f7f9fc;
    padding: 14px 12px;
    color: #64748b;
    font-size: 11px;
    font-weight: 750;
    text-transform: uppercase;
    white-space: nowrap;
}

.riwayat-table td {
    padding: 15px 12px;
    font-size: 12px;
    color: #475569;
    border-top: 1px solid #edf0f5;
    vertical-align: middle;
}

.riwayat-nomor {
    color: #1677ee;
    font-weight: 750;
}

.riwayat-status {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 750;
    white-space: nowrap;
}

.riwayat-diajukan {
    color: #a66b00;
    background: #fff4d8;
}

.riwayat-diproses {
    color: #1761bf;
    background: #e5efff;
}

.riwayat-selesai {
    color: #16834c;
    background: #dcfce7;
}

.riwayat-ditolak {
    color: #dc3545;
    background: #fee2e2;
}

.riwayat-empty {
    text-align: center;
    padding: 45px 15px;
}

.riwayat-empty i {
    font-size: 43px;
    color: #b6c8df;
}

.riwayat-empty h6 {
    font-weight: 750;
    margin-top: 12px;
}

.riwayat-empty p {
    color: #8491a5;
    font-size: 12px;
}
</style>


<div class="riwayat-pmh">

    <div class="riwayat-heading">

        <h4>
            <i class="bi bi-clock-history text-primary"></i>
            Riwayat Permohonan
        </h4>

        <p>
            Pantau seluruh perkembangan permohonan layanan Anda.
        </p>

    </div>


    <div class="riwayat-card">

        <div class="riwayat-card-header">

            <h5>
                <i class="bi bi-journal-text text-primary me-2"></i>
                Data Riwayat Pengajuan
            </h5>

        </div>


        @if($permohonan->count())

            <div class="table-responsive">

                <table class="riwayat-table">

                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>Nomor Permohonan</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach($permohonan as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration + $permohonan->firstItem() - 1 }}
                                </td>

                                <td>
                                    <span class="riwayat-nomor">
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

                                    <span class="riwayat-status riwayat-{{ $item->status }}">
                                        {{ ucfirst($item->status) }}
                                    </span>

                                </td>

                                <td>
                                    {{ $item->keterangan ?: '-' }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <div class="p-3 border-top">
                {{ $permohonan->links() }}
            </div>

        @else

            <div class="riwayat-empty">

                <i class="bi bi-clock-history"></i>

                <h6>Belum Ada Riwayat</h6>

                <p>
                    Riwayat permohonan Anda akan ditampilkan di sini.
                </p>

                <a href="{{ route('masyarakat.pengajuan.create') }}"
                   class="btn btn-primary btn-sm">

                    <i class="bi bi-plus-lg me-1"></i>
                    Buat Pengajuan

                </a>

            </div>

        @endif

    </div>

</div>

@endsection
