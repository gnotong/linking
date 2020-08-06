<?php

declare(strict_types=1);

namespace App\Features;

use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Entity\JobSeeker;
use App\UseCase\RegisterJobSeeker;
use Assert\Assertion;
use Assert\AssertionFailedException;
use Behat\Behat\Context\Context;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;

class RegisterJobSeekerContext implements Context
{
    private RegisterJobSeeker $registerJobSeeker;
    private JobSeeker $jobSeeker;

    /**
     * @Given /^I need to register to look for a new job$/
     */
    public function iNeedToRegisterToLookForANewJob()
    {
        $userPasswordEncoder = new class() implements UserPasswordEncoderInterface {

            public function encodePassword(UserInterface $user, string $plainPassword)
            {
                return 'hashed_password';
            }

            public function isPasswordValid(UserInterface $user, string $raw)
            {
                // TODO: Implement isPasswordValid() method.
            }

            public function needsRehash(UserInterface $user): bool
            {
                return true;
            }
        };

        $this->registerJobSeeker = new RegisterJobSeeker(new JobSeekerRepository(), $userPasswordEncoder);
    }

    /**
     * @When /^I fill the registration form$/
     */
    public function iFillTheRegistrationForm()
    {
        $this->jobSeeker = (new JobSeeker())
            ->setPlainPassword('123')
            ->setEmail('email@email.com')
            ->setFirstName('John')
            ->setLastName('Doe');
    }

    /**
     * @Then /^I can log in with my new account$/
     * @throws AssertionFailedException
     */
    public function iCanLogInWithMyNewAccount()
    {
        Assertion::eq($this->jobSeeker, $this->registerJobSeeker->execute($this->jobSeeker));
    }
}
