<?php

namespace App\Contracts\Users;

use App\Models\User;

interface ChangesProfile
{
    /**
     * Update profile information for the given user.
     *
     * @param \App\Models\User $user
     * @param array $credentials
     * @return void
     */
    public function update(User $user, array $credentials): void;
}
