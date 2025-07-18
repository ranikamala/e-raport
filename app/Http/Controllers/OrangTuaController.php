<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\User;
use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = User::where('role', 'siswa')->get();
        return view('ortu.ortu_santri', compact('santris'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $santri = User::find($id);
        $ortu = OrangTua::where('santri_id', $id)->first();
        return view('ortu.detail_ortu', compact('santri', 'ortu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $santri = User::find($id);
        $ortu = OrangTua::where('santri_id', $id)->first();
        return view('ortu.edit_ortu', compact('santri', 'ortu'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function updates(Request $request){
        dd($request->all());
     }
    public function update(Request $request)
    {
        $id = $request->santri_id;
        $request->validate([
            'nama_ayah' => [
                'required',
                'string',
                'max:255'
            ],
            'nama_ibu' => [
                'required',
                'string',
                'max:255'
            ],
            'pekerjaan' => [
                'required',
                'string',
                'max:255'
            ],
            'nomor_telp' => [
                'required',
                'string',
                'regex:/^08[0-9]{10,11}$/',
                'min:12',
                'max:13'
            ],
        ], [
            'nama_ayah.required' => 'Nama ayah wajib diisi.',
            'nama_ayah.string' => 'Nama ayah harus berupa teks.',
            'nama_ayah.max' => 'Nama ayah maksimal 255 karakter.',
            'nama_ibu.required' => 'Nama ibu wajib diisi.',
            'nama_ibu.string' => 'Nama ibu harus berupa teks.',
            'nama_ibu.max' => 'Nama ibu maksimal 255 karakter.',
            'pekerjaan.required' => 'Pekerjaan orang tua wajib diisi.',
            'pekerjaan.string' => 'Pekerjaan harus berupa teks.',
            'pekerjaan.max' => 'Pekerjaan maksimal 255 karakter.',
            'nomor_telp.required' => 'Nomor telepon wajib diisi.',
            'nomor_telp.string' => 'Nomor telepon harus berupa teks.',
            'nomor_telp.regex' => 'Nomor telepon harus berupa angka dan diawali 08.',
            'nomor_telp.min' => 'Nomor telepon minimal 12 digit.',
            'nomor_telp.max' => 'Nomor telepon maksimal 13 digit.',
        ]);

        $ortu = OrangTua::where('santri_id', $id)->first();

        if ($ortu) {
            // Update jika data sudah ada
            $ortu->nama_ayah = $request->nama_ayah;
            $ortu->nama_ibu = $request->nama_ibu;
            $ortu->pekerjaan = $request->pekerjaan;
            $ortu->nomor_telp = $request->nomor_telp;
            $ortu->save();
        } else {
            // Create jika data belum ada
            OrangTua::create([
                'santri_id' => $id,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan' => $request->pekerjaan,
                'nomor_telp' => $request->nomor_telp,
            ]);
        }
        return redirect('/orangtua')->with('success', 'Data orang tua berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
