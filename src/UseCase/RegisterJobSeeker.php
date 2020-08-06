<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Entity\JobSeeker;
use App\Gateway\JobSeekerGateway;
use Assert\Assert;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterJobSeeker
{
    private JobSeekerGateway $jobSeekerGateway;
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(JobSeekerGateway $jobSeekerGateway, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->jobSeekerGateway = $jobSeekerGateway;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function execute(JobSeeker $jobSeeker): JobSeeker
    {
        Assert::lazy()
            ->that($jobSeeker->getFirstName(), 'firstName')->notBlank()
            ->that($jobSeeker->getLastName(), 'lastName')->notBlank()
            ->that($jobSeeker->getPlainPassword(), 'plainPassword')->notBlank()
            ->that($jobSeeker->getEmail(), 'email')->notBlank()->email()
        ->verifyNow();

        $jobSeeker->setPassword($this->passwordEncoder->encodePassword($jobSeeker, $jobSeeker->getPlainPassword()));

        $this->jobSeekerGateway->register($jobSeeker);

        return $jobSeeker;
    }
}
