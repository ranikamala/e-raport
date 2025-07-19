<x-layout>
    <!--begin::Raport Santri-->
    <div class="col-md-10 m-auto">

        <div class="card shadow mb-4 mt-4">
          <div class="card-header bg-info text-white">
            <h5 class="mb-0">Input Nilai Rapor {{ $santri->name }}</h5>
          </div>
          <div class="card-body">
            @if($nilai)
            <form action="{{ route('penilaian.update') }}" method="POST">
              @csrf
              

              <input type="hidden" name="user_id" value="{{ $santri->id }}">
        
              {{-- A. MATERI POKOK --}}
              <h6 class="mt-3">A. Materi Pokok</h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Membaca / Tadarus</label>
                  <input type="number" name="materi_pokok[membaca]" class="form-control" min="0" max="100" required
                    value="{{ old('materi_pokok.membaca', $nilai->membaca_tadarus) }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label>Praktek / Gerakan Sholat</label>
                  <input type="number" name="materi_pokok[sholat]" class="form-control" min="0" max="100" required
                    value="{{ old('materi_pokok.sholat', $nilai->gerakan_sholat) }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label>Praktek Wudhu</label>
                  <input type="number" name="materi_pokok[wudhu]" class="form-control" min="0" max="100" required
                    value="{{ old('materi_pokok.wudhu', $nilai->praktek_wudhu) }}">
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
                  $nilai_penunjang = [
                    'surat_pendek' => $nilai->hafalan_surat,
                    'doa_sehari' => $nilai->hafalan_doa,
                    'bacaan_sholat' => $nilai->bacaan_sholat,
                    'aqidah_akhlak' => $nilai->aqidah_akhlak,
                    'tajwid' => $nilai->tajwid,
                    'hadist' => $nilai->hadist,
                  ];
                @endphp
        
                @foreach ($penunjang as $key => $label)
                  <div class="col-md-6 mb-3">
                    <label>{{ $label }}</label>
                    <input type="number" name="materi_penunjang[{{ $key }}]" class="form-control" min="0" max="100" required
                      value="{{ old('materi_penunjang.'.$key, $nilai_penunjang[$key]) }}">
                  </div>
                @endforeach
              </div>
        
              {{-- C. MATERI TAMBAHAN --}}
              <h6 class="mt-4">C. Materi Tambahan</h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Tarikh Islam</label>
                  <input type="number" name="materi_tambahan[tarikh]" class="form-control" min="0" max="100" required
                    value="{{ old('materi_tambahan.tarikh', $nilai->tarikh_islam) }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label>Kaligrafi</label>
                  <input type="number" name="materi_tambahan[kaligrafi]" class="form-control" min="0" max="100" required
                    value="{{ old('materi_tambahan.kaligrafi', $nilai->kaligrafi) }}">
                </div>
              </div>
        
              {{-- D. SIKAP / PRILAKU --}}
                <h6 class="mt-4">D. Sikap / Perilaku</h6>
                <div class="row">
                  <div class="col-md-4 mb-3">
                      <label>Prilaku</label>
                      <input type="number" name="sikap[prilaku]" class="form-control" min="0" max="100" required
                        value="{{ old('sikap.prilaku', $nilai->prilaku) }}">
                  </div>
                  <div class="col-md-4 mb-3">
                      <label>Kedisiplinan</label>
                      <input type="number" name="sikap[kedisiplinan]" class="form-control" min="0" max="100" required
                        value="{{ old('sikap.kedisiplinan', $nilai->kedisiplinan) }}">
                  </div>
                  <div class="col-md-4 mb-3">
                      <label>Kerapihan</label>
                      <input type="number" name="sikap[kerapihan]" class="form-control" min="0" max="100" required
                        value="{{ old('sikap.kerapihan', $nilai->kerapihan) }}">
                  </div>
                </div>

                {{-- E. ABSENSI --}}
                <h6 class="mt-4">E. Absensi</h6>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label>Sakit</label>
                    <input type="number" name="absensi[sakit]" class="form-control" min="0" max="100" required
                      value="{{ old('absensi.sakit', $nilai->sakit) }}">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Izin</label>
                    <input type="number" name="absensi[izin]" class="form-control" min="0" max="100" required
                      value="{{ old('absensi.izin', $nilai->izin) }}">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Alpa</label>
                    <input type="number" name="absensi[alpa]" class="form-control" min="0" max="100" required
                      value="{{ old('absensi.alpa', $nilai->alpa) }}">
                  </div>
                </div>
              {{-- SEMESTER --}}
              <div class="row mt-4">
                <div class="col-md-6 mb-3">
                  <label for="semester">Semester</label>
                  <select name="semester" id="semester" class="form-control" required>
                    <option value="">-- Pilih Semester --</option>
                    <option value="Ganjil" {{ old('semester', $nilai->semester) == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                    <option value="Genap" {{ old('semester', $nilai->semester) == 'Genap' ? 'selected' : '' }}>Genap</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="tp">Tahun Pelajaran</label>
                  <select name="tp" id="tp" class="form-control" required>
                    <option value="">-- Pilih Tahun Pelajaran --</option>
                    <option value="2024/2025" {{ old('tp', $nilai->tp) == '2024/2025' ? 'selected' : '' }}>2024/2025</option>
                    <option value="2025/2026" {{ old('tp', $nilai->tp) == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                    <option value="2026/2027" {{ old('tp', $nilai->tp) == '2026/2027' ? 'selected' : '' }}>2026/2027</option>
                    <option value="2027/2028" {{ old('tp', $nilai->tp) == '2027/2028' ? 'selected' : '' }}>2027/2028</option>
                    <option value="2028/2029" {{ old('tp', $nilai->tp) == '2028/2029' ? 'selected' : '' }}>2028/2029</option>
                    <option value="2029/2030" {{ old('tp', $nilai->tp) == '2029/2030' ? 'selected' : '' }}>2029/2030</option>
                  </select>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 mb-3">
                  <label for="catatan">Catatan</label>
                  <textarea name="catatan" id="catatan" class="form-control" rows="3" placeholder="Tulis...">{{ old('catatan', $nilai->catatan) }}</textarea>
                </div>
              </div>

              {{-- Submit --}}
              <div class="mt-4">
                <button type="submit" class="btn btn-success">Update</button>
                <div class="float-end">
                    <a href="/penilaian" class="btn btn-secondary">Batal</a>
                </div>
              </div>
            </form>
            @else
            <form action="{{ route('penilaian.store') }}" method="POST">
              @csrf

              <input type="hidden" name="user_id" value="{{ $santri->id }}">
        
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

              {{-- E. ABSENSI --}}
              <h6 class="mt-4">E. Absensi</h6>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label>Sakit</label>
                  <input type="number" name="absensi[sakit]" class="form-control" min="0" max="100" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label>Izin</label>
                  <input type="number" name="absensi[izin]" class="form-control" min="0" max="100" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label>Alpa</label>
                  <input type="number" name="absensi[alpa]" class="form-control" min="0" max="100" required>
              </div>
              {{-- SEMESTER --}}
              <div class="row mt-4">
                <div class="col-md-6 mb-3">
                  <label for="semester">Semester</label>
                  <select name="semester" id="semester" class="form-control" required>
                    <option value="">-- Pilih Semester --</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="tp">Tahun Pelajaran</label>
                  <select name="tp" id="tp" class="form-control" required>
                    <option value="">-- Pilih Tahun Pelajaran --</option>
                    <option value="2024/2025">2024/2025</option>
                    <option value="2025/2026">2025/2026</option>
                    <option value="2026/2027">2026/2027</option>
                    <option value="2027/2028">2027/2028</option>
                    <option value="2028/2029">2028/2029</option>
                    <option value="2029/2030">2029/2030</option>
                  </select>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 mb-3">
                  <label for="catatan">Catatan</label>
                  <textarea name="catatan" id="catatan" class="form-control" rows="3" placeholder="Tulis..."></textarea>
                </div>
              </div>

              {{-- Submit --}}
              <div class="mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
                <div class="float-end">
                    <a href="/penilaian" class="btn btn-secondary">Batal</a>
                </div>
              </div>
            </form>
            @endif
          </div>
        </div>
    </div>
<!--end::Raport Santri-->

</x-layout>