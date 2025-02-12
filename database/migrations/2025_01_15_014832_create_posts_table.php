<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'posts'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); 
            // Primary key auto-increment untuk identifikasi unik setiap post
            
            $table->string('title'); 
            // Kolom untuk menyimpan judul post (dengan batasan panjang default 255 karakter)
            
            $table->text('content'); 
            // Kolom untuk menyimpan isi/konten post (bisa lebih panjang dibandingkan string)
            
            $table->timestamps(); 
            // Kolom 'created_at' dan 'updated_at' untuk mencatat waktu pembuatan dan pembaruan post
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'posts'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts'); 
        // Menghapus tabel 'posts' jika dilakukan rollback migrasi
    }
};
