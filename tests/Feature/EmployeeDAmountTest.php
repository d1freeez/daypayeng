<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeDAmountTest extends TestCase
{
    use RefreshDatabase;

    protected EmployeeRepositoryInterface $employeeRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->employeeRepository = app(EmployeeRepositoryInterface::class);
    }

    /** @test */
    public function it_can_update_d_amount_for_given_employee()
    {
        $employee = Employee::factory()->create();
        $this->artisan('db:seed');
        $employee->update([
            'd_amount' => $this->employeeRepository->generateDAmount(
                m_amount: $employee->m_amount,
                weekdays: $employee->company->is_six_day ? 6 : 7
            )
        ]);
        $this->assertNotNull($employee->d_amount);
    }
}
