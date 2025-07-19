<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!-- Sidebar Brand -->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="./index.html" class="brand-link">
      <!--begin::Brand Image-->
      <img
        src="{{ asset('img/icon.png') }}"
        alt="AdminLTE Logo"
        class="brand-image opacity-75 shadow"
      />
      <!--end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-light">E-Raport</span>
      <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
  </div>

  <!-- Sidebar Menu -->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" role="menu">
        <!-- dashboard -->
        <li class="nav-item">
          <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            <i class="nav-icon bi bi-speedometer "></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <!-- Akun Santri -->
        <li class="nav-item">
          <x-sidelink href="{{ route('santri') }}" :active="request()->is('santri')">
            <i class="nav-icon bi bi-people-fill"></i>
            <p>
              Akun Santri
            </p>
          </x-sidelink>
        
        </li>
        
        <!-- Data Santri -->
        <li class="nav-item">
          <x-sidelink href="{{ route('list_santri') }}" :active="request()->is('list_santri')">
            <i class="nav-icon bi bi-people-fill"></i>
            <p>
              Data Santri
            </p>
          </x-sidelink>
        </li>
        
        <!-- Data Orang Tua -->
        <li class="nav-item">
          <x-sidelink href="{{ route('orangtua') }}" :active="request()->is('orangtua')">
            <i class="nav-icon bi bi-people-fill"></i>
            <p>
              Data Orang Tua
            </p>
          </x-sidelink>
        
        </li>

        <!-- Input Santri -->
        <li class="nav-item">
          <x-sidelink href="{{ route('inp_santri') }}" :active="request()->is('inp_santri')">
            <i class="nav-icon bi bi-pencil-square"></i>
            <p>Tambah Santri</p>
          </x-sidelink>
        </li>

        <li class="nav-item">
          <x-sidelink href="{{ route('penilaian') }}" :active="request()->is('penilaian')">
            <i class="nav-icon bi bi-pencil-square"></i>
            <p>Input Nilai</p>
          </x-sidelink>
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

