<?php

namespace App\Contracts\Application;

use App\Models\Application;

interface CreatesApplications
{
    /**
     * Create a new card application.
     *
     * @param array $credentials
     * @return \App\Models\Application
     */
    public function create(array $credentials): Application;
}
