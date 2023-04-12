<?php

namespace App\Actions\SuperManager;

use App\Contracts\SuperManager\UpdatesSuperManagers;
use App\Helper\HasCredentials;
use App\Models\SuperManager;

class UpdateSuperManager implements UpdatesSuperManagers
{
    use HasCredentials;

    /**
     * @inheritDoc
     */
    public function update(SuperManager $manager, array $credentials): SuperManager
    {
        $credentials = $this->fullNameCredential($credentials);
        $manager->update($credentials);
        $this->updatePassword($manager, $credentials);
        return $manager;
    }
}
