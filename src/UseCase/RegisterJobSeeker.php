<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Entity\JobSeeker;
use App\Gateway\JobSeekerGateway;
use Assert\Assert;

class RegisterJobSeeker
{
    private JobSeekerGateway $jobSeekerGateway;

    public function __construct(JobSeekerGateway $jobSeekerGateway)
    {
        $this->jobSeekerGateway = $jobSeekerGateway;
    }

    public function execute(JobSeeker $jobSeeker): JobSeeker
    {
        Assert::lazy()
            ->that($jobSeeker->getFirstName(), 'firstName')->notBlank()
            ->that($jobSeeker->getLastName(), 'lastName')->notBlank()
            ->that($jobSeeker->getPlainPassword(), 'plainPassword')->notBlank()
            ->that($jobSeeker->getEmail(), 'email')->notBlank()->email()
        ->verifyNow();

        $this->jobSeekerGateway->register($jobSeeker);

        return $jobSeeker;
    }
}
