<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillsRepository")
 */
class Skill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="smallint")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="emails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $skillName;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $aboutSkill;

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
    public function getSkillName(): ?string
    {
        return $this->skillName;
    }

    public function setSkillName(string $skillName): self
    {
        $this->skillName = $skillName;

        return $this;
    }
    public function getAboutSkill(): ?string
    {
        return $this->aboutSkill;
    }

    public function setAboutSkill(string $aboutSkill): self
    {
        $this->aboutSkill = $aboutSkill;

        return $this;
    }
}
