<?php

namespace App\Actions\AccruedAdvance;

use App\Contracts\Advances\CreatesAccruedAdvances;
use App\Models\User;
use Carbon\CarbonInterface;

class CreateAccruedAdvance implements CreatesAccruedAdvances
{
    /**
     * @inheritDoc
     */
    public function create(User $user, int $weekday, CarbonInterface $date, bool $holiday)
    {
        if ($this->checkWeekdayForWeekend($user, $weekday, $holiday)) {
            $d_amount = $user->d_amount;
            if ($date->isLastOfMonth()) {
                $remains = $user->m_amount - ($user->accruedAdvances->sum('amount') + $user->d_amount);
                $d_amount = $user->d_amount + $remains;
            }
            $user->accruedAdvances()->updateOrCreate([
                'date' => $date->format('Y-m-d'),
                'amount' => $d_amount
            ]);
        }
    }

    /**
     * Check the day of the week for the weekend.
     *
     * @param \App\Models\User $user
     * @param int $weekday
     * @param bool $holiday
     * @return bool
     */
    public function checkWeekdayForWeekend(User $user, int $weekday, bool $holiday): bool
    {
        $weekends = $user->company->is_six_day ? [7] : [6, 7];
        return !in_array($weekday, $weekends) && !$holiday;
    }
}
