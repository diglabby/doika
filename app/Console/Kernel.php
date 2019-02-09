<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
//use App\Console\Commands\AutoPublishPostTrigger;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //AutoPublishPostTrigger::class,
        Commands\TryRecurrentBePaidCustomer::class,
        Commands\TryRecurrentBePaidSubscription::class,
        Commands\TryRecurrentBePaidPlan::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('posts:publish');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        //$this->load(__DIR__.'/Commands');

        //require base_path('routes/console.php');
    }
}
