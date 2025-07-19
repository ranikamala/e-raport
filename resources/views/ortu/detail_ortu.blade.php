<x-layout>
    <div class="container mt-4">
        <h4 class="mb-4">Detail Orang Tua</h4>
        <div class="card">
            <div class="card-body">
                @if(isset($ortu))
                <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">Nama Santri</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $santri->name ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">Nama Ayah</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $ortu->nama_ayah ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">Nama Ibu</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $ortu->nama_ibu ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">Pekerjaan</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $ortu->pekerjaan ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label fw-bold">No. Telepon</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $ortu->nomor_telp ?? '-' }}</p>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        Data orang tua belum diisi.
                    </div>
                @endif
                <a href="{{ route('orangtua') }}" class="btn btn-secondary mt-3">Kembali</a>
                @if(auth()->user()->role == 'guru')
                    <a href="/edit_ortu-{{ $ortu->id }}" class="btn btn-info mt-3">Edit</a>
                @else
                    <a href="/editOrtu" class="btn btn-info mt-3">Edit</a>
                @endif
            </div>
        </div>
    </div>
</x-layout>