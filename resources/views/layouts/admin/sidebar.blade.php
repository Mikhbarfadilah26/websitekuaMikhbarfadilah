<aside class="app-sidebar bg-dark shadow"
       data-bs-theme="dark">

    {{-- =================================================
         BRAND
    ================================================== --}}
    <div class="sidebar-brand">

        <a href="{{ url('/admin') }}"
           class="brand-link">

            <span class="brand-image opacity-75">
                <i class="bi bi-grid-1x2-fill fs-4"></i>
            </span>

            <span class="brand-text fw-semibold">
                ADMIN PANEL
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

                {{-- DASHBOARD --}}
                <li class="nav-item">

                    <a href="{{ url('/admin') }}"
                       class="nav-link {{ request()->is('admin') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-speedometer2"></i>

                        <p>
                            Dashboard
                        </p>

                    </a>

                </li>

                {{-- =================================================
                     MASTER DATA
                ================================================== --}}
                <li class="nav-header">
                    MASTER DATA
                </li>

                {{-- USER --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-people"></i>

                        <p>
                            Data User
                        </p>

                    </a>

                </li>

                {{-- KATEGORI --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-tags"></i>

                        <p>
                            Kategori
                        </p>

                    </a>

                </li>

                {{-- ALAT --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-tools"></i>

                        <p>
                            Data Alat
                        </p>

                    </a>

                </li>

                {{-- =================================================
                     TRANSAKSI
                ================================================== --}}
                <li class="nav-header">
                    TRANSAKSI
                </li>

                {{-- PEMINJAMAN --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-journal-text"></i>

                        <p>
                            Peminjaman
                        </p>

                    </a>

                </li>

                {{-- PENGEMBALIAN --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-arrow-return-left"></i>

                        <p>
                            Pengembalian
                        </p>

                    </a>

                </li>

                {{-- DENDA --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-cash-coin"></i>

                        <p>
                            Denda
                        </p>

                    </a>

                </li>

                {{-- =================================================
                     KONTEN
                ================================================== --}}
                <li class="nav-header">
                    KONTEN
                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-newspaper"></i>

                        <p>
                            Artikel
                        </p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-chat-dots"></i>

                        <p>
                            Komentar
                        </p>

                    </a>

                </li>

                {{-- =================================================
                     LAPORAN
                ================================================== --}}
                <li class="nav-header">
                    LAPORAN
                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-bar-chart"></i>

                        <p>
                            Laporan
                        </p>

                    </a>

                </li>

                {{-- =================================================
                     PENGATURAN
                ================================================== --}}
                <li class="nav-header">
                    SISTEM
                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon bi bi-gear"></i>

                        <p>
                            Pengaturan
                        </p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>