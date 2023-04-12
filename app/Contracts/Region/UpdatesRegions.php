<?php

namespace App\Contracts\Region;

use App\Models\LibRegion;

interface UpdatesRegions
{
    /**
     * Update the given region information.
     *
     * @param \App\Models\LibRegion $region
     * @param array $credentials
     * @return \App\Models\LibRegion
     */
    public function update(LibRegion $region, array $credentials): LibRegion;
}
