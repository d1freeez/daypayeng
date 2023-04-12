<?php

namespace Database\Seeders;

use App\Models\Holiday;
use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $holidays = [
            ['day_number' => 1, 'calendar_id' => 1],
            ['day_number' => 2, 'calendar_id' => 1],
            ['day_number' => 3, 'calendar_id' => 1],
            ['day_number' => 8, 'calendar_id' => 3],
            ['day_number' => 21, 'calendar_id' => 3],
            ['day_number' => 22, 'calendar_id' => 3],
            ['day_number' => 23, 'calendar_id' => 3],
            ['day_number' => 1, 'calendar_id' => 5],
            ['day_number' => 7, 'calendar_id' => 5],
            ['day_number' => 8, 'calendar_id' => 5],
            ['day_number' => 9, 'calendar_id' => 5],
            ['day_number' => 6, 'calendar_id' => 7],
            ['day_number' => 30, 'calendar_id' => 8],
            ['day_number' => 16, 'calendar_id' => 12],
            ['day_number' => 17, 'calendar_id' => 12],
            ['day_number' => 18, 'calendar_id' => 12]
        ];
        foreach ($holidays as $holiday) {
            Holiday::create($holiday);
        }
    }
}
