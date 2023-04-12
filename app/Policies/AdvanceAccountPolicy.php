<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvanceAccountPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function view(User $user): bool
    {
        return $this->mainCheck($user);
    }

    /**
     * Determine whether the user can view archive the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewArchive(User $user): bool
    {
        return $this->mainCheck($user);
    }

    /**
     * Determine whether the user can view archive the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewRequest(User $user): bool
    {
        return $this->mainCheck($user);
    }


    /**
     * Determine whether the user can view from user archive the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function viewFromUser(User $user): bool
    {
        return $this->mainCheck($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->type == UserType::EMPLOYEES;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
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
        return $user->type == UserType::ADMIN;
    }

    /**
     * Determine whether the user can activate the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function activate(User $user): bool
    {
        return $this->typesCheck($user, [
            UserType::ADMIN,
            UserType::SUPER_MANAGER
        ]);
    }

    /**
     * Determine whether the user can accept the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function companyAccept(User $user): bool
    {
        return $this->typesCheck($user, [
            UserType::DIRECTOR,
            UserType::MANAGER
        ]);
    }

    /**
     * Determine whether the user can accept the model.
     *
     * @param \App\Models\User $user
     * @return bool
     */
    public function accept(User $user): bool
    {
        return $this->typesCheck($user, [UserType::EMPLOYEES]);
    }
}
