<?php

namespace App\Models;

use App\Enums\UserType;
use App\Helper\FilterableByRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes, FilterableByRole;

    protected array $role_filter = [
        [
            'user_type' => UserType::DIRECTOR,
            'column' => 'company_id'
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'description', 'manager_id', 'company_id'];

    /**
     * Get the company that owns the department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(LibCompany::class, 'company_id');
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }
}
