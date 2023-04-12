<?php

namespace App\Contracts\ProductionCalendar;

use App\Models\ProductionCalendar;

interface UpdatesProductionCalendars
{
    /**
     * Update the given production calendar month information.
     *
     * @param \App\Models\ProductionCalendar $calendar
     * @param array $credentials
     * @return \App\Models\ProductionCalendar
     */
    public function update(
        ProductionCalendar $calendar,
        array $credentials
    ): ProductionCalendar;
}
