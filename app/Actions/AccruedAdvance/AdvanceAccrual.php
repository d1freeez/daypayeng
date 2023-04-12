<?php

namespace App\Actions\AccruedAdvance;

use App\Contracts\Advances\AdvanceAccruals;
use App\Contracts\Advances\CreatesAccruedAdvances;
use App\Models\User;
use Carbon\CarbonInterface;

class AdvanceAccrual implements AdvanceAccruals
{
    public function __construct(
        private readonly CreatesAccruedAdvances $accruedAdvanceCreator
    ) {
    }

    /**
     * @inheritDoc
     */
    public function accrual(User $user, int $weekday, bool $holiday, CarbonInterface $date): void
    {
        $this->accruedAdvanceCreator->create($user, $weekday, $date, $holiday);
    }
}
