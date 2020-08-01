<?php

namespace App\Features;

use Behat\Behat\Context\Context;

class RejectApplicationContext implements Context
{
    /**
     * @Given /^I want to reject an application$/
     */
    public function iWantToRejectAnApplication()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @When /^I send a new message to explain the rejection$/
     */
    public function iSendANewMessageToExplainTheRejection()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @Then /^The job seeker is aware of our decision and we cannot meet the job seeker$/
     */
    public function theJobSeekerIsAwareOfOurDecisionAndWeCannotMeetTheJobSeeker()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }
}
