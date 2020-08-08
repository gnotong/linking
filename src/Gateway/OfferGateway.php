<?php

declare(strict_types=1);

namespace App\Gateway;

use App\Entity\Offer;

interface OfferGateway
{
    public function publish(Offer $offer): void;

}
