<?php

namespace App\Models;

use App\Enums\UserType;
use App\Helper\Filterable;
use App\Helper\FilterableByRole;
use App\Models\Scopes\EmployeeScope;

class Employee extends User
{
    use FilterableByRole, Filterable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The columns that can be filtered by role.
     *
     * @var array
     */
    protected array $role_filter = [
        [
            'user_type' => [UserType::DIRECTOR, UserType::MANAGER],
            'column' => 'company_id'
        ]
    ];

    /**
     * The columns that can be filtered.
     *
     * @var array
     */
    protected array $filterable_columns = ['company_id'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new EmployeeScope());
    }
}
