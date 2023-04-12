<?php

namespace App\Contracts\Offer;

use App\Models\Offer;

interface CreatesOffers
{
    /**
     * Create a new offer.
     *
     * @param array $credentials
     * @return \App\Models\Offer
     */
    public function create(array $credentials): Offer;
}
