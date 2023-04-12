<?php

namespace App\Contracts\Advances;

use App\Models\User;
use Carbon\CarbonPeriod;

interface AdvanceAccrualsForPeriod
{
    public function accrual(User $user, CarbonPeriod $dates): void;
}
