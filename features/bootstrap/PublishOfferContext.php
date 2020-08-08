<?php

namespace App\Features;

use App\Adapter\InMemory\Repository\OfferRepository;
use App\Entity\Offer;
use App\UseCase\PublishOffer;
use Assert\Assertion;
use Behat\Behat\Context\Context;

class PublishOfferContext implements Context
{
    private PublishOffer $publishOffer;
    private Offer  $offer;

    /**
     * @Given /^I want to publish an offer$/
     */
    public function iWantToPublishAnOffer()
    {
        $this->publishOffer = new PublishOffer(new OfferRepository());
    }

    /**
     * @When /^I write the offer$/
     */
    public function iWriteTheOffer()
    {
        $this->offer = (new Offer())
            ->setCompanyDescription('offer description')
            ->setJobDescription('job description')
            ->setLocation('location')
            ->setMaxSalary(35000)
            ->setMinSalary(29000)
            ->setMissions('offer missions')
            ->setName('Offer name')
            ->setProfile('offer profile')
            ->setRemote(true)
            ->setTasks('offer tasks')
            ->setSoftSkills('offer soft skills');
    }

    /**
     * @Then /^The offer is published and job seeker can send their application for new job$/
     */
    public function theOfferIsPublishedAndJobSeekerCanSendTheirApplicationForNewJob()
    {
        Assertion::eq($this->offer, $this->publishOffer->execute($this->offer));
    }
}
