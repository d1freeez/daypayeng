<?php

namespace App\Actions\Country;

use App\Contracts\Country\CreatesCountries;
use App\Models\LibCountry;

class CreateCountry implements CreatesCountries
{
    /**
     * Create a new country.
     *
     * @param array $credentials
     * @return \App\Models\LibCountry
     */
    public function create(array $credentials): LibCountry
    {
        return LibCountry::query()->create($credentials);
    }
}
