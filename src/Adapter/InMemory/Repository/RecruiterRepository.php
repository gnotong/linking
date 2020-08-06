<?php

declare(strict_types=1);

namespace App\Adapter\InMemory\Repository;

use App\Entity\Recruiter;
use App\Gateway\RecruiterGateway;

class RecruiterRepository implements RecruiterGateway
{
    public function register(Recruiter $recruiter): void
    {
        // TODO: Implement register() method.
    }
}
