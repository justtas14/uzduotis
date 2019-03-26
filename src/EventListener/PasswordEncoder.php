<?php

namespace App\EventListener;

// for Doctrine < 2.4: use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use App\Entity\User;
use PhpParser\Builder\Class_;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Service\PushToDatabase;

class PasswordEncoder
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function postPersist(LifecycleEventArgs $args, PushToDatabase $pushToDatabase)
    {
        $entity = $args->getObject();

        // only act on some "Product" entity
        if (!$entity instanceof User) {
            return;
        }

        $entityManager = $args->getObjectManager();
        $userObj = $args->getObject();

        $lastInput = $entityManager->getRepository(User::class)->findOneBy(
            [], array('id' => 'DESC'));

        $password = $this->passwordEncoder->encodePassword($userObj, $lastInput->getPassword());

        $userObj->setPassword($password);
        $userObj->setEmail($lastInput->getEmail());

        $pushToDatabase->pushIt($userObj);
    }
}