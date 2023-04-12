<?php

namespace App\Actions\Country;

use App\Contracts\Country\UpdatesCountries;
use App\Models\LibCountry;

class UpdateCountry implements UpdatesCountries
{
    /**
     * Update the given country information.
     *
     * @param array $credentials
     * @param \App\Models\LibCountry $country
     * @return \App\Models\LibCountry
     */
    public function update(array $credentials, LibCountry $country): LibCountry
    {
        $country->update($credentials);

        return $country;
    }
}
