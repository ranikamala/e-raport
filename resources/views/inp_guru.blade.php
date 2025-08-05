<x-layout>
  <div class="col-md-10 m-auto">
    
    <div class="card shadow mb-4 mt-4">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Akun Guru</h5>
      </div>

      <div class="card-body">
        <form action="{{ route('guru.store') }}" method="POST">
          @csrf

          {{-- Data Guru --}}
          <div class="row">
              <div class="col-md-6 mb-3">
                  <label>Nama Lengkap</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                  @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col-md-6 mb-3">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                  @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col-md-6 mb-3">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                  @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col-md-6 mb-3">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="confirmation_password" class="form-control @error('confirmation_password') is-invalid @enderror" required>
                  @error('confirmation_password')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
          </div>

          {{-- Submit --}}
          <div class="mt-3">
              <button type="submit" class="btn btn-success">Simpan</button>
          </div>
      </form>

      </div>
    </div>
  </div>
</x-layout>
