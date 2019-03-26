<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillsRepository")
 */
class Skills
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
    private $skillName;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $aboutSkill;

    public function getId(): ?int
    {
        return $this->id;
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
