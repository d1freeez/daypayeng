<?php

namespace App\Models;

use App\Enums\UserType;
use App\Helper\UserHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable, HasApiTokens, UserHelper;

    protected $fillable = [
        's_name',
        'name',
        'p_name',
        'email',
        'iin',
        'id_number',
        'e_number',
        'position',
        'photo',
        'm_amount',
        'd_amount',
        'company_id',
        'type',
        'is_active',
        'without_checking',
        'password',
        'balance',
        'verified',
        'email_token',
        'remember_token',
        'department_id',
        'user_id'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'verified' => 'boolean',
        'without_checking' => 'boolean',
        'd_amount' => 'float',
        'm_amount' => 'float',
        'type' => UserType::class
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(LibCompany::class, 'company_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(AdvanceAccount::class, 'user_id');
    }

    public function accruedAdvances(): HasMany
    {
        return $this->hasMany(AccruedAdvance::class, 'user_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'user_id');
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class, 'user_id');
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('is_active', true);
    }

    public function redirectToDashboard(): RedirectResponse
    {
        if (
            in_array(
                $this->type,
                [UserType::DIRECTOR, UserType::MANAGER],
                true
            )
        ) {
            return redirect()->route('directors.dashboard');
        }
        if ($this->type === UserType::EMPLOYEES) {
            return redirect()->route('employees.dashboard');
        }

        return redirect()->route('dashboard.admin');
    }
}
