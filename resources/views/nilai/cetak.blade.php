<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN HASIL BELAJAR SANTRI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4 portrait;
            margin: 1cm;
        }

        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
                font-size: 10pt;
                overflow: hidden;
            }

            .container-fluid {
                padding: 0 !important;
                margin: 0 !important;
            }

            .table {
                font-size: 9pt;
            }

            .table th, .table td {
                padding: 4px !important;
            }

            .card-body {
                padding: 0 !important;
            }

            .row {
                margin-left: 0;
                margin-right: 0;
            }

            .signature-line {
                width: 150px;
            }

            .no-print, .btn {
                display: none !important;
            }

            table, tr, td, th {
                page-break-inside: avoid !important;
            }
        }

        
        
        
        .table th {
            background-color: #f8f9fa !important;
            border: 1px solid #dee2e6 !important;
        }
        
        .table td {
            border: 1px solid #dee2e6 !important;
        }
        
        .table-secondary {
            background-color: #e9ecef !important;
        }
        
        .signature-line {
            border-top: 1px solid #000;
            width: 200px;
            margin: 0 auto;
        }
        
        .print-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .print-header h3 {
            font-weight: bold;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
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
        <div class="card mt-4 desktop-only-content">
            <div class="card-body">
                <!-- Header -->
                <div class="print-header">
                    <h3>LAPORAN HASIL BELAJAR SANTRI</h3>
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
                                    <td>: {{ $nilai->tp ?? '2024/2025' }}</td>
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
                    <div class="row mb-4 d-flex align-items-stretch" style="display: flex; flex-wrap: wrap;">
                        <!-- Personality Assessment -->
                        <div class="col-md-6" style="display: flex; flex-direction: column; height: 100%;">
                            <table class="table table-bordered h-100 mb-0">
                                <thead>
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
                        <div class="col-md-6" style="display: flex; flex-direction: column; height: 100%;">
                            <table class="table table-bordered h-100 mb-0">
                                <thead>
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
                    <style>
                        @media print {
                            .row.mb-4.d-flex.align-items-stretch {
                                display: flex !important;
                                flex-wrap: wrap !important;
                            }
                            .row.mb-4.d-flex.align-items-stretch > .col-md-6 {
                                display: flex !important;
                                flex-direction: column !important;
                                height: 100% !important;
                                max-width: 50% !important;
                                flex: 0 0 50% !important;
                            }
                            .row.mb-4.d-flex.align-items-stretch table {
                                height: 100% !important;
                                margin-bottom: 0 !important;
                            }
                        }
                    </style>

                    <!-- Notes -->
                    <div class="mb-4">
                        <h6><strong>CATATAN:</strong></h6>
                        <div class="border p-3" style="min-height: 100px;">
                            {{ $nilai->catatan ?? '-' }}
                        </div>
                    </div>

                    <!-- Signatures -->
                     
                    <div class="row mt-5 align-items-end justify-content-center" style="min-height: 180px;">
                        <div class="col-md-12 text-center mb-4">
                            <p><strong>Mengetahui,</strong></p>
                        </div>
                        <div class="col-md-6 text-center mb-4 d-flex flex-column justify-content-end" style="min-height: 150px;">
                            <p><strong>Orang Tua/Wali</strong></p>
                            <div style="flex:1"></div>
                            <div style="height: 70px;"></div>
                            <div class="signature-line"></div>
                        </div>
                        <div class="col-md-6 text-center mb-4 d-flex flex-column justify-content-end" style="min-height: 150px;">
                            <p><strong>Wali Kelas</strong></p>
                            <div style="flex:1"></div>
                            <div style="height: 70px;"></div>
                            <div class="signature-line"></div>
                        </div>
                    </div>
                    <style>
                        @media print {
                            .row.mt-5.align-items-end.justify-content-center {
                                display: flex !important;
                                flex-wrap: wrap !important;
                                align-items: flex-end !important;
                                justify-content: center !important;
                                min-height: 180px !important;
                            }
                            .row.mt-5.align-items-end.justify-content-center > .col-md-6 {
                                display: flex !important;
                                flex-direction: column !important;
                                justify-content: flex-end !important;
                                min-height: 150px !important;
                                height: 100% !important;
                                max-width: 50% !important;
                                flex: 0 0 50% !important;
                            }
                        }
                    </style>

                    <div class="text-center mt-4 no-print">
                        <a href="/penilaian" class="btn btn-secondary">Kembali</a>
                        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
                    </div>
                @else
                    <div class="alert alert-warning mt-4">
                        Data nilai santri belum terisi.
                    </div>
                    <div class="text-center mt-3 no-print">
                        <a href="/penilaian" class="btn btn-secondary">Kembali</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
