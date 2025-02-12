<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| File ini digunakan untuk mendefinisikan command *console* berbasis Closure.
| Setiap Closure di sini terhubung dengan instance command, yang memungkinkan 
| Anda untuk berinteraksi dengan input dan output command secara langsung.
|
| Command ini dapat dijalankan melalui terminal menggunakan Artisan.
|
*/

/**
 * Command 'inspire'
 * 
 * Command ini akan menampilkan kutipan inspiratif di terminal.
 * 
 * Cara menjalankan:
 * php artisan inspire
 * 
 * Fungsi $this->comment() digunakan untuk menampilkan kutipan ke output terminal dengan format komentar.
 */
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');  // Menentukan tujuan dari command ini