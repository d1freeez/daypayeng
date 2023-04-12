<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionCalendar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'month_number',
        'month_dates',
        'five_working_days',
        'six_working_days'
    ];

    public function holidays(): HasMany
    {
        return $this->hasMany(Holiday::class, 'calendar_id');
    }

    protected function monthName(): Attribute
    {
        return new Attribute(
            get: function ($value, $attributes) {
                return (new Carbon(
                    '2020-' . $attributes['month_number'] . '-01',
                    'Asia/Almaty'
                ))->monthName;
            }
        );
    }
}
