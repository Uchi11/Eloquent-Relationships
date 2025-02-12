<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Stack middleware global aplikasi.
     *
     * Middleware di sini dijalankan untuk setiap request yang masuk ke aplikasi.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class, // Memastikan host yang dipercaya (biasanya dikustomisasi jika ada kebutuhan khusus)
        \App\Http\Middleware\TrustProxies::class, // Mengatur trusted proxies (berguna untuk aplikasi di balik load balancer)
        \Illuminate\Http\Middleware\HandleCors::class, // Menangani Cross-Origin Resource Sharing (CORS)
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class, // Mencegah request selama mode maintenance
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // Memvalidasi ukuran POST request agar tidak melebihi batas
        \App\Http\Middleware\TrimStrings::class, // Menghapus spasi berlebih dari input
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // Mengubah string kosong menjadi null
    ];

    /**
     * Grup middleware untuk route tertentu (web & api).
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, // Mengenkripsi cookie sebelum dikirim ke browser
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Menambahkan cookie yang diantrikan ke response
            \Illuminate\Session\Middleware\StartSession::class, // Memulai session untuk request
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Membagikan error dari session ke view
            \App\Http\Middleware\VerifyCsrfToken::class, // Memverifikasi token CSRF untuk keamanan form
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Mengganti route binding secara otomatis
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Middleware untuk autentikasi Sanctum (jika digunakan)
            'throttle:api', // Membatasi jumlah request untuk API (rate limiting)
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Mengganti route binding secara otomatis di API
        ],
    ];

    /**
     * Middleware untuk route individual.
     *
     * Middleware ini bisa diterapkan secara spesifik di route tertentu.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Middleware untuk memeriksa apakah pengguna sudah login
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class, // Autentikasi dasar HTTP
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class, // Autentikasi berbasis session
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class, // Mengatur header caching
        'can' => \Illuminate\Auth\Middleware\Authorize::class, // Otorisasi berdasarkan policy
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // Redirect jika pengguna sudah login
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class, // Memastikan pengguna memasukkan password lagi untuk tindakan sensitif
        'signed' => \App\Http\Middleware\ValidateSignature::class, // Memvalidasi URL yang ditandatangani (signed routes)
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // Membatasi jumlah request untuk mencegah spam
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // Memastikan email pengguna sudah diverifikasi
    ];
}