<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\JobSeekerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobSeekerRepository::class)
 */
class JobSeeker extends User
{

}
