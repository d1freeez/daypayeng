<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class AccruedAdvance extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'date', 'amount'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'amount' => 'float'
    ];

    /**
     * Get the user that owns the accrued_advance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include monthly accrued advances.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Carbon\CarbonInterface|null $date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMonthly(
        Builder $query,
        CarbonInterface $date = null
    ): Builder {
        if (is_null($date)) {
            $date = Carbon::now();
        }

        return $query
            ->whereNull('deleted_at')
            ->whereMonth('date', $date->month);
    }
}
