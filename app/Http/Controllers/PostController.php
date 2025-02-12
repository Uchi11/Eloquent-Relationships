<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{    
    /**
     * Menampilkan daftar semua postingan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data post dari model 'Post' dan mengurutkannya berdasarkan waktu terbaru
        $posts = Post::latest()->get();

        // Mengirim data posts ke view 'posts.blade.php' menggunakan compact
        return view('posts', compact('posts'));
    }
}