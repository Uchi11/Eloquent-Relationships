<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'password_resets'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index(); // Kolom email dengan index untuk mempercepat pencarian
            $table->string('token'); // Token reset password yang dikirim ke email pengguna
            $table->timestamp('created_at')->nullable(); // Waktu pembuatan token, nullable untuk fleksibilitas
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'password_resets'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets'); // Menghapus tabel jika rollback dilakukan
    }
};