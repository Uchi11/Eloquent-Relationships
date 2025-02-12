<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'failed_jobs'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            $table->string('uuid')->unique(); // UUID unik untuk mengidentifikasi setiap job yang gagal
            $table->text('connection'); // Menyimpan nama koneksi (misalnya, database, Redis, dll.)
            $table->text('queue'); // Menyimpan nama antrian tempat job dijalankan
            $table->longText('payload'); // Data lengkap dari job yang gagal
            $table->longText('exception'); // Detail lengkap tentang error atau exception yang menyebabkan job gagal
            $table->timestamp('failed_at')->useCurrent(); // Timestamp kapan job gagal, otomatis diisi dengan waktu saat ini
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'failed_jobs'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs'); // Menghapus tabel saat rollback migrasi
    }
};