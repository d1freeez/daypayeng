<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;

class CleanEmployeeCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'clean:employee';

    /**
     * The console command description.
     */
    protected $description = 'Delete all relations for the deleted employee';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $employees = Employee::onlyTrashed()->get();
        $employees->map(function (Employee $employee) {
            $employee->accounts()->delete();
            $employee->accruedAdvances()->delete();
            $employee->applications()->delete();
            $employee->cards()->delete();
        });
    }
}
