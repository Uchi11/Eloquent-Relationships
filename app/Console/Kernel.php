<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Mendefinisikan jadwal perintah (commands) aplikasi.
     *
     * Di sini kamu bisa menambahkan tugas-tugas terjadwal seperti
     * menjalankan command tertentu secara berkala (harian, mingguan, dll).
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Contoh: Menjalankan command 'inspire' setiap jam
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Mendaftarkan perintah (commands) untuk aplikasi.
     *
     * Di sini Laravel akan memuat semua custom command yang
     * ada di folder App/Console/Commands dan file routes/console.php.
     *
     * @return void
     */
    protected function commands()
    {
        // Memuat semua custom command dari folder 'App/Console/Commands'
        $this->load(__DIR__.'/Commands');

        // Memuat route khusus untuk command dari file 'routes/console.php'
        require base_path('routes/console.php');
    }
}