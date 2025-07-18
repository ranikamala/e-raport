<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/',[DashboardController::class,'index'])->middleware('auth');
Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout']);

 // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/penilaian',[PenilaianController::class,'index'])->name("penilaian")->middleware('auth');
Route::get('/santri',[SantriController::class,'index'])->name("santri")->middleware('auth');
Route::get('/data_santri',[SantriController::class,'dataSantri'])->name("data_santri")->middleware('auth');
Route::get('/inp_santri',[SantriController::class,'create'])->name("inp_santri")->middleware('auth');
Route::post('/santri_store',[SantriController::class,'add_santri'])->name("santri.store")->middleware('auth');
Route::post('/store_santri',[SantriController::class,'store'])->middleware('auth');
Route::get('/orangtua',[OrangTuaController::class,'index'])->name("orangtua")->middleware('auth');
Route::post('/penilaian_store',[PenilaianController::class,'store'])->name("penilaian.store")->middleware('auth');