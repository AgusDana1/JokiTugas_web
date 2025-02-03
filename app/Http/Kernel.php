<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Daftar perintah kustom atau perintah lainnya yang kamu buat
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Menjadwalkan perintah yang ingin dijalankan secara terjadwal
        // Contoh: menjalankan perintah `schedule:run` setiap hari pukul 00:00
        $schedule->command('schedule:run')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // Memuat file perintah dari `routes/console.php`
        $this->load(__DIR__.'/Commands');

        // Mendefinisikan route untuk perintah artisan tertentu
        require base_path('routes/console.php');
    }

    protected $routeMiddleware = [
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];
}
