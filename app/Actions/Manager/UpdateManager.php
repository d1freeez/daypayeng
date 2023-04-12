<?php

namespace App\Actions\Manager;

use App\Contracts\Manager\UpdatesManagers;
use App\Helper\HasCredentials;
use App\Models\Manager;

class UpdateManager implements UpdatesManagers
{
    use HasCredentials;
    /**
     * Update the given manager information.
     *
     * @param \App\Models\Manager $manager
     * @param array $credentials
     * @return \App\Models\Manager
     */
    public function update(Manager $manager, array $credentials): Manager
    {
        $credentials = $this->fullNameCredential($credentials);
        $manager->update($credentials);
        $this->updatePassword($manager, $credentials);

        return $manager;
    }
}
