<x-layout>
  <div class="col-md-10 m-auto">
    <div class="card shadow mb-4 mt-4">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Form Input Data Orang Tua / Wali</h5>
      </div>

      <div class="card-body">
        <form action="" method="POST">
          @csrf

          {{-- Hubungan ke Santri --}}
          <div class="mb-3">
            <label>Pilih Santri</label>
            <select name="santri_id" class="form-control" required>
              <option value="">-- Pilih Santri --</option>
                <option value="">satri</option>
             
            </select>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Nama Ayah</label>
              <input type="text" name="nama_ayah" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Nama Ibu</label>
              <input type="text" name="nama_ibu" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Pekerjaan Orang Tua</label>
              <input type="text" name="pekerjaan" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Nomor Telepon</label>
              <input type="text" name="nomor_telp" class="form-control" required>
            </div>
          </div>

          {{-- Submit --}}
          <div class="mt-3">
            <button type="submit" class="btn btn-success">Simpan Data Orang Tua</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>
