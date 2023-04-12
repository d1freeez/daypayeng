<?php

namespace App\Actions\Region;

use App\Contracts\Region\UpdatesRegions;
use App\Models\LibRegion;

class UpdateRegion implements UpdatesRegions
{
    /**
     * Update the given region information.
     *
     * @param \App\Models\LibRegion $region
     * @param array $credentials
     * @return \App\Models\LibRegion
     */
    public function update(LibRegion $region, array $credentials): LibRegion
    {
        $region->update($credentials);

        return $region;
    }
}
