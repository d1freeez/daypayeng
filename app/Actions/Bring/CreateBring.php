<?php

namespace App\Actions\Bring;

use App\Contracts\Bring\CreatesBrings;
use App\Models\Bring;

class CreateBring implements CreatesBrings
{
    /**
     * @inheritDoc
     */
    public function create(array $credentials): Bring
    {
        return Bring::query()->create($credentials);
    }
}
