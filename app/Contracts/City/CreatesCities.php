<?php

namespace App\Contracts\City;

use App\Models\LibCity;

interface CreatesCities
{
    /**
     * Create a new city.
     *
     * @param array $credentials
     * @return \App\Models\LibCity
     */
    public function create(array $credentials): LibCity;
}
