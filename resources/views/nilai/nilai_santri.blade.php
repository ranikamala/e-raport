<x-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">    

    <div class="container">
    <div class="row justify-content-center mt-4 mb-4">
            <div class="col-md-6 col-sm-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <label for="kelasSelect" class="form-label fw-bold mb-2">Pilih Kelas</label>
                        <select id="kelasSelect" class="form-select" onchange="window.location.href = '{{ url('penilaian') }}' + this.value">
                            @php
                                // Tentukan kelas yang aktif berdasarkan URL
                                $currentUrl = url()->current();
                                $kelasSelected = null;
                                if (str_ends_with($currentUrl, 'penilaian_ikhlas')) {
                                    $kelasSelected = 'ikhlas';
                                } elseif (str_ends_with($currentUrl, 'penilaian_alim')) {
                                    $kelasSelected = 'alim';
                                } elseif (str_ends_with($currentUrl, 'penilaian_malik')) {
                                    $kelasSelected = 'malik';
                                } elseif (str_ends_with($currentUrl, 'penilaian')) {
                                    $kelasSelected = 'none';
                                }
                            @endphp
                            <option value="" {{ $kelasSelected == 'none' ? 'selected' : '' }}>Pilih Kelas</option>
                            <option value="_ikhlas" {{ $kelasSelected == 'ikhlas' ? 'selected' : '' }}>Al-Ikhlas</option>
                            <option value="_alim" {{ $kelasSelected == 'alim' ? 'selected' : '' }}>Al-Alim</option>
                            <option value="_malik" {{ $kelasSelected == 'malik' ? 'selected' : '' }}>Al-Malik</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="{{ $kelasSelected == 'none' ? 'd-none' : '' }}">
            <h4 class="mb-4 mt-4">Data Nilai Santri</h4>
    
            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
    
            <div class="card">
                <div class="card-body table-responsive">
                    <div style="overflow-x: auto;">
                        <table id="dataSantriTable" class="table table-bordered table-hover" style="white-space: nowrap;">
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
                                            <a href="{{ route('detail_nilai', $santri->user_id ?? $santri->id) }}" class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('edit_nilai', $santri->user_id ?? $santri->id) }}" class="btn btn-sm btn-warning">Edit</a>
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