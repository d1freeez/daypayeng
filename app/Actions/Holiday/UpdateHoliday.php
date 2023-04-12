<?php

namespace App\Actions\Holiday;

use App\Contracts\Holiday\UpdatesHolidays;
use App\Models\Holiday;

class UpdateHoliday implements UpdatesHolidays
{
    /**
     * Update the given production calendar holiday information
     *
     * @param \App\Models\Holiday $holiday
     * @param array $credentials
     * @return \App\Models\Holiday
     */
    public function update(Holiday $holiday, array $credentials): Holiday
    {
        $holiday->update($credentials);

        return $holiday;
    }
}
