<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Daftar tipe exception dengan level log kustom masing-masing.
     * 
     * Kamu bisa menentukan level log untuk exception tertentu di sini,
     * misalnya 'error', 'warning', atau 'info'.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        // Contoh: \App\Exceptions\CustomException::class => \Psr\Log\LogLevel::WARNING,
    ];

    /**
     * Daftar tipe exception yang tidak akan dilaporkan.
     * 
     * Exception di sini tidak akan masuk ke log Laravel.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        // Contoh: \App\Exceptions\CustomException::class,
    ];

    /**
     * Daftar input yang tidak akan disimpan ke session saat ada validasi error.
     * 
     * Ini penting untuk menjaga keamanan data sensitif seperti password.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Mendaftarkan callback untuk penanganan exception.
     * 
     * Kamu bisa menambahkan logika khusus ketika exception terjadi di sini.
     *
     * @return void
     */
    public function register()
    {
        // Callback ini akan dipanggil untuk setiap exception yang dilaporkan
        $this->reportable(function (Throwable $e) {
            // Tambahkan logika kustom untuk melaporkan exception, misalnya:
            // Log::error($e->getMessage());
        });
    }
}