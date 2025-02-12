<?php

use Illuminate\Support\Facades\Route;

/**
 * Route utama yang mengarah ke halaman welcome.
 * Ketika pengguna mengakses root URL ('/'), maka view 'welcome' akan ditampilkan.
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Route untuk menampilkan daftar pengguna.
 * 
 * @path /users
 * @method GET
 * 
 * Ketika pengguna mengakses '/users', maka method 'index' dari UserController akan dipanggil.
 * Pastikan UserController memiliki method 'index' yang mengembalikan daftar pengguna.
 */
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

/**
 * Route untuk menampilkan daftar postingan.
 * 
 * @path /posts
 * @method GET
 * 
 * Ketika pengguna mengakses '/posts', maka method 'index' dari PostController akan dipanggil.
 * Pastikan PostController memiliki method 'index' yang mengembalikan daftar postingan.
 */
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);