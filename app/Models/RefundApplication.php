<?php

namespace App\Models;

use App\Helper\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefundApplication extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected array $filterable_columns = ['user_id', 'is_finished'];

    protected $fillable = [
        'advance_id',
        'user_id',
        'phone',
        'content',
        'is_refunded',
        'from_user_id',
        'is_finished'
    ];

    protected $casts = [
        'is_refunded' => 'boolean',
        'is_finished' => 'boolean'
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(AdvanceAccount::class, 'advance_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fromUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }
}
