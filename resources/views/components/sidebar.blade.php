<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!-- Sidebar Brand -->
  <div class="sidebar-brand">
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img 
    src="{{ asset('img/logo.png') }}" 
    alt="logo e-raport"
    class="brand-image opacity-200 shadow"
    style="width: 120px; height: 120px; object-fit: contain;" 
/>


      <span class="brand-text fw-light"></span>
    </a>
  </div>

  <!-- Sidebar Menu -->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" role="menu">
        <!-- dashboard -->
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="nav-icon bi bi-speedometer "></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <!-- Akun Santri -->
        <li class="nav-item">
          <a href="{{ route('santri') }}" class="nav-link">
            <i class="nav-icon bi bi-people-fill"></i>
            <p>
              Akun Santri
            </p>
          </a>
        
        </li>
        
        <!-- Data Santri -->
        <li class="nav-item">
          <a href="{{ route('data_santri') }}" class="nav-link">
            <i class="nav-icon bi bi-people-fill"></i>
            <p>
              Data Santri
            </p>
          </a>
        
        </li>

        <!-- Data Orang Tua -->
        <li class="nav-item">
          <a href="{{ route('orangtua') }}" class="nav-link">
            <i class="nav-icon bi bi-people-fill"></i>
            <p>
              Data Orang Tua
            </p>
          </a>
        
        </li>

        <!-- Input Santri -->
        <li class="nav-item">
          <a href="{{ route('inp_santri') }}" class="nav-link">
            <i class="nav-icon bi bi-pencil-square"></i>
            <p>Input Santri</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('penilaian') }}" class="nav-link">
            <i class="nav-icon bi bi-pencil-square"></i>
            <p>Input Nilai</p>
          </a>
        </li>

        <!-- Profil -->
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon bi bi-person-circle"></i>
            <p>Profil</p>
          </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
          <a href=""
             class="nav-link"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon bi bi-box-arrow-right"></i>
            <p>Keluar</p>
          </a>
          <form id="logout-form" action="" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
  </div>
</aside>
