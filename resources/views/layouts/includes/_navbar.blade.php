<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container py-2">
        <div class="d-flex align-items-center">
            <a href="/">
                <img src="{{ asset('logo/smkn2bdg.png') }}" class="rounded-circle mt-1 mr-3" alt="SMKN 2 Bandung"
                width="36">
            </a>
            <a class="navbar-brand" href="/">
                PILKASIS SMKN 2 BANDUNG
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto pl-1">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user mr-1"></i> {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (auth()->user()->role == 'siswa')
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        @endif
                        @if (auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a class="dropdown-item" href="/dashboard">Admin</a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item text-danger" href="#" id="logoutButton"
                            user-nama="{{ auth()->user()->name }}">Logout</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is("/") ? "active" : "" }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item {{ request()->is("kontak") ? "active" : "" }}">
                    <a class="nav-link" href="/kontak">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
