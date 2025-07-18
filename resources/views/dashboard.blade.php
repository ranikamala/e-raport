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
            <div class="col-md-3 mb-4">
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

            <div class="col-md-3 mb-4">
              <div class="card bg-danger text-white shadow">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="card-title">Nilai</h5>
                      <h2>{{ $jumlahNilai ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-file-alt fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 mb-4">
              <div class="card bg-warning text-white shadow">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="card-title">Mapel</h5>
                      <h2>{{ $jumlahMapel ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-book fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 mb-4">
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

          <!-- CHART -->
          <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
              <span>Grafik Jumlah Santri per Kelas</span>
              <div class="btn-group" role="group" aria-label="Tipe Grafik">
                <button type="button" class="btn btn-light btn-sm" id="barChartBtn" title="Bar Chart"><i class="fas fa-chart-bar"></i></button>
                <button type="button" class="btn btn-light btn-sm" id="pieChartBtn" title="Pie Chart"><i class="fas fa-chart-pie"></i></button>
                <button type="button" class="btn btn-light btn-sm" id="lineChartBtn" title="Line Chart"><i class="fas fa-chart-line"></i></button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="santriChart"></canvas>
            </div>
          </div>
          @push('scripts')
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script>
            let chartType = 'bar';
            const ctx = document.getElementById('santriChart').getContext('2d');
            const chartLabels = {!! json_encode($labels ?? ['Kelas A', 'Kelas B', 'Kelas C']) !!};
            const chartData = {!! json_encode($data ?? [5, 3, 2]) !!};
            const chartColors = [
              '#007bff', '#dc3545', '#ffc107', '#28a745', '#6f42c1', '#17a2b8', '#fd7e14'
            ];

            let santriChart = new Chart(ctx, {
              type: chartType,
              data: {
                labels: chartLabels,
                datasets: [{
                  label: 'Jumlah Santri',
                  data: chartData,
                  backgroundColor: chartColors,
                  borderColor: chartColors,
                  fill: chartType === 'line' ? false : true,
                  tension: 0.4
                }]
              },
              options: {
                responsive: true,
                plugins: {
                  legend: {
                    display: chartType !== 'bar'
                  }
                },
                scales: chartType === 'pie' ? {} : {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });

            function updateChartType(type) {
              santriChart.destroy();
              santriChart = new Chart(ctx, {
                type: type,
                data: {
                  labels: chartLabels,
                  datasets: [{
                    label: 'Jumlah Santri',
                    data: chartData,
                    backgroundColor: chartColors,
                    borderColor: chartColors,
                    fill: type === 'line' ? false : true,
                    tension: 0.4
                  }]
                },
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      display: type !== 'bar'
                    }
                  },
                  scales: type === 'pie' ? {} : {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            }

            document.getElementById('barChartBtn').addEventListener('click', function() {
              updateChartType('bar');
            });
            document.getElementById('pieChartBtn').addEventListener('click', function() {
              updateChartType('pie');
            });
            document.getElementById('lineChartBtn').addEventListener('click', function() {
              updateChartType('line');
            });
          </script>
          @endpush

        @else
          <div class="alert alert-warning">Anda belum login.</div>
        @endif
      </div>
    </div>
  </main>

  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('santriChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($labels ?? ['Kelas A', 'Kelas B', 'Kelas C']) !!},
        datasets: [{
          label: 'Jumlah Santri',
          data: {!! json_encode($data ?? [5, 3, 2]) !!},
          backgroundColor: [
            '#007bff', '#dc3545', '#ffc107', '#28a745', '#6f42c1'
          ]
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  @endpush
</x-layout>
