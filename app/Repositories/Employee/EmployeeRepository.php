<?php

namespace App\Repositories\Employee;

use App\Contracts\Advances\AdvanceAccruals;
use App\Models\Card;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\ProductionCalendar;
use Carbon\Carbon;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function __construct(protected AdvanceAccruals $advanceAccruals)
    {
        //
    }

    /**
     * Generate d_amount attribute.
     *
     * @param int $m_amount
     * @param int $weekdays
     * @return float
     */
    public function generateDAmount(int $m_amount, int $weekdays): float
    {
        $month = Carbon::now()->month;
        $calendar = ProductionCalendar::where('month_number', $month)->first();
        return round(
            $weekdays === 6 ? $m_amount / $calendar->six_working_days : $m_amount / $calendar->five_working_days
        );
    }

    /**
     * Get the card of the given user or authorized user.
     *
     * @param int|null $user_id
     * @return \App\Models\Card|null
     */
    public function getCard(int $user_id = null): ?Card
    {
        if (!$user_id) {
            $user_id = auth()->id();
        }

        $user = Employee::with('cards')->find($user_id);

        return $user->cards()->first();
    }

    /**
     * Daily advance accruals for all employees.
     *
     * @return void
     */
    public function dailyAccruals(): void
    {
        $employees = Employee::with('company')->get();
        $today = Carbon::now();
        $weekday = $today->dayOfWeekIso;
        $lastDayOfMonth = Carbon::parse($today)->endOfMonth()->day;
        $holiday = Holiday::findByDayNumberAndMonthNumber($today->day, $today->month)->exists();
        foreach ($employees as $e) {
            if ($today->day != $lastDayOfMonth) {
                $this->advanceAccruals->accrual($e, $weekday, $holiday, $today);
                $e->update([
                    'balance' =>
                        $e->accruedAdvances()->monthly()->sum('amount') -
                        $e->accounts()->monthly()->completed()->sum('amount')
                ]);
            } else {
                $e->update([
                    'balance' => 0.00
                ]);
            }
        }
    }
}
