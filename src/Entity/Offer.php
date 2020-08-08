<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Offer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $companyDescription = null;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $jobDescription = null;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $missions = null;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $tasks = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $profile = null;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $softSkills = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $minSalary = null;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $maxSalary = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $location = null;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $remote = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $publishedAt = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $deletedAt = null;

    /**
     * @ORM\ManyToOne(targetEntity=Recruiter::class, inversedBy="offers")
     */
    private ?Recruiter $recruiter = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCompanyDescription(): ?string
    {
        return $this->companyDescription;
    }

    public function setCompanyDescription(?string $companyDescription): self
    {
        $this->companyDescription = $companyDescription;

        return $this;
    }

    public function getJobDescription(): ?string
    {
        return $this->jobDescription;
    }

    public function setJobDescription(string $jobDescription): self
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    public function getMissions(): ?string
    {
        return $this->missions;
    }

    public function setMissions(string $missions): self
    {
        $this->missions = $missions;

        return $this;
    }

    public function getTasks(): ?string
    {
        return $this->tasks;
    }

    public function setTasks(string $tasks): self
    {
        $this->tasks = $tasks;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getSoftSkills(): ?string
    {
        return $this->softSkills;
    }

    public function setSoftSkills(string $softSkills): self
    {
        $this->softSkills = $softSkills;

        return $this;
    }

    public function getMinSalary(): ?int
    {
        return $this->minSalary;
    }

    public function setMinSalary(int $minSalary): self
    {
        $this->minSalary = $minSalary;

        return $this;
    }

    public function getMaxSalary(): ?int
    {
        return $this->maxSalary;
    }

    public function setMaxSalary(int $maxSalary): self
    {
        $this->maxSalary = $maxSalary;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getRemote(): ?bool
    {
        return $this->remote;
    }

    public function setRemote(bool $remote): self
    {
        $this->remote = $remote;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getRecruiter(): ?Recruiter
    {
        return $this->recruiter;
    }

    public function setRecruiter(?Recruiter $recruiter): self
    {
        $this->recruiter = $recruiter;

        return $this;
    }
}
