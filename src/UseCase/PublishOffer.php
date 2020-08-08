<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Entity\Offer;
use App\Gateway\OfferGateway;
use Assert\Assert;

class PublishOffer
{
    private OfferGateway $offerGateway;

    public function __construct(OfferGateway $offerGateway)
    {
        $this->offerGateway = $offerGateway;
    }

    public function execute(Offer $offer): Offer
    {
        Assert::lazy()
            ->that($offer->getCompanyDescription(), 'companyDescription')->notBlank()
            ->that($offer->getJobDescription(), 'jobDescription')->notBlank()
            ->that($offer->getLocation(), 'location')->notBlank()
            ->that($offer->getMaxSalary(), 'maxSalary')
                ->notBlank()
                ->integer()
                ->greaterThan($offer->getMinSalary())
            ->that($offer->getMinSalary(), 'minSalary')
                ->notBlank()
                ->integer()
                ->lessOrEqualThan($offer->getMaxSalary())
            ->that($offer->getMissions(), 'missions')->notBlank()
            ->that($offer->getName(), 'name')->notBlank()
            ->that($offer->getProfile(), 'profile')->notBlank()
            ->that($offer->getTasks(), 'tasks')->notBlank()
            ->that($offer->getSoftSkills(), 'softSkills')->notBlank()
            ->that($offer->getRemote(), 'remote')->notBlank()
        ->verifyNow();

        $this->offerGateway->publish($offer);

        return $offer;
    }
}
