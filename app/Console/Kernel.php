<?php

namespace App\Console;

use App\Console\Commands\AuthLoginCommand;
use App\Console\Commands\AuthRegisterCommand;
use App\Console\Commands\BasicCommand;
use App\Console\Commands\InputExample;
use App\Console\Commands\InputPrompt;
use App\Console\Commands\OptionExample;
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
        AuthLoginCommand::class,
        AuthRegisterCommand::class,
        BasicCommand::class,
        InputExample::class,
        OptionExample::class,
        InputPrompt::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
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
