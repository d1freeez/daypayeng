<?php

namespace Tests\Feature;

use App\Contracts\Advances\AdvanceAccruals;
use App\Models\Employee;
use App\Models\Holiday;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeAdvanceTest extends TestCase
{
    use RefreshDatabase;
    protected EmployeeRepositoryInterface $employeeRepository;
    protected AdvanceAccruals $advanceAccruals;

    protected function setUp(): void
    {
        parent::setUp();
        $this->employeeRepository = app(EmployeeRepositoryInterface::class);
        $this->advanceAccruals = app(AdvanceAccruals::class);
    }

    /** @test */
    public function it_can_accrual_advance_for_given_employee()
    {
        $employees = Employee::factory(5)->create();
        $this->artisan('db:seed');
        foreach ($employees as $employee) {
            $employee->update([
                'd_amount' => $this->employeeRepository->generateDAmount(
                    m_amount: $employee->m_amount,
                    weekdays: $employee->company->is_six_day ? 6 : 7
                )
            ]);
        }
        $today = Carbon::now();
        $weekday = $today->dayOfWeekIso;
        $lastDayOfMonth = Carbon::parse($today)->endOfMonth()->day;
        $holiday = Holiday::findByDayNumberAndMonthNumber($today->day, $today->month);
        foreach ($employees as $e) {
            if ($today->day != $lastDayOfMonth) {
                $this->advanceAccruals->accrual($e, $weekday, $holiday->exists(), $today);
                $e->update([
                    'balance' =>
                        $e->accruedAdvances()->monthly()->sum('amount') -
                        $e->accounts()->monthly()->completed()->sum('amount')
                ]);
            } else {
                $e->update([
                    'balance' => 0.00
                ]);
            }
            $this->assertNotEquals(0, $e->balance);
        }
    }
}
