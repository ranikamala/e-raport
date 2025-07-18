<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    /** @use HasFactory<\Database\Factories\OrangTuaFactory> */
    use HasFactory;
    protected $table = 'orang_tua';
    protected $fillable = ['santri_id', 'nama_ayah', 'nama_ibu', 'pekerjaan', 'nomor_telp'];
}
