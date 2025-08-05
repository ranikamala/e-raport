<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!-- Sidebar Brand -->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="" class="brand-link">
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

        @php
          $role = auth()->user()->role ?? null;
        @endphp

        @if($role === 'guru')
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

          <!-- Input Nilai -->
          <li class="nav-item">
            <x-sidelink href="{{ route('penilaian') }}" :active="request()->is('penilaian')">
              <i class="nav-icon bi bi-pencil-square"></i>
              <p>Input Nilai</p>
            </x-sidelink>
          </li>
        @elseif($role === 'siswa')
          <!-- Data Diri Santri -->
          <li class="nav-item">
            <x-sidelink href="{{ route('profile') }}" :active="request()->is('profile')">
              <i class="nav-icon bi bi-person-circle"></i>
              <p>Profil Saya</p>
            </x-sidelink>
          </li>
          <!-- Data Santri -->
          <li class="nav-item">
            <x-sidelink href="{{ route('detail_saya') }}" :active="request()->is('detail_saya')">
              <i class="nav-icon bi bi-person-circle"></i>
              <p>Data Saya</p>
            </x-sidelink>
          </li>
          <!-- Data Orang Tua -->
          <li class="nav-item">
            <x-sidelink href="{{ route('detailOrtu') }}" :active="request()->is('detailOrtu')">
              <i class="nav-icon bi bi-person-circle"></i>
              <p>Data Orang Tua</p>
            </x-sidelink>
          </li>
          <!-- Nilai Santri -->
          <li class="nav-item">
            <x-sidelink href="{{ route('nilai_saya') }}" :active="request()->is('nilai_saya')">
              <i class="nav-icon bi bi-journal-text"></i>
              <p>Nilai Saya</p>
            </x-sidelink>
          </li>
        @else
          <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
            <li class="nav-item {{ request()->is('santri') || request()->is('guru') ? 'menu-open' : 'menu' }}">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-person-badge"></i>
                <p>
                  Akun
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <x-sidelink href="{{ route('guru') }}" :active="request()->is('guru')">
                    <i class="nav-icon bi bi-person"></i>
                    <p>Guru</p>
                  </x-sidelink>
                </li>
                <li class="nav-item">
                  <x-sidelink href="{{ route('santri') }}" :active="request()->is('santri')">
                    <i class="nav-icon bi bi-person"></i>
                    <p>Santri</p>
                  </x-sidelink>
                </li>
              </ul>
            </li>
          </ul>
        @endif

        <!-- Logout -->
        <li class="nav-item">
          <a href="/logout" class="nav-link">
            <i class="nav-icon bi bi-box-arrow-right"></i>
            <p>Keluar</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>

