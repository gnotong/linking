<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Entity\Recruiter;
use App\Gateway\RecruiterGateway ;
use Assert\Assert;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterRecruiter
{
    private RecruiterGateway $recruiterGateway;
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(RecruiterGateway $recruiterGateway, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->recruiterGateway = $recruiterGateway;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function execute(Recruiter $recruiter): Recruiter
    {
        Assert::lazy()
            ->that($recruiter->getCompanyName(), 'companyName')->notBlank()
            ->that($recruiter->getFirstName(), 'firstName')->notBlank()
            ->that($recruiter->getLastName(), 'lastName')->notBlank()
            ->that($recruiter->getPlainPassword(), 'plainPassword')->notBlank()
            ->that($recruiter->getEmail(), 'email')->notBlank()->email()
        ->verifyNow();

        $recruiter->setPassword($this->passwordEncoder->encodePassword($recruiter, $recruiter->getPlainPassword()));

        $this->recruiterGateway->register($recruiter);

        return $recruiter;
    }
}
