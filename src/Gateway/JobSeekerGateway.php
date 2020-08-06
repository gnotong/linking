<?php

declare(strict_types=1);

namespace App\Gateway;

use App\Entity\JobSeeker;

interface JobSeekerGateway extends UserGateway
{
    public function register(JobSeeker $jobSeeker): void;
}
