<?php

declare(strict_types=1);

namespace App\Features;

use App\Adapter\InMemory\Repository\RecruiterRepository;
use App\Entity\Recruiter;
use App\UseCase\RegisterRecruiter;
use Assert\Assertion;
use Behat\Behat\Context\Context;

class RegisterRecruiterContext implements Context
{

    private RegisterRecruiter $registerRecruiter;
    private Recruiter $recruiter;

    /**
     * @Given /^I need to register to recruit new employees$/
     */
    public function iNeedToRegisterToRecruitNewEmployees()
    {
        $this->registerRecruiter = new RegisterRecruiter(new RecruiterRepository());
    }

    /**
     * @When /^I fill the registration form$/
     */
    public function iFillTheRegistrationForm()
    {
        $this->recruiter = (new Recruiter())
            ->setCompanyName('Company')
            ->setPlainPassword('123')
            ->setEmail('email@email.com')
            ->setFirstName('John')
            ->setLastName('Doe');
    }

    /**
     * @Then /^I can log in with my new account$/
     */
    public function iCanLogInWithMyNewAccount()
    {
        Assertion::eq($this->recruiter, $this->registerRecruiter->execute($this->recruiter));
    }
}
