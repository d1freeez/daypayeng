<?php

namespace App\Contracts\Advances;

use App\Models\User;
use Carbon\CarbonInterface;

interface CreatesAccruedAdvances
{
    /**
     * Create a new accrued_advance.
     *
     * @param \App\Models\User $user
     * @param int $weekday
     * @param \Carbon\CarbonInterface $date
     * @param bool $holiday
     *
     * @return void
     */
    public function create(User $user, int $weekday, CarbonInterface $date, bool $holiday);
}
