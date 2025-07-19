<x-layout>
    <div class="container">
        <h4 class="mb-4 mt-4">Akun Santri</h4>

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.getElementById('successAlert');
                    if (alert) {
                        var bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                        bsAlert.close();
                    }
                }, 3000);
            </script>
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
                                    <a href="{{ route('edit_akun_santri', $santri->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <button class="btn btn-sm btn-danger" data-id="{{ $santri->id }}" onclick="hapus(this)">Hapus</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function hapus(button) {
            const id = button.getAttribute('data-id');
            Swal.fire({
                title: 'Yakin ingin menghapus santri ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/delete_santri-' + id;
                }
            });
        }
    </script>
</x-layout>