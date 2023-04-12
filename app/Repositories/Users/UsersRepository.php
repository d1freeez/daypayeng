<?php

namespace App\Repositories\Users;

use App\Enums\UserType;
use App\Models\Director;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\SuperManager;
use App\Models\User;

class UsersRepository implements UsersRepositoryInterface
{
    public function find(int $user_id = null): User
    {
        return User::find($user_id);
    }

    public function getModel(User $user): User|Employee|Manager|Director|SuperManager
    {
        if ($user->type == UserType::EMPLOYEES) {
            return Employee::find($user->id);
        }
        if ($user->type == UserType::MANAGER) {
            return Manager::find($user->id);
        }
        if ($user->type == UserType::DIRECTOR) {
            return Director::find($user->id);
        }
        if ($user->type == UserType::SUPER_MANAGER) {
            return SuperManager::find($user->id);
        }

        return $user;
    }

    public function getModelName(User $user): string
    {
        $model = $this->getModel($user);

        return $model::class;
    }
}
