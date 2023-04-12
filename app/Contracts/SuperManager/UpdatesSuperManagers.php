<?php

namespace App\Contracts\SuperManager;

use App\Models\SuperManager;

interface UpdatesSuperManagers
{
    /**
     * Update the given super manager information.
     *
     * @param \App\Models\SuperManager $manager
     * @param array $credentials
     * @return \App\Models\SuperManager
     */
    public function update(SuperManager $manager, array $credentials): SuperManager;
}
