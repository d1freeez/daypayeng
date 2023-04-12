<?php

namespace App\Contracts\Holiday;

use App\Models\Holiday;

interface CreatesHolidays
{
    /**
     * Create a new production calendar holiday.
     *
     * @param array $credentials
     * @return \App\Models\Holiday
     */
    public function create(array $credentials): Holiday;
}
