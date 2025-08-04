<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    /** @use HasFactory<\Database\Factories\PenilaianFactory> */
    use HasFactory;
    protected $table = 'penilaian';
    protected $fillable = [
        'user_id',
        'membaca_tadarus',
        'gerakan_sholat',
        'praktek_wudhu',
        'hafalan_surat',
        'hafalan_doa',
        'bacaan_sholat',
        'aqidah_akhlak',
        'tajwid',
        'hadist',
        'tarikh_islam',
        'kaligrafi',
        'prilaku',
        'kedisiplinan',
        'kerapihan',
        'kelas',
        'sakit',
        'izin',
        'alpa',
        'semester',
        'tp',
        'catatan',
        'wali_kelas',
    ];
}