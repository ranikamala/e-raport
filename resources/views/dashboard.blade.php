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
        @if (auth()->user()->role == 'guru')
          <div class="mb-3">
            <span class="badge bg-secondary">Role: {{ Auth::user()->role }}</span>
          </div>

          <!-- STAT CARDS -->
          <div class="row">
            <div class="col-md-6 mb-4" style="cursor: pointer;" onclick="window.location.href = '{{ url('santri') }}'">
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

          <!-- Tambahan 3 Card Kelas -->
          <div class="row">
            <!-- Cards Kiri -->
            <div class="col-md-6 d-flex flex-column justify-content-between">
              <div class="row">
                <div class="col-md-12 mb-3" style="cursor: pointer;" onclick="window.location.href = '{{ url('list_santri_ikhlas') }}'">
                  <div class="card shadow h-100 border-0">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                      <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                        <i class="fas fa-users fa-lg text-primary"></i>
                      </div>
                      <h5 class="card-title mb-1 text-primary fw-bold">Kelas Al-Ikhlas</h5>
                      <h2 class="fw-bold mb-1 text-primary">{{ $jumlahSantriIkhlas ?? 0 }}</h2>
                      <span class="text-muted small">Jumlah Anak</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3" style="cursor: pointer;" onclick="window.location.href = '{{ url('list_santri_alim') }}'">
                  <div class="card shadow h-100 border-0">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                      <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                        <i class="fas fa-users fa-lg text-warning"></i>
                      </div>
                      <h5 class="card-title mb-1 text-warning fw-bold">Kelas Al-Alim</h5>
                      <h2 class="fw-bold mb-1 text-warning">{{ $jumlahSantriAlim ?? 0 }}</h2>
                      <span class="text-muted small">Jumlah Anak</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" style="cursor: pointer;" onclick="window.location.href = '{{ url('list_santri_malik') }}'">
                  <div class="card shadow h-100 border-0">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                      <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center mb-3" style="width:60px; height:60px;">
                        <i class="fas fa-users fa-lg text-success"></i>
                      </div>
                      <h5 class="card-title mb-1 text-success fw-bold">Kelas Al-Malik</h5>
                      <h2 class="fw-bold mb-1 text-success">{{ $jumlahSantriMalik ?? 0 }}</h2>
                      <span class="text-muted small">Jumlah Anak</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Grafik Kanan -->
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card w-100 mb-4">
                <div class="card-header bg-light">
                  <strong>Grafik Jumlah Anak per Kelas</strong>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                  <canvas id="kelasChart" height="250"></canvas>
                </div>
              </div>
            </div>
          </div>


          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script>
            document.addEventListener('DOMContentLoaded', function () {
              var ctx = document.getElementById('kelasChart').getContext('2d');
              new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: ['Al-Ikhlas', 'Al-Alim', 'Al-Malik'],
                  datasets: [{
                    label: 'Jumlah Anak',
                    data: [{{ $jumlahSantriIkhlas ?? 0 }}, {{ $jumlahSantriAlim ?? 0 }}, {{ $jumlahSantriMalik ?? 0 }}],
                    backgroundColor: [
                      'rgba(13, 110, 253, 0.7)',
                      'rgba(255, 193, 7, 0.7)',
                      'rgba(25, 135, 84, 0.7)'
                    ],
                    borderColor: [
                      'rgba(13, 110, 253, 1)',
                      'rgba(255, 193, 7, 1)',
                      'rgba(25, 135, 84, 1)'
                    ],
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true,
                      title: {
                        display: true,
                        text: 'Jumlah Anak'
                      },
                      ticks: {
                        stepSize: 1,
                        callback: function(value) {
                          if (Number.isInteger(value)) {
                            return value;
                          }
                        }
                      }
                    },
                    x: {
                      title: {
                        display: true,
                        text: 'Nama Kelas'
                      }
                    }
                  }
                }
              });
            });
          </script>
          
        @else
          <div class="welcome-section text-center py-5">
            <svg width="180" height="180" viewBox="0 0 180 180" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-4 animate__animated animate__fadeInDown">
              <defs>
                <linearGradient id="bgGrad" x1="0" y1="0" x2="180" y2="180" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#43e97b"/>
                  <stop offset="1" stop-color="#38f9d7"/>
                </linearGradient>
                <linearGradient id="bookGrad" x1="0" y1="0" x2="0" y2="60" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fffde4"/>
                  <stop offset="1" stop-color="#f1f8e9"/>
                </linearGradient>
              </defs>
              <!-- Background Circle -->
              <circle cx="90" cy="90" r="85" fill="url(#bgGrad)" opacity="0.18"/>
              <!-- Book -->
              <g>
                <rect x="45" y="80" width="90" height="50" rx="10" fill="url(#bookGrad)" stroke="#2d6a4f" stroke-width="2"/>
                <rect x="55" y="90" width="30" height="30" rx="4" fill="#b7e4c7" stroke="#2d6a4f" stroke-width="1"/>
                <rect x="95" y="90" width="30" height="30" rx="4" fill="#b7e4c7" stroke="#2d6a4f" stroke-width="1"/>
                <line x1="70" y1="100" x2="70" y2="110" stroke="#2d6a4f" stroke-width="2" stroke-linecap="round"/>
                <line x1="110" y1="100" x2="110" y2="110" stroke="#2d6a4f" stroke-width="2" stroke-linecap="round"/>
                <rect x="65" y="120" width="50" height="6" rx="3" fill="#95d5b2"/>
              </g>
              <!-- Smiling Face (Student) -->
              <g>
                <ellipse cx="90" cy="65" rx="28" ry="26" fill="#fff" stroke="#2d6a4f" stroke-width="2"/>
                <ellipse cx="90" cy="65" rx="20" ry="18" fill="#b7e4c7" opacity="0.5"/>
                <circle cx="80" cy="65" r="2.5" fill="#2d6a4f"/>
                <circle cx="100" cy="65" r="2.5" fill="#2d6a4f"/>
                <path d="M85 73 Q90 78 95 73" stroke="#2d6a4f" stroke-width="2" fill="none" stroke-linecap="round"/>
                <!-- Graduation Cap -->
                <polygon points="90,45 110,55 90,65 70,55" fill="#2d6a4f"/>
                <rect x="88" y="65" width="4" height="8" fill="#2d6a4f"/>
                <circle cx="90" cy="73" r="1.2" fill="#ffd166"/>
              </g>
              <!-- Decorative Leaves -->
              <g>
                <path d="M30 120 Q40 110 50 120 Q60 130 50 140 Q40 150 30 140 Q20 130 30 120Z" fill="#b7e4c7" opacity="0.7"/>
                <path d="M150 120 Q160 110 170 120 Q180 130 170 140 Q160 150 150 140 Q140 130 150 120Z" fill="#b7e4c7" opacity="0.7"/>
              </g>
              <!-- Sparkles -->
              <g>
                <circle cx="40" cy="40" r="2" fill="#ffd166"/>
                <circle cx="140" cy="35" r="1.5" fill="#ffd166"/>
                <circle cx="120" cy="150" r="1.5" fill="#ffd166"/>
                <circle cx="60" cy="150" r="1.5" fill="#ffd166"/>
              </g>
            </svg>
            <h2 class="mb-3 fw-bold" style="color: #2d6a4f;">Selamat Datang di E-Raport!</h2>
            <p class="lead mb-4" style="color: #495057;">
              Hai <span class="fw-semibold">{{ auth()->user()->name }}</span>,<br>
              Selamat datang di sistem E-Raport. <br>
              Silakan gunakan menu di samping untuk mengakses fitur-fitur yang tersedia.<br>
              Semoga harimu menyenangkan dan penuh semangat belajar!
            </p>
            <div class="d-flex justify-content-center gap-3">
              <a href="/profile" class="btn btn-success shadow-sm px-4">
                <i class="bi bi-person-circle me-2"></i> Lihat Profil
              </a>
            </div>
          </div>
          <style>
            .welcome-section {
              background: linear-gradient(135deg, #e0f7fa 0%, #f1f8e9 100%);
              border-radius: 18px;
              box-shadow: 0 4px 24px rgba(44, 62, 80, 0.07);
              margin-top: 40px;
              margin-bottom: 40px;
            }
          </style>
          <!-- Optional: Animate.css CDN for animation -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        @endif
      </div>
    </div>
  </main>
</x-layout>
