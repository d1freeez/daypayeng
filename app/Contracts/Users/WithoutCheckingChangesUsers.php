<?php

namespace App\Contracts\Users;

use App\Models\User;

interface WithoutCheckingChangesUsers
{
    /**
     * Change without_checking flag for the given user.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function change(User $user): void;
}
