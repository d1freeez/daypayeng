<?php

namespace App\Actions\Offer;

use App\Contracts\Offer\UpdatesOffers;
use App\Models\Offer;

class UpdateOffer implements UpdatesOffers
{
    /**
     * @inheritDoc
     */
    public function update(Offer $offer, array $credentials): Offer
    {
        $offer->update($credentials);

        return $offer;
    }
}
