<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqParent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['title', 'is_legal'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_legal' => 'boolean'
    ];

    /**
     * Get FAQs for the given FAQ parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class, 'parent_id');
    }

    public function scopeLegal(Builder $query): Builder
    {
        return $query->where('is_legal', true);
    }

    public function scopeEmployee(Builder $query): Builder
    {
        return $query->where('is_legal', false);
    }
}
