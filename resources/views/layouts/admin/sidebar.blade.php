<aside class="app-sidebar kua-sidebar shadow"
    data-bs-theme="dark">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}"
           class="brand-link">

            <span class="brand-image">
                <img src="{{ asset('foto/landing/7.png') }}"
                     alt="Logo KUA"
                     style="width: 35px; height: 35px; object-fit: contain;">
            </span>

            <span class="brand-text fw-semibold">
                ADMIN KUA
            </span>

        </a>
    </div>

    {{-- SIDEBAR MENU --}}
    <div class="sidebar-wrapper">

        <nav class="mt-2">

            <ul class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu">

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>

                    </a>
                </li>

                {{-- KELOLA DATA --}}
                <li class="nav-header">
                    KELOLA DATA
                </li>

                {{-- BERITA --}}
                <li class="nav-item">
                    <a href="{{ route('admin.berita.index') }}"
                       class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-newspaper"></i>
                        <p>Kelola Berita</p>

                    </a>
                </li>

                {{-- KELOLA KOMENTAR BERITA (BARU) --}}
                <li class="nav-item">
                    <a href="{{ route('admin.komentar.index') }}"
                       class="nav-link {{ request()->routeIs('admin.komentar.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-chat-left-text-fill"></i>
                        <p>Komentar Berita</p>

                        @php
                            try {
                                $jumlahKomentarBelumDibalas = \App\Models\KomentarBerita::whereNull('tanggapan')->count();
                            } catch (\Throwable $e) {
                                $jumlahKomentarBelumDibalas = 0;
                            }
                        @endphp

                        @if($jumlahKomentarBelumDibalas > 0)
                            <span class="badge bg-danger rounded-pill ms-auto">
                                {{ $jumlahKomentarBelumDibalas }}
                            </span>
                        @endif

                    </a>
                </li>

                {{-- KELOLA ADMIN --}}
                <li class="nav-item">
                    <a href="{{ route('admin.admin.index') }}"
                       class="nav-link {{ request()->routeIs('admin.admin.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-person-badge-fill"></i>
                        <p>Kelola Admin</p>

                    </a>
                </li>

                {{-- MASYARAKAT --}}
                <li class="nav-item">
                    <a href="{{ route('admin.masyarakat.index') }}"
                       class="nav-link {{ request()->is('admin/masyarakat*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Kelola Masyarakat</p>

                    </a>
                </li>

                {{-- PENGAJUAN MASYARAKAT --}}
                <li class="nav-item">
                    <a href="{{ route('admin.pengajuan.index') }}"
                       class="nav-link {{ request()->routeIs('admin.pengajuan.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-file-earmark-text-fill"></i>
                        <p>Kelola Pengajuan</p>

                    </a>
                </li>

                {{-- LAYANAN --}}
                <li class="nav-item">
                    <a href="{{ route('admin.layanan.index') }}"
                       class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-grid-fill"></i>
                        <p>Kelola Layanan</p>

                    </a>
                </li>

                {{-- PERSYARATAN --}}
                <li class="nav-item">
                    <a href="{{ route('admin.persyaratan.index') }}"
                       class="nav-link {{ request()->routeIs('admin.persyaratan.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-card-checklist"></i>
                        <p>Kelola Persyaratan</p>

                    </a>
                </li>

                {{-- PELAYANAN --}}
                <li class="nav-header">
                    PELAYANAN
                </li>

                {{-- SARAN DAN PERTANYAAN --}}
                <li class="nav-item">
                    <a href="{{ route('admin.saran.index') }}"
                       class="nav-link {{ request()->routeIs('admin.saran.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-chat-dots-fill"></i>

                        <p>Pertanyaan</p>

                        @php
                            try {
                                $jumlahSaran = \App\Models\Saran::where(
                                    'status',
                                    'baru'
                                )->count();
                            } catch (\Throwable $e) {
                                $jumlahSaran = 0;
                            }
                        @endphp

                        @if($jumlahSaran > 0)
                            <span class="badge bg-danger rounded-pill ms-auto">
                                {{ $jumlahSaran }}
                            </span>
                        @endif

                    </a>
                </li>

                {{-- LAPORAN --}}
                <li class="nav-item">
                    <a href="{{ route('admin.laporan.index') }}"
                       class="nav-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-bar-chart-fill"></i>
                        <p>Laporan</p>

                    </a>
                </li>

                {{-- SISTEM --}}
                <li class="nav-header">
                    SISTEM
                </li>

                {{-- AKUN --}}
                <li class="nav-item">
                    <a href="{{ route('admin.akun.index') }}"
                       class="nav-link {{ request()->routeIs('admin.akun.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-person-circle"></i>
                        <p>Akun Saya</p>

                    </a>
                </li>

                {{-- LOGOUT --}}
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                       class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Logout</p>

                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>

{{-- FORM LOGOUT --}}
<form id="logout-form"
    action="{{ route('logout') }}"
    method="POST"
    class="d-none">

    @csrf

</form>