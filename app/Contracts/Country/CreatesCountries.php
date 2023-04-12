<?php

namespace App\Contracts\Country;

use App\Models\LibCountry;

interface CreatesCountries
{
    /**
     * Create a new country.
     *
     * @param array $credentials
     * @return \App\Models\LibCountry
     */
    public function create(array $credentials): LibCountry;
}
