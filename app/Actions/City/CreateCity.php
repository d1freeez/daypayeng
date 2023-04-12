<?php

namespace App\Actions\City;

use App\Contracts\City\CreatesCities;
use App\Models\LibCity;

class CreateCity implements CreatesCities
{
    /**
     * Create a new city.
     *
     * @param array $credentials
     * @return \App\Models\LibCity
     */
    public function create(array $credentials): LibCity
    {
        return LibCity::query()->create($credentials);
    }
}
