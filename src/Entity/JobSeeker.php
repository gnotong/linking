<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class JobSeeker extends User
{
    public function getRoles(): array
    {
        $roles = $this->getRoles();
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_JOB_SEEKER';

        return array_unique($roles);
    }
}
