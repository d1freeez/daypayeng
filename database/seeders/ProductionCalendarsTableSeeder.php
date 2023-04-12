<?php

namespace Database\Seeders;

use App\Models\ProductionCalendar;
use Illuminate\Database\Seeder;

class ProductionCalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calendars = [
            [
                'month_number' => 1,
                'month_dates' => 31,
                'five_working_days' => 20,
                'six_working_days' => 24
            ],
            [
                'month_number' => 2,
                'month_dates' => 28,
                'five_working_days' => 20,
                'six_working_days' => 24
            ],
            [
                'month_number' => 3,
                'month_dates' => 31,
                'five_working_days' => 19,
                'six_working_days' => 23
            ],
            [
                'month_number' => 4,
                'month_dates' => 30,
                'five_working_days' => 21,
                'six_working_days' => 25
            ],
            [
                'month_number' => 5,
                'month_dates' => 31,
                'five_working_days' => 19,
                'six_working_days' => 23
            ],
            [
                'month_number' => 6,
                'month_dates' => 30,
                'five_working_days' => 21,
                'six_working_days' => 25
            ],
            [
                'month_number' => 7,
                'month_dates' => 31,
                'five_working_days' => 19,
                'six_working_days' => 23
            ],
            [
                'month_number' => 8,
                'month_dates' => 31,
                'five_working_days' => 22,
                'six_working_days' => 26
            ],
            [
                'month_number' => 9,
                'month_dates' => 30,
                'five_working_days' => 22,
                'six_working_days' => 26
            ],
            [
                'month_number' => 10,
                'month_dates' => 31,
                'five_working_days' => 22,
                'six_working_days' => 26
            ],
            [
                'month_number' => 11,
                'month_dates' => 30,
                'five_working_days' => 21,
                'six_working_days' => 25
            ],
            [
                'month_number' => 12,
                'month_dates' => 31,
                'five_working_days' => 20,
                'six_working_days' => 24
            ]
        ];
        foreach ($calendars as $calendar) {
            ProductionCalendar::create($calendar);
        }
    }
}
