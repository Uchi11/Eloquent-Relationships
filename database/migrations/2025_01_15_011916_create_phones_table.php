<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'phones'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            
            $table->unsignedBigInteger('user_id'); 
            // Foreign key yang menghubungkan dengan tabel 'users'.
            // unsignedBigInteger digunakan untuk mencocokkan tipe data kolom 'id' di tabel users.
            
            $table->string('phone'); 
            // Menyimpan nomor telepon pengguna.
            
            $table->timestamps(); 
            // Kolom created_at dan updated_at untuk mencatat waktu pembuatan dan pembaruan data.
    
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); 
            // Menetapkan user_id sebagai foreign key yang merujuk ke kolom 'id' di tabel 'users'.
            // onDelete('cascade') memastikan bahwa jika pengguna dihapus, data nomor telepon terkait juga ikut dihapus.
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'phones'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones'); 
        // Menghapus tabel saat rollback migrasi
    }
};