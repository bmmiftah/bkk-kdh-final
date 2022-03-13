<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="/img/logo-header.png" alt="">
        </div>
        <div class="sidebar-brand-text mx-2">Profil Saya</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Profil-->
    <li class="nav-item">
        <a class="nav-link" href="/profil/{{ $user->id }}/edit">
        <i class="fas fa-fw fa-user"></i>
        <span>Data Diri</span></a>
    </li>

    <!-- Vaksin-->
    <li class="nav-item">
        <a class="nav-link" href="/vaksin/{{ $user->id }}/edit">
        <i class="fas fa-fw fa-paperclip"></i>
        <span>Data Vaksinasi</span></a>
    </li>
    <!-- Pendaftaran-->
    <li class="nav-item">
        <a class="nav-link" href="/status/{{ $user->id }}">
        <i class="fas fa-fw fa-clock"></i>
        <span>Status Pendaftaran</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->