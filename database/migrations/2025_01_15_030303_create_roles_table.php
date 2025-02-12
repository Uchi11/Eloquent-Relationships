<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'roles'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); 
            // Primary key auto-increment untuk identifikasi unik setiap role
            
            $table->string('name'); 
            // Kolom untuk menyimpan nama role, misalnya 'admin', 'editor', 'user'
            
            $table->timestamps(); 
            // Kolom 'created_at' dan 'updated_at' untuk mencatat waktu pembuatan dan pembaruan role
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'roles'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles'); 
        // Menghapus tabel 'roles' jika dilakukan rollback migrasi
    }
};