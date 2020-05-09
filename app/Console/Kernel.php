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
        //引入
        \App\Console\Commands\GrantMonthMedal::class,
    ];

    /**
     * Define the application's command schedule.
     * 分 时 天 月 星期
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //获取月勋章
        $schedule->command('command:GrantMonthMedal')->monthlyOn(1, '00:30');
        //获取季勋章
        $schedule->command('command:GrantSeasonMedal')->cron('30 00 01 */3 *');
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
