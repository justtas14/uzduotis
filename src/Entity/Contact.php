<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected  $yourEmail;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected  $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYourEmail(): ?string
    {
        return $this->yourEmail;
    }

    public function setYourEmail(string $yourEmail): self
    {
        $this->yourEmail = $yourEmail;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
