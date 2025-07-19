<x-layout> 
    

    <div class="container">
        <!-- Mobile Info Alert -->
        <div class="mobile-info-alert" style="display:none;">
            <div class="alert alert-info mt-5 text-center" style="font-size: 1.1rem;">
                Tampilan laporan hasil belajar santri hanya dapat dilihat pada perangkat desktop.<br>
                Silakan buka halaman ini melalui komputer atau laptop untuk pengalaman terbaik.
            </div>
            <div class="text-center mt-3">
                <a href="/penilaian" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        <!-- Desktop Only Content -->
        <style>
            /* Hilangkan wrap dan buat scroll horizontal pada mobile */
            @media (max-width: 767.98px) {
                .no-wrap-mobile {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }
                .no-wrap-mobile table {
                    min-width: 700px;
                    width: max-content;
                }
                .no-wrap-mobile .row,
                .no-wrap-mobile .col-md-6,
                .no-wrap-mobile .col-md-12 {
                    display: block !important;
                    width: 100% !important;
                    margin: 0 !important;
                    padding: 0 !important;
                }
            }
        </style>
        <div class="card mt-4">
            <div class="card-body no-wrap-mobile">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h3 class="font-weight-bold">LAPORAN HASIL BELAJAR SANTRI</h3>
                </div>

                @if(isset($santri) && isset($nilai))
                    <!-- Student Information -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="width: 150px;"><strong>Nama Santri</strong></td>
                                    <td>: {{ $dataSantri->nama_lengkap ?? $santri->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Semester</strong></td>
                                    <td>: {{ $nilai->semester ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tahun Ajaran</strong></td>
                                    <td>: {{ $nilai->tahun_ajaran ?? '2024/2025' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Subject Assessment Table -->
                    <div class="mb-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="width: 50px; text-align: center; vertical-align: middle;">NO</th>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">MATA PELAJARAN</th>
                                    <th rowspan="2" style="width: 100px; text-align: center; vertical-align: middle;">NILAI ANGKA</th>
                                    <th colspan="3" style="text-align: center;">KRITERIA PENILAIAN</th>
                                </tr>
                                <tr>
                                    <th style="width: 100px; text-align: center;">ISTIMEWA</th>
                                    <th style="width: 100px; text-align: center;">BAIK SEKALI</th>
                                    <th style="width: 100px; text-align: center;">BAIK</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- A. MATERI POKOK -->
                                <tr class="table-secondary">
                                    <td colspan="6"><strong>A. MATERI POKOK</strong></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Membaca / Tadarus</td>
                                    <td class="text-center">{{ $nilai->membaca_tadarus ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->membaca_tadarus >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->membaca_tadarus >= 80 && $nilai->membaca_tadarus < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->membaca_tadarus >= 70 && $nilai->membaca_tadarus < 80 ? '✓' : '' }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Praktek/Gerakan Sholat</td>
                                    <td class="text-center">{{ $nilai->gerakan_sholat ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->gerakan_sholat >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->gerakan_sholat >= 80 && $nilai->gerakan_sholat < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->gerakan_sholat >= 70 && $nilai->gerakan_sholat < 80 ? '✓' : '' }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Praktek Wudhu</td>
                                    <td class="text-center">{{ $nilai->praktek_wudhu ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->praktek_wudhu >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->praktek_wudhu >= 80 && $nilai->praktek_wudhu < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->praktek_wudhu >= 70 && $nilai->praktek_wudhu < 80 ? '✓' : '' }}</td>
                                </tr>

                                <!-- B. MATERI PENUNJANG -->
                                <tr class="table-secondary">
                                    <td colspan="6"><strong>B. MATERI PENUNJANG</strong></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Hafalan Surat - Surat Pendek</td>
                                    <td class="text-center">{{ $nilai->hafalan_surat ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->hafalan_surat >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->hafalan_surat >= 80 && $nilai->hafalan_surat < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->hafalan_surat >= 70 && $nilai->hafalan_surat < 80 ? '✓' : '' }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Hafalan Do'a Sehari - Hari</td>
                                    <td class="text-center">{{ $nilai->hafalan_doa ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->hafalan_doa >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->hafalan_doa >= 80 && $nilai->hafalan_doa < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->hafalan_doa >= 70 && $nilai->hafalan_doa < 80 ? '✓' : '' }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Hafalan Niat dan Bacaan Sholat</td>
                                    <td class="text-center">{{ $nilai->bacaan_sholat ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->bacaan_sholat >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->bacaan_sholat >= 80 && $nilai->bacaan_sholat < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->bacaan_sholat >= 70 && $nilai->bacaan_sholat < 80 ? '✓' : '' }}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Aqidah Akhlak</td>
                                    <td class="text-center">{{ $nilai->aqidah_akhlak ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->aqidah_akhlak >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->aqidah_akhlak >= 80 && $nilai->aqidah_akhlak < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->aqidah_akhlak >= 70 && $nilai->aqidah_akhlak < 80 ? '✓' : '' }}</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Pengenalan Bahasa Arab</td>
                                    <td class="text-center">{{ $nilai->tajwid ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->tajwid >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->tajwid >= 80 && $nilai->tajwid < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->tajwid >= 70 && $nilai->tajwid < 80 ? '✓' : '' }}</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Hafalan Hadis</td>
                                    <td class="text-center">{{ $nilai->hadist ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->hadist >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->hadist >= 80 && $nilai->hadist < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->hadist >= 70 && $nilai->hadist < 80 ? '✓' : '' }}</td>
                                </tr>

                                <!-- C. MATERI TAMBAHAN -->
                                <tr class="table-secondary">
                                    <td colspan="6"><strong>C. MATERI TAMBAHAN</strong></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Tarikh Islam</td>
                                    <td class="text-center">{{ $nilai->tarikh_islam ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->tarikh_islam >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->tarikh_islam >= 80 && $nilai->tarikh_islam < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->tarikh_islam >= 70 && $nilai->tarikh_islam < 80 ? '✓' : '' }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mewarnai</td>
                                    <td class="text-center">{{ $nilai->kaligrafi ?? '-' }}</td>
                                    <td class="text-center">{{ $nilai->kaligrafi >= 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->kaligrafi >= 80 && $nilai->kaligrafi < 90 ? '✓' : '' }}</td>
                                    <td class="text-center">{{ $nilai->kaligrafi >= 70 && $nilai->kaligrafi < 80 ? '✓' : '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Personality Assessment and Attendance -->
                    <div class="row mb-4">
                        <!-- Personality Assessment -->
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th class="text-center">KEPRIBADIAN</th>
                                        <th class="text-center" style="width: 100px;">NILAI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Prilaku</td>
                                        <td class="text-center">{{ $nilai->prilaku ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kedisiplinan</td>
                                        <td class="text-center">{{ $nilai->kedisiplinan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kerapihan</td>
                                        <td class="text-center">{{ $nilai->kerapihan ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Attendance -->
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th colspan="2" class="text-center">ABSENSI</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">JENIS</th>
                                        <th style="width: 100px;" class="text-center">HARI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sakit</td>
                                        <td class="text-center">{{ $nilai->sakit ?? '0' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Izin</td>
                                        <td class="text-center">{{ $nilai->izin ?? '0' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alfa</td>
                                        <td class="text-center">{{ $nilai->alpa ?? '0' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="mb-4">
                        <h6><strong>CATATAN:</strong></h6>
                        <div class="border p-3" style="min-height: 100px;">
                            {{ $nilai->catatan ?? '-' }}
                        </div>
                    </div>

                    <!-- Signatures -->
                    <div class="row mt-5">
                        <div class="col-md-12 text-center mb-4">
                            <p><strong>Mengetahui,</strong></p>
                        </div>
                        <div class="col-md-6 text-center mb-4">
                            <p><strong>Orang Tua/Wali</strong></p>
                            <div style="height: 70px;"></div>
                            <div class="border-top border-dark" style="width: 200px; margin: 0 auto;"></div>
                        </div>
                        <div class="col-md-6 text-center mb-4">
                            <p><strong>Wali Kelas</strong></p>
                            <div style="height: 70px;"></div>
                            <div class="border-top border-dark" style="width: 200px; margin: 0 auto;"></div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="/penilaian" class="btn btn-secondary {{ auth()->user()->role == 'siswa' ? 'd-none' : '' }}">Kembali</a>
                        <button onclick="cetak(this)" data-id="{{ $santri->id }}" class="btn btn-primary">Cetak</button>
                    </div>
                @else
                    <div class="alert alert-warning mt-4">
                        Data nilai santri belum terisi.
                    </div>
                    <a href="/penilaian" class="btn btn-secondary mt-3">Kembali</a>
                @endif
            </div>
        </div>
    </div>
    <script>
        function cetak(button) {
            const id = button.getAttribute('data-id');
            window.location.href = `/cetak-${id}`;
        }
    </script>
</x-layout>