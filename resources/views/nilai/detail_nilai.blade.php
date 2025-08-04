<x-layout>
    <style>
        .container {
            overflow-x: auto;
            }

            .page {
                width: 794px;    /* 21cm */
                height: 1123px;  /* 29.7cm */
                margin: 20px auto;
                background-color: white;
                padding: 20px;
                box-sizing: border-box;
                box-shadow: 0 8px 16px rgba(0,0,0,0.2);
                border-radius: 6px;
                overflow: auto; /* sembunyikan scroll */
                font-size: 17px; /* base font size */
            }


            .table {
                table-layout: fixed;
                width: 100%;
            }
            @media (max-width: 768px) {
                .fixed-layout-row {
                    flex-wrap: nowrap !important;
                    transform: scale(0.85); /* Atur sesuai kebutuhan, bisa 0.75, 0.8, dll */
                    transform-origin: top left;
                }

                .fixed-layout-row > .col-md-6 {
                    width: 50%;
                    flex: 0 0 50%;
                }
            }



    </style>
    <div class="container">
        <div class="page">

            <!-- Header -->
            <div class="text-center mb-4">
                <h3 class="font-weight-bold">LAPORAN HASIL BELAJAR SANTRI</h3>
            </div>

            @if(isset($santri) && isset($nilai))
                <!-- Student Information -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 150px;"><strong>Nama Santri</strong></td>
                                <td>: {{ $dataSantri->nama_lengkap ?? $santri->name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px;"><strong>Kelas</strong></td>
                                @if($dataSantri->kelas == 'ikhlas')
                                    <td>: Al-Ikhlas</td>
                                @elseif($dataSantri->kelas == 'malik')
                                    <td>: Al-Malik</td>
                                @elseif($dataSantri->kelas == 'alim')
                                    <td>: Al-Alim</td>
                                @else
                                    <td>: -</td>
                                @endif
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

                <div class="mb-5 page-break-section" style="opacity: 0;">pembatas</div>

                <!-- Personality Assessment and Attendance -->
                <div class="row mb-4 fixed-layout-row ">
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
                    <div class=" p-3" style="min-height: 100px; border: 2px solid #000; border-radius: 4px;">
                        {{ $nilai->catatan ?? '-' }}
                    </div>
                </div>

                <!-- Signatures -->
                 <div class="row">
                     <div class="col-md-12 text-center mb-4">
                         <p><strong>Jakarta, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</strong></p>
                         <p><strong>Mengetahui,</strong></p>
                     </div>

                 </div>
                <div class="row mt-5 fixed-layout-row">
                    <div class="col-md-6 text-center mb-4">
                        <p><strong>Orang Tua/Wali</strong></p>
                        <div style="height: 70px;"></div>
                        <div class="border-top border-dark" style="width: 200px; margin: 0 auto;"></div>
                    </div>
                    <div class="col-md-6 text-center mb-4">
                        <p><strong>Wali Kelas</strong></p>
                        <div style="height: 40px;"></div>
                        <!-- <div class="border-top border-dark" style="width: 200px; margin: 0 auto;"></div> -->
                        <div class="mt-2">{{ $nilai->name ?? '-' }}</div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="/penilaian" class="btn btn-secondary {{ auth()->user()->role == 'siswa' ? 'd-none' : '' }}">Kembali</a>
                    <button onclick="prin()" class="btn btn-primary">Print</button>
                </div>
            @else
                <div class="alert alert-warning mt-4">
                    Data nilai santri belum terisi.
                </div>
                <button onclick="history.back()" class="btn btn-secondary mt-3">Kembali</button>
            @endif
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        function cetak(button) {
            const id = button.getAttribute('data-id');
            window.location.href = `/cetak-${id}`;
        }


        function prin() {
            const page = document.querySelector('.page');
            if (!page) {
                alert("Elemen dengan class 'page' tidak ditemukan.");
                return;
            }

            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print</title>
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                        <style>
                            @page {
                                size: A4;
                                margin: 0;
                            }

                            body {
                                margin: 0;
                                background: #f0f0f0;
                                font-family: Arial, sans-serif;
                            }

                            .page {
                                background: white;
                                width: 210mm;
                                min-height: 297mm;
                                padding: 15mm 10mm;
                                margin: auto;
                                box-sizing: border-box;
                                border-radius: 0;
                                box-shadow: none;
                                height: auto;
                                /* Hapus ini agar tidak terpotong:
                                max-height: 297mm;
                                overflow: hidden;
                                */
                            }

                            table.table, table.table-bordered {
                                border-collapse: collapse !important;
                            }

                            table.table-bordered th,
                            table.table-bordered td {
                                border: 1px solid #000 !important;
                            }

                            .page button, .page a.btn {
                                display: none !important;
                            }
                            .page-break-section {
                                page-break-before: always;
                            }

                            @media print {
                                .row {
                                    display: flex !important;
                                    flex-wrap: wrap !important;
                                }

                                .col-md-6 {
                                    flex: 0 0 50% !important;
                                    max-width: 50% !important;
                                }

                                .col-md-12 {
                                    flex: 0 0 100% !important;
                                    max-width: 100% !important;
                                }

                                .text-center {
                                    text-align: center !important;
                                }

                                .table {
                                    width: 100% !important;
                                }

                                /* Uncomment for debug:
                                * {
                                    outline: 1px solid red !important;
                                }
                                */
                            }
                        </style>
                    </head>
                    <body>
                        ${page.outerHTML}
                    </body>
                </html>
            `);

            printWindow.document.close();
            printWindow.focus();
            printWindow.onload = () => {
                printWindow.print();
                printWindow.close();
            };
        }
    </script>
</x-layout>