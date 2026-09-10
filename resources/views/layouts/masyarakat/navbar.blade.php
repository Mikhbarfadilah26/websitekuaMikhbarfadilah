<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">

    <div class="container-fluid px-4">

        {{-- BRAND --}}
        <a href="{{ route('masyarakat.dashboard') }}"
            class="navbar-brand fw-bold">

            <i class="bi bi-grid-1x2-fill me-2"></i>

            Panel Masyarakat

        </a>

        {{-- MOBILE --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMasyarakat">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
            id="navbarMasyarakat">

            <ul class="navbar-nav ms-auto align-items-center">

                {{-- USER --}}
                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown">

                        <i class="bi bi-person-circle fs-5 me-1"></i>

                        {{ auth()->user()->nama ?? 'Masyarakat' }}

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                        <li>
                            <a href="#"
                                class="dropdown-item">

                                <i class="bi bi-person me-2"></i>

                                Profil

                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form action="{{ route('logout') }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
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

    </div>

</nav>