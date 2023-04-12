<?php

namespace App\Actions\Employee;

use App\Contracts\Employee\CreatesEmployees;
use App\Enums\UserType;
use App\Helper\HasCredentials;
use App\Models\LibCompany;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Str;

class CreateEmployee implements CreatesEmployees
{
    use HasCredentials;

    public function __construct(protected EmployeeRepositoryInterface $employeeRepository)
    {}

    /**
     * @inheritDoc
     */
    public function create(array $credentials): Model
    {
        $company = $this->getCompany($credentials);
        $credentials = $this->fullNameCredential($credentials);
        return $company->employees()->create([
            ...$credentials,
            'd_amount' => $this->employeeRepository->generateDAmount(
                m_amount: $credentials['m_amount'],
                weekdays: $company->is_six_day ? 6 : 5
            ),
            'position' => 'Работник',
            'type' => UserType::EMPLOYEES,
            'email_token' => bcrypt($credentials['email']),
            'is_active' => array_key_exists('is_active', $credentials),
            'password' => key_exists('password', $credentials)
                ? bcrypt($credentials['password'])
                : bcrypt(Str::random(10)),
        ]);
    }

    protected function getCompany(array $credentials): LibCompany
    {
        return LibCompany::find(
            array_key_exists('company_id', $credentials)
                ? $credentials['company_id']
                : auth()->user()->company_id
        );
    }
}
