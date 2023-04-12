<?php

namespace App\Contracts\Region;

use App\Models\LibRegion;

interface CreatesRegions
{
    /**
     * Create a new region.
     *
     * @param array $credentials
     * @return \App\Models\LibRegion
     */
    public function create(array $credentials): LibRegion;
}
