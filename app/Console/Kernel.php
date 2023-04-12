<?php

namespace App\Console;

use App\Console\Commands\AdvanceStatus;
use App\Console\Commands\EmployeeAdvance;
use App\Console\Commands\EmployeeDAmount;
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
        EmployeeAdvance::class,
        EmployeeDAmount::class,
        AdvanceStatus::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
         $schedule->command('employee:advance')->dailyAt('23:00');
         $schedule->command('employee:dayAmount')->monthlyOn(1, '02:00');
         $schedule->command('advance:status')->dailyAt('23:00');
         $schedule->command('clean:company')->dailyAt('23:00');
         $schedule->command('clean:employee')->dailyAt('23:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
