<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // Cek apakah user sudah login
        if (!Auth::check()) {
            return view('dashboard'); // Tanpa data jika belum login
        }

        $jumlahSantri = User::where('role', 'siswa')->count();
        $jumlahGuru = User::where('role', 'guru')->count();
        $jumlahSantriIkhlas = Santri::where('kelas', 'ikhlas')->count();
        $jumlahSantriMalik = Santri::where('kelas', 'malik')->count();
        $jumlahSantriAlim = Santri::where('kelas', 'alim')->count();
        return view('dashboard', [
            'jumlahSantri' => $jumlahSantri,
            'jumlahGuru' => $jumlahGuru,
            'jumlahSantriIkhlas' => $jumlahSantriIkhlas,
            'jumlahSantriMalik' => $jumlahSantriMalik,
            'jumlahSantriAlim' => $jumlahSantriAlim,
        ]);
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
