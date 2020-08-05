<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Entity\Recruiter;
use App\Gateway\RecruiterGateway ;
use Assert\Assert;

class RegisterRecruiter
{
    private RecruiterGateway $recruiterGateway;

    public function __construct(RecruiterGateway $recruiterGateway)
    {
        $this->recruiterGateway = $recruiterGateway;
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

        $this->recruiterGateway->register($recruiter);

        return $recruiter;
    }
}
