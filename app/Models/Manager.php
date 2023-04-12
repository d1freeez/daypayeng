<?php

namespace App\Models;

use App\Enums\UserType;
use App\Helper\Filterable;
use App\Helper\FilterableByRole;
use App\Models\Scopes\ManagerScope;

class Manager extends User
{
    use FilterableByRole, Filterable;

    protected array $role_filter = [
        [
            'user_type' => UserType::DIRECTOR,
            'column' => 'company_id'
        ]
    ];

    protected array $filterable_columns = ['company_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new ManagerScope());
    }
}
