<x-layout>
  <div class="col-md-10 m-auto">
    <div class="card shadow mb-4 mt-4">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Form Input Data Santri</h5>
      </div>

      <div class="card-body">
        <form action="/store_santri" method="POST">
          @csrf

          {{-- Data Santri --}}
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Nama Lengkap</label>
              <select name="user_id" class="form-control" required>
                <option value="">-- Pilih Santri --</option>
                @foreach($dataAkun as $santri)
                    <option value="{{ $santri->id }}" {{ old('user_id') == $santri->id ? 'selected' : '' }}>
                        {{ $santri->name }}
                    </option>
                @endforeach
            </select>
          </div>

            <div class="col-md-6 mb-3">
              <label>Nama Panggilan</label>
              <input type="text" name="nama_panggilan" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" required>
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
              <input type="text" name="agama" class="form-control" required value="Islam">
            </div>
            <div class="col-md-6 mb-3">
              <label>Anak Ke</label>
              <input type="number" name="anak_ke" class="form-control" min="1" required>
            </div>
            <div class="col-md-12 mb-3">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control" rows="3" required></textarea>
            </div>
          </div>

          {{-- Submit --}}
          <div class="mt-3">
            <button type="submit" class="btn btn-success">Simpan Data Santri</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>
