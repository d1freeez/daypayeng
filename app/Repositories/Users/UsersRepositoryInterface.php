<?php

namespace App\Repositories\Users;

use App\Models\Director;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\SuperManager;
use App\Models\User;

interface UsersRepositoryInterface
{
    public function find(int $user_id = null): User;

    public function getModel(User $user): User|Employee|Manager|Director|SuperManager;

    public function getModelName(User $user): string;
}
