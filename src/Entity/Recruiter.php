<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Recruiter extends User
{
    private ?string $companyName = null;

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->getRoles();
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_RECRUITER';

        return array_unique($roles);
    }
}
