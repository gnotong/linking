<?php

namespace App\Features;

use Behat\Behat\Context\Context;

class ShowInterestContext implements Context
{
    /**
     * @Given /^I want show my interest for job seekers that match my job offer$/
     */
    public function iWantShowMyInterestForJobSeekersThatMatchMyJobOffer()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }
}
