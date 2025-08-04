<x-layout>
    <div class="container">
        
        <h4 class="mb-4 mt-4">Detail Santri</h4>

        @if(isset($santri))
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width:200px;">Nama Lengkap</th>
                            <td>: {{ $santri->nama_lengkap ?? $santri->name }}</td>
                        </tr>
                        <tr>
                            <th>Nama Panggilan</th>
                            <td>: {{ $santri->nama_panggilan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>: {{ $santri->tempat_lahir ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>: 
                                @if(!empty($santri->tanggal_lahir))
                                    {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d M Y') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: {{ $santri->jenis_kelamin ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>: {{ $santri->agama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Anak ke-</th>
                            <td>: {{ $santri->anak_ke ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            @if($santri->kelas == 'ikhlas')
                                <td>: Al-Ikhlas</td>
                            @elseif($santri->kelas == 'malik')
                                <td>: Al-Malik</td>
                            @elseif($santri->kelas == 'alim')
                                <td>: Al-Alim</td>
                            @else
                                <td>: -</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $santri->alamat ?? '-' }}</td>
                        </tr>
                    </table>
                    @if(auth()->user()->role == 'guru')
                        <a href="/list_santri" class="btn btn-secondary mt-3">Kembali</a>
                        <a href="/edit_santri-{{ $santri->user_id ?? $santri->id }}" class="btn btn-info mt-3">Edit</a>
                    @else
                        <a href="/edit_data" class="btn btn-info mt-3">Edit</a>
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-warning mt-4">
                Data santri tidak ditemukan.
            </div>
        @endif
    </div>
</x-layout>