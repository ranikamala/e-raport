<x-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">    

    <div class="container">
        <h4 class="mb-4 mt-4">Data Santri</h4>

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body table-responsive">
                <table id="dataSantriTable" class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Lengkap</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($santris as $index => $santri)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $santri->name }}</td>
                                <td>
                                    <a href="{{ route('detail_nilai', $santri->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('edit_nilai', $santri->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada data santri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTables JS & CSS CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        
        document.addEventListener('DOMContentLoaded', function () {
            $('#dataSantriTable').DataTable();
        });
        
    </script>
</x-layout>