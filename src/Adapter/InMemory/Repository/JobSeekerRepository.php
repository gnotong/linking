<?php

declare(strict_types=1);

namespace App\Adapter\InMemory\Repository;

use App\Entity\JobSeeker;
use App\Gateway\JobSeekerGateway;

class JobSeekerRepository implements JobSeekerGateway
{
    public function register(JobSeeker $jobSeeker): void
    {
        // TODO: Implement register() method.
    }
}
