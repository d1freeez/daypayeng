<?php

namespace App\Actions\Users;

use App\Contracts\Users\ActivityChangesUsers;
use App\Models\User;

class ActivityChangeUser implements ActivityChangesUsers
{
    /**
     * Change activity for the given user.
     *
     * @param \App\Models\User $user
     * @return string
     */
    public function change(User $user): string
    {
        $user->update([
            'is_active' => !$user->is_active
        ]);

        return $user->is_active ? 'активирован' : 'деактивирован';
    }
}
