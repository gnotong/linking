<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Recruiter extends User
{
    private ?string $companyName = null;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="recruiter")
     */
    private $offers;

    public function __construct()
    {
        parent::__construct();
        $this->offers = new ArrayCollection();
    }

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

    /**
     * @return Collection|Offer[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setRecruiter($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->contains($offer)) {
            $this->offers->removeElement($offer);
            // set the owning side to null (unless already changed)
            if ($offer->getRecruiter() === $this) {
                $offer->setRecruiter(null);
            }
        }

        return $this;
    }
}
