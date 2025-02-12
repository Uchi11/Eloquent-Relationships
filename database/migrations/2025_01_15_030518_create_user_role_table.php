<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Membuat tabel pivot 'user_role' untuk hubungan many-to-many antara users dan roles
        Schema::create('user_role', function (Blueprint $table) {
            // Kolom 'user_id' untuk menyimpan ID pengguna
            $table->unsignedBigInteger('user_id');
            
            // Kolom 'role_id' untuk menyimpan ID peran
            $table->unsignedBigInteger('role_id');

            // Menetapkan foreign key untuk 'user_id' yang merujuk ke kolom 'id' di tabel 'users'
            // dengan opsi onDelete('cascade') untuk menghapus entri terkait jika user dihapus
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Menetapkan foreign key untuk 'role_id' yang merujuk ke kolom 'id' di tabel 'roles'
            // dengan opsi onDelete('cascade') untuk menghapus entri terkait jika role dihapus
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel 'user_role' jika migrasi dibatalkan
        Schema::dropIfExists('user_role');
    }
};