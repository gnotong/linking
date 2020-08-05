<?php

namespace App\Features;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

class CloseApplicationContext implements Context
{
    /**
     * @Given /^I want to close an application$/
     */
    public function iWantToCloseAnApplication()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @When /^I close it$/
     */
    public function iCloseIt()
    {
        throw new PendingException();
    }

    /**
     * @Then /^The recruitment process is stopped$/
     */
    public function theRecruitmentProcessIsStopped()
    {
        throw new PendingException();
    }
}
