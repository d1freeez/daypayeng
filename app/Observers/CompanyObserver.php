<?php

namespace App\Observers;

use App\Models\LibCompany;
use App\Repositories\Employee\EmployeeRepositoryInterface;

class CompanyObserver
{
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Handle the company "updated" event.
     *
     * @param \App\Models\LibCompany $company
     * @return void
     */
    public function updated(LibCompany $company): void
    {
        foreach ($company->employees as $employee) {
            $employee->update([
                'd_amount' =>
                    $this->employeeRepository->generateDAmount(
                        m_amount: $employee->m_amount,
                        weekdays: $company->is_six_day ? 6 : 5
                    )
            ]);
        }
    }

    /**
     * Handle the company "deleted" event.
     *
     * @param \App\Models\LibCompany $company
     * @return void
     */
    public function deleting(LibCompany $company): void
    {
        $company->director()->delete();
        $company->employees()->delete();
        $company->managers()->delete();
        $company->accounts()->delete();
        $company->departments()->delete();
    }
}
