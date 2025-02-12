<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di file ini, Anda dapat mendaftarkan semua *API routes* untuk aplikasi Anda.
| Route ini dimuat oleh *RouteServiceProvider* dan secara otomatis diberikan 
| middleware group "api". Group ini biasanya digunakan untuk membangun RESTful API.
|
| Middleware "api" termasuk rate limiting, auth, dan lainnya untuk memastikan
| keamanan dan efisiensi dalam penggunaan API.
|
*/

/**
 * Route API untuk mendapatkan data user yang sedang terautentikasi.
 *
 * Route ini menggunakan middleware 'auth:sanctum' untuk mengautentikasi user 
 * menggunakan token API berbasis Laravel Sanctum.
 *
 * @method GET
 * @endpoint /api/user
 *
 * Cara penggunaan:
 * 1. User harus mengirimkan token otentikasi di header permintaan API.
 * 2. Jika token valid, data user yang terautentikasi akan dikembalikan sebagai respons.
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();  // Mengembalikan data user yang terautentikasi
});