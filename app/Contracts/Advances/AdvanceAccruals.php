<?php

namespace App\Contracts\Advances;

use App\Models\User;
use Carbon\CarbonInterface;

interface AdvanceAccruals
{
    /**
     * Accrual advance for a given user.
     *
     * @param \App\Models\User $user
     * @param int $weekday
     * @param bool $holiday
     * @param \Carbon\CarbonInterface $date
     * @return void
     */
    public function accrual(User $user, int $weekday, bool $holiday, CarbonInterface $date): void;
}
