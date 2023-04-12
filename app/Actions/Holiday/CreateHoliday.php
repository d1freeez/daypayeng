<?php

namespace App\Actions\Holiday;

use App\Contracts\Holiday\CreatesHolidays;
use App\Models\Holiday;

class CreateHoliday implements CreatesHolidays
{
    /**
     * Create a new production calendar holiday.
     *
     * @param array $credentials
     * @return \App\Models\Holiday
     */
    public function create(array $credentials): Holiday
    {
        return Holiday::query()->create($credentials);
    }
}
