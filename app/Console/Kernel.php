<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\weeklyProfit;
use App\Console\Commands\AutoWithdrawal;
use App\Console\Commands\AutoConfirmWithdrawal;
use App\Console\Commands\AutoDeposit;
use App\Console\Commands\AutoFundDeposit;
use App\Console\Commands\ConfirmEducationLicense;

class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        weeklyProfit::class,
        AutoWithdrawal::class,
        AutoConfirmWithdrawal::class,
        AutoDeposit::class,
        AutoFundDeposit::class,
        ConfirmEducationLicense::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
      $schedule->command('weekly:profit')->days([Schedule::FRIDAY])->at('12:00')->timezone('Africa/Lagos');

        $schedule->command('auto:withraw')
                ->hourly()
                ->days([Schedule::SUNDAY, Schedule::SATURDAY])->timezone('Africa/Lagos');
      

//        $schedule->command('confirm:payouts')->everyFiveMinutes();
//        $schedule->command('auto:deposit')->everyFiveMinutes();
//        $schedule->command('auto:educationlicense')->everyFiveMinutes();
//        $schedule->command('fund:deposit')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands() {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

}
