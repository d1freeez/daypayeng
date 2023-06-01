<?php

namespace App\Models;

use App\Enums\AdvanceAccountStatus;
use App\Enums\UserType;
use App\Helper\Filterable;
use App\Helper\FilterableByRole;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class AdvanceAccount extends Model
{
    use HasFactory, Filterable, FilterableByRole, SoftDeletes;

    /**
     * The columns that can be filtered by role.
     *
     * @var array
     */
    protected array $role_filter = [
        [
            'user_type' => 'all',
            'column' => [
                'name' => 'is_commission_paid',
                'default' => true
            ]
        ],
        [
            'user_type' => [UserType::ADMIN, UserType::SUPER_MANAGER],
            'column' => [
                'name' => 'is_company_accepted',
                'default' => true
            ]
        ],
        [
            'user_type' => UserType::DIRECTOR,
            'column' => 'company_id'
        ],
        [
            'user_type' => UserType::EMPLOYEES,
            'column' => 'user_id'
        ],
        [
            'user_type' => UserType::MANAGER,
            'column' => [
                'name' => 'department_id',
                'has' => 'user'
            ]
        ],
        [
            'user_type' => UserType::MANAGER,
            'column' => 'company_id'
        ]
    ];

    /**
     * The columns that can be filtered.
     *
     * @var array
     */
    protected array $filterable_columns = [
        'user_id',
        'company_id',
        'created_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'company_id',
        'amount',
        'status',
        'is_company_accepted',
        'payed_at',
        'fee',
        'is_payed',
        'from_user_id',
        'is_commission_paid',
        'payment',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_company_accepted' => 'boolean',
        'is_commission_paid' => 'boolean',
        'status' => AdvanceAccountStatus::class
    ];

    /**
     * Get the user that owns the advance_account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the from_user that owns the advance_account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fromUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    /**
     * Get the company that owns the advance_account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(LibCompany::class, 'company_id');
    }

    public function className(): Attribute
    {
        return new Attribute(
            get: function ($value, $attributes) {
                if ($attributes['status'] == AdvanceAccountStatus::ON_MODERATE) {
                    return 'primary';
                }

                if ($attributes['status'] == AdvanceAccountStatus::COMPANY_REJECT) {
                    return 'danger';
                }

                return 'success';
            }
        );
    }

    public function scopeMonthly(Builder $builder, CarbonInterface $date = null): Builder
    {
        if (is_null($date)) {
            $date = Carbon::now();
        }

        return $builder
            ->whereNull('deleted_at')
            ->whereMonth('created_at', $date->month);
    }

    public function scopeCompleted(Builder $builder): Builder
    {
        return $builder->whereIn(
            column: 'status',
            values: [
                AdvanceAccountStatus::ON_ACCEPT,
                AdvanceAccountStatus::ACCEPTED
            ]
        );
    }

    public function scopeOnModerate(Builder $builder): Builder
    {
        $user = request()->user();
        if (in_array($user->type, [UserType::DIRECTOR, UserType::MANAGER])) {
            $builder->where('is_company_accepted', false);
        }
        if (in_array($user->type, [UserType::ADMIN, UserType::SUPER_MANAGER])) {
            $builder->where('is_company_accepted', true);
        }

        return $builder->whereIn(
            column: 'status',
            values: [
                AdvanceAccountStatus::ON_MODERATE,
            ]
        );
    }
}