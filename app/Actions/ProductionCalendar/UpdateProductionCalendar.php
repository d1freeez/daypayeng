<?php

namespace App\Actions\ProductionCalendar;

use App\Contracts\ProductionCalendar\UpdatesProductionCalendars;
use App\Models\ProductionCalendar;

class UpdateProductionCalendar implements UpdatesProductionCalendars
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
    ): ProductionCalendar {
        $calendar->update($credentials);

        return $calendar;
    }
}
