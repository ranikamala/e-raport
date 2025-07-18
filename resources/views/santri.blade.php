<x-layout>
    <div class="container">
    <h4 class="mb-4">Data Santri</h4>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel Data Santri --}}
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($santris as $index => $santri)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $santri->name }}</td>
                            <td>{{ $santri->email }}</td>
                            <td>{{ $santri->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning">Edit</a>

                                <form action="" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data santri.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layout>