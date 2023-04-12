<?php

namespace App\Actions\Offer;

use App\Contracts\Offer\CreatesOffers;
use App\Models\Offer;

class CreateOffer implements CreatesOffers
{
    /**
     * @inheritDoc
     */
    public function create(array $credentials): Offer
    {
        return Offer::query()->create($credentials);
    }
}
