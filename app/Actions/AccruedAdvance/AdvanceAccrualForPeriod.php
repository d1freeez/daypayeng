<?php

namespace App\Actions\AccruedAdvance;

use App\Contracts\Advances\AdvanceAccruals;
use App\Contracts\Advances\AdvanceAccrualsForPeriod;
use App\Models\Holiday;
use App\Models\User;
use Carbon\CarbonPeriod;

class AdvanceAccrualForPeriod implements AdvanceAccrualsForPeriod
{
    public function __construct(
        private readonly AdvanceAccruals $advanceAccruals
    ) {
    }

    public function accrual(User $user, CarbonPeriod $dates): void
    {
        foreach ($dates as $date) {
            $weekday = $date->dayOfWeekIso;
            $holiday = Holiday::query()->findByDayNumberAndMonthNumber($date->day, $date->month)->exists();
            $this->advanceAccruals->accrual($user, $weekday, $holiday, $date);
        }
        $user->update([
            'balance' =>
                $user->accruedAdvances()->monthly()->sum('amount') -
                $user->accounts()->monthly()->completed()->sum('amount')
        ]);
    }
}
