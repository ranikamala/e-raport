<nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="{{ asset('img/user.png') }}"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                @if(auth()->check())
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                @else
                    <span class="d-none d-md-inline">Tamu</span>
                @endif

              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="{{ asset('img/user.png') }}"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    @if (auth()->check())
                      {{ auth()->user()->name }}
                    @else
                      Guest
                    @endif
                    
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                  <a href="/logout" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>