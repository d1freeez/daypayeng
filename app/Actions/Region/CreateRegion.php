<?php

namespace App\Actions\Region;

use App\Contracts\Region\CreatesRegions;
use App\Models\LibRegion;

class CreateRegion implements CreatesRegions
{
    /**
     * Create a new region.
     *
     * @param array $credentials
     * @return \App\Models\LibRegion
     */
    public function create(array $credentials): LibRegion
    {
        return LibRegion::query()->create($credentials);
    }
}
