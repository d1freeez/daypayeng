<?php

namespace App\Actions\City;

use App\Contracts\City\UpdatesCities;
use App\Models\LibCity;

class UpdateCity implements UpdatesCities
{
    /**
     * Update the given city information.
     *
     * @param \App\Models\LibCity $city
     * @param array $credentials
     * @return \App\Models\LibCity
     */
    public function update(LibCity $city, array $credentials): LibCity
    {
        $city->update($credentials);

        return $city;
    }
}
