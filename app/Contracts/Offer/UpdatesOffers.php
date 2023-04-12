<?php

namespace App\Contracts\Offer;

use App\Models\Offer;

interface UpdatesOffers
{
    /**
     * Update the given offer information.
     *
     * @param \App\Models\Offer $offer
     * @param array $credentials
     * @return \App\Models\Offer
     */
    public function update(Offer $offer, array $credentials): Offer;
}
