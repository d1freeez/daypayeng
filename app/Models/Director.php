<?php

namespace App\Models;

use App\Models\Scopes\DirectorScope;

class Director extends User
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new DirectorScope());
    }
}
