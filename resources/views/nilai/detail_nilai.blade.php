<x-layout>
    <div class="container">
        <h4 class="mb-4 mt-4">Detail Nilai Santri</h4>

        @if(isset($santri) && isset($nilai))
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Biodata Santri</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th style="width:200px;">Nama Lengkap</th>
                            <td>: {{ $dataSantri->nama_lengkap ?? $santri->name }}</td>
                        </tr>
                        <tr>
                            <th>Nama Panggilan</th>
                            <td>: {{ $dataSantri->nama_panggilan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>: {{ $nilai->semester ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Nilai Materi Pokok</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Membaca Tadarus</th>
                            <td>{{ $nilai->membaca_tadarus ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Gerakan Sholat</th>
                            <td>{{ $nilai->gerakan_sholat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Praktek Wudhu</th>
                            <td>{{ $nilai->praktek_wudhu ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Nilai Materi Penunjang</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Hafalan Surat Pendek</th>
                            <td>{{ $nilai->hafalan_surat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Hafalan Doa Sehari-hari</th>
                            <td>{{ $nilai->hafalan_doa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Bacaan Sholat</th>
                            <td>{{ $nilai->bacaan_sholat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Aqidah Akhlak</th>
                            <td>{{ $nilai->aqidah_akhlak ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tajwid</th>
                            <td>{{ $nilai->tajwid ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Hadist</th>
                            <td>{{ $nilai->hadist ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Nilai Materi Tambahan</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Tarikh Islam</th>
                            <td>{{ $nilai->tarikh_islam ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kaligrafi</th>
                            <td>{{ $nilai->kaligrafi ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Nilai Sikap / Perilaku</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Prilaku</th>
                            <td>{{ $nilai->prilaku ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kedisiplinan</th>
                            <td>{{ $nilai->kedisiplinan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kerapihan</th>
                            <td>{{ $nilai->kerapihan ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Catatan</h5>
                    <p>{{ $nilai->catatan ?? '-' }}</p>
                </div>
            </div>

            <a href="/penilaian" class="btn btn-secondary mt-3">Kembali</a>
        @else
            <div class="alert alert-warning mt-4">
                Data nilai santri tidak ditemukan.
            </div>
            <a href="/penilaian" class="btn btn-secondary mt-3">Kembali</a>
        @endif
    </div>
</x-layout>