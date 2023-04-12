<?php

namespace App\Contracts\Holiday;

use App\Models\Holiday;

interface UpdatesHolidays
{
    /**
     * Update the given production calendar holiday information
     *
     * @param \App\Models\Holiday $holiday
     * @param array $credentials
     * @return \App\Models\Holiday
     */
    public function update(Holiday $holiday, array $credentials): Holiday;
}
