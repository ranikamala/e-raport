<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = User::where('role', 'siswa')->orderByDesc('created_at')->get();
        return view('santri', compact('santris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('inp_santri');
    }

    public function add_santri(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // pastikan tabel dan field sesuai
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

        // Simpan data santri ke database
        $user = new User(); // atau model Santri jika ada
        $user->name = ucwords(strtolower($request->name));
        $user->email = $request->email;
        $user->role = 'siswa';
        $user->password = Hash::make($request->password); // pastikan password di-hash
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('santri')->with('success', 'Data santri berhasil disimpan!');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
    $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_panggilan'   => 'required|string|max:255',
            'tempat_lahir'     => 'required|string|max:255',
            'tanggal_lahir'    => 'required|date',
            'jenis_kelamin'    => 'required|in:Laki-laki,Perempuan',
            'agama'            => 'required|string|max:50',
            'anak_ke'          => 'required|integer|min:1',
            'kelas'            => 'required|in:ikhlas,malik,alim',
            'alamat'           => 'required|string',
        ], [
            'nama_panggilan.required'  => 'Nama panggilan wajib diisi.',
            'tempat_lahir.required'    => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required'   => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date'       => 'Tanggal lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required'   => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in'         => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'agama.required'           => 'Agama wajib diisi.',
            'anak_ke.required'         => 'Data anak ke-berapa wajib diisi.',
            'anak_ke.integer'          => 'Anak ke harus berupa angka.',
            'kelas.required'           => 'Kelas wajib diisi.',
            'kelas.in'                 => 'Kelas harus Al-Ikhlas, Al-Malik, atau Al-Alim.',
            'alamat.required'          => 'Alamat wajib diisi.',
        ]);

        $santri = User::find($request->user_id);

        // Simpan data ke database
        Santri::create([
            'user_id'         => $santri->id,
            'nama_lengkap'    => $santri->name,
            'nama_panggilan'  => $request->nama_panggilan,
            'tempat_lahir'    => $request->tempat_lahir,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'agama'           => $request->agama,
            'anak_ke'         => $request->anak_ke,
            'alamat'          => $request->alamat,
            'kelas'           => $request->kelas,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/list_santri_'.$request->kelas)->with('success', 'Data santri berhasil disimpan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_panggilan'   => 'required|string|max:255',
            'tempat_lahir'     => 'required|string|max:255',
            'tanggal_lahir'    => 'required|date',
            'jenis_kelamin'    => 'required|in:Laki-laki,Perempuan',
            'agama'            => 'required|string|max:50',
            'anak_ke'          => 'required|integer|min:1',
            'alamat'           => 'required|string',
            'kelas'            => 'required|in:ikhlas,malik,alim',
        ], [
            'nama_panggilan.required'  => 'Nama panggilan wajib diisi.',
            'tempat_lahir.required'    => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required'   => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date'       => 'Tanggal lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required'   => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in'         => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'agama.required'           => 'Agama wajib diisi.',
            'anak_ke.required'         => 'Data anak ke-berapa wajib diisi.',
            'anak_ke.integer'          => 'Anak ke harus berupa angka.',
            'kelas.required'           => 'Kelas wajib diisi.',
            'kelas.in'                 => 'Kelas harus Al-Ikhlas, Al-Malik, atau Al-Alim.',
            'alamat.required'          => 'Alamat wajib diisi.',
        ]);

        $santri = Santri::where('user_id', $request->user_id)->first();
        $user = User::find($request->user_id);

        if (!$santri) {
            return redirect()->back()->with('error', 'Data santri tidak ditemukan.');
        }

        $santri->update([
            'nama_lengkap'    => $user ? $user->name : $santri->nama_lengkap,
            'nama_panggilan'  => $request->nama_panggilan,
            'tempat_lahir'    => $request->tempat_lahir,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'agama'           => $request->agama,
            'anak_ke'         => $request->anak_ke,
            'kelas'           => $request->kelas,
            'alamat'          => $request->alamat,
        ]);

        if (auth()->user()->role == 'guru') {

            return redirect('/list_santri_'.$request->kelas)->with('success', 'Data santri berhasil diupdate.');
        }else{
            return redirect('/detail_saya')->with('success', 'Data santri berhasil diupdate.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Santri::where('user_id', $id)->first();
        if ($data !== null) {
            $santri = $data;
        }else{
            $santri = User::find($id);
        }
        return view('detail_santri', compact('santri'));
    }
    public function dataSantri()
    {
        $dataAkun = User::where('role', 'siswa')->get();
        return view('edit_santri', compact('dataAkun'));
    }

    public function listSantri()
    {
        $santris = DB::table('users')
        ->leftJoin('santri', 'users.id', '=', 'santri.user_id')
        ->select('users.id as id', 'users.name','santri.kelas as kelas')
        ->where('users.role', 'siswa')
        ->where('santri.kelas', null)
        ->get();
        return view('list_santri', compact('santris'));
    }
    public function listSantriIkhlas()
    {
        $santris = DB::table('users')
        ->leftJoin('santri', 'users.id', '=', 'santri.user_id')
        ->select('users.id as id', 'users.name','santri.kelas as kelas')
        ->where('users.role', 'siswa')
        ->where('santri.kelas', 'ikhlas')
        ->get();
        return view('list_santri', compact('santris'));
    }
    public function listSantriAlim()
    {
        $santris = DB::table('users')
        ->leftJoin('santri', 'users.id', '=', 'santri.user_id')
        ->select('users.id as id', 'users.name','santri.kelas as kelas')
        ->where('users.role', 'siswa')
        ->where('santri.kelas', 'alim')
        ->get();
        return view('list_santri', compact('santris'));
    }
    public function listSantriMalik()
    {
        $santris = DB::table('users')
        ->leftJoin('santri', 'users.id', '=', 'santri.user_id')
        ->select('users.id as id', 'users.name','santri.kelas as kelas')
        ->where('users.role', 'siswa')
        ->where('santri.kelas', 'malik')
        ->get();
        return view('list_santri', compact('santris'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $namaSantri = User::find($id);
        $dataSantri = Santri::where('user_id', $id)->first();
        return view('edit_santri', compact('namaSantri', 'dataSantri'));
    }

    public function edit_santri($id)
    {
        $dataSantri = User::find($id);
        return view('edit_akun_santri', compact( 'dataSantri'));
    }

    public function update_santri(Request $request, $id)
    {
        $dataSantri = User::find($id);

        $data = $request->only(['name', 'email']);

        // Membuat name kapital di awal kata
        if (isset($data['name'])) {
            $data['name'] = ucwords(strtolower($data['name']));
        }

        // Jika password diisi, update password, jika tidak, jangan ubah password
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);
            $data['password'] = bcrypt($request->password);
        }

        $dataSantri->update($data);

        return redirect()->route('santri')->with('success', 'Data santri berhasil diubah!');
    }
    public function detailSaya(){
        $id = Auth::user()->id;
        $data = Santri::where('user_id', $id)->first();
        if ($data !== null) {
            $santri = $data;
        }else{
            $santri = User::find($id);
        }
        return view('detail_santri', compact('santri'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_santri($id)
    {
        $dataSantri = User::find($id);
        $dataSantri->delete();
        return redirect()->route('santri')->with('success', 'Data santri berhasil dihapus!');
    }

    public function edit_data(){
        $id = Auth::user()->id;
        $namaSantri = User::find($id);
        $dataSantri = Santri::where('user_id', $id)->first();
        return view('edit_santri', compact('namaSantri', 'dataSantri'));
    }
}
