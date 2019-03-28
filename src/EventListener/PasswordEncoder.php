<?php

namespace App\EventListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use App\Entity\User;
use PhpParser\Builder\Class_;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordEncoder implements EventSubscriber
{
    private $passwordEncoder;

    public function getSubscribedEvents()
    {
        return [Events::prePersist, Events::preUpdate];
    }

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof User) {
            return;
        }

        $password = $this->passwordEncoder->encodePassword($entity, $entity->getPlainPassword());
        $entity->setPassword($password);
        $entity->eraseCredentials();
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof User) {
            return;
        }
        $password = $this->passwordEncoder->encodePassword($entity, $entity->getPlainPassword());
        $entity->setPassword($password);
        $entity->eraseCredentials();
    }
}