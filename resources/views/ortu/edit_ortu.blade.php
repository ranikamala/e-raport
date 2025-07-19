<x-layout>
    <div class="container mt-4">
        <h4 class="mb-4">Edit Data Orang Tua</h4>
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('update_ortu') }}" method="POST">
                    @csrf

                    <input type="hidden" name="santri_id" value="{{ $santri->id }}">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label fw-bold">Nama Santri</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" value="{{ $santri->name ?? '-' }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_ayah" class="col-sm-3 col-form-label fw-bold">Nama Ayah</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" value="{{ old('nama_ayah', $ortu->nama_ayah ?? '') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_ibu" class="col-sm-3 col-form-label fw-bold">Nama Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" value="{{ old('nama_ibu', $ortu->nama_ibu ?? '') }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pekerjaan" class="col-sm-3 col-form-label fw-bold">Pekerjaan Orang Tua</label>
                        <div class="col-sm-9">
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan', $ortu->pekerjaan ?? '') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nomor_telp" class="col-sm-3 col-form-label fw-bold">No. Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" name="nomor_telp" id="nomor_telp" class="form-control" value="{{ old('nomor_telp', $ortu->nomor_telp ?? '') }}" maxlength="13">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        @if(auth()->user()->role == 'guru')
                            <a href="/orangtua" class="btn btn-secondary me-2">Batal</a>
                        @else
                            <a href="/detailOrtu" class="btn btn-secondary me-2">Batal</a>
                        @endif
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>