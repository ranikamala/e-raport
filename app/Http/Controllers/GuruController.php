<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = User::where('role', 'guru')->orderByDesc('updated_at')->get();
        return view('guru', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inp_guru');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirmation_password' => 'required|same:password',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan, silakan gunakan yang lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'confirmation_password.required' => 'Konfirmasi password wajib diisi.',
            'confirmation_password.same' => 'Konfirmasi password harus sama dengan password.',
        ]);

        $user = new User(); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'guru';
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('guru')->with('success', 'Data guru berhasil disimpan!');
    }

    public function update(Request $request)
    {
        $id = $request->user_id;
        $user = User::find($id);

        if (!$user || $user->role !== 'guru') {
            return redirect()->back()->with('error', 'Data guru tidak ditemukan.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'confirmation_password' => 'nullable|same:password',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan, silakan gunakan yang lain.',
            'password.min' => 'Password minimal 6 karakter.',
            'confirmation_password.same' => 'Konfirmasi password harus sama dengan password.',
        ]);

        $user->name = ucwords(strtolower($request->name));
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('guru')->with('success', 'Data guru berhasil diupdate!');
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
    public function edit($id)
    {
        $dataGuru = User::find($id);
        return view('edit_akun_guru', compact( 'dataGuru'));
    }

    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
