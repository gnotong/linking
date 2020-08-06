<?php

namespace App\Features;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

class RejectApplicationContext implements Context
{
    /**
     * @Given /^i want to reject an application$/
     */
    public function iWantToRejectAnApplication()
    {
        throw new PendingException();
    }

    /**
     * @When /^i send a rejection message to the job seeker$/
     */
    public function iSendARejectionMessageToTheJobSeeker()
    {
        throw new PendingException();
    }

    /**
     * @Then /^the job seeker is aware of our decision and we cannot meet the job seeker$/
     */
    public function theJobSeekerIsAwareOfOurDecisionAndWeCannotMeetTheJobSeeker()
    {
        throw new PendingException();
    }
}
