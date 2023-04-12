<?php

namespace App\Contracts\ProductionCalendar;

use App\Models\ProductionCalendar;

interface CreatesProductionCalendars
{
    /**
     * Create a new production calendar month.
     *
     * @param array $credentials
     * @return \App\Models\ProductionCalendar
     */
    public function create(array $credentials): ProductionCalendar;
}
