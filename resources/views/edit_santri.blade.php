<x-layout>
  <div class="col-md-10 m-auto">
    <div class="card shadow mb-4 mt-4">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Form Input Data Santri</h5>
      </div>

      <div class="card-body">
        @if($dataSantri == null)
        <form action="/store_santri" method="POST">
          @csrf

          <input type="hidden" name="user_id" value="{{ $namaSantri->id }}">
          {{-- Data Santri --}}
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" value="{{ $namaSantri->name }}" readonly>
          </div>

            <div class="col-md-6 mb-3">
              <label>Nama Panggilan</label>
              <input type="text" name="nama_panggilan"  class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir"  class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir"  class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label>Agama</label>
              <input type="text" name="agama"  class="form-control" required value="Islam">
            </div>
            <div class="col-md-6 mb-3">
              <label>Anak Ke</label>
              <input type="number" name="anak_ke"  class="form-control" min="1" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Kelas</label>
              <select name="kelas" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="ikhlas" {{ $namaSantri->kelas == 'ikhlas' ? 'selected' : '' }}>Al-Ikhlas</option>
                <option value="malik" {{ $namaSantri->kelas == 'malik' ? 'selected' : '' }}>Al-Malik</option>
                <option value="alim" {{ $namaSantri->kelas == 'alim' ? 'selected' : '' }}>Al-Alim</option>
              </select>
            </div>
            <div class="col-md-12 mb-3">
              <label>Alamat</label>
              <textarea name="alamat"  class="form-control" rows="3" required></textarea>
            </div>
          </div>

          {{-- Submit --}}
          <div class="mt-3">
            <button type="submit" class="btn btn-success">Simpan</button>
            <div class="float-end">
              <a href="/{{ auth()->user()->role == 'guru' ? 'list_santri' : 'detail_saya' }}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </form>
        @else
        <form action="/update_santri" method="POST">
          @csrf

          <input type="hidden" name="user_id" value="{{ $namaSantri->id }}">
          {{-- Data Santri --}}
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" value="{{ $namaSantri->name }}" readonly>
          </div>

            <div class="col-md-6 mb-3">
              <label>Nama Panggilan</label>
              <input type="text" name="nama_panggilan" value="{{ $dataSantri->nama_panggilan }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir" value="{{ $dataSantri->tempat_lahir }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" value="{{ $dataSantri->tanggal_lahir }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" {{ $dataSantri->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $dataSantri->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label>Agama</label>
              <input type="text" name="agama" value="{{ $dataSantri->agama }}" class="form-control" required value="Islam">
            </div>
            <div class="col-md-6 mb-3">
              <label>Anak Ke</label>
              <input type="number" name="anak_ke" value="{{ $dataSantri->anak_ke }}" class="form-control" min="1" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Kelas</label>
              <select name="kelas" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="ikhlas" {{ $dataSantri->kelas == 'ikhlas' ? 'selected' : '' }}>Al-Ikhlas</option>
                <option value="malik" {{ $dataSantri->kelas == 'malik' ? 'selected' : '' }}>Al-Malik</option>
                <option value="alim" {{ $dataSantri->kelas == 'alim' ? 'selected' : '' }}>Al-Alim</option>
              </select>
            </div>
            <div class="col-md-12 mb-3">
              <label>Alamat</label>
              <textarea name="alamat" value="{{ $dataSantri->alamat }}" class="form-control" rows="3" required>{{ $dataSantri->alamat }}</textarea>
            </div>
          </div>

          {{-- Submit --}}
          <div class="mt-3">
            <button type="submit" class="btn btn-success">Simpan</button>
            <div class="float-end">
              <a href="/{{ auth()->user()->role == 'guru' ? 'list_santri' : 'detail_saya' }}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </form>
        @endif
      </div>
    </div>
  </div>
</x-layout>
