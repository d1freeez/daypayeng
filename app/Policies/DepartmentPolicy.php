<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy extends BasePolicy
{
    use HandlesAuthorization;

    protected function mainCheck(User $user): bool
    {
        return in_array($user->type, [
            UserType::ADMIN,
            UserType::SUPER_MANAGER,
            UserType::DIRECTOR
        ]);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function view(User $user): bool
    {
        return $this->mainCheck($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $this->mainCheck($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        return $this->mainCheck($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $this->mainCheck($user);
    }
}
