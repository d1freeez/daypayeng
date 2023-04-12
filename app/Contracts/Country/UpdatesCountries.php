<?php

namespace App\Contracts\Country;

use App\Models\LibCountry;

interface UpdatesCountries
{
    /**
     * Update the given country information.
     *
     * @param array $credentials
     * @param \App\Models\LibCountry $country
     * @return \App\Models\LibCountry
     */
    public function update(array $credentials, LibCountry $country): LibCountry;
}
