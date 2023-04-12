<?php

namespace App\Contracts\SuperManager;

use App\Models\SuperManager;

interface CreatesSuperManagers
{
    /**
     * Create a new super manager.
     *
     * @param array $credentials
     * @return \App\Models\SuperManager
     */
    public function create(array $credentials): SuperManager;
}
