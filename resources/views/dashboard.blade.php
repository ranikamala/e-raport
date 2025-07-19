<x-layout>
  <main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!--begin::App Content-->
    <div class="app-content">
      <div class="container-fluid">
        @if (Auth::check())
          <div class="mb-3">
            <span class="badge bg-secondary">Role: {{ Auth::user()->role }}</span>
          </div>

          <!-- STAT CARDS -->
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="card bg-info text-white shadow">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="card-title">Santri</h5>
                      <h2>{{ $jumlahSantri ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-user-graduate fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card bg-success text-white shadow">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="card-title">Guru</h5>
                      <h2>{{ $jumlahGuru ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @else
          <div class="alert alert-warning">Anda belum login.</div>
        @endif
      </div>
    </div>
  </main>
</x-layout>
