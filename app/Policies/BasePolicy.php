<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\User;

abstract class BasePolicy
{
    protected array $types = [
        UserType::ADMIN,
        UserType::DIRECTOR,
        UserType::MANAGER,
        UserType::EMPLOYEES,
        UserType::SUPER_MANAGER
    ];

    protected array $companyTypes = [
        UserType::EMPLOYEES,
        UserType::MANAGER,
        UserType::DIRECTOR
    ];

    protected array $adminTypes = [
        UserType::SUPER_MANAGER,
        UserType::ADMIN
    ];

    protected function adminCheck(User $user): bool
    {
        return in_array($user->type, $this->adminTypes);
    }

    protected function companyCheck(User $user): bool
    {
        return in_array($user->type, $this->companyTypes);
    }

    protected function mainCheck(User $user): bool
    {
        return in_array($user->type, $this->types);
    }

    protected function typesCheck(User $user, array $types): bool
    {
        return in_array($user->type, $types);
    }
}
