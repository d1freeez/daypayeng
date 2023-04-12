<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibCompany extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'rg_date',
        'bin',
        'employees_count',
        'is_six_day'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_six_day' => 'boolean'
    ];

    /**
     * Get the accounts for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts(): HasMany
    {
        return $this->hasMany(AdvanceAccount::class, 'company_id');
    }

    /**
     * Get the departments for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'company_id');
    }

    /**
     * Get the employees for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'company_id');
    }

    /**
     * Get the director for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function director(): HasOne
    {
        return $this->hasOne(Director::class, 'company_id');
    }

    /**
     * Get the managers for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function managers(): HasMany
    {
        return $this->hasMany(Manager::class, 'company_id');
    }

    /**
     * Scope a query to only include active companies.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder): Builder
    {
        return $builder->whereHas(
            'director',
            fn(Builder $builder) => $builder->where('is_active', true)
        );
    }
}
