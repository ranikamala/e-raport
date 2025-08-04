<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
           // Relasi ke user atau santri (opsional: bisa diganti 'santri_id' jika pakai tabel khusus)
           $table->unsignedBigInteger('user_id');
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
            // A. Materi Pokok
            $table->unsignedTinyInteger('membaca_tadarus')->nullable();
            $table->unsignedTinyInteger('gerakan_sholat')->nullable();
            $table->unsignedTinyInteger('praktek_wudhu')->nullable();

            // B. Materi Penunjang
            $table->unsignedTinyInteger('hafalan_surat')->nullable();
            $table->unsignedTinyInteger('hafalan_doa')->nullable();
            $table->unsignedTinyInteger('bacaan_sholat')->nullable();
            $table->unsignedTinyInteger('aqidah_akhlak')->nullable();
            $table->unsignedTinyInteger('tajwid')->nullable();
            $table->unsignedTinyInteger('hadist')->nullable();

            // C. Materi Tambahan
            $table->unsignedTinyInteger('tarikh_islam')->nullable();
            $table->unsignedTinyInteger('kaligrafi')->nullable();
            
            $table->unsignedTinyInteger('prilaku')->nullable();
            $table->unsignedTinyInteger('kedisiplinan')->nullable();
            $table->unsignedTinyInteger('kerapihan')->nullable();

            // Absensi
            $table->unsignedTinyInteger('sakit')->nullable();
            $table->unsignedTinyInteger('izin')->nullable();
            $table->unsignedTinyInteger('alpa')->nullable();

            // Informasi tambahan
            $table->string('kelas')->nullable();
            $table->string('semester')->nullable(); 
            $table->string('tp')->nullable(); 
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('wali_kelas');
            $table->foreign('wali_kelas')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
