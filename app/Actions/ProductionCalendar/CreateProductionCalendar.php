<?php

namespace App\Actions\ProductionCalendar;

use App\Contracts\ProductionCalendar\CreatesProductionCalendars;
use App\Models\ProductionCalendar;
use Carbon\Carbon;

class CreateProductionCalendar implements CreatesProductionCalendars
{
    /**
     * Create a new production calendar month.
     *
     * @param array $credentials
     * @return \App\Models\ProductionCalendar
     */
    public function create(array $credentials): ProductionCalendar
    {
        return ProductionCalendar::query()->create([
            ...$credentials,
            'month_number' => (new Carbon($credentials['month_number']))->month
        ]);
    }
}
