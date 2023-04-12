<?php

namespace App\Console\Commands;

use App\Contracts\Advances\AdvanceAccruals;
use App\Models\Employee;
use App\Models\Holiday;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EmployeeAdvance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:advance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Employee advance';
    protected EmployeeRepositoryInterface $employeeRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        parent::__construct();
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->employeeRepository->dailyAccruals();
    }
}
