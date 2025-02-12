<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    /**
     * Mendefinisikan relasi antara Post dan Comment.
     * 
     * Setiap postingan (Post) dapat memiliki banyak komentar (Comment).
     * Biasanya, tabel 'comments' memiliki foreign key 'post_id' 
     * yang merujuk ke tabel 'posts'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        // Relasi one-to-many: Satu post memiliki banyak komentar
        return $this->hasMany(Comment::class);
    }
}