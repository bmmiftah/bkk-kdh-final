<nav class="navbar-1-1 navbar navbar-expand-lg sticky-top navbar-dark p-2 px-md-2 mb-0 shadow-sm"
style="font-family: Poppins, sans-serif">
<div class="container">
  <a class="navbar-brand" href="/"><img src="img/logo-header.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
    aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link px-md-4 {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-md-4 {{ Request::is('tentang') ? 'active' : '' }}" href="/tentang">Tentang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-md-4 {{ Request::is('lowongan') ? 'active' : '' }}"  href="/lowongan">Lowongan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-md-4 {{ Request::is('informasi') ? 'active' : '' }} " href="/informasi">Informasi</a>
      </li>
    </ul>
   
    <ul class="navbar-nav ms-auto">
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/profil" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle m-2"></i> {{ auth()->user()->username }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="/profil"> <i class="bi bi-person-badge"></i> Profil</a></li>
          <li><hr class="dropdown-divider"></li>
        @can('admin')
        <li><a class="dropdown-item" href="/dd"> <i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><hr class="dropdown-divider"></li>
        @endcan

          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
          </li>
        </ul>
      </li>
      @else
      <li class="nav-item">
        <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
      </li>
      {{-- <div class="d-flex">
        <a class="btn btn-login btn-login py-2 px-4 {{ ($active === "about") ? 'login' : '' }}" href="/login"><i class="bi bi-box-arrow-right"></i> Login</a>
      </div> --}}
    </ul>

  @endauth


    
  </div>
</div>
</nav>
