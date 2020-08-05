<?php

namespace App\Features;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

class ShowInterestContext implements Context
{
    /**
     * @Given /^I want show my interest for job seekers that match my job offer$/
     */
    public function iWantShowMyInterestForJobSeekersThatMatchMyJobOffer()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @When /^I show my interest to the job seeker$/
     */
    public function iShowMyInterestToTheJobSeeker()
    {
        throw new PendingException();
    }

    /**
     * @Then /^The job seeker is aware is of our interest$/
     */
    public function theJobSeekerIsAwareIsOfOurInterest()
    {
        throw new PendingException();
    }
}
