<?php

namespace App\Contracts\Bring;

use App\Models\Bring;

interface CreatesBrings
{
    /**
     * Create a new Bring.
     *
     * @param array $credentials
     * @return \App\Models\Bring
     */
    public function create(array $credentials): Bring;
}
