<?php

namespace App\Contracts\Users;

use App\Models\User;

interface ActivityChangesUsers
{
    /**
     * Change activity flag for the given user.
     *
     * @param \App\Models\User $user
     * @return string
     */
    public function change(User $user): string;
}
