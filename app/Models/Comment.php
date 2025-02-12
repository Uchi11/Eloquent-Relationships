<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    /**
     * Relasi antara Comment dan Post.
     * 
     * Setiap komentar (Comment) *berelasi* dengan satu postingan (Post).
     * Relasi ini menunjukkan bahwa `comments` tabel memiliki foreign key `post_id` 
     * yang merujuk ke `posts` tabel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        // Mendefinisikan bahwa Comment *berelasi* ke Post (many-to-one)
        return $this->belongsTo(Post::class);
    }
}