<nav class="app-header navbar navbar-expand bg-body">

    {{-- LEFT --}}
    <div class="container-fluid">

        <ul class="navbar-nav">

            {{-- TOGGLE SIDEBAR --}}
            <li class="nav-item">
                <a class="nav-link"
                    data-lte-toggle="sidebar"
                    href="#"
                    role="button">

                    <i class="bi bi-list fs-5"></i>

                </a>
            </li>

            {{-- HOME --}}
            <li class="nav-item d-none d-md-block">
                <a href="{{ url('/admin') }}"
                    class="nav-link">

                    <i class="bi bi-house me-1"></i>
                    Dashboard

                </a>
            </li>

        </ul>

        {{-- RIGHT --}}
        <ul class="navbar-nav ms-auto">

            {{-- NOTIFICATION --}}
            <li class="nav-item dropdown">

                <a class="nav-link"
                    href="#"
                    data-bs-toggle="dropdown">

                    <i class="bi bi-bell fs-5"></i>

                </a>

                <div class="dropdown-menu dropdown-menu-end shadow-sm"
                    style="width: 280px;">

                    <span class="dropdown-header">
                        Notifikasi
                    </span>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item">
                        <i class="bi bi-info-circle me-2 text-primary"></i>
                        Tidak ada notifikasi baru
                    </a>

                </div>

            </li>

            {{-- USER --}}
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle"
                    href="#"
                    data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle fs-5 me-1"></i>

                    <span class="d-none d-md-inline">
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </span>

                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.akun.index') }}">
                            <i class="bi bi-person me-2"></i>
                            Akun Saya
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form action="{{ url('/logout') }}"
                            method="POST">

                            @csrf

                            <button type="submit"
                                class="dropdown-item text-danger">

                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout

                            </button>

                        </form>
                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>