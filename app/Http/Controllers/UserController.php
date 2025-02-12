<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{    
    /**
     * Menampilkan daftar semua pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data pengguna dari model 'User' dan mengurutkannya berdasarkan waktu terbaru
        $users = User::latest()->get();

        // Mengirim data pengguna ke view 'users.blade.php' menggunakan compact
        return view('users', compact('users'));
    }
}