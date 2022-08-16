<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">PILKASIS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">PLKS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Home</li>
            <li class="{{ 'dashboard' == request()->path() ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Pages</li>
            <li class="{{ 'siswa' == request()->path() ? 'active' : '' }}">
                <a class="nav-link" href="/siswa">
                    <i class="fas fa-user"></i>
                    <span>Siswa</span>
                </a>
            </li>
            <li class="{{ 'kandidat' == request()->path() ? 'active' : '' }}">
                <a class="nav-link" href="/kandidat">
                    <i class="fas fa-user"></i>
                    <span>Kandidat</span>
                </a>
            </li>
            <li class="menu-header">Admin</li>
            <li class="">
                <a class="nav-link" href="#" data-bs-toggle="modal"
                data-bs-target="#registration">
                    <i class="fas fa-user-plus"></i>
                    <span>Register</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

@include('layouts.includes._modal_admin')