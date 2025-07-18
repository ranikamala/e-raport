<x-layout>
    <!--begin::Raport Santri-->
    <div class="col-md-10 m-auto">

        <div class="card shadow mb-4 mt-4">
          <div class="card-header bg-info text-white">
            <h5 class="mb-0">Input Nilai Rapor Santri</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('penilaian.store') }}" method="POST">
              @csrf
        
              {{-- A. MATERI POKOK --}}
              <h6 class="mt-3">A. Materi Pokok</h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Membaca / Tadarus</label>
                  <input type="number" name="materi_pokok[membaca]" class="form-control" min="0" max="100" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Praktek / Gerakan Sholat</label>
                  <input type="number" name="materi_pokok[sholat]" class="form-control" min="0" max="100" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Praktek Wudhu</label>
                  <input type="number" name="materi_pokok[wudhu]" class="form-control" min="0" max="100" required>
                </div>
              </div>
        
              {{-- B. MATERI PENUNJANG --}}
              <h6 class="mt-4">B. Materi Penunjang</h6>
              <div class="row">
                @php
                  $penunjang = [
                    'surat_pendek' => 'Hafalan Surat - Surat Pendek',
                    'doa_sehari' => 'Hafalan Do’a Sehari - Hari',
                    'bacaan_sholat' => 'Hafalan Niat dan Bacaan Sholat',
                    'aqidah_akhlak' => 'Aqidah Akhlak',
                    'tajwid' => 'Pengenalan Tajwid',
                    'hadist' => 'Hafalan Hadist'
                  ];
                @endphp
        
                @foreach ($penunjang as $key => $label)
                  <div class="col-md-6 mb-3">
                    <label>{{ $label }}</label>
                    <input type="number" name="materi_penunjang[{{ $key }}]" class="form-control" min="0" max="100" required>
                  </div>
                @endforeach
              </div>
        
              {{-- C. MATERI TAMBAHAN --}}
              <h6 class="mt-4">C. Materi Tambahan</h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Tarikh Islam</label>
                  <input type="number" name="materi_tambahan[tarikh]" class="form-control" min="0" max="100" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Kaligrafi</label>
                  <input type="number" name="materi_tambahan[kaligrafi]" class="form-control" min="0" max="100" required>
                </div>
              </div>
        
              {{-- D. SIKAP / PRILAKU --}}
                <h6 class="mt-4">D. Sikap / Perilaku</h6>
                <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Prilaku</label>
                    <input type="number" name="sikap[prilaku]" class="form-control" min="0" max="100" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Kedisiplinan</label>
                    <input type="number" name="sikap[kedisiplinan]" class="form-control" min="0" max="100" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Kerapihan</label>
                    <input type="number" name="sikap[kerapihan]" class="form-control" min="0" max="100" required>
                </div>
                </div>

              {{-- Submit --}}
              <div class="mt-4">
                <button type="submit" class="btn btn-success">Simpan Nilai</button>
              </div>
            </form>
          </div>
        </div>
    </div>
<!--end::Raport Santri-->

</x-layout>