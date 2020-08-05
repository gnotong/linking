<?php

declare(strict_types=1);

namespace App\Gateway;

use App\Entity\Recruiter;

interface RecruiterGateway extends UserGateway
{
    public function register(Recruiter $recruiter): void;

}
