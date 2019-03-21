<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CvFieldsRepository")
 */
class CvFields
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fullName;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $About;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->About;
    }

    public function setAbout(string $About): self
    {
        $this->About = $About;

        return $this;
    }
}
