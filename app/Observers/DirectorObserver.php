<?php

namespace App\Observers;

use App\Models\Director;
use App\Notifications\CompanyCreated;
use App\Notifications\DashboardActivationHasChanged;

class DirectorObserver
{
    /**
     * Handle the director "created" event.
     *
     * @param \App\Models\Director $director
     * @return void
     */
    public function creating(Director $director): void
    {
        if (app()->isProduction()) {
            $director->notify(new CompanyCreated());
        }
    }

    /**
     * Handle the director "updating" event.
     *
     * @param \App\Models\Director $director
     * @return void
     */
    public function updating(Director $director): void
    {
        if (app()->isProduction() && $director->isDirty('is_active')) {
            $director->notify(new DashboardActivationHasChanged());
        }
    }
}
