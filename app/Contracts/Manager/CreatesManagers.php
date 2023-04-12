<?php

namespace App\Contracts\Manager;

use App\Models\Manager;

interface CreatesManagers
{
    /**
     * Create a new manager.
     *
     * @param array $credentials
     * @return \App\Models\Manager
     */
    public function create(array $credentials): Manager;
}
