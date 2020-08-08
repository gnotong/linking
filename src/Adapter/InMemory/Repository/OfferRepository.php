<?php

declare(strict_types=1);

namespace App\Adapter\InMemory\Repository;

use App\Entity\Offer;
use App\Gateway\OfferGateway;

class OfferRepository implements OfferGateway
{
    public function publish(Offer $offer): void
    {
        // TODO: Implement publish() method.
    }
}
