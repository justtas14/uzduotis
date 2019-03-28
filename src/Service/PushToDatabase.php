<?php

namespace App\Service;
use App\Entity\Contact;
use Doctrine\ORM\EntityManager;


class PushToDatabase
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function pushIt($visitor)
    {
        $this->em->persist($visitor);
        $this->em->flush();
    }
}