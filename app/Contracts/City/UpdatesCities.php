<?php

namespace App\Contracts\City;

use App\Models\LibCity;

interface UpdatesCities
{
    /**
     * Update the given city information.
     *
     * @param \App\Models\LibCity $city
     * @param array $credentials
     * @return \App\Models\LibCity
     */
    public function update(LibCity $city, array $credentials): LibCity;
}
