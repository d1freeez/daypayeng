<?php

namespace App\Actions\Users;

use App\Contracts\Users\ChangesProfile;
use App\Helper\HasCredentials;
use App\Models\User;

class ChangeProfile implements ChangesProfile
{
    use HasCredentials;

    /**
     * @inheritDoc
     */
    public function update(User $user, array $credentials): void
    {
        $credentials = $this->fullNameCredential($credentials);
        $credentials = $this->updatePassword($user, $credentials);
        $user->update($credentials);
    }
}
