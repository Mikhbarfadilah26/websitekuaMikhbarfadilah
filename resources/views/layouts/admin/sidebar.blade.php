<aside class="app-sidebar bg-dark shadow"
    data-bs-theme="dark">

    {{-- =================================================
         BRAND
    ================================================== --}}
    <div class="sidebar-brand">

        <a href="{{ route('admin.dashboard') }}"
            class="brand-link">

            <span class="brand-image opacity-75">

                <i class="bi bi-building-fill fs-4"></i>

            </span>

            <span class="brand-text fw-semibold">

                ADMIN KUA

            </span>

        </a>

    </div>


    {{-- =================================================
         SIDEBAR MENU
    ================================================== --}}
    <div class="sidebar-wrapper">

        <nav class="mt-2">

            <ul class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu">


                {{-- =================================================
                     DASHBOARD
                ================================================== --}}

                <li class="nav-item">

                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link
                       {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-speedometer2"></i>

                        <p>
                            Dashboard
                        </p>

                    </a>

                </li>


                {{-- =================================================
                     KELOLA DATA
                ================================================== --}}

                <li class="nav-header">

                    KELOLA DATA

                </li>

                {{-- =================================================
     KELOLA BERITA
================================================== --}}

                <li class="nav-item">

                    <a href="{{ route('admin.berita.index') }}"
                        class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-newspaper"></i>

                        <p>
                            Kelola Berita
                        </p>

                    </a>

                </li>

                {{-- =================================================
KELOLA LAYANAN
================================================== --}}

                <li class="nav-item">

                    <a
                        href="{{ route('admin.layanan.index') }}"
                        class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-grid-fill"></i>

                        <p>
                            Kelola Layanan
                        </p>

                    </a>
                </li>

                {{-- =================================================
                     PELAYANAN
                ================================================== --}}

                <li class="nav-header">

                    PELAYANAN

                </li>


                {{-- =================================================
                     SARAN & PENGADUAN
                ================================================== --}}

                <li class="nav-item">

                    <a href="{{ route('admin.saran.index') }}"
                        class="nav-link
                       {{ request()->routeIs('admin.saran.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-chat-dots-fill"></i>

                        <p>
                            Saran & Pengaduan
                        </p>


                        {{-- BADGE SARAN --}}

                        @php

                        try {

                        $jumlahSaran =
                        \App\Models\Saran::where(
                        'status',
                        'belum_dibaca'
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


                <li class="nav-item">


                    <a href="{{ route('admin.laporan.index') }}"
                        class="nav-link {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-bar-chart-fill"></i>

                        <p>
                            Laporan
                        </p>

                    </a>


                </li>



                {{-- =================================================
                     SISTEM
                ================================================== --}}

                <li class="nav-header">

                    SISTEM

                </li>

                <li class="nav-item">

                    ```
                    <a href="{{ route('admin.akun.index') }}"
                        class="nav-link {{ request()->routeIs('admin.akun.*') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-person-circle"></i>

                        <p>
                            Akun Saya
                        </p>

                    </a>
                    ```

                </li>

                {{-- =================================================
                     LOGOUT
                ================================================== --}}

                <li class="nav-item">

                    <a href="{{ route('logout') }}"
                        class="nav-link"
                        onclick="
                           event.preventDefault();
                           document.getElementById('logout-form').submit();
                       ">

                        <i class="nav-icon bi bi-box-arrow-right"></i>

                        <p>
                            Logout
                        </p>

                    </a>

                </li>


            </ul>

        </nav>

    </div>

</aside>


{{-- =================================================
     FORM LOGOUT
================================================== --}}

<form id="logout-form"
    action="{{ route('logout') }}"
    method="POST"
    class="d-none">

    @csrf

</form>