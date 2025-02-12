<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'users'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Kolom primary key dengan auto-increment (bigint)
            $table->string('name'); // Kolom untuk nama user
            $table->string('email')->unique(); // Kolom email yang harus unik
            $table->timestamp('email_verified_at')->nullable(); // Kolom untuk menyimpan waktu verifikasi email, bisa null
            $table->string('password'); // Kolom untuk menyimpan password user
            $table->rememberToken(); // Kolom untuk token 'remember me' saat login
            $table->timestamps(); // Kolom created_at dan updated_at secara otomatis
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel 'users'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users'); // Menghapus tabel 'users' jika ada
    }
};