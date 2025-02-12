<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'comments'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); 
            // Primary key auto-increment untuk identifikasi unik setiap komentar
            
            $table->unsignedBigInteger('post_id'); 
            // Kolom foreign key untuk menghubungkan komentar dengan post
            
            $table->text('comment'); 
            // Kolom untuk menyimpan isi komentar
            
            $table->timestamps(); 
            // Kolom 'created_at' dan 'updated_at' untuk mencatat waktu pembuatan dan pembaruan komentar

            // Definisi foreign key untuk 'post_id' yang merujuk ke kolom 'id' pada tabel 'posts'
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); 
            // Jika post dihapus, maka semua komentar terkait akan ikut terhapus (cascade delete)
        });
    }

    /**
     * Membalikkan migrasi dengan menghapus tabel 'comments'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments'); 
        // Menghapus tabel 'comments' jika dilakukan rollback migrasi
    }
};