<?php

namespace App\Contracts\Manager;

use App\Models\Manager;

interface UpdatesManagers
{
    /**
     * Update the given manager information.
     *
     * @param \App\Models\Manager $manager
     * @param array $credentials
     * @return \App\Models\Manager
     */
    public function update(Manager $manager, array $credentials): Manager;
}
