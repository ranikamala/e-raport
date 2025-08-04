<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/profile',[ProfileController::class,'index'])->name('profile')->middleware('auth');
Route::get('/edit_profile',[ProfileController::class,'edit'])->name('edit_profile')->middleware('auth');
Route::post('/update_profile',[ProfileController::class,'update'])->name('update_profile')->middleware('auth');


Route::get('/penilaian',[PenilaianController::class,'index'])->name("penilaian")->middleware('auth');
Route::get('/penilaian_ikhlas',[PenilaianController::class,'penilaianIkhlas'])->name("penilaian_ikhlas")->middleware('auth');
Route::get('/penilaian_alim',[PenilaianController::class,'penilaianAlim'])->name("penilaian_alim")->middleware('auth');
Route::get('/penilaian_malik',[PenilaianController::class,'penilaianMalik'])->name("penilaian_malik")->middleware('auth');
Route::get('/santri',[SantriController::class,'index'])->name("santri")->middleware('auth');
Route::get('/edit_santri-{id}',[SantriController::class,'edit'])->name("edit_santri")->middleware('auth');
Route::get('/list_santri',[SantriController::class,'listSantri'])->name("list_santri")->middleware('auth');
Route::get('/list_santri_ikhlas',[SantriController::class,'listSantriIkhlas'])->name("list_santri_ikhlas")->middleware('auth');
Route::get('/list_santri_alim',[SantriController::class,'listSantriAlim'])->name("list_santri_alim")->middleware('auth');
Route::get('/list_santri_malik',[SantriController::class,'listSantriMalik'])->name("list_santri_malik")->middleware('auth');
Route::get('/detail_santri-{id}',[SantriController::class,'show'])->name("detail_santri")->middleware('auth');
Route::get('/detail_saya',[SantriController::class,'detailSaya'])->name("detail_saya")->middleware('auth');
Route::get('/edit_data',[SantriController::class,'edit_data'])->name("edit_data")->middleware('auth');
Route::get('/edit_akun_santri-{id}',[SantriController::class,'edit_santri'])->name("edit_akun_santri")->middleware('auth');
Route::post('/update_akun_santri-{id}',[SantriController::class,'update_santri'])->name("update_akun_santri")->middleware('auth');
Route::get('/delete_santri-{id}',[SantriController::class,'delete_santri'])->name("delete_santri")->middleware('auth');
Route::get('/data_santri',[SantriController::class,'dataSantri'])->name("data_santri")->middleware('auth');
Route::get('/inp_santri',[SantriController::class,'create'])->name("inp_santri")->middleware('auth');
Route::post('/santri_store',[SantriController::class,'add_santri'])->name("santri.store")->middleware('auth');
Route::post('/store_santri',[SantriController::class,'store'])->middleware('auth');
Route::post('/update_santri',[SantriController::class,'update'])->middleware('auth');
Route::get('/orangtua',[OrangTuaController::class,'index'])->name("orangtua")->middleware('auth');
Route::get('/detail_ortu-{id}',[OrangTuaController::class,'show'])->name("detail_ortu")->middleware('auth');
Route::get('/detailOrtu',[OrangTuaController::class,'detailOrtu'])->name("detailOrtu")->middleware('auth');
Route::get('/edit_ortu-{id}',[OrangTuaController::class,'edit'])->name("edit_ortu")->middleware('auth');
Route::get('/editOrtu',[OrangTuaController::class,'editOrtu'])->name("editOrtu")->middleware('auth');
Route::post('/update_ortu',[OrangTuaController::class,'update'])->name("update_ortu")->middleware('auth');
Route::post('/penilaian_store',[PenilaianController::class,'store'])->name("penilaian.store")->middleware('auth');
Route::post('/penilaian_update',[PenilaianController::class,'update'])->name("penilaian.update")->middleware('auth');
Route::get('/detail_nilai-{id}',[PenilaianController::class,'show'])->name("detail_nilai")->middleware('auth');
Route::get('/nilai_saya',[PenilaianController::class,'nilai'])->name("nilai_saya")->middleware('auth');
Route::get('/edit_nilai-{id}',[PenilaianController::class,'edit'])->name("edit_nilai")->middleware('auth');
Route::get('/cetak-{id}',[PenilaianController::class,'cetak'])->name("cetak")->middleware('auth');