<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view("penilaian");
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
            'semester'           => 'nullable|string|max:50',
            'catatan'            => 'nullable|string',
        ]);

        // Simpan ke database
        Penilaian::create([
            'user_id'=> 2,
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

            // Tambahan
            // 'semester'           => $request->semester,
            // 'catatan'            => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Nilai rapor berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
