<?php

namespace App\Console;

use App\Jobs\EmailsNotification;
use App\Models\Bolos;
use App\Models\Emails;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
         $schedule->call(function () {

            $bolos = new Bolos();
            $bolos = $bolos->emailsBolos();
            foreach ($bolos as $bolo) {
                $email = Emails::find($bolo->email_id);
                EmailsNotification::dispatch($email)->delay(now()->addSeconds(5));
            }

            })->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
