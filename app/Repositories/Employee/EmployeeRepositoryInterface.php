<?php

namespace App\Repositories\Employee;

use App\Models\Card;

interface EmployeeRepositoryInterface
{
    /**
     * Generate d_amount attribute.
     *
     * @param int $m_amount
     * @param int $weekdays
     * @return float
     */
    public function generateDAmount(int $m_amount, int $weekdays): float;

    /**
     * Get the card of the given user or authorized user.
     *
     * @param int|null $user_id
     * @return \App\Models\Card|null
     */
    public function getCard(int $user_id = null): ?Card;

    /**
     * Daily advance accruals for all employees.
     *
     * @return void
     */
    public function dailyAccruals(): void;
}
