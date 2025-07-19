<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = User::where('role', 'siswa')->get();
        return view("nilai.nilai_santri", compact('santris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

     
    public function store(Request $request)
    {
    // Validasi input
        $request->validate([
            'materi_pokok.*'     => 'required|numeric|min:0|max:100',
            'materi_penunjang.*' => 'required|numeric|min:0|max:100',
            'materi_tambahan.*'  => 'required|numeric|min:0|max:100',
            'sikap.*'            => 'required|numeric|min:0|max:100',
            'absensi.*'          => 'required|numeric|min:0|max:100',
            'semester'           => 'nullable|string|max:50',
            'catatan'            => 'nullable|string',
        ]);

        // Simpan ke database
        Penilaian::create([
            'user_id'=> $request->user_id,
            // Materi Pokok
            'membaca_tadarus'    => $request->materi_pokok['membaca'],
            'gerakan_sholat'     => $request->materi_pokok['sholat'],
            'praktek_wudhu'      => $request->materi_pokok['wudhu'],

            // Materi Penunjang
            'hafalan_surat'      => $request->materi_penunjang['surat_pendek'],
            'hafalan_doa'        => $request->materi_penunjang['doa_sehari'],
            'bacaan_sholat'      => $request->materi_penunjang['bacaan_sholat'],
            'aqidah_akhlak'      => $request->materi_penunjang['aqidah_akhlak'],
            'tajwid'             => $request->materi_penunjang['tajwid'],
            'hadist'             => $request->materi_penunjang['hadist'],

            // Materi Tambahan
            'tarikh_islam'       => $request->materi_tambahan['tarikh'],
            'kaligrafi'          => $request->materi_tambahan['kaligrafi'],

            // Sikap / Perilaku
            'prilaku'            => $request->sikap['prilaku'],
            'kedisiplinan'       => $request->sikap['kedisiplinan'],
            'kerapihan'          => $request->sikap['kerapihan'],

            // Absensi
            'sakit'      => $request->absensi['sakit'],
            'izin'       => $request->absensi['izin'],
            'alpa'       => $request->absensi['alpa'],

            // Tambahan
            'semester'           => $request->semester,
            'tp'                 => $request->tp,
            'catatan'            => $request->catatan,
        ]);

        return redirect('/penilaian')->with('success', 'Nilai rapor berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $santri = User::find($id);
        if ($santri) {
            $dataSantri = Santri::where('user_id', $id)->first();
        }
        $nilai = Penilaian::where('user_id', $id)->first();
        return view("nilai.detail_nilai", compact('santri', 'nilai', 'dataSantri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $santri = User::find($id);
        $nilai = Penilaian::where('user_id', $id)->first();
        return view("nilai.edit_nilai", compact('santri', 'nilai'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request)
     {
        $user_id = $request->user_id;

        // Validasi input
        $request->validate([
            'materi_pokok.*'     => 'required|numeric|min:0|max:100',
            'materi_penunjang.*' => 'required|numeric|min:0|max:100',
            'materi_tambahan.*'  => 'required|numeric|min:0|max:100',
            'sikap.*'            => 'required|numeric|min:0|max:100',
            'absensi.*'          => 'required|numeric|min:0|max:100',
            'semester'           => 'nullable|string|max:50',
            'catatan'            => 'nullable|string',
        ]);

        // Cari data penilaian berdasarkan user_id, bukan id primary key
        $penilaian = Penilaian::where('user_id', $user_id)->first();

        if (!$penilaian) {
            return redirect('/penilaian')->with('error', 'Data penilaian tidak ditemukan.');
        }

        // Update data
        $penilaian->update([
            'user_id'           => $user_id,

            // Materi Pokok
            'membaca_tadarus'   => $request->materi_pokok['membaca'],
            'gerakan_sholat'    => $request->materi_pokok['sholat'],
            'praktek_wudhu'     => $request->materi_pokok['wudhu'],

            // Materi Penunjang
            'hafalan_surat'     => $request->materi_penunjang['surat_pendek'],
            'hafalan_doa'       => $request->materi_penunjang['doa_sehari'],
            'bacaan_sholat'     => $request->materi_penunjang['bacaan_sholat'],
            'aqidah_akhlak'     => $request->materi_penunjang['aqidah_akhlak'],
            'tajwid'            => $request->materi_penunjang['tajwid'],
            'hadist'            => $request->materi_penunjang['hadist'],

            // Materi Tambahan
            'tarikh_islam'      => $request->materi_tambahan['tarikh'],
            'kaligrafi'         => $request->materi_tambahan['kaligrafi'],

            // Sikap / Perilaku
            'prilaku'           => $request->sikap['prilaku'],
            'kedisiplinan'      => $request->sikap['kedisiplinan'],
            'kerapihan'         => $request->sikap['kerapihan'],

            // Absensi
            'sakit'     => $request->absensi['sakit'],
            'izin'      => $request->absensi['izin'],
            'alpa'      => $request->absensi['alpa'],

            // Tambahan
            'semester'          => $request->semester,
            'tp'                => $request->tp,
            'catatan'           => $request->catatan,
        ]);

        return redirect('/penilaian')->with('success', 'Nilai rapor berhasil diperbarui.');
     }

     public function cetak($id)
     {
        $santri = User::find($id);
        $nilai = Penilaian::where('user_id', $id)->first();
        return view("nilai.cetak", compact('santri', 'nilai'));
     }
     

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
