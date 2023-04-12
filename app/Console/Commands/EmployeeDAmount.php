<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use Illuminate\Console\Command;

class EmployeeDAmount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:dayAmount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private EmployeeRepositoryInterface $employeeRepository;

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
        $employees = Employee::with('company')->get();
        foreach ($employees as $employee) {
            $employee->update([
                'd_amount' =>
                    $this->employeeRepository->generateDAmount(
                        m_amount: $employee->m_amount,
                        weekdays: $employee->company->is_six_day ? 6 : 5
                    )
            ]);
        }
    }
}
