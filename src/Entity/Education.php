<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EducationRepository")
 */
class Education
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="educations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $educationTitle;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $educationYear;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $about;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getEducationTitle(): ?string
    {
        return $this->educationTitle;
    }

    public function setEducationTitle(string $educationTitle): self
    {
        $this->educationTitle = $educationTitle;

        return $this;
    }

    public function getEducationYear(): ?string
    {
        return $this->educationYear;
    }

    public function setEducationYear(string $educationYear): self
    {
        $this->educationYear = $educationYear;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(string $about): self
    {
        $this->about = $about;

        return $this;
    }
}
