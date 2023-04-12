<?php

namespace App\Models;

use App\Enums\UserType;
use App\Helper\Filterable;
use App\Helper\FilterableByRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes, Filterable, FilterableByRole;

    /**
     * The columns that can be filtered by role.
     *
     * @var array
     */
    protected array $role_filter = [
        [
            'user_type' => UserType::DIRECTOR,
            'column' => 'company_id'
        ],
        [
            'user_type' => UserType::EMPLOYEES,
            'column' => 'user_id'
        ]
    ];

    /**
     * The columns that can be filtered.
     *
     * @var array
     */
    protected array $filterable_columns = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'phone'];

    /**
     * Get the user that owns the application.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
