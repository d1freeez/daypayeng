<?php

namespace App\Actions\Users;

use App\Contracts\Users\WithoutCheckingChangesUsers;
use App\Models\User;

class WithoutCheckingChangeUser implements WithoutCheckingChangesUsers
{
    /**
     * @inheritDoc
     */
    public function change(User $user): void
    {
        $user->update([
            'without_checking' => !$user->without_checking
        ]);
    }
}
