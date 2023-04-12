<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $this->adminCheck($user);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function view(User $user): bool
    {
        return $this->adminCheck($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $this->adminCheck($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        return $this->typesCheck($user, [
            UserType::ADMIN,
            UserType::DIRECTOR,
            UserType::MANAGER,
            UserType::SUPER_MANAGER
        ]);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $this->adminCheck($user);
    }

    public function advanceDay(User $user): bool
    {
        return $this->adminCheck($user);
    }

    public function accrualAdvance(User $user): bool
    {
        return $this->adminCheck($user);
    }
}
