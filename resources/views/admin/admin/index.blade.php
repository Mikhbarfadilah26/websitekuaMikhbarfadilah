
@extends('layouts.appadmin')

@section('title', 'Kelola Admin')

@section('content')
<div class="container-fluid py-3 admin-crud">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h3 class="page-title">Kelola Admin</h3>
            <p class="text-muted mb-0">Pengelolaan akun administrator website KUA.</p>
        </div>

        <a href="{{ route('admin.admin.create') }}" class="btn btn-green">
            <i class="bi bi-person-plus-fill me-1"></i> Tambah Admin
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
                <div>
                    <small>Total Admin</small>
                    <h3>{{ $totalAdmin }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-shield-check"></i></div>
                <div>
                    <small>Status Akun</small>
                    <h3>Aktif</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-lock-fill"></i></div>
                <div>
                    <small>Hak Akses</small>
                    <h3>Administrator</h3>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-card">
        <div class="mb-3">
            <h5 class="fw-bold mb-1">Daftar Akun Admin</h5>
            <small class="text-muted">Semua akun pada halaman ini memiliki status aktif.</small>
        </div>

        <form method="GET" action="{{ route('admin.admin.index') }}" class="row g-2 mb-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control"
                       value="{{ request('search') }}"
                       placeholder="Cari nama atau email admin...">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button class="btn btn-green flex-fill" type="submit">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
                <a href="{{ route('admin.admin.index') }}" class="btn btn-light border">
                    Reset
                </a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Admin</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admin as $item)
                        <tr>
                            <td>{{ $admin->firstItem() + $loop->index }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="admin-avatar">
                                        {{ strtoupper(substr($item->nama, 0, 1)) }}
                                    </div>
                                    <strong>{{ $item->nama }}</strong>
                                    @if(auth()->id() == $item->id)
                                        <span class="badge text-bg-secondary">Anda</span>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_hp ?: '-' }}</td>
                            <td><span class="active-badge">Aktif</span></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.admin.edit', $item->id) }}"
                                       class="btn btn-sm btn-outline-success"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    @if(auth()->id() != $item->id && $totalAdmin > 1)
                                        <form action="{{ route('admin.admin.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus akun admin ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm btn-outline-secondary"
                                                type="button"
                                                disabled
                                                title="Akun ini tidak dapat dihapus">
                                            <i class="bi bi-lock"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Belum ada data admin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $admin->links() }}
    </div>
</div>

<style>
.admin-crud {
    --dark: #285b46;
    --green: #39765b;
    --soft: #eaf2ec;
    --border: #dce8de;
    color: #34483c;
}
.page-title {
    color: var(--dark);
    font-weight: 700;
    font-size: 23px;
}
.btn-green {
    background: var(--green);
    color: #fff;
    border: 0;
    border-radius: 8px;
    padding: 10px 16px;
}
.btn-green:hover {
    background: var(--dark);
    color: #fff;
}
.stat-card {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 18px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 12px;
}
.stat-icon {
    width: 45px;
    height: 45px;
    display: grid;
    place-items: center;
    border-radius: 10px;
    background: var(--soft);
    color: var(--green);
    font-size: 21px;
}
.stat-card small {
    color: #7b8c80;
}
.stat-card h3 {
    color: var(--dark);
    font-size: 20px;
    font-weight: 700;
    margin: 3px 0 0;
}
.table-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 13px;
    padding: 20px;
}
.table thead th {
    background: #f3f7f3;
    color: var(--dark);
    font-size: 13px;
    white-space: nowrap;
}
.table tbody td {
    font-size: 13px;
}
.admin-avatar {
    width: 35px;
    height: 35px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: var(--soft);
    color: var(--dark);
    font-weight: 700;
}
.active-badge {
    background: #e5f2e8;
    color: #34734b;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}
.pagination .page-link {
    color: var(--green);
}
.pagination .active .page-link {
    background: var(--green);
    border-color: var(--green);
}
</style>
@endsection
