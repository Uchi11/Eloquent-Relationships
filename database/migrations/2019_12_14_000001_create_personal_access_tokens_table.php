<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'personal_access_tokens'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            
            $table->morphs('tokenable'); 
            // Menyimpan ID dan tipe model (polymorphic relationship), contoh: 'tokenable_id' dan 'tokenable_type'.
            // Digunakan untuk mengaitkan token dengan model yang berbeda, seperti User atau Admin.
            
            $table->string('name'); // Nama token, biasanya untuk identifikasi (misal: 'Mobile Token', 'Web Token')
            
            $table->string('token', 64)->unique(); 
            // Token unik yang digunakan untuk otentikasi API.
            // Panjang 64 karakter sesuai dengan standar keamanan.
            
            $table->text('abilities')->nullable(); 
            // Menentukan hak akses token, misalnya ['read', 'write'], atau null jika tidak ada batasan.
            
            $table->timestamp('last_used_at')->nullable(); 
            // Mencatat kapan terakhir kali token digunakan untuk permintaan API.
            
            $table->timestamp('expires_at')->nullable(); 
            // Menentukan kapan token kadaluarsa, null jika token tidak memiliki masa berlaku.
            
            $table->timestamps(); 
            // Kolom created_at dan updated_at untuk mencatat waktu pembuatan dan pembaruan token.
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'personal_access_tokens'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens'); // Menghapus tabel saat rollback migrasi
    }
};