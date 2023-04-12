<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holiday extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['day_number', 'calendar_id'];

    /**
     * Get the calendar that owns the holiday.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function calendar(): BelongsTo
    {
        return $this->belongsTo(ProductionCalendar::class, 'calendar_id');
    }

    public function scopeFindByDayNumberAndMonthNumber(Builder $builder, int $day_number, int $month_number): Builder
    {
        return $builder->where('day_number', $day_number)->whereHas(
            'calendar',
            function (Builder $builder) use ($month_number) {
                $builder->where('month_number', $month_number);
            }
        );
    }
}
