<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Di file ini, Anda bisa mendaftarkan semua *broadcasting channels* yang
| didukung oleh aplikasi Anda. *Channel authorization callbacks* yang
| diberikan akan digunakan untuk memeriksa apakah user yang terautentikasi
| memiliki izin untuk mendengarkan channel tersebut.
|
| Broadcasting berguna untuk mengirimkan event secara real-time menggunakan
| layanan seperti Pusher atau soket WebSocket lainnya.
|
*/

/**
 * Channel broadcasting untuk model User.
 *
 * Channel ini memungkinkan hanya user yang terautentikasi dengan ID tertentu 
 * untuk mendengarkan event yang dikirim ke channel ini.
 *
 * Contoh channel: 'App.Models.User.1' hanya bisa diakses oleh user dengan ID 1.
 *
 * @param  \App\Models\User  $user  User yang terautentikasi
 * @param  int  $id  ID user yang dimaksud dalam channel
 * @return bool  True jika user yang terautentikasi sesuai dengan ID di channel
 */
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    // Hanya izinkan user untuk mendengarkan channel jika ID-nya sama dengan ID user yang terautentikasi
    return (int) $user->id === (int) $id;
});